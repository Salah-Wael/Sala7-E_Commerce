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
                <div class="col-lg-6">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            @forelse ($orderDetails as $order)
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Order number {{ $order->id }}
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form id="add-to-order-details-form" action="{{ route('order.store') }}" method="POST">
                                            @csrf
                                                <p><input type="text" name="name" value="{{ $order->recipient->name }}" readonly></p>
                                                <p><input type="email" name="email" value="{{ $order->recipient->email }}" readonly></p>
                                                <p><input type="text" name="address" value="{{ $order->recipient->address }}" readonly></p>
                                                <p><input type="tel" name="phone" value="{{ $order->recipient->phone }}" readonly></p>
                                                <p>
                                                    <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
                                                    <select class="form-control" id="country" name="country" readonly>
                                                            <option value="{{ $order->recipient->country }}">{{ $order->recipient->country }}</option>
                                                    </select>
                                                </p>
                                                <p>
                                                    <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>
                                                    <select class="form-control" id="city" name="city" readonly>
                                                        <option value="{{ $order->recipient->city }}">{{ $order->recipient->city }}</option>
                                                    </select>
                                                </p>
                                                <p>
                                                    <textarea name="comment" cols="30" rows="10" readonly>{{ $order->recipient->comment }}</textarea>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                No orders
                            @endforelse
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="order-details-wrap">
                        <table class="order-details">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="order-details-body">
                                @foreach ($productsInCart as $cart)
                                    <tr>
                                        <td class="product-image"><img src= "{{ asset('assets/img/products/'.$cart->image_path) }}" alt="{{ $cart->name }}"></td>
                                        <td>{{ $cart->name }}</td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>{{$cart->quantity * $cart->price }}</td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="4"><center>Order Details</center></th>
                                </tr>
                            </thead>
                            <tbody class="checkout-details">
                                <tr>
                                    <td colspan="2">Subtotal</td>
                                    <td colspan="2"><center>{{ $subTotalPrice }}</center></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Shipping</td>
                                    <td colspan="2"><center>$50</center></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Total Order Price</td>
                                    <td colspan="2"><center>$240</center></td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <a href="#" class="boxed-btn">Place Order</a> --}}
                        <a href="{{ route('order.store') }}" class="cart-btn"
                            onclick="event.preventDefault();
                            document.getElementById('add-to-order-details-form').submit();">
                            <i class="fas fa-shopping-cart"></i>
                            {{ __('Place Order') }}
                        </a>
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