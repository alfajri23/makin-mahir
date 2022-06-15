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
    </script>
    <!-- Event snippet for Pembelian kelas google ads pemula conversion page -->
    <script>
    gtag('event', 'conversion', {
        'send_to': 'G-26WYMLZXF9/dCPhCKn23t8BEJTvj94D',
        'value': 199000.0,
        'currency': 'IDR',
        'transaction_id': ''
    });
    </script>
    <script src="https://www.googleoptimize.com/optimize.js?id=OPT-PT7JSV2"></script>

    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl/owl.carousel.min.css') }}">

    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('asset/img/program/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('asset/img/program/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('asset/img/program/favicon.png')}}">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

</head>


<body class="color-theme-blue mont-font">

    <div class="main-wrapper">
        {{-- sidebar left --}}
        <nav class="navigation scroll-bar z-index-1">
            <div class="container pl-0 pr-0">
                <div class="nav-content">
                    <div class="nav-top">
                        <a href="{{route('publicIndex')}}">
                            <i class="fa-solid fa-globe-stand display1-size mr-3 ml-3"></i>
                            <span class="d-inline-block poppins ls-3 fw-600 text-current font-xl logo-text mb-0">MakinMahir</span> 
                        </a>
                        <div class="close-nav d-inline-block d-lg-none"><i class="ti-close bg-grey mb-4 btn-round-sm font-xssss fw-700 text-dark ml-auto mr-2 "></i></div>
                    </div>
                    <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div>
                    <ul class="mb-3">
                        <li class="logo d-none d-xl-block d-lg-block"></li>
                        <li><a href="{{route('memberIndex')}}" class="{{ Request::segment(1) == 'home' ? 'active' : '' }} nav-content-bttn open-font" data-tab="chats"><i class="feather-tv mr-3"></i><span>Home</span></a></li>
                        {{-- <li><a href="{{route('memberProdukList')}}" class="{{ Request::segment(1) == 'produk' ? 'active' : '' }} nav-content-bttn open-font" data-tab="friends"><i class="feather-shopping-bag mr-3"></i><span>Produk</span></a></li> --}}
                        <li class="flex-lg-brackets"><a href="{{route('produkListEvent')}}" data-tab="archived" class="nav-content-bttn open-font"><i class="fa-solid fa-calendar-day mr-3 ml-1"></i><span>Event</span></a></li>
                        <li class="flex-lg-brackets"><a href="{{route('produkListKonsul')}}" data-tab="archived" class="nav-content-bttn open-font"><i class="fa-solid fa-ear-listen mr-3"></i></i><span>Konsultasi</span></a></li>
                        <li class="flex-lg-brackets"><a href="{{route('produkListKelas')}}" data-tab="archived" class="nav-content-bttn open-font"><i class="fas fa-chalkboard-teacher mr-2"></i><span>Kelas</span></a></li>
                        <li class="flex-lg-brackets"><a href="{{route('blog')}}" data-tab="archived" class="nav-content-bttn open-font"><i class="fa-solid fa-newspaper mr-3"></i><span>Blog</span></a></li>
                        <li class="flex-lg-brackets"><a href="{{route('ebook')}}" data-tab="archived" class="nav-content-bttn open-font"><i class="feather-book mr-3"></i><span>Ebook</span></a></li>
                        <li class="flex-lg-brackets"><a href="{{route('produkListTemplate')}}" data-tab="archived" class="nav-content-bttn open-font"><i class="fas fa-box mr-3"></i></i><span>Template CV</span></a></li>
                        <li><a href="{{route('testIndex')}}" class="nav-content-bttn open-font" data-tab="favorites"><i class="feather-globe mr-3"></i><span>Assesment</span></a></li>
                        <li><a href="{{route('cvIndex')}}" class="nav-content-bttn open-font" data-tab="favorites"><i class="feather-file mr-3"></i><span>CV Maker</span></a></li>
                        {{-- <li><a href="{{route('memberChecker')}}" data-tab="archived" class="nav-content-bttn open-font"><i class="fas fa-file-signature mr-3"></i><span>CV Checker</span></a></li> --}}
                        <li><a href="{{route('forumIndex')}}" data-tab="favorites"><i class="feather-play-circle mr-3"></i><span>Forum</span></a></li>
                        <li class="flex-lg-brackets"><a href="{{route('transferIndex')}}" data-tab="archived" class="nav-content-bttn open-font"><i class="feather-dollar-sign mr-3"></i><span>Riwayat transfer</span></a></li>
                    </ul>

                    <div class="nav-caption fw-600 font-xssss text-grey-500">
                        <span></span>Account
                    </div>
                    <ul class="mb-3">
                        <li class="logo d-none d-xl-block d-lg-block"></li>
                        <li>
                            <a href="{{route('memberProfile')}}" class="nav-content-bttn open-font h-auto pt-2 pb-2">
                                <i class="font-sm feather-user mr-3 text-grey-500"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-content-bttn open-font h-auto pt-2 pb-2" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="font-sm feather-log-out mr-3 text-grey-500"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="main-content h-100">
            {{-- header atas --}}
            <div class="middle-sidebar-header bg-white">
                <button class="header-menu"></button>

                <ul class="d-flex ml-auto right-menu-icon">
                    <li>
                        @include('component.notifikasi.notifikasi')
                    </li>

                    <li>
                        @include('component.notifikasi.notifikasi')
                    </li>
                </ul>
            </div>

            <div class="middle-sidebar-bottom py-0">
                <div class="" style="width: 100%">
                    <div class="row pb-5">
                        @yield('content')

                        {{-- floating button --}}
                        <a href="https://wa.me/+6289619119692" class="float text-decoration-none float-member">
                            <div class="my-float d-flex align-items-center justify-content-center text-decoration-none">
                                <i class="fa-brands fa-whatsapp fa-2x"></i>
                                <p class="mb-0 font-weight-bold d-none d-sm-block ml-2">
                                Butuh bantuan
                                </p>
                            </div>
                        </a>

                    </div>
                </div>
            </div>

        </div>

        <div class="app-footer border-0 shadow-lg">
            <a href="{{route('memberIndex')}}" class="nav-content-bttn nav-center">
                <i class="feather-home"></i><br>
                <span class="font-xssss fw-700">Home</span>
            </a>
            <a href="{{route('produkListEvent')}}" class="nav-content-bttn nav-center">
                <i class="fa-solid fa-calendar-day ml-1"></i><br>
                <span class="font-xssss fw-700">Event</span>
            </a>
            {{-- <a href="default-live-stream.html" class="nav-content-bttn" data-tab="chats"><i class="feather-layout"></i></a>             --}}
            <a href="{{route('produkListKelas')}}" class="nav-content-bttn nav-center">
                <i class="fas fa-chalkboard-teacher"></i><br>
                <span class="font-xssss fw-700">Kelas</span>
            </a>
            <a href="{{route('memberProfile')}}" class="nav-content-bttn nav-center">
                <i class="font-md feather-user fw-600 ml-1"></i><br>
                <span class="font-xssss fw-700">Profil</span>
            </a>
        </div>

    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="{{ asset('js/plugin.js') }}"></script>
    <script src="{{ asset('js/aos.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        AOS.init();
    </script>


</html>
