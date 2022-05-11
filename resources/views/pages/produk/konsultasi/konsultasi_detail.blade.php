@extends($layout)

@section('content')
    <div class="spacer"></div>
    <div class="container-fluid">
        <div class="col-12">
            <div class="spacer"></div>
            <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-5 d-block text-center">{{$data->produk->nama}}</h2>
        </div>
    
        <div class="row justify-content-center">
            <div class="col-10 col-sm-3 offset-lg-1">
                <img src="{{asset($data->expert->foto)}}" alt="image" class="img-fluid pr-5">
            </div>
            <div class="col-10 col-sm-6 ">
                <span class="font-xss fw-700 px-3 ls-2 d-inline-block text-success float-right"><span class="font-xsssss">Rp.</span> {{number_format($data->harga)}}
                    / {{$data->waktu}}
                </span>
                <h2 class="text-grey-800 fw-600 font-lg mb-0 mt-3 d-block lh-3 " >{{$data->expert->nama}}</h2>
                <p class="fw-400 font-xsss lh-28 text-grey-500 ">orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dol ad minim veniam, quis nostrud exercitation</p>
                <div>{!! $data->jadwal !!}</div>
                <a href="{{route('pembayaranCek',$data->produk->id)}}" class="btn btn-primary mt-3">Konsultasi sekarang</a>
            </div>
            <div class="spacer"></div>
        </div>

    </div>
    

@endsection