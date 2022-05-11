@extends('layouts.member')
@section('content')


<div class="row container mt-5 mt-sm-0 py-5 px-sm-5">
    <div class="spacer"></div>
    <div class="page-title style1 col-8">
        <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Riwayat</h2>
    </div>
</div>

<div class="container">
    <div class="row">
        @forelse ($data as $dt)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="{{route('memberCheckerDetail',$dt->id)}}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xsss mb-1">
                                Tanggal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{date_format(date_create($dt->created_at),"d M Y")}}</div>
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




<div class="spacer"></div>



@endsection