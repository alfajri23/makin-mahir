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

<style>
    .spacer{
        height: 100px;
    }

    .form-control{
        height: 40px;
    }

    .info-member {
        border: 1px solid #ffd120;
        border-radius: 4px;
        padding: 10px 16px;
        overflow: auto;
    }
</style>

<body class="color-theme-blue mont-font">
    <div class="main-wrap">
        <div class="header-wrapper pt-3 pb-3 shadow-none pos-fixed position-absolute bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 navbar pt-0 pb-0">
                        <a href="{{route('publicIndex')}}"><h1 class="ls-3 fw-700 text-white font-xxl">MakinMahir.id<span class="d-block font-xsssss ls-1 text-grey-500 open-font ">Berkembang dan Makin Mahir !</span></h1></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="spacer"></div>
        <div class="container">
            <div class="row mt-4">
                <div class="page-title style1 col-12 mb-0 mx-auto text-center">
                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-warning d-inline-block text-warning mr-1">Pendaftaran</span>
                    <h2 class="text-grey-900 fw-700 font-xxl pb-3 mb-0 mt-3 d-block lh-3">Pendaftaran</h2>
                </div>

                <div class="col-12">
                    <div class="info-member">
                        <p class="my-0">Sudah punya akun ? <a class="fw-500" href="{{{route('login')}}}">Klik disini untuk masuk</a></p>
                    </div>
                </div>

                <div class="card-body rounded-0 text-left">
                    <form method="POST" action="{{ route('registerDaftar') }}">
                        @csrf
                        
                        <div class="form-group icon-input mb-3">
                            <i class="font-sm ti-user text-grey-500 pr-0"></i>
                            <input type="text" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>                        
                            @error('name')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group icon-input mb-3">
                            <i class="font-sm ti-microphone text-grey-500 pr-0"></i>
                            <input type="text" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-600" placeholder="Telepon" name="telepon" value="{{ old('telepon') }}" required autocomplete="telepon" autofocus>                        
                            @error('telepon')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group icon-input mb-3">
                            <i class="font-sm ti-email text-grey-500 pr-0"></i>
                            <input type="email" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">                        
                            @error('email')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group icon-input mb-3">
                            <input type="Password" minlength="8" class="style2-input pl-5 form-control text-grey-900 font-xss ls-3" placeholder="Password" name="password" required autocomplete="new-password">
                            <i class="font-sm ti-lock text-grey-500 pr-0"></i>
                            @error('password')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group icon-input mb-1">
                            <input type="Password" minlength="8" class="style2-input pl-5 form-control text-grey-900 font-xss ls-3" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                            <input type="hidden" class="d-none" name="tipe" value="{{$_GET['tipe']}}">
                            <input type="hidden" class="d-none" name="id" value="{{$_GET['id']}}">
                            <i class="font-sm ti-lock text-grey-500 pr-0"></i>
                        </div>
                     
                    <div class="col-sm-12 p-0 text-left mt-2">
                        <div class="form-group mb-1">
                            <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-primary border-0 p-0 ">Lanjutkan ke form pendaftaran</button>
                        </div>
                    </div>
                </form>
                     
                </div>


            </div>
        </div>
        
        
        
        <div class="footer-wrapper layer-after bg-dark mt-5 py-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 lower-footer"></div>
                    <div class="col-sm-6">
                        <p class="copyright-text">© 2021 copyright. All rights reserved.</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p class="float-right copyright-text">In case of any concern, <a href="#">contact us</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</body>

<script src="{{ asset('js/plugin.js') }}"></script>
<script src="{{ asset('js/aos.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script>
    AOS.init();
</script>

</html>