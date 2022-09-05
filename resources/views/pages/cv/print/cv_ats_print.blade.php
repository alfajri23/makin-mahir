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
    
    body{
        font-size:12px;
    }

    .title-section{
        font-size:14px;
        padding-bottom: 7px;
        font-weight: 500;
        border-bottom: 0.5px solid rgb(0, 0, 0);
    }

    .subtitle-section{
        font-size:13px;
        font-weight: 500;
    }

    @page{
        margin:0;
    }

    p{
        margin-bottom :  0px !important;
        line-height: 1rem !important;
    }

    .list{

    }

</style>

<body class="p-5">
    <header class="px-2 mb-4">
        <div class="row">
            <table style="width:100%">
                <tbody>
                <tr>
                <td style="text-align:center">
                    <h3>{{$user['nama']}}</h3>
                </td>
                </tr>
                <tr>
                <td style="text-align:center">
                    <p class="mb-0">{{$user['email']}} | {{$user['telepon']}} | {{$user['linkedin']}}</p>
                    <p>{{$user['alamat']}}</p>
                </td>
                </tr>
                </tbody>
            </table>
        </div>
    </header>

    <main class="px-2">
        <div class="personal">
            <h6 class="text-uppercase title-section">{{$label[0]}}</h6>
            <p class="">
                {!!$user['desc']!!}
            </p>
        </div>

        <div class="skill my-4">
            <h6 class="text-uppercase title-section">{{$label[1]}}</h6>
            <ol>
                @forelse ($skil as $sk)
                <li >{{$sk['skil']}}</li>  
                @empty
                @endforelse
            </ol>
        </div>

        @if(count($kerja)>0)
        <div class="work my-4">
            <h6 class="text-uppercase title-section">{{$label[2]}}</h6>
            @forelse ($kerja as $kr)
            <div>
                <table style="width:100%">
                    <tbody>
                    <tr>
                        <td><p class="text-uppercase subtitle-section mb-0">{{$kr['perusahaan']}}</p></td>
                        <td style="text-align: right;"><p class="float-right font-italic mb-0">{{date_format(date_create($kr['mulai']),"M Y")}} - {{date_format(date_create($kr['mulai']),"M Y")}}</p></td>
                    </tr>
                    </tbody>
                </table>
                <p class="mb-0">{{$kr['posisi']}}</p>
                <p class="">{!!$kr['deskripsi']!!}</p>
            </div>
            @empty
            @endforelse
        </div>
        @endif

        @if(count($edukasi)>0)
        <div class="edukasi my-4">
            <h6 class="text-uppercase title-section">{{$label[3]}}</h6>
            @forelse ($edukasi as $edu)
            <div class="mb-2">
                <table style="width:100%">
                    <tbody>
                    <tr>
                    <td><p class="subtitle-section">{{$edu['sekolah']}} | {{$edu['jurusan']}} | {{$edu['gpa']}}</p></td>
                    <td style="text-align: right;"><p class="float-right font-italic mb-0">{{date_format(date_create($edu['masuk']),"M Y")}} - {{date_format(date_create($edu['keluar']),"M Y")}}</p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            @empty
            @endforelse
        </div>
        @endif
        
        @if(count($prestasi)>0)
        <div class="prestasi my-4">
            <h6 class="text-uppercase title-section">{{$label[4]}}</h6>
            @forelse ($prestasi as $ps)
            <div>
                <table style="width:100%">
                    <tbody>
                    <tr>
                        <td><p class="subtitle-section mb-0">{{$ps['prestasi']}}</p></td>
                        <td style="text-align: right;"><p class="float-right font-italic mb-0">{{$ps['tahun']}}</p></td>
                    </tr>
                    </tbody>
                </table>
                <p class="">{!!$ps['organisasi']!!}</p>
            </div>
            @empty
            @endforelse
        </div>
        @endif

        @if(count($training)>0)
        <div class="training my-4">
            <h6 class="text-uppercase title-section">{{$label[5]}}</h6>
            @forelse ($training as $tr)
            <div>
                <table style="width:100%">
                    <tbody>
                    <tr>
                        <td><p class="subtitle-section mb-0">{{$tr['program']}}</p></td>
                        <td style="text-align: right;"><p class="float-right font-italic mb-0">{{date_format(date_create($tr['mulai']),"M Y")}} - {{date_format(date_create($tr['akhir']),"M Y")}}</p></td>
                    </tr>
                    </tbody>
                </table>
                <p class="mb-0">{{$tr['penyelenggara']}}</p>
                <p class="">{!!$tr['deskripsi']!!}</p>
            </div>
            @empty
            @endforelse
        </div>
        @endif

        @if(count($organisasi)>0)
        <div class="work my-4">
            <h6 class="text-uppercase title-section">{{$label[6]}}</h6>
            @forelse ($organisasi as $org)
            <div>
                <table style="width:100%">
                    <tbody>
                    <tr>
                        <td><p class="subtitle-section mb-0">{{$org['posisi']}}</p></td>
                        <td style="text-align: right;"><p class="float-right font-italic mb-0">{{date_format(date_create($org['mulai']),"M Y")}} - {{date_format(date_create($org['mulai']),"M Y")}}</p></td>
                    </tr>
                    </tbody>
                </table>
                <p class="mb-0">{{$org['organisasi']}}</p>
                <p class="">{!!$org['deskripsi']!!}</p>
            </div>
            @empty
            @endforelse
        </div>
        @endif

    </main>
    
</body>
</html>