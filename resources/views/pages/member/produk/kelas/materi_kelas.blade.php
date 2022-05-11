<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elomoas - Payment recharge page</title>

    {{-- <link rel="stylesheet" href="css/themify-icons.css"> --}}

    {{-- <link rel="stylesheet" href="css/feather.css"> --}}
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->


    {{-- <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/aos.min.css"> --}}


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<style>
    .image-banner{
        transform: scale(1.0);
    }

    .footer-wrapper{
        display: none !important;
    }

    iframe{
        height: 400px;
        width: 100%;
    }

    @media screen and (max-width: 560px) {
        iframe{
            height: 200px;
        }
    }
</style>

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>

    
    
    <div class="main-wrap">
        <nav class="navigation scroll-bar">
            <div class="container pl-0 pr-0">
                <div class="nav-content">
                    <div class="nav-top">
                        <a href="{{route('enrollProdukDetail',$data->kelas->produk->id)}}"><i class="feather-slack text-success display1-size mr-3 ml-3"></i><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xl logo-text mb-0">LMS</span> </a>
                        <a href="{{route('enrollProdukDetail',$data->kelas->produk->id)}}" class="close-nav d-inline-block d-lg-none">
                            <i class="fas fa-arrow-left bg-grey mb-4 btn-round-sm font-xssss fw-700 text-dark float-right mr-2 mt-4"></i>
                        </a>
                    </div>
                    <div class="nav-caption fw-600 font-xssss text-grey-500"><span>Bab</span> Feeds</div>
                    
                    <div class="card d-block border-0 rounded-lg overflow-hidden mt-2 w-100">
                        <div id="accordion" class="accordion mb-0">
                            @forelse ($babs as $bab)
                            <div class="card shadow-xss mb-0 w-100">
                                <div class="card-header bg-greylight theme-dark-bg" id="headingOne">
                                    <h5 class="mb-0"><button class="btn font-xsss fw-600 btn-link " data-toggle="collapse" data-target="#collapse-{{$bab['id']}}" aria-expanded="false" aria-controls="collapseOne"> {{$bab['nama']}} </button></h5>
                                </div>
                                <div id="collapse-{{$bab['id']}}" class="collapse p-3 show" aria-labelledby="headingOne" data-parent="#accordion">
                                    @forelse ($bab->isi_bab as $materi)
                                    <div class="card-body d-flex p-2 align-items-center">
                                        <i class="fas fa-book"></i>
                                        <a href="">
                                            <span class="font-xssss fw-500 text-grey-600 ml-2">{{$materi['judul']}}</span>
                                        </a>
                                    </div>                    
                                    @empty                        
                                    @endforelse
                                </div>
                            </div>
                            @empty 
                            @endforelse
                        </div>
                    </div>
        
                </div>
            </div>
        </nav>
        
        <div class="main-content" style="height: 100%;">
            {{-- header atas --}}
            <div class="middle-sidebar-header bg-white">
                <button class="header-menu"></button>
        
                <ul class="d-flex ml-auto right-menu-icon">
                    <i class="fas fa-lg fa-school"></i>
                </ul>
            </div>
        
            <div class="middle-sidebar-bottom pb-5">
                <div class="container mt-2">
                    <h2 class="fw-700 font-xl mb-0 mt-3 pl-1">{{$data->kelas->judul}}</h2>
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent px-0">
                          <li class="breadcrumb-item font-xsss">
                              {{$data->bab_kelas->nama}}
                            </li>
                          <li class="breadcrumb-item active font-xsss" aria-current="page">
                              {{$data['judul']}}
                            </li>
                        </ol>
                    </nav>
        
                    @isset($data['link_video'])
                    <div class="card border-0 mb-0 rounded-lg bg-transparent" style="width: 100%">
                        <div class="container">
                            <div class="video-container w-100">
                                <iframe src="{{$data['link_video']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                {{-- <iframe src="https://www.youtube.com/embed/TWQn896YyHs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                            </div>
                        </div>
                    </div>
                    @endisset
        
                    <p class="font-xsss fw-500 lh-28 text-grey-600 mb-0 pl-2 text-justify">
                        {!!$data['isi']!!}
                    </p>
                </div>
            </div>
        
        </div>

        <footer class="footer-wrapper layer-after bg-dark pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="middle-footer mt-0 pt-5">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 sm-mb-4">
                                    <h5 class="mb-4 font-xs">Makin mahir</h5>
                                    <p class="w-100">platform perencana karir yang meberikan layanan yang di dalamnya berisi informasi seputar dunia kerja, membantu fresh graduate mengenali potensi dirinya dan memberikan rekomendasi yang dapat dijadikan pertimbangan dalam merencanakan karir terbaik mereka.</p>
                                   
                                    
                                </div>
                                <div class="col-md-4 col-lg-2 col-sm-6 col-xs-6">
                                    <h5 class="font-xs">About</h5>
                                    <ul>
                                        <li><a href="">FAQ</a></li>
                                        <li><a href="">Syarat dan kebijakan</a></li>
                                        <li><a href="">Privacy Policy</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6">
                                    
                                    <h5 class="mb-3 font-xs">Kontak</h5>
                                    <p class="mb-0">Telepon : 085856561200</p>
                                    <p class="mb-0">Whatsapp : <a href="https://api.whatsapp.com/send?phone=6285856561200">+6285856561200</a></p>
                                    <p>Email : <a href="mail:makinmahir.id@gmail.com">makinmahir.id@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p class="copyright-text">© 2021 copyright. All rights reserved.</p>
                    </div>

                </div>
            </div>
        </footer>
    </div> 
 

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{ asset('js/plugin.js') }}"></script>
    <script src="{{ asset('js/aos.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        AOS.init();
    </script>

    <script>
        function collapse(){
            $('#navbarNavDropdown').toggle();

        }
    </script>
    
</body>

</html>