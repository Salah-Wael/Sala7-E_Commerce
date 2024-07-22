@extends('layouts.master')

@section('title')
    Add new Category
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
                                <h3><span class="orange-text">Add New</span> Category</h3>
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
                                <h3><span class="orange-text">Add New</span> Category</h3>
                            </div>
                        </div>
                    </div>
					<div class="contact-form">
						<form method="POST" action="{{ route('category.store') }}">
                        @method('POST')
                        @csrf
							<p>
								<input style="width: 100%;" type="text" placeholder="Category Name" name="name" value="{{ old('name')}}">
                                @if($errors->has('name'))
                                    <div class="alert alert-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif
							</p>
							<p>
								<input style="width: 100%;" type="text" placeholder="Category Name" name="name" value="{{ old('name')}}">
                                @if($errors->has('name'))
                                    <div class="alert alert-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif
							</p>
                            <p>
                                <textarea name="description" cols="30" rows="10" placeholder="Description">{{ old('description')}}</textarea>
                                @if($errors->has('description'))
                                    <div class="alert alert-danger">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif
                            </p>
                            <div class="form-group">
                                <label class="form-label" for="main-image">Image</label>
                                <input class="contact-form" type="file" name="image_path" value="{{ old('image_path')}}" id="main-image" accept=".jpeg, .jpg, .png, .jfif, .svg">
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
@endsection
