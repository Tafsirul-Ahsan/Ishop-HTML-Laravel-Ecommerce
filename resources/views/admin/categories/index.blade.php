@extends('admin.master')

@section('homeContent')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="border-radius:10px;overflow:hidden;">
                <div class="panel-heading" style="display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;padding:18px 20px;">
                    <div>
                        <h3 style="margin:0;font-weight:700;">Product Categories</h3>
                        <p style="margin:6px 0 0;color:#777;">Create and manage categories shown on your website.</p>
                    </div>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Category
                    </a>
                </div>

                <div class="panel-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width:70px;">Image</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Products</th>
                                    <th>Status</th>
                                    <th style="width:210px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>
                                        @if($category->image)
                                            <img src="{{ asset('uploads/categories/'.$category->image) }}" alt="{{ $category->name }}" style="width:48px;height:48px;object-fit:cover;border-radius:6px;">
                                        @else
                                            <span class="text-muted"><i class="fa fa-tags fa-2x"></i></span>
                                        @endif
                                    </td>
                                    <td><strong>{{ $category->name }}</strong></td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->products_count }}</td>
                                    <td>
                                        @if($category->is_active)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-default">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-info btn-xs" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center text-muted" style="padding:30px;">No categories found. Click “Add Category” to create one.</td></tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
