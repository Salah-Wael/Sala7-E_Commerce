@extends('layouts.master')

@section('title')
    News
@endsection

@section('content')
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Organic Information</p>
						<h2>All Tags</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">

                @foreach ($tags as $tag)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-news">
                            <a href=""><div class="latest-news-bg news-bg-2"></div></a>
                            <div class="news-text-box">
                                <h3><a href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
			</div>
		</div>
	</div>
	<!-- end latest news -->

@endsection