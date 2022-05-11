<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <title>Document</title>
    
</head>
<style>

    @font-face {
        font-family: "Roboto-Bold";
        src: url("fonts/Roboto-Bold.ttf");
        font-weight: 700; 
        font-style: bold; 
    }

    body{
        margin:0 !important;
        padding: 0 !important;
        font-size:11px;
    }

    td{
        vertical-align: top;
    }

    .title-section{
        font-size: 13px !important;
        font-weight: bold;
        padding-bottom: 6px;
        border-bottom: 0.8px solid rgb(62, 109, 163);
    }
    .child-flex{
        width:45%;
        display: inline-block;
        margin: 10px;
        background-color:lightblue;
        position: relative;
    }


    .page-break {
        page-break-after: always;
        page-break-before: always;
    }

    .nama{
        font-family: 'Roboto-Bold', sans-serif;
        color: rgb(38, 56, 112);
        font-size:28px; 
        margin-left:15px;
        font-weight:bold;
    }

    .alamat{
        font-size:12px;
        font-weight:bolder;
    }

    p{
        margin:0 !important;
    }

    @page{
        margin:0;
    }

    @media print {
        .page-break {
            page-break-after: always;
            page-break-before: always;
        }
    }

    .page-break {
        page-break-after: always;
        page-break-before: always;
    }

    .childs{
        box-sizing: content-box;
    }

    .cols-5{
        display: inline-block;
        /* color:red !important; */
        width:45% !important;
    }

    .sub-judul{
        font-size:12px !important;
        font-weight: bold ;
    }

</style>

<body>
    <div class="container shadow-sm" id="print" style="">

        <section class="header p-3 py-5" id="header-cv" style="">
            <table>
                <tbody>
                <tr>
                    <td style="width:90%;">
                        <table>
                            <tbody>
                            <tr>
                            <td>
                                <div class="clearfix mr-2 d-inline-block">
                                    <img src="data:image/png;base64,{{ $image }}" style="width:100px" class="rounded float-start" alt="...">
                                </div>
                            </td>
                            <td>
                                <div class="d-inline-block">
                                    <h4 class="font-weight-bold fs-1 text-uppercase nama">{{$user->nama}}</h4>
                                    <div class="col-8">

                                        <p class="alamat font-weight-normal">{{$user->alamat}}</p>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <ul style="list-style: none;">
                            <li>{{$user->telepon}}</li>
                            <li>{{$user->email}}</li>
                            <li>{{$user->linkedin}}</li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>

        <section class="row clearfix" style="">

            <div class="col-4 float-left" style="">

                {{-- KIRI About Me--}}
                <div class="about pe-5 py-3 col-12">
                    <h4 class="title-section font-weight-bold text-uppercase mb-2">Tentang saya</h4>
                    <p>{{$user->desc}}</p>
                </div>
        
                {{-- KIRI Skill--}}
                @if(!empty($skil))
                <div class="skill pe-5 py-3 col-12">
                    <h4 class="title-section font-weight-bold text-uppercase mb-2">SKILL</h4>
                    <ul class="ps-0 ms-3">
                        @forelse ($skil as $sk)
                            <li>{{$sk->skil}}</li>
                        @empty
                            
                        @endforelse
                    </ul>
                </div>
                @endif

                {{-- KANAN Pendidikan--}}
                @if(!empty($edukasi))
                <div class="edukasi-kerja pe-5 py-3 col-12">
                    <h4 class="title-section font-weight-bold text-uppercase">PENDIDIKAN</h4>
                    @forelse ($edukasi as $edu)
                    <div>
                        <p class="sub-judul mt-2">{{$edu->sekolah}}</p>
                        <p class="mb-0 font-italic">{{$edu->masuk}} - {{$edu->keluar}}</p>
                        <p class="mb-0">{{$edu->jurusan}}</p>
                        <p>Index nilai : {{$edu->gpa}}</p>
                    </div>     
                    @empty 
                    @endforelse
                </div>
                @endif
        
            </div>
        
            <div class="col-6 float-right">
                @php
                    $no = 1;
                @endphp
                {{-- KANAN kerja--}}
                @if(!empty($kerja))
                <div class="pengalaman-kerja py-3 col-12">
                    <h4 class="title-section font-weight-bold text-uppercase">PENGALAMAN KERJA</h4>
                    @forelse ($kerja as $kr)
                    @php
                        $no++;
                    @endphp
                    <div>
                        <p class="sub-judul mt-2">{{$kr->perusahaan}}</p>
                        <p class="mb-0 font-italic">{{$kr->mulai}} sampai {{$kr->akhir}}</p>
                        <p class="mb-0">{{$kr->posisi}}</p>
                        <p>{{$kr->deskripsi}}</p>
                    </div>                                 
                    @empty                                 
                    @endforelse
                </div>
                @endif

                {{-- KIRI Train--}}
                @if(!empty($training))
                <div class="training pe-5 py-3 col-12">
                    <h4 class="title-section font-weight-bold text-uppercase mb-2">PELATIHAN</h4>
                    @forelse ($training as $tr)
                    @php
                        $no++;
                    @endphp
                    <div>
                        <p class="sub-judul mt-2">{{$tr->program}}</p>
                        <p class="mb-0 font-italic">{{$tr->mulai}} sampai {{$tr->akhir}}</p>
                        <p class="mb-0 fw-normal">{{$tr->penyelenggara}}</p>
                        <p>{{$tr->deskripsi}}</p>
                    </div>
                    @empty
                    @endforelse
                </div>
                @endif
        
        
                {{-- KANAN Prestasi--}}  
                @if(!empty($prestasi))
                <div class="prestasi pe-5 py-3 col-12">
                    <h4 class="title-section font-weight-bold text-uppercase">PRESTASI</h4>
                    @forelse ($prestasi as $pres)
                    @php
                        $no++;
                    @endphp
                    @if($no == 9)
                        <div class="my-5"></div>
                        <br><br><br>
                    @endif
                    <div>
                        <p class="sub-judul mt-2">{{$pres->prestasi}}</p>
                        <p class="mb-0 font-italic">{{$pres->tahun}}</p>
                        <p class="">{{$pres->organisasi}} - {{$no}}</p>
                    </div> 
                    
                    @empty 
                    @endforelse
                </div>
                @endif
        
                {{-- KIRI Org--}}
                @if(!empty($organisasi))
                <div class="pengalaman-kerja pe-5 py-3 col-12">
                    <h4 class="title-section font-weight-bold text-uppercase">ORGANISASI</h4>
                    @forelse ($organisasi as $org)
                    <div>
                        <p class="sub-judul mt-2">{{$org->posisi}}</p>
                        <p class="mb-0">{{$org->organisasi}}</p>
                        <p class="mb-0 font-italic">{{$org->mulai}} sampai {{$org->akhir}}</p>
                        <p class="">{{$org->deskripsi}}</p>
                    </div>
                    @empty
                    @endforelse
                </div>
                @endif
        
            </div>
        
        </section>

    </div>

</body>
</html>