@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-10">
            <h2 class="text-gray-800 fw-700 display1-size">Bundling Event</h2>
        </div>
        <div class="col-2">
            <a href="{{route('addEventBundling')}}" class="btn btn-info">Buat Bundling</a>
        </div>
    </div>
    
    <div class="container d-flex mt-3">
        @forelse ($data as $dt) 
        <div class="card mx-2" style="width: 14rem;">
            <div class="card-image w-100 mb-3">
                <img src="{{asset($dt->poster)}}" alt="image" class="w-100">
            </div>
            <div class="card-body">
                <p class="font-weight-bold display2-md-size text-dark mb-0">{{$dt->nama}}</p>
                <p class="mb-0">Rp. {{$dt->harga}}</p>    
            </div>
            
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{route('addEventBundling',['id'=> $dt->id])}}" class="btn btn-sm btn-warning">
                    <i class="fas fa-pencil-alt"></i>
                </a>
            </div>
            
        </div>
        @empty
        @endforelse
    </div>
</div>

@endsection