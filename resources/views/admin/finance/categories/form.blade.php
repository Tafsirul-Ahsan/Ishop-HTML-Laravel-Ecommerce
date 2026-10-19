@extends('admin.master')
@section('title','Expense Category')
@section('homeContent')
@include('finance._design')
<div class="finance-ui">
<div class="finance-page-heading"><div><h2>{{ $row->exists?'Edit':'Add' }} Expense Category</h2><p>Manage and review your finance records</p></div></div>
<form class="card card-soft p-4" method="POST" action="{{ $row->exists?route('finance.expense-categories.update',$row):route('finance.expense-categories.store') }}">@csrf @if($row->exists) @method('PUT') @endif
<label class="form-label">Category name</label><input class="form-control" name="name" required value="{{ old('name',$row->name) }}"><div class="mt-3"><button class="btn btn-primary">Save</button><a class="btn btn-light" href="{{ route('finance.expense-categories.index') }}">Cancel</a></div></form>
</div>
@endsection
