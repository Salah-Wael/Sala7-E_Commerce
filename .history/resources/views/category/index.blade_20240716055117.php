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
                        <h2>{{ __('messages.') }}</h2>
                        @if (session('success'))
                            <p>{{ session('success') }}</p>
                        @endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

    <div class="row product-lists">
        @foreach ($categories as $category)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image"
                        {{-- style="max-height:250px !important;min-height:250px !important" --}}>
                        <a href="{{route('product.category.show', $category->name)}}"><img src="{{ asset('assets\img\categories\\'.$category->image_path) }}" alt="{{ $category->name }}"></a>
                    </div>
                    <h3>{{ $category->name }}</h3>
                    <p>{{ $category->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection