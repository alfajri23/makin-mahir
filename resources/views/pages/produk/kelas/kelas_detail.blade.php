@extends($layout)

@section('content')
    
    <div class="w-100 position-relative mt-5 mt-sm-0">
            <div class="col-12 col-sm-10 mx-auto mt-4 mt-sm-0">
                <div class="card-image w-90">
                    <a class="video-bttn position-relative d-block">
                        <img src="{{asset($data->poster)}}" alt="image" class="w-100">
                    </a>
                </div>
            </div>

            <div class="container pb-4 bg-light">
                <div class="col-xl-8 col-lg-6 align-items-center d-flex">
                    <div class="card w-100 border-0 bg-transparent d-block mt-3">
                        <h2 class="fw-700 text-grey-900 display5-size display4-lg-size display4-md-size lh-1 mb-0 os-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
                            {{$data['judul']}}
                        </h2>
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-grey-600 mt-3 os-init">
                            {{$data['tentang']}}
                        </h4>
                        <a href="{{route('pembayaranCek',$data->produk->id)}}" class="btn border-0 btn-primary px-5 fw-400 font-xs os-init">Beli kelas</a>
                    </div>
                </div>
            </div>
        
    
       
            <div class="row justify-content-between mt-5">
                <div class="col-11 mx-auto col-sm-7 mb-5 mb-sm-0">
                    <div class="container">
                        <h2 class="fw-700 font-xs mb-3 mt-1 pl-1 mb-3">TENTANG KELAS</h2>
                        <p class="font-xsss fw-500 lh-28 text-grey-600 mb-0 pl-2 text-justify">
                            {!!$data['desc']!!}
                        </p>
                    </div>
                    <div class="container mt-5">
                        <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Materi</h2>
                        <div class="card d-block border-0 rounded-lg overflow-hidden mt-2 w-100">
                            <div id="accordion" class="accordion mb-0">
                                @forelse ($babs as $bab)
                                <div class="card shadow-xss mb-0 w-100">
                                    <div class="card-header bg-greylight theme-dark-bg" id="headingOne">
                                        <h5 class="mb-0"><button class="btn font-xsss fw-600 btn-link " data-toggle="collapse" data-target="#collapse-{{$bab['id']}}" aria-expanded="false" aria-controls="collapseOne"> {{$bab['nama']}} </button></h5>
                                    </div>
                                    <div id="collapse-{{$bab['id']}}" class="collapse p-3 show" aria-labelledby="headingOne" data-parent="#accordion">
                                        @forelse ($bab->isi_bab as $materi)
                                        <div class="card-body d-flex p-2 align-items-center">
                                            <i class="fas fa-book"></i>
                                            <span class="font-xssss fw-500 text-grey-600 ml-2">{{$materi['judul']}}</span>
                                        </div>
                                        @empty 
                                        @endforelse
                                    </div>
                                </div>
                                @empty  
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-11 mx-auto col-sm-4">
                    <section>
                        <div class="card shadow-md rounded-lg border-0 p-4 mb-4">
                            <h4 class="font-xs fw-700 text-grey-900 d-block mb-3">Detail kelas <a href="#" class="float-right"><i class="ti-arrow-circle-right text-grey-500 font-xss"></i></a></h4>
                            
                            <div class="card-body d-flex p-0">
                                <i class="fas text-success fa-users"></i>
                                <span class="font-xssss fw-500 text-grey-600 ml-2">Jumlah peserta</span>
                                <span class="ml-auto font-xssss fw-500 text-grey-600">20</span>
                            </div>
    
                            <div class="card-body d-flex p-0 mt-3">
                                <i class="fas text-success fa-closed-captioning"></i>
                                <span class="font-xssss fw-500 text-grey-600 ml-2">Kategori</span>
                                <span class="ml-auto font-xssss fw-500 text-grey-600">{{$data->kategori->nama}}</span>
                            </div>
                            <div class="card-body d-flex p-0 mt-3">
                                <i class="fas text-success fa-comment-alt"></i>
                                <span class="font-xssss fw-500 text-grey-600 ml-2">Bahasa</span>
                                <span class="ml-auto font-xssss fw-500 text-grey-600">{{$data['bahasa']}}</span>
                            </div>
        
                            <div class="card-body d-flex p-0 mt-3">
                                <i class="fas text-success fa-clock"></i>
                                <span class="font-xssss fw-500 text-grey-600 ml-2">Durasi</span>
                                <span class="ml-auto font-xssss fw-500 text-grey-600">{{$data['durasi']}}</span>
                            </div>
                        </div>
                    </section>
    
                    <section>
                        <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4 alert-success">
                            <h2 class="fw-700 font-xs mb-3 mt-1 pl-1 text-success mb-4">Yang Akan Kamu Pelajari</h2>
                            <h4 class="font-xssss fw-600 text-grey-600 mb-3 pl-2 position-relative lh-24">
                                {!!$data['poin_produk']!!}
                            </h4>
                        </div>
                    </section>  
                </div>
            </div>
        <div class="spacer"></div>   
    </div>
    

@endsection