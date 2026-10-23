@extends('admin.master')
@section('title','Expense Category')
@section('homeContent')

<div class="finance-ui">
    <div class="finance-page-heading">
        <div>
            <h2>{{ $row->exists ? 'Edit' : 'Add' }} Expense Category</h2>
            <p>{{ $row->exists ? 'Update this category name' : 'Create a category for tracking expenses' }}</p>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="card card-soft p-4" method="POST" action="{{ $row->exists ? route('finance.expense-categories.update', $row) : route('finance.expense-categories.store') }}">
        @csrf
        @if($row->exists)
            @method('PUT')
        @endif
        <div class="form-group">
            <label class="form-label" for="category-name">Category name <span class="text-danger">*</span></label>
            <input id="category-name" class="form-control @error('name') is-invalid @enderror" name="name" type="text" maxlength="150" required autofocus value="{{ old('name', $row->name) }}" placeholder="e.g. Transport, Rent, Utilities">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">{{ $row->exists ? 'Update Category' : 'Create Category' }}</button>
            <a class="btn btn-light" href="{{ route('finance.expense-categories.index') }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
