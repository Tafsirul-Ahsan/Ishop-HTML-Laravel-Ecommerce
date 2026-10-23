<?php
namespace App\Http\Controllers\Finance;
use App\Http\Controllers\Controller;
use App\Models\Finance\Purchase;
use App\Models\Finance\PurchaseItem;
use App\Models\Product;
use App\Models\Finance\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PurchaseController extends Controller {
    public function index(Request $r) { $query=Purchase::with('supplier')->when($r->from,fn($q,$v)=>$q->whereDate('purchase_date','>=',$v))->when($r->to,fn($q,$v)=>$q->whereDate('purchase_date','<=',$v))->latest('purchase_date'); $total=(clone $query)->sum('total'); $purchases=$query->paginate(20)->withQueryString(); return view('admin.finance.purchases.index',compact('purchases','total')); }
    public function create() { $products=Product::where('is_active',true)->orderBy('name')->get(); $suppliers=Supplier::orderBy('name')->get(); return view('admin.finance.purchases.create',compact('products','suppliers')); }
    public function store(Request $r) {
        $data=$r->validate(['supplier_id'=>'nullable|exists:suppliers,id','purchase_date'=>'required|date','paid_amount'=>'required|numeric|min:0','payment_method'=>'required|in:cash,bank,mobile_banking,card,other','notes'=>'nullable|string','product_id'=>'required|array|min:1','product_id.*'=>'required|distinct|exists:products,id','quantity'=>'required|array','quantity.*'=>'required|integer|min:1','unit_cost'=>'required|array','unit_cost.*'=>'required|numeric|min:0']);
        return DB::transaction(function() use($data) {
            $total=0; $lines=[];
            foreach($data['product_id'] as $i=>$id) { $p=Product::whereKey($id)->lockForUpdate()->firstOrFail(); $qty=(int)$data['quantity'][$i]; $cost=(float)$data['unit_cost'][$i]; $line=$qty*$cost; $total+=$line; $lines[]=['product'=>$p,'qty'=>$qty,'cost'=>$cost,'line'=>$line]; }
            if((float)$data['paid_amount']>$total) return back()->withInput()->withErrors(['paid_amount'=>'Paid amount cannot exceed purchase total.']);
            $purchase=Purchase::create(['purchase_no'=>'PUR-'.now()->format('Ymd').'-'.Str::upper(Str::random(5)),'supplier_id'=>$data['supplier_id']??null,'purchase_date'=>$data['purchase_date'],'total'=>$total,'paid_amount'=>$data['paid_amount'],'payment_method'=>$data['payment_method'],'notes'=>$data['notes']??null]);
            foreach($lines as $line) { PurchaseItem::create(['purchase_id'=>$purchase->id,'product_id'=>$line['product']->id,'quantity'=>$line['qty'],'unit_cost'=>$line['cost'],'line_total'=>$line['line']]); $line['product']->increment('stock',$line['qty']); $line['product']->update(['purchase_price'=>$line['cost']]); }
            return redirect()->route('finance.purchases.show',$purchase)->with('success','Purchase recorded and stock updated.');
        });
    }
    public function show(Purchase $purchase) { $purchase->load('supplier','items.product'); return view('admin.finance.purchases.show',compact('purchase')); }
    public function destroy(Purchase $purchase) {
        foreach($purchase->items as $item) if(Product::whereKey($item->product_id)->value('stock') < $item->quantity) return back()->with('error','Cannot delete purchase: some purchased stock has already been sold.');
        DB::transaction(function() use($purchase) { foreach($purchase->items as $item) Product::whereKey($item->product_id)->decrement('stock',$item->quantity); $purchase->delete(); });
        return redirect()->route('finance.purchases.index')->with('success','Purchase deleted and stock reduced.');
    }
}
