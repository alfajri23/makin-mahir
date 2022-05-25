@extends($layout)

@section('content')
    {{-- <div class="spacer"></div>
    <div class="spacer"></div> --}}
    <div class="container-fluid">
        <div class="spacer-md"></div>
        <div class="col-12">
            <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 mb-sm-5 d-block text-center">{{$data->produk->nama}}</h2>
        </div>
    
        <div class="row justify-content-center">

            <div class="col-12 col-sm-3 offset-lg-1">
                <img src="{{asset($data->poster)}}" alt="image" class="img-fluid">
            </div>

            <div class="col-11 col-sm-8">
                <div class="row mt-4 mt-sm-0">
                    <div class="col-12 col-sm-8">
                        <h2 class="text-grey-800 fw-600 font-lg my-0 lh-3 " >{{$data->expert->nama}}</h2>
                    </div>
                    <div class="col-12 col-sm-4">
                        <h6 class="font-xsss fw-500 text-grey-600 ls-2">
                            <del>{{$data->harga_bias == null ? "" : 'Rp' .number_format($data->harga_bias)}}</del>
                        </h6>
                        <h1 class="fw-700 font-md d-block lh-1 text-success mb-2">
                            
                            @if ($data->harga == '#')
                                Bayar<br> suka-suka
                            @elseif ($data->harga == null)
                                gratis
                            @else
                                Rp. {{number_format($data->harga)}}
                            @endif
                        </h1>
                    </div>
                </div>
               
                <div class="fw-400 font-xsss lh-28 text-grey-700">{!! $data->jadwal !!}</div>
                <a href="{{route('pembayaranCek',$data->produk->id)}}" class="btn btn-primary mt-3">Konsultasi sekarang</a>
            </div>
            <div class="spacer"></div>
        </div>
        <div class="spacer"></div>
    </div>
    

@endsection