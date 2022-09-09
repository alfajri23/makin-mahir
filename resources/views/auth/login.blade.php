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
    @yield('css')

    <style>
        .background-image{
            background-size: cover;
        }
    </style>

</head>

<body class="color-theme-blue mont-font">
    <div class="main-wrap">
        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat background-image" style="background-image: url({{asset('asset/login/login.png')}});"></div>
            <div class="col-xl-7 vh-lg-100 align-items-center d-flex bg-white rounded-lg overflow-hidden">
                <div class="card shadow-none border-0 ml-auto mr-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-3">
                            <span class="text-primary">Makin Mahir</span> 
                            <br><small>temukkan jalanmu disini</small>

                        </h2>
                        @error('error')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror

                        @include('component.error.error_message')

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pr-0"></i>
                                <input type="email" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>                        
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group icon-input mb-1">
                                <input type="Password" class="style2-input pl-5 form-control text-grey-900 font-xss ls-3" placeholder="Password" name="password" required autocomplete="current-password">
                                <i class="font-sm ti-lock text-grey-500 pr-0"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check text-left mb-3">
                                <input type="checkbox" class="form-check-input mt-2" id="exampleCheck1" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label font-xsss text-grey-500" for="exampleCheck1">Remember me</label>
                                
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your Password?</a>
                                @endif
                            </div>

                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1">
                                    <button type="submit" class="form-control text-center text-white fw-600 btn-primary border-0 p-0 ">Login</button>
                                    
                                    <a href="{{route('redirectToGoogle')}}" class="form-control btn btn-outline-info text-center fw-600 p-0 mt-2">
                                        Masuk dengan Google
                                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                        </svg>
                                    </a>
                                </div>
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Dont have account <a href="{{ route('register') }}" class="fw-700 ml-1">Register</a></h6>
                            </div>
                        
                         
                       
                    </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>


<script src="{{ asset('js/scripts.js') }}"></script>
{{-- <script src="{{ asset('js/plugin.js') }}"></script> --}}
</body>

</html>
