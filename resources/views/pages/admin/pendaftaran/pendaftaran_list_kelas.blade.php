@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-10">
            <h2 class="text-grey-700 fw-700 display1-size">Pendaftaran Kelas</h2>
        </div>
    </div>
    
    <div class="container d-flex mt-3">
        @forelse ($data as $dt) 
        <a href="{{route('pendaftaranKelas',['id'=>$dt->id])}}" class="card mx-2" style="width: 14rem;">
            <div class="card-image w-100 mb-3">
                <img src="{{asset($dt->poster)}}" alt="image" class="w-100">
            </div>
            <div class="card-body">
              <p class="fw-700 text-grey-800 display2-md-size card-title">{{$dt->judul}}</p>
              {{-- <a href="{{route('produkDetail',$dt->id)}}" class="btn btn-primary">Go somewhere</a> --}}
            </div>
        </a>
        @empty
            
        @endforelse
    </div>
</div>




@endsection