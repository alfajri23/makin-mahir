@extends($layout)

@section('content')
    <div class="spacer"></div>
    <div class="container-fluid">

        <div class="spacer"></div>

        <div class="col-12 col-sm-11 mx-auto">
            <div class="card border-0 mb-0 rounded-lg overflow-hidden">
                <div class="row">
                    {{-- video --}}
                    <div class="col-12 col-sm-10 mx-auto">
                        <div class="card-image w-100 mb-3">
                            <a class="video-bttn position-relative d-block">
                                <img src="{{asset($data->poster)}}" alt="image" class="w-100">
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="card d-block border-0 rounded-lg overflow-hidden dark-bg-transparent bg-transparent mt-4 pb-3">
                <div class="row justify-content-md-between">
                    <div class="col-12 col-md-6">
                        <h2 class="display1-size fw-700">{{$data->judul}}</h2>
                    </div>
                    <div class="col-12 col-md-3">
                        <h6 class="font-xsss fw-500 text-grey-600 ls-2">
                            @if ($data->harga == '#')
                                donasi
                            @elseif ($data->harga == null)
                                gratis
                            @else
                            <del>Rp. {{number_format($data->harga)}}<del>
                            @endif
                        </h6>
                        <h1 class="fw-700 font-md d-block lh-4 mb-2">
                            {{$data->harga_promo == null ? "" : number_format($data->harga_promo)}}
                        </h1>
                        <a href="{{route('pembayaranCek',$data->produk->id)}}" class="btn btn-block border-0 w-100 bg-success p-3 text-white fw-600 rounded-lg d-inline-block font-xssss btn-light">{{$data->harga == null ? 'Daftar' : 'Beli sekarang'}}</a>
                    </div>
                </div>
            </div>

            <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4">
                <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Pemateri</h2>
                <div class="font-xs fw-500 lh-28 text-grey-600 mb-0 pl-2">{!!$data->pemateri!!}</div>
            </div>

            <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4">
                <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Deskripsi</h2>
                <div class="font-xs fw-500 lh-28 text-grey-600 mb-0 pl-2">{!!$data->deskripsi!!}</div>
            </div>

        </div>

        <div class="spacer"></div>
    </div>    

    @php
        $data = $rekomen;
        $title = 'rekomendasi lainnya';
    @endphp
    <div class="row bg-light py-4 w__100">
        @include('component.produk.produk_carousel')
    </div>
    <div class="spacer"></div>


@endsection