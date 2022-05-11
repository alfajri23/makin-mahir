@extends($layout)

@section('content')

<style>
    @media print {
            #btn-replay{
                visibility: hidden;
            }

            
    }

    .help-konsul{
        background-color: antiquewhite;
        height: 200px;
    }

    .img-banner{
        height: 300px;
        object-fit: cover;
        object-position: 55% 80%;
        border-radius: 30px;
    }
</style>

<div class="container">
    <div class="spacer"></div>
    <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-4" id="printableArea">
        <div class="w-100 mb-5">
            <img class="img-banner w-100" src="https://images.unsplash.com/photo-1619431843665-54babc76ac8c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=942&q=80" alt="">
        </div>

        <p class="font-xssss fw-700 lh-28 text-grey-600 pl-0 float-right">{{!empty($history->created_at) ? $history->created_at : ''}}</p>
        <div class="card-body mb-3 pb-0">
            <h2 class="display1-size fw-400 font-lg d-block">  
                <b>{{$datas->code}}</b> 
            </h2>
            <p class="font-xs fw-700 lh-28 text-grey-700 pl-0">{{$datas->name}}</p>
        </div>
        <div class="card-body pb-0">
            <div class="row">

                <div class="col-xl-12">
                    <p class="font-xs fw-700 lh-28 text-grey-700 pl-0">Deskripsi</p>
                    <p class="font-xssss fw-600 lh-28 text-grey-600 pl-0">{!!$datas->description!!}</p>

                    <p class="font-xs fw-700 lh-28 text-grey-700 pl-0">Saran pengembangan diri</p>
                    <p class="font-xssss fw-600 lh-28 text-grey-600 pl-0">{!!$datas->advice_development!!}</p>

                    <p class="font-xs fw-700 lh-28 text-grey-700 pl-0">Saran pekerjaan</p>
                    <p class="font-xssss fw-600 lh-28 text-grey-600 pl-0">{!!$datas->advice_job!!}</p>

                    <p class="font-xs fw-700 lh-28 text-grey-700 pl-0">Hubungan</p>
                    <p class="font-xssss fw-600 lh-28 text-grey-600 pl-0">{!!$datas->advice_relationship!!}</p>
                    
                </div>

                <div class="col-12 my-5 pt-5 help-konsul">
                    <div class="text-center">
                        <p class="font-lg fw-700 lh-28 text-grey-700 pl-0">Butuh bantuan konsultasi untuk <br> mengetahui potensi kamu ?</p>
                        <a href="https://wa.me/+6289619119692?text=Saya%20tertarik%20untuk%20konsultasi" class="btn btn-warning fw-600 text-white font-xss p-2 lh-32 text-center rounded-xl d-inline-block mt-1 px-3" id="btn-replay">Temukan solusi</a>
                    </div>
                </div>

                <div class="col-12 mt-5">
                    @include('component.produk.produk_carousel')
                </div> 

                <div class="col-12 my-5">
                    <div class="text-center">
                        <a href="{{route('mbtiTest',['ulang' => !empty($history->id) ? $history->id : ''  ])}}" class="btn btn-sm  btn-secondary bg-dark fw-400 text-white font-xss lh-32 text-center d-inline-block mt-1" id="btn-replay">Tes ulang</a>
                        <a href="{{route('mbtiPrint')}}" class="btn btn-sm btn-danger fw-400 text-white font-xss lh-32 text-center d-inline-block mt-1" id="btn-replay">Download PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // window.onbeforeunload = function(){
    //     return 'Are you sure you want to leave?';
    // };
</script>


@endsection