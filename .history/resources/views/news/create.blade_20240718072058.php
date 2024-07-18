@extends('layouts.master')

@section('title')
    create new product
@endsection

@section('content')

    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="row">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <div class="section-title">	
                                <h3><span class="orange-text">Add News</span> Article</h3>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="row">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <div class="section-title">	
                                <h3><span class="orange-text">Add News</span> Article</h3>
                            </div>
                        </div>
                    </div>
					<div class="contact-form">
						<form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
							<p>
								<input style="width: 100%;" type="text" placeholder="Post Title" name="title" value="{{ old('title')}}">
                                @if($errors->has('title'))
                                    <div class="alert alert-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif
							</p>
                            <p>
                                <textarea name="content" cols="30" rows="10" placeholder="Description">{{ old('content')}}</textarea>
                                @if($errors->has('content'))
                                    <div class="alert alert-danger">
                                        @error('content')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif
                            </p>
                            <div class="form-group">
                                @forelse ($tags as $tag)
                                    <input 
                                    class="contact-form" type="checkbox" id="{{ $tag->tag }}" name="tags[]" value="{{ $tag->tag }}"
                                    {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                    <label class="form-label" for="{{ $tag->tag }}">{{ $tag->tag }}</label>
                                @empty
                                    
                                @endforelse
                            </div>
                            @if($errors->has('tags'))
                                <div class="alert alert-danger">
                                    @error('tags')
                                        @foreach($errors->get('tags') as $message)
                                            {{ $message }}
                                        @endforeach
                                    @enderror
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="form-label" for="post-image">Image</label>
                                <input class="contact-form" type="file" name="image" value="{{ old('image')}}" id="post-image" accept=".jpeg, .jpg, .png, .jfif, .svg">
                            </div>
                            @if($errors->has('image'))
                                <div class="alert alert-danger">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            @endif
							<p><input type="submit" value="Submit"></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
