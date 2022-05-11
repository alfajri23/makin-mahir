<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
    <title>Document</title>
    
</head>
<style>
    
    @font-face {
        font-family: "Poppins";
        src: url("fonts/Poppins-Regular.ttf");
        font-weight: 900; 
        font-style: bold; 
    }

    @font-face {
        font-family: "Roboto";
        src: url("fonts/Roboto-Regular.ttf");
        font-weight: 700; 
        font-style: normal; 
    }

    @font-face {
        font-family: "Roboto-Medium";
        src: url("fonts/Roboto-Medium.ttf");
        font-weight: 700; 
        font-style: bold; 
    }

    body{
        font-family: 'Poppins', sans-serif;
        color: rgb(112, 112, 112);
        font-size: 10px;
        margin:0;
        padding: 0 !important;
        /* font-family: 'Roboto', sans-serif; */
    }
    .title-section{
        color: rgb(58, 57, 57);
        font-family: 'Roboto-Medium', sans-serif;
        text-transform: uppercase;
        font-weight: bold ;
        font-size: 15px !important; 
    }

    .title-section::before{
        content: '';
        background-color:lightblue;
    }

    .left-side{
        border-left: 2px solid rgb(133, 133, 133);
    }

    p{
        font-size:12px !important;
        padding: 0 !important;
        line-height: 15px!important;
        font-family: 'Roboto', sans-serif;
        margin:0 !important;
    }

    .sub-judul{
        color: rgb(94, 94, 94);
        font-size:13px !important;
        font-family: 'Roboto-Medium', sans-serif;
        font-weight: bold ;
        position: relative;
    }

    .sub-judul::before{
        content: "";
        position: absolute;
        width: 10px;
        height: 15px;
        left: 10px;
        top: 40px;
        z-index: -1;
        background-color:lightblue;
    }

    .nama{
        position: relative;
        font-size:60px; 
        margin-left:10px;
        /* line-height:60px; */
        /* height: 40px; */
    }

    .nama::before{
        content: "";
        position: absolute;
        width: 50%;
        height: 15px;
        left: 10px;
        top: 40px;
        z-index: -1;
        background-color:lightblue;
    }
    
    /* .col-4{
        width:200px !important;
        display: inline-block;
        background-color:lightblue;
    }

    .col-6{
        width: 400px;
        display: inline-block;
    } */

</style>

<body>

    <main>
        
        <div class="col-3 d-inline-block float-left">

            <h6 class="title-section mt-4 mb-2">Tentang saya</h6>
            <p>{{$user->desc}}</p>

    
            {{-- KIRI Skill--}}
            <h6 class="title-section mt-4 mb-1">Informasi</h6>
            <p>
                {{$user->email}}
            </p>
            <p>
                {{$user->linkedin}}
            </p>
            <p>
                {{$user->telepon}}
            </p>

            @if(!empty($edukasi))
            <div class="edukasi-kerja child-flex">
                <h6 class="title-section mt-4 mb-1">PENDIDIKAN</h6>
                @foreach ($edukasi as $edu)
                <div class="mb-2">
                    <p class="mb-0">{{$edu->sekolah}}</p>
                    <p class="mb-0 font-italic">{{$edu->masuk}} - {{$edu->keluar}}</p>
                    <p class="mb-0">{{$edu->jurusan}}</p>
                    <p>Index nilai : {{$edu->gpa}}
                    </p>
                </div>
                @endforeach
            </div>
            @endif
    
            {{-- KIRI Skill--}}
            @if(!empty($skil))
            <h6 class="title-section mt-4 mb-1">Skill</h6>
            <ul class="ml-0 pl-3">
                @foreach ($skil as $sk)
                <li class="mb-1">{{$sk->skil}}</li>
                @endforeach
            </ul>
            @endif
    
        </div>



        <div class="col-8 d-inline-block float-right ps-4 left-side">
            <div>
                <h4 class="text-dark nama" style="">{{$user->nama}} Alfajri</h4>
            </div>
    
            {{-- KANAN kerja--}}
            @if(!empty($kerja))
            <div class="pengalaman-kerja col-12">
                <h6 class="title-section mt-3 mb-1">PENGALAMAN KERJA</h6>
                @foreach ($kerja as $kr)
                <div class="mb-2">
                    <p class="mb-0"><span class="sub-judul">{{$kr->perusahaan}}</span> <span class="float-right font-italic">{{date_format(date_create($kr->mulai),"d M Y")}} - {{date_format(date_create($kr->akhir),"d M Y")}}</span></p>
                    <p class="mb-0 p-0" style="padding-top:0">{{$kr->posisi}}</p>
                    <p class="mb-0">{{$kr->deskripsi}}</p>
                </div>                                                                  
                @endforeach
            </div>
            @endif
    
            {{-- KIRI Train--}}
            @if(!empty($training))
            <div class="training col-12">
                <h6 class="title-section mt-3 mb-1">PELATIHAN</h6>
                @foreach ($training as $tr)
                <div class="mb-2">
                    <div class="">
                        <p class="mb-0"><span class="sub-judul">{{$tr->program}}</span><span class="float-right font-italic">{{date_format(date_create($tr->mulai),"d M Y")}} - {{date_format(date_create($tr->akhir),"d M Y")}}</span></p>
                    </div>
                    <p class="mb-0 fw-normal">Penyelenggara : {{$tr->penyelenggara}}</p>
                    <p>{{$tr->deskripsi}}</p>
                </div>
                @endforeach
            </div>
            @endif
    
            {{-- KANAN Prestasi--}}  
            @if(!empty($prestasi))
            <div class="prestasi pe-5 col-12">
                <h6 class="title-section mt-3 mb-1">PRESTASI</h6>
                @foreach ($prestasi as $pres)
                <div class="mb-2">
                    <p class=" mb-0"><span class="sub-judul">{{$pres->prestasi}}</span><span class="float-right font-italic">{{$pres->tahun}}</span></p>
                    <p class="">{{$pres->organisasi}}</p>
                </div> 
                @endforeach
            </div>
            @endif
    
            {{-- KIRI Org--}}
            @if(!empty($organisasi))
            <div class="pengalaman-kerja pe-5 col-12">
                <h6 class="title-section mt-3 mb-1">ORGANISASI</h6>
                @foreach ($organisasi as $org)
                <div class="mb-2">
                    <p class=" mb-0"><span class="sub-judul">{{$org->posisi}}</span><span class="float-right font-italic">{{date_format(date_create($org->mulai),"d M Y")}} - {{date_format(date_create($org->akhir),"d M Y")}}</span></p>
                    <p class="mb-0">{{$org->organisasi}}</p>
                    <p class="">{{$org->deskripsi}}</p>
                </div>
                @endforeach
            </div>
            @endif
    
    
    
    
    
    
        </div>

    </main>
    
    
</body>

</html>