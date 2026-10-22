@extends('master')

@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb-area">
    <a href="{{ url('/') }}">Home</a>
    <span class="mx-2">&gt;</span>
    <a href="#">{{ $product->category ?? 'Products' }}</a>
    <span class="mx-2">&gt;</span>
    <span class="text-secondary">{{ $product->name }}</span>
</div>

<div class="container-fluid product-container">
    <div class="row g-4">

        <!-- Product Images -->
        <div class="col-12 col-md-4">
            @php
    $mainImage = !empty($product->thum_img)
        ? asset('images/' . $product->thum_img)
        : 'https://placehold.co/500x500?text=Product';
@endphp



            <div class="text-center">
                <img
                    id="mainImage"
                    class="main-product-image"
                    src="{{ $mainImage }}"
                    alt="{{ $product->name }}">
            </div>

            <div class="d-flex justify-content-center gap-2 mt-3 flex-wrap">
                <img
                    class="thumbnail active"
                    src="{{ $mainImage }}"
                    onclick="changeImage(this)"
                    alt="{{ $product->name }}">

                @foreach($moreimg as $img)
                    <img
                        class="thumbnail"
                        src="{{ asset($img->image) }}"
                        onclick="changeImage(this)"
                        alt="{{ $product->name }} gallery image">
                @endforeach
            </div>
        </div>

        <!-- Product Information -->
        <div class="col-12 col-md-5">
            <h1 class="product-title">{{ $product->name }}</h1>

            <div class="d-flex align-items-center gap-2">
                <span class="rating">★★★★☆</span>
                <span class="rating-text">Reviews</span>
            </div>

            <div class="product-divider"></div>

            <div class="sale-banner">
                <span>SHOCKING SALE</span>
                <span>Special Offer</span>
            </div>

            <div class="stock-status">
                @if(($product->stock ?? 0) > 0)
                    In Stock
                @else
                    Out of Stock
                @endif
            </div>

            <div class="detail-row">
                <div class="detail-label">SKU</div>
                <div>{{ $product->sku ?? 'N/A' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Category</div>
                <div>{{ $product->category ?? 'N/A' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Description</div>
                <div>
                    {!! nl2br(e($product->short_des ?? $product->description ?? '')) !!}
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Product Details</div>
                <div>
                    {!! nl2br(e($product->description ?? '')) !!}
                </div>
            </div>
        </div>


        <!-- Purchase Section -->
        <div class="col-12 col-md-3 purchase-section">

            <div class="d-flex align-items-center gap-2 flex-wrap">
                <span class="price">
                    ৳{{ number_format((float) $product->selling_price, 2) }}
                </span>
            </div>

            <div class="shipping-fee">
                Shipping fee calculated at checkout
            </div>
<form action="{{url('/cart/addtocart')}}" method="post">
              @csrf
           <div class="quantity-box">
    <span class="small">Quantity</span>

    <div class="quantity-control">
    <button type="button" onclick="changeQuantity(-1)">−</button>

    <input
        type="number"
        id="quantity"
        name="qty"
        value="1"
        min="1"
        max="{{ min(50, (int) ($product->stock ?? 0)) }}"
        readonly
        style="width: 50px; text-align: center; border: none; background: transparent;"
    >

    <button type="button" onclick="changeQuantity(1)">+</button>
</div>
</div>

<input type="hidden" name="pid" value="{{ $product->id }}">
<input type="hidden" name="pid" value="{{$product->id}}">
            <button
                type="submit"
                class="btn-cart"
                onclick="addToCart()"
                @if(($product->stock ?? 0) < 1) disabled @endif>
                Add to cart
            </button>
</form>
            <button
                type="button"
                class="btn-buy"
                onclick="buyNow()"
                @if(($product->stock ?? 0) < 1) disabled @endif>
                Buy now
            </button>

            <div class="secure">
                <i class="bi bi-lock me-1"></i>
                Secure transaction
            </div>

            <div class="delivery">
                Delivery information available at checkout.
            </div>

            <button
                type="button"
                class="btn-wishlist"
                onclick="addToWishlist()">
                <i class="bi bi-heart me-2"></i>
                Add to wishlist
            </button>

            <div class="share-links small text-secondary">
                Share:
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                   target="_blank" rel="noopener">
                    <i class="bi bi-facebook text-primary"></i>
                </a>
            </div>
        </div>

    </div>
</div>



@endsection
