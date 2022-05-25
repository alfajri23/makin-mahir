@extends($layout)
@section('meta_title', $meta_title)
@section('content')

<div class="container mt-5 mt-sm-0">
    <div class="row align-items-center flex-column pt-4">
        <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center">
            <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">{{$tipe}}</h2>
        </div>
    </div>
</div>


<div class="pb-lg--7 pt-3 w-100">
    <div class="container">
        <div class="row">
            @forelse ($data as $dt)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
                    <div onclick="details({{$dt->id}})" class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                        <div class="card-image-main w-100 mb-3">                
                            <img src="{{asset($dt->poster)}}" alt="image" class="w-100">
                        </div>
                        <div class="card-body pt-0">
                            <div class="float-right">
                                @if($dt->harga_bias)
                                <p class="font-xssss fw-400 pl-3 mb-0 text-muted text-right">
                                    <del>Rp. {{number_format($dt->harga_bias)}}</del>
                                </p>
                                @endif
                                <p class="font-xss fw-700 pl-3 lh-1 d-inline-block text-success ">
                                    @if ($dt->harga == '#')
                                        Bayar<br> suka-suka
                                    @elseif ($dt->harga == null)
                                        gratis
                                    @else
                                        Rp. {{number_format($dt->harga)}}
                                    @endif
                                </p>
                            </div>
                            
                            
                            
                            <h4 class="fw-700 font-xss mt-3 lh-20 mt-0">
                                {{-- beri pembeda route --}}
                                <a href="{{route('memberProdukDetail',$dt->produk->id)}}" class="text-dark text-grey-900">{{$dt->judul}}</a>
                            </h4>
                            <h6 class="font-xsss text-grey-700 fw-600 ml-0 mt-2 mb-0">
                                @if (!empty($dt->tanggal))
                                    {{date_format(date_create($dt->tanggal),"d M Y")}} 
                                @else

                                @endif
                            </h6>
                            <h6 class="font-xsss text-grey-700 fw-600 ml-0 mt-0"> {{$dt->waktu}} </h6>
                        </div>
                    </div>
                </div>
            @empty
                
            @endforelse
        </div>
    </div>
</div>

<div class="spacer"></div>

@endsection