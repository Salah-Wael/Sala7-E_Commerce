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

    <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-15">
                    <div class="cart-table-wrap">
                        <table id="products" class="display">
                            <thead >
                                <tr >
                                    <th >Delete</th>
                                    <th >Product Image</th>
                                    <th >Name</th>
                                    <th >Price</th>
                                    <th >Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr >
                                    <td ><a href="#"><i class="far fa-window-close"></i></a></td>
                                    <td ><img src="assets/img/products/{{ $product->image_path }}" alt="{{ $product->name }}"></td>
                                    <td >{{ $product->name }}</td>
                                    <td >{{ $product->price }}</td>
                                    <td >{{ $product->quantity }}</td>
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

    $(document).ready( function () {
        let table = new DataTable('#products');
    } );
@endsection
