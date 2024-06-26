<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@section('title')Heros | register as User @show</title>

    {{-- <link rel="icon" href={{ asset('img/favicon.ico') }} type="image/x-icon"> --}}
    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/socialv.css?v=4.0.0') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/vanillajs-datepicker/dist/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/font-awesome-line-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">

</head>
<body class=" ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
    <section class="sign-in-page">
        <div id="container-inside">
            <div id="circle-small"></div>
            <div id="circle-medium"></div>
            <div id="circle-large"></div>
            <div id="circle-xlarge"></div>
            <div id="circle-xxlarge"></div>
        </div>
        <div class="container p-0">
            <div class="row no-gutters">
                <div class="col-md-6  pt-5">
                    <div class="sign-in-detail text-white">

                        <div class="sign-slider overflow-hidden ">
                            <ul  class="swiper-wrapper list-inline m-0 p-0 ">
                                <li class="swiper-slide">
                                    <img src="{{ asset('/assets/images/login/1.png') }}" style="border-radius: 20px;height:200px" class="img-fluid mb-4" alt="logo">
                            <h4 class="mb-1 text-white">Support the Heros</h4>
                                    <p>You can support the heroes either through financial assistance or by sending the necessary supplies to them.</p>
                                </li>
                                <li class="swiper-slide">
                                    <img src="{{ asset('/assets/images/login/2.png') }}" style="border-radius: 20px;height:200px" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Contact with the Heros</h4>
                                    <p>You can contact the heroes through chat to encourage and motivate them before the matches.</p>
                                </li>
                                <li class="swiper-slide">
                                    <img src="{{ asset('/assets/images/login/3.png') }}" style="border-radius: 20px;height:200px" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Create new events</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <div class="col-md-6 bg-white pt-5 pt-5 pb-lg-0 pb-5" style="height: 820px;overflow-y: auto;">
                    <div class="sign-in-from">
                        <div style="width:100%;display: flex;height:200px;align-items:center;">
                            <h2 class="mb-0" style="width:100%;padding:0px 0px 120px 0px;">@yield('h2','Sign Up as User') </h2>
                            <a class="sign-in-logo mb-5" style="padding:0px 0px 40px 0;" href="javascript:void(0)" onclick="window.location.reload(true)">
                                <img src="{{ asset('/assets/images/login/sign.png') }}"
                            style="width:100%;height:200px;display: block;margin-left: auto;margin-right: auto;"
                            class="img-fluid"
                            alt="logo">
                            </a>
                        </div>
                        
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
                </div>
            </div>
        </div>
    </section>
    </div>

    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('/assets/js/libs.min.js') }}"></script>
    <!-- slider JavaScript -->
    <script src="{{ asset('/assets/js/slider.js') }}"></script>
    <!-- masonry JavaScript -->
    <script src="{{ asset('/assets/js/masonry.pkgd.min.js') }}"></script>
    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('/assets/js/enchanter.js') }}"></script>
    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('/assets/js/sweetalert.js') }}"></script>
    <!-- app JavaScript -->
    <script src="{{ asset('/assets/js/charts/weather-chart.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/lottie.js') }}"></script>
    <script >
        let inputs = document.querySe1ectorA11("input");
        inputs. forEach((input)=> {
            if (sessionStorage.getItem(`${input.id}`)){
                sessionStorage.getItem(`${input.id}`);
                input.value = sessionStorage.getItem(`${input.id}`);}
            else{
            input. addEventListener( "blur" , ()=> {
                window.sessionStorage.getItem(`${input.id}`,`${input.value}`);
            });
            }
        });
    </script>

</body>
</html>
