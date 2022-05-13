<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Makin Mahir</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('css/feather.css') }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.min.css') }}">
    @yield('css')

</head>

<body class="color-theme-blue mont-font">
    <div class="main-wrap">
        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(https://images.unsplash.com/photo-1572028412480-0a75271c6bb9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-lg overflow-hidden">
                <div class="card shadow-none border-0 ml-auto mr-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Create <br>your account</h2>                        
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <div class="form-group icon-input mb-2">
                                <i class="font-sm ti-user text-grey-500 pr-0"></i>
                                <input type="text" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>                        
                                @error('name')
                                    <span class="" role="alert alert-danger">
                                        <small  class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group icon-input mb-2">
                                <i class="font-sm ti-microphone text-grey-500 pr-0"></i>
                                <input type="text" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-600" placeholder="Telepon" name="telepon" value="{{ old('telepon') }}" required autocomplete="telepon" autofocus>                        
                                @error('telepon')
                                    <span class="" role="alert alert-danger">
                                        <small  class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group icon-input mb-2">
                                <i class="font-sm ti-email text-grey-500 pr-0"></i>
                                <input type="email" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">                        
                                @error('email')
                                    <span class="" role="alert alert-danger">
                                        <small class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group icon-input mb-3">
                                <input type="Password" minlength="8" class="style2-input pl-5 form-control text-grey-900 font-xss ls-3" placeholder="Password" name="password" required autocomplete="new-password">
                                <i class="font-sm ti-lock text-grey-500 pr-0"></i>
                                @error('password')
                                    <span class="" role="alert alert-danger">
                                        <small  class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group icon-input mb-1">
                                <input type="Password" minlength="8" class="style2-input pl-5 form-control text-grey-900 font-xss ls-3" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                <i class="font-sm ti-lock text-grey-500 pr-0"></i>
                            </div>
                            <div class="form-check text-left mb-3">
                                <input type="checkbox" class="form-check-input mt-2" id="exampleCheck1" required>
                                <label class="form-check-label font-xsss text-grey-500" for="exampleCheck1">Accept Term and Conditions</label>
                                <!-- <a href="#" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your Password?</a> -->
                            </div>
                        
                         
                        <div class="col-sm-12 p-0 text-left">
                            <div class="form-group mb-1">
                                <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Register</button>
                            </div>
                            <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have account <a href="{{ route('login') }}" class="fw-700 ml-1">Login</a></h6>
                        </div>
                    </form>
                         
                    </div>
                </div> 
            </div>
        </div>
    </div>

<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/plugin.js') }}"></script>
</body>

</html>