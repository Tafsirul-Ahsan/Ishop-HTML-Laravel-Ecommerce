
@extends('admin.master')

@section('homeContent')

<style>
    .order-card {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
        margin: 20px 0;
        overflow: hidden;
    }

    .order-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding: 22px 25px;
        border-bottom: 1px solid #edf0f5;
    }

    .order-header h3 {
        margin: 0;
        color: #253047;
        font-size: 23px;
        font-weight: 700;
    }

    .order-header p {
        margin: 6px 0 0;
        color: #8992a3;
        font-size: 13px;
    }

    .order-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .order-table {
        width: 100%;
        min-width: 1900px;
        border-collapse: separate;
        border-spacing: 0;
        margin: 0;
        background: #fff;
    }

    .order-table thead th {
        background: #f5f7fb;
        color: #536078;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
        padding: 16px 13px;
        text-align: center;
        white-space: nowrap;
        border: none;
        border-bottom: 1px solid #e7ebf2;
    }

    .order-table tbody td {
        padding: 14px 13px;
        color: #566176;
        font-size: 13px;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
        border: none;
        border-bottom: 1px solid #f0f2f6;
    }

    .order-table tbody tr {
        transition: background .2s ease;
    }

    .order-table tbody tr:hover {
        background: #f8faff;
    }

    .order-table tbody tr:last-child td {
        border-bottom: none;
    }

    .order-product-image {
        width: 65px;
        height: 65px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e9edf3;
        padding: 3px;
        background: #fff;
    }

    .order-id {
        font-weight: 700;
        color: #344767;
    }

    .order-price {
        color: #344767;
        font-weight: 600;
    }

    .order-total {
        color: #198754;
        font-weight: 700;
        font-size: 14px;
    }

    .order-address {
        display: inline-block;
        max-width: 180px;
        white-space: normal;
        overflow-wrap: anywhere;
        text-align: left;
        line-height: 1.6;
    }

    .order-status {
        display: inline-block;
        padding: 7px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    .status-pending {
        color: #b7791f;
        background: #fff4d6;
    }

    .status-completed {
        color: #16834a;
        background: #dcfce7;
    }

    .order-actions {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .order-action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        border-radius: 9px;
        text-decoration: none !important;
        border: 1px solid transparent;
        transition: all .2s ease;
        cursor: pointer;
    }

    .order-action-btn i {
        font-size: 14px;
    }

    .order-action-btn.complete {
        color: #198754;
        background: #e7f8ee;
        border-color: #c9efd7;
    }

    .order-action-btn.complete:hover {
        color: #fff;
        background: #198754;
    }

    .order-action-btn.delete {
        color: #dc3545;
        background: #fff0f1;
        border-color: #ffd7db;
    }

    .order-action-btn.delete:hover {
        color: #fff;
        background: #dc3545;
    }

    .order-alert {
        margin: 20px 25px 0;
        border-radius: 10px;
    }

    .order-footer {
        padding: 14px 25px;
        color: #8a94a6;
        font-size: 12px;
        background: #fafbfe;
        border-top: 1px solid #edf0f5;
    }

    @media (max-width: 767px) {
        .order-header {
            padding: 18px;
        }

        .order-header h3 {
            font-size: 20px;
        }

        .order-alert {
            margin: 15px 15px 0;
        }
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="order-card">

            <div class="order-header">
                <div>
                    <h3>
                        <i class="fa fa-shopping-cart"
                           style="color:#198754; margin-right:8px;"></i>
                        Order Details
                    </h3>
                    <p>Manage, track and review customer orders</p>
                </div>

                <span class="badge badge-light"
                      style="padding:10px 14px; color: cryan; font-size:12px;">
                    <i class="fa fa-list-ul"></i>
                    Total: {{ count($ords) }} Orders
                </span>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show order-alert"
                     role="alert">
                    <strong>Success!</strong>
                    {{ session()->get('success') }}
                    <button type="button" class="close"
                            data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="order-table-wrapper">
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>PID</th>
                            <th>Order ID</th>
                            <th>Code</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>Customer Phone</th>
                            <th>District</th>
                            <th>City</th>
                            <th>Zip Code</th>
                            <th>Address</th>
                            <th>Time Slot</th>
                            <th>Payment Type</th>
                            <th>Grand Total</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($ords as $ordr)

                            @php
                                $items = is_array($orders)
                                    ? $orders
                                    : (is_object($orders) && method_exists($orders, 'toArray')
                                        ? $orders->toArray()
                                        : []);

                                $items = isset($items['id'])
                                    ? [$items]
                                    : $items;
                            @endphp

                            @foreach($items as $order)
                                <tr>
                                    <td>{{ $ordr->uid }}</td>
                                    <td>{{ $ordr->pid }}</td>

                                    <td class="order-id">
                                        {{ $order['id'] ?? $ordr->id }}
                                    </td>

                                    <td>
                                        {{ $order['attributes']['code'] ?? '-' }}
                                    </td>

                                    <td>
                                        @if(!empty($order['attributes']['thum_img']))
                                        dd($order['attributes']['thum_img']);
                                            <img
                                                class="order-product-image"
                                                src="{{ asset('uploads/' . $order['attributes']['thum_img']) }}"
                                                alt="Product"
                                                loading="lazy"
                                            >
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>

                                    <td style="font-weight:600; color:#344767;">
                                        {{ $order['name'] ?? '-' }}
                                    </td>

                                    <td class="order-price">
                                        {{ $order['price'] ?? 0 }}
                                    </td>

                                    <td>{{ $order['quantity'] ?? 0 }}</td>

                                    <td class="order-price">
                                        {{ $order['attributes']['subtotal'] ?? '-' }}
                                    </td>

                                    <td>{{ $ordr->mobile }}</td>
                                    <td>{{ $ordr->prefecture }}</td>
                                    <td>{{ $ordr->city }}</td>
                                    <td>{{ $ordr->postal_code }}</td>

                                    <td>
                                        <span class="order-address">
                                            {{ $ordr->address }}
                                        </span>
                                    </td>

                                    <td>{{ $ordr->time_slot }}</td>
                                    <td>Cash On Delivery</td>

                                    <td class="order-total">
                                        {{ $ordr->grandtotal }}
                                    </td>

                                    <td>
                                        {{ $ordr->created_at
                                            ? $ordr->created_at->format('d M Y')
                                            : '-' }}
                                    </td>

                                    <td>
                                        @if($ordr->status == 0)
                                            <span class="order-status status-pending">
                                                <i class="fa fa-clock-o"></i>
                                                Pending
                                            </span>
                                        @else
                                            <span class="order-status status-completed">
                                                <i class="fa fa-check-circle"></i>
                                                Completed
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="order-actions">
                                            <a
                                                href="{{ url('admin/orders/' . $ordr->id) }}"
                                                class="order-action-btn complete"
                                                title="Complete Order"
                                            >
                                                <i class="fa fa-check"></i>
                                            </a>

                                            <button
                                                type="button"
                                                class="order-action-btn delete"
                                                title="Delete Order"
                                                onclick="if(confirm('Are you sure you want to delete this order?')) document.getElementById('delete-order-{{ $ordr->id }}').submit();"
                                            >
                                                <i class="fa fa-trash"></i>
                                            </button>

                                            <form
                                                id="delete-order-{{ $ordr->id }}"
                                                method="POST"
                                                action="{{ url('admin/orders/' . $ordr->id) }}"
                                                style="display:none;"
                                            >
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        @empty
                            <tr>
                                <td colspan="20" style="padding:45px 15px;">
                                    <i class="fa fa-shopping-bag fa-3x"
                                       style="color:#cbd2df;"></i>
                                    <h4 style="margin-top:15px; color:#536078;">
                                        No Orders Found
                                    </h4>
                                    <p style="color:#8992a3; margin:0;">
                                        Customer orders will appear here.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="order-footer">
                <i class="fa fa-info-circle"></i>
                Scroll horizontally to view all order information.
            </div>

        </div>
    </div>
</div>

@endsection
