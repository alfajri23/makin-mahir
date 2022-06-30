@extends('layouts.member')

@section('content')


<div class="container">
    @php
        $title = "Riwayat event anda";
        $tipe = 'webinar';
    @endphp

    <div class="spacer"></div>
    <div class="how-to-work pb-lg--7 pt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center mb-5">
                    <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Riwayat template</h2>
                    <p class="fw-300 font-xs lh-28 text-grey-500">Riwayat pembelian template</p>
                </div>
            </div>

            <div class="row">
                @forelse ($data as $datas)
               
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                            <div class="card-image w-100 mb-3">
                                <img src="{{asset($datas['poster'])}}" alt="image" class="w-100">
                            </div>
                            <div class="card-body pt-0">
                                <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss">Rp.</span> {{$datas['harga']}}</span>
                                <h4 class="fw-700 font-xss mt-3 lh-28 mt-0">
                                    {{-- beri pembeda route --}}
                                    <a href="{{route('enrollProdukDetail',$datas->produk->id)}}" class="text-dark text-grey-900">{{$datas['judul']}}</a>
                                </h4>

                                <h6 class="font-xssss text-grey-700 fw-600 ml-0 mt-2 mb-0"> {{!empty($datas['tanggal']) ? $datas['tanggal'] : ''}} </h6>
                                <h6 class="font-xssss text-grey-700 fw-600 ml-0 mt-0"> {{!empty($datas['waktu']) ? $datas['waktu'] : ''}} </h6>
                                
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