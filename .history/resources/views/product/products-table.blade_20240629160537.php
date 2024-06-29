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
    
        
@endsection

@section('css')
    //cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css
@endsection


@section('script')

    https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js
    //cdn.datatables.net/2.0.8/js/dataTables.min.js
@endsection
