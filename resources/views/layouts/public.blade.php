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

    {{-- <meta property="fb:app_id" content="145000412781544" /> 
    <meta property="og:title" content="Belajar Online | Kursus Online | Makin Mahir ID" />
    <meta property="og:description" content="MakinMahir.ID adalah situs belajar online. Kami ingin membuat Anda menjadi mahir sesuai bidang Anda. Yuk, belajar dan menjadi semakin mahir bersama MakinMahir.ID." />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="makinmahir.id" /> --}}


    <meta name="google-site-verification" content="As9x3hHlJBlzxDhOZNPdkLLwpR75maT_4pZ8Jn9WmaA" />
    <!-- Global site tag (gtag.js) - Google Ads: 1002698644 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-26WYMLZXF9"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-26WYMLZXF9');
    </script defer>
    <!-- Event snippet for Pembelian kelas google ads pemula conversion page -->
    <script>
    gtag('event', 'conversion', {
        'send_to': 'G-26WYMLZXF9/dCPhCKn23t8BEJTvj94D',
        'value': 199000.0,
        'currency': 'IDR',
        'transaction_id': ''
    });
    </script>
    <script defer src="https://www.googleoptimize.com/optimize.js?id=OPT-PT7JSV2"></script>


    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl/owl.carousel.min.css') }}">


    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('asset/img/program/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('asset/img/program/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('asset/img/program/favicon.png')}}">

    {{-- <link rel="manifest" href="/site.webmanifest"> --}}


    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>


<body class="color-theme-blue mont-font">
    <div class="main-wrap">
        <div class="header-wrapper py-2 bg-white position-relative" style="z-index:5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 navbar pt-0 pb-0">
                        <a class="/" href="{{route('publicIndex')}}">
                            <img src="{{asset('asset/logo/logo_hor.png')}}" style="width:130px" alt="">
                            
                            
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav navbar-dark nav-menu float-none text-center">
                                <li class="nav-item dropdown "><a class="nav-link dropdown-toggle fw-500 text-grey-900 font-xssss pb-0" data-toggle="dropdown" href="#">Layanan<i class="ti-angle-down"></i></a>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item fw-400" href="{{route('produkListEvent')}}">Event</a>
                                        <a class="dropdown-item fw-400" href="{{route('produkListKonsul')}}">Konsultasi</a>
                                        <a class="dropdown-item fw-400" href="{{route('cvIndex')}}">CV Maker</a>
                                        <a class="dropdown-item fw-400" href="{{route('produkListTemplate')}}">Template CV</a>
                                        <a class="dropdown-item fw-400" href="{{route('forumIndex')}}">Forum</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown "><a class="nav-link dropdown-toggle fw-500 text-grey-900 font-xssss pb-0" data-toggle="dropdown" href="#">Tes Siap Kerja<i class="ti-angle-down"></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item fw-400" href="{{route('testIndex')}}">Tes kepribadian</a>
                                        <a class="dropdown-item fw-400" href="{{route('testIndex')}}">Tes minat bakat</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown "><a class="nav-link dropdown-toggle fw-500 text-grey-900 font-xssss pb-0" data-toggle="dropdown" href="#">Tentang kami <i class="ti-angle-down"></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item fw-400" href="{{route('profile')}}">Profil</a>
                                        <a class="dropdown-item fw-400" href="{{route('goes_sekolah')}}">Goes to sekolah</a>
                                        <a class="dropdown-item fw-400" href="{{route('goes_campus')}}">Goes to campus</a>
                                       
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link font-xssss fw-500 pb-0" href="{{route('blog')}}">Blog</a>
                                </li>

                                {{-- AUTH --}}
                                @if (Route::has('login'))
                                    @auth
                                    <li class="nav-item d-block d-sm-none"><a class="nav-link" href="{{ route('memberProfile') }}">Profile</a></li>
                                    <li class="nav-item d-block d-sm-none"><a class="nav-link" href="{{ route('transferIndex') }}">Riwayat transaksi</a></li>
                                    <li class="nav-item d-block d-sm-none"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @else
                                    <li class="nav-item d-block d-sm-none"><a class="nav-link font-xssss fw-500 pb-0" href="{{ route('login') }}">Login</a></li>
                                        @if (Route::has('register'))
                                        <li class="nav-item d-block d-sm-none"><a class="nav-link font-xssss fw-500 pb-0" href="{{ route('register') }}">Register</a></li>
                                        @endif
                                    @endauth
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right d-lg-flex d-none align-items-center justify-content-end">
                        @if (Route::has('login'))
                            @auth
                            <ul class="navbar-nav navbar-dark nav-menu float-none text-center">
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{auth()->user()->nama}} <i class="ti-angle-down"></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('memberProfile')}}">Akun</a>
                                        <a class="dropdown-item" href="{{route('transferIndex')}}">Riwayat transaksi</a>  
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a> 
                                    </div>
                                </li>
                                </ul>
                            @else
                            <div>
                                <a href="{{ route('login') }}" class="btn btn-primary fw-500 text-white font-xssss lh-32 w100 text-center d-inline-block rounded-sm mt-1">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary fw-500 font-xssss lh-32 w100 text-center d-inline-block rounded-sm mt-1">Register</a>
                                @endif
                            </div>
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
                <i class="fa-brands fa-whatsapp fa-2x"></i>
                <p class="mb-0 font-weight-bold d-none d-sm-block ml-2">
                   Butuh bantuan
                </p>
            </div>
        </a>
        
        <div class="footer-wrapper layer-after bg-light mt-0">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="middle-footer mt-0">
                            <div class="row">
                                <div class="col-sm-4 col-xs-12 sm-mb-4">
                                    <h5 class="mb-4 font-lg">Makin mahir</h5>
                                    <p class="w-100 text-grey-700">Ayo persiapkan masa depan kariermu dari sekarang!
                                        Nikmati berbagai layanan konsultasi di Makin Mahir. Perbaiki CV, Caramu Interview dan Lakukan Assesment untuk tahu pekerjaan yang cocok buat kamu apa. 
                                        </p>  
                                    
                                    <div class="clearfix">

                                        <ul class="d-flex align-items-center mt-2 float-left xs-mb-2 ">
                                            <li class="mr-2"><a target="_blank" href="https://www.facebook.com/makinmahirID/" class="btn-round-md bg-facebook"><i class="font-xs ti-facebook text-white"></i></a></li>
                                            <li class="mr-2"><a target="_blank" href="https://vt.tiktok.com/ZSdgqkhgU/" class="btn-round-md bg-white"><i class="font-xs fa-brands fa-tiktok text-info"></i></a></li>
                                            <li class="mr-2"><a target="_blank" href="https://www.linkedin.com/company/makinmahir-id/" class="btn-round-md bg-linkedin"><i class="font-xs ti-linkedin text-white"></i></a></li>
                                            <li class="mr-2"><a target="_blank" href="https://instagram.com/makinmahir_id?igshid=YmMyMTA2M2Y=" class="btn-round-md bg-instagram"><i class="font-xs ti-instagram text-white"></i></a></li>
                                            <li class="mr-2"><a target="_blank" href="https://youtube.com/c/MAKINMAHIR" class="btn-round-md bg-youtube"><i class="font-xs ti-youtube text-white"></i></a></li>
                                        </ul>
                                    </div> 
                                </div>

                                <div class="col-md-3 col-lg-2 col-sm-6 col-xs-6 ">
                                    <h5 class="font-xs">Bantuan</h5>
                                    <ul class="">
                                        <li><a class="text-grey-600" href="{{route('faq')}}">FAQ</a></li>
                                        <li><a class="text-grey-600" href="{{route('term')}}">Syarat dan kebijakan</a></li>
                                        <li><a class="text-grey-600" href="{{route('privacy')}}">Privacy Policy</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-3 col-lg-2 col-sm-6 col-xs-6 mb-4">
                                    <h5 class="font-xs">Layanan</h5>
                                    <ul>
                                        <li><a class="text-grey-600" href="{{route('produkListEvent')}}">Event</a></li>
                                        <li><a class="text-grey-600" href="{{route('produkListKonsul')}}">Konsultasi</a></li>
                                        <li><a class="text-grey-600" href="{{route('cvIndex')}}">CV Maker</a></li>
                                        <li><a class="text-grey-600" href="{{route('produkListTemplate')}}">Template CV</a></li>
                                        <li><a class="text-grey-600" href="{{route('blog')}}">Blog</a></li>
                                        <li><a class="text-grey-600" href="{{route('forumIndex')}}">Forum</a></li>
                                    </ul>
                                </div>
                                
                                <div class="col-md-3 col-lg-4 col-sm-6 col-xs-8">
                                    <h5 class="mb-4 font-xs">Metode Pembayaran</h5>

                                    <div class="">

                                        <img src="{{asset('asset/home/bank.png')}}" class="img-fluid" alt="" srcset="">
                                    </div>

                                    <h5 class="mb-3 font-xs mt-4">Kantor</h5>
                                    <p class="w-100 text-grey-600">Jl. Raya Pringsurat - Temanggung, Kel. Kebumen,<br> Kec. Pringsurat, Temanggung</p>
                                
                                    <h5 class="mb-3 font-xs">Kontak</h5>
                                    <p class="mb-0 text-grey-600">Telepon : 085856561200</p>
                                    <p class="mb-0 text-grey-600">Whatsapp : <a href="https://api.whatsapp.com/send?phone=6285856561200">+6285856561200</a></p>
                                    <div class="font-xsss font-grey-500">Email : <a class="text-dark fw-600" href="mail:makinmahir.id@gmail.com">makinmahir.id@gmail.com</a></div>

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