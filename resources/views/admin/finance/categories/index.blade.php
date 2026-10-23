@extends('admin.master')
@section('title','Expense Categories')
@section('homeContent')

<div class="finance-ui">
    <div class="finance-page-heading">
        <div>
            <h2>Expense Categories</h2>
            <p>Manage and review your finance records</p>
        </div>
        <a href="{{ route('finance.expense-categories.create') }}" class="btn btn-primary">Add Category</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif

    <div class="card card-soft p-3">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr><th>Name</th><th>Expenses</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    @forelse($rows as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->expenses_count }}</td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-outline-info" href="{{ route('finance.expense-categories.show', $row) }}">View</a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('finance.expense-categories.edit', $row) }}">Edit</a>
                                <form class="d-inline" method="POST" action="{{ route('finance.expense-categories.destroy', $row) }}" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center">No categories yet. Click “Add Category” to create one.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $rows->links() }}
    </div>
</div>
@endsection
