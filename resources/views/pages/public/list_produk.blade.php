@extends($layout)
@section('meta_title', $meta_title)
@section('content')
<style>
    /* .spacer{
        height: 100px;
    } */

    form{
        border: 1px solid #dedede;
    }

    .form-group.icon-input i {
        position: static !important;
    }

</style>

<div class="container mt-5 pt-3 mb-3"> 
    <div class="row px-3 flex-column flex-sm-row">
        <div class="flex-grow-1">
            <h2 class="text-grey-900 text-uppercase fw-700 display3-size display4-md-size pb-3 mb-0 d-block">{{$tipe}}</h2>
        </div>
        <div class="d-flex align-items-center">
            <div>
                <form action="{{route($route)}}" method="GET" class="header-search border-1 rounded-sm flex-grow-1">
                    <div class="form-group mb-0 icon-input d-flex">
                        {{-- <i class="feather-search font-lg text-grey-400"></i> --}}
                        <input name="search" type="text" placeholder="Start typing to search.." class="bg-transparent border-0 lh-32 pt-1 pb-1 px-3 font-xsss fw-500 rounded-xl">
                        <button type="submit" class="btn">
                            
                            <i class="feather-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            @if(\Auth::check()) 
            <div class="mx-1">
                <a href="{{route($riwayat)}}" class="btn btn-info btn-sm text-capitalize">{{$tipe}} Saya</a>
            </div>
            @endif
        </div>
    </div>
</div>

@include('component.produk.produk_list')

<div class="spacer"></div>


@endsection