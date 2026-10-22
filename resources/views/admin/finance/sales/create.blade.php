@extends('admin.master')
@section('title','New Sale')
@section('homeContent')

<div class="finance-ui">
<div class="finance-page-heading"><div><h2>Create Sale</h2><p>Manage and review your finance records</p></div></div>
<form method="POST" action="{{ route('finance.sales.store') }}" class="card card-soft p-4" id="saleForm">@csrf
<div class="row g-3 mb-4"><div class="col-md-4"><label class="form-label">Customer</label><select class="form-select" name="customer_id"><option value="">Walk-in customer</option>@foreach($customers as $c)<option value="{{ $c->id }}">{{ $c->name }} {{ $c->phone ? '— '.$c->phone : '' }}</option>@endforeach</select></div><div class="col-md-4"><label class="form-label">Sale date *</label><input class="form-control" type="date" name="sale_date" required value="{{ old('sale_date',today()->toDateString()) }}"></div><div class="col-md-4"><label class="form-label">Payment method</label><select class="form-select" name="payment_method">@foreach(['cash','bank','mobile_banking','card','other'] as $m)<option value="{{ $m }}">{{ ucfirst(str_replace('_',' ',$m)) }}</option>@endforeach</select></div></div>
<div class="d-flex justify-content-between align-items-center mb-2"><h5 class="fw-bold">Items</h5><button type="button" class="btn btn-sm btn-outline-primary" id="addRow">+ Add Item</button></div>
<div class="table-responsive"><table class="table" id="itemsTable"><thead><tr><th>Product</th><th style="width:120px">Quantity</th><th style="width:160px">Unit price</th><th>Line total</th><th></th></tr></thead><tbody></tbody></table></div>
<div class="row g-3 justify-content-end"><div class="col-md-4"><label class="form-label">Discount (৳)</label><input class="form-control" type="number" min="0" step=".01" name="discount" id="discount" value="0"></div><div class="col-md-4"><label class="form-label">Paid amount (৳) *</label><input class="form-control" type="number" min="0" step=".01" name="paid_amount" id="paid" required value="0"></div><div class="col-md-4"><div class="p-3 rounded bg-light"><div>Subtotal: <strong id="subtotal">৳0.00</strong></div><div>Total: <strong id="total">৳0.00</strong></div><div>Due: <strong id="due">৳0.00</strong></div></div></div><div class="col-12"><label class="form-label">Notes</label><textarea class="form-control" name="notes"></textarea></div></div>
<div class="mt-4"><button class="btn btn-primary">Save Sale</button> <a class="btn btn-light" href="{{ route('finance.sales.index') }}">Cancel</a></div>
</form>
<template id="rowTemplate"><tr><td><select class="form-select product-select" name="product_id[]" required><option value="">Select product</option>@foreach($products as $p)<option value="{{ $p->id }}" data-price="{{ $p->selling_price }}" data-stock="{{ $p->stock }}">{{ $p->name }} (stock: {{ $p->stock }})</option>@endforeach</select></td><td><input class="form-control qty" name="quantity[]" type="number" min="1" value="1" required></td><td><input class="form-control price" name="unit_price[]" type="number" min="0" step=".01" required></td><td class="lineTotal">৳0.00</td><td><button type="button" class="btn btn-sm btn-outline-danger removeRow">×</button></td></tr></template>
@push('scripts')
<script>
const tbody=document.querySelector('#itemsTable tbody'),tpl=document.querySelector('#rowTemplate');
function addRow(){const row=tpl.content.firstElementChild.cloneNode(true);tbody.appendChild(row);row.querySelector('.product-select').addEventListener('change',e=>{const o=e.target.selectedOptions[0];row.querySelector('.price').value=o.dataset.price||0;row.querySelector('.qty').max=o.dataset.stock||1;calc()});row.querySelectorAll('.qty,.price').forEach(x=>x.addEventListener('input',calc));row.querySelector('.removeRow').addEventListener('click',()=>{row.remove();calc()});}
function calc(){let s=0;tbody.querySelectorAll('tr').forEach(r=>{let q=Number(r.querySelector('.qty').value||0),p=Number(r.querySelector('.price').value||0),v=q*p;s+=v;r.querySelector('.lineTotal').textContent='৳'+v.toFixed(2)});let d=Math.max(0,Number(document.querySelector('#discount').value||0)),t=Math.max(0,s-d),paid=Number(document.querySelector('#paid').value||0);document.querySelector('#subtotal').textContent='৳'+s.toFixed(2);document.querySelector('#total').textContent='৳'+t.toFixed(2);document.querySelector('#due').textContent='৳'+Math.max(0,t-paid).toFixed(2)}
document.querySelector('#addRow').addEventListener('click',addRow);document.querySelector('#discount').addEventListener('input',calc);document.querySelector('#paid').addEventListener('input',calc);addRow();
</script>
@endpush
</div>
@endsection
