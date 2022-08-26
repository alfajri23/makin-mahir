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
                    <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Riwayat event anda</h2>
                    <p class="fw-200 font-xss text-grey-600">Daftar event yang pernah Anda ikuti</p>
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
                                <div class="row justify-content-around">
                                    <div>
                                        <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-danger d-inline-block text-danger mr-1">{{$datas->tipe}}</span>
                                    </div>
                                    <div class="">
                                        @if($datas->harga_bias)
                                        <p class="font-xssss fw-400 pl-3 pr-3 text-muted text-right mb-0">
                                            <del>Rp. {{number_format($datas->harga_bias)}}</del>
                                        </p>
                                        @endif
                                        <p class="font-xss fw-700 pl-3 pr-3 lh-1 d-inline-block text-success mb-0">
                                            @if ($datas->harga == '#')
                                                Bayar suka-suka
                                            @elseif ($datas->harga == null)
                                                gratis
                                            @else
                                                Rp. {{number_format($datas->harga)}}
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <h4 class="fw-700 font-xss mt-3 lh-1 mt-0">
                                    <a href="{{route('enrollProdukDetail',$datas->produk->link)}}" class="text-dark text-grey-900">{{$datas['judul']}}</a>
                                </h4>
                                {{-- <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2 mb-0">Tanggal beli : {{$dt->tanggal_beli}} </h6> --}}
                                <h6 class="font-xssss text-grey-600 fw-600 ml-0 mt-2 mb-0"> {{!empty($datas['tanggal']) ? $datas['tanggal'] : ''}} </h6>
                                <h6 class="font-xssss text-grey-600 fw-600 ml-0 mt-0"> {{!empty($datas['waktu']) ? $datas['waktu'] : ''}} </h6>
                                
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