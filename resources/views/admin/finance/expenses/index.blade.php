@extends('admin.master')
@section('title','Expenses')
@section('homeContent')

<div class="finance-ui">
<div class="finance-page-heading"><div><h2>Expenses</h2><p>Manage and review your finance records</p></div><a href="{{ route('finance.expenses.create') }}" class="btn btn-primary"><i class="fa fa-plus me-1"></i>Add Expense</a></div>
<form class="card card-soft p-3 mb-3"><div class="row g-2 align-items-end"><div class="col-md-4"><label class="form-label">From</label><input class="form-control" type="date" name="from" value="{{ request('from') }}"></div><div class="col-md-4"><label class="form-label">To</label><input class="form-control" type="date" name="to" value="{{ request('to') }}"></div><div class="col-md-4"><button class="btn btn-outline-primary">Filter</button> <a class="btn btn-light" href="{{ route('finance.expenses.index') }}">Reset</a></div></div></form>
<div class="card card-soft p-3"><div class="mb-3 fw-semibold">Filtered total: <span class="text-danger">৳{{ number_format($total,2) }}</span></div><div class="table-responsive"><table class="table"><thead><tr><th>Date</th><th>Title</th><th>Category</th><th>Method</th><th>Amount</th><th>Action</th></tr></thead><tbody>@forelse($expenses as $e)<tr><td>{{ $e->expense_date->format('d M Y') }}</td><td>{{ $e->title }}</td><td>{{ $e->category->name ?? '-' }}</td><td>{{ ucfirst(str_replace('_',' ',$e->payment_method)) }}</td><td class="text-danger fw-bold">৳{{ number_format($e->amount,2) }}</td><td><a class="btn btn-sm btn-outline-primary" href="{{ route('finance.expenses.edit',$e) }}">Edit</a><form class="d-inline" method="POST" action="{{ route('finance.expenses.destroy',$e) }}" onsubmit="return confirm('Delete expense?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button></form></td></tr>@empty<tr><td colspan="6" class="text-center text-secondary">No expenses found.</td></tr>@endforelse</tbody></table></div>{{ $expenses->links() }}</div>
</div>
@endsection
