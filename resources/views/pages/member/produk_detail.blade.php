@extends($layout)


@section('content')
    <div class="spacer"></div>
    <div class="container-fluid">
        @include('component.produk.produk_detail')
        <div class="spacer"></div>
    </div>    
    
    @php
        $data = $rekomen;
        $title = 'rekomendasi lainnya';
        $tipe = $tipe;
    @endphp
    <div class="row bg-light py-4 w__100">
        @include('component.produk.produk_carousel')
    </div>
    <div class="spacer"></div>
    
    

@endsection