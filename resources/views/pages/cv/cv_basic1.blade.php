<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-print-css/css/bootstrap-print.min.css" media="print">
    <title>Document</title>
</head>
<style>

    body{
        /* font-size:12px; */
    }

    /* ul{
        list-style: none;
    } */
    .title-section{
        padding-bottom: 7px;
        border-bottom: 1px solid rgb(62, 109, 163);
    }

    .child-flex{
        width:50%;
    }

    #header-cv{
        height: 20%;
        /* background-color:lightgoldenrodyellow; */
    }

    @page {
        margin: 0;
    }

    @media print {

        body {
            -webkit-print-color-adjust: exact;
            visibility: visible;
            /* background-color:lightblue; */
            padding:0;
        }

        #btn-print{
            visibility: hidden;
        }
        #print {
            visibility: visible;
            margin : 0 auto;
            /* background-color:rgb(126, 65, 65); */
            height: 1400px;
            
        }

        #content{
        
        /* background-color: lightgray; */
        height: 1050px;
        }
    }

    
</style>
<body>
    <a id="btn-print" type="button" href="route('')" value="print a div!"> </a>
    <div class="container shadow-sm my-5" id="print">

        <section class="header p-5" id="header-cv">
            <div class="row">
                <div class="col-9 d-flex">
                    <div class="clearfix me-5">
                        <img src="{{asset($user->foto)}}" style="width:150px" class="rounded float-start" alt="...">
                    </div>
                    <div>
                        <h4 class="fw-bold fs-1 text-uppercase">{{$user->nama}}</h4>
                        <p class="fs-6">{{$user->alamat}}</p>
                    </div>
                </div>
                <div class="col-3">
                    <ul style="list-style: none;">
                        <li>{{$user->telepon}}</li>
                        <li>{{$user->email}}</li>
                        <li>{{$user->linkedin}}</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="content p-5">
            <div class="row flex-column flex-wrap" id="content" style="height:1100px">
                
                <div class="about pe-5 py-3 child-flex">
                    <h4 class="title-section fw-bolder text-uppercase fs-5 mb-3 fs-5">Tentang saya</h4>
                    <p>{{$user->desc}}
                    </p>
                </div>

                <div class="skill pe-5 py-3 child-flex">
                    <h4 class="title-section fw-bolder text-uppercase fs-5 mb-3">SKILL</h4>
                    <ul class="ps-0 ms-3">
                        @forelse ($skil as $sk)
                            <li>{{$sk->skil}}</li>
                        @empty
                            
                        @endforelse
                    </ul>
                </div>

                <div class="skill pe-5 py-3 child-flex">
                    <h4 class="title-section fw-bolder text-uppercase fs-5 mb-3">PELATIHAN</h4>
                    @forelse ($training as $tr)
                    <div>
                        <p class="fw-bold mb-0">{{$tr->program}}</p>
                        <p class="mb-0 fst-italic fw-lighter">{{$tr->mulai}} sampai {{$tr->akhir}}</p>
                        <p class="mb-0 fw-normal">{{$tr->penyelenggara}}</p>
                        <p>{{$tr->deskripsi}}
                        </p>
                    </div>
                    @empty
                        
                    @endforelse
                </div>

                <div class="pengalaman-kerja pe-5 py-3 child-flex">
                    <h4 class="title-section fw-bolder text-uppercase fs-5">PENGALAMAN KERJA</h4>
                    @forelse ($kerja as $kr)
                    <div>
                        <p class="fw-bold mb-0">{{$kr->perusahaan}}</p>
                        <p class="mb-0 fst-italic fw-lighter">{{$kr->mulai}} sampai {{$kr->akhir}}</p>
                        <p class="mb-0">{{$kr->posisi}}</p>
                        <p>{{$kr->deskripsi}}
                        </p>
                    </div>
                        
                    @empty
                        
                    @endforelse

                </div>

                <div class="pengalaman-kerja pe-5 py-3 child-flex">
                    <h4 class="title-section fw-bolder text-uppercase fs-5">PENDIDIKAN</h4>
                    @forelse ($edukasi as $edu)
                    <div>
                        <p class="fw-bold mb-0">{{$edu->sekolah}}</p>
                        <p class="mb-0 fst-italic fw-lighter">{{$edu->masuk}} - {{$edu->keluar}}</p>
                        <p class="mb-0">{{$edu->jurusan}}</p>
                        <p>Index nilai : {{$edu->gpa}}
                        </p>
                    </div>
                        
                    @empty
                        
                    @endforelse
                </div>

                <div class="pengalaman-kerja pe-5 py-3 child-flex">
                    <h4 class="title-section fw-bolder text-uppercase fs-5">PRESTASI</h4>
                    @forelse ($prestasi as $pres)
                    <div>
                        <p class="fw-bold mb-0">{{$pres->prestasi}}</p>
                        <p class="mb-0 fst-italic fw-lighter">{{$pres->tahun}}</p>
                        <p class="mb-0">{{$pres->organisasi}}</p>
                        </p>
                    </div>
                        
                    @empty
                        
                    @endforelse
                </div>

                <div class="pengalaman-kerja pe-5 py-3 child-flex">
                    <h4 class="title-section fw-bolder text-uppercase fs-5">ORGANISASI</h4>
                    @forelse ($organisasi as $org)
                    <div>
                        <p class="fw-bold mb-0">{{$org->posisi}}</p>
                        <p class="mb-0">{{$org->organisasi}}</p>
                        <p class="mb-0 fst-italic fw-lighter">{{$org->mulai}} sampai {{$org->akhir}}</p>
                        <p class="mb-0">{{$org->deskripsi}}</p>
                        </p>
                    </div>
                        
                    @empty
                        
                    @endforelse
                </div>

                         
            </div>
        </section>
    </div>
    
</body>
</html>