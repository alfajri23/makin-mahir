@extends('layouts.member')

<style>
    .hover:hover{
        background-color:#dcecf2;

    }
</style>

@section('content')
<div class="spacer"></div>
<div class="container-fluid mx-auto">
    <div class="row justify-content-center pb-3" style="padding-top: 70px; background: aliceblue;">
        <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-3">
            <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-success d-inline-block text-success mr-1">Hello</span>
            <h2 class="text-grey-900 fw-700 font-xxl pb-3 mb-0 mt-3 d-block lh-3">Selamat Datang {{auth()->user()->nama}}</h2>
            <h2 class="text-grey-900 fw-400 font-xl pb-3 mb-0 d-block lh-3">Mau upgrade diri apa hari ini ?</h2>
        </div>
    </div>

    <div class="container py-5 my-5">
        <div class="row justify-content-center">
            <div class="page-title style1 col-xl-8 col-lg-8 col-md-10 text-center mb-3">
                <h2 class="text-grey-900 fw-700 font-lg pb-3 mb-0 mt-3 d-block lh-3">Temukan Solusi Cepat Keterima Kerja</h2>
                <p class="fw-300 font-xss lh-28 fw-500 text-grey-600">Perlu Kirim 20 CV Lamaran Kerja <br>
                    Buat Dapat 1 Panggilan Interview. <br>
                    Dengan Catatan CV Kamu Sudah Menarik Di Mata HRD</p>
            </div>
        </div>
        {{-- <div class="row justify-content-center">
            <div class="col-lg-3 p-4 text-center arrow-right">
                <span class="btn-round-xxxl alert-primary text-primary display1-size open-font fw-900">1</span>
                <h2 class="fw-700 font-xss text-grey-900 mt-4">Perusahaan Mencari Kandidat Lewat Job Fair</h2>
            </div>
            <div class="col-lg-3 p-4 text-center arrow-right">
                <span class="btn-round-xxxl alert-danger text-danger display1-size open-font fw-900">2</span>
                <h2 class="fw-700 font-xss text-grey-900 mt-4">CV Berguna Untuk Menarik Perhatian Perusahaan</h2>
            </div>
            <div class="col-lg-3 p-4 text-center arrow-right">
                <span class="btn-round-xxxl alert-success text-success display1-size open-font fw-900">3</span>
                <h2 class="fw-700 font-xss text-grey-900 mt-4">Mencari Lowongan Kerja Secara Online</h2>
            </div>
            <div class="col-lg-3 p-4 text-center">
                <span class="btn-round-xxxl alert-warning text-warning display1-size open-font fw-900">4</span>
                <h2 class="fw-700 font-xss text-grey-900 mt-4">Ada Ratusan Orang Mendaftar Posisi yang Sama</h2>
            </div>
        </div> --}}
        <div class="row align-items-stretch">
            <div class="col-lg-4 col-md-6">
                <a href="{{route('memberProdukDetail',18)}}" class="hover card w-100 h-100 border-0 p-4 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="500">
                    <i class="feather-file text-whatsup display4-size mb-3 mx-auto"></i>
                    <h2 class="fw-700 font-xs text-grey-700 mt-1">Bedah CV Bareng HRD</h2>
                    <p class="fw-500 font-xssss lh-24 text-grey-600 mb-0">Cek Dulu CV Kamu Udah Menarik Belum Dimata HRD</p>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{route('produkListKelas')}}" class="hover card w-100 h-100 border-0 p-4 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="500">
                    <i class="feather-book text-instagram display4-size mb-3 mx-auto"></i>
                    <h2 class="fw-700 font-xs text-grey-700 mt-1">Belajar Dikelas Online Makin Mahir</h2>
                    <p class="fw-500 font-xssss lh-24 text-grey-600 mb-0">Belajar Skill Yang Pasti Dibutuhkan Didunia Kerja.</p>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{route('memberProdukDetail',25)}}" class="hover card w-100 h-100 border-0 p-4 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="500">
                    <i class="fas fa-headset text-linkedin display4-size mb-3 mx-auto"></i>
                    <h2 class="fw-700 font-xs text-grey-700 mt-1">Latihan Interview Langsung Dengan HRD</h2>
                    <p class="fw-500 font-xssss lh-24 text-grey-600 mb-0">Jangan Sampai Gagal Dapat Kerja, Karena Kamu Nggak Paham Cara Jawab Pertanyaan Interview, Latihan Sekarang.!</p>
                </a>
            </div>

        </div>
        
    </div>

</div>
    
@endsection