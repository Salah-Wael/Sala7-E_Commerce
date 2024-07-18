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

    

    <!-- contact form -->
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
                                <label class="form-label" for="main-image">Main Image</label>
                                <input class="contact-form" type="file" name="image" value="{{ old('image')}}" id="main-image" accept=".jpeg, .jpg, .png, .jfif, .svg">
                            </div>
                            @if($errors->has('image'))
                                <div class="alert alert-danger">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            @endif
                            <div class="form-group">
                                <p>
                                    <div>
                                        <label class="form-label" for="quantity">Quantity</label>
                                        <input class="product-quantity" name="quantity" value="{{ old('quantity')}}" id="quantity" type="number" placeholder="Quantity" min="1">
                                    </div>
                                    @if($errors->has('quantity'))
                                        <div class="alert alert-danger">
                                            @error('quantity')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    @endif

                                    <div>
                                        <label class="form-label" for="price">Price</label>
                                        <input class="product-quantity" name="price" value="{{ old('price')}}" id="price" type="number" placeholder="Price" min="1">
                                    </div>
                                    @if($errors->has('price'))
                                        <div class="alert alert-danger">
                                            @error('price')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    @endif

                                    <div class="form-controller">
                                        <label class="form-label" for="category">Category</label>
                                        <select class="form-select" id="category" name="category_name" value="{{ old('category_name')}}">
                                            <option value="">__</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category['name'] }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('category_name'))
                                        <div class="alert alert-danger">
                                            @error('category_name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label class="form-label" for="main-image">Main Image</label>
                                        <input class="contact-form" type="file" name="image_path" value="{{ old('image_path')}}" id="main-image" accept=".jpeg, .jpg, .png, .jfif, .svg">
                                    </div>
                                    @if($errors->has('image_path'))
                                        <div class="alert alert-danger">
                                            @error('image_path')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    @endif
                                </p>
                            </div>
							<p><input type="submit" value="Submit"></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->
@endsection
