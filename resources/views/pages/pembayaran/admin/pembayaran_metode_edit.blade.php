@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$data->nama}}</h1>
       
    </div>

    <form action="{{route('settingPembayaranAdminSaveMethod')}}" method="post" enctype="multipart/form-data">  
     @csrf
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleFormControlInput1">Secret Key</label>
                <input type="text" name="secret_key" value="{{$data->secret_key}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                <label for="">Jaga secret key anda, jangan sampai diketahui orang lain</label>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Metode pembayaran</h6>
        </div>

        <div class="card-body">
            
            <input type="text" name="id" value="{{$data->id}}" hidden>
            @php

                $pembayarans = explode(",",$data->payment_methods);
                $payments = ['CREDIT_CARD', 'BCA', 'BNI', 'BSI', 'BRI', 'MANDIRI', 'PERMATA', 'ALFAMART', 'INDOMARET', 'OVO', 'DANA', 'SHOPEEPAY', 'LINKAJA', 'DD_BRI', 'DD_BCA_KLIKPAY', 'KREDIVO', 'AKULAKU', 'UANGME', 'QRIS'] ;
                $checkeds = array_intersect($payments,$pembayarans);
                $uncheckeds = array_diff($payments,$pembayarans);
                $iteration = 0;
            @endphp

            @forelse ($checkeds as $checked)
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="{{$checked}}" name="payment[]" id="loop-{{$iteration}}" checked>
                    <label class="custom-control-label" for="loop-{{$iteration}}">{{$checked}}</label>
                </div>  
                @php
                    $iteration++;
                @endphp
            @empty
            @endforelse

            @forelse ($uncheckeds as $unchecked)
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="{{$unchecked}}" name="payment[]" id="loop-{{$iteration}}">
                    <label class="custom-control-label" for="loop-{{$iteration}}">{{$unchecked}}</label>
                </div>  
                @php
                    $iteration++;
                @endphp
            @empty
            @endforelse

            <div class="mt-3">
                <button type="submit" class="btn btn-success mx-2">Simpan</button>
                <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
            </div>


        </div>
    </div>

</div>


@endsection