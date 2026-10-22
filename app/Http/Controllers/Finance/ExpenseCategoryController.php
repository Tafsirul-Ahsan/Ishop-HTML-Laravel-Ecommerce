<?php
namespace App\Http\Controllers\Finance;
use App\Http\Controllers\Controller;
use App\Models\Finance\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ExpenseCategoryController extends Controller {
    public function index() { $rows=ExpenseCategory::withCount('expenses')->orderBy('name')->paginate(20); return view('admin.finance.categories.index',compact('rows')); }
    public function create() { $row=new ExpenseCategory; return view('admin.finance.categories.form',compact('row')); }
    public function store(Request $r) { ExpenseCategory::create($r->validate(['name'=>'required|string|max:150|unique:finance_expense_categories,name'])); return redirect()->route('finance.expense-categories.index')->with('success','Category created.'); }
    public function edit(ExpenseCategory $expense_category) { $row=$expense_category; return view('finance.categories.form',compact('row')); }
    public function update(Request $r, ExpenseCategory $expense_category) { $expense_category->update($r->validate(['name'=>['required','string','max:150',Rule::unique('finance_expense_categories','name')->ignore($expense_category->id)]])); return redirect()->route('finance.expense-categories.index')->with('success','Category updated.'); }
    public function destroy(ExpenseCategory $expense_category) { $expense_category->delete(); return back()->with('success','Category deleted.'); }
}
