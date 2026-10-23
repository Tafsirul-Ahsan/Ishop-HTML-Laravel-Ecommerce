<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\Customer;
use App\Models\Finance\Sale;
use App\Models\Finance\SaleItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SaleController extends Controller
{
    /**
     * Display sales list.
     */
    public function index(Request $request)
    {
        $query = Sale::with('customer')
            ->when($request->from, function ($query, $date) {
                $query->whereDate('sale_date', '>=', $date);
            })
            ->when($request->to, function ($query, $date) {
                $query->whereDate('sale_date', '<=', $date);
            })
            ->latest('sale_date');

        $total = (clone $query)->sum('total');

        $sales = $query->paginate(20)->withQueryString();

        return view(
            'admin.finance.sales.index',
            compact('sales', 'total')
        );
    }

    /**
     * Show sale creation form.
     */
    public function create()
    {
        $products = Product::where('is_active', true)
            ->where('stock', '>', 0)
            ->orderBy('name')
            ->get();

        $customers = Customer::orderBy('name')->get();

        return view(
            'admin.finance.sales.create',
            compact('products', 'customers')
        );
    }

    /**
     * Store a new sale.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id'   => 'nullable|exists:customers,id',
            'sale_date'     => 'required|date',
            'discount'      => 'nullable|numeric|min:0',
            'paid_amount'   => 'required|numeric|min:0',
            'payment_method' => 'required|in:cash,bank,mobile_banking,card,other',
            'notes'         => 'nullable|string',

            'product_id'    => 'required|array|min:1',
            'product_id.*'  => 'required|distinct|exists:products,id',

            'quantity'      => 'required|array|min:1',
            'quantity.*'    => 'required|integer|min:1',

            'unit_price'    => 'required|array|min:1',
            'unit_price.*'  => 'required|numeric|min:0',
        ]);

        return DB::transaction(function () use ($request, $data) {
            $subtotal = 0;
            $lines = [];

            foreach ($data['product_id'] as $index => $id) {
                $product = Product::whereKey($id)
                    ->lockForUpdate()
                    ->firstOrFail();

                $quantity = (int) $data['quantity'][$index];

                if ($product->stock < $quantity) {
                    return back()
                        ->withInput()
                        ->withErrors([
                            'quantity' => "Insufficient stock for {$product->name}.",
                        ]);
                }

                $price = (float) $data['unit_price'][$index];
                $lineTotal = $quantity * $price;

                $subtotal += $lineTotal;

                $lines[] = [
                    'product'  => $product,
                    'quantity' => $quantity,
                    'price'    => $price,
                    'line'     => $lineTotal,
                ];
            }

            $discount = (float) ($data['discount'] ?? 0);
            $total = max(0, $subtotal - $discount);
            $paidAmount = (float) $data['paid_amount'];

            if ($paidAmount > $total) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'paid_amount' => 'Paid amount cannot exceed invoice total.',
                    ]);
            }

            $status = $paidAmount >= $total
                ? 'paid'
                : ($paidAmount > 0 ? 'partial' : 'unpaid');
$createdBy = auth()->id();

if (
    !$createdBy ||
    !\App\Models\User::whereKey($createdBy)->exists()
) {
    $createdBy = null;
}
            $sale = Sale::create([
                'invoice_no'     => 'INV-' . now()->format('Ymd') . '-' . Str::upper(Str::random(5)),
                'customer_id'    => $data['customer_id'] ?? null,
                'sale_date'      => $data['sale_date'],
                'subtotal'       => $subtotal,
                'discount'       => $discount,
                'total'          => $total,
                'paid_amount'    => $paidAmount,
                'payment_method' => $data['payment_method'],
                'status'         => $status,
                'notes'          => $data['notes'] ?? null,
                'created_by' => $createdBy,
            ]);

            foreach ($lines as $line) {
                SaleItem::create([
                    'sale_id'    => $sale->id,
                    'product_id' => $line['product']->id,
                    'quantity'   => $line['quantity'],
                    'unit_price' => $line['price'],
                    'unit_cost'  => $line['product']->purchase_price,
                    'line_total' => $line['line'],
                ]);

                $line['product']->decrement('stock', $line['quantity']);
            }

            return redirect()
                ->route('finance.sales.show', $sale)
                ->with('success', 'Sale recorded successfully.');
        });
    }

    /**
     * Display sale details.
     */
    public function show(Sale $sale)
    {
        $sale->load('customer', 'items.product');

        return view('admin.finance.sales.show', compact('sale'));
    }

    /**
     * Delete sale and restore stock.
     */
    public function destroy(Sale $sale)
    {
        DB::transaction(function () use ($sale) {
            $sale->load('items');

            foreach ($sale->items as $item) {
                Product::whereKey($item->product_id)
                    ->increment('stock', $item->quantity);
            }

            $sale->delete();
        });

        return redirect()
            ->route('finance.sales.index')
            ->with('success', 'Sale deleted and stock restored.');
    }
}
