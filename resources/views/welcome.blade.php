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

                    <a href="#featured" class="slider-content block">
                        <div class="slider-content-inner">

                            <img
                                class="full-dimen hero-main"
                                src="{{asset('images/slider-1.webp')}}"
                                alt="iShop featured banner"
                            >

                        </div>
                    </a>

                </div>
            </div>

            <div class="right">

                <a class="img-wrap block" href="#featured">
                    <img
                        src="{{asset('images/slider-4.webp')}}"
                        alt="Shop products"
                    >
                </a>

                <a class="img-wrap block" href="#categories">
                    <img
                        src="{{asset('images/slider-5.webp')}}"
                        alt="Browse categories"
                    >
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
    <section class="area home-section" id="flash-sale">

        <div class="flex sided title">
            <h4>Best Sellers</h4>

            <a class="link" href="{{ url('/flash-sale') }}">
                Show all <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="area-content product-row">

            @forelse(($products ?? collect()) as $product)

                <article class="product-tile">

                    <a href="{{ url('/product/' . $product->id) }}">

                        <img
                            src="{{asset('images/pro-1.webp')}}"
                            alt="{{ $product->name }}"
                        >

                    </a>

                    <p class="muted">
                        {{ $product->category ?? $product->type ?? 'Product' }}
                    </p>

                    <h3>
                        <a href="{{ url('/product/' . $product->id) }}">
                            {{ $product->name }}
                        </a>
                    </h3>

                    <strong>
                        ৳ {{ number_format((float) ($product->selling_price ?? $product->price ?? 0), 2) }}
                    </strong>

                    <a href="{{ url('/product-details-' . $product->id) }}"
                       class="btn btn-outline-primary add-cart">
                        View Product
                    </a>

                </article>

            @empty

                <p>No products available right now.</p>

            @endforelse

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
    <section class="area home-section" id="featured">

        <div class="flex sided title">

            <h4>Food Supplement</h4>

            <a class="link" href="{{ url('/products') }}">
                Show all <i class="bi bi-arrow-right"></i>
            </a>

        </div>

        <div class="product-row">

            @forelse(($items ?? collect()) as $product)

                <article class="product-tile">

                    <a href="{{ url('/product/' . $product->id) }}">

                        <img
                            src="{{asset('images/pro-2.webp')}}"
                            alt="{{ $product->name }}"
                        >

                    </a>

                    <p class="muted">
                        {{ $product->category ?? $product->type ?? 'Category' }}
                    </p>

                    <h3>
                        <a href="{{ url('/product/' . $product->id) }}">
                            {{ $product->name }}
                        </a>
                    </h3>

                    <strong>
                        ৳ {{ number_format((float) ($product->selling_price ?? $product->price ?? 0), 2) }}
                    </strong>

                    <a href="{{ url('/product/' . $product->id) }}"
                       class="btn btn-outline-primary add-cart">
                        View Product
                    </a>

                </article>

            @empty

                <p>No featured products available.</p>

            @endforelse

        </div>

    </section>

    {{-- ================= CATEGORIES ================= --}}
    <section class="static-container flex wrap mb-20 mb-sm-15 col-md-12">

        <div class="site-feature">
    <img src="{{ asset('images/cat-1.webp') }}" alt="Rapid shipping" class="feature-icon col-md-2" style="width: 100% !important;">
    
</div>

        
        <div class="site-feature">
    <img src="{{ asset('images/cat-2.webp') }}" alt="Rapid shipping" class="feature-icon col-md-2" style="width: 100% !important;">
    
</div>

        
        <div class="site-feature">
    <img src="{{ asset('images/cat-3.webp') }}" alt="Rapid shipping" class="feature-icon col-md-2" style="width: 100% !important;">
    
</div>

       
        <div class="site-feature">
    <img src="{{ asset('images/cat-4.webp') }}" alt="Rapid shipping" class="feature-icon col-md-5" style="width: 100% !important;">
   
</div>


        <div class="site-feature">
    <img src="{{ asset('images/cat-4.webp') }}" alt="Rapid shipping" class="feature-icon col-md-6" style="width: 100% !important;">
   
</div>


        <div class="site-feature">
    <img src="{{ asset('images/cat-4.webp') }}" alt="Rapid shipping" class="feature-icon col-md-7" style="width: 100% !important;">
   
</div>


    </section>
    {{-- ================= BRANDS ================= --}}
 <section class="area home-section" id="brands">
    <div class="row align-items-center">

        {{-- Left Column: Featured Brands --}}
        <div class="col-md-6 col-12">
            <div class="flex sided title">
                <h4>Trending Now</h4>

                <a class="link" href="{{ url('/brands') }}">
                    Show all <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="brand-row">
                <div class="brand-placeholder"><img src="{{ asset('images/thumb-1.webp') }}" alt="Rapid shipping" class="feature-icon col-md-2" style="width: 100% !important;"></div>
                <div class="brand-placeholder"><img src="{{ asset('images/thumb-2.webp') }}" alt="Rapid shipping" class="feature-icon col-md-2" style="width: 100% !important;"></div>
                <div class="brand-placeholder"><img src="{{ asset('images/thumb-3.webp') }}" alt="Rapid shipping" class="feature-icon col-md-2" style="width: 100% !important;"></div>
                <div class="brand-placeholder"><img src="{{ asset('images/thumb-4.webp') }}" alt="Rapid shipping" class="feature-icon col-md-2" style="width: 100% !important;"></div>
                <div class="brand-placeholder"><img src="{{ asset('images/thumb-5.webp') }}" alt="Rapid shipping" class="feature-icon col-md-2" style="width: 100% !important;"></div>
            </div>
        </div>

        {{-- Right Column: Banner --}}
        <div class="col-md-6 col-12 mt-3 mt-md-0">
            <div class="brand-banner">
                <img
                    src="{{ asset('images/banner-1.webp') }}"
                    alt="Featured Brands Banner" style="width:100%!important; height: 50% !important;"
                >
            </div>
        </div>

    </div>
</section>

{{-- Top Selling Products --}}
<div class="flex sided title">
    <h4>Top selling products</h4>

    <a href="/top-selling-products/collection?collection=3" class="link">
        Show all
    </a>
</div>

<div class="search-product-tile">

    {{-- Product 1 --}}
    <a href="/womens-floral-tunic-tops-casual-blouse-v-neck-short-sleeve-buttons-up-t-shirts/product/88630116"
       class="page-link center-text item">

        <div class="item-inner">
            <div class="img-container">
                <div class="img-wrapper">
                    <img
                        src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-6-1.webp"
                        alt="Women's Floral Tunic Tops Casual Blouse V Neck Short Sleeve Buttons Up T-Shirts"
                        title="Women's Floral Tunic Tops Casual Blouse V Neck Short Sleeve Buttons Up T-Shirts"
                        width="50"
                        height="50"
                        style="opacity: 1;"
                    >
                </div>
            </div>

            <div class="title-wrap">
                <h5 class="ellipsis ellipsis-1 mb-5">
                    Women's Floral Tunic Tops Casual Blouse V Neck Short Sleeve Buttons Up T-Shirts
                </h5>

                <div class="pos-rel flex start">
                    <h5>
                        <span class="strike-through">$100</span>
                        <span class="f-12">$81</span>
                    </h5>

                    <span class="discount ml-10">-19%</span>

                    <button aria-label="Compare" class="compare-btn" title="Compare">
                        <i class="icon reload-icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </a>

    {{-- Product 2 --}}
    <a href="/image-skincare-the-max-stem-cell-facial-cleanser-4-fl-oz/product/88630131"
       class="page-link center-text item">

        <div class="item-inner">
            <div class="img-container">
                <div class="img-wrapper">
                    <img
                        src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-21-1.webp"
                        alt="Image Skincare The Max Stem Cell Facial Cleanser, 4 Fl Oz"
                        title="Image Skincare The Max Stem Cell Facial Cleanser, 4 Fl Oz"
                        width="50"
                        height="50"
                        style="opacity: 1;"
                    >
                </div>
            </div>

            <div class="title-wrap">
                <h5 class="ellipsis ellipsis-1 mb-5">
                    Image Skincare The Max Stem Cell Facial Cleanser, 4 Fl Oz
                </h5>

                <div class="pos-rel flex start">
                    <h5>
                        <span class="f-12">$101</span>
                    </h5>

                    <button aria-label="Compare" class="compare-btn" title="Compare">
                        <i class="icon reload-icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </a>

    {{-- Product 3 --}}
    <a href="/puma-kids-6-pack-low-cut-socks/product/88630122"
       class="page-link center-text item">

        <div class="item-inner">
            <div class="img-container">
                <div class="img-wrapper">
                    <img
                        src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-12-1.webp"
                        alt="PUMA Kids' 6 Pack Low Cut Socks"
                        title="PUMA Kids' 6 Pack Low Cut Socks"
                        width="50"
                        height="50"
                        style="opacity: 1;"
                    >
                </div>
            </div>

            <div class="title-wrap">
                <h5 class="ellipsis ellipsis-1 mb-5">
                    PUMA Kids' 6 Pack Low Cut Socks
                </h5>

                <div class="pos-rel flex start">
                    <h5>
                        <span class="strike-through">$100</span>
                        <span class="f-12">$87</span>
                    </h5>

                    <span class="discount ml-10">-13%</span>

                    <button aria-label="Compare" class="compare-btn" title="Compare">
                        <i class="icon reload-icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </a>

    {{-- Product 4 --}}
    <a href="/andongnywell-casual-solid-color-ruffle-collar-long-sleeve-ruffle-shirt-blouse-v-neck-short-sleeve-shirt-top/product/88630113"
       class="page-link center-text item">

        <div class="item-inner">
            <div class="img-container">
                <div class="img-wrapper">
                    <img
                        src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-3-1.webp"
                        alt="Andongnywell Casual Solid Color Ruffle Collar Shirt"
                        title="Andongnywell Casual Solid Color Ruffle Collar Shirt"
                        width="50"
                        height="50"
                        style="opacity: 1;"
                    >
                </div>
            </div>

            <div class="title-wrap">
                <h5 class="ellipsis ellipsis-1 mb-5">
                    Andongnywell Casual Solid Color Ruffle Collar Long Sleeve Ruffle Shirt Blouse V Neck Short Sleeve Shirt Top
                </h5>

                <div class="pos-rel flex start">
                    <h5>
                        <span class="strike-through">$100</span>
                        <span class="f-12">$78</span>
                    </h5>

                    <span class="discount ml-10">-22%</span>

                    <button aria-label="Compare" class="compare-btn" title="Compare">
                        <i class="icon reload-icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </a>

    {{-- Product 5 --}}
    <a href="/legendary-whitetails-mens-journeyman-shirt-jacket/product/88630137"
       class="page-link center-text item">

        <div class="item-inner">
            <div class="img-container">
                <div class="img-wrapper">
                    <img
                        src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-27-1.webp"
                        alt="Legendary Whitetails Men's Journeyman Shirt Jacket"
                        title="Legendary Whitetails Men's Journeyman Shirt Jacket"
                        width="50"
                        height="50"
                        style="opacity: 1;"
                    >
                </div>
            </div>

            <div class="title-wrap">
                <h5 class="ellipsis ellipsis-1 mb-5">
                    Legendary Whitetails Men's Journeyman Shirt Jacket
                </h5>

                <div class="pos-rel flex start">
                    <h5>
                        <span class="strike-through">$160</span>
                        <span class="f-12">$107</span>
                    </h5>

                    <span class="discount ml-10">-34%</span>

                    <button aria-label="Compare" class="compare-btn" title="Compare">
                        <i class="icon reload-icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </a>

    {{-- Product 6 --}}
    <a href="/jet-set-hydration-kit-travel-friendly-skincare-set-cleanser-balm-moisturizer-eye-cream-night-cream/product/88630128"
       class="page-link center-text item">

        <div class="item-inner">
            <div class="img-container">
                <div class="img-wrapper">
                    <img
                        src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-18-1.webp"
                        alt="Jet Set Hydration Kit Skincare Set"
                        title="Jet Set Hydration Kit Skincare Set"
                        width="50"
                        height="50"
                        style="opacity: 1;"
                    >
                </div>
            </div>

            <div class="title-wrap">
                <h5 class="ellipsis ellipsis-1 mb-5">
                    Jet Set Hydration Kit, Travel Friendly Skincare Set, Cleanser, Balm, Moisturizer, Eye Cream &amp; Night Cream
                </h5>

                <div class="pos-rel flex start">
                    <h5>
                        <span class="strike-through">$100</span>
                        <span class="f-12">$93</span>
                    </h5>

                    <span class="discount ml-10">-7%</span>

                    <button aria-label="Compare" class="compare-btn" title="Compare">
                        <i class="icon reload-icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </a>

    {{-- Product 7 --}}
    <a href="/simple-flavor-womens-floral-vintage-dress-elegant-midi-evening-dress-34-sleeves/product/88630119"
       class="page-link center-text item">

        <div class="item-inner">
            <div class="img-container">
                <div class="img-wrapper">
                    <img
                        src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-9-1.webp"
                        alt="Simple Flavor Women's Floral Vintage Dress"
                        title="Simple Flavor Women's Floral Vintage Dress"
                        width="50"
                        height="50"
                        style="opacity: 1;"
                    >
                </div>
            </div>

            <div class="title-wrap">
                <h5 class="ellipsis ellipsis-1 mb-5">
                    Simple Flavor Women's Floral Vintage Dress Elegant Midi Evening Dress 3/4 Sleeves
                </h5>

                <div class="pos-rel flex start">
                    <h5>
                        <span class="strike-through">$100</span>
                        <span class="f-12">$84</span>
                    </h5>

                    <span class="discount ml-10">-16%</span>

                    <button aria-label="Compare" class="compare-btn" title="Compare">
                        <i class="icon reload-icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </a>

    {{-- Product 8 --}}
    <a href="/anna-by-anuschka-satchel-handbag-genuine-leather/product/88630134"
       class="page-link center-text item">

        <div class="item-inner">
            <div class="img-container">
                <div class="img-wrapper">
                    <img
                        src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-24-1.webp"
                        alt="Anna by Anuschka Satchel Handbag Genuine Leather"
                        title="Anna by Anuschka Satchel Handbag Genuine Leather"
                        width="50"
                        height="50"
                        style="opacity: 1;"
                    >
                </div>
            </div>

            <div class="title-wrap">
                <h5 class="ellipsis ellipsis-1 mb-5">
                    Anna by Anuschka Satchel Handbag | Genuine Leather
                </h5>

                <div class="pos-rel flex start">
                    <h5>
                        <span class="strike-through">$170</span>
                        <span class="f-12">$104</span>
                    </h5>

                    <span class="discount ml-10">-39%</span>

                    <button aria-label="Compare" class="compare-btn" title="Compare">
                        <i class="icon reload-icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </a>

    {{-- Product 9 --}}
    <a href="/womens-regrowth-kit-plus-shampoo-conditioner-2-minoxidil-leave-in-foamer-anti-hair-loss-and-thinning-hair-solution-for-women-1-month/product/88630125"
       class="page-link center-text item">

        <div class="item-inner">
            <div class="img-container">
                <div class="img-wrapper">
                    <img
                        src="https://cdn.ishop.cholobangla.com/uploads/thumb-product-15-1.webp"
                        alt="Women's Regrowth Kit Plus"
                        title="Women's Regrowth Kit Plus"
                        width="50"
                        height="50"
                        style="opacity: 1;"
                    >
                </div>
            </div>

            <div class="title-wrap">
                <h5 class="ellipsis ellipsis-1 mb-5">
                    Women's Regrowth Kit Plus: Shampoo, Conditioner, 2% Minoxidil, Leave-In Foamer. Anti Hair Loss and Thinning Hair Solution for Women, 1 Month
                </h5>

                <div class="pos-rel flex start">
                    <h5>
                        <span class="strike-through">$100</span>
                        <span class="f-12">$90</span>
                    </h5>

                    <span class="discount ml-10">-10%</span>

                    <button aria-label="Compare" class="compare-btn" title="Compare">
                        <i class="icon reload-icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </a>

</div>

{{-- ================= Banner ================= --}}
<a href="/summer-fashion/products?banner=5" class="block banner-wrapper home-section mb-0 br-primary flow-hidden"><img src="https://cdn.ishop.cholobangla.com/uploads/banner-5.webp" alt="Summer fashion" height="100% !important;" width="100% !important;"><!----></a>


{{-- ================= Top Products ================= --}}


<div class="home-section daily-discover">
  <div class="area">
    <h4 class="title">Medical Devices</h4>

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
                  <i class="icon reload-icon"></i>
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

   <div class="show-more-wrapper mt-20 mt-sm-15">
    <a href="/daily-discover/products" class="show-more-btn">
        Show More
        <span>↓</span>
    </a>
</div>
  </div>
</div>

{{-- ================= SUBSCRIPTION ================= --}}

<a href="/summer-fashion/products?banner=5" class="block banner-wrapper home-section mb-0 br-primary flow-hidden"><img src="https://cdn.ishop.cholobangla.com/uploads/banner-6.webp" alt="Summer fashion" height="100% !important;" width="100% !important;"><!----></a>

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



    {{-- ================= DISCOVER PRODUCTS ================= --}}
    <section class="area home-section discover">

        <div class="title">
            <h4>Grocery</h4>
        </div>

        <p>Explore more products from the iShop catalogue.</p>

        <a href="{{ url('/products') }}" class="btn btn-primary">
            Browse products
        </a>

    </section>

</main>

@endsection
