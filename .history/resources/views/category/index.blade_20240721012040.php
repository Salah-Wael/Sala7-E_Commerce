@extends('layouts.master')

@section('title')
    All Categories
@endsection

@section('content')
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
                        <p>check Offers today {{ \Carbon\Carbon::now()->format('d/m') }}</p>
                        <h2>{{ __('messages.All Categories') }}</h2>
                        @if (session('success'))
                            <p>{{ session('success') }}</p>
                        @endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

    {{-- <div class="row product-lists">
        @foreach ($categories as $category)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{route('product.category.show', $category->name)}}"><img src="{{ asset('assets\img\categories\\'.$category->image_path) }}" alt="{{ $category->name }}"></a>
                    </div>
                    <h3>{{ $category->name }}</h3>
                    <p>{{ $category->description }}</p>
                </div>
            </div>
        @endforeach
    </div> --}}

    <!-- category section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Categories</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                {{-- style="max-height:250px !important;min-height:250px !important"> --}}
                                <a href="{{route('product.category.show', $category->name)}}">
                                    <img 
                                        style="max-height:300px !important;min-height:250px !important"
                                        src="{{ asset('assets\img\categories\\'.$category->image_path) }}" 
                                        alt="{{ $category->name }}"
                                    >
                                </a>
                            </div>
                            <h3>{{ $category->name }}</h3>
                            <p>{{ $category->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end category section -->
@endsection