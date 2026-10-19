<?php
namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\Sale;
use App\Models\Finance\SaleItem;
use App\Models\Finance\Expense;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $start = Carbon::now()->startOfMonth()->toDateString();
        $end = Carbon::now()->endOfMonth()->toDateString();

        $salesToday = Sale::whereDate('sale_date', today())->sum('total');
        $salesMonth = Sale::whereBetween('sale_date', [$start, $end])->sum('total');
        $expensesMonth = Expense::whereBetween('expense_date', [$start, $end])->sum('amount');
        $cogsMonth = SaleItem::whereHas('sale', fn($q) => $q->whereBetween('sale_date', [$start, $end]))
            ->selectRaw('COALESCE(SUM(quantity * unit_cost),0) as amount')->value('amount');
        $netProfit = (float)$salesMonth - (float)$cogsMonth - (float)$expensesMonth;

        $monthly = collect(range(5, 0))->map(function ($offset) {
            $date = now()->startOfMonth()->subMonths($offset);
            $from = $date->copy()->startOfMonth()->toDateString();
            $to = $date->copy()->endOfMonth()->toDateString();
            return [
                'label' => $date->format('M Y'),
                'sales' => (float) Sale::whereBetween('sale_date', [$from, $to])->sum('total'),
                'expenses' => (float) Expense::whereBetween('expense_date', [$from, $to])->sum('amount'),
            ];
        });

        $lowStock = Product::whereColumn('stock', '<=', 'low_stock_at')->orderBy('stock')->limit(8)->get();
        $recentSales = Sale::with('customer')->latest()->limit(8)->get();

        return view('admin.dashboard', compact(
            'salesToday', 'salesMonth', 'expensesMonth', 'cogsMonth',
            'netProfit', 'monthly', 'lowStock', 'recentSales'
        ));
    }
}
