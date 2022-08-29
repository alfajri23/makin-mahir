@extends('layouts.public')

@section('content')

<div class="banner-wrapper bg-lightblue pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center pt-lg--10 pt-7">
                <h2 class="fw-700 text-grey-900 display4-size display4-xs-size lh-1 mb-3 pt-5 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">Assesment</h2>
                <p class="fw-300 font-xss lh-28 text-grey-700 pl-lg--5 pr-lg--5 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">Ikuti Test Assesment Buat Tau Potensi, Minat dan Bakat Kamu</p>
            </div>
        </div>
    </div>

    <div class="spacer"></div>
</div>

<div class="banner-wrapper bg-lightblue pb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-12 mb-3">
                <div class="card w-100 p-5 rounded-xxl border-0" style="background: #faece3;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="fw-700 text-grey-700 font-lg lh-3 mb-3">Pahami Kepribadian</h2>
                        </div>
                        <div class="col-lg-12">
                            <p class="fw-400 font-xss lh-28 text-grey-600">Ambil tesnya dan dapatkan salah satu gambaran kepribadianmu dari 16 kepribadian dalam Tes MBTI (Tes Kepribadian paling populer saat ini).</p>
                        </div>
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-info fw-600 text-white font-xssss w100 text-center rounded-xl mt-1 p-2" data-toggle="modal" data-target="#mbtiModal">
                                Ikuti test
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-sm-6 col-12 mb-0 mb-sm-5">
                <div class="card w-100 p-5 rounded-xxl border-0" style="background: #8bd2db;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="fw-700 text-grey-700 font-lg lh-3 mb-3">Kenali Minatmu</h2>
                        </div>
                        <div class="col-lg-12">
                            <p class="fw-400 font-xss lh-28 text-grey-800">Ambil tesnya dan dapatkan analisa minat serta keinginan agar kamu bisa merencanakan karir sesuai passionmu</p>
                        </div>
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-info fw-600 text-white font-xssss w100 text-center rounded-xl mt-1 p-2" data-toggle="modal" data-target="#riasecModal">
                                Ikuti test
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->

  
<!-- Modal MBTI -->
<div class="modal fade" id="mbtiModal" tabindex="-1" aria-labelledby="mbtiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-lg-12 text-center">
                    <h2 class="fw-700 text-grey-700 display1-size display1-md-size lh-3 mb-3">Pahami Kepribadianmu</h2>
                    <div>
                        <span class="badge badge-primary p-1 px-2">44 Soal</span>
                        <span class="badge badge-secondary p-1 px-2">20 Menit</span>
                    </div>
                </div>
                <div class="col-lg-12 ">
                    <p class="fw-600 font-xs lh-28 text-grey-800">Tentang Assessment</p>
                    <p class="fw-400 font-xss lh-28 text-grey-800">
                        Myers-Briggs Type Indicator (MBTI) adalah psikotes yang dirancang untuk mengukur preferensi 
                        psikologis seseorang dalam melihat dunia dan membuat keputusan. Psikotes ini dirancang untuk
                         mengukur kecerdasan individu, bakat, dan tipe kepribadian seseorang. Tujuan dari MBTI 
                         adalah untuk mengetahui karakter kepribadian karyawan perusahaan agar dapat ditempatkan 
                         pada bidang-bidang yang membuat potensi karyawan tersebut optimal.
                    </p>
                </div>
                <div class="col-lg-12 ">
                    <p class="fw-600 font-xs lh-28 text-grey-800">Petunjuk</p>
                    <div class="fw-400 font-xss lh-28 text-grey-800">
                        <ol>
                            <li>1. Tes ini terdiri dari 4 bagian, masing-masing bagian berjumlah 15 pertanyaan.</li>
                            <li>2. Masing-masing pertanyaan terdapat 2 pilihan jawaban, pilihlah yang paling sesuai dengan karaktermu.</li>
                            <li>3. Jawablah semua pertanyaan dengan jujur karena akan menggambarkan karakter kamu yang sebenarnya.</li>
                            <li>4. Tidak ada jawaban benar dan salah pada semua pertanyaan yang diajukan pada tes ini.</li>
                            <li>5. Carilah waktu, tempat yang nyaman dan kondisi pikiran yang tenang sebelum mengambil tes ini.</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-12 text-center mt-md-4 mb-3">
                    <a href="{{route('mbtiTest')}}" class="btn btn-lg bg-warning fw-600 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1">Mulai tes</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal RIasec -->
<div class="modal fade" id="riasecModal" tabindex="-1" aria-labelledby="riasecModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-lg-12 text-center">
                    <h2 class="fw-700 text-grey-700 display1-size display1-md-size lh-3 mb-3">Kenali Minatmu</h2>
                    <div>
                        <span class="badge badge-primary p-1 px-2">44 Soal</span>
                        <span class="badge badge-secondary p-1 px-2">20 Menit</span>
                    </div>
                </div>
                <div class="col-lg-12 ">
                    <p class="fw-600 font-xs lh-28 text-grey-800">Tentang Assessment</p>
                    <p class="fw-400 font-xss lh-28 text-grey-800">
                        Tes RIASEC merupakan salah satu jenis tes psikologi yang bertujuan untuk membantu kamu 
                        memperkirakan karier yang sesuai dengan diri. Tes ini diberikan oleh psikolog
                         ketika seseorang sedang kebingungan, apa passionnya sebenarnya, apa 
                         pekerjaan yang cocok, atau ketika sedang merasa tidak nyaman dengan 
                         pekerjaan sekarang. Tujuan tes ini adalah untuk mengetahui minat seseorang 
                         agar dapat menentukan karir sesuai passionnya.
                    </p>
                </div>
                <div class="col-lg-12 ">
                    <p class="fw-600 font-xs lh-28 text-grey-800">Petunjuk</p>
                    <div class="fw-400 font-xss lh-28 text-grey-800">
                        <ol>
                            <li>1. Tes ini terdiri dari 42 soal, normalnya dapat diselesaikan dalam 5-10 menit.</li>
                            <li>2. Masing-masing pertanyaan terdapat 4 pilihan jawaban, pilihlah yang paling sesuai dengan karaktermu.</li>
                            <li>3. Jawablah semua pertanyaan dengan jujur karena akan menggambarkan karakter kamu yang sebenarnya</li>
                            <li>4. Tidak ada jawaban benar dan salah pada semua pertanyaan yang diajukan pada tes ini.</li>
                            <li>5. Carilah waktu, tempat yang nyaman dan kondisi pikiran yang tenang sebelum mengambil tes ini.</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-12 text-center mt-md-4 mb-3">
                    <a href="{{route('riasecTest')}}" class="btn btn-lg bg-warning fw-600 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1">Mulai tes</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection