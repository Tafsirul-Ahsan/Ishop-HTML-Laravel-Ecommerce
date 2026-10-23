@extends('admin.master')

@section('homeContent')
<div class="container-fluid">
    <div class="panel panel-default" style="border-radius:10px;overflow:hidden;">
        <div class="panel-heading" style="display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;padding:18px 20px;">
            <h3 style="margin:0;font-weight:700;">Category Details</h3>
            <div>
                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    @if($category->image)
                        <img src="{{ asset('uploads/categories/'.$category->image) }}" alt="{{ $category->name }}" style="width:100%;max-width:220px;border-radius:10px;object-fit:cover;">
                    @else
                        <div style="height:150px;display:flex;align-items:center;justify-content:center;background:#f5f5f5;border-radius:10px;"><i class="fa fa-tags fa-4x text-muted"></i></div>
                    @endif
                </div>
                <div class="col-md-9">
                    <h2 style="margin-top:0;">{{ $category->name }}</h2>
                    <p><strong>Slug:</strong> {{ $category->slug }}</p>
                    <p><strong>Status:</strong> {{ $category->is_active ? 'Active' : 'Inactive' }}</p>
                    <p><strong>Description:</strong><br>{{ $category->description ?: 'No description provided.' }}</p>
                </div>
            </div>
            <hr>
            <h4>Products in this category</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead><tr><th>Product</th><th>Category</th><th>Price</th></tr></thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->type ?: $product->category }}</td>
                            <td>{{ $product->selling_price ?? $product->price ?? '—' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-muted text-center">No products assigned to this category yet.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
