@extends('layouts.master')

@section('title')
    Products
@endsection

@section('content')

    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
                        <p>check Offers today {{ \Carbon\Carbon::now()->format('d/m') }}</p>
                        <h2>All Products</h2>
                        @if (session('success'))
                            <p>{{ session('success') }}</p>
                        @endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <a href="{{ route('product.index') }}"><li >{{ __('messages.All') }}</li></a>
                            @forelse ($categories as $category)
                                <a href="{{ route('product.category.show', $category->name) }}" class="active"><li >{{ $category->name }}</li></a>
                            @empty
                                No categories
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                @if ($products)
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center {{ str_replace(' ', '', $product->category_name) }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                @if ($product->image_path)
                                    <a href="{{ route('product.show', $product->id) }}">
                                        <img
                                        style="min-height: 250px; max-height: 250px"
                                        src="{{ asset('assets/img/products/'.$product->image_path) }}" alt="{{ $product->name }}"
                                        >
                                    </a>
                                @endif
                            </div>
                            <h3>{{ $product->name }}</h3>
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

                                {{-- Error message displayed within the loop but only for the first occurrence --}}
                                @if($loop->first && $errors->has('quantity'))
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

                            <a href="{{ route('cart.store', $product->id) }}" class="cart-btn"
                            onclick="event.preventDefault();
                            document.getElementById('add-to-cart-form-{{ $product->id }}').submit();">
                            <i class="fas fa-shopping-cart"></i>
                            {{ __('Add to Cart') }}
                            </a>
                            @if (Auth::check() && Auth::user()->role == 'admin')
                                <a href="{{ route('product.edit', $product->id) }}" class="cart-btn"><i class="fas fa-edit"></i> Edit</a>

                                <a href="{{ route('product.delete', $product->id) }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();" class="cart-btn">
                                <i class="fas fas fa-trash"></i>
                                {{ __('Delete') }}
                                </a>
                                <form id="delete-form" action="{{ route('product.delete', $product->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @else
                    Sorry! No products Today
                @endif
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul class="pagination">
                            {{ $products->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- features list section -->
            <div class="list-section mt-80 pt-80 pb-80">
                <div class="container">
    
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                            <div class="list-box d-flex align-items-center">
                                <div class="list-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div class="content">
                                    <h3>Free Shipping</h3>
                                    <p>When order over $75</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                            <div class="list-box d-flex align-items-center">
                                <div class="list-icon">
                                    <i class="fas fa-phone-volume"></i>
                                </div>
                                <div class="content">
                                    <h3>24/7 Support</h3>
                                    <p>Get support all day</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="list-box d-flex justify-content-start align-items-center">
                                <div class="list-icon">
                                    <i class="fas fa-sync"></i>
                                </div>
                                <div class="content">
                                    <h3>Refund</h3>
                                    <p>Get refund within 3 days!</p>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        <!-- end features list section -->
    </div>
@endsection

@section('css')
    <style>
        svg {
            width: 50px;
            height: 50px;
        }
    </style>
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
@endsection
