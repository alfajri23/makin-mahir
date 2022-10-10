@extends('layouts.public')
@section('content')

@push('styles')
    <style>
        .bg-lightgreens{
          background-color: #DEF2CD;
        }

    </style>

@endpush

<div class="banner-wrapper py-5 position-relative">

    <div class="spacer-md"></div>

    <div class="container">
        <div class="row mt-5 rounded-xl bg-lightgreens">
            <div class="col-lg-4 order-lg-1 order-2 position-relative ">
              <div class="">
                <img class="position-landing bottom-0" src="{{asset('asset/landing/events.png')}}" alt="">
              </div>
            </div>
            <div class="col-lg-8 order-lg-2 order-1 rounded-xl pb-5 pl-5">
                <h2 class="fw-700 text-grey-900 font-xl lh-2 mb-3 pt-5 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">Temukan ruang persiapan kariermu di berbagai Event Bedah Dunia Kerja</h2>
                <p class="fw-300 font-xss lh-28 text-grey-700 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">Kami menghadirkan berbagai event bedah dunia kerja rutin setiap bulan. Mempermudah proses Anda untuk diterima kerja dengan didampingi narasumber profesional
                </p>
                <a href="" class="btn btn-dark fw-500 text-white font-xssss text-center d-inline-block rounded-sm">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
 
</div>

<div class="banner-wrapper pb-5">
    <div class="container">
        <h2 class="text-grey-900 text-center mb-5 fw-700 font-lg">Event</h2>
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
            <img class="w-100" src="{{asset('asset/landing/step-event-1.png')}}" alt="">
          </div>

          <div class="col-6 col-md-4 my-2">
            <img class="w-100" src="{{asset('asset/landing/step-event-2.png')}}" alt="">
          </div>

          <div class="col-6 col-md-4 my-2">
            <img class="w-100" src="{{asset('asset/landing/step-event-3.png')}}" alt="">
          </div>

          <div class="col-6 col-md-4 my-2">
            <img class="w-100" src="{{asset('asset/landing/step-event-4.png')}}" alt="">
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
                'pertanyaan' => 'Apa saja event bedah dunia kerja di makin mahir?        ',
                'jawaban' => 'Event bedah dunia kerja di makin mahir merupakan event yang dilaksanakan rutin setiap bulan. Membahas soal permasalahan teknis yang sering dialami oleh freshgraduate, jobseekers pada umumnya yang sedang melamar kerja.'
            ],
            [
                'pertanyaan' => 'Bagaimana cara mendaftar event ?',
                'jawaban' => 'Anda bisa melakukan pendaftaran melalui platform website yang mana sudah berbagai event bedah dunia kerja. Agar anda bisa melakukan pendaftaran, harus membuat akun terlebih dahulu kemudian pilih event yang Anda inginkan, lakukan pendaftaran.'
            ],
            [
                'pertanyaan' => 'Bagaimana alur pelaksanaan event bedah dunia kerja ?',
                'jawaban' => 'Setelah melakukan pendaftaran, biasanya anda akan di arahkan untuk bergabung di wa group untuk melakukan komunikasi terkait pelaksanaan event.'
            ],
            [
                'pertanyaan' => 'Apa benefit yang bisa saya dapatkan setelah ikut event?',
                'jawaban' => 'Anda akan mendapatkan berbagai manfaat sesuai dengan permasalahan yang anda alami, namun secara umum benefit yang kami hadirkan ada berbagai macam : knowledge, template cv, template cover letter, buku panduan persiapan kerja, jawaban interview, jaminan dicarikan kerja sampai dapat kerja'
            ],
            [
                'pertanyaan' => 'Siapakah narasumber dalam event ?',
                'jawaban' => 'Narasumber di event bedah dunia kerja merupakan mentor profesional yang sudah tersertifikasi BNSP dan memiliki pengalaman 5 tahun lebih dalam bidangnya. Dan juga diambil dari berbagai industri besar di Indonesia.'
            ],
            [
                'pertanyaan' => 'Apa saja materi dalam event bedah dunia kerja ?',
                'jawaban' => 'Materi yang di bahas pada pelaksanaan kelas seputar pembuatan CV, cara menjawab interview, psikotes dan persoalan karier path.'
            ],
            [
                'pertanyaan' => 'Metode apa yang dipakai dalamevent bedah dunia kerja?',
                'jawaban' => 'Pembelajaran dua arah, dengan fokus pada permasalahan yang dialami oleh jobseekers.'
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