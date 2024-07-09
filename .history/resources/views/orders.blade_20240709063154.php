@extends('layouts.master')

@section('title')
    All Orders
@endsection

@section('content')
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h2>Check Out Product</h2>
                        @if (session('success'))
                            <p>{{ session('success') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            @forelse ($orderRecipients as $recipient)
                            <div class="card single-accordion">
                                <div class="card-header" id="heading{{ $recipient->id }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse{{ $recipient->id }}" aria-expanded="false" aria-controls="collapse{{ $recipient->id }}">
                                            Order number {{ $recipient->id }} ({{ $recipient->name}})
                                            {{ " created at ". $recipient->created_at }}
                                            <i class="fas fa-chevron-down ml-2"></i>
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse{{ $recipient->id }}" class="collapse" aria-labelledby="heading{{ $recipient->id }}"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form id="add-to-order-details-form" action="{{ route('order.store') }}" method="POST">
                                            @csrf
                                                <p><input type="text" name="name" value="{{ $recipient->name }}" readonly></p>
                                                <p><input type="email" name="email" value="{{ $recipient->email }}" placeholder="Email" readonly></p>
                                                <p><input type="text" name="address" value="{{ $recipient->address }}" readonly></p>
                                                <p><input type="tel" name="phone" value="{{ $recipient->phone }}" readonly></p>
                                                <p>
                                                    <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
                                                    <select class="form-control" id="country" name="country" readonly>
                                                            <option value="{{ $recipient->country }}">{{ $recipient->country }}</option>
                                                    </select>
                                                </p>
                                                <p>
                                                    <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>
                                                    <select class="form-control" id="city" name="city" readonly>
                                                        <option value="{{ $recipient->city }}">{{ $recipient->city }}</option>
                                                    </select>
                                                </p>
                                                <p>
                                                    <textarea name="comment" cols="30" rows="10" placeholder="Comments" readonly>{{ $recipient->comment }}</textarea>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                    @forelse ($recipient->orders as $order)
                                        <table class="cart-table">
                                            <thead class="cart-table-head">
                                                <tr class="table-head-row">
                                                    {{-- <th class="product-remove"></th> --}}
                                                    <th class="product-image">Product Image</th>
                                                    <th class="product-name">Name</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-quantity">Quantity</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="table-body-row">
        
                                                    <td class="product-image mb-12"><center><img src= "{{ asset('assets/img/products/'.$order->product->image_path) }}" alt="{{ $order->product->name }}"></center></td>
                                                    <td class="product-name">
                                                        <center>
                                                            <a href="{{ route('product.show', $order->product->id) }}">
                                                                {{ $order->product->name }}
                                                            </a>
                                                        </center>
                                                    </td>
        
                                                    <td class="product-price"><center>{{ $order->price }}</center></td>
                                                    <td class="product-quantity">
                                                        <center><input type="number" value="{{ $order->quantity }}" readonly></center>
                                                    </td>
                                                    <td class="product-total"><center>{{ $order->price*$order->quantity }}</center></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                    @empty
                                        No orders
                                    @endforelse
                                    <table class="order-details" width="100%">
                                        <thead>
                                            <tr>
                                                <th colspan="4" class="orange-text"><center>Order Details</center></th>
                                            </tr>
                                        </thead>
                                        <tbody class="checkout-details">
                                            <tr>
                                                <td colspan="2"><center>Subtotal</center></td>
                                                <td colspan="2"><center>{{-- $subTotalPrice --}}</center></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><center>Shipping</center></td>
                                                <td colspan="2"><center>$50</center></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><center>Total Order Price</center></td>
                                                <td colspan="2"><center>$240</center></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            @empty
                                No recipient
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/1.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/2.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/3.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/4.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->
@endsection
