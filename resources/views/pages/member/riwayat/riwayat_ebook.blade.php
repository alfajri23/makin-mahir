@extends('layouts.member')

@section('content')

<div class="spacer"></div>

<div class="container mt-5 mt-sm-0">
    <div class="row align-items-center flex-column pt-4">
        <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center">
            <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Ebook Saya</h2>
        </div>
    </div>
</div>


<div class="how-to-work pb-lg--7 pt-3 w-100">
    <div class="container">
        <div class="row">
            @forelse ($data as $dt)
                <div class="col-10 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4 mx-auto mx-sm-0">
                    <div class="card w-100 h-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                        <div class="card-image w-100">
                            <a  class="video-bttn position-relative d-block"><img src="{{asset($dt->gambar)}}" alt="image" class="w-100"></a>
                        </div>
                        <div class="card-body pt-0">
                            <h4 class="fw-700 font-xss mt-3 lh-28 mt-0">
                                {{-- beri pembeda route --}}
                                <a href="{{route('ebookDownload',['judul' => $dt->judul])}}" class="text-dark text-grey-900">{{$dt->judul}}</a>
                            </h4>
                            <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-0"> {{$dt->created_at}} </h6>
                        </div>
                    </div>
                </div>
            @empty
                
            @endforelse
        </div>
    </div>
</div>


@endsection