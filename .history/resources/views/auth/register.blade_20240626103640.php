<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <title>Sala7 - @yield('title','Sign Up')</title>
</head>
<body>
    
<div class="container">
    <div class="box">
        <!------------------ Login Box --------------------->
        
        
@section('content')
        
    <div class="box-register" id="register">

        <div class="top-header">
            <h3>Sign Up, Now</h3>
            <small>We are happy to have you with us.</small>
        </div>

        <form method="POST" action="/register">
        @csrf

            <div class="input-group">
                <div class="input-field">
                    <input type="text" name='name' value="{{ old('name') }}" class="input-box" id="regUser" required>
                    <label for="regUser">Username</label>
                </div>
                @if($errors->has('name'))
                    <div class="alert alert-danger">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                @endif

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
                <div class="input-field">
                    <input type="password" class="input-box" name='password_confirmation' id="ConfirmPassword" required>
                    <label for="ConfirmPassword">Confirm Password</label>
                    <div class="eye-area">
                            <div class="eye-box" onclick="myRegPassword()">
                                <i class="fa-regular fa-eye" id="eye-2"></i>
                                <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                            </div>
                    </div>
                </div>

                <div class="input-field">
                    <select class="input-box" id="gender" name="gender">
                        <option value="">Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                @if($errors->has('gender'))
                    <div class="alert alert-danger">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                @endif

                <div class="input-field">
                    <input type="date" class="input-box" value="{{ old('birthDate') }}" name="birthDate" required>
                </div>
                @if($errors->has('birthDate'))
                    <div class="alert alert-danger">
                        @error('birthDate')
                        {{ $message }}
                        @enderror
                    </div>
                @endif
                
                <div class="remember">
                    <input type="checkbox" id="formCheck-2" class="check">
                    <label for="formCheck-2"> Remember Me</label>
                </div>
                <div class="input-field">
                    <input type="submit" class="input-submit" value="Sign Up">
                </div>
                
            </div>
        </form>

    </div>
@show
    <!-------------------- Register --------------------------->

    <div class="box-login" id="login">

        <div class="top-header">
            <h3>Sign Up, Now</h3>
            <small>We are happy to have you with us.</small>
        </div>

        <form method="POST" action="/register">
        @csrf

            <div class="input-group">
                <div class="input-field">
                    <input type="text" name='name' value="{{ old('name') }}" class="input-box" id="regUser" required>
                    <label for="regUser">Username</label>
                </div>
                @if($errors->has('name'))
                    <div class="alert alert-danger">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                @endif

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
                <div class="input-field">
                    <input type="password" class="input-box" name='password_confirmation' id="ConfirmPassword" required>
                    <label for="ConfirmPassword">Confirm Password</label>
                    <div class="eye-area">
                            <div class="eye-box" onclick="myRegPassword()">
                                <i class="fa-regular fa-eye" id="eye-2"></i>
                                <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                            </div>
                    </div>
                </div>

                <div class="input-field">
                    <select class="input-box" id="gender" name="gender">
                        <option value="">Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                @if($errors->has('gender'))
                    <div class="alert alert-danger">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                @endif

                <div class="input-field">
                    <input type="date" class="input-box" value="{{ old('birthDate') }}" name="birthDate" required>
                </div>
                @if($errors->has('birthDate'))
                    <div class="alert alert-danger">
                        @error('birthDate')
                        {{ $message }}
                        @enderror
                    </div>
                @endif
                
                <div class="remember">
                    <input type="checkbox" id="formCheck-2" class="check">
                    <label for="formCheck-2"> Remember Me</label>
                </div>
                <div class="input-field">
                    <input type="submit" class="input-submit" value="Sign Up">
                </div>
                
            </div>
        </form>

        

    </div>

    <!------------------------ Switch -------------------------->
      
    <div class="switch">
        <a href="{{ route('login') }}" class="login" >Login</a>
        <a href="{{ route('register') }}" class="register" >Register</a>
        <div class="btn-active" id="btn"></div>
    </div>

    </div>
 </div>
<script>

     var x = document.getElementById('login');
     var y = document.getElementById('register');
     var z = document.getElementById('btn');
 
     function login(){
        x.style.left = "27px";
        y.style.right = "-350px";
        z.style.left = "0px";
     }
     function register(){
        x.style.left = "-350px";
        y.style.right = "25px";
        z.style.left = "150px";
     }

   // view password codes
   
   
   function myLogPassword(){

    var a = document.getElementById('logPassword');
    var b = document.getElementById('eye');
    var c = document.getElementById('eye-slash');

    if(a.type === "password"){
        a.type = "text"
        b.style.opacity = "0";
        c.style.opacity = "1";

    }else{    
        a.type = "password"
        b.style.opacity = "1";
        c.style.opacity = "0";

    }

   }
   
   
   function myRegPassword(){

var d = document.getElementById('regPassword');
var b = document.getElementById("eye-2");
var c = document.getElementById("eye-slash-2");

if(d.type === "password"){
    d.type = "text"
    b.style.opacity = "0";
    c.style.opacity = "1";

}else{    
    d.type = "password"
    b.style.opacity = "1";
    c.style.opacity = "0";

}

}
</script>
</body>
</html>