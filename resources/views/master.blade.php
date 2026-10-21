<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link as="font" href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;600&amp;display=swap" rel="stylesheet"/>
    <title>@yield('title', 'iShop — Online Shopping')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    {{-- Custom CSS --}}
    <link href="{{ asset('asset/css/ishop.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

</head>

<body class="@yield('body_class', 'index')">

    {{-- ================= HEADER ================= --}}
    <header class="ishop-header">

        <div class="top-wrapper">
            <div class="container-fluid px-4">
                <div class="wrap flex sided">

                    <div class="left-side flex gap-10">
                        <a href="mailto:webzedcontact@gmail.com">
                            <i class="bi bi-envelope"></i>
                            <span class="hide-md">Email:</span>
                            webzedcontact@gmail.com
                        </a>

                        <span>|</span>

                        <a href="tel:4534345656">
                            <i class="bi bi-telephone"></i>
                            <span class="hide-md">Helpline:</span>
                            4534345656
                        </a>
                    </div>

                    <div class="right-side flex text-upper">
                        <a href="{{ url('/seller') }}">Be a seller</a>
                        <span>|</span>
                        <a href="{{ url('/login') }}">Login</a>
                        <span>|</span>
                        <a href="{{ url('/register') }}">Register</a>
                    </div>

                </div>
            </div>
        </div>

        <div class="header-sticky">

            <div class="container-fluid px-4 header-main">

                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('images/logo.svg') }}"
                         alt="iShop logo">
                </a>

                <form class="search-input grow"
                      action="{{ url('/products') }}"
                      method="GET">

                    <input
                        name="search"
                        type="search"
                        placeholder="Search here..."
                        aria-label="Search products"
                        value="{{ request('search') }}"
                    >

                    <button type="submit" aria-label="Search">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

                <div class="right-area flex gap-15">

                    <div class="dropdown-holder">

                        <button class="header-action"
                                id="accountBtn"
                                type="button">

                            <i class="bi bi-person"></i>
                            <span>Account</span>
                            <i class="bi bi-chevron-down small"></i>
                        </button>

                        <div class="account-dropdown" id="accountMenu">
                            <a href="{{ url('/login') }}">Login</a>
                            <a href="{{ url('/register') }}">Register</a>
                            <a href="{{ url('/orders') }}">Orders</a>
                            <a href="{{ url('/wishlist') }}">Wish list</a>
                        </div>

                    </div>

                    <a href="{{ url('/wishlist') }}" class="header-action">
                        <i class="bi bi-heart"></i>
                        <span>Wishlist</span>
                    </a>

                    <a href="{{ url('/cart') }}" class="header-action cart-btn">
                        <span class="cart-badge" id="cartCount">0</span>
                        <i class="bi bi-bag"></i>
                        <span>Cart</span>
                    </a>

                </div>
            </div>

            {{-- Navigation --}}
         
<nav class="bottom-area">
    <div class="container-fluid px-4">
        <div class="flex sided">

            <div class="nav-left">

                <a href="{{ url('/categories') }}">
                    ☰ &nbsp; Discover Products
                </a>

                <!-- Categories Mega Menu -->
                <div class="nav-item category-item">

                     <li class="nav-item category-item">
                    <a class="nav-link category-toggle" href="#">
                        Categories <span>▾</span>
                    </a>

                    <div class="mega-menu">
                        <div class="row g-4">

                            <!-- Category 1 -->
                            <div class="col-lg-3 col-md-6">
                                <h6>Supplements</h6>
                                <a href="/products?category=shirts">Shirts</a>
                                <a href="/products?category=t-shirts">T-Shirts</a>
                                <a href="/products?category=pants">Pants & Jeans</a>
                                <a href="/products?category=shoes">Shoes</a>
                                <a href="/products?category=watches">Watches</a>
                                <a href="/products?category=all-men">View All Products →</a>
                            </div>

                            <!-- Category 2 -->
                            <div class="col-lg-3 col-md-6">
                                <h6>Health Care</h6>
                                <a href="/products?category=three-piece">Three Piece</a>
                                <a href="/products?category=saree">Saree</a>
                                <a href="/products?category=kurti">Kurti</a>
                                <a href="/products?category=handbag">Handbags</a>
                                <a href="/products?category=jewellery">Jewellery</a>
                                <a href="/products?category=all-women">View All Products →</a>
                            </div>

                            <!-- Category 3 -->
                            <div class="col-lg-3 col-md-6">
                                <h6>Beauty</h6>
                                <a href="/products?category=mobile">Mobile Phones</a>
                                <a href="/products?category=laptop">Laptops</a>
                                <a href="/products?category=headphone">Headphones</a>
                                <a href="/products?category=smartwatch">Smart Watches</a>
                                <a href="/products?category=accessories">Accessories</a>
                                <a href="/products?category=all-electronics">View All Products →</a>
                            </div>

                            <!-- Category 4 -->
                            <div class="col-lg-3 col-md-6">
                                <h6>Baby and Mom</h6>
                                <a href="/products?category=furniture">Furniture</a>
                                <a href="/products?category=decoration">Home Decoration</a>
                                <a href="/products?category=lighting">Lighting</a>
                                <a href="/products?category=kitchen">Kitchen Items</a>
                                <a href="/products?category=bedding">Bedding</a>
                                <a href="/products?category=all-home">View All Products →</a>
                            </div>

                        </div>
                    </div>
                </li>
                </div>

                <a href="{{ url('/brands') }}">Brands</a>
                <a href="{{ url('/flash-sale') }}">Flash Sale</a>

            </div>

            <div class="nav-right">
                <a href="{{ url('/track-order') }}">Track Order</a>
                <a href="{{ url('/shipping') }}">Shipping</a>
                <a href="{{ url('/contact') }}">Contact</a>
            </div>

        </div>
    </div>
</nav>


        </div>
    </header>

    {{-- ================= MAIN CONTENT ================= --}}
    @yield('content')

    {{-- ================= FOOTER ================= --}}

            <div class="footer-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.svg') }}"
                         alt="iShop">
                </a>
            </div>
    <footer id="footer">

        <div class="container-fluid px-4 footer-top">

            <div class="row g-4">

                <div class="col-lg-3 col-md-6">
                    <h5>Services</h5>
                    <a href="{{ url('/shipping') }}">Shipping Information</a>
                    <a href="{{ url('/track-order') }}">Track Order</a>
                    <a href="{{ url('/contact') }}">Contact Us</a>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>About</h5>
                    <a href="{{ url('/about') }}">About iShop</a>
                    <a href="{{ url('/faq') }}">FAQ</a>
                    <a href="{{ url('/privacy') }}">Privacy Policy</a>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Payment</h5>
                    <p>Payment methods may vary by checkout.</p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Social</h5>
                    <a href="#">
                        <i class="bi bi-facebook"></i> Facebook
                    </a>
                    <a href="#">
                        <i class="bi bi-instagram"></i> Instagram
                    </a>
                </div>

            </div>

        </div>

        <div class="footer-bottom container-fluid px-4">
    &copy; {{ date('Y') }} iShop. All rights reserved.
</div>

    </footer>

    {{-- JavaScript --}}
    <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Mobile: tap to open and close the category menu
    document.querySelectorAll('.category-toggle').forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 991) {
                e.preventDefault();

                const menu = this.nextElementSibling;
                menu.classList.toggle('show');
            }
        });
    });
</script>

    <script src="{{ asset('asset/js/ishop.js') }}"></script>

    @stack('scripts')

</body>
</html>
