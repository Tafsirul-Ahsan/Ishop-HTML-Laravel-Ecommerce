<?php
namespace App\Http\Controllers\Finance;
use App\Http\Controllers\Controller;
use App\Models\Finance\Supplier;
use Illuminate\Http\Request;
class SupplierController extends Controller {
    public function index(Request $r) { $rows=Supplier::when($r->q,fn($q,$v)=>$q->where('name','like',"%$v%")->orWhere('phone','like',"%$v%"))->latest()->paginate(15)->withQueryString(); return view('admin.finance.contacts.index',compact('rows')+['type'=>'suppliers','title'=>'Suppliers']); }
    public function create() { $row=new Supplier; $type='suppliers'; $title='Suppliers'; return view('admin.finance.contacts.form',compact('row','type','title')); }
    public function store(Request $r) { Supplier::create($r->validate(['name'=>'required|string|max:190','phone'=>'nullable|string|max:50','email'=>'nullable|email|max:190','address'=>'nullable|string'])); return redirect()->route('finance.suppliers.index')->with('success','Supplier created.'); }
    public function edit(Supplier $supplier) { $row=$supplier; $type='suppliers'; $title='Suppliers'; return view('admin.finance.contacts.form',compact('row','type','title')); }
    public function update(Request $r, Supplier $supplier) { $supplier->update($r->validate(['name'=>'required|string|max:190','phone'=>'nullable|string|max:50','email'=>'nullable|email|max:190','address'=>'nullable|string'])); return redirect()->route('finance.suppliers.index')->with('success','Supplier updated.'); }
    public function destroy(Supplier $supplier) { if($supplier->purchases()->exists()) return back()->with('error','Supplier has purchase history.'); $supplier->delete(); return back()->with('success','Supplier deleted.'); }
}
