<?php
namespace App\Http\Controllers\Finance;
use App\Http\Controllers\Controller;
use App\Models\Finance\Customer;
use Illuminate\Http\Request;
class CustomerController extends Controller {
    public function index(Request $r) { $customers=Customer::when($r->q,fn($q,$v)=>$q->where('name','like',"%$v%")->orWhere('phone','like',"%$v%"))->latest()->paginate(15)->withQueryString(); return view('admin.finance.contacts.index',['rows'=>$customers,'type'=>'customers','title'=>'Customers']); }
    public function create() { $row=new Customer; $type='customers'; $title='Customers'; return view('admin.finance.contacts.form',compact('row','type','title')); }
    public function store(Request $r) { $d=$r->validate(['name'=>'required|string|max:190','phone'=>'nullable|string|max:50','email'=>'nullable|email|max:190','address'=>'nullable|string']); Customer::create($d); return redirect()->route('finance.customers.index')->with('success','Customer created.'); }
    public function edit(Customer $customer) { $row=$customer; $type='customers'; $title='Customers'; return view('admin.finance.contacts.form',compact('row','type','title')); }
    public function update(Request $r, Customer $customer) { $customer->update($r->validate(['name'=>'required|string|max:190','phone'=>'nullable|string|max:50','email'=>'nullable|email|max:190','address'=>'nullable|string'])); return redirect()->route('finance.customers.index')->with('success','Customer updated.'); }
    public function destroy(Customer $customer) { if($customer->sales()->exists()) return back()->with('error','Customer has sales history.'); $customer->delete(); return back()->with('success','Customer deleted.'); }
}
