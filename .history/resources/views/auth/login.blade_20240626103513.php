{{-- @extends('auth.register')

@section('title')
    Sign In
@endsection

@section('content')
        
    <div class="box-login" id="login">

        <div class="top-header">
            <h3>Log In</h3>
            <small>We are happy to have you with us.</small>
        </div>

        <form method="POST" action="/login">
        @csrf

            <div class="input-group">

                <div class="input-field">
                    <input type="text" class="input-box" name='email' value="{{ old('email') }}" id="regEmail" required>
                    <label for="regEmail">Email address</label>
                </div>
                @if($errors->has('email'))
                <div class="alert alert-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                @endif

                <div class="input-field">
                    <input type="password" class="input-box" name='password' id="regPassword" required>
                    <label for="regPassword">Password</label>
                    <div class="eye-area">
                            <div class="eye-box" onclick="myRegPassword()">
                                <i class="fa-regular fa-eye" id="eye-2"></i>
                                <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                            </div>
                    </div>
                </div>
                @if($errors->has('password'))
                    <div class="alert alert-danger">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                @endif
                                
                <div class="remember">
                    <input type="checkbox" id="formCheck-2" class="check">
                    <label for="formCheck-2"> Remember Me</label>
                </div>
                <div class="input-field">
                    <input type="submit" class="input-submit" value="Log In">
                </div>
                
            </div>
        </form>

    </div>
@endsection
 --}}
