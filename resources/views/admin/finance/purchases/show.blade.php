@extends('admin.master')
@section('title','Purchase '.$purchase->purchase_no)
@section('homeContent')

<div class="finance-ui">
<div class="d-flex justify-content-between mb-4"><h2 class="fw-bold">Purchase Details</h2><button class="btn btn-outline-secondary" onclick="window.print()">Print</button></div>
<div class="card card-soft p-4"><h4>{{ $purchase->purchase_no }}</h4><p>Date: {{ $purchase->purchase_date->format('d M Y') }} | Supplier: {{ $purchase->supplier->name ?? '-' }}</p><div class="table-responsive"><table class="table"><thead><tr><th>Product</th><th>Quantity</th><th>Cost</th><th>Total</th></tr></thead><tbody>@foreach($purchase->items as $i)<tr><td>{{ $i->product->name }}</td><td>{{ $i->quantity }}</td><td>৳{{ number_format($i->unit_cost,2) }}</td><td>৳{{ number_format($i->line_total,2) }}</td></tr>@endforeach</tbody></table></div><div class="text-end"><div>Total: <strong>৳{{ number_format($purchase->total,2) }}</strong></div><div>Paid: ৳{{ number_format($purchase->paid_amount,2) }}</div><div>Due: ৳{{ number_format($purchase->total-$purchase->paid_amount,2) }}</div></div></div>
</div>
@endsection
