@extends('admin.master')
@section('title',$expense->exists?'Edit Expense':'Add Expense')
@section('homeContent')

<div class="finance-ui">

<div class="finance-page-heading"><div><h2>{{ $expense->exists?'Edit Expense':'Add Expense' }}</h2><p>Manage and review your finance records</p></div></div>
<form method="POST" action="{{ $expense->exists?route('finance.expenses.update',$expense):route('finance.expenses.store') }}" class="card card-soft p-4">@csrf @if($expense->exists) @method('PUT') @endif
<div class="row g-3">
<div class="col-md-6"><label class="form-label">Title *</label><input class="form-control" name="title" required value="{{ old('title',$expense->title) }}"></div>
<div class="col-md-6"><label class="form-label">Amount (৳) *</label><input class="form-control" type="number" min="0.01" step="0.01" name="amount" required value="{{ old('amount',$expense->amount) }}"></div>
<div class="col-md-6"><label class="form-label">Category</label><select class="form-select" name="category_id"><option value="">Choose category</option>@foreach($categories as $c)<option value="{{ $c->id }}" @selected(old('category_id',$expense->category_id)==$c->id)>{{ $c->name }}</option>@endforeach</select><small class="text-secondary">Create categories from Expense Categories.</small></div>
<div class="col-md-6"><label class="form-label">Date *</label><input class="form-control" type="date" name="expense_date" required value="{{ old('expense_date',optional($expense->expense_date)->format('Y-m-d') ?? now()->toDateString()) }}"></div>
<div class="col-md-6"><label class="form-label">Payment method *</label><select class="form-select" name="payment_method" required>@foreach(['cash','bank','mobile_banking','card','other'] as $m)<option value="{{ $m }}" @selected(old('payment_method',$expense->payment_method ?? 'cash')===$m)>{{ ucfirst(str_replace('_',' ',$m)) }}</option>@endforeach</select></div>
<div class="col-md-6"><label class="form-label">Reference</label><input class="form-control" name="reference" value="{{ old('reference',$expense->reference) }}"></div>
<div class="col-12"><label class="form-label">Notes</label><textarea class="form-control" name="notes" rows="3">{{ old('notes',$expense->notes) }}</textarea></div>
</div><div class="mt-4"><button class="btn btn-primary">Save Expense</button> <a class="btn btn-light" href="{{ route('finance.expenses.index') }}">Cancel</a></div></form>
</div>
@endsection
