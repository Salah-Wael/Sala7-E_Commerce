<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@section('title')Heros | register as User @show</title>

<body class=" ">
    

    
                        
    @section('sign')
    <form style="height:440px;margin-top:-60px" action="/register" method="POST">
    @csrf

        <div class="form-group">
            <label class="form-label" for="exampleInputName1">First name</label>
            <input type="text" class="form-control mb-0" name='firstName' value="{{ old('firstName') }}" required id="exampleInputName1" placeholder="First name">
        </div>
        @if($errors->has('firstName'))
            <div class="alert alert-danger">
                @error('firstName')
                {{ $message }}
                @enderror
            </div>
        @endif

        <div class="form-group">
            <label class="form-label" for="exampleInputName2">Last name</label>
            <input type="text" class="form-control mb-0" name='lastName' value="{{ old('lastName') }}" required id="exampleInputName2" placeholder="Last name">
        </div>
        @if($errors->has('lastName'))
            <div class="alert alert-danger">
                @error('lastName')
                {{ $message }}
                @enderror
            </div>
        @endif

        <div class="form-group">
            <label class="form-label" for="exampleInputEmail2">Email address</label>
            <input type="email" class="form-control mb-0" name='email' value="{{ old('email') }}" id="exampleInputEmail2" placeholder="Enter email" required>
        </div>
        @if($errors->has('email'))
        <div class="alert alert-danger">
            @error('email')
            {{ $message }}
            @enderror
        </div>
        @endif

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

        <div>
            <label class="form-label" for="birthDate">Bith Date</label>
            <input type="date" class="form-control mb-0" value="{{ old('birthDate') }}"  id="birthDate" name="birthDate" required>
        </div>

        <div>
        <br>
            <label class="form-label" for="gender">Gender:</label>

        <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>

            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
        </div>
        @if($errors->has('gender'))
            <div class="alert alert-danger">
                @error('gender')
                {{ $message }}
                @enderror
            </div>
        @endif

        <div class="d-inline-block w-100">
            <div class="form-check d-inline-block mt-2 pt-1">
                <input type="checkbox" name="checkbox" class="form-check-input" id="customCheck1" required>
                <label class="form-check-label" for="customCheck1">I accept <a href="#">Terms and Conditions</a></label>
            </div>
            @if($errors->has('checkbox'))
                <div class="alert alert-danger">
                    @error('checkbox')
                    {{ $message }}
                    @enderror
                </div>
            @endif
            
            <button type="submit" class="btn btn-primary float-end">Sign Up</button>
        </div>
        <div class="sign-info">
            <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a href="login">Log In</a></span>
            <span class="dark-color d-inline-block line-height-2">Are you Player? <a href="{{ route('hero.register') }}">Sign up as hero</a></span>
        </div>
    </form>
    @show
</div>


    
