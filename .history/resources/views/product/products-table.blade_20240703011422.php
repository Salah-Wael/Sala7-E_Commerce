@extends('layouts.master')

@section('title')
    All Products
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
                        <table id="products" class="cart-table display">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-name">Category</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    @if (Auth::check() && Auth::user()->role == 'admin')
                                        <th >Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr class="table-body-row">
                                    <td class="product-image"><img src="assets/img/products/{{ $product->image_path }}" alt="{{ $product->name }}"></td>
                                    <a href="{{ route('product.show', $product->id) }}">
                                    </a>
                                    <td class="product-name">{{ $product->name }}</td>
                                    <td class="product-name">{{ $product->category_name }}</td>
                                    <td class="product-price">{{ $product->price }}</td>
                                    <td class="product-quantity">{{ $product->quantity }}</td>
                                    @if (Auth::check() && Auth::user()->role == 'admin')
                                        <td >
                                            <a href="{{ route('product.edit', $product->id) }}" class="cart-btn"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="{{ route('product.show.images', $product->id) }}" class="cart-btn"><i class="fas fa-images"></i> Images</a>
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
                                        </td>
                                    @endif
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-qFOQ9YFAeGj1gDOuUD61g3D+tLDv3u1ECYWqT82WQoaWrOhAY+5mRMTTVsQdWutbA5FORCnkEPEgU0OF8IzGvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#products').DataTable();
        });
    </script>
@endsection