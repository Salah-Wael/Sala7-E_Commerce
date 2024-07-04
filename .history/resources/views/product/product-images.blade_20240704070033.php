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
            <center>
                <form action="" method="">
                <div class="form-group">
                    <label class="form-label" for="main-image">Add Images</label>
                    <input class="contact-form" type="file" name="image_path" value="{{ old('image_path')}}" id="main-image" accept=".jpeg, .jpg, .png, .jfif, .svg">
                </div>

                @if($errors->has('image_path'))
                    <div class="alert alert-danger">
                        @error('image_path')
                            {{ $message }}
                        @enderror
                    </div>
                @endif
                
            </center>
            <div class="row product-lists">

                @forelse ($productImages as $item)
                    <div class="col-lg-4 col-md-6 text-center {{ str_replace(' ', '', $product->category_name) }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                @if ($item->image_path)
                                    <img
                                    style="min-height: 250px; max-height: 250px"
                                    src="{{ asset('assets/img/products/'.$item->image_path) }}" alt="{{ $product->name }}"
                                    >
                                @endif
                            </div>


                            @if (Auth::check() && Auth::user()->role == 'admin')

                                <a href="{{ route('product.delete.image', $item->id) }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();" class="cart-btn">
                                <i class="fas fas fa-trash"></i>
                                {{ __('Delete') }}
                                </a>
                                <form id="delete-form" action="{{ route('product.delete.image', $item->id) }}" method="POST" class="d-none">
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
