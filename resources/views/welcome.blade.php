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
            <img src="{{asset('images/pro-2.webp')}}" alt="Packaged almonds">
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
        <div class=""><img src="images/pro-1.webp" alt="Waffle knit blouse"></div>
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
        <div class=""><img src="images/pro-1.webp" alt="Smart watch"></div>
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
      <button class="category-nav" id="categoriesPrev" type="button" aria-label="Previous categories"><i class="bi bi-chevron-left"></i></button>
      <button class="category-nav" id="categoriesNext" type="button" aria-label="Next categories"><i class="bi bi-chevron-right"></i></button>
    </div>
    <a href="#categories" class="categories-show-all">Show all</a>
  </header>

  <div class="categories-wrap">
    <div class="categories-track" id="categoriesTrack">
      <a class="category-card" href="#">
        <div class="category-icon"><svg viewBox="0 0 80 80"><path d="M25 12c2 13 7 20 15 20s13-7 15-20l10 7 5 28-9 5-3 18H22l-3-18-9-5 5-28z"/><path d="M25 12c4 10 8 15 15 15s11-5 15-15"/></svg></div>
        <span class="category-name">Tops</span>
      </a>
      <a class="category-card" href="#">
        <div class="category-icon"><svg viewBox="0 0 80 80"><path d="M25 12l-9 5-8 12 10 8 7-8-4 34h38l-4-34 7 8 10-8-8-12-9-5-5 8H30z"/><path d="M27 37h26l8 26H19z"/><path d="M31 15c2 6 5 8 9 8s7-2 9-8"/></svg></div>
        <span class="category-name">Dresses</span>
      </a>
      <a class="category-card" href="#">
        <div class="category-icon"><svg viewBox="0 0 80 80"><rect x="8" y="24" width="64" height="43" rx="3"/><path d="M28 24v-9h24v9M33 15v-5h14v5M18 27v37M25 27v37M55 27v37M62 27v37"/><rect x="29" y="32" width="10" height="15" rx="1"/></svg></div>
        <span class="category-name">Sling Bags</span>
      </a>
      <a class="category-card" href="#">
        <div class="category-icon"><svg viewBox="0 0 80 80"><path d="M22 12l13-4 6 24-13 4zM43 7l13-3 7 24-13 4z"/><path d="M28 36l-8 16c-3 6-1 12 5 14 5 2 10-2 12-7l7-16M49 32l-7 20c-2 6 0 11 5 13 5 2 10-1 12-7l8-20"/><path d="M24 23l13-4M45 18l13-4"/></svg></div>
        <span class="category-name">Socks &amp; Tights</span>
      </a>
      <a class="category-card" href="#">
        <div class="category-icon"><svg viewBox="0 0 80 80"><path d="M10 32h60v29H10z"/><path d="M17 32c3-16 12-24 23-24s20 8 23 24M23 32c3-11 9-17 17-17s14 6 17 17"/><path d="M10 39l-5 5 5 5M70 39l5 5-5 5M38 42h4v17h-4zM36 45h8"/></svg></div>
        <span class="category-name">Clutches &amp;...</span>
      </a>
      <a class="category-card" href="#">
        <div class="category-icon"><svg viewBox="0 0 80 80"><path d="M21 24h38l7 42H14z"/><path d="M29 24c0-8 4-13 11-13s11 5 11 13"/><path d="M25 35h30l2 24H23z"/><path d="M37 43c0-4 6-4 6 0 0 3-3 5-3 5s-3-2-3-5z"/><path d="M14 60l-5 4 5 3M66 60l5 4-5 3"/></svg></div>
        <span class="category-name">Handbags</span>
      </a>
      <a class="category-card" href="#">
        <div class="category-icon"><svg viewBox="0 0 80 80"><path d="M22 12h36l3 12-7 43H38l2-30-4 30H20l5-43z"/><path d="M23 19h34M39 19v6M49 19v6"/></svg></div>
        <span class="category-name">Pants &amp;...</span>
      </a>
      <a class="category-card" href="#">
        <div class="category-icon"><svg viewBox="0 0 80 80"><path d="M11 48c9-16 23-24 39-22 11 1 19 8 21 17L45 55l-17 4z"/><path d="M43 26c4-8 12-11 19-7 8 4 12 13 10 24l-9 4"/><path d="M11 48l-5 7 22 4M28 59l17-4"/></svg></div>
        <span class="category-name">Hats &amp; Caps</span>
      </a>
      <a class="category-card" href="#">
        <div class="category-icon"><svg viewBox="0 0 80 80"><path d="M12 18h56l6 45-32 7-32-7z"/><path d="M12 18l8 1 4 28 16 3 16-3 4-28 8-1M40 19v31M23 47l-4 14M57 47l4 14"/><path d="M25 19l2 7M55 19l-2 7"/></svg></div>
        <span class="category-name">Pants</span>
      </a>
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
      <article class="selling-product">
        <div class="selling-image"><img src="images/pro-1.webp" alt="Jet Set Hydration Kit"></div>
        <div class="selling-details">
          <a href="#" class="selling-name">Jet Set Hydration Kit, Travel Friendly Skincare Set, Cleanser, Balm,...</a>
          <div class="selling-meta"><del class="selling-old">$100</del><span class="selling-price">$93</span><span class="selling-discount">-7%</span><button class="selling-action" type="button" aria-label="Refresh product"><i class="bi bi-arrow-repeat"></i></button></div>
        </div>
      </article>

      <article class="selling-product">
        <div class="selling-image"><img src="images/pro-2.webp" alt="Satchel handbag"></div>
        <div class="selling-details">
          <a href="#" class="selling-name">Anna by Anuschka Satchel Handbag | Genuine Leather</a>
          <div class="selling-meta"><del class="selling-old">$170</del><span class="selling-price">$104</span><span class="selling-discount">-39%</span><button class="selling-action" type="button" aria-label="Refresh product"><i class="bi bi-arrow-repeat"></i></button></div>
        </div>
      </article>

      <article class="selling-product">
        <div class="selling-image"><img src="images/pro-3.webp" alt="Floral tunic top"></div>
        <div class="selling-details">
          <a href="#" class="selling-name">Women's Floral Tunic Tops Casual Blouse V Neck Short Sleeve...</a>
          <div class="selling-meta"><del class="selling-old">$100</del><span class="selling-price">$81</span><span class="selling-discount">-19%</span><button class="selling-action" type="button" aria-label="Refresh product"><i class="bi bi-arrow-repeat"></i></button></div>
        </div>
      </article>

      <article class="selling-product">
        <div class="selling-image"><img src="images/pro-1.webp" alt="Kids low cut socks"></div>
        <div class="selling-details">
          <a href="#" class="selling-name">PUMA Kids' 6 Pack Low Cut Socks</a>
          <div class="selling-meta"><del class="selling-old">$100</del><span class="selling-price">$87</span><span class="selling-discount">-13%</span><button class="selling-action" type="button" aria-label="Refresh product"><i class="bi bi-arrow-repeat"></i></button></div>
        </div>
      </article>

      <article class="selling-product">
        <div class="selling-image"><img src="images/pro-2.webp" alt="Men's shirt jacket"></div>
        <div class="selling-details">
          <a href="#" class="selling-name">Legendary Whitetails Men's Journeyman Shirt Jacket</a>
          <div class="selling-meta"><del class="selling-old">$160</del><span class="selling-price">$107</span><span class="selling-discount">-34%</span><button class="selling-action" type="button" aria-label="Refresh product"><i class="bi bi-arrow-repeat"></i></button></div>
        </div>
      </article>
    </div>

    <div class="selling-column">
      <article class="selling-product">
        <div class="selling-image"><img src="images/pro-3.webp" alt="Floral vintage dress"></div>
        <div class="selling-details">
          <a href="#" class="selling-name">Simple Flavor Women's Floral Vintage Dress Elegant Midi Evening...</a>
          <div class="selling-meta"><del class="selling-old">$100</del><span class="selling-price">$84</span><span class="selling-discount">-16%</span><button class="selling-action" type="button" aria-label="Refresh product"><i class="bi bi-arrow-repeat"></i></button></div>
        </div>
      </article>

      <article class="selling-product">
        <div class="selling-image"><img src="images/pro-1.webp" alt="Hair regrowth kit"></div>
        <div class="selling-details">
          <a href="#" class="selling-name">Women's Regrowth Kit Plus: Shampoo, Conditioner, 2% Minoxidil,...</a>
          <div class="selling-meta"><del class="selling-old">$100</del><span class="selling-price">$90</span><span class="selling-discount">-10%</span><button class="selling-action" type="button" aria-label="Refresh product"><i class="bi bi-arrow-repeat"></i></button></div>
        </div>
      </article>

      <article class="selling-product">
        <div class="selling-image"><img src="images/pro-2.webp" alt="Facial cleanser"></div>
        <div class="selling-details">
          <a href="#" class="selling-name">Image Skincare The Max Stem Cell Facial Cleanser, 4 Fl Oz</a>
          <div class="selling-meta"><span class="selling-price">$101</span><button class="selling-action" type="button" aria-label="Refresh product"><i class="bi bi-arrow-repeat"></i></button></div>
        </div>
      </article>

      <article class="selling-product">
        <div class="selling-image"><img src="images/pro-3.webp" alt="Casual solid color top"></div>
        <div class="selling-details">
          <a href="#" class="selling-name">Andongnywell Casual Solid Color Ruffle Collar Long Sleeve Ruffle...</a>
          <div class="selling-meta"><del class="selling-old">$100</del><span class="selling-price">$78</span><span class="selling-discount">-22%</span><button class="selling-action" type="button" aria-label="Refresh product"><i class="bi bi-arrow-repeat"></i></button></div>
        </div>
      </article>
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
