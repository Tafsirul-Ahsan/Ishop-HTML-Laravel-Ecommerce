@extends('admin.master')
@section('title','Invoice '.$sale->invoice_no)
@section('homeContent')
@include('finance._design')
<div class="finance-ui">
<div class="finance-page-heading"><div><h2>Invoice</h2><p>Manage and review your finance records</p></div><button class="btn btn-outline-secondary" onclick="window.print()"><i class="fa fa-print me-1"></i>Print</button></div>
<div class="card card-soft p-4" id="invoice"><div class="d-flex justify-content-between flex-wrap"><div><h3 class="fw-bold">Sales Invoice</h3><div class="text-secondary">{{ $sale->invoice_no }}</div></div><div class="text-end"><div>Date: {{ $sale->sale_date->format('d M Y') }}</div><div>Payment: {{ ucfirst(str_replace('_',' ',$sale->payment_method)) }}</div></div></div><hr><div><strong>Customer:</strong> {{ $sale->customer->name ?? 'Walk-in customer' }} {{ $sale->customer->phone ?? '' }}</div>
<div class="table-responsive mt-4"><table class="table"><thead><tr><th>Product</th><th>Qty</th><th>Unit Price</th><th>Total</th></tr></thead><tbody>@foreach($sale->items as $i)<tr><td>{{ $i->product->name }}</td><td>{{ $i->quantity }}</td><td>৳{{ number_format($i->unit_price,2) }}</td><td>৳{{ number_format($i->line_total,2) }}</td></tr>@endforeach</tbody></table></div>
<div class="row justify-content-end"><div class="col-md-4"><div class="d-flex justify-content-between"><span>Subtotal</span><span>৳{{ number_format($sale->subtotal,2) }}</span></div><div class="d-flex justify-content-between"><span>Discount</span><span>৳{{ number_format($sale->discount,2) }}</span></div><hr><div class="d-flex justify-content-between fw-bold"><span>Total</span><span>৳{{ number_format($sale->total,2) }}</span></div><div class="d-flex justify-content-between"><span>Paid</span><span>৳{{ number_format($sale->paid_amount,2) }}</span></div><div class="d-flex justify-content-between text-danger fw-bold"><span>Due</span><span>৳{{ number_format($sale->due_amount,2) }}</span></div></div></div></div>
</div>
@endsection
