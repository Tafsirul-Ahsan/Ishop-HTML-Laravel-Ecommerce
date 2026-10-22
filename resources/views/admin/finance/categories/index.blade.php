@extends('admin.master')
@section('title','Expense Categories')
@section('homeContent')

<div class="finance-ui">
<div class="finance-page-heading"><div><h2>Expense Categories</h2><p>Manage and review your finance records</p></div><a href="{{ route('finance.expense-categories.create') }}" class="btn btn-primary">Add Category</a></div>
<div class="card card-soft p-3"><table class="table"><thead><tr><th>Name</th><th>Expenses</th><th>Actions</th></tr></thead><tbody>@forelse($rows as $row)<tr><td>{{ $row->name }}</td><td>{{ $row->expenses_count }}</td><td><a class="btn btn-sm btn-outline-primary" href="{{ route('finance.expense-categories.edit',$row) }}">Edit</a><form class="d-inline" method="POST" action="{{ route('finance.expense-categories.destroy',$row) }}" onsubmit="return confirm('Delete category?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button></form></td></tr>@empty<tr><td colspan="3" class="text-center">No categories yet.</td></tr>@endforelse</tbody></table>{{ $rows->links() }}</div>
</div>
@endsection
