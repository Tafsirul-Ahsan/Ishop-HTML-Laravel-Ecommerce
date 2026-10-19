<?php
namespace App\Http\Controllers\Finance;
use App\Http\Controllers\Controller;
use App\Models\Finance\Expense;
use App\Models\Finance\ExpenseCategory;
use Illuminate\Http\Request;
class ExpenseController extends Controller {
    public function index(Request $r) {
        $query=Expense::with('category')->when($r->from,fn($q,$v)=>$q->whereDate('expense_date','>=',$v))->when($r->to,fn($q,$v)=>$q->whereDate('expense_date','<=',$v))->latest('expense_date');
        $total=(clone $query)->sum('amount'); $expenses=$query->paginate(20)->withQueryString();
        return view('finance.expenses.index',compact('expenses','total'));
    }
    public function create() { $expense=new Expense; $categories=ExpenseCategory::orderBy('name')->get(); return view('finance.expenses.form',compact('expense','categories')); }
    public function store(Request $r) { $data=$r->validate(['category_id'=>'nullable|exists:finance_expense_categories,id','title'=>'required|string|max:190','amount'=>'required|numeric|gt:0','expense_date'=>'required|date','payment_method'=>'required|in:cash,bank,mobile_banking,card,other','reference'=>'nullable|string|max:190','notes'=>'nullable|string']); $data['created_by']=$r->user()->id; Expense::create($data); return redirect()->route('finance.expenses.index')->with('success','Expense saved.'); }
    public function edit(Expense $expense) { $categories=ExpenseCategory::orderBy('name')->get(); return view('finance.expenses.form',compact('expense','categories')); }
    public function update(Request $r, Expense $expense) { $expense->update($r->validate(['category_id'=>'nullable|exists:finance_expense_categories,id','title'=>'required|string|max:190','amount'=>'required|numeric|gt:0','expense_date'=>'required|date','payment_method'=>'required|in:cash,bank,mobile_banking,card,other','reference'=>'nullable|string|max:190','notes'=>'nullable|string'])); return redirect()->route('finance.expenses.index')->with('success','Expense updated.'); }
    public function destroy(Expense $expense) { $expense->delete(); return back()->with('success','Expense deleted.'); }
}
