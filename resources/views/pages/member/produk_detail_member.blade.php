@extends('layouts.member')

@section('content')
    <div class="spacer"></div>
        <div class="container-fluid">
            @if(!empty($tipe))
                @include('component.produk.produk_detail_member')
            @else
                @include('component.produk.produk_detail_video')
            @endif
            
        <div class="spacer"></div>
    </div>    
    
    

@endsection