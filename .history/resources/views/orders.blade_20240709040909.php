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
                            @forelse ($orderRecipients as $recipients)
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Recipient Details ({{ $order->recipient->name }})
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
                                                <p><input type="email" name="email" value="{{ $order->recipient->email }}" placeholder="Email" readonly></p>
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
                                                    <textarea name="comment" cols="30" rows="10" placeholder="Comments" readonly>{{ $order->recipient->comment }}</textarea>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                @forelse ($order->product as $item)
                                    
                                
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

                                            <td class="product-image"><img src= "{{ asset('assets/img/products/'.$item->image_path) }}" alt="{{ $item->name }}"></td>
                                            <td class="product-name">
                                                <a href="{{ route('product.show', $item->id) }}">
                                                    {{ $item->name }}
                                                </a>
                                            </td>

                                            <td class="product-price">{{ $order->price }}</td>
                                            <td class="product-quantity">
                                                <input type="number" value="{{ $order->quantity }}" readonly>
                                            </td>
                                            <td class="product-total">{{ $order->price*$order->quantity }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @empty
                                    
                                @endforelse
                            </div>
                            @empty
                                No orders
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
