@extends($layout)


@section('content')
<style>
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
</style>

<div class="spacer"></div>
<div class="container">
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
        </div>
    </div>

</div>

{{-- Popular --}}
<div class="">
    @forelse ($data as $key => $datas)
    <div class="container">
        <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 pl-0">
            <h4 class="text-grey-900 fw-700 pb-3 mb-0 d-block">kategori {{$key}}</h4>
        </div>
        <div class="row">
            @forelse ($datas as $dt)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
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
        
    @empty
        
    @endforelse
    
</div>



@endsection