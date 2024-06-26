@extends('auth.register')

@section('title')
Heros | forgot password
@endsection

@section('sign')

    @if (session('success'))
        <div style="height:40px;color:black;background-image: linear-gradient(to right,#DF63FF,#82E9EF);display: flex;align-items: center;justify-content: center;">
        {{ session('success')  }}
        </div>
        {!! '<br><br>' !!}
    @endif

    <div style="width:100%;display: flex;height:200px;align-items:center;">
        <h1 class="mb-0" style="width:100%;padding:0px 0px 70px 0px;">Forgot password</h1>
        <a class="sign-in-logo mb-5" style="margin-bottom:0px;" href="javascript:void(0)" onclick="window.location.reload(true)">
            <img src="../assets/images/login/sign.png"
                style="width:100%;height:200px;display: block;margin-left: auto;margin-right: auto;"
                class="img-fluid"
                alt="logo">
        </a>
    </div>


    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{--  --}}">
        @csrf

        <!-- Email Address -->

        <div class="form-group">
            <label class="form-label" for="exampleInputEmail1">Email address</label>
            <input type="email" name='email' value="{{ old('email') }}" class="form-control mb-0" required id="exampleInputEmail1" placeholder="Enter your email">
        </div>

        @if($errors->has('email'))
            <div class="alert alert-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
        @endif

        <div class="d-inline-block w-100">
            <button type="submit" class="btn btn-primary float-end">Email Password-Reset Link</button>
        </div>

        <div class="sign-info">
            <span class="dark-color d-inline-block line-height-2">Go to <a href="login">Log In</a> again?</span>
            <br>
            <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="register">Sign up</a></span>
        </div>
        <div class="sign-info">

                            </div>
    </form>
@endsection
