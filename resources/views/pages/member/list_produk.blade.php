@extends('layouts.member')

@section('content')

<div class="container">
    <div class="spacer"></div>
    <div class="row justify-content-center">
        <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center mb-5">
            <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">layanan</h2>
            <p class="fw-300 font-xs lh-28 text-grey-500">Daftar produk kami</p>
        </div>
    </div>
</div>

@php
    $data = $konsul;
    $title = 'layanan konsultasi';
    $tipe = 'konsultasi';
@endphp
@include('component.produk.produk_carousel')

@php
    $data = $video;
    $title = 'kelas';
    $tipe = 'video';
@endphp
@include('component.produk.produk_carousel')

@php
    $data = $webinar;
    $title = 'webinar';
    $tipe = 'webinar';
@endphp
@include('component.produk.produk_carousel')

@php
    $data = $beduk;
    $title = 'beduk';
    $tipe = 'beduk';
@endphp
@include('component.produk.produk_carousel')



    
@endsection