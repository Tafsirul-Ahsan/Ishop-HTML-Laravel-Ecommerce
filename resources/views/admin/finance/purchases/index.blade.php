@extends('admin.master')
@section('title','Purchases')
@section('homeContent')

<div class="finance-ui">
<div class="finance-page-heading"><div><h2>Purchases / Stock In</h2><p>Manage and review your finance records</p></div><a href="{{ route('finance.purchases.create') }}" class="btn btn-primary">+ New Purchase</a></div>
<form class="card card-soft p-3 mb-3"><div class="row g-2 align-items-end"><div class="col-md-4"><label class="form-label">From</label><input class="form-control" type="date" name="from" value="{{ request('from') }}"></div><div class="col-md-4"><label class="form-label">To</label><input class="form-control" type="date" name="to" value="{{ request('to') }}"></div><div class="col-md-4"><button class="btn btn-outline-primary">Filter</button></div></div></form>
<div class="card card-soft p-3"><div class="mb-3 fw-semibold">Total: ৳{{ number_format($total,2) }}</div><div class="table-responsive"><table class="table"><thead><tr><th>Purchase No.</th><th>Date</th><th>Supplier</th><th>Total</th><th>Paid</th><th>Due</th><th>Action</th></tr></thead><tbody>@forelse($purchases as $p)<tr><td>{{ $p->purchase_no }}</td><td>{{ $p->purchase_date->format('d M Y') }}</td><td>{{ $p->supplier->name ?? '-' }}</td><td>৳{{ number_format($p->total,2) }}</td><td>৳{{ number_format($p->paid_amount,2) }}</td><td>৳{{ number_format($p->total-$p->paid_amount,2) }}</td><td><a class="btn btn-sm btn-outline-primary" href="{{ route('finance.purchases.show',$p) }}">View</a><form class="d-inline" method="POST" action="{{ route('finance.purchases.destroy',$p) }}" onsubmit="return confirm('Delete purchase and reduce stock?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button></form></td></tr>@empty<tr><td colspan="7" class="text-center">No purchases yet.</td></tr>@endforelse</tbody></table></div>{{ $purchases->links() }}</div>
</div>
@endsection
