@extends('layouts.master')

@section('title')
    404!
@endsection

@section('content')
    <!-- breadcrumb-section -->
		<div class="breadcrumb-section breadcrumb-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="breadcrumb-text">
							<h1>404 - Not Found</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end breadcrumb section -->
		<!-- error section -->
		<div class="full-height-section error-section">
			<div class="full-height-tablecell">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 text-center">
							<div class="error-text">
								<i class="far fa-sad-cry"></i>
								<h1>Oops! Not Found.</h1>
                                @isset($message)
                                    <p>{{ $message }}</p>
                                @endisset

								<a href="/" class="boxed-btn">Back to Home</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end error section -->
		<!-- logo carousel -->
		<div class="logo-carousel-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="logo-carousel-inner">
							<div class="single-logo-item">
								<img src="assets/img/company-logos/1.png" alt="">
							</div>
							<div class="single-logo-item">
								<img src="assets/img/company-logos/2.png" alt="">
							</div>
							<div class="single-logo-item">
								<img src="assets/img/company-logos/3.png" alt="">
							</div>
							<div class="single-logo-item">
								<img src="assets/img/company-logos/4.png" alt="">
							</div>
							<div class="single-logo-item">
								<img src="assets/img/company-logos/5.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    <!-- end logo carousel -->
@endsection