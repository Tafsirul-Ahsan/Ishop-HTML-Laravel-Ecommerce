@extends('master')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif

@php
    $cartItems = Cart::getContent();

    $cartSubtotal = $cartItems->sum(function ($item) {
        return (float) $item->price * (int) $item->quantity;
    });

    $totalItems = $cartItems->sum('quantity');

    $taxRate = 0.06;
    $tax = $cartSubtotal * $taxRate;
    $grandTotal = $cartSubtotal + $tax;
@endphp

<div class="container-fluid cart-wrapper py-4">
    <div class="row g-3">

        {{-- Shopping Cart --}}
        <div class="col-12 col-md-9">
            <div class="cart-panel">

                <div class="panel-heading">
                    <h5>Shopping Cart</h5>

                    @if($cartItems->isNotEmpty())
                        <a href="#" class="deselect-link" id="toggleAll">
                            Deselect all items
                        </a>
                    @endif
                </div>

                @forelse($cartItems as $cartitem)
                    <div class="product-row"
                         data-cart-item
                         data-price="{{ $cartitem->price }}">

                        <div>
                            <input type="checkbox"
                                   class="product-checkbox"
                                   checked
                                   aria-label="Select {{ $cartitem->name }}">
                        </div>

                        {{-- Product Image --}}
                        <div class="product-image">
                            @if($cartitem->attributes->thum_img ?? false)
                                <img
                                    src="{{ asset($cartitem->attributes->thum_img) }}"
                                    alt="{{ $cartitem->name }}"
                                    onerror="this.onerror=null;this.src='https://placehold.co/100x100?text=Product';">
                            @else
                                <img
                                    src="https://placehold.co/100x100?text=Product"
                                    alt="{{ $cartitem->name }}">
                            @endif
                        </div>

                        {{-- Product Information --}}
                        <div class="product-info">
                            <h6 class="product-title">
                                {{ $cartitem->name }}
                            </h6>

                            <div class="product-meta">
                                @if($cartitem->attributes->code ?? false)
                                    <span>
                                        SKU: {{ $cartitem->attributes->code }}
                                    </span>
                                @endif

                                <span class="unit-price">
                                    Price: ৳{{ number_format((float) $cartitem->price, 2) }}
                                </span>
                            </div>

                            <div class="d-flex flex-wrap align-items-center gap-2">

                                {{-- Quantity Controls --}}
                                <div class="quantity-control">
                                    <button type="button"
                                            class="quantity-minus"
                                            aria-label="Decrease quantity">
                                        -
                                    </button>

                                    <input type="number"
                                           class="quantity-input"
                                           value="{{ $cartitem->quantity }}"
                                           min="1"
                                           max="99"
                                           aria-label="Quantity">

                                    <button type="button"
                                            class="quantity-plus"
                                            aria-label="Increase quantity">
                                        +
                                    </button>
                                </div>

                                {{-- Remove Item --}}
                                <a href="{{ url('cart/remove-item/' . $cartitem->id) }}"
                                   class="delete-btn"
                                   onclick="return confirm('Remove this product from your cart?')">
                                    Delete
                                </a>
                            </div>
                        </div>

                        {{-- Item Price --}}
                        <div class="product-price">
                            <div>
                                ৳<span class="item-subtotal">
                                    {{ number_format((float) $cartitem->price * (int) $cartitem->quantity, 2) }}
                                </span>
                            </div>

                            <div class="text-muted">
                                ৳{{ number_format((float) $cartitem->price, 2) }}
                                × <span class="quantity-text">{{ $cartitem->quantity }}</span>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="text-center py-5">
                        <h5>Your cart is empty</h5>
                        <p class="text-muted">
                            Add some products to continue shopping.
                        </p>

                        <a href="{{ url('/') }}" class="btn btn-primary">
                            Continue Shopping
                        </a>
                    </div>
                @endforelse

                @if($cartItems->isNotEmpty())
                    <div class="cart-subtotal">
                        <span>
                            Subtotal (
                            <span id="itemCount">{{ $totalItems }}</span>
                            items)
                        </span>

                        <strong>
                            ৳<span id="cartSubtotal">
                                {{ number_format($cartSubtotal, 2) }}
                            </span>
                        </strong>
                    </div>
                @endif

            </div>
        </div>

        {{-- Checkout Summary --}}
        <div class="col-12 col-md-3">
            <div class="checkout-panel">

                <div class="panel-heading">
                    <h5>Order Summary</h5>
                </div>

                <div class="summary-row">
                    <span>
                        Subtotal (<span id="checkoutItems">{{ $totalItems }}</span> items)
                    </span>

                    <strong>
                        ৳<span id="originalSubtotal">{{ number_format($cartSubtotal, 2) }}</span>
                    </strong>
                </div>

                <div class="summary-row">
                    <span>Discount</span>
                    <strong>
                        −৳<span id="bundleDiscount">0.00</span>
                    </strong>
                </div>

                <div class="summary-row">
                    <span>Tax (6%)</span>
                    <strong>
                        ৳<span id="tax">{{ number_format($tax, 2) }}</span>
                    </strong>
                </div>

                <div class="summary-divider"></div>

                <div class="summary-row total-row">
                    <span>Total</span>
                    <strong>
                        ৳<span id="total">{{ number_format($grandTotal, 2) }}</span>
                    </strong>
                </div>

                <button type="button"
                        class="checkout-btn"
                        id="checkoutBtn"
                        {{ $cartItems->isEmpty() ? 'disabled' : '' }}>
                    Proceed to Checkout
                </button>

                <div class="saving-box">
                    <span>Items selected</span>
                    <strong>
                        <span id="selectedItems">{{ $totalItems }}</span>
                    </strong>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const rows = Array.from(document.querySelectorAll('[data-cart-item]'));
    const toggleAll = document.getElementById('toggleAll');
    const checkoutBtn = document.getElementById('checkoutBtn');

    const money = value => Number(value).toLocaleString('en-BD', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    function updateCart() {
        let selectedQuantity = 0;
        let selectedSubtotal = 0;

        rows.forEach(row => {
            const checkbox = row.querySelector('.product-checkbox');
            const quantityInput = row.querySelector('.quantity-input');
            const quantityText = row.querySelector('.quantity-text');
            const itemSubtotal = row.querySelector('.item-subtotal');

            let quantity = parseInt(quantityInput.value, 10) || 1;
            quantity = Math.max(1, Math.min(99, quantity));
            quantityInput.value = quantity;

            const price = parseFloat(row.dataset.price) || 0;
            const subtotal = price * quantity;

            quantityText.textContent = quantity;
            itemSubtotal.textContent = money(subtotal);

            if (checkbox.checked) {
                selectedQuantity += quantity;
                selectedSubtotal += subtotal;
            }
        });

        const tax = selectedSubtotal * 0.06;
        const total = selectedSubtotal + tax;

        document.getElementById('itemCount').textContent = selectedQuantity;
        document.getElementById('checkoutItems').textContent = selectedQuantity;
        document.getElementById('selectedItems').textContent = selectedQuantity;

        document.getElementById('cartSubtotal').textContent = money(selectedSubtotal);
        document.getElementById('originalSubtotal').textContent = money(selectedSubtotal);
        document.getElementById('bundleDiscount').textContent = money(0);
        document.getElementById('tax').textContent = money(tax);
        document.getElementById('total').textContent = money(total);

        if (toggleAll) {
            const allSelected = rows.length > 0 &&
                rows.every(row => row.querySelector('.product-checkbox').checked);

            toggleAll.textContent = allSelected
                ? 'Deselect all items'
                : 'Select all items';
        }

        if (checkoutBtn) {
            checkoutBtn.disabled = selectedQuantity === 0;
            checkoutBtn.style.opacity = selectedQuantity === 0 ? '0.6' : '1';
        }
    }

    rows.forEach(row => {
        const quantityInput = row.querySelector('.quantity-input');
        const checkbox = row.querySelector('.product-checkbox');

        row.querySelector('.quantity-minus').addEventListener('click', function () {
            quantityInput.value = Math.max(1, (parseInt(quantityInput.value, 10) || 1) - 1);
            updateCart();
        });

        row.querySelector('.quantity-plus').addEventListener('click', function () {
            quantityInput.value = Math.min(99, (parseInt(quantityInput.value, 10) || 1) + 1);
            updateCart();
        });

        quantityInput.addEventListener('input', updateCart);
        quantityInput.addEventListener('change', updateCart);
        checkbox.addEventListener('change', updateCart);
    });

    if (toggleAll) {
        toggleAll.addEventListener('click', function (event) {
            event.preventDefault();

            const allSelected = rows.length > 0 &&
                rows.every(row => row.querySelector('.product-checkbox').checked);

            rows.forEach(row => {
                row.querySelector('.product-checkbox').checked = !allSelected;
            });

            updateCart();
        });
    }

    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', function () {
            const hasSelectedItems = rows.some(row =>
                row.querySelector('.product-checkbox').checked
            );

            if (!hasSelectedItems) {
                alert('Please select at least one product.');
                return;
            }

            alert('Connect this button to your checkout route.');
        });
    }

    updateCart();
});
</script>

@endsection
