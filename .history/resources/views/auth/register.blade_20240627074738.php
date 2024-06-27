@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
@endsection

@section('content')
<!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>We sale fresh fruits</p>
                        <h2>Register</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- end breadcrumb section -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" required >
                                <div class="eye-area">
                                    <div class="eye-box" onclick="togglePasswordVisibility('password-confirm')">
                                        <i class="fa-regular fa-eye" id="eye-confirm"></i>
                                        <i class="fa-regular fa-eye-slash" id="eye-slash-confirm" style="display:none;"></i>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6 position-relative">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required >
                                <div class="eye-area">
                                    <div class="eye-box" onclick="togglePasswordVisibility('password-confirm')">
                                        <i class="fa-regular fa-eye" id="eye-confirm"></i>
                                        <i class="fa-regular fa-eye-slash" id="eye-slash-confirm" style="display:none;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="birthDate">{{ __('Birth Date') }}</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" id="birthDate" value="{{ old('birthDate') }}" name="birthDate" required>
                            </div>
                        </div>
                        @if($errors->has('birthDate'))
                            <div class="alert alert-danger">
                                @error('birthDate')
                                {{ $message }}
                                @enderror
                            </div>
                        @endif
                        
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="Gender">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select class="col-md-6 form-control" id="Gender" value="{{ old('gender') }}" name="gender">
                                    <option value="">__</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            
                        </div>
                        @if($errors->has('gender'))
                            <div class="alert alert-danger">
                                @error('gender')
                                {{ $message }}
                                @enderror
                            </div>
                        @endif

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <p><input type="submit" value="Register"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script>
        function togglePasswordVisibility(fieldId)
        {
            var passwordField = document.getElementById(fieldId);
            var eye = passwordField.nextElementSibling.querySelector('#eye');
            var eyeSlash = passwordField.nextElementSibling.querySelector('#eye-slash');

            if(passwordField.type === "password"){
                passwordField.type = "text";
                eye.style.display = "none";
                eyeSlash.style.display = "block";
            } else {
                passwordField.type = "password";
                eye.style.display = "block";
                eyeSlash.style.display = "none";
            }
        }
    </script>

@endsection