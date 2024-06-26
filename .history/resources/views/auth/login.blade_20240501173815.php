@extends('auth.register')

@section('title')
Heros | sign in
@endsection
@section('h2')
sign in
@endsection

@section('sign')

    @if (session('success'))
        <div style="height:40px;color:black;background-image: linear-gradient(to right,#DF63FF,#82E9EF);display: flex;align-items: center;justify-content: center;">
        {{ session('success')  }}
        </div>
        {!! '<br><br>' !!}
    @endif

    <form action="/login" method="POST">
        @csrf

        @if($errors->has('email'))
            <div class="alert alert-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </div>

        @elseif ($errors->has('password'))
            <div class="alert alert-danger">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
        @endif

        <div class="form-group">
            <label class="form-label" for="exampleInputEmail1">Email address</label>
            <input type="email" name='email' value="{{ old('email') }}" class="form-control mb-0" required id="exampleInputEmail1" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label class="form-label" for="exampleInputPassword1">Password</label>
            <a href="{{ route('forgot-Password') }}" class="float-end">Forgot password?</a>
            <input type="password" name="password" class="form-control mb-0" required id="exampleInputPassword1" placeholder="Password">
        </div>

        <div class="d-inline-block w-100">
            <div class="form-check d-inline-block mt-2 pt-1">
                <input type="checkbox" name="remember" class="form-check-input" id="customCheck11">
                <label class="form-check-label" for="customCheck11">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary float-end">Sign in</button>
        </div>

        <div class="text-center" style="margin: 20px;">
            <a href="{{ route('google.login') }}"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Login with Google as an user</a>
        </div>

        <div class="text-center" style="margin: 20px;">
                <a href="{{ route('twitter.login') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Login With Twitter as an user</a>
        </div>

        <div class="sign-info">
            <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="register">Sign up as user</a></span>
            <span class="dark-color d-inline-block line-height-2">Are you Player? <a href="{{ route('hero.register') }}">Sign up as hero</a></span>
        </div>

    </form>
    @endsection

