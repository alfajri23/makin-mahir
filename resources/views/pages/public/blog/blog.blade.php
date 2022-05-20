@extends($layout)


@section('content')
<style>

    .blog-value{
        text-overflow: ellipsis;
        width: 500px;
        overflow: hidden;
        white-space: nowrap;
        display: block;
    }
    .spacer{
        height: 100px;
    }

    form{
        border: 1px solid #dedede;
    }

    .form-group.icon-input i {
        position: absolute;
        left: 15px;
        top: 8px;
    }

    .kat{
        margin-top: 2px;
        margin-left: 5px;
    }

    .middle-sidebar-bottom{
        background-color: white;
    }
</style>

<div class="spacer"></div>

{{-- <div class="container mt-5 mt-sm-0">
    <div class="row align-items-center flex-column">
        <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center">
            <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Blog</h2>
        </div>
        <div class="mb-5">
            <form action="{{route('blog')}}" method="GET" class="float-left header-search border-1 rounded-sm">
                <div class="form-group mb-0 icon-input">
                    <i class="feather-search font-lg text-grey-400"></i>
                    <input name="search" type="text" placeholder="Start typing to search.." class="bg-transparent border-0 lh-32 pt-1 pb-1 pl-5 pr-3 font-xsss fw-500 rounded-xl w350">
                    <button type="submit" class="btn btn-info">Search</button>
                </div>
            </form>

            <a href="{{route('blogKategori')}}" class="btn btn-primary fw-600 kat">Kategori</a>
        </div>
    </div>
</div> --}}

<div class="container mt-5 mt-sm-0">
    <div class="row align-items-center flex-column pt-4">
        <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center">
            <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Blog</h2>
        </div>
        <div class="mb-5">
            <form action="{{route('blog')}}" method="GET" class="float-left header-search border-1 rounded-sm">
                <div class="form-group mb-0 icon-input">
                    <i class="feather-search font-lg text-grey-400"></i>
                    <input name="search" type="text" placeholder="Start typing to search.." class="bg-transparent border-0 lh-32 pt-1 pb-1 pl-5 pr-3 font-xsss fw-500 rounded-xl">
                    <button type="submit" class="btn btn-info">Search</button>
                </div>
            </form>

            {{-- <a href="{{route('blogKategori')}}" class="btn btn-primary fw-600 kat">Kategori</a> --}}
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-9">
            <div class="row">
                @forelse ($data as $dt)
                    <div class="col-12 mb-4 my-4">
                        <div class="card w-100 p-0 border-0 overflow-hidden mr-1">
                            <div class="card-image w-100 mb-0">
                                <a  class="video-bttn position-relative d-block"><img src="{{asset($dt->gambar)}}" alt="image" class="w-100"></a>
                            </div>
                            <div class="card-body pt-0 pl-0">
                                <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2 mb-0"> {{$dt->penulis}} </h6>
                                <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-0"> {{$dt->created_at}} </h6>
                                <h4 class="fw-700 font-md lh-28 mt-0">
                                    <a href="{{route('blogDetail',['judul' => $dt->judul ])}}" class="text-dark text-grey-900">{{$dt->judul}}</a>
                                </h4>
                                {{-- <h6 class="font-xs text-grey-700 ml-0 mt-2 mb-0 blog-value"> {!!$dt->isi!!} </h6>        --}}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{-- {!! $data->links() !!} --}}
                    </div>
                    
                @empty
                    
                @endforelse
                {!! $data->links() !!}
            </div>
        </div>
        <div class="col-12 col-sm-3 bg-light bg-sm-transparent py-5 p-sm-0">
            <h5 class="mb-0 text-grey-900 fw-700 font-xs pb-3 mb-0 d-block ml-2">Blog terpopuler</h5>
            @forelse ($popular as $dt)
                <div class="col-12 mb-4">
                    <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                        <div class="card-image w-100 mb-3">
                            <a  class="video-bttn position-relative d-block"><img src="{{asset($dt->gambar)}}" alt="image" class="w-100"></a>
                        </div>
                        <div class="card-body pt-0">
                            <h4 class="fw-700 font-xss mt-3 lh-28 mt-0">
                                {{-- beri pembeda route --}}
                                <a href="{{route('blogDetail',['judul' => $dt->judul ])}}" class="text-dark text-grey-900">{{$dt->judul}}</a>
                                
                            </h4>
                            <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2 mb-0"> {{$dt->penulis}} </h6>
                            <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-0"> {{$dt->created_at}} </h6>
                            
                        </div>
                    </div>
                </div>
            @empty      
            @endforelse
            <h5 class="mb-0 text-grey-900 fw-700 font-xs pb-3 mb-0 d-block ml-2">Terbaru</h5>
            @forelse ($latest as $dt)
                <div class="col-12 mb-4">
                    <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                        <div class="card-image w-100 mb-3">
                            <a  class="video-bttn position-relative d-block"><img src="{{asset($dt->gambar)}}" alt="image" class="w-100"></a>
                        </div>
                        <div class="card-body pt-0">
                            <h4 class="fw-700 font-xss mt-3 lh-28 mt-0">
                                {{-- beri pembeda route --}}
                                <a href="{{route('blogDetail',['judul' => $dt->judul ])}}" class="text-dark text-grey-900">{{$dt->judul}}</a>
                                
                            </h4>
                            <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2 mb-0"> {{$dt->penulis}} </h6>
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