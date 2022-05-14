@extends('layouts.public')

@section('content')

<style>
    .nav-link{
        color: white !important
    }

    .card{
        min-height: 350px;
    }
</style>
    

    <div class="banner-wrapper bg-image-cover bg-image-bottomcenter" style="background-image: url({{asset('asset/img/program/background.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 vh-lg--100 align-items-center d-flex sm-mt-7">
                    <div class="card w-100 border-0 bg-transparent d-block sm-mt-7">
                        <h2 class="fw-700 text-warning display4-size display4-lg-size display4-md-size lh-1 mb-0 os-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">Ecosystem Platform For Career Preparation</h2>
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-grey-500 mt-3 os-init" data-aos="fade-up" data-aos-delay="400" data-aos-duration="400">Siapkan & pastikan dirimu menjadi jobseeker yang Paling Siap Kerja & Dibutuhkan oleh perusahaan</h4>
                        <a href="#produks" class="btn border-0 w200 bg-primary p-3 text-white fw-600 rounded-lg d-inline-block font-xssss btn-light mt-1 os-init" data-aos="fade-up" data-aos-delay="500" data-aos-duration="400">Jelajahi</a>
                    </div>
                </div>
                <div class="col-lg-6 align-items-center d-flex vh-lg--100 ">
                    <img src="{{asset('asset/img/program/foto.png')}}" alt="icon" class="pt-5 d-none d-lg-block" style="height: 100%">
                </div>
            </div>
        </div>
    </div>

    {{-- why us ? --}}
    <div class="feature-wrapper py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-3">
                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-success d-inline-block text-success mr-1">Why Us</span>
                    <h2 class="text-grey-900 fw-700 font-xxl pb-3 mb-0 mt-3 d-block lh-3">Kenapa memilih kami</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 p-4 text-center arrow-right">
                    <span class="btn-round-xxxl alert-primary text-primary display1-size open-font fw-900">1</span>
                    <h2 class="fw-700 font-xss text-grey-900 mt-4">Terpercaya</h2>
                    <p class="fw-500 font-xssss lh-24 text-grey-500 mb-0">Praesent porttitor nunc vitae lacus vehicula, nec mollis eros congue.</p>
                </div>
                <div class="col-lg-3 p-4 text-center arrow-right">
                    <span class="btn-round-xxxl alert-danger text-danger display1-size open-font fw-900">2</span>
                    <h2 class="fw-700 font-xss text-grey-900 mt-4">Berintegritas</h2>
                    <p class="fw-500 font-xssss lh-24 text-grey-500 mb-0">Praesent porttitor nunc vitae lacus vehicula, nec mollis eros congue.</p>
                </div>
                <div class="col-lg-3 p-4 text-center arrow-right">
                    <span class="btn-round-xxxl alert-success text-success display1-size open-font fw-900">3</span>
                    <h2 class="fw-700 font-xss text-grey-900 mt-4">Pengalaman</h2>
                    <p class="fw-500 font-xssss lh-24 text-grey-500 mb-0">Praesent porttitor nunc vitae lacus vehicula, nec mollis eros congue.</p>
                </div>
                <div class="col-lg-3 p-4 text-center">
                    <span class="btn-round-xxxl alert-warning text-warning display1-size open-font fw-900">4</span>
                    <h2 class="fw-700 font-xss text-grey-900 mt-4">Terjangkau</h2>
                    <p class="fw-500 font-xssss lh-24 text-grey-500 mb-0">Praesent porttitor nunc vitae lacus vehicula, nec mollis eros congue.</p>
                </div>
            </div>
            
        </div>
    </div>

    {{-- Event --}}
    <div class="brand-wrapper pt-5 pb-7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center mb-5">
                    <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Event</h2>
                </div>  
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none">
                        {{-- items loop --}}
                        @forelse ($event as $env)
                        <div class="item">
                            <div class="card w300 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                                <div class="card-image w-100 mb-3">
                                    <a class="video-bttn position-relative d-block">
                                        <img src="{{asset($env->poster)}}" alt="image" class="w-100">
                                    </a>
                                </div>
                                <div class="card-body pt-0">
                                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-success d-inline-block text-success mr-1">{{$env->tipe}}</span>
                                    <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss"></span> {{$env->harga == 0 ? 'Gratis' : 'Rp.'.number_format($env->harga) }}</span>
                                    <h4 class="fw-700 font-xss mt-3 lh-20 mt-0">
                                        <a href="{{route('memberProdukDetail',$env->produk->id)}}" class="text-dark text-grey-900">{{$env->judul}}</a>
                                    </h4>  
                                </div>
                            </div>
                        </div>
                            
                        @empty
                            
                        @endforelse
                        {{-- end items loop --}}
                    </div>

                </div>
                <div class="col-10 col-sm-3 mx-auto">
                    <a href="{{route('produkListEvent')}}" class="btn btn-block border-0 w-100 text-dark p-3 fw-600 rounded-lg d-inline-block font-xssss btn-light">Kelas selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Konsultasi --}}
    <div class="brand-wrapper pt-5 pb-7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center mb-5">
                    <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Layanan konsultasi</h2>
                </div>  
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="mx-auto owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none">
                        {{-- items loop --}}
                        @forelse ($konsuls as $env)
                        <div class="item">
                            <div class="w280 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                                <div class="card-body pt-0">
                                    <div class="font-xsss fw-500 mt-3 text-success"><span class="font-xsssss"></span> {{$env->harga == 0 ? 'Gratis' : 'Rp.'.number_format($env->harga) }}</div>
                                    <h4 class="fw-700 font-xss lh-28 mt-0">
                                        <a href="{{route('produkListDetailKonsul',$env->id)}}" class="text-dark text-grey-900">{{$env->nama}}</a>
                                    </h4>  
                                </div>
                            </div>
                        </div>
                            
                        @empty
                            
                        @endforelse
                        {{-- end items loop --}}
                    </div>

                </div>
                <div class="col-10 col-sm-3 mx-auto">
                    <a href="{{route('produkListKonsul')}}" class="btn btn-block border-0 w-100 text-dark p-3 fw-600 rounded-lg d-inline-block font-xssss btn-light">Kelas selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

     {{-- Video --}}
     <div class="brand-wrapper pt-5 pb-7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center mb-5">
                    <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Kelas Online</h2>
                </div>  
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none">
                        {{-- items loop --}}
                        @forelse ($kelas as $env)
                        <div class="item">
                            <div class="card w300 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                                <div class="card-image w-100 mb-3">
                                    <a class="video-bttn position-relative d-block">
                                        <img src="{{asset($env->poster)}}" alt="image" class="w-100">
                                    </a>
                                </div>
                                <div class="card-body pt-0">
                                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-success d-inline-block text-success mr-1">{{$env->tipe}}</span>
                                    <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss"></span> {{$env->harga == 0 ? 'Gratis' : 'Rp.'.number_format($env->harga) }}</span>
                                    <h4 class="fw-700 font-xss mt-3 lh-28 mt-0">
                                        <a href="{{route('memberProdukDetail',$env->produk->id)}}" class="text-dark text-grey-900">{{$env->judul}}</a>
                                    </h4>  
                                </div>
                            </div>
                        </div>
                            
                        @empty
                            
                        @endforelse
                        {{-- end items loop --}}
                    </div>
                </div>
                <div class="col-10 col-sm-3 mx-auto">
                    <a href="{{route('produkListKelas')}}" class="btn btn-block border-0 w-100 text-dark p-3 fw-600 rounded-lg d-inline-block font-xssss btn-light">Kelas selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Testimoni --}}
    <div class="feature-wrapper pt-lg--7 pt-7 bg-aliceblue">
        <div class="container">

            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center mb-5">
                    <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Testimoni</h2>
                    <p class="fw-300 font-xsss lh-28 text-grey-500">Mereka sudah percaya kepada kami</p>
                </div>  
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="banner-slider owl-carousel owl-theme owl-nav-link dot-style3 text-left-dot rounded-lg overflow-visible nav-none">
                        <div class="owl-items text-center" >
                            <span class="btn-round-xxxl bg-warning mb-4"><i class="ti-quote-right display1-size text-white"></i></span>
                            <h4 class="fw-500 lh-5 font-xss mb-3 text-grey-700">
                                "Jadi karena ngikutin Kelas Bedah CV ini, aku jadi lebih tau mana yang harus aku masukin ke CV, mana yang enggak. Jadi bikin CV aku lebih ATS Friendly. Nah, walaupun ini berbayar, tapi menurut aku tuh ini worth it banget, kalian ga bakal nyesel gitu loh"
                            </h4>
                            
                            <div class="clearfix"></div>
                            <div class="card-body pl-0 pt-0 mt-4 mb-5 pb-4 d-block">
                                <img src="https://via.placeholder.com/30x30.png" alt="user" class="w45 mr-auto ml-auto mb-3">
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Goria Coast</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-500">Digital Marketing Executive</h5>
                            </div>

                        </div>

                        <div class="owl-items text-center" >
                            <span class="btn-round-xxxl bg-twiiter mb-4"><i class="ti-twitter-alt font-xl text-white"></i></span>
                            <h4 class="fw-500 lh-5 font-xss mb-3 text-grey-700">"Membantu, ngebantu banget. Kaya lebih kebuka aja, mungkin beda gitu loh. Sekarang rekruter lebih tertarik yang jenisnya kaya apa dibandingkan dengan CV aku yang gak seberapa, lebih spesifik nih keahliannya apa."</h4>
                            
                            <div class="clearfix"></div>
                            <div class="card-body pl-0 pt-0 mt-4 mb-5 pb-4 d-block">
                                <img src="https://via.placeholder.com/30x30.png" alt="user" class="w45 mr-auto ml-auto mb-3">
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Goria Coast</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-500">Digital Marketing Executive</h5>
                            </div>

                        </div>

                        <div class="owl-items text-center" >
                            <span class="btn-round-xxxl bg-danger mb-4"><i class="feather-slack font-xl text-white"></i></span>
                            <h4 class="fw-500 lh-5 font-xss mb-3 text-grey-700">"Kita tuh butuh prakteknya juga, gak cuma teorinya doank. Sekarang kan teorinya udah banyak, di google udah ada, di buku udah ada, kita butuh prakteknya juga. Kalo yang kaya gini saya baru pertama kali nih saya ikut yang kaya gini. Kalau menurut saya, yang kaya gini tuh cukup membantu sih mas"</h4>
                            
                            <div class="clearfix"></div>
                            <div class="card-body pl-0 pt-0 mt-4 mb-5 pb-4 d-block">
                                <img src="https://via.placeholder.com/30x30.png" alt="user" class="w45 mr-auto ml-auto mb-3">
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Goria Coast</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-500">Digital Marketing Executive</h5>
                            </div>

                        </div>

                        
                    </div>

                </div>
            </div>
            
        </div>
    </div>

    {{-- Blog --}}
    <div class="brand-wrapper pt-5 pb-7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center mb-5">
                    <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Blog</h2>
                    {{-- <p class="fw-300 font-xsss lh-28 text-grey-500">
                        <a href="{{route('blog')}}">Lihat Selengkapnya</a>
                    </p> --}}
                </div>  
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none">
                        {{-- items loop --}}
                        @forelse ($blog as $bg)
                        <div class="item">
                            <div class="card w300 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                                <div class="card-image w-100 mb-3">
                                    
                                        <img src="{{asset($bg->gambar)}}" alt="image" class="w-100">
                                    
                                </div>
                                <div class="card-body pt-0">
                                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-danger d-inline-block text-danger mr-1">Blog</span>
                                    <h4 class="fw-700 font-xss mt-3 lh-20 mt-0">
                                        <a href="{{route('blogDetail',['judul' => $bg->judul ])}}" class="text-dark text-grey-900">{{$bg->judul}}</a>
                                    </h4>
                                    <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2 mb-0">{{$bg->penulis}}</h6>
                                    <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-0">
                                        {{date_format(date_create($bg->created_at),"d M Y")}} 
                                    </h6>  
                                </div>
                            </div>
                        </div>
                            
                        @empty
                            
                        @endforelse
                        {{-- end items loop --}}
                    </div>
                </div>
                <div class="col-10 col-sm-3 mx-auto">
                    <a href="{{route('blog')}}" class="btn btn-block border-0 w-100 text-dark p-3 fw-600 rounded-lg d-inline-block font-xssss btn-light">Lihat selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end section --}}

    

@endsection