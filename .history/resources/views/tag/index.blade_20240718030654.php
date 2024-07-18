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

	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">
                @foreach ($tags as $tag)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-news">
                            <div class="news-text-box">
                                <center><h3>{{ $tag->tag }}</h3></center>

                            </div>
                            <center>
                            <a href="{{ route('tag.edit', $tag->id) }}" class="cart-btn"><i class="fas fa-edit"></i> Edit</a>
    
                            @if (Auth::check() && Auth::user()->role == 'admin')
                                <a href="{{ route('tag.delete', $tag->id) }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();" class="cart-btn">
                                <i class="fas fas fa-trash"></i>
                                {{ __('Delete') }}
                                </a>
                                <form id="delete-form" action="{{ route('tag.delete', $tag->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            
                            </center>
                        </div>
                    </div>
                @endforeach
			</div>
		</div>
	</div>

@endsection