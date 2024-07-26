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
						<h2>News Article</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

    <!-- news -->
    <div class="latest-news mt-150 mb-150">
        <div class="container">
            <div class="row">

                @foreach ($news as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-news">
                            <a href="{{ route('news.show', $post->id) }}">
                                <div >
                                    <img
                                        style="min-height: 250px; max-height: 250px; border-radius: 10px;"
                                        src="{{ asset('assets/img/news/'.$post->image) }}" alt="{{ $post->title }}"
                                        >
                                </div>
                            </a>
                            <div class="news-text-box">
                                <h3><a href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a></h3>
                                <p class="blog-meta">
                                    <span class="author"><i class="fas fa-user"></i> {{ $post->role }}</span>
                                    <span class="date"><i class="fas fa-calendar"></i> {{ $post->created_at->format('d F, Y') }}</span>
                                </p>
                                @if (strlen($post->content) > 30)
                                    <p class="excerpt">{{ substr($post->content, 0, 30) }}...</p>
                                @else
                                    <p class="excerpt">{{ substr($post->content, 0, 30) }}</p>
                                @endif
                                <a href="{{ route('news.show', $post->id) }}" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                            </div>
                            
                            @if (Auth::check() && Auth::user()->role == 'admin')
                                <a href="{{ route('news.edit', $post->id) }}" class="cart-btn"><i class="fas fa-edit"></i> Edit</a>

                                <a href="{{ route('news.delete', $post->id) }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();" class="cart-btn">
                                <i class="fas fas fa-trash"></i>
                                {{ __('Delete') }}
                                </a>
                                <form id="delete-form" action="{{ route('news.delete', $post->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul class="pagination">
                            {{ $news->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end news -->

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

@section('css')
    <style>
        svg {
            width: 50px;
            height: 50px;
        }
    </style>
@endsection