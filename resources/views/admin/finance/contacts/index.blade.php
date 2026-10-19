@extends('admin.master')
@section('title',$title)
@section('homeContent')
@include('finance._design')
<div class="finance-ui">
<div class="finance-page-heading"><div><h2>{{ $title }}</h2><p>Manage and review your finance records</p></div><a class="btn btn-primary" href="{{ route('finance.'.$type.'.create') }}">Add {{ rtrim($title,'s') }}</a></div>
<form class="mb-3"><div class="input-group"><input class="form-control" name="q" value="{{ request('q') }}" placeholder="Search name or phone"><button class="btn btn-outline-secondary">Search</button></div></form>
<div class="card card-soft p-3"><div class="table-responsive"><table class="table"><thead><tr><th>Name</th><th>Phone</th><th>Email</th><th>Address</th><th>Action</th></tr></thead><tbody>@forelse($rows as $row)<tr><td>{{ $row->name }}</td><td>{{ $row->phone ?: '-' }}</td><td>{{ $row->email ?: '-' }}</td><td>{{ $row->address ?: '-' }}</td><td><a class="btn btn-sm btn-outline-primary" href="{{ route('finance.'.$type.'.edit',$row) }}">Edit</a><form class="d-inline" method="POST" action="{{ route('finance.'.$type.'.destroy',$row) }}" onsubmit="return confirm('Delete this record?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button></form></td></tr>@empty<tr><td colspan="5" class="text-center text-secondary">No records found.</td></tr>@endforelse</tbody></table></div>{{ $rows->links() }}</div>
</div>
@endsection
