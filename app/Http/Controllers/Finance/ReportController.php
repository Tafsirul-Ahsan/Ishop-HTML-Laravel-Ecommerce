<?php
namespace App\Http\Controllers\Finance;
use App\Http\Controllers\Controller;
use App\Models\Finance\Sale;
use App\Models\Finance\SaleItem;
use App\Models\Finance\Expense;
use Illuminate\Http\Request;
class ReportController extends Controller {
    public function index(Request $r) {
        $from=$r->input('from',now()->startOfMonth()->toDateString()); $to=$r->input('to',now()->toDateString());
        $sales=Sale::whereBetween('sale_date',[$from,$to])->sum('total');
        $received=Sale::whereBetween('sale_date',[$from,$to])->sum('paid_amount');
        $expenses=Expense::whereBetween('expense_date',[$from,$to])->sum('amount');
        $cogs=SaleItem::whereHas('sale',fn($q)=>$q->whereBetween('sale_date',[$from,$to]))->selectRaw('COALESCE(SUM(quantity * unit_cost),0) as amount')->value('amount');
        $net=(float)$sales-(float)$cogs-(float)$expenses;
        $salesRows=Sale::with('customer')->whereBetween('sale_date',[$from,$to])->latest('sale_date')->get();
        $expenseRows=Expense::with('category')->whereBetween('expense_date',[$from,$to])->latest('expense_date')->get();
        return view('finance.reports.index',compact('from','to','sales','received','expenses','cogs','net','salesRows','expenseRows'));
    }
}
