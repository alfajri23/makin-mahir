@extends('layouts.member')

@section('content')
<div class="spacer"></div>
<div class="container-fluid mx-auto">
    <div class="row justify-content-center pb-3" style="padding-top: 70px; background: aliceblue;">
        <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-3">
            <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-success d-inline-block text-success mr-1">Hello</span>
            <h2 class="text-grey-900 fw-700 font-xxl pb-3 mb-0 mt-3 d-block lh-3">Selamat Datang Feri</h2>
            <h2 class="text-grey-900 fw-400 font-xl pb-3 mb-0 d-block lh-3">Mau upgrade diri apa hari ini ?</h2>
        </div>
    </div>

    <div class="container py-5 my-5">
        <div class="row justify-content-center">
            <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-3">
                <h2 class="text-grey-900 fw-700 font-lg pb-3 mb-0 mt-3 d-block lh-3">Fakta pencari kerja</h2>
            </div>
        </div>
        <div class="row justify-content-center">
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
        </div>
        
    </div>

    {{-- @include('component.produk.produk_list') --}}
</div>
    
@endsection