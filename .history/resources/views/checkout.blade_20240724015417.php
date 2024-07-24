@extends('layouts.master')

@section('title')
    Checkout
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
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Order recipient
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form id="add-to-order-details-form" action="{{ route('order.store') }}"
                                                method="POST">
                                                @csrf
                                                <p><input type="text" name="name" placeholder="Name" required></p>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <p><input type="email" name="email" placeholder="Email"></p>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <p><input type="text" name="address" placeholder="Address" required></p>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <p><input type="tel" name="phone" placeholder="Phone" required></p>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <p>
                                                    <label for="country"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
                                                    <select class="form-control" id="country" name="country" required>
                                                        <option value="">__</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->name }}">{{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </p>
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <p>
                                                    <label for="city"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>
                                                    <select class="form-control" id="city" name="city" required>
                                                        <option value="">__</option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->name }}">{{ $city->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </p>
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <p>
                                                    <textarea name="comment" cols="30" rows="10" placeholder="Any Comments?"></textarea>
                                                </p>
                                                @error('comment')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Shipping Address
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shipping-address-form">
                                            <p>Your shipping address form is here.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Card Details
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="card-details">
                                            <div class="card">
                                                <div class="card-body">

                                                    @if ($message = Session::get('success'))
                                                        <div class="alert alert-success alert-dismissible fade show"
                                                            role="alert">
                                                            <strong>{{ $message }}</strong>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="alert"
                                                                aria-label="Close"></button>
                                                        </div>
                                                    @endif

                                                    @if ($message = Session::get('error'))
                                                        <div class="alert alert-danger alert-dismissible fade show"
                                                            role="alert">
                                                            <strong>{{ $message }}</strong>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    @endif

                                                    <center >
                                                        <a href="{{ route('paypal.payment', ) }}"
                                                            class="btn btn-success">
                                                            Pay with  
                                                            <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0" alt="PayPal">
                                                        </a>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <td class="product-image"><img
                                                src= "{{ asset('assets/img/products/' . $cart->image_path) }}"
                                                alt="{{ $cart->name }}"></td>
                                        <td>{{ $cart->name }}</td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>{{ $cart->quantity * $cart->price }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="4">
                                        <center>Order Details</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="checkout-details">
                                <tr>
                                    <td colspan="2">Subtotal</td>
                                    <td colspan="2">
                                        <center>{{ $subTotalPrice }}</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Shipping</td>
                                    <td colspan="2">
                                        <center>$50</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Total Order Price</td>
                                    <td colspan="2">
                                        <center>$240</center>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('order.store') }}" class="cart-btn"
                            onclick="event.preventDefault();
                            document.getElementById('add-to-order-details-form').submit();">
                            <i class="fas fa-shopping-cart"></i>
                            {{ __('Place Order') }}
                        </a>
                        <a href="{{ route('previous.checkout.show') }}" class="cart-btn" <i
                            class="fas fa-shopping-cart"></i>
                            {{ __('Previous Orders') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->
@endsection
