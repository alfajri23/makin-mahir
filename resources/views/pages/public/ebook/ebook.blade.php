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

    .kat{
        margin-top: 2px;
        margin-left: 5px;
    }
</style>

<div class="spacer"></div>

<div class="container mt-5 mt-sm-0">
    <div class="row align-items-center flex-column pt-4">
        <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center">
            <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Ebook</h2>
        </div>
        <div class="mb-5">
            <div class="clearfix">
                <form action="{{route('ebook')}}" method="GET" class="float-left header-search border-1 rounded-sm">
                    <div class="form-group mb-0 icon-input">
                        <i class="feather-search font-lg text-grey-400"></i>
                        <input name="search" type="text" placeholder="Start typing to search.." class="bg-transparent border-0 lh-32 pt-1 pb-1 pl-5 pr-3 font-xsss fw-500 rounded-xl">
                        <button type="submit" class="btn btn-info">Search</button>
                    </div>
                </form>
            </div>
            @if(\Auth::check())
            <a href="{{route('memberEbook')}}" class="text-grey-900 font-xsss fw-600 mt-2 d-block text-center">Ebook saya</a>
            @endif
        </div>
    </div>
</div>

@include('component.ebook.ebook_list')


@endsection