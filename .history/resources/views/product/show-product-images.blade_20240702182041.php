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
                        <h2>All {{ $productImages->product->name }}'s images</h2>
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
            <div class="row product-lists">
                @forelse ($productImages as $item)
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
                                @if($product->category_name == 'fruits' || $product->category_name == 'vegetables')
                                    <span>Per Kg</span>
                                @else
                                    <span>{{ $product->quantity }}</span>
                                @endif
                                {{ $product->price }}
                            </p>
                            
                            <a href="{{ route('cart.store', $product->id) }}" class="cart-btn">
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
                @empty
                    Sorry! No products Today
                @endforelse
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            {{-- <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li> --}}
                            <li>
                                {{ $products->links() }}
                            </li>
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
    </style>
@endsection