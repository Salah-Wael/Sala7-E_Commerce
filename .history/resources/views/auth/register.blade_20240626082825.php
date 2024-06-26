<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sala7 - @yield('title','Home')</title>
</head>
<body>
    
 <div class="container">
    <div class="box">
        <!------------------ Login Box --------------------->
        <div class="box-login" id="login">

            <div class="top-header">
                <h3>Hello, Again</h3>
                <small>We are happy to have you back.</small>
            </div>
            <div class="input-group">
                <div class="input-field">
                    <input type="text" class="input-box" id="logEmail" required>
                    <label for="logEmail">Email address</label>
                </div>
                <div class="input-field">
                    <input type="password" class="input-box" id="logPassword" required>
                    <label for="logPassword">Password</label>
                     <div class="eye-area">
                            <div class="eye-box" onclick="myLogPassword()">
                                <i class="fa-regular fa-eye" id="eye"></i>
                                <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                            </div>
                     </div>
                </div>
                <div class="remember">
                    <input type="checkbox" id="formCheck" class="check">
                    <label for="formCheck"> Remember Me</label>
                </div>
                <div class="input-field">
                    <input type="submit" class="input-submit" value="Sign In">
                </div>
                <div class="forgot">
                    <a href="#">Forgot password?</a>
                </div>
            </div>

        </div>

     <!-------------------- Register --------------------------->
      
     <div class="box-register" id="register">

        <div class="top-header">
            <h3>Sign Up, Now</h3>
            <small>We are happy to have you with us.</small>
        </div>
        <form action="/register" method="POST">
        @csrf

        <div class="input-group">
            <div class="input-field">
                <input type="text" class="input-box" id="regUser" required>
                <label for="regUser">Username</label>
            </div>
            <div class="input-field">
                <input type="text" class="input-box" id="regEmail" required>
                <label for="regEmail">Email address</label>
            </div>
            <div class="input-field">
                <input type="password" class="input-box" id="regPassword" required>
                <label for="regPassword">Password</label>
                <div class="eye-area">
                        <div class="eye-box" onclick="myRegPassword()">
                            <i class="fa-regular fa-eye" id="eye-2"></i>
                            <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                        </div>
                </div>
            </div>
            <div class="remember">
                <input type="checkbox" id="formCheck-2" class="check">
                <label for="formCheck-2"> Remember Me</label>
            </div>
            <div class="input-field">
                <input type="submit" class="input-submit" value="Sign In">
            </div>
            
        </div>
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