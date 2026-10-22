@extends('admin.master')

@section('homeContent')



@php
    $productCount = $products->count();
@endphp

<div class="row">
    <div class="col-md-12">

        <div class="product-card">

            {{-- Header --}}
            <div class="product-header">
                <div>
                    <h3>
                        <i class="fa fa-cubes"
                           style="color:#198754; margin-right:8px;"></i>
                        Product Management
                    </h3>

                    <p>
                        Manage products, pricing, inventory and product information
                    </p>
                </div>

                <div style="display:flex; align-items:center; gap:10px; flex-wrap:wrap;">

                    <span class="product-count">
                        <i class="fa fa-list-ul"></i>
                        Total: {{ $productCount }} Products
                    </span>

                    <a href="{{ url('admin/products/create') }}"
                       class="btn btn-success btn-sm"
                       style="padding:9px 14px; border-radius:8px;">
                        <i class="fa fa-plus"></i> Add Product
                    </a>

                </div>
            </div>

            {{-- Success Message --}}
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show product-alert"
                     role="alert">

                    <strong>
                        <i class="fa fa-check-circle"></i> Success!
                    </strong>

                    {{ session('success') }}

                    <button type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- Validation / Error Message --}}
            @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show product-alert"
                     role="alert">

                    <strong>Error!</strong> {{ session('error') }}

                    <button type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- Product Table --}}
            <div class="product-table-wrapper">

                <table class="product-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Purchase Price (৳)</th>
                            <th>Selling Price (৳)</th>
                            <th>Stock</th>
                            <th>Low Stock At</th>
                            <th>Status</th>
                            <th>Short Description</th>
                            <th>Tags</th>
                            <th>Additional Info</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($products as $product)

                            @php
                                $stock = (int) ($product->stock ?? 0);
                                $lowStockAt = (int) ($product->low_stock_at ?? 0);

                                $categoryValue = $product->category ?? null;

                                $categoryName = is_object($categoryValue)
                                    ? ($categoryValue->name ?? 'N/A')
                                    : ($categoryValue ?: 'N/A');

                                $tagsValue = $product->tags ?? '';

                                $tagsText = is_array($tagsValue)
                                    ? implode(', ', $tagsValue)
                                    : (is_string($tagsValue) ? $tagsValue : '');

                                $additionalInfo = $product->adinfo ?? '';

                                if (is_array($additionalInfo)) {
                                    $additionalInfo = json_encode($additionalInfo);
                                }

                                $isActive = (bool) ($product->is_active ?? false);
                            @endphp

                            <tr>

                                {{-- ID --}}
                                <td>
                                    <span class="product-sku">
                                        {{ $products->firstItem()
                                            ? $products->firstItem() + $loop->index
                                            : $loop->iteration }}
                                    </span>
                                </td>

                                {{-- Product Image --}}
                                <td>
                                    @if($product->thum_img)
                                        <img
                                            src="{{ asset('images/' . basename($product->thum_img ?? '')) }}"
                                            alt="{{ $product->name }}"
                                            class="product-image"
                                            loading="lazy"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-flex';">

                                        <span style="display:none; width:62px; height:62px; align-items:center; justify-content:center; background:#f1f4f9; border-radius:10px;">
                                            <i class="fa fa-image"></i>
                                        </span>
                                    @else
                                        <span style="display:inline-flex; width:62px; height:62px; align-items:center; justify-content:center; background:#f1f4f9; border-radius:10px;">
                                            <i class="fa fa-image" style="font-size:20px; color:#8992a3;"></i>
                                        </span>
                                    @endif
                                </td>

                                {{-- Name --}}
                                <td>
                                    <span class="product-name">
                                        {{ $product->name ?? 'N/A' }}
                                    </span>
                                </td>

                                {{-- SKU --}}
                                <td>
                                    <span class="product-sku">
                                        {{ $product->sku ?? 'N/A' }}
                                    </span>
                                </td>

                                {{-- Category --}}
                                <td>{{ $categoryName }}</td>

                                {{-- Type --}}
                                <td>
                                    <span class="product-sku">
                                        {{ $product->type ?? 'N/A' }}
                                    </span>
                                </td>

                                {{-- Purchase Price --}}
                                <td>
                                    <span class="product-price">
                                        ৳{{ number_format((float) ($product->purchase_price ?? 0), 2) }}
                                    </span>
                                </td>

                                {{-- Selling Price --}}
                                <td>
                                    <span class="product-selling-price">
                                        ৳{{ number_format((float) ($product->selling_price ?? 0), 2) }}
                                    </span>
                                </td>

                                {{-- Stock --}}
                                <td>
                                    @if($stock <= 0)
                                        <span class="product-stock stock-out">
                                            <i class="fa fa-times-circle"></i>
                                            Out of Stock
                                        </span>
                                    @elseif($stock <= $lowStockAt)
                                        <span class="product-stock stock-low">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            Low: {{ $stock }}
                                        </span>
                                    @else
                                        <span class="product-stock stock-normal">
                                            <i class="fa fa-check-circle"></i>
                                            {{ $stock }} Units
                                        </span>
                                    @endif
                                </td>

                                {{-- Low Stock Threshold --}}
                                <td>{{ $lowStockAt }}</td>

                                {{-- Active Status --}}
                                <td>
                                    @if($isActive)
                                        <span class="product-status status-active">
                                            <i class="fa fa-check-circle"></i>
                                            Active
                                        </span>
                                    @else
                                        <span class="product-status status-inactive">
                                            <i class="fa fa-ban"></i>
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                {{-- Short Description --}}
                                <td>
                                    <span class="product-text">
                                        {{ \Illuminate\Support\Str::limit(
                                            $product->short_des ?? '',
                                            80
                                        ) ?: 'N/A' }}
                                    </span>
                                </td>

                                {{-- Tags --}}
                                <td>
                                    <span class="product-tags">
                                        {{ \Illuminate\Support\Str::limit($tagsText, 100) ?: 'N/A' }}
                                    </span>
                                </td>

                                {{-- Additional Information --}}
                                <td>
                                    <span class="product-text">
                                        {{ \Illuminate\Support\Str::limit(
                                            (string) $additionalInfo,
                                            100
                                        ) ?: 'N/A' }}
                                    </span>
                                </td>

                                {{-- Full Description --}}
                                <td>
                                    <span class="product-text">
                                        {{ \Illuminate\Support\Str::limit(
                                            strip_tags($product->description ?? ''),
                                            100
                                        ) ?: 'N/A' }}
                                    </span>
                                </td>

                                {{-- Actions --}}
                                <td>
                                    <div class="product-actions">

                                        {{-- View --}}
                                        <a href="{{ url('admin/products/' . $product->id) }}"
                                           class="product-action-btn view"
                                           title="View Product"
                                           aria-label="View Product">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ url('admin/products/' . $product->id . '/edit') }}"
                                           class="product-action-btn edit"
                                           title="Edit Product"
                                           aria-label="Edit Product">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        {{-- Delete --}}
                                        <form
                                            method="POST"
                                            action="{{ url('admin/products/' . $product->id) }}"
                                            style="display:inline-block; margin:0;"
                                            onsubmit="return confirm('Are you sure you want to delete this product?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="product-action-btn delete"
                                                    title="Delete Product"
                                                    aria-label="Delete Product">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="16" class="product-empty">
                                    <i class="fa fa-cubes"
                                       style="font-size:38px; display:block; margin-bottom:12px;"></i>

                                    <strong>No Products Found</strong>

                                    <p style="margin:8px 0 0;">
                                        Start by adding your first product.
                                    </p>

                                    <a href="{{ url('admin/products/create') }}"
                                       class="btn btn-success btn-sm"
                                       style="margin-top:15px; border-radius:7px;">
                                        <i class="fa fa-plus"></i> Add Product
                                    </a>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Footer --}}
            <div class="product-footer">
                <i class="fa fa-info-circle"></i>
                Product inventory, pricing and status overview.

                <span style="float:right;">
                    Total: {{ $productCount }} Products
                </span>
            </div>

            {{-- Pagination: works when controller uses paginate() --}}
            @if(method_exists($products, 'links') && $products->hasPages())
                <div style="padding:18px 25px;">
                    {{ $products->links() }}
                </div>
            @endif

        </div>

    </div>
</div>

@endsection