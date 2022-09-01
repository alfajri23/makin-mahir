@extends($layout)

@section('content')

    <style>
        .owl-carousel {
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        }
    </style>
    {{-- <div class="spacer-sm"></div> --}}
    <div class="banner-wrapper bg-lightblue">

        <div class="spacer-sm"></div>

        <div class="col-12 col-sm-11 mx-auto pb-5">
            <div class="row">
                <div class="col-md-5 col-10 mx-auto">
                    <div class="card-image w-100 mb-3">
                        <a class="video-bttn position-relative d-block">
                            <img src="{{asset($data->poster)}}" alt="image" class="w-100 rounded-lg">
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-10 mx-auto">
                    <span class="badge rounded-pill bg-warning text-white p-2 px-3 mb-2">{{$data->tipe}}</span>
                    <h2 class="display1-size fw-700">{{$data->judul}}</h2>

                    <h6 class="font-xsss fw-500 text-grey-600 ls-2">
                        <del>{{$data->harga_bias == null ? "" : 'Rp' .number_format($data->harga_bias)}}</del>
                    </h6>
                    <h1 class="fw-700 font-md d-block lh-1 text-success mb-4">
                        
                        @if ($data->harga == '#')
                            Bayar<br> suka-suka
                        @elseif ($data->harga == null)
                            GRATIS
                        @else
                            Rp. {{number_format($data->harga)}}
                        @endif
                    </h1>

                    <h6 class="font-xss fw-500 text-grey-700 mb-2">Tanggal dan waktu</h6>
                    <h6 class="font-xsss fw-500 text-grey-600 ls-2">{{$data->waktu}}</h6>
                    <h6 class="font-xsss fw-500 text-grey-600 ls-2">
                        {{date_format(date_create($data->tanggal_mulai),"d M Y")}}
                        <span>sampai</span> 
                        {{date_format(date_create($data->tanggal_akhir),"d M Y")}}
                    </h6>

                    <a href="{{route('pembayaranCek',$data->produk->link)}}" class="btn btn-success mt-3">{{$data->harga == null ? 'Daftar' : 'Beli sekarang'}}</a>
                    {{-- <a href="{{route('pembayaranCek',$data->produk->link)}}" class="btn btn-block border-0 w-100 bg-success p-3 text-white fw-600 rounded-lg d-inline-block font-xs btn-light">{{$data->harga == null ? 'Daftar' : 'Beli sekarang'}}</a> --}}
                </div>
            </div>



        </div>

    </div>   
    
    <div class="banner-wrapper pb-5">
        <div class="col-12 col-sm-11 mx-auto">
            
            <div class="card d-block border-0 rounded-lg overflow-hidden p-4 mt-4">
                <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Pemateri</h2>
                <div class="font-xsss fw-500 lh-28 text-grey-600 mb-0 pl-2">{!!$data->pemateri!!}</div>
            </div>

            <div class="card d-block border-0 rounded-lg overflow-hidden p-4 mt-4">
                <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Deskripsi</h2>
                <div class="font-xsss fw-500 lh-28 text-grey-600 mb-0 pl-2">{!!$data->deskripsi!!}</div>
            </div>
        </div>
    </div>

    @php
        $data = $rekomen;
        $title = 'rekomendasi lainnya';
    @endphp

    <div class="row py-4 w__100">
        @include('component.produk.produk_carousel')
    </div>
    <div class="spacer-sm"></div>

@endsection