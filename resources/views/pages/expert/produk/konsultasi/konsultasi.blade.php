@extends('layouts.expert')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800">Jenis Konsultasi</h1>

    <!-- Content Row -->
    <div class="row">

        @forelse ($data as $dt)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="{{route('konsultasiExperts',$dt->id)}}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Start from <br>Rp. {{number_format($dt->harga)}}
                            </div>
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


@endsection