@extends('layouts.public')
@section('content')

@push('styles')
    <style>
        .bg-lightpurple{
          background-color: #DEC9DB;
        }

    </style>

@endpush


<div class="banner-wrapper py-5 position-relative">

  <div class="spacer-md"></div>
    
  <div class="container">
      <div class="row mt-5 rounded-xl bg-lightpurple">
        <div class="col-lg-4 order-lg-1 order-2 position-relative ">
          <div class="">
            <img class="position-landing bottom-0" src="{{asset('asset/landing/events.png')}}" alt="">
          </div>
        </div>
        <div class="col-lg-8 order-lg-2 order-1 rounded-xl pb-5 pl-5">
              <h2 class="fw-700 text-grey-900 font-xl lh-2 mb-3 pt-5 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">Upgrade CV sesuai dengan kebutuhanmu bersama Makin Mahir</h2>
              <p class="fw-300 font-xss lh-28 text-grey-700 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">Makin Mahir menghadirkan ribuan template CV Profesional yang bisa di customize sesuai dengan keinginan dan kebutuhan Anda.</p>
              <a href="" class="btn btn-dark fw-500 text-white font-xssss text-center d-inline-block rounded-sm">Lihat Selengkapnya</a>
          </div>
      </div>
  </div>

  
</div>

<div class="banner-wrapper pb-5">
    <div class="container">
        <h2 class="text-grey-900 text-center mb-5 fw-700 font-lg">Template</h2>
        <div class="row">
            @include('component.produk.produk_card')
        </div>
    </div>
</div>

{{-- Alur --}}
<div class="banner-wrapper bg-lightblue py-5">
    <div class="container">
        <h2 class="text-grey-900 text-center mb-5 fw-700 font-lg">Alur Pendaftaran</h2>
        <div class="row">
            
            <div class="col-6 col-md-4 my-2">
              <img class="w-100" src="{{asset('asset/landing/step-template-1.png')}}" alt="">
            </div>
  
            <div class="col-6 col-md-4 my-2">
              <img class="w-100" src="{{asset('asset/landing/step-template-2.png')}}" alt="">
            </div>
  
            <div class="col-6 col-md-4 my-2">
              <img class="w-100" src="{{asset('asset/landing/step-template-3.png')}}" alt="">
            </div>
  
            <div class="col-6 col-md-4 my-2">
              <img class="w-100" src="{{asset('asset/landing/step-template-4.png')}}" alt="">
            </div>
  
            <div class="col-6 col-md-4 my-2">
              <img class="w-100" src="{{asset('asset/landing/step-template-5.png')}}" alt="">
            </div>
        </div>
    </div>
</div>

{{-- FAQ --}}
<div class="how-to-work pb-lg--7 pt-5 pb-5 pt-lg--7">
    <div class="container">
        <div class="row justify-content-center">
            <div class="page-title style1 col-xl-6 col-lg-10 col-md-10 text-center mb-5">
                <h2 class="text-grey-900 fw-700 font-lg pb-3 mb-0 d-block mt-3">Frequently Asked Question</h2>
                
            </div>
        </div>

        @php
          $dataFaq = [
            [
                'pertanyaan' => 'Apa jenis template cv yang saya dapatkan?',
                'jawaban' => 'Kamu akan mendapatkan CV profesional dengan jenis ATS dan Kreatif yang bisa disesuaikan dengan kebutuhan'
            ],
            [
                'pertanyaan' => 'Bagaimana cara melakukan pembelian template ?',
                'jawaban' => 'Anda bisa melakukan pembelian melalui platform website. Agar anda bisa melakukan pembelian, harus membuat akun terlebih dahulu kemudian pilih template sesuai dengan kebutuhan.'
            ],
            [
                'pertanyaan' => 'Bagaimana alur pengiriman template CV ?',
                'jawaban' => 'Setelah melakukan pembelian, admin akan menghubungi kamu dan melakukan konfirmasi ulang, kemudian template akan segera dikirim melalui email.'
            ],
            [
                'pertanyaan' => 'Apa benefit yang bisa saya dapatkan setelah membeli template CV?',
                'jawaban' => 'Anda akan mendapatkan CV dengan kualitas high dan profesional yang sudah menjadi rujukan HRD'
            ],
            [
                'pertanyaan' => 'Berapa lama saya menunggu template dikirimkan?',
                'jawaban' => 'Template CV akan segera dikirimkan dalam waktu 1x24 jam setelah melakukan pembelian'
            ],
        ];
        @endphp

        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div id="accordion" class="accordion">
                  @foreach($dataFaq as $data)
                  <div class="card border-0 mb-0">
                    <div class="card-header {{!$loop->first ? 'border-top' : ''}} mb-0" id="heading-{{$loop->iteration}}">
                      <h5 class="mb-0">
                        <i class="far fa-question-circle fa-lg mr-2"></i>
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-{{$loop->iteration}}" aria-expanded="false" aria-controls="collapse-{{$loop->iteration}}">
                          {{$data['pertanyaan']}}
                        </button>
                      </h5>
                    </div>

                    <div id="collapse-{{$loop->iteration}}" class="collapse" aria-labelledby="heading-{{$loop->iteration}}" data-parent="#accordion">
                      <div class="card-body pt-0">
                        <p>{{$data['jawaban']}}</p>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
            </div>
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

