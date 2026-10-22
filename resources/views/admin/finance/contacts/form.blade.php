@extends('admin.master')
@section('title',($row->exists?'Edit ':'Add ').rtrim($title,'s'))
@section('homeContent')

<div class="finance-ui">
<div class="finance-page-heading"><div><h2>{{ $row->exists?'Edit ':'Add ' }}{{ rtrim($title,'s') }}</h2><p>Manage and review your finance records</p></div></div>
<form method="POST" action="{{ $row->exists?route('finance.'.$type.'.update',$row):route('finance.'.$type.'.store') }}" class="card card-soft p-4">@csrf @if($row->exists) @method('PUT') @endif
<div class="row g-3"><div class="col-md-6"><label class="form-label">Name *</label><input class="form-control" name="name" required value="{{ old('name',$row->name) }}"></div><div class="col-md-6"><label class="form-label">Phone</label><input class="form-control" name="phone" value="{{ old('phone',$row->phone) }}"></div><div class="col-md-6"><label class="form-label">Email</label><input class="form-control" name="email" type="email" value="{{ old('email',$row->email) }}"></div><div class="col-12"><label class="form-label">Address</label><textarea class="form-control" name="address" rows="3">{{ old('address',$row->address) }}</textarea></div></div><div class="mt-4"><button class="btn btn-primary">Save</button> <a class="btn btn-light" href="{{ route('finance.'.$type.'.index') }}">Cancel</a></div></form>
</div>
@endsection
