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
                        <h2>All Products</h2>
						<p>check Offers today {{ \Carbon\Carbon::now()->format('d/m') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table id="products" class="display">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Row 1 Data 1</td>
                <td>Row 1 Data 2</td>
            </tr>
            <tr>
                <td>Row 2 Data 1</td>
                <td>Row 2 Data 2</td>
            </tr>
        </tbody>
    </table>
    <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table id="products" class="cart-table display">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove">Delete</th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr class="table-body-row">
                                    <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                                    <td class="product-image"><img src="assets/img/products/{{ $product->image_path }}" alt="{{ $product->name }}"></td>
                                    <td class="product-name">{{ $product->name }}</td>
                                    <td class="product-price">{{ $product->price }}</td>
                                    <td class="product-quantity">{{ $product->quantity }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('css')
    <link rel="stylesheet" href="cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-qFOQ9YFAeGj1gDOuUD61g3D+tLDv3u1ECYWqT82WQoaWrOhAY+5mRMTTVsQdWutbA5FORCnkEPEgU0OF8IzGvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
@endsection
