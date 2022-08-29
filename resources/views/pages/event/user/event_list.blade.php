@extends('layouts.public')
@section('content')

<div class="banner-wrapper bg-lightblue pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center pt-lg--10 pt-7">
                <h2 class="fw-700 text-grey-900 display4-size display4-xs-size lh-1 mb-3 pt-5 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">Event kami</h2>
                <p class="fw-300 font-xss lh-28 text-grey-700 pl-lg--5 pr-lg--5 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">Daftar Event Bersertifikat Dengan Pemateri Profesional di Dunia Kerja</p>
            </div>
        </div>
    </div>

    <div class="spacer"></div>

   
</div>

<div class="banner-wrapper bg-lightblue pb-5">
    <div class="container">
        <div class="row">
            @include('component.produk.produk_card')
        </div>
    </div>
</div>

<div class="feedback-wrapper pt-lg--7 pb-lg--7 pb-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-left mb-5 pb-0">

                <h2 class="text-grey-800 fw-700 font-xl lh-2">Testimoni</h2>
            </div>
        
            <div class="col-lg-12">
                @include('component.testimoni.testimoni_card_1')
            </div>
        </div>
    </div>
</div>


@endsection