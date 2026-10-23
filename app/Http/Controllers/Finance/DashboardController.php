<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\Sale;
use App\Models\Finance\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $period = (int) $request->input('period', 30);
        if (!in_array($period, [7, 30, 90], true)) {
            $period = 30;
        }

        $today = Carbon::today();
        $from = $today->copy()->subDays($period - 1);
        $to = $today->copy()->endOfDay();

        // These field names match the supplied finance views:
        // sales: sale_date, total, paid_amount, due_amount, status
        // expenses: expense_date, amount, category_id
        $salesBase = Sale::query()->whereDate('sale_date', '>=', $from->toDateString())
            ->whereDate('sale_date', '<=', $today->toDateString());

        $expensesBase = Expense::query()->whereDate('expense_date', '>=', $from->toDateString())
            ->whereDate('expense_date', '<=', $today->toDateString());

        $totalSales = (clone $salesBase)->sum('total');
        $totalReceived = (clone $salesBase)->sum('paid_amount');
        $totalExpenses = (clone $expensesBase)->sum('amount');
        $estimatedProfit = $totalSales - $totalExpenses;

        // Fill every date in the period so chart lines don't skip days with no activity.
        $salesByDay = (clone $salesBase)
            ->selectRaw('DATE(sale_date) as day, SUM(total) as amount')
            ->groupBy(DB::raw('DATE(sale_date)'))
            ->pluck('amount', 'day');

        $expensesByDay = (clone $expensesBase)
            ->selectRaw('DATE(expense_date) as day, SUM(amount) as amount')
            ->groupBy(DB::raw('DATE(expense_date)'))
            ->pluck('amount', 'day');

        $dailyLabels = $dailySales = $dailyExpenses = [];
        for ($date = $from->copy(); $date->lte($today); $date->addDay()) {
            $key = $date->toDateString();
            $dailyLabels[] = $date->format('d M');
            $dailySales[] = round((float) ($salesByDay[$key] ?? 0), 2);
            $dailyExpenses[] = round((float) ($expensesByDay[$key] ?? 0), 2);
        }

        // Last 12 months (including the current month).
        $monthStart = $today->copy()->startOfMonth()->subMonths(11);
        $salesByMonth = Sale::query()
            ->whereDate('sale_date', '>=', $monthStart->toDateString())
            ->whereDate('sale_date', '<=', $today->toDateString())
            ->selectRaw("DATE_FORMAT(sale_date, '%Y-%m') as month, SUM(total) as amount")
            ->groupBy(DB::raw("DATE_FORMAT(sale_date, '%Y-%m')"))
            ->pluck('amount', 'month');

        $expensesByMonth = Expense::query()
            ->whereDate('expense_date', '>=', $monthStart->toDateString())
            ->whereDate('expense_date', '<=', $today->toDateString())
            ->selectRaw("DATE_FORMAT(expense_date, '%Y-%m') as month, SUM(amount) as amount")
            ->groupBy(DB::raw("DATE_FORMAT(expense_date, '%Y-%m')"))
            ->pluck('amount', 'month');

        $monthlyLabels = $monthlySales = $monthlyExpenses = [];
        for ($date = $monthStart->copy(); $date->lte($today); $date->addMonth()) {
            $key = $date->format('Y-m');
            $monthlyLabels[] = $date->format('M Y');
            $monthlySales[] = round((float) ($salesByMonth[$key] ?? 0), 2);
            $monthlyExpenses[] = round((float) ($expensesByMonth[$key] ?? 0), 2);
        }

        $statusCounts = (clone $salesBase)
            ->select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        $statusLabels = [];
        $statusValues = [];
        foreach ($statusCounts as $status => $count) {
            $statusLabels[] = ucfirst((string) $status);
            $statusValues[] = (int) $count;
        }
        if (empty($statusLabels)) {
            $statusLabels = ['No invoices'];
            $statusValues = [0];
        }

        $categoryRows = (clone $expensesBase)
            ->leftJoin('expense_categories', 'expenses.category_id', '=', 'expense_categories.id')
            ->selectRaw("COALESCE(expense_categories.name, 'Uncategorized') as category_name, SUM(expenses.amount) as amount")
            ->groupBy('category_name')
            ->orderByDesc('amount')
            ->get();

        $expenseCategoryLabels = $categoryRows->pluck('category_name')->values();
        $expenseCategoryValues = $categoryRows->pluck('amount')->map(fn ($value) => round((float) $value, 2))->values();

        $recentSales = (clone $salesBase)
            ->with('customer')
            ->orderByDesc('sale_date')
            ->orderByDesc('id')
            ->limit(8)
            ->get();

        return view('admin.dashboard', compact(
            'period',
            'totalSales',
            'totalReceived',
            'totalExpenses',
            'estimatedProfit',
            'dailyLabels',
            'dailySales',
            'dailyExpenses',
            'statusLabels',
            'statusValues',
            'monthlyLabels',
            'monthlySales',
            'monthlyExpenses',
            'expenseCategoryLabels',
            'expenseCategoryValues',
            'recentSales'
        ));
    }
}
