@extends('layouts.public')

@empty(!$data)
    @section('meta_title', $data->meta_title)
    @section('meta_keywords', $data->meta_keyword)
    @section('meta_description', $data->meta_description)
@endempty

@section('content')
<style>
    .spacer{
        height: 100px;
    }

    .video-container{
        width: 100%;
    }

    iframe{
        width: 100%;
        height: 530px;
    }

    .form-group.icon-input i {
        position: absolute;
        left: 15px;
        top: 8px;
    }

    h5{
        font-weight: bold;
    }

    .post-body img {
        width: calc(100% + 32px);
        height: auto;
        margin: 0px -16px;
        margin-bottom: 16px;
    }

    ol,ul{
        margin-left: 4%;
    }

    li {
        list-style: auto;
    }

</style>


<div class="col-12 col-sm-10 mx-auto pt-5 pt-sm-0">

    @if($data != null)
    <div class="card border-0 mb-0 rounded-lg overflow-hidden pt-5 pt-sm-0">

        <div class="row">
            @if($data->video == null )
            {{-- gambar --}}
            <div class="col-12 col-sm-12 mx-auto">
                <div class="card-image w-100 mb-3">
                    <div class="video-bttn position-relative d-block">
                        <img src="{{asset($data->gambar)}}" alt="image" class="w-100">
                    </div>
                </div>
            </div>
            @else
            {{-- video --}}
            <div class="video-container">
                <iframe src="{{$data->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            @endif

        </div>
        
    </div>

    <div class="card d-block border-0 rounded-lg overflow-hidden dark-bg-transparent bg-transparent mt-4 pb-3">
        <div class="row flex-sm-row justify-content-md-between flex-column-reverse">
            <div class="col-12 col-md-7">
                <h2 class="display1-size fw-700">{{$data->judul}}</h2>
            </div>

            <div class="col-12 col-md-4 mb-3">
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->full()}}" class="btn-round-md bg-facebook bg-blur">
                    <i class="feather-facebook font-xs text-white"></i>
                </a>
                <a target="_blank" href="https://wa.me/?text={{url()->full()}}" class="btn-round-md bg-facebook bg-success">
                    <i class="fa-brands fa-whatsapp font-xs text-white"></i>
                </a>
                <a target="_blank" href="https://twitter.com/intent/tweet?text={{url()->full()}}" class="btn-round-md bg-twiiter">
                    <i class="fa-brands fa-twitter font-xs text-white"></i>
                </a>
                <a onclick="copyText()" class="btn-round-sm d-inline p-3 bg-instagram cursor-pointer">
                    <small id="copy" class="text-white">Copy link</small>
                    
                </a>
            </div>

        </div>

        <span class="font-xssss fw-700 text-grey-900 d-inline-block ml-0 text-dark">Penulis : {{$data->penulis}}</span>
        {{-- <span class="dot ml-2 mr-2 d-inline-block btn-round-xss bg-grey">{{$data->created_at}}</span> --}}
    </div>

    <div class="post-body p-1 mt-4">
        <div id="isi" class="font-xss fw-200 lh-28 text-grey-800 mb-0">{!!$data->isi!!}</div>
    </div>

    @else
    <div class="spacer"></div>
    <div class="p-5 mt-3">
        <h6 class="display1-size"><i class="fa-solid fa-empty-set"></i>Blog tidak ditemukan</h6>
        
    </div>

    @endif



    <div class="spacer"></div>
    
    {{-- Related Blog --}}
    <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 pl-0">
        <h4 class="text-grey-900 fw-700 pb-3 mb-0 d-block">Blog lainnya</h4>
    </div>
    <div class="row">
        @forelse ($datas as $dt)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                    <div class="card-image w-100 mb-3">
                        <img src="{{asset($dt->gambar)}}" alt="image" class="w-100">
                    </div>
                    <div class="card-body pt-0">
                        <h4 class="fw-700 font-xss mt-3 lh-20 mt-0">
                            {{-- beri pembeda route --}}
                            <a href="{{route('blogDetail',['id' => $dt->id, 'link' => $dt->link ])}}" class="text-dark text-grey-900">{{$dt->judul}}</a>
                            
                        </h4>
                        <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2 mb-0"> {{$dt->penulis}} </h6>
                        <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-0"> {{$dt->created_at}} </h6>
                        
                    </div>
                </div>
            </div>
        @empty   
        @endforelse
    </div>

    @empty(!$data)
    {{-- Komentar --}}
    <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4">
        <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 pl-0">
            <h4 class="text-grey-900 fw-700 pb-3 mb-0 d-block">Komentar</h4>
        </div>
        <div class="row">
            <form class="w-100" action="{{route('blogCreate')}}" method="post">
            @csrf
            <div class="w-100 p-3">
                <input type="hidden" value="{{$data->id}}" name="id_blog">
                <textarea class="p-2" name="komentar" style="width: 100%; height:200px"></textarea>
            </div>
            <button type="submit" class="btn btn-info ml-3">Kirim</button>
        </form>
        </div>

        <div class="row p-3 mt-4">
            @forelse ($komentar as $km)
            <div class="col-12 d-flex flex-row">
                <div class="text-left">
                    <figure class="avatar float-left mb-0"><img src="{{asset($km->user->foto)}}" alt="image" class="float-right shadow-none w40 mr-2"></figure>
                </div>
                <div class="col-10 pl-4">
                    <div class="content">
                        <h6 class="author-name font-xss fw-600 mb-0 text-grey-800">{{$km->user->nama}}</h6>
                        <h6 class="d-block font-xssss fw-500 text-grey-500 mt-2 mb-0">{{$km->tanggal}}</h6>                          
                        <p class="comment-text lh-24 fw-500 font-xssss text-grey-500 mt-2">{{$km->isi}}</p>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse
            
        </div>
    </div>

    @endempty
    
</div>

<script>
    function copyText() {
        navigator.clipboard.writeText
            ("{{url()->full()}}");
        let copy = document.getElementById("copy");
        copy.innerHTML = "Copied";
    }
</script>



@endsection