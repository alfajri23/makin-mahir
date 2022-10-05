@extends('layouts.public')
@section('content')

<div class="banner-wrapper py-5 position-relative">
  
      <div class="container">
          <div class="row mt-5 rounded-xl bg-lightblue">
              <div class="col-lg-4 order-lg-1 order-2 position-relative ">
                <div class="">
                  <img class="position-landing bottom-0" src="{{asset('asset/landing/mbak-2.png')}}" alt="">
                  <img class="landing-banner-2 bottom-0 ml-n5 ml-sm-5" style="width:70%" src="{{asset('asset/landing/mbak-1.png')}}" alt="">
                </div>
              </div>
              <div class="col-lg-8 order-lg-2 order-1 rounded-xl pb-5 px-4 pt-3">
                  <h2 class="fw-700 text-grey-900 font-xl lh-2 mb-3 pt-5 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">Jadilah Jobseekers yang Siap di Rekrut oleh Perusahaan Bersama Makin Mahir</h2>
                  <p class="fw-300 font-xss lh-28 text-grey-700 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">Persiapkan kariermu dengan mengikuti kelas konsultasi secara private membahas CV, Interview, Psikotest dan Karier Path </p>
                  <a href="" class="btn btn-primary fw-500 text-white font-xssss text-center d-inline-block rounded-sm">Lihat Selengkapnya</a>
              </div>
          </div>
      </div>
  
      <div class="spacer"></div>
      <div class="spacer"></div>
   
</div>

<div class="banner-wrapper py-5">
    <div class="container">
        <h2 class="text-grey-900 text-center mb-5 fw-700 font-lg">Konsultasi</h2>
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
              <img class="w-100" src="{{asset('asset/landing/step-konsultasi-1.png')}}" alt="">
            </div>
  
            <div class="col-6 col-md-4 my-2">
              <img class="w-100" src="{{asset('asset/landing/step-konsultasi-2.png')}}" alt="">
            </div>
  
            <div class="col-6 col-md-4 my-2">
              <img class="w-100" src="{{asset('asset/landing/step-konsultasi-3.png')}}" alt="">
            </div>
  
            <div class="col-6 col-md-4 my-2">
              <img class="w-100" src="{{asset('asset/landing/step-konsultasi-4.png')}}" alt="">
            </div>
  
            <div class="col-6 col-md-4 my-2">
              <img class="w-100" src="{{asset('asset/landing/step-konsultasi-5.png')}}" alt="">
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

        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div id="accordion" class="accordion">
                  <div class="card border-0 mb-0">
                    <div class="card-header border-bottom mb-0" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          Apa itu kelas konsultasi private ?
                        </button>
                      </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <p>Kelas yang dilakukan secara private dengan sistem 1 on 1, mempertemukan antara jobseekers dengan mentor profesional, membahas topik dan melakukan praktik menyesuaikan dengan kebutuhan jobseekers</p>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 mb-0">
                    <div class="card-header border-bottom mb-0" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Bagaimana cara mendaftar kelas konsultasi private ?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        <p>Anda bisa melakukan transaksi melalui platform website yang mana sudah disediakan varian produk. Agar anda bisa melakukan transaksi, harus membuat akun terlebih dahulu kemudian pilih produk yang Anda inginkan, lakukan pembelian dan transaksi.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 mb-0">
                    <div class="card-header border-bottom mb-0" id="headingFour">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Apakah bisa memilih sendiri jadwal kelas konsultasi private ?
                        </button>
                      </h5>
                    </div>

                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                      <div class="card-body">
                        <p>Untuk melakukan penjadwalan kelas dengan menyesuaikan waktu Anda, terlebih dahulu harus konfirmasi ke Admin agar bisa di tindaklanjuti. Jadwal kelas selalu dibuka setiap hari senin s.d jum’at pukul 09.00 s.d 15.30 WIB</p>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 mb-0">
                    <div class="card-header border-bottom mb-0" id="headingFive">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          Bagaimana alur pelaksanaan kelas ?
                        </button>
                      </h5>
                    </div>

                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                      <div class="card-body">
                        <p>Setelah melakukan transaksi, anda akan langsung dihubungi oleh Admin. Kemudian melakukan negosiasi jadwal. Setelah itu Anda bisa memberikan akses CV kepada admin untuk melakukan kelas konsultasi.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 mb-0">
                    <div class="card-header border-bottom mb-0" id="headingSix">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                          Apa benefit yang bisa saya dapatkan setelah ikut konsultasi ?
                        </button>
                      </h5>
                    </div>

                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                      <div class="card-body">
                        <p>Anda akan mendapatkan berbagai manfaat sesuai dengan produk yang anda pilih, namun secara umum benefit yang kami hadirkan ada berbagai macam : knowledge, template cv, template cover letter, buku panduan persiapan kerja, jawaban interview, jaminan dicarikan kerja sampai dapat kerja</p>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 mb-0">
                    <div class="card-header border-bottom mb-0" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Siapakah mentor dalam kelas konsultasi private ?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                        <p>Mentor kelas konsultasi private di makin mahir merupakan mentor profesional yang sudah tersertifikasi BNSP dan memiliki pengalaman 5 tahun lebih dalam bidangnya.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 mb-0">
                    <div class="card-header border-bottom mb-0" id="heading-6">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Apa saja materi dalam kelas konsultasi ?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="heading-6" data-parent="#accordion">
                      <div class="card-body">
                        <p>Materi yang di bahas pada pelaksanaan kelas seputar pembuatan CV, cara menjawab interview, psikotes dan persoalan karier path.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 mb-0">
                    <div class="card-header border-bottom mb-0" id="heading-7">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Metode apa yang dipakai dalam kelas konsultasi ?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="heading-7" data-parent="#accordion">
                      <div class="card-body">
                        <p>Pembelajaran dua arah, dengan fokus pada permasalahan yang dialami oleh jobseekers. 
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 mb-0">
                    <div class="card-header border-bottom mb-0" id="heading-7">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Berapa yang harus saya persiapan untuk membeli kelas  ?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="heading-7" data-parent="#accordion">
                      <div class="card-body">
                        <p>Kelas konsultasi ini kami siapkan dengan menyesuaikan kondisi jobseekers. Anda bisa memilih kelas konsultasi mulai di angka 20ribuan  dengan menyesuaikan kebutuhan Anda.
                        </p>
                      </div>
                    </div>
                  </div>
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