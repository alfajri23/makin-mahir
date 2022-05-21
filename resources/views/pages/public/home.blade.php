@extends('layouts.public')

@section('content')

<style>
    .nav-link{
        color: white !important
    }

</style>
    

    <div class="banner-wrapper vh-md-100 layer-after app-shape">
        <div class="container">
            <div class="row">
                <div class="col-xxxl-7 col-xl-8 vh-md-100 pt-5 pt-sm-7 pb-2 pt-sm-7 align-items-center d-flex">
                    <div class="card w-100 border-0 bg-transparent">
                        
                        <h2 class="fw-700 text-grey-900 lh-3 display3-size display2-md-size lh-1 mb-0 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
                            Cuma Disini Kamu Diajarin<br>
                            <span class="text-current">Cara Bikin CV Terbaik</span><br>
                            Langsung Sama HRD
                        </h2>
                        
                        <div class="col-12 col-sm-8 px-0">
                            <div class="mb-0 mb-sm-4 h75 w-100 border-0 p-4 d-inline-block mt-4 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="500">
                                <h2 class="fw-700 font-sm-lg font-xsss text-grey-900 mt-1 typewriter">Konsultasi Dengan HRD, SEKARANG.!</h2>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xxxl-5 col-xl-4 vh-md-100 align-items-center d-flex home-phone">
                    <div class="card w-75 border-0 bg-transparent text-center d-block">
                        <img src="{{asset('asset/img/program/phone.png')}}" alt="app-bg" class="w-100 d-lg-block" >    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="feature-wrapper layer-after pb-lg--7 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-warning d-inline-block text-warning mr-1">Feedback</span>
                    <h2 class="text-grey-900 fw-700 display1-size font-md-xs pb-3 mb-0 mt-3 d-block lh-3">Makin Mahir Platform Terbaik Untuk Persiapan Kerja Kamu</h2>
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

                        <div class="col-lg-3 col-md-3 col-xss-6 text-center ">
                            <h2 class="display4-size display1-sm-size fw-700 open-font text-info mb-0">1 on 1</h2>
                            <h4 class="font-xsss text-grey-600 fw-500 mt-2">Bisa Konsultasi Private 1 on 1 langsung dengan HRD tersertifikasi BNSP</h4>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="feature-wrapper layer-after pb-lg--7 pb-5">
        <div class="row justify-content-center">
            <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-warning d-inline-block text-warning mr-1">Feedback</span>
                <h2 class="text-grey-900 fw-700 display1-size font-md-xs pb-3 mb-0 mt-3 d-block lh-3">Yang Kamu Dapatkan Di Makin Mahir</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4 w-100 border-0 pt-4 pb-4 pr-4 pl-7 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="500">
                        <i class="feather-layers text-success font-xl position-absolute left-15 ml-2"></i>
                        <h2 class="fw-700 font-xss text-grey-900 mt-1">Event Gratis</h2>
                        <p class="fw-500 font-xssss lh-24 text-grey-500 mb-0">Daftar Event Bersertifikat Dengan Pemateri Profesional di Dunia Kerja</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4 w-100 border-0 pt-4 pb-4 pr-4 pl-7 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="500">
                        <i class="feather-award text-danger font-xl position-absolute left-15 ml-2"></i>
                        <h2 class="fw-700 font-xss text-grey-900 mt-1">Kelas Online</h2>
                        <p class="fw-500 font-xssss lh-24 text-grey-500 mb-0">Kelas Online Dari Mulai Belajar Soft Skill Sampai Hardskill</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4 w-100 border-0 pt-4 pb-4 pr-4 pl-7 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="500">
                        <i class="feather-cpu text-info font-xl position-absolute left-15 ml-2"></i>
                        <h2 class="fw-700 font-xss text-grey-900 mt-1">Konsultasi HRD</h2>
                        <p class="fw-500 font-xssss lh-24 text-grey-500 mb-0">Konsultasi Langsung Dengan HRD Buat Bedah CV, Interview Kerja & Psikotes</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4 w-100 border-0 pt-4 pb-4 pr-4 pl-7 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="500">
                        <i class="feather-hard-drive text-warning font-xl position-absolute left-15 ml-2"></i>
                        <h2 class="fw-700 font-xss text-grey-900 mt-1">CV Maker</h2>
                        <p class="fw-500 font-xssss lh-24 text-grey-500 mb-0">Buat CV ATS Kamu Langsung Online, GRATIS</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4 w-100 border-0 pt-4 pb-4 pr-4 pl-7 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="500">
                        <i class="feather-lock text-secondary font-xl position-absolute left-15 ml-2"></i>
                        <h2 class="fw-700 font-xss text-grey-900 mt-1">CV Checker</h2>
                        <p class="fw-500 font-xssss lh-24 text-grey-500 mb-0">Cek Dulu CV Kamu Udah Menarik Belum di Mata HRD</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4 w-100 border-0 pt-4 pb-4 pr-4 pl-7 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="500" data-aos-duration="500">
                        <i class="feather-globe text-success font-xl position-absolute left-15 ml-2"></i>
                        <h2 class="fw-700 font-xss text-grey-900 mt-1">Assesment Test</h2>
                        <p class="fw-500 font-xssss lh-24 text-grey-500 mb-0">Ikuti Test Assesment Buat Tau Potensi, Minat dan Bakat Kamu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service-wrapper layer-after">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                    <h2 class="text-grey-900 fw-700 font-xxl pb-3 mb-0 mt-3 d-block lh-3">Tumbuh Bareng<br>Mahir Bareng</h2>
                    <p class="fw-300 font-xssss lh-28 text-grey-500">Inilah cara kami membantu Teman Cari Kerja untuk mempersiapkan diri memasuki dunia kerja</p>
                </div>
            </div>
        </div>
    </div>
   

    

@endsection