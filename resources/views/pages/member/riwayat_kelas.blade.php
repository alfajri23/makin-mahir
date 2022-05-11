@extends('layouts.member')

@section('content')


<div class="container">
    @php
        $title = "Riwayat kelas anda";
        $tipe = 'kelas';
    @endphp

    <div class="spacer"></div>
    <div class="how-to-work pb-lg--7 pt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center mb-5">
                    <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Kelas anda</h2>
                    <p class="fw-300 font-xs lh-28 text-grey-500">Kelas anda</p>
                </div>
            </div>

            <div class="row">
                @forelse ($data as $dt)
               
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
                        <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                            <div class="card-image w-100 mb-3">
                                <a class="video-bttn position-relative d-block"><img src="{{asset($dt->poster)}}" alt="image" class="w-100"></a>
                            </div>
                            <div class="card-body pt-0">
                                <span class="font-xsss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss">Rp.</span> {{number_format(!empty($dt->harga_promo) ? $dt->harga_promo : $dt->harga )}}</span>
                                <h4 class="fw-700 font-xss mt-3 lh-28 mb-0">
                                    {{-- beri pembeda route --}}
                                    <a href="{{route('enrollProdukDetail',$dt->produk->id)}}" class="text-dark text-grey-900">{{$dt->judul}}</a>
                                    
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