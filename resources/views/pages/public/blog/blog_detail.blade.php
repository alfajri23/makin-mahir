@extends($layout)

@section('meta_title', $data->meta_title)
@section('meta_keywords', $data->meta_keyword)
@section('meta_description', $data->meta_description)

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

    /* ol,ul{
        margin-left: 10%;
    }

    li {
        list-style: auto;
    } */
</style>

<div class="spacer"></div>

<div class="col-12 col-sm-10 mx-auto pt-5 pt-sm-0">
    <div class="card border-0 mb-0 rounded-lg overflow-hidden pt-5 pt-sm-0">

        <div class="row">
            @if($data->video == null )
            {{-- gambar --}}
            <div class="col-12 col-sm-12 mx-auto">
                <div class="card-image w-100 mb-3">
                    <a href="default-course-details.html" class="video-bttn position-relative d-block">
                        <img src="{{asset($data->gambar)}}" alt="image" class="w-100">
                    </a>
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

    <div class="row">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->full()}}" class="btn-round-md ml-3 d-inline-block float-right rounded-lg bg-danger">
            <i class="feather-facebook font-sm text-white"></i>
        </a>
        
        <a target="_blank" href="https://wa.me/?text={{url()->full()}}" class="btn-round-md ml-0 d-inline-block float-right rounded-lg bg-success mx-1" data-original-title="whatsapp" rel="tooltip" data-placement="left" data-action="share/whatsapp/share">
            <i class="feather-phone font-sm text-white"></i>
        </a>
        
        <a href="https://twitter.com/intent/tweet?text=Share+title&url={{url()->full()}}" class="btn-round-md ml-0 d-inline-block float-right rounded-lg bg-info" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="feather-twitter font-sm text-white"></i>
        </a>
        
        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->full()}}&amp;title=my share text&amp;summary=dit is de linkedin summary" class="btn-round-md ml-0 d-inline-block float-right rounded-lg bg-info ml-1" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa-brands fa-linkedin font-sm text-white"></i>
        </a>
    </div>

    <div class="card d-block border-0 rounded-lg overflow-hidden dark-bg-transparent bg-transparent mt-4 pb-3">
        <div class="row justify-content-md-between">
            <div class="col-12 col-md-8">
                <h2 class="display1-size fw-700">{{$data->judul}}</h2>
            </div>
        </div>

        <span class="font-xssss fw-700 text-grey-900 d-inline-block ml-0 text-dark">Penulis : {{$data->penulis}}</span>
        {{-- <span class="dot ml-2 mr-2 d-inline-block btn-round-xss bg-grey">{{$data->created_at}}</span> --}}
    </div>

    <div class="post-body p-1 mt-4">
        <p class="font-xs fw-500 lh-28 text-grey-700 mb-0">{!!$data->isi!!}</p>
    </div>

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



</div>



@endsection