@extends($layout)

@section('content')

<style>
    .help-konsul{
        background-color: antiquewhite;
        height: 200px;
    }

    .img-banner{
        height: 300px;
        object-fit: cover;
        object-position: 55% 40%;
        border-radius: 30px;
    }

</style>
<div class="container">
    <div class="spacer"></div>
    <div class="">

    <div class="w-100 mb-5">
        <img class="img-banner w-100" src="https://images.unsplash.com/photo-1617704716378-4022638c56e2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80" alt="">
    </div>

    <div class="mb-5">

        <p class="display1-size fw-700 lh-28 text-grey-800">Selamat, {{auth()->user()->nama}}</p>
        <p class="font-xss text-grey-800 fw-500 mb-5">
            Ini adalah hasil dari Tes Minat Bakat kamu menggunakan Tes Riasec.
    
            Yang ditampilkan adalah 2 Hasil tertinggi yang paling menggambarkan dirimu
            <br>
            Hasil ini tidak mutlak, hanya sebagai gambaran
        </p>
    </div>
    

    @forelse ($datas as $dt)
    <div class="mb-5">
        <p class="display1-size fw-700 lh-28 {{$loop->first ? 'text-orange' : 'text-grey-800'}}">{{$dt->name}}</p>
        <div class="mb-3 pb-0">
            <h2 class="font-xss text-grey-800 lh-28 fw-500 d-block">  
                {!!$dt->description!!}
            </h2>
        </div>
    </div>
    @empty
    
    @endforelse
    

    <div class="col-12 my-5 pt-5 help-konsul">
        <div class="text-center">
            <p class="font-lg fw-700 lh-28 text-grey-700 pl-0">Butuh bantuan konsultasi untuk <br> mengetahui potensi kamu ?</p>
            <a href="https://wa.me/+6285856561200?text=Saya%20tertarik%20untuk%20konsultasi" class="btn btn-warning fw-600 text-white font-xss p-2 lh-32 text-center rounded-xl d-inline-block mt-1 px-3" id="btn-replay">Temukan solusi</a>
        </div>
    </div>

    <div class="row my-5">
        @include('component.produk.produk_carousel')
    </div> 

    <div class="col-12 my-5">
        <div class="text-center">
            <a href="{{route('riasecTest',['ulang' => !empty($history->id) ? $history->id : ''  ])}}" class="btn btn-sm  btn-secondary bg-dark fw-400 text-white font-xss lh-32 text-center d-inline-block mt-1" id="btn-replay">Tes ulang</a>
            <a href="{{route('riasecPrint')}}" class="btn btn-sm btn-danger fw-400 text-white font-xss lh-32 text-center d-inline-block mt-1" id="btn-replay">Download PDF</a>
        </div>
    </div>
</div>

</div>


@endsection