@extends('admin.master')

@section('title', $product->exists ? 'Edit Product' : 'Add Product')

@section('homeContent')

@include('finance._design')

<style>
    .finance-ui .product-card {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, .06);
        margin: 20px 0;
        overflow: hidden;
    }

    .finance-ui .product-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding: 22px 25px;
        border-bottom: 1px solid #edf0f5;
    }

    .finance-ui .product-header h3 {
        margin: 0;
        color: #253047;
        font-size: 23px;
        font-weight: 700;
    }

    .finance-ui .product-header p {
        margin: 6px 0 0;
        color: #8992a3;
        font-size: 13px;
    }

    .finance-ui .product-header-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        margin-right: 10px;
        color: #198754;
        background: #e7f8ee;
        border-radius: 12px;
    }

    .finance-ui .product-form-body {
        padding: 25px;
    }

    .finance-ui .product-section-title {
        margin: 8px 0 22px;
        padding-bottom: 12px;
        border-bottom: 1px solid #edf0f5;
        color: #344767;
        font-size: 15px;
        font-weight: 700;
    }

    .finance-ui .form-group {
        margin-bottom: 20px;
    }

    .finance-ui .form-label {
        display: block;
        margin-bottom: 8px;
        color: #536078;
        font-size: 13px;
        font-weight: 600;
    }

    .finance-ui .form-control,
    .finance-ui .custom-select {
        min-height: 43px;
        border: 1px solid #e1e6ef;
        border-radius: 8px;
        color: #344767;
        font-size: 13px;
        box-shadow: none;
    }

    .finance-ui textarea.form-control {
        min-height: 100px;
    }

    .finance-ui .form-control:focus,
    .finance-ui .custom-select:focus {
        border-color: #198754;
        box-shadow: 0 0 0 3px rgba(25, 135, 84, .09);
    }

    .finance-ui input[type="file"].form-control {
        height: auto;
        padding: 9px;
        background: #fafbfe;
    }

    .finance-ui .product-help {
        display: block;
        margin-top: 6px;
        color: #8992a3;
        font-size: 11px;
    }

    .finance-ui .product-image-preview {
        display: block;
        width: 95px;
        height: 95px;
        object-fit: cover;
        margin-top: 10px;
        padding: 3px;
        border: 1px solid #e1e6ef;
        border-radius: 10px;
    }

    .finance-ui .product-footer {
        display: flex;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: 10px;
        padding: 18px 25px;
        background: #fafbfe;
        border-top: 1px solid #edf0f5;
    }

    .finance-ui .product-save-btn {
        padding: 11px 23px;
        border: 1px solid #198754;
        border-radius: 8px;
        background: #198754;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
    }

    .finance-ui .product-save-btn:hover {
        background: #157347;
        color: #fff;
    }

    .finance-ui .product-cancel-btn {
        padding: 11px 20px;
        border: 1px solid #e1e6ef;
        border-radius: 8px;
        background: #fff;
        color: #536078;
        font-size: 13px;
        text-decoration: none;
    }

    .finance-ui .product-alert {
        margin: 20px 25px 0;
        border-radius: 10px;
    }

    .finance-ui .product-check {
        padding: 14px;
        border: 1px solid #edf0f5;
        border-radius: 9px;
        background: #fafbfe;
    }

    @media (max-width: 767px) {
        .finance-ui .product-header {
            padding: 18px;
        }

        .finance-ui .product-header h3 {
            font-size: 20px;
        }

        .finance-ui .product-form-body {
            padding: 18px;
        }

        .finance-ui .product-footer {
            padding: 15px;
        }

        .finance-ui .product-alert {
            margin: 15px 15px 0;
        }
    }
</style>

@php
    $isEdit = $product->exists;
@endphp

<div class="finance-ui">
    <div class="product-card">

        {{-- Header --}}
        <div class="product-header">
            <div>
                <h3>
                    <span class="product-header-icon">
                        <i class="fa fa-cube"></i>
                    </span>
                    {{ $isEdit ? 'Edit Product' : 'Add Product' }}
                </h3>
                <p>Manage product details, pricing and inventory</p>
            </div>

            <span class="badge badge-light"
                  style="padding:10px 14px;color:#536078;font-size:12px;">
                <i class="fa fa-database"></i>
                Product Inventory
            </span>
        </div>

        {{-- Success message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show product-alert"
                 role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close"
                        data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {{-- Validation errors --}}
        @if($errors->any())
            <div class="alert alert-danger product-alert">
                <strong>Please correct the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ $isEdit
                  ? route('finance.products.update', $product)
                  : route('finance.products.store') }}"
              enctype="multipart/form-data">

            @csrf

            @if($isEdit)
                @method('PUT')
            @endif

            <div class="product-form-body">

                {{-- Product information --}}
                <h5 class="product-section-title">
                    <i class="fa fa-info-circle mr-2"></i>
                    Basic Product Information
                </h5>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="name">
                                Product Name *
                            </label>

                            <input type="text"
                                   id="name"
                                   name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $product->name) }}"
                                   placeholder="Enter product name"
                                   required>

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="sku">
                                SKU / Product Code
                            </label>

                            <input type="text"
                                   id="sku"
                                   name="sku"
                                   class="form-control @error('sku') is-invalid @enderror"
                                   value="{{ old('sku', $product->sku) }}"
                                   placeholder="Enter unique SKU">

                            @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="category">
                                Category
                            </label>

                            <input type="text"
                                   id="category"
                                   name="category"
                                   class="form-control @error('category') is-invalid @enderror"
                                   value="{{ old('category', $product->category) }}"
                                   placeholder="Enter product category">

                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="type">
                                Product Type *
                            </label>

                            <input type="text"
                                   id="type"
                                   name="type"
                                   class="form-control @error('type') is-invalid @enderror"
                                   value="{{ old('type', $product->type) }}"
                                   placeholder="Enter product type"
                                   required>

                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Pricing --}}
                <h5 class="product-section-title">
                    <i class="fa fa-money mr-2"></i>
                    Pricing Information
                </h5>

                <div class="row">
                    @foreach([
                        ['purchase_price', 'Purchase Price (৳)', 0],
                        ['selling_price', 'Selling Price (৳)', 0],
                    ] as [$field, $label, $default])
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="{{ $field }}">
                                    {{ $label }} *
                                </label>

                                <input type="number"
                                       step="0.01"
                                       min="0"
                                       id="{{ $field }}"
                                       name="{{ $field }}"
                                       class="form-control @error($field) is-invalid @enderror"
                                       value="{{ old($field, $product->{$field} ?? $default) }}"
                                       placeholder="0.00"
                                       required>

                                @error($field)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Stock --}}
                <h5 class="product-section-title">
                    <i class="fa fa-cubes mr-2"></i>
                    Stock & Inventory
                </h5>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="stock">
                                Opening Stock *
                            </label>

                            <input type="number"
                                   min="0"
                                   step="1"
                                   id="stock"
                                   name="stock"
                                   class="form-control @error('stock') is-invalid @enderror"
                                   value="{{ old('stock', $product->stock ?? 0) }}"
                                   required>

                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="low_stock_at">
                                Low Stock Alert At *
                            </label>

                            <input type="number"
                                   min="0"
                                   step="1"
                                   id="low_stock_at"
                                   name="low_stock_at"
                                   class="form-control @error('low_stock_at') is-invalid @enderror"
                                   value="{{ old('low_stock_at', $product->low_stock_at ?? 5) }}"
                                   required>

                            @error('low_stock_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="qty">
                                Quantity Label *
                            </label>

                            <input type="text"
                                   id="qty"
                                   name="qty"
                                   class="form-control @error('qty') is-invalid @enderror"
                                   value="{{ old('qty', $product->qty) }}"
                                   placeholder="e.g. 1 piece, 500g"
                                   required>

                            @error('qty')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <small class="product-help">
                                This is your existing database's string quantity field.
                            </small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group product-check">
                            <div class="form-check">
                                <input type="checkbox"
                                       class="form-check-input"
                                       name="is_active"
                                       value="1"
                                       id="is_active"
                                       @checked((bool) old('is_active', $product->is_active ?? true))>

                                <label class="form-check-label"
                                       for="is_active">
                                    Active Product
                                </label>
                            </div>

                            <small class="product-help">
                                Enable or disable product availability.
                            </small>
                        </div>
                    </div>
                </div>

                {{-- Images --}}
                <h5 class="product-section-title">
                    <i class="fa fa-image mr-2"></i>
                    Product Images
                </h5>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="thum_img">
                                Thumbnail Image {{ $isEdit ? '' : '*' }}
                            </label>

                            <input type="file"
                                   id="thum_img"
                                   name="thum_img"
                                   accept="image/*"
                                   class="form-control @error('thum_img') is-invalid @enderror"
                                   {{ $isEdit ? '' : 'required' }}>

                            @error('thum_img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if($isEdit && $product->thum_img)
                                <img
                                    src="{{ asset('uploads/' . $product->thum_img) }}"
                                    alt="Current product image"
                                    class="product-image-preview"
                                    id="current-image">
                            @endif

                            <img src=""
                                 alt="Image preview"
                                 class="product-image-preview"
                                 id="image-preview"
                                 style="display:none;">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="moreimg">
                                Additional Images
                            </label>

                            <input type="file"
                                   id="moreimg"
                                   name="moreimg[]"
                                   multiple
                                   accept="image/*"
                                   class="form-control">

                            <small class="product-help">
                                Optional. Select multiple images if needed.
                                Existing additional images are not modified by this field.
                            </small>
                        </div>
                    </div>
                </div>

                {{-- Product details --}}
                <h5 class="product-section-title">
                    <i class="fa fa-file-text-o mr-2"></i>
                    Product Details & Description
                </h5>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="tags">
                                Tags
                            </label>

                            <input type="text"
                                   id="tags"
                                   name="tags"
                                   class="form-control @error('tags') is-invalid @enderror"
                                   value="{{ old('tags', $product->tags) }}"
                                   placeholder="e.g. beauty, cosmetics, skincare">

                            @error('tags')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <small class="product-help">
                                Enter comma-separated tags.
                            </small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="adinfo">
                                Product Weight / Additional Info
                            </label>

                            <textarea id="adinfo"
                                      name="adinfo"
                                      class="form-control @error('adinfo') is-invalid @enderror"
                                      placeholder="Enter product weight or extra information">{{ old('adinfo', $product->adinfo) }}</textarea>

                            @error('adinfo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="short_des">
                                Short Description
                            </label>

                            <textarea id="short_des"
                                      name="short_des"
                                      class="form-control @error('short_des') is-invalid @enderror"
                                      placeholder="Enter a short product description">{{ old('short_des', $product->short_des) }}</textarea>

                            @error('short_des')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="description">
                                Full Description *
                            </label>

                            <textarea id="description"
                                      name="description"
                                      class="form-control @error('description') is-invalid @enderror"
                                      placeholder="Enter full product description"
                                      required>{{ old('description', $product->description) }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>

            {{-- Footer --}}
            <div class="product-footer">
                <a href="{{ route('finance.products.index') }}"
                   class="product-cancel-btn">
                    <i class="fa fa-arrow-left mr-1"></i>
                    Cancel
                </a>

                <button type="submit" class="product-save-btn">
                    <i class="fa fa-save mr-1"></i>
                    {{ $isEdit ? 'Update Product' : 'Save Product' }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('libjs')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('thum_img');
    const preview = document.getElementById('image-preview');
    const current = document.getElementById('current-image');

    if (input && preview) {
        input.addEventListener('change', function () {
            const file = this.files && this.files[0];

            if (!file) {
                preview.src = '';
                preview.style.display = 'none';

                if (current) {
                    current.style.display = 'block';
                }

                return;
            }

            if (!file.type.startsWith('image/')) {
                this.value = '';
                preview.src = '';
                preview.style.display = 'none';
                alert('Please select a valid image file.');
                return;
            }

            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';

            if (current) {
                current.style.display = 'none';
            }
        });
    }
});
</script>
@endsection
