<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $rows = ExpenseCategory::withCount('expenses')
            ->orderBy('name')
            ->paginate(20);

        return view('admin.finance.categories.index', compact('rows'));
    }

    public function create()
    {
        $row = new ExpenseCategory();

        return view('admin.finance.categories.form', compact('row'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150', 'unique:expense_categories,name'],
        ], [
            'name.required' => 'Please enter a category name.',
            'name.unique' => 'This category already exists.',
        ]);

        ExpenseCategory::create($data);

        return redirect()->route('finance.expense-categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(ExpenseCategory $expense_category)
    {
        $expense_category->loadCount('expenses');
        $expenses = $expense_category->expenses()
            ->latest()
            ->paginate(15);

        return view('admin.finance.categories.show', [
            'row' => $expense_category,
            'expenses' => $expenses,
        ]);
    }

    public function edit(ExpenseCategory $expense_category)
    {
        $row = $expense_category;

        return view('admin.finance.categories.form', compact('row'));
    }

    public function update(Request $request, ExpenseCategory $expense_category)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:150',
                Rule::unique('expense_categories', 'name')->ignore($expense_category->id),
            ],
        ], [
            'name.required' => 'Please enter a category name.',
            'name.unique' => 'Another category already uses this name.',
        ]);

        $expense_category->update($data);

        return redirect()->route('finance.expense-categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(ExpenseCategory $expense_category)
    {
        if ($expense_category->expenses()->exists()) {
            return redirect()->route('finance.expense-categories.index')
                ->with('error', 'This category cannot be deleted because it is used by existing expenses.');
        }

        $expense_category->delete();

        return redirect()->route('finance.expense-categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
