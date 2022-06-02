@extends($layout)

@section('content')
<style>

    form{
        border: 1px solid #dedede;
    }

    .form-group.icon-input i {
        position: absolute;
        left: 15px;
        top: 8px;
    }
</style>



<div class="col-12 col-sm-11 mx-auto mt-5 mt-sm-4 mt-lg-0">
    <div class="card border-0 mb-0 rounded-lg overflow-hidden">
        <div class="row flex-column flex-sm-row">
            {{-- gambar --}}
            <div class="col-10 col-sm-3 mt-5 mx-auto">
                <div class="card-image w-100 mb-3">
                    <a href="default-course-details.html" class="video-bttn position-relative d-block">
                        <img src="{{asset($data->gambar)}}" alt="image" class="w-100">
                    </a>
                </div>
            </div>

            <div class="col-12 col-sm-9 mt-3">
                <div class="card d-block border-0 rounded-lg overflow-hidden dark-bg-transparent bg-transparent mt-4 pb-3">
                    <div class="row justify-content-md-between">
                        <div class="col-12">
                            <h2 class="display1-size fw-700">{{$data->judul}}</h2>
                            <h2 class="font-xs fw-700">Rp. {{number_format($data->harga)}}</h2>
                            {{-- <h2 class="font-xs fw-700">{{$data->produk}}</h2> --}}
                            <p>{!!$data->desc!!}</p>

                            @if (Route::has('login'))
                                @auth
                                    <a href="{{route('pembayaranCek',$data->produk->id)}}" class="btn btn-sm btn-success">Download</a>
                                    {{-- <a href="{{route('ebookDownload',['judul' => $data->judul])}}" class="btn btn-sm btn-success">Download</a> --}}
                                @else
                                    <a href="{{route('ebookDownload',['judul' => $data->judul])}}" class="btn btn-sm btn-success">Download</a>
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    


    <div class="spacer"></div>
    
    {{-- Related Blog --}}
    <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 pl-0">
        <h4 class="text-grey-900 fw-700 pb-3 mb-0 d-block">Ebook lainnya</h4>
    </div>

    <div class="container pb-5 pb-sm-0">
    
        <div class="col-lg-12 mt-3 pb-5 pb-sm-0">
            <div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none">
                @forelse ($datas as $dt)
                <div class="item">
                    <div class="card w150 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                        <div class="card-image w-100 mb-3">
                            <a  class="video-bttn position-relative d-block"><img src="{{asset($dt->gambar)}}" alt="image" class="w-100"></a>
                        </div>
                        <div class="card-body pt-0">
                            <h4 class="fw-700 font-xss mt-3 mt-0">
                                <a href="{{route('ebookDetail',['judul' => $dt->judul ])}}" class="text-dark text-grey-900">{{$dt->judul}}</a>
                            </h4>
                        </div>
                    </div>
                </div>
    
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
    
</div>



@endsection