@extends('layouts.master')

@section('title')
    Product's Images
@endsection

@section('content')

    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
                        <h2>All {{ $product->name }}'s images</h2>
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
                                @if ($item->image_path)
                                    <a href="{{-- route('product.show', $product->id) --}}">
                                        <img
                                        style="min-height: 250px; max-height: 250px"
                                        src="{{ asset('assets/img/products/'.$item->image_path) }}" alt="{{ $product->name }}"
                                        >
                                    </a>
                                @endif
                            </div>
                            <h3>{{ $product->name }}</h3>
                            
                            
                            @if (Auth::check() && Auth::user()->role == 'admin')

                                <a href="{{-- route('product.delete', $product->id) --}}" 
                                    onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();" class="cart-btn">
                                <i class="fas fas fa-trash"></i>
                                {{ __('Delete') }}
                                </a>
                                <form id="delete-form" action="{{-- route('product.delete', $item->id) --}}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endif
                        </div>
                    </div>
                @empty
                    Sorry! You don't enter any images to this product
                @endforelse
            </div>
        </div>
    </div>
@endsection