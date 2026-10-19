@extends('admin.master')
@section('title','New Purchase')
@section('homeContent')
@include('finance._design')
<div class="finance-ui">
<div class="finance-page-heading"><div><h2>Record Purchase</h2><p>Manage and review your finance records</p></div></div>
<form method="POST" action="{{ route('finance.purchases.store') }}" class="card card-soft p-4">@csrf
<div class="row g-3 mb-4"><div class="col-md-4"><label class="form-label">Supplier</label><select class="form-select" name="supplier_id"><option value="">Select supplier</option>@foreach($suppliers as $s)<option value="{{ $s->id }}">{{ $s->name }}</option>@endforeach</select></div><div class="col-md-4"><label class="form-label">Purchase date *</label><input class="form-control" type="date" name="purchase_date" required value="{{ today()->toDateString() }}"></div><div class="col-md-4"><label class="form-label">Payment method</label><select class="form-select" name="payment_method">@foreach(['cash','bank','mobile_banking','card','other'] as $m)<option value="{{ $m }}">{{ ucfirst(str_replace('_',' ',$m)) }}</option>@endforeach</select></div></div>
<div class="d-flex justify-content-between mb-2"><h5 class="fw-bold">Items</h5><button class="btn btn-sm btn-outline-primary" type="button" id="addRow">+ Add Item</button></div>
<div class="table-responsive"><table class="table" id="items"><thead><tr><th>Product</th><th>Quantity</th><th>Unit cost</th><th>Total</th><th></th></tr></thead><tbody></tbody></table></div>
<div class="row g-3 justify-content-end"><div class="col-md-4"><label class="form-label">Paid amount</label><input class="form-control" type="number" min="0" step=".01" name="paid_amount" required value="0"></div><div class="col-md-4 p-3 bg-light rounded">Total: <strong id="grandTotal">৳0.00</strong></div><div class="col-12"><label class="form-label">Notes</label><textarea class="form-control" name="notes"></textarea></div></div><div class="mt-4"><button class="btn btn-primary">Save Purchase</button><a class="btn btn-light" href="{{ route('finance.purchases.index') }}">Cancel</a></div>
</form>
<template id="purchaseRow"><tr><td><select class="form-select" name="product_id[]" required><option value="">Select</option>@foreach($products as $p)<option value="{{ $p->id }}">{{ $p->name }}</option>@endforeach</select></td><td><input class="form-control qty" type="number" min="1" name="quantity[]" value="1" required></td><td><input class="form-control cost" type="number" min="0" step=".01" name="unit_cost[]" value="0" required></td><td class="line">৳0.00</td><td><button type="button" class="btn btn-sm btn-outline-danger remove">×</button></td></tr></template>
@push('scripts')<script>
const body=document.querySelector('#items tbody'),temp=document.querySelector('#purchaseRow');
function recalc(){let sum=0;body.querySelectorAll('tr').forEach(r=>{let v=Number(r.querySelector('.qty').value||0)*Number(r.querySelector('.cost').value||0);sum+=v;r.querySelector('.line').textContent='৳'+v.toFixed(2)});document.querySelector('#grandTotal').textContent='৳'+sum.toFixed(2)}
function add(){let r=temp.content.firstElementChild.cloneNode(true);body.appendChild(r);r.querySelectorAll('input').forEach(x=>x.addEventListener('input',recalc));r.querySelector('.remove').onclick=()=>{r.remove();recalc()}}
document.querySelector('#addRow').onclick=add;add();
</script>@endpush
</div>
@endsection
