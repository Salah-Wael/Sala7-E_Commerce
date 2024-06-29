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
    <table id="products" class="" class="cart-table">
        <thead class="cart-table-head">
            <tr class="table-head-row">
                <th class="product-remove"></th>
                <th class="product-image">Product Image</th>
                <th class="product-name">Name</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-total">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-body-row">
                <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                <td class="product-image"><img src="assets/img/products/product-img-1.jpg" alt=""></td>
                <td class="product-name">Strawberry</td>
                <td class="product-price">$85</td>
                <td class="product-quantity"><input type="number" placeholder="0"></td>
                <td class="product-total">1</td>
            </tr>
            <tr class="table-body-row">
                <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                <td class="product-image"><img src="assets/img/products/product-img-2.jpg" alt=""></td>
                <td class="product-name">Berry</td>
                <td class="product-price">$70</td>
                <td class="product-quantity"><input type="number" placeholder="0"></td>
                <td class="product-total">1</td>
            </tr>
            <tr class="table-body-row">
                <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                <td class="product-image"><img src="assets/img/products/product-img-3.jpg" alt=""></td>
                <td class="product-name">Lemon</td>
                <td class="product-price">$35</td>
                <td class="product-quantity"><input type="number" placeholder="0"></td>
                <td class="product-total">1</td>
            </tr>
        </tbody>
    </table>
@endsection

@section('css')
    <link rel="stylesheet" href="cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-qFOQ9YFAeGj1gDOuUD61g3D+tLDv3u1ECYWqT82WQoaWrOhAY+5mRMTTVsQdWutbA5FORCnkEPEgU0OF8IzGvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
@endsection
