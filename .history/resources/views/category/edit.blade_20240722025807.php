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
                                <h3><span class="orange-text">Edit new</span> Product</h3>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->



    <!-- contact form -->
    <!-- edit category form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="row">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <div class="section-title">
                                <h3><span class="orange-text">Edit new</span> Category</h3>
                            </div>
                        </div>
                    </div>
					<div class="contact-form">
						<form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
							<p>
								<input style="width: 100%;" type="text" placeholder="Category Name" name="name" value="{{ $category->name }}">
                                @if($errors->has('name'))
                                    <div class="alert alert-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif
							</p>
                            <p>
                                <textarea name="description" cols="30" rows="10" placeholder="Description">{{ $category->description }}</textarea>
                                @if($errors->has('description'))
                                    <div class="alert alert-danger">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif
                            </p>
                            <div class="form-group">
                                <input type="file" name="image_path" value="{{ old('image_path')}}" accept=".jpeg, .jpg, .png, .jfif, .svg">
                                <img
                                    style="min-height: 250px; max-height: 250px"
                                    src="{{ asset('assets/img/categories/'.$category->image_path) }}" alt="{{ $category->name }}">
                            </div>
                            @if($errors->has('image_path'))
                                <div class="alert alert-danger">
                                    @error('image_path')
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
	<!-- end edit category form -->
@endsection
