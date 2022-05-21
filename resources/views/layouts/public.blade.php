<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Makin Mahir</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="title" content="@yield('meta_title','Belajar Online | Kursus Online | Makin Mahir ID')">
    <meta name="keywords" content="@yield('meta_keywords','belajar online, pelatihan online, pelatihan kerja, skill, training, soft skill adalah, training kerja, kursus online, belajar online gratis, kursus online gratis, cara belajar online, trainer to train, webinar, webinar online')">
    <meta name="description" content="@yield('meta_description','MakinMahir.ID adalah situs belajar online. Kami ingin membuat Anda menjadi mahir sesuai bidang Anda. Yuk, belajar dan menjadi semakin mahir bersama MakinMahir.ID.')">
    <meta name="copyright" content="makinmahir.id">
    <meta name="geo.placename" content="indonesia">
    <meta name="geo.country" content="id">
    <meta name="content-language" content="id">
    <meta name="google-site-verification" content="imSOUh01H0EyYu2As8-Hvs2P30TnEhiAkPayXp_ySfk">


    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/feather.css') }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @yield('css')

</head>


<body class="color-theme-blue mont-font">
    <div class="main-wrap">
        <div class="header-wrapper pt-3 pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 navbar pt-0 pb-0">
                        <a href="{{route('publicIndex')}}"><h1 class="ls-3 fw-700 text-current font-xxl">MakinMahir.id<span class="d-block font-xsssss ls-1 text-grey-500 open-font ">Berkembang dan Makin Mahir !</span></h1></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav nav-menu float-none text-center">

                                {{-- <li class="nav-item"><a class="nav-link" href="{{route('ebook')}}">Ebook</a></li> --}}
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Fitur<i class="ti-angle-down"></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('cvIndex')}}">CV Maker</a>
                                        <a class="dropdown-item" href="{{route('blog')}}">Blog</a>
                                        <a class="dropdown-item" href="{{route('ebook')}}">Ebook</a>
                                        <a class="dropdown-item" href="{{route('forumIndex')}}">Forum</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Tes <i class="ti-angle-down"></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('mbtiTest')}}">Tes kepribadian</a>
                                        <a class="dropdown-item" href="{{route('riasecTest')}}">Tes minat bakat</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Tentang kami <i class="ti-angle-down"></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('profile')}}">Profil</a>
                                        <a class="dropdown-item" href="{{route('goes_sekolah')}}">Goes to sekolah</a>
                                        <a class="dropdown-item" href="{{route('goes_campus')}}">Goes to campus</a>
                                        <a class="dropdown-item" href="">Kontak</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Bantuan <i class="ti-angle-down"></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('faq')}}">FAQ</a>
                                        <a class="dropdown-item" href="{{route('term')}}">Syarat dan ketentuan</a>
                                        <a class="dropdown-item" href="{{route('privacy')}}">Kebijakan privasi</a>
                                    </div>
                                </li>

                                {{-- AUTH --}}
                                @if (Route::has('login'))
                                    @auth
                                    <li class="nav-item d-block d-sm-none"><a class="nav-link" href="{{ route('memberIndex') }}">Home</a></li>
                                    @else
                                    <li class="nav-item d-block d-sm-none"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                        @if (Route::has('register'))
                                        <li class="nav-item d-block d-sm-none"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                                        @endif
                                    @endauth
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 text-right d-lg-block d-none">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('memberIndex') }}" class="header-btn bg-dark fw-500 text-white font-xssss lh-32 w100 text-center d-inline-block rounded-xl mt-1">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="header-btn bg-dark fw-500 text-white font-xssss lh-32 w100 text-center d-inline-block rounded-xl mt-1">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="header-btn bg-current fw-500 text-white font-xssss lh-32 w100 text-center d-inline-block rounded-xl mt-1">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        @yield('content')

        {{-- floating button --}}
        <a href="https://wa.me/+6289619119692" class="float text-decoration-none">
            <div class="my-float d-flex align-items-center justify-content-center text-decoration-none">
                <i class="fa-brands fa-whatsapp fa-2x mr-2"></i>
                <p class="mb-0 font-weight-bold">
                   Butuh bantuan
                </p>
            </div>
        </a>
        
        <div class="footer-wrapper layer-after bg-dark mt-5">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="middle-footer mt-0">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 sm-mb-4">
                                    <h5 class="mb-4 font-xs">Makin mahir</h5>
                                    <p class="w-100">platform perencana karir yang meberikan layanan yang di dalamnya berisi informasi seputar dunia kerja, membantu fresh graduate mengenali potensi dirinya dan memberikan rekomendasi yang dapat dijadikan pertimbangan dalam merencanakan karir terbaik mereka.</p>
                                   
                                    
                                </div>
                                <div class="col-md-4 col-lg-2 col-sm-6 col-xs-6">
                                    <h5 class="font-xs">About</h5>
                                    <ul>
                                        <li><a href="{{route('faq')}}">FAQ</a></li>
                                        <li><a href="{{route('term')}}">Syarat dan kebijakan</a></li>
                                        <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6">
                                    <h5 class="mb-3 font-xs">Kantor</h5>
                                    <p style="width: 100%;">Jl. Raya Pringsurat - Temanggung, Kel. Kebumen,<br> Kec. Pringsurat, Temanggung</p>
                                
                                    <h5 class="mb-3 font-xs">Kontak</h5>
                                    <p class="mb-0">Telepon : 085856561200</p>
                                    <p class="mb-0">Whatsapp : <a href="https://api.whatsapp.com/send?phone=6285856561200">+6285856561200</a></p>
                                    <p>Email : <a href="mail:makinmahir.id@gmail.com">makinmahir.id@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-sm-12 lower-footer"></div>
                    <div class="col-sm-6">
                        <p class="copyright-text">© 2021 copyright. All rights reserved.</p>
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