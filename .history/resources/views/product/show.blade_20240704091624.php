@extends('layouts.master')

@section('title')
    show product
@endsection

@section('content')
    @if ($product)


	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details about</p>
						<h1>{{ $product->name }}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<!-- testimonail-section -->
                    <div class="testimonial-sliders" >
                        <div class="single-testimonial-slider" style="height: 100px !important;">
                            <div class="single-product-img" >
                                <img src="{{ asset('assets/img/products/'.$product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                        </div>
                        @forelse ($productImages as $productImage)
                            <div class="single-testimonial-slider">
                                <div class="single-product-img" >
                                    <img src="{{ asset('assets/img/products/'.$productImage->image_path) }}"  alt="{{ $product->name }}">
                                </div>
                            </div>
                        @empty
                                <div class="single-product-img">
                                    <img src="{{ asset('assets/img/products/'.$product->image_path) }}" alt="{{ $product->name }}">
                                </div>
                        @endforelse
                    </div>
                    <!-- end testimonail-section -->
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{ $product->description }}</h3>
						<p class="single-product-pricing"><span>Per Kg</span> {{ $product->price }}</p>
						<div class="single-product-form">
                            <form id="add-to-cart-form" action="{{ route('cart.store', $product->id) }}" method="POST">
                            @csrf
                                <input type="number"
                                    name="quantity"
                                    min="{{ $product->quantity }}"
                                    step="{{ $product->quantity }}"
                                    value="{{ $product->quantity }}">
                                    @if($errors->has('quantity'))
                                        <div class="alert alert-danger">
                                            @error('quantity')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    @endif
							</form>

                            <a href="{{ route('cart.store', $product->id) }}" class="cart-btn"
                            onclick="event.preventDefault();
                            document.getElementById('add-to-cart-form').submit();">
                            <i class="fas fa-shopping-cart"></i>
                            {{ __('Add to Cart') }}
                            </a>
							<p><strong>Categories: </strong>{{ $product->category_name }}</p>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->


    <!-- testimonail-section -->
	<div class="testimonail-section mt-80 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="{{ asset('assets/img/avaters/avatar1.png') }}" alt="">
							</div>
							<div class="client-meta">
								<h3>Jacob Sikim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="{{ asset('assets/img/avaters/avatar2.png') }}" alt="">
							</div>
							<div class="client-meta">
								<h3>Jacob Sikim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="{{ asset('assets/img/avaters/avatar3.png') }}" alt="">
							</div>
							<div class="client-meta">
								<h3>Jacob Sikim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
                @forelse ($related as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('product.show', $product->id) }}"><img src="{{ asset('assets/img/products/'.$item->image_path) }}" alt=""></a>
                            </div>
                            <h3>{{ $item->name }}</h3>

                            <p class="product-price">
                                <form id="add-to-cart-form-{{ $product->id }}" action="{{ route('cart.store', $product->id) }}" method="POST">
                                    @csrf
                                    <label for="email" class="col-md-3 col-form-label text-md-end">{{ __('Quantity:') }}</label>
                                    <input type="number"
                                    name="quantity"
                                    min="{{ $product->quantity }}"
                                    step="{{ $product->quantity }}"
                                    value="{{ $product->quantity }}">
                                </form>

                                @if($errors->has('quantity'))
                                    <div class="alert alert-danger">
                                        @error('quantity')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif
                                @if($product->category_name == 'fruits' || $product->category_name == 'vegetables')
                                    <h3>{{"Price: ". $product->price ." "}}<span class="orange-text">Per {{ $product->quantity ." "}}</span> Kg</h3>
                                @else
                                    <h3>Price: <span class="orange-text">{{ $product->price }}</span> For<span class="orange-text"> {{ $product->quantity ." "}}</span></h3>
                                @endif
                            </p>
                            {{-- <form id="add-to-cart-form-{{ $item->id }}" action="{{ route('cart.store', $item->id) }}" method="POST">
                            @csrf
                                <label for="email" class="col-md-3 col-form-label text-md-end">{{ __('Quantity:') }}</label>
                                <input type="number"
                                name="quantity"
                                min="{{ $item->quantity }}"
                                step="{{ $item->quantity }}"
                                value="{{ $item->quantity }}">
                                @if($errors->has('quantity'))
                                    <div class="alert alert-danger">
                                        @error('quantity')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif
                            </form> --}}
                            <a href="{{ route('cart.store', $product->id) }}" class="cart-btn"
                            onclick="event.preventDefault();
                            document.getElementById('add-to-cart-form-{{ $product->id }}').submit();">
                            <i class="fas fa-shopping-cart"></i>
                            {{ __('Add to Cart') }}
                            </a>
                        </div>

				    </div>
                @empty
                    <div class="col-lg-4 col-md-6 text-center">
                        Not Related
				    </div>
                @endforelse
			</div>
		</div>
	</div>
	<!-- end more products -->



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
    @else
        Product not found
    @endif
@endsection
