@extends('layouts.public')

@section('content')

<style>
    /* .nav-link{
        color: rgb(138, 138, 138) !important
    } */

    .layer-blue{
        z-index: 0;
        width: 100%;
        top: 300px;
        height: 70%;
    }

    .header-wrapper .nav-menu li a {
        color:#777 !important;
    }

    .hover:hover{
        background-color:#E2F3FF;

    }

    .owl-theme.owl-nav-link .owl-nav {
        top: 90% !important;
    }

    .owl-item.active.center{
        transform: scale(1.15);
    }

    .vh-banner{
        height: 70vh;
    }

    .border-no-1{
        border-bottom: 1px solid #E1E1F0;
        border-right: 1px solid #E1E1F0
    }

    .border-no-2{

    }

    .border-no-3{
        
    }

    .border-no-4{
        border-top: 1px solid #E1E1F0;
        border-left: 1px solid #E1E1F0
    }

    .layanan-card-mobile{
        width: 70px !important;
    }

    /* MOBILE */
    @media screen and (max-width: 767px) {
        .border-no-1{
            border-bottom: 1px solid #E1E1F0;
            border-right: none;
        }

        .border-no-2{
            border-bottom: 1px solid #E1E1F0;
        }

        .border-no-3{
            border-bottom: 1px solid #E1E1F0;
        }

        .border-no-4{
            border : none ;
        }

        
        .vh-banner{
            height: 70vh;
        }
    }


</style>
    

    <div class="banner-wrapper vh-banner layer-after app-shape bg-home position-relative">
        <div class="ornamen position-absolute d-md-block d-none" style="top:-70%; left: -50px;">
            <img src="{{asset('asset/home/ornamen-circle-1.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-12 pt-5 pt-sm-7 pb-2 pt-sm-7 mt-sm-5 mt-2 d-flex">
                    <div class="card w-100 border-0 bg-transparent">
                        <h2 class="poppins fw-600 text-white display3-size display2-md-size">Wujudkan Karier Impianmu
                            Bersama Makin Mahir
                        </h2>
                        <p class="font-xss font-md-xsss text-white">
                            Setiap orang memiliki kesempatan yang sama untuk bisa bekerja, Makin Mahir hadir sebagai platform ekosistem untuk membantu persiapan karir Anda.
                        </p>
                    </div>
                </div>

                <div class="col-md-5 col-10 mt-5 mt-sm-0 p-0 align-items-center justify-content-end d-flex position-absolute bottom-0 right-0">
                    <div class="card w-100 border-0 bg-transparent text-center d-block">
                        <img src="{{asset('asset/home/home-banner.png')}}" style="filter: opacity(0.2);"  alt="app-bg" class="w-100 d-lg-block" >    
                    </div>
                </div>

                <div class="col-md-6 col-12">

                </div>

            </div>
        </div>
    </div>

    {{-- Layanan mobile --}}
    <div class="search-wrap position-relative d-block d-sm-none" style="top:-130px; ">
        <div class="container">

            <div class="row">
                <div class="loop-home owl-carousel owl-theme owl-loaded owl-drag">  
                   
                    <div class="layanan-card-mobile text-center mx-2">
                        <a href="{{route('produkListEvent')}}" class="card text-left border shadow-xs rounded-lg">
                            <div class="card-body p-1">
                                {{-- <a href="#" class="btn-round-xl bg-white text-center ml-2"> --}}
                                    <img src="{{asset('asset/home/icon-event.png')}}" class="ml-2" alt="icon" style="width:40px" class="">
                                {{-- </a> --}}
                                <h4 class="fw-600 font-xsssss mb-2 mt-0 text-center">Event</h4>
                            </div>
                        </a>
                    </div>

                    <div class="layanan-card-mobile text-center mx-2">
                        <a href="{{route('produkListKonsul')}}" class="card text-left border shadow-xs rounded-lg">
                            <div class="card-body p-1">
                                {{-- <a href="#" class="btn-round-xl bg-white text-center ml-2"> --}}
                                    <img src="{{asset('asset/home/icon-konsul.png')}}" class="ml-2" alt="icon" style="width:40px" class="">
                                {{-- </a> --}}
                                <h4 class="fw-600 font-xsssss mb-2 mt-0 text-center">Konsultasi</h4>
                            </div>
                        </a>
                    </div>

                    <div class="layanan-card-mobile text-center mx-2">
                        <a href="{{route('testIndex')}}" class="card text-left border shadow-xs rounded-lg">
                            <div class="card-body p-1">
                                {{-- <a href="#" class="btn-round-xl bg-white text-center ml-2"> --}}
                                    <img src="{{asset('asset/home/icon-test.png')}}" class="ml-2" alt="icon" style="width:40px" class="">
                                {{-- </a> --}}
                                <h4 class="fw-600 font-xsssss mb-2 mt-0 text-center">Assesment</h4>
                            </div>
                        </a>
                    </div>

                    <div class="layanan-card-mobile text-center mx-2">
                        <a href="{{route('cvIndex')}}" class="card text-left border shadow-xs rounded-lg">
                            <div class="card-body p-1">
                                {{-- <a href="#" class="btn-round-xl bg-white text-center ml-2"> --}}
                                    <img src="{{asset('asset/home/icon-cv.png')}}" class="ml-2" alt="icon" style="width:40px" class="">
                                {{-- </a> --}}
                                <h4 class="fw-600 font-xsssss mb-2 mt-0 text-center">CV Maker</h4>
                            </div>
                        </a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>

    {{-- card layanan --}}
    <div class="search-wrap position-relative d-none d-sm-block" style="top:-100px; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-10 mx-auto mb-4">
                    <div class="card rounded-lg p-4 border-0 bg-no-repeat bg-white shadow-lg">
                        <div class="card-body w-100 p-0">
                            <h4 class="font-sm fw-600 text-center mb-3">Nikmati Berbagai Layanan Terbaik</h4>
                            <div class="container-fluid mb-4">
                                <div class="row justify-content-around">
                                   
                                    <div class="col-3">
                                        <div class="">
                                            <a href="{{route('produkListEvent')}}" class="hover card w140 p-0 rounded-lg text-center border">
                                                <div class="card-body">
                                                    <div class="btn-round-xl">
                                                        <img src="{{asset('asset/home/icon-event.png')}}" alt="icon" style="width:40px" class="">
                                                    </div>
                                                    <h4 class="fw-600 font-xsss mt-3 mb-0">Event</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="">
                                            <a href="{{route('produkListKonsul')}}" class="hover card w140 p-0 rounded-lg text-center border">
                                                <div class="card-body">
                                                    <div class="btn-round-xl">
                                                        <img src="{{asset('asset/home/icon-konsul.png')}}" alt="icon" class="">
                                                    </div>
                                                    <h4 class="fw-600 font-xsss mt-3 mb-0">Konsultasi</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="">
                                            <a href="{{route('testIndex')}}" class="hover card w140 p-0 rounded-lg text-center border">
                                                <div class="card-body">
                                                    <div class="btn-round-xl">
                                                        <img src="{{asset('asset/home/icon-test.png')}}" alt="icon" class="">
                                                    </div>
                                                    <h4 class="fw-600 font-xsss mt-3 mb-0">Assesment</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="">
                                            <a href="{{route('cvIndex')}}" class="hover card w140 p-0 rounded-lg text-center border">
                                                <div class="card-body">
                                                    <div class="btn-round-xl">
                                                        <img src="{{asset('asset/home/icon-cv.png')}}" alt="icon" class="">
                                                    </div>
                                                    <h4 class="fw-600 font-xsss mt-3 mb-0">CV Maker</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- tentang kami --}}
    <div class="feature-wrapper layer-after my-5 pt-lg--7 position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 order-lg-1 offset-lg-1">
                    <img src="{{asset('asset/logo/square.png')}}" alt="image" class="img-fluid">
                </div>

                <div class="col-lg-6 order-lg-2 offset-lg-1">
                    <h2 class="poppins text-grey-900 fw-700 font-lg pb-3 mb-0 mt-3 d-block lh-3 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
                        Selayang Pandang tentang Makin Mahir 
                    </h2>
                    <p class="fw-400 font-xss lh-28 text-grey-600 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">
                        Sudah mengirimkan lamaran kerja ratusan kali namun tidak ada yang diterima, pasti ada yang salah di CV, Interview atau minat karir Anda. Makin Mahir menjadi ruang yang tepat jadi <span class="text-primary fw-600">#TemanCariKerja</span> untuk jobseekers didampingi HR Specialist Recruiter dan Mentor Profesional. Nikmati beberapa fitur andalan Konsultasi Private, Assesment Test dan Event Edukasi Gratis. 
                    </p>
                </div>
            </div>
        </div>
        <div class="ornamen position-absolute top-0" style="left: -70px;">
            <img src="{{asset('asset/home/ornamen-circle-1.png')}}" alt="">
        </div>
    </div>


    {{-- why chose me --}}
    <div class="service-wrapper layer-after my-5 pt-lg--7 pt-5 position-relative">
        <div class="ornamen position-absolute top-0" style="right: -70px;">
            <img src="{{asset('asset/home/ornamen-1.png')}}" alt="">
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                    <h2 class="poppins text-grey-900 fw-700 font-xl pb-3 mb-0 mt-3 d-block lh-3">Kenapa Memilih Konsultasi Bimbingan Karir di Makin Mahir ?</h2>
                    <p class="fw-300 font-xss lh-28 text-grey-600">Inilah beberapa hal yang menjadi keunikan kami dan kamu harus tahu
                    </p>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-6 col-12 border-no-1">
                        <div class="card shadow-none bg-transparent border-0 my-3">
                            <div class="row">
                                <div class="col-3"><img src="https://via.placeholder.com/100x100.png" alt="blog-image" class="img-fluid rounded-lg"></div>
                                <div class="col-8 pl-1">
                                    <h2 class="fw-600 text-grey-800 font-xsss lh-3">Bimbingan Intens Sampai dapat Kerja</h2>
                                    <h6 class="font-xssss text-grey-500 fw-500 mt-0">The simplest but robust technology to accompany with you</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 border-no-2">
                        <div class="card shadow-none bg-transparent border-0 my-3">
                            <div class="row">
                                <div class="col-3"><img src="https://via.placeholder.com/100x100.png" alt="blog-image" class="img-fluid rounded-lg"></div>
                                <div class="col-8 pl-1">
                                    <h2 class="fw-600 text-grey-800 font-xsss lh-3">Lorem Ipsum</h2>
                                    <h6 class="font-xssss text-grey-500 fw-500 mt-0">The simplest but robust technology to accompany with you</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 border-no-3">
                        <div class="card shadow-none bg-transparent border-0 my-3">
                            <div class="row">
                                <div class="col-3"><img src="https://via.placeholder.com/100x100.png" alt="blog-image" class="img-fluid rounded-lg"></div>
                                <div class="col-8 pl-1">
                                    <h2 class="fw-600 text-grey-800 font-xsss lh-3">Lorem Ipsum</h2>
                                    <h6 class="font-xssss text-grey-500 fw-500 mt-0">The simplest but robust technology to accompany with you</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 border-no-4">
                        <div class="card shadow-none bg-transparent border-0 my-3">
                            <div class="row">
                                <div class="col-3"><img src="https://via.placeholder.com/100x100.png" alt="blog-image" class="img-fluid rounded-lg"></div>
                                <div class="col-8 pl-1">
                                    <h2 class="fw-600 text-grey-800 font-xsss lh-3">Lorem Ipsum</h2>
                                    <h6 class="font-xssss text-grey-500 fw-500 mt-0">The simplest but robust technology to accompany with you</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ornamen position-absolute " style="left: -70px;">
            <img src="{{asset('asset/home/ornamen-1.png')}}" alt="">
        </div>
    </div>

    <div class="spacer"></div>

    {{-- Testomoni --}}
    <div class="feedback-wrapper layer-after pb-lg--7 pb-5 position-relative">
        <div class="ornamen position-absolute top-0 right-0">
            <img src="{{asset('asset/home/ornamen-2.png')}}" alt="">
        </div>
        <div class="ornamen position-absolute" style="right: 10%; top: 20%;">
            <img src="{{asset('asset/home/ornamen-3.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                    <h2 class="text-grey-900 fw-600 font-lg pb-3 mb-0 mt-3 d-block lh-3">Here is what our Clients are saying About us</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="loop owl-carousel owl-theme owl-loaded owl-drag">
                    @for ($i=0;$i<5;$i++)
                        
                    <div class="owl-items text-center my-5">
                        <div class="card w-100 p-4 p-md--5 text-left border shadow-xs rounded-lg">
                            <div class="card-body pl-0 pt-0">
                                <img src="https://via.placeholder.com/50x50.png" alt="user" class="w45 float-left mr-3">
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Goria {{$i}}</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-500">Digital Marketing Executive</h5>
                            </div>
                            <p class="font-xsss fw-400 text-grey-500 lh-28 mt-0 mb-0 ">Human coronaviruses are common and are typically associated with mild illnesses, similar to the common cold.</p>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

           
        </div>
    </div>

    {{-- CTA --}}
    <div class="subscribe-wrapper pt-3 pt-lg--7 pb-3 pb-lg--5 position-relative">
        <div class="row">
            <div class="col-12">
                <div class="card w-100 p-4 p-lg--5 rounded-xxl bg-current border-0 position-relative">
                    <div class="ornamen position-absolute top-0" style="left: -70px;">
                        <img src="{{asset('asset/home/ornamen-circle-1.png')}}" alt="">
                    </div>
                    <div class="container py-1">
                        <div class="row ">
                            <div class="col-lg-7 text-left">
                                <h2 class="fw-600 text-white font-xl font-md-xs lh-3 mb-2 ">Jika Ada Pertanyaan Tim Kami siap Memberi pelayanan yang Terbaik</h2>
                            </div>

                            <div class="col-12 text-center mt-3 position-relative" style="z-index: 3;">
                                <div>
                                    <a href="#" class="btn border-0 p-2 px-4 text-primary fw-600 rounded-md font-xssss bg-white mt-3">Subscribe</a>
                                </div>
                            </div>

                            <div class="col-md-4 col-10 mt-5 mt-sm-0 p-0 align-items-center justify-content-end d-md-flex position-absolute bottom-0 right-0">
                                <div class="card w-100 border-0 bg-transparent text-center d-block">
                                    <img src="{{asset('asset/home/call-banner.png')}}" style="filter: opacity(0.2);"  alt="app-bg" class="w-100 d-lg-block" >    
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    var owl = $('.owl-carousel');
    
    // owl.owlCarousel({
    //     items:3,
    //     loop:true,
    //     center:true, 
    //     margin:15,
    //     autoplay:true,
    //     autoplayTimeout:3000,
    // });

    $('.loop-home').owlCarousel({
        items:5,
        
        margin:7,
        loop:false,
        responsive:{
            0:{
                items:4,
            },
            600:{
                items:2,
            },
            1200:{
                items:3,
            }
        }
    });

    $('.loop').owlCarousel({
        center: true,
        items:3,
        loop:true,
        margin:50,
        autoplay:true,  
        dots:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1200:{
                items:3,
            }
        }
    });

    var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 1000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 250;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0 solid #fff}";
        document.body.appendChild(css);
    };
</script>
   
    
    

@endsection