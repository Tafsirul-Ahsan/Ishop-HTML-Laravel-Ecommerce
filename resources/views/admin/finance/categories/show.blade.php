@extends('admin.master')
@section('title','View Expense Category')
@section('homeContent')

<div class="finance-ui">
    <div class="finance-page-heading">
        <div>
            <h2>Expense Category Details</h2>
            <p>View category information and related expenses</p>
        </div>
        <div>
            <a href="{{ route('finance.expense-categories.edit', $row) }}" class="btn btn-primary">Edit Category</a>
            <a href="{{ route('finance.expense-categories.index') }}" class="btn btn-light">Back to Categories</a>
        </div>
    </div>

    <div class="card card-soft p-4 mb-4">
        <div class="row">
            <div class="col-md-6">
                <p class="text-muted mb-1">Category Name</p>
                <h4>{{ $row->name }}</h4>
            </div>
            <div class="col-md-6">
                <p class="text-muted mb-1">Number of Expenses</p>
                <h4>{{ $row->expenses_count }}</h4>
            </div>
        </div>
    </div>

    <div class="card card-soft p-3">
        <h4 class="mb-3">Related Expenses</h4>
        <div class="table-responsive">
            <table class="table">
                <thead><tr><th>Date</th><th>Description</th><th>Amount</th></tr></thead>
                <tbody>
                    @forelse($expenses as $expense)
                        <tr>
                            <td>{{ optional($expense->expense_date ?? $expense->date ?? $expense->created_at)->format('d M Y') }}</td>
                            <td>{{ $expense->description ?? $expense->title ?? '—' }}</td>
                            <td>{{ number_format((float) ($expense->amount ?? 0), 2) }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center">No expenses have been recorded under this category.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $expenses->links() }}
    </div>
</div>
@endsection
