@extends('layouts.master')

@section('title')
    Edit News
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
                                <h3><span class="orange-text">Edit News</span> Article</h3>
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
                                <h3><span class="orange-text">Edit News</span> Article</h3>
                            </div>
                        </div>
                    </div>
					<div class="contact-form">
						<form method="POST" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
							<p>
								<input style="width: 100%;" type="text" placeholder="Post Title" name="title" value="{{$news->title}}">
                                @if($errors->has('title'))
                                    <div class="alert alert-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif
							</p>
                            <p>
                                <textarea name="content" cols="30" rows="10" placeholder="Description">{{$news->content}}</textarea>
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
                                    class="contact-form" 
                                    type="checkbox" 
                                    id="{{ $tag->id }}" 
                                    name="tags[]" 
                                    value="{{ $tag->id }}"
                                    {{ in_array($tag->id, old('tags', $news_tags)) ? 'checked' : '' }}
                                    >

                                    <label class="form-label" for="{{ $tag->id }}">{{ $tag->tag }}</label>
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
                                <label class="col-md-4 col-form-label text-md-end" for="categoryTag">{{ __('Category Tag') }}</label>
                                <div class="col-md-6">
                                    @forelse ($categoryTags as $categoryTag)
                                        <div class="form-check">
                                            <input 
                                                class="form-check-input" 
                                                type="radio" 
                                                id="categoryTag{{ $categoryTag->id }}" 
                                                name="categoryTag" 
                                                value="{{ $categoryTag->id }}"
                                                {{ old('categoryTag') == $categoryTag->id ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="categoryTag{{ $categoryTag->id }}">{{ $categoryTag->tag }}</label>
                                        </div>
                                    @empty
                                        <p>No categories available.</p>
                                    @endforelse
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="post-image">Image</label>
                                <input class="contact-form" type="file" name="image" id="post-image" accept=".jpeg, .jpg, .png, .jfif, .svg">
                                <img
                                    style="min-height: 250px; max-height: 250px"
                                    src="{{ asset('assets/img/news/'.$news->image) }}" alt="{{$news->title}}"
                                >
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
