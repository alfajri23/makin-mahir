@extends($layout)
@section('content')


<div class="spacer"></div>
<div class="spacer"></div>
<div class="row mt-5 mt-sm-0 py-5 px-sm-5">
    <div class="page-title style1 col-8 mx-auto">
        <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block text-center">Konsultasi</h2>
    </div>
    @if(\Auth::check()) 
    <div class="col-4 clearfix">
        <a href="{{route('memberKonsultasi')}}" class="text-grey-600 font-xsss fw-500 mt-2 d-block float-right">Riwayat konsultasi</a>
    </div>
    @endif
</div>

<div class="container">
    <div class="row justify-content-center">
        @forelse ($data as $dt)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="{{route('produkListDetailKonsul',$dt->id)}}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dt->nama}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
            
        @empty
            
        @endforelse
    </div>
</div>




<div class="spacer"></div>



@endsection