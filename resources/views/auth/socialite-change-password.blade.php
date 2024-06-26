@extends('auth.register')

@section('title')
Heros | set password
@endsection

@section('sign')

    @if (session('success'))
        <div style="height:40px;color:black;background-image: linear-gradient(to right,#DF63FF,#82E9EF);display: flex;align-items: center;justify-content: center;">
        {{ session('success')  }}
        </div>
        {!! '<br><br>' !!}
    @endif

    <div style="width:100%;display: flex;height:200px;align-items:center;">
        <h1 class="mb-0" style="width:100%;padding:0px 0px 70px 0px;">Set the password</h1>
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

    <form method="POST" action="/set-password">
        @csrf

        <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control mb-0" name='password' id="exampleInputPassword1" placeholder="Password" required>
        </div>
            @if($errors->has('password'))
                <div class="alert alert-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            @endif
        <div class="form-group">
            <label class="form-label" for="exampleInputPassword2">Confirm Password</label>
            <input type="password" class="form-control mb-0" name='password_confirmation' id="exampleInputPassword2" placeholder="Confirm Password" required>
        </div>

        <div class="d-inline-block w-100">
            <div class="form-check d-inline-block mt-2 pt-1">
                <input type="checkbox" class="form-check-input" id="customCheck1">
                <label class="form-check-label" for="customCheck1">I accept <a href="#">Terms and Conditions</a></label>
            </div>

            <button type="submit" class="btn btn-primary float-end">Log in</button>
        </div>
    </form>
@endsection
