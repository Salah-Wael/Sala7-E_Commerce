@extends('layouts.master')

@section('title')
    Edit a Tag
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
                                <h3><span class="orange-text">{{ $tag->tag }}</span></h3>
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
                                <h3><span class="orange-text">{{ $tag->tag }}</span> Tag</h3>
                            </div>
                        </div>
                    </div>
					<div class="contact-form">
						<form method="POST" action="{{ route('tag.store') }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
							<p>
								<input style="width: 100%;" type="text" placeholder="Tag Name" name="tag" value="{{ old('tag')}}">
                                @if($errors->has('tag'))
                                    <div class="alert alert-danger">
                                        @error('tag')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif
							</p>
							<p><input type="submit" value="Submit"></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
