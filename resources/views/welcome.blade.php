@extends('master')

@section('title', 'Home - iShop Online Shopping')

@section('body_class', 'index')

@section('content')

<main class="container-fluid px-4">

    {{-- ================= HERO BANNER ================= --}}

<section class="main-slider home-section mt-0">
    <div class="slider-wrapper has-right">

        <div class="left flow-hidden">
            <div class="pos-rel">

                <div class="hero-slider" id="heroSlider">

                    <a href="#featured" class="slider-content block">
                        <div class="slider-content-inner">
                            <img
                                class="full-dimen hero-main"
                                src="{{ asset('images/slider-1.webp') }}"
                                alt="iShop featured banner"
                            >
                        </div>
                    </a>

                    <a href="#categories" class="slider-content block">
                        <div class="slider-content-inner">
                            <img
                                class="full-dimen hero-main"
                                src="{{ asset('images/slider-4.webp') }}"
                                alt="Shop categories"
                            >
                        </div>
                    </a>

                    <a href="#featured" class="slider-content block">
                        <div class="slider-content-inner">
                            <img
                                class="full-dimen hero-main"
                                src="{{ asset('images/slider-5.webp') }}"
                                alt="Featured products"
                            >
                        </div>
                    </a>

                </div>

                <button class="hero-arrow hero-prev" type="button"
                        aria-label="Previous slide">
                    &#10094;
                </button>

                <button class="hero-arrow hero-next" type="button"
                        aria-label="Next slide">
                    &#10095;
                </button>

                <div class="hero-dots" id="heroDots">
                    <button class="hero-dot active" aria-label="Slide 1"></button>
                    <button class="hero-dot" aria-label="Slide 2"></button>
                    <button class="hero-dot" aria-label="Slide 3"></button>
                </div>

            </div>
        </div>

        <div class="right">
            <a class="img-wrap block" href="#featured">
                <img src="{{ asset('images/slider-4.webp') }}"
                     alt="Shop products">
            </a>

            <a class="img-wrap block" href="#categories">
                <img src="{{ asset('images/slider-5.webp') }}"
                     alt="Browse categories">
            </a>
        </div>

    </div>
</section>

    {{-- ================= STORE FEATURES ================= --}}
    <section class="static-container flex wrap mb-20 mb-sm-15">

        <div class="site-feature">
    <img src="{{ asset('images/site-feature-1.webp') }}" alt="Rapid shipping" class="feature-icon">
    <span>
        <strong>Rapid shipping</strong>
        <small>Quick delivery options</small>
    </span>
</div>

        
        <div class="site-feature">
    <img src="{{ asset('images/site-feature-2.webp') }}" alt="Rapid shipping" class="feature-icon">
    <span>
        <strong>Secure transaction</strong>
        <small>Checkout securely</small>
    </span>
</div>

        
        <div class="site-feature">
    <img src="{{ asset('images/site-feature-3.webp') }}" alt="Rapid shipping" class="feature-icon">
    <span>
        <strong>
24/7 support</strong>
        <small>Quick delivery options</small>
    </span>
</div>

       
        <div class="site-feature">
    <img src="{{ asset('images/site-feature-4.webp') }}" alt="Rapid shipping" class="feature-icon">
    <span>
        <strong>Bundle offer</strong>
        <small>Quick delivery options</small>
    </span>
</div>

    </section>

    {{-- ================= FLASH SALE ================= --}}
   

 <section class="sale-section">
    <header class="sale-header">
      <h1 class="sale-heading">
        <span>New Year Sale</span>
        <span class="countdown" id="countdown">60:21:45:07</span>
      </h1>
      <a class="show-all" href="#">Show all</a>
    </header>

    <div class="products-wrap">
      <button class="product-arrow product-prev" type="button" aria-label="Previous featured products"><i class="bi bi-chevron-left"></i></button>
      <div class="product-track" id="productTrack">
        @foreach($products as $product)
        <article class="product-card">
            <a href="{{url('/product-details-'.$product->id)}}">
          <div class="product-visual">
            <span class="tag">{{$product->type}}</span>
            <img
    src="{{ asset('images/' . basename($product->thum_img ?? '')) }}"
    alt="{{ $product->name }}"
    onerror="this.onerror=null; this.src='https://placehold.co/500x500?text=Product';"
>
          </div>
          <div class="product-meta"><div class="price-line"><span class="price">${{$product->selling_price}}</span><span class="old-price">$130</span></div><span class="discount">42% off</span></div></a>
        </article>
        @endforeach
      </div>
       <button class="product-arrow product-next" type="button" aria-label="Next featured products"><i class="bi bi-chevron-right"></i></button>
    </div>
  </section>

    {{-- ================= PROMOTIONAL BANNERS ================= --}}
    <section class="product-banner">

    <a href="#featured" class="promo-banner">
        <img src="{{ asset('images/banner-2.webp') }}" alt="Discover products">
        <span>Discover More Products <i class="bi bi-arrow-up-right"></i></span>
    </a>

    <a href="#categories" class="promo-banner">
        <img src="{{ asset('images/banner-3.webp') }}" alt="Browse categories">
        <span>Browse Popular Categories <i class="bi bi-arrow-up-right"></i></span>
    </a>

    <a href="{{ url('/products') }}" class="promo-banner">
        <img src="{{ asset('images/banner-4.webp') }}" alt="Latest collection">
        <span>Explore Latest Collection <i class="bi bi-arrow-up-right"></i></span>
    </a>

</section>



    {{-- ================= FEATURED PRODUCTS ================= --}}
    <section class="sale-section">
    <header class="sale-header">
      <h1 class="sale-heading">Featured products</h1>
    <a href="#featured">Show all</a>
  </header>
  <div class="products-wrapper">
    <button class="product-arrow product-prev" type="button" aria-label="Previous featured products"><i class="bi bi-chevron-left"></i></button>
    <div class="products-track">
         @foreach($products as $product)
      <article class="product-card mt-0">
        <a href="{{url('/product-details-'.$product->id)}}">
        <div class=""><img
    src="{{ asset('images/' . basename($product->thum_img ?? '')) }}"
    alt="{{ $product->name }}"
    onerror="this.onerror=null; this.src='https://placehold.co/500x500?text=Product';"
></div>
        <div class="product-title">{{$product->name}}</div>
        <div class="product-rating"><span class="product-stars">★★★★★</span><span>2 Reviews</span></div>
        <div class="product-prices"><del class="product-old-price">${{$product->old_price}}</del><span class="product-price">${{$product->selling_price}}</span><span class="product-discount">-{{$product->discount}}%</span></div></a>
      </article>
      @endforeach
    </div>
    <button class="product-arrow product-next" type="button" aria-label="Next featured products"><i class="bi bi-chevron-right"></i></button>
  </div>
</section>

<!-- Trending Products -->
<section class="sale-section">
    <header class="sale-header">
      <h1 class="sale-heading">Trending products</h1>
    <a href="#trending">Show all</a>
  </header>
  <div class="products-wrapper">
    <button class="product-arrow product-prev" type="button" aria-label="Previous trending products"><i class="bi bi-chevron-left"></i></button>
    <div class="products-track">
        @foreach($products as $product)
      <article class="product-card">
        <a href="{{url('/product-details-'.$product->id)}}">
        <div class=""><img
    src="{{ asset('images/' . basename($product->thum_img ?? '')) }}"
    alt="{{ $product->name }}"
    onerror="this.onerror=null; this.src='https://placehold.co/500x500?text=Product';"
></div>
        <div class="product-title">{{$product->name}}</div>
        <div class="product-rating"><span class="product-stars">★★★★★</span><span>1 Reviews</span></div>
        <div class="product-prices"><del class="product-old-price">${{$product->old_price}}</del><span class="product-price">${{$product->selling_price}}</span><span class="product-discount">-{{$product->discount}}%</span></div>
    </a>  </article>
      @endforeach
    </div>
    <button class="product-arrow product-next" type="button" aria-label="Next trending products"><i class="bi bi-chevron-right"></i></button>
  </div>
</section>

{{-- ================= CATEGORIES ================= --}}


<section class="featured-categories">
    <header class="categories-header">
        <h2 class="categories-title">Featured Categories</h2>

        <div class="categories-arrows">
            <button
                class="category-nav"
                id="categoriesPrev"
                type="button"
                aria-label="Previous categories"
            >
                <i class="bi bi-chevron-left"></i>
            </button>

            <button
                class="category-nav"
                id="categoriesNext"
                type="button"
                aria-label="Next categories"
            >
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>

        <a href="{{ url('/products?category=all') }}"
           class="categories-show-all">
            Show all
        </a>
    </header>

    <div class="categories-wrap">
    <div class="categories-track" id="categoriesTrack">

        @forelse($categories as $category)
            <a
                class="category-card"
                href="{{ url('/products?category=' . urlencode($category->name)) }}"
            >
                <div class="category-icon">
                    @if(!empty($category->image))
                        <img
                            src="{{ asset('uploads/categories/' . $category->image) }}"
                            alt="{{ $category->name }}"
                            loading="lazy"
                        >
                    @else
                        <i class="bi bi-grid"></i>
                    @endif
                </div>

                <span class="category-name">
                    {{ $category->name }}
                </span>
            </a>
        @empty
            <p class="text-muted">
                No categories available.
            </p>
        @endforelse

    </div>
</div>
    </div>
</section>


    {{-- ================= Top selling products ================= --}}
<section class="top-selling-section">
  <header class="top-selling-header">
    <h2>Top selling products</h2>
    <a href="#top-selling">Show all</a>
  </header>
<div class="top-selling-grid">
    <div class="selling-column">
        @foreach($products as $product)
            <article class="selling-product">
                <div class="selling-image"><img src="{{ asset('images/' . basename($product->thum_img)) }}" alt="Jet Set Hydration Kit"></div>
        <div class="selling-details">
          <a href="#" class="selling-name">{{$product->name}}</a>
          <div class="selling-meta"><del class="selling-old">${{$product->old_price}}</del><span class="selling-price">${{$product->selling_price}}</span><span class="selling-discount">-7%</span><button class="selling-action" type="button" aria-label="Refresh product"><i class="bi bi-arrow-repeat"></i></button></div>
        </div>
            </article>
        @endforeach
    </div>
</div>
  
</section>

    {{-- ================= BRANDS ================= --}}
 




{{-- ================= Banner ================= --}}
<a href="/summer-fashion/products?banner=5" class="block banner-wrapper home-section mt-5 mb-0 br-primary flow-hidden"><img
    src="https://cdn.ishop.cholobangla.com/uploads/banner-5.webp"
    alt="Summer fashion"
    width="100%"
><!----></a>


{{-- ================= Top Products ================= --}}


<div class="home-section daily-discover">
  <div class="area">
    <h4 class="title">Daily Discover</h4>

    <div class="area-content">
      <div class="tile-container">
        <div class="flex wrap align-start discover-area">

          <!-- Product card: existing product markup রাখবে -->
          <div class="p-tile">
            <a
              href="/mama-mio-pregnancy-essentials-kit/product/88630156"
              class="page-link"
              title="Mama Mio Pregnancy Essentials Kit"
              draggable="false"
            >
              <span class="block img-wrapper">
                <span class="badge">Featured</span>

                <button
                  type="button"
                  aria-label="Compare product"
                  class="compare-btn"
                  title="Compare"
                >
                  <i class="bi bi-arrow-repeat"></i>
                </button>

                <img
                  src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-46-1.webp"
                  alt="Mama Mio Pregnancy Essentials Kit"
                  title="Mama Mio Pregnancy Essentials Kit"
                  width="50"
                  height="50"
                  loading="lazy"
                />
              </span>

              <div class="item-title">
                <h5 class="ellipsis ellipsis-2">
                  Mama Mio Pregnancy Essentials Kit
                </h5>

                <span class="block mtb-5">
                  <span title="0 out of 5" class="rating-stars">
                    <span>☆☆☆☆☆</span>
                    <span class="rating" style="width: 0%">
                      ★★★★★
                    </span>
                  </span>

                  <span class="f-10 ml-5 semi-bold color-lite">
                    0 Reviews
                  </span>
                </span>

                <span class="flex wrap start">
                  <h4 class="price-wrapper">
                    <span class="strike-through">
                      <span>$110</span>
                    </span>

                    <span class="price">
                      <span>$100</span>
                    </span>
                  </h4>

                  <span class="discount ml-10">-10%</span>
                </span>
              </div>
            </a>
          </div>

          <!-- বাকি সব existing .p-tile product এখানে রাখবে -->
 <div class="p-tile">
            <a
              href="/mama-mio-pregnancy-essentials-kit/product/88630156"
              class="page-link"
              title="Mama Mio Pregnancy Essentials Kit"
              draggable="false"
            >
              <span class="block img-wrapper">
                <span class="badge">Featured</span>

                <button
                  type="button"
                  aria-label="Compare product"
                  class="compare-btn"
                  title="Compare"
                >
                  <i class="bi bi-arrow-repeat"></i>
                </button>

                <img
                  src="{{asset('images/pro-2.webp')}}"
                  alt="Mama Mio Pregnancy Essentials Kit"
                  title="Mama Mio Pregnancy Essentials Kit"
                  width="50"
                  height="50"
                  loading="lazy"
                />
              </span>

              <div class="item-title">
                <h5 class="ellipsis ellipsis-2">
                  Mama Mio Pregnancy Essentials Kit
                </h5>

                <span class="block mtb-5">
                  <span title="0 out of 5" class="rating-stars">
                    <span>☆☆☆☆☆</span>
                    <span class="rating" style="width: 0%">
                      ★★★★★
                    </span>
                  </span>

                  <span class="f-10 ml-5 semi-bold color-lite">
                    0 Reviews
                  </span>
                </span>

                <span class="flex wrap start">
                  <h4 class="price-wrapper">
                    <span class="strike-through">
                      <span>$110</span>
                    </span>

                    <span class="price">
                      <span>$100</span>
                    </span>
                  </h4>

                  <span class="discount ml-10">-10%</span>
                </span>
              </div>
            </a>
          </div>
           <div class="p-tile">
            <a
              href="/mama-mio-pregnancy-essentials-kit/product/88630156"
              class="page-link"
              title="Mama Mio Pregnancy Essentials Kit"
              draggable="false"
            >
              <span class="block img-wrapper">
                <span class="badge">Featured</span>

                <button
                  type="button"
                  aria-label="Compare product"
                  class="compare-btn"
                  title="Compare"
                >
                  <i class="icon reload-icon"></i>
                </button>

                <img
                  src="{{asset('images/pro-3.webp')}}"
                  alt="Mama Mio Pregnancy Essentials Kit"
                  title="Mama Mio Pregnancy Essentials Kit"
                  width="50"
                  height="50"
                  loading="lazy"
                />
              </span>

              <div class="item-title">
                <h5 class="ellipsis ellipsis-2">
                  Mama Mio Pregnancy Essentials Kit
                </h5>

                <span class="block mtb-5">
                  <span title="0 out of 5" class="rating-stars">
                    <span>☆☆☆☆☆</span>
                    <span class="rating" style="width: 0%">
                      ★★★★★
                    </span>
                  </span>

                  <span class="f-10 ml-5 semi-bold color-lite">
                    0 Reviews
                  </span>
                </span>

                <span class="flex wrap start">
                  <h4 class="price-wrapper">
                    <span class="strike-through">
                      <span>$110</span>
                    </span>

                    <span class="price">
                      <span>$100</span>
                    </span>
                  </h4>

                  <span class="discount ml-10">-10%</span>
                </span>
              </div>
            </a>
          </div>

           <div class="p-tile">
            <a
              href="/mama-mio-pregnancy-essentials-kit/product/88630156"
              class="page-link"
              title="Mama Mio Pregnancy Essentials Kit"
              draggable="false"
            >
              <span class="block img-wrapper">
                <span class="badge">Featured</span>

                <button
                  type="button"
                  aria-label="Compare product"
                  class="compare-btn"
                  title="Compare"
                >
                  <i class="icon reload-icon"></i>
                </button>

                <img
                  src="{{asset('images/pro-4.webp')}}"
                  alt="Mama Mio Pregnancy Essentials Kit"
                  title="Mama Mio Pregnancy Essentials Kit"
                  width="50"
                  height="50"
                  loading="lazy"
                />
              </span>

              <div class="item-title">
                <h5 class="ellipsis ellipsis-2">
                  Mama Mio Pregnancy Essentials Kit
                </h5>

                <span class="block mtb-5">
                  <span title="0 out of 5" class="rating-stars">
                    <span>☆☆☆☆☆</span>
                    <span class="rating" style="width: 0%">
                      ★★★★★
                    </span>
                  </span>

                  <span class="f-10 ml-5 semi-bold color-lite">
                    0 Reviews
                  </span>
                </span>

                <span class="flex wrap start">
                  <h4 class="price-wrapper">
                    <span class="strike-through">
                      <span>$110</span>
                    </span>

                    <span class="price">
                      <span>$100</span>
                    </span>
                  </h4>

                  <span class="discount ml-10">-10%</span>
                </span>
              </div>
            </a>
          </div>

           <div class="p-tile">
            <a
              href="/mama-mio-pregnancy-essentials-kit/product/88630156"
              class="page-link"
              title="Mama Mio Pregnancy Essentials Kit"
              draggable="false"
            >
              <span class="block img-wrapper">
                <span class="badge">Featured</span>

                <button
                  type="button"
                  aria-label="Compare product"
                  class="compare-btn"
                  title="Compare"
                >
                  <i class="icon reload-icon"></i>
                </button>

                <img
                  src="{{asset('images/pro-5.webp')}}"
                  alt="Mama Mio Pregnancy Essentials Kit"
                  title="Mama Mio Pregnancy Essentials Kit"
                  width="50"
                  height="50"
                  loading="lazy"
                />
              </span>

              <div class="item-title">
                <h5 class="ellipsis ellipsis-2">
                  Mama Mio Pregnancy Essentials Kit
                </h5>

                <span class="block mtb-5">
                  <span title="0 out of 5" class="rating-stars">
                    <span>☆☆☆☆☆</span>
                    <span class="rating" style="width: 0%">
                      ★★★★★
                    </span>
                  </span>

                  <span class="f-10 ml-5 semi-bold color-lite">
                    0 Reviews
                  </span>
                </span>

                <span class="flex wrap start">
                  <h4 class="price-wrapper">
                    <span class="strike-through">
                      <span>$110</span>
                    </span>

                    <span class="price">
                      <span>$100</span>
                    </span>
                  </h4>

                  <span class="discount ml-10">-10%</span>
                </span>
              </div>
            </a>
          </div>
           <div class="p-tile">
            <a
              href="/mama-mio-pregnancy-essentials-kit/product/88630156"
              class="page-link"
              title="Mama Mio Pregnancy Essentials Kit"
              draggable="false"
            >
              <span class="block img-wrapper">
                <span class="badge">Featured</span>

                <button
                  type="button"
                  aria-label="Compare product"
                  class="compare-btn"
                  title="Compare"
                >
                  <i class="icon reload-icon"></i>
                </button>

                <img
                  src="{{asset('images/pro-6.webp')}}"
                  alt="Mama Mio Pregnancy Essentials Kit"
                  title="Mama Mio Pregnancy Essentials Kit"
                  width="50"
                  height="50"
                  loading="lazy"
                />
              </span>

              <div class="item-title">
                <h5 class="ellipsis ellipsis-2">
                  Mama Mio Pregnancy Essentials Kit
                </h5>

                <span class="block mtb-5">
                  <span title="0 out of 5" class="rating-stars">
                    <span>☆☆☆☆☆</span>
                    <span class="rating" style="width: 0%">
                      ★★★★★
                    </span>
                  </span>

                  <span class="f-10 ml-5 semi-bold color-lite">
                    0 Reviews
                  </span>
                </span>

                <span class="flex wrap start">
                  <h4 class="price-wrapper">
                    <span class="strike-through">
                      <span>$110</span>
                    </span>

                    <span class="price">
                      <span>$100</span>
                    </span>
                  </h4>

                  <span class="discount ml-10">-10%</span>
                </span>
              </div>
            </a>
          </div>

           <div class="p-tile">
            <a
              href="/mama-mio-pregnancy-essentials-kit/product/88630156"
              class="page-link"
              title="Mama Mio Pregnancy Essentials Kit"
              draggable="false"
            >
              <span class="block img-wrapper">
                <span class="badge">Featured</span>

                <button
                  type="button"
                  aria-label="Compare product"
                  class="compare-btn"
                  title="Compare"
                >
                  <i class="icon reload-icon"></i>
                </button>

                <img
                  src="{{asset('images/pro-7.webp')}}"
                  alt="Mama Mio Pregnancy Essentials Kit"
                  title="Mama Mio Pregnancy Essentials Kit"
                  width="50"
                  height="50"
                  loading="lazy"
                />
              </span>

              <div class="item-title">
                <h5 class="ellipsis ellipsis-2">
                  Mama Mio Pregnancy Essentials Kit
                </h5>

                <span class="block mtb-5">
                  <span title="0 out of 5" class="rating-stars">
                    <span>☆☆☆☆☆</span>
                    <span class="rating" style="width: 0%">
                      ★★★★★
                    </span>
                  </span>

                  <span class="f-10 ml-5 semi-bold color-lite">
                    0 Reviews
                  </span>
                </span>

                <span class="flex wrap start">
                  <h4 class="price-wrapper">
                    <span class="strike-through">
                      <span>$110</span>
                    </span>

                    <span class="price">
                      <span>$100</span>
                    </span>
                  </h4>

                  <span class="discount ml-10">-10%</span>
                </span>
              </div>
            </a>
          </div>
           <div class="p-tile">
            <a
              href="/mama-mio-pregnancy-essentials-kit/product/88630156"
              class="page-link"
              title="Mama Mio Pregnancy Essentials Kit"
              draggable="false"
            >
              <span class="block img-wrapper">
                <span class="badge">Featured</span>

                <button
                  type="button"
                  aria-label="Compare product"
                  class="compare-btn"
                  title="Compare"
                >
                  <i class="icon reload-icon"></i>
                </button>

                <img
                  src="{{asset('images/pro-2.webp')}}"
                  alt="Mama Mio Pregnancy Essentials Kit"
                  title="Mama Mio Pregnancy Essentials Kit"
                  width="50"
                  height="50"
                  loading="lazy"
                />
              </span>

              <div class="item-title">
                <h5 class="ellipsis ellipsis-2">
                  Mama Mio Pregnancy Essentials Kit
                </h5>

                <span class="block mtb-5">
                  <span title="0 out of 5" class="rating-stars">
                    <span>☆☆☆☆☆</span>
                    <span class="rating" style="width: 0%">
                      ★★★★★
                    </span>
                  </span>

                  <span class="f-10 ml-5 semi-bold color-lite">
                    0 Reviews
                  </span>
                </span>

                <span class="flex wrap start">
                  <h4 class="price-wrapper">
                    <span class="strike-through">
                      <span>$110</span>
                    </span>

                    <span class="price">
                      <span>$100</span>
                    </span>
                  </h4>

                  <span class="discount ml-10">-10%</span>
                </span>
              </div>
            </a>
          </div>
           <div class="p-tile">
            <a
              href="/mama-mio-pregnancy-essentials-kit/product/88630156"
              class="page-link"
              title="Mama Mio Pregnancy Essentials Kit"
              draggable="false"
            >
              <span class="block img-wrapper">
                <span class="badge">Featured</span>

                <button
                  type="button"
                  aria-label="Compare product"
                  class="compare-btn"
                  title="Compare"
                >
                  <i class="icon reload-icon"></i>
                </button>

                <img
                  src="{{asset('images/pro-8.webp')}}"
                  alt="Mama Mio Pregnancy Essentials Kit"
                  title="Mama Mio Pregnancy Essentials Kit"
                  width="50"
                  height="50"
                  loading="lazy"
                />
              </span>

              <div class="item-title">
                <h5 class="ellipsis ellipsis-2">
                  Mama Mio Pregnancy Essentials Kit
                </h5>

                <span class="block mtb-5">
                  <span title="0 out of 5" class="rating-stars">
                    <span>☆☆☆☆☆</span>
                    <span class="rating" style="width: 0%">
                      ★★★★★
                    </span>
                  </span>

                  <span class="f-10 ml-5 semi-bold color-lite">
                    0 Reviews
                  </span>
                </span>

                <span class="flex wrap start">
                  <h4 class="price-wrapper">
                    <span class="strike-through">
                      <span>$110</span>
                    </span>

                    <span class="price">
                      <span>$100</span>
                    </span>
                  </h4>

                  <span class="discount ml-10">-10%</span>
                </span>
              </div>
            </a>
          </div>
           <div class="p-tile">
            <a
              href="/mama-mio-pregnancy-essentials-kit/product/88630156"
              class="page-link"
              title="Mama Mio Pregnancy Essentials Kit"
              draggable="false"
            >
              <span class="block img-wrapper">
                <span class="badge">Featured</span>

                <button
                  type="button"
                  aria-label="Compare product"
                  class="compare-btn"
                  title="Compare"
                >
                  <i class="icon reload-icon"></i>
                </button>

                <img
                  src="{{asset('images/pro-7.webp')}}"
                  alt="Mama Mio Pregnancy Essentials Kit"
                  title="Mama Mio Pregnancy Essentials Kit"
                  width="50"
                  height="50"
                  loading="lazy"
                />
              </span>

              <div class="item-title">
                <h5 class="ellipsis ellipsis-2">
                  Mama Mio Pregnancy Essentials Kit
                </h5>

                <span class="block mtb-5">
                  <span title="0 out of 5" class="rating-stars">
                    <span>☆☆☆☆☆</span>
                    <span class="rating" style="width: 0%">
                      ★★★★★
                    </span>
                  </span>

                  <span class="f-10 ml-5 semi-bold color-lite">
                    0 Reviews
                  </span>
                </span>

                <span class="flex wrap start">
                  <h4 class="price-wrapper">
                    <span class="strike-through">
                      <span>$110</span>
                    </span>

                    <span class="price">
                      <span>$100</span>
                    </span>
                  </h4>

                  <span class="discount ml-10">-10%</span>
                </span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="center-text show-more-btn">
      <a
        href="/daily-discover/products"
        class="w-100 br-primary outline-btn btn-lg plr-35 plr-sm-20 "
      >
        Show More
      </a>
    </div>
  </div>
</div>

{{-- ================= SUBSCRIPTION ================= --}}

<a href="/summer-fashion/products?banner=5" class="block banner-wrapper home-section mb-0 mt-0 br-primary flow-hidden"><img src="https://cdn.ishop.cholobangla.com/uploads/banner-6.webp" alt="Summer fashion" height="100% !important;" width="100% !important;"><!----></a>

{{-- Newsletter Section --}}

<section class="newsletter-section">
  <div class="newsletter-container">
    <div class="newsletter-content">
      <div class="newsletter-icon">
        <i class="icon email-icon"></i>
      </div>

      <div class="newsletter-text">
        <h3>Subscribe to our Newsletter</h3>
        <p>
          Get the latest deals, new arrivals and exclusive offers
          delivered straight to your inbox.
        </p>
      </div>
    </div>

    <form class="newsletter-form">
      <div class="newsletter-input-wrap">
        <i class="icon email-icon"></i>
        <input
          type="email"
          name="email"
          placeholder="Enter your email address"
          aria-label="Your email address"
          required
        />
      </div>

      <button type="submit" class="newsletter-button">
        Subscribe
        <span aria-hidden="true">→</span>
      </button>
    </form>

    
  </div>
</section>

</main>

@endsection
