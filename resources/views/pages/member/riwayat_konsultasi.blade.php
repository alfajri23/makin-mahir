@extends('layouts.member')
@section('content')

<div class="spacer"></div>
<div class="container mt-5 mt-sm-0">
    <div class="row align-items-center flex-column pt-4">
        <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center">
            <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Riwayat Konsultasi</h2>
        </div>
    </div>
</div>


<div class="pb-lg--7 pt-3 w-100">
    <div class="container">
        <div class="row">
            @forelse ($data as $dt)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
                    <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                        <div class="card-image-main w-100 mb-3">                
                            <img src="{{asset($dt->expert->foto)}}" alt="image" class="w-100">
                        </div>
                        <div class="card-body pt-0">
                            <h4 class="fw-700 font-xss mt-3 lh-20 mt-0">
                                {{-- beri pembeda route --}}
                                <p class="text-dark text-grey-900">Konsultasi {{$dt->tipe->nama}} dengan {{$dt->expert->nama}}</p>
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