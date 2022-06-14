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
        background-color:#fee6b5;

    }

    /* .owl-item{
        width:400px !important;
    } */


</style>
    

    <div class="banner-wrapper vh-md-100 layer-after app-shape bg-nav">
        <div class="container">
            <div class="row">
                <div class="col-xxxl-7 col-xl-7 vh-md-100 pt-5 pt-sm-7 pb-2 pt-sm-7 mt-sm-5 mt-2 d-flex">
                    <div class="card w-100 border-0 bg-transparent">

                        <h2 class="poppins fw-600 text-grey-800 display3-size display4-md-size">Cuma Disini Kamu Diajarin</h2>
                        <h2 class="poppins fw-600 text-primary display3-size display4-md-size typewrite" data-period="1000" data-type='[ "Cara Bikin CV Terbaik", "Latihan Interview Kerja", "Belajar Psikotes Kerja"]'>
                              <span class="wrap"></span>
                        </h2>
                        <h2 class="poppins fw-600 text-grey-800 display3-size display4-md-size">Langsung Sama HRD</h2>

                        <div class="w200">
                            <a href="{{route('produkListKonsul')}}" class="btn btn-block border-0 w-100 bg-primary p-3 text-white fw-600 rounded-lg d-inline-block font-xssss btn-light mt-3">Konsultasi Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-5 col-xl-4 vh-md-100 mt-5 mt-sm-0 align-items-center justify-content-center d-flex home-phone">
                    <div class="card w-75 border-0 bg-transparent text-center d-block">
                        <img src="{{asset('asset/img/program/phone.png')}}" alt="app-bg" class="w-100 d-lg-block" >    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="feature-wrapper layer-after pb-lg--7 pb-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                    <h2 class="poppins text-grey-900 fw-700 display1-size display1-sm-size pb-3 mb-0 mt-3 d-block lh-3">Makin Mahir Platform Terbaik Untuk Persiapan Kerja Kamu</h2>
                </div>
                <div class="col-xl-10 col-lg-12 pb-lg--5">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-3 col-xss-6 text-center ">
                            <h2 class="display4-size display1-sm-size fw-700 open-font text-danger mb-0">6000+</span></h2>
                            <h4 class="font-xsss text-grey-600 fw-500 mt-2">Lebih dari 6000 teman kerja sudah menggunakan layanan Makin Mahir</h4>
                        </div>

                        <div class="col-lg-3 col-md-3 col-xss-6 text-center ">
                            <h2 class="display4-size display1-sm-size fw-700 open-font text-success mb-0">300+</span></h2>
                            <h4 class="font-xsss text-grey-600 fw-500 mt-2">Tersedia lebih dari 300 konten edukasi dunia kerja buat teman kerja belajar</h4>
                        </div>

                        <div class="col-lg-3 col-md-3 col-xss-6 text-center mt-3 mt-md-0">
                            <h2 class="display4-size display1-sm-size fw-700 open-font text-info mb-0">1 on 1</h2>
                            <h4 class="font-xsss text-grey-600 fw-500 mt-2">Bisa Konsultasi Private 1 on 1 langsung dengan HRD tersertifikasi BNSP</h4>
                        </div>
   
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="feature-wrapper layer-after my-5 pb-lg--7 pb-5">
        <div class="row justify-content-center">
            <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                <h2 class="poppins text-grey-900 fw-700 display1-size display1-sm-size pb-3 mb-0 mt-3 d-block lh-3">Yang Kamu Dapatkan<br> Di Makin Mahir</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <a href="{{route('produkListEvent')}}" class="hover card mb-4 w-100 border-0 pt-4 pb-4 pr-4 pl-7 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="500">
                        {{-- <i class="feather-layers text-success font-xl position-absolute left-15 ml-2"></i> --}}
                        <i class="fa-solid fa-calendar-day text-success font-xl position-absolute left-15 ml-2"></i>
                        <h2 class="fw-700 font-xs text-grey-900 mt-1">Event Gratis</h2>
                        <p class="fw-500 font-xssss lh-24 text-grey-600 mb-0">Daftar Event Bersertifikat Dengan Pemateri Profesional di Dunia Kerja</p>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="{{route('produkListKelas')}}" class="hover card mb-4 w-100 border-0 pt-4 pb-4 pr-4 pl-7 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="500">
                        <i class="feather-book text-danger font-xl position-absolute left-15 ml-2"></i>
                        <h2 class="fw-700 font-xs text-grey-900 mt-1">Kelas Online</h2>
                        <p class="fw-500 font-xssss lh-24 text-grey-600 mb-0">Kelas Online Dari Mulai Belajar Soft Skill Sampai Hardskill</p>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="{{route('produkListKonsul')}}" class="hover card mb-4 w-100 border-0 pt-4 pb-4 pr-4 pl-7 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="500">
                        <i class="fas fa-headset text-info font-xl position-absolute left-15 ml-2"></i>
                        <h2 class="fw-700 font-xs text-grey-900 mt-1">Konsultasi HRD</h2>
                        <p class="fw-500 font-xssss lh-24 text-grey-600 mb-0">Konsultasi Langsung Dengan HRD Buat Bedah CV, Interview Kerja & Psikotes</p>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="{{route('cvIndex')}}" class="hover card mb-4 w-100 border-0 pt-4 pb-4 pr-4 pl-7 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="500">
                        <i class="fa-solid fa-file-code text-warning font-xl position-absolute left-15 ml-2"></i>
                        <h2 class="fw-700 font-xs text-grey-900 mt-1">CV Maker</h2>
                        <p class="fw-500 font-xssss lh-24 text-grey-600 mb-0">Buat CV ATS Kamu Langsung di Sini via Online, GRATIS</p>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="{{route('produkListTemplate')}}" class="hover card mb-4 w-100 border-0 pt-4 pb-4 pr-4 pl-7 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="500">
                        <i class="fa-solid fa-check-to-slot text-secondary font-xl position-absolute left-15 ml-2"></i>
                        <h2 class="fw-700 font-xs text-grey-900 mt-1">Template CV</h2>
                        <p class="fw-500 font-xssss lh-24 text-grey-600 mb-0">Buat kamu, ini rekomendasi template CV langsung dari HRD</p>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="{{route('testIndex')}}" class="hover card mb-4 w-100 border-0 pt-4 pb-4 pr-4 pl-7 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="500" data-aos-duration="500">
                        <i class="fa-solid fa-file-signature text-success font-xl position-absolute left-15 ml-2"></i>
                        <h2 class="fw-700 font-xs text-grey-900 mt-1">Assesment Test</h2>
                        <p class="fw-500 font-xssss lh-24 text-grey-600 mb-0">Ikuti Test Assesment Buat Tau Potensi, Minat dan Bakat Kamu</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="service-wrapper layer-after my-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                    <h2 class="poppins text-grey-900 fw-700 display1-size display1-sm-size pb-3 mb-0 mt-3 d-block lh-3">Tumbuh Bareng<br>Mahir Bareng</h2>
                    <p class="fw-300 font-xss lh-28 text-grey-600">Inilah cara kami membantu Teman Cari Kerja untuk mempersiapkan diri memasuki dunia kerja</p>
                </div>
            </div>
        </div>
    </div>

    <div class="zoom-beduk layer-after my-5 ">
        <div class="container">
              <div class="row">
                <div class="col-lg-6">
                    <div class="banner-slider owl-carousel owl-theme owl-nav-link rounded-lg overflow-hidden beduk-owl">
                           
                        <div class="owl-items" >
                            <img src="{{asset('asset/img/program/beduk1.jpg')}}" alt="image" class="img-fluid">
                        </div>

                        <div class="owl-items" >
                            <img src="{{asset('asset/img/program/beduk2.jpg')}}" alt="image" class="img-fluid">
                        </div>

                        <div class="owl-items" >
                            <img src="{{asset('asset/img/program/beduk3.jpg')}}" alt="image" class="img-fluid">
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <span class="font-xsssss mt-2 fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-success d-inline-block text-success mr-1 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">Beduk</span>
                    <h2 class="poppins text-grey-900 fw-700 display1-size display1-sm-size pb-3 mb-0 mt-3 d-block lh-3 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">Live Event Bedah Dunia Kerja (BEDUK)</h2>
                    <p class="fw-400 font-xss lh-28 text-grey-600 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">Kami Mempertemukan Kamu Dengan HRD Melalui Live Event Rutin Setiap Pekan</p>
                    <a href="{{route('memberProdukDetail',$beduk->produk->id)}}" class="btn border-0 bg-warning p-2 text-white fw-600 rounded-lg d-inline-block font-xssss btn-light mt-3 w150 aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="200">Daftar sekarang</a>
                </div>
              </div>
        </div>
    </div>

    <div class="feature-wrapper layer-after my-5  pt-lg--7 pt-5 mt-4">
        <div class="container">
              <div class="row">
                <div class="col-lg-6 order-lg-2 offset-lg-1">
                    <div class="banner-slider owl-carousel owl-theme owl-nav-link rounded-lg overflow-hidden">
                          
                        <div class="owl-items" >
                            <img src="{{asset('asset/img/program/konsul-1.png')}}" alt="image" class="img-fluid">
                        </div>
                        
                        <div class="owl-items" >
                            <img src="{{asset('asset/img/program/konsul-2.png')}}" alt="image" class="img-fluid">
                        </div>
                        
                        <div class="owl-items" >
                            <img src="{{asset('asset/img/program/konsul-3.png')}}" alt="image" class="img-fluid">
                        </div>
                           
                    </div>
                </div>

                {{-- <div class="col-lg-7 order-lg-2 offset-lg-1">
                    <img src="{{asset('asset/img/program/zoom_konsul.jpeg')}}" alt="image" class="w-100 aos-init" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="500">
                </div> --}}
                
                <div class="col-lg-4 order-lg-1">
                    <span class="font-xsssss mt-2 fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-success d-inline-block text-success aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">Konsultasi</span>
                    <h2 class="poppins text-grey-900 fw-700 display1-size display1-sm-size pb-3 mb-0 mt-3 d-block lh-3 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">Konsultasi Private Dengan HRD</h2>
                    <p class="fw-400 font-xss lh-28 text-grey-600 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">Kamu Bisa Ngobrol Langsung Sama HRD Buat Bedah CV, Latihan Interview Kerja dan Psikotes</p>
                    <a href="{{route('produkListKonsul')}}" class="btn border-0 bg-warning p-2 text-white fw-600 rounded-lg d-inline-block font-xssss btn-light mt-3 w150 aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="200">Daftar sekarang</a>
                </div>
                
              </div>
        </div>
    </div>

    <div class="price-wrap pb-lg--7 pt-lg--7 pb-5 pt-5 layer-after position-relative">
        <div class="overflow bg-aliceblue position-absolute layer-blue">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-success d-inline-block text-success mr-1">Paket</span>
                    <h2 class="poppins text-grey-900 fw-700 font-xxl pb-3 mb-0 mt-3 d-block lh-3">Buat Dirimu Jadi Makin Mahir</h2>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card border-0 mb-4 bg-white shadow-xss shadow-xss rounded-lg">
                                <div class="card-body p-5 border-top-lg border-size-lg border-primary">
                                    
                                    <h1 class="display2-size fw-700">29 <span class="font-xssss text-grey-600"> / ribu</span></h1>
                                    <h2 class=" font-lg fw-700 my-3">Makin Tau</h2>
                                    <h4 class=" fw-500 mb-4 lh-24 font-xssss text-grey-600 d-none">Kelas Online yang bakal ngajarin kami step by step bikin CV yang menarik dimata HRD</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-3 "><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i><span>Konsultasi privat 1 on 1</span></h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Bedah CV langsung dengan HRD</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-3 "><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i>Dibimbing sampai dapat kerja</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Gratis 20 template CV</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Konsultasi via Chat</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Durasi 15 menit</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="fa-solid fa-xmark font-xssss mr-2 btn-round-xs alert-danger text-danger"></i> Latihan interview kerja dengan HRD</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="fa-solid fa-xmark font-xssss mr-2 btn-round-xs alert-danger text-danger"></i> Konsultasi karir dengan HRD</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="fa-solid fa-xmark font-xssss mr-2 btn-round-xs alert-danger text-danger"></i> Template surat lamaran kerja</h4>
                                    <a href="{{route('memberProdukDetail',21)}}" class="btn btn-block border-0 w-100 bg-primary p-3 text-white fw-600 rounded-lg d-inline-block font-xssss btn-light mt-3">Ambil Sekarang</a>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card border-0 mb-4 bg-white shadow-xss shadow-xss rounded-lg">
                                <div class="card-body p-5 border-top-lg border-size-lg border-success">
                                    
                                    <h1 class="display2-size fw-700">49 <span class="font-xssss text-grey-600"> / ribu</span></h1>
                                    <h2 class=" font-lg fw-700 my-3">Makin Faham</h2>
                                    <h4 class=" fw-500 mb-4 lh-24 font-xssss text-grey-600 d-none">Kelas Online yang bakal ngajarin kami step by step bikin CV yang menarik dimata HRD</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-3 "><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i><span>Konsultasi privat 1 on 1</span></h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Bedah CV langsung dengan HRD</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-3 "><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i>Dibimbing sampai dapat kerja</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Gratis 20 template CV</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Konsultasi via Zoom</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Durasi 30 menit</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="fa-solid fa-xmark font-xssss mr-2 btn-round-xs alert-danger text-danger"></i> Latihan interview kerja dengan HRD</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="fa-solid fa-xmark font-xssss mr-2 btn-round-xs alert-danger text-danger"></i> Konsultasi karir dengan HRD</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="fa-solid fa-xmark font-xssss mr-2 btn-round-xs alert-danger text-danger"></i> Template surat lamaran kerja</h4>
                                    <a href="{{route('memberProdukDetail',18)}}" class="btn btn-block border-0 w-100 bg-primary p-3 text-white fw-600 rounded-lg d-inline-block font-xssss btn-light mt-3">Ambil Sekarang</a>



                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card border-0 mb-4 bg-white shadow-xss shadow-xss rounded-lg">
                                <div class="card-body p-5 border-top-lg border-size-lg border-warning">
                                    
                                    <h1 class="display2-size fw-700">99 <span class="font-xssss text-grey-600"> / ribu</span></h1>
                                    <h2 class=" font-lg fw-700 my-3">Makin Mahir</h2>
                                    <h4 class=" fw-500 mb-4 lh-24 font-xssss text-grey-600 d-none">Kelas Online yang bakal ngajarin kami step by step bikin CV yang menarik dimata HRD</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-3 "><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i><span>Konsultasi privat 1 on 1</span></h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Bedah CV langsung dengan HRD</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-3 "><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i>Dibimbing sampai dapat kerja</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Gratis 10 template CV</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Konsultasi via Zoom</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Durasi 60 menit</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Latihan interview kerja dengan HRD</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Konsultasi karir dengan HRD</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Template surat lamaran kerja</h4>
                                    <h4 class=" font-xssss fw-600 text-grey-700 mb-4"><i class="ti-check font-xssss mr-2 btn-round-xs alert-success text-success"></i> Rekaman kelas</h4>
                                    <a href="{{route('memberProdukDetail',23)}}" class="btn btn-block border-0 w-100 bg-primary p-3 text-white fw-600 rounded-lg d-inline-block font-xssss btn-light mt-3">Ambil Sekarang</a>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    {{-- <div class="testimoonial layer-after my-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                    <h2 class="poppins text-grey-900 fw-700 display1-size display1-sm-size pb-3 mb-0 mt-3 d-block lh-3">Testimoni</h2>
                </div>

                <div class="container">
                    <div class="col-lg-12">
                        <div class="feedback-slider2 owl-carousel owl-theme dot-none right-nav pb-4 nav-xs-none">
                            <div class="owl-items bg-transparent">
                                <div class="card w-100 p-0 bg-transparent text-left border-0">
                                    <div class="card-body p-5 bg-white shadow-sm rounded-lg">
                                        <p class="font-xsss fw-500 text-grey-700 lh-30 mt-0 mb-0 ">"Bahkan ada beberapa pertanyaan yang menurut saya tuh itu gak ada gitu, biasanya kan ada yang muncul di youtube gitu, kayak beberapa pertanyaan terkait yang sering ditanyain sama HR. Tapi tadi kaya wow, ini bingung jawabnya gimana. Untungnya tadi udah dikasih solusi sih pak terkait pertanyaan tersebut"</p>
                                    </div>

                                    <div class="card-body p-0 mt-5 bg-transparent">
                                        <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Kartika fitri</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="owl-items bg-transparent">
                                <div class="card w-100 p-0 bg-transparent text-left border-0 ">
                                    <div class="card-body p-5 bg-white shadow-sm rounded-lg">
                                        <p class="font-xsss fw-500 text-grey-700 lh-30 mt-0 mb-0 ">"Jadi karena ngikutin Kelas Bedah CV ini, aku jadi lebih tau mana yang harus aku masukin ke CV, mana yang enggak. Jadi bikin CV aku lebih ATS Friendly. Nah, walaupun ini berbayar, tapi menurut aku tuh ini worth it banget, kalian ga bakal nyesel gitu loh"</p>
                                    </div>

                                    <div class="card-body p-0 mt-5 bg-transparent">
                                        <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Alya Raihanna</h4>    
                                    </div>
                                </div>
                            </div>

                            <div class="owl-items bg-transparent">
                                <div class="card w-100 p-0 bg-transparent text-left border-0">
                                    <div class="card-body p-5 bg-white shadow-sm rounded-lg">
                                        <p class="font-xsss fw-500 text-grey-700 lh-30 mt-0 mb-0 ">"Kita tuh butuh prakteknya juga, gak cuma teorinya doank. Sekarang kan teorinya udah banyak, di google udah ada, di buku udah ada, kita butuh prakteknya juga. Kalo yang kaya gini saya baru pertama kali nih saya ikut yang kaya gini. Kalau menurut saya, yang kaya gini tuh cukup membantu sih mas"</p>
                                    </div>

                                    <div class="card-body p-0 mt-5 bg-transparent">
                                        <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Yola Yulliana</h4>    
                                    </div>
                                </div>
                            </div>

                            <div class="owl-items bg-transparent">
                                <div class="card w-100 p-0 bg-transparent text-left border-0">
                                    <div class="card-body p-5 bg-white shadow-sm rounded-lg">
                                        <p class="font-xsss fw-500 text-grey-700 lh-30 mt-0 mb-0 ">“Setelah mengikuti kelas konsul ini saya jadi lebih paham cara membuat CV untuk membuat personal branding lebih menonjol dibandingkan kandidat lain. Selain itu masukan dari kak Aldino terkait portofolio sangat membantu saya.”</p>
                                    </div>

                                    <div class="card-body p-0 mt-5 bg-transparent">
                                        <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Ibnu Hari Winartomo </h4>  
                                        <h4 class="text-grey-800 fw-500 font-xsss mt-0">(Universitas Budi Luhur) </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="owl-items bg-transparent">
                                <div class="card w-100 p-0 bg-transparent text-left border-0">
                                    <div class="card-body p-5 bg-white shadow-sm rounded-lg">
                                        <p class="font-xsss fw-500 text-grey-700 lh-30 mt-0 mb-0 ">“Insighfull banget yah, jadi pikiran yang sebelumnya menurut saya sudah benar ternyata menurut HR ini kurang tepat. Jadi kelas bedah CV ini sangat membantu saya”
                                        </p>
                                    </div>

                                    <div class="card-body p-0 mt-5 bg-transparent">
                                        <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Dalil AF</h4>  
                                        <h4 class="text-grey-800 fw-500 font-xsss mt-0">( ISI Denpasar, Bali ) </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="owl-items bg-transparent">
                                <div class="card w-100 p-0 bg-transparent text-left border-0">
                                    <div class="card-body p-5 bg-white shadow-sm rounded-lg">
                                        <p class="font-xsss fw-500 text-grey-700 lh-30 mt-0 mb-0 ">“Saya jadi paham terkait pembuatan CV, baik yang ATS ataupun CV Kreatif. Terimakasih Makin Mahir”
                                        </p>
                                    </div>

                                    <div class="card-body p-0 mt-5 bg-transparent">
                                        <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Veronica Yolanda </h4>  
                                        <h4 class="text-grey-800 fw-500 font-xsss mt-0">( UII Yogyakarta ) </h4>
                                    </div>
                                </div>
                            </div>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="feedback-wrapper layer-after pb-lg--7 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                    <h2 class="poppins text-grey-900 fw-700 font-xxl pb-3 mb-0 mt-3 d-block lh-3">Testimoni</h2>
                </div>
            </div>
            <div class="row flex-column-reverse flex-sm-row">
                <div class="col-lg-6">
                    <div class="owl-testimoni banner-slider owl-carousel owl-theme owl-nav-link rounded-lg overflow-hidden">
                        
                        <div class="owl-items" >
                            <h4 class="fw-500 lh-5 font-md mb-3 text-grey-700">“Saya jadi paham terkait pembuatan CV, baik yang ATS ataupun CV Kreatif. Terimakasih Makin Mahir”</h4>
                             
                            <div class="clearfix"></div>
                            <div class="card-body pl-0 pt-0 mt-4 mb-5 pb-4 d-block">
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Veronica Yolanda</h4>    
                                <h5 class="font-xssss fw-600 mb-1 text-grey-500">( UII Yogyakarta )</h5>
                            </div>
                        </div>

                        <div class="owl-items" >
                            <h4 class="fw-500 lh-5 font-md mb-3 text-grey-700">"Jadi karena ngikutin Kelas Bedah CV ini, aku jadi lebih tau mana yang harus aku masukin ke CV, mana yang enggak. Jadi bikin CV aku lebih ATS Friendly. Nah, walaupun ini berbayar, tapi menurut aku tuh ini worth it banget, kalian ga bakal nyesel gitu loh"</h4>
                             
                            <div class="clearfix"></div>
                            <div class="card-body pl-0 pt-0 mt-4 mb-5 pb-4 d-block">
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Alya Raihanna</h4>    
                                <h5 class="font-xssss fw-600 mb-1 text-grey-500"></h5>
                            </div>
                        </div>

                        <div class="owl-items" >
                            <h4 class="fw-500 lh-5 font-md mb-3 text-grey-700">"Kita tuh butuh prakteknya juga, gak cuma teorinya doank. Sekarang kan teorinya udah banyak, di google udah ada, di buku udah ada, kita butuh prakteknya juga. Kalo yang kaya gini saya baru pertama kali nih saya ikut yang kaya gini. Kalau menurut saya, yang kaya gini tuh cukup membantu sih mas"</h4>
                             
                            <div class="clearfix"></div>
                            <div class="card-body pl-0 pt-0 mt-4 mb-5 pb-4 d-block">
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Yola Yulliana</h4>    
                                <h5 class="font-xssss fw-600 mb-1 text-grey-500"></h5>
                            </div>
                        </div>

                        <div class="owl-items" >
                            <h4 class="fw-500 lh-5 font-md mb-3 text-grey-700">“Setelah mengikuti kelas konsul ini saya jadi lebih paham cara membuat CV untuk membuat personal branding lebih menonjol dibandingkan kandidat lain. Selain itu masukan dari kak Aldino terkait portofolio sangat membantu saya.”</h4>
                             
                            <div class="clearfix"></div>
                            <div class="card-body pl-0 pt-0 mt-4 mb-5 pb-4 d-block">
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Ibnu Hari Winartomo</h4>    
                                <h5 class="font-xssss fw-600 mb-1 text-grey-500">(Universitas Budi Luhur) </h5>
                            </div>
                        </div>

                        <div class="owl-items" >
                            <h4 class="fw-500 lh-5 font-md mb-3 text-grey-700">“Insighfull banget yah, jadi pikiran yang sebelumnya menurut saya sudah benar ternyata menurut HR ini kurang tepat. Jadi kelas bedah CV ini sangat membantu saya”</h4>
                             
                            <div class="clearfix"></div>
                            <div class="card-body pl-0 pt-0 mt-4 mb-5 pb-4 d-block">
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Dalil AF</h4>    
                                <h5 class="font-xssss fw-600 mb-1 text-grey-500">( ISI Denpasar, Bali )</h5>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <img src="https://images.unsplash.com/photo-1558769132-92e717d613cd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="image" class="img-fluid mb-4">
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="brand-wrapper pt-5 pb-lg--7 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="text-grey-900 fw-500 font-xss pb-3 mb-1 d-block">Ikuti Kami</h2>
                    <div class="container">
                        <div class="row">
                            <a href="https://www.linkedin.com/company/makinmahir-id/" class="text-linkedin">
                                <i class="fa-brands fa-linkedin fa-2x mx-1"></i>
                            </a>
                            <a href="https://www.instagram.com/makinmahir_id/?hl=en" class="text-instagram">
                                <i class="fa-brands fa-instagram fa-2x mx-1"></i>
                            </a>
                            <a href="https://www.youtube.com/c/MAKINMAHIR" class="text-pinterest">
                                <i class="fa-brands fa-youtube fa-2x mx-1"></i>
                            </a>
                            <a href="https://www.tiktok.com/@makinmahir">
                                <i class="fa-brands fa-tiktok fa-2x mx-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h2 class="text-grey-900 fw-500 font-xss pb-3 mb-1 d-block">Metode Pembayaran</h2>
                    <div class="container">
                    <div class="row">
                        <div class="text-center mx-2"><img src="{{asset('asset/img/program/bni.png')}}" alt="icon" class="w50 ml-auto mr-auto"></div>
                        <div class="text-center mx-2"><img src="{{asset('asset/img/program/bri.png')}}" alt="icon" class="w50 ml-auto mr-auto"></div>
                        <div class="text-center mx-2"><img src="{{asset('asset/img/program/mandiri.png')}}" alt="icon" class="w50 ml-auto mr-auto"></div>
                        <div class="text-center mx-2"><img src="{{asset('asset/img/program/bca.png')}}" alt="icon" class="w50 ml-auto mr-auto"></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    var owl = $('.owl-carousel');
    var testi = $('.owl-testimoni');
    //console.log(owl);
    owl.owlCarousel({
        items:1,
        loop:true,
        center:true,
        //autoWidth:true,
        margin:15,
        autoplay:true,
        autoplayTimeout:3000,
        //autoplayHoverPause:true
    });

    testi.owlCarousel({
        //items:5,
        loop:true,
        //center:true,
        //autoWidth:true,
        //margin:15,
        autoplay:true,
        autoplayTimeout:3000,
        //autoplayHoverPause:true
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