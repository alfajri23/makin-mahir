@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-10">
            <h2 class="text-grey-800 fw-700 font-lg">Setting</h2>
        </div>
        <div class="col-2">
            <a href="{{route('formSettingAdd')}}" type="button" class="btn btn-sm btn-success">Tambah</a>
        </div>
    </div>
    
    <div class="row justify-content-center">
        @forelse ($data as $dt)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="{{route('formSettingAdd',['id'=>$dt->id])}}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dt->kategori->nama}}</div>
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




@endsection