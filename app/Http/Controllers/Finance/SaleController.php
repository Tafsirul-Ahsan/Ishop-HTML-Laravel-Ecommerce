<?php
namespace App\Http\Controllers\Finance;
use App\Http\Controllers\Controller;
use App\Models\Finance\Sale;
use App\Models\Finance\SaleItem;
use App\Models\Finance\Product;
use App\Models\Finance\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SaleController extends Controller {
    public function index(Request $r) {
        $query=Sale::with('customer')->when($r->from,fn($q,$v)=>$q->whereDate('sale_date','>=',$v))->when($r->to,fn($q,$v)=>$q->whereDate('sale_date','<=',$v))->latest('sale_date');
        $total=(clone $query)->sum('total'); $sales=$query->paginate(20)->withQueryString();
        return view('finance.sales.index',compact('sales','total'));
    }
    public function create() { $products=Product::where('is_active',true)->where('stock','>',0)->orderBy('name')->get(); $customers=Customer::orderBy('name')->get(); return view('finance.sales.create',compact('products','customers')); }
    public function store(Request $r) {
        $data=$r->validate([
            'customer_id'=>'nullable|exists:finance_customers,id','sale_date'=>'required|date',
            'discount'=>'nullable|numeric|min:0','paid_amount'=>'required|numeric|min:0',
            'payment_method'=>'required|in:cash,bank,mobile_banking,card,other',
            'notes'=>'nullable|string','product_id'=>'required|array|min:1',
            'product_id.*'=>'required|distinct|exists:finance_products,id',
            'quantity'=>'required|array','quantity.*'=>'required|integer|min:1',
            'unit_price'=>'required|array','unit_price.*'=>'required|numeric|min:0'
        ]);
        return DB::transaction(function () use ($r,$data) {
            $subtotal=0; $lines=[]; $productIds=$data['product_id'];
            foreach ($productIds as $i=>$id) {
                $product=Product::whereKey($id)->lockForUpdate()->firstOrFail();
                $qty=(int)$data['quantity'][$i];
                if ($product->stock < $qty) return back()->withInput()->withErrors(['quantity'=>"Insufficient stock for {$product->name}."]);
                $price=(float)$data['unit_price'][$i];
                $line=$qty*$price; $subtotal += $line;
                $lines[]=['product'=>$product,'quantity'=>$qty,'price'=>$price,'line'=>$line];
            }
            $discount=(float)($data['discount']??0); $total=max(0,$subtotal-$discount);
            if ((float)$data['paid_amount'] > $total) return back()->withInput()->withErrors(['paid_amount'=>'Paid amount cannot exceed invoice total.']);
            $sale=Sale::create([
                'invoice_no'=>'INV-'.now()->format('Ymd').'-'.Str::upper(Str::random(5)),
                'customer_id'=>$data['customer_id']??null,'sale_date'=>$data['sale_date'],
                'subtotal'=>$subtotal,'discount'=>$discount,'total'=>$total,'paid_amount'=>$data['paid_amount'],
                'payment_method'=>$data['payment_method'],'status'=>((float)$data['paid_amount'] >= $total?'paid':((float)$data['paid_amount']>0?'partial':'unpaid')),
                'notes'=>$data['notes']??null,'created_by'=>$r->user()->id
            ]);
            foreach($lines as $line) {
                SaleItem::create(['sale_id'=>$sale->id,'product_id'=>$line['product']->id,'quantity'=>$line['quantity'],'unit_price'=>$line['price'],'unit_cost'=>$line['product']->purchase_price,'line_total'=>$line['line']]);
                $line['product']->decrement('stock',$line['quantity']);
            }
            return redirect()->route('finance.sales.show',$sale)->with('success','Sale recorded successfully.');
        });
    }
    public function show(Sale $sale) { $sale->load('customer','items.product'); return view('finance.sales.show',compact('sale')); }
    public function destroy(Sale $sale) {
        DB::transaction(function () use($sale) {
            foreach($sale->items as $item) Product::whereKey($item->product_id)->increment('stock',$item->quantity);
            $sale->delete();
        });
        return redirect()->route('finance.sales.index')->with('success','Sale deleted and stock restored.');
    }
}
