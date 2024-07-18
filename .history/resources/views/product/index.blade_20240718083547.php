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
                        <h2>{{ __('messages.All Products') }}</h2>
                        @if (session('success'))
                            <p>{{ session('success') }}</p>
                        @endif
                        @if($errors->has('quantity'))
                            <div class="alert alert-danger">
                                @error('quantity')
                                    {{ $message }}
                                @enderror
                            </div>
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
                            <li class="active" data-filter="*">All</li>
                            @forelse ($categories as $category)
                                <li data-filter=".{{ str_replace(' ', '', $category->name) }}">{{ $category->name }}</li>
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
                            {{-- <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li> --}}
                            {{ $products->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        svg {
            width: 50px;
            height: 50px;
        }

.pagination-wrap {
    display: flex;
    justify-content: center;
    align-items: center;
}

/* .pagination {
    list-style: none;
    padding: 0;
    display: flex;
} */

/* .pagination li {
    margin: 0 5px;
} */

/* .pagination li a {
    display: block;
    padding: 10px 15px;
    text-decoration: none;
    color: #333;
    border: 1px solid #ddd;
    border-radius: 4px;
    transition: all 0.3s ease;
} */

/* .pagination li a:hover {
    background-color: #f28123;
    color: #fff;
    border-color: #f28123;
} */

/* .pagination li span {
    display: block;
    padding: 10px 15px;
    color: #999;
    border: 1px solid #ddd;
    border-radius: 4px;
} */

/* .pagination .active span {
    background-color: #f28123;
    color: #fff;
    border-color: #f28123;
} */
    </style>
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

    <!-- Initialize Isotope -->
    <script>
        $(document).ready(function(){
            var $grid = $('.product-lists').isotope({
                itemSelector: '.col-lg-4',
                layoutMode: 'fitRows'
            });

            $('.product-filters ul li').click(function(){
                $('.product-filters ul li').removeClass('active');
                $(this).addClass('active');

                var selector = $(this).attr('data-filter');
                $grid.isotope({ filter: selector });
                return false;
            });
        });
    </script>
@endsection
