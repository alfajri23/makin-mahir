<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-4" id="printableArea">
            <p class="font-xssss fw-700 lh-28 text-grey-600 pl-0 float-right">{{!empty($history->created_at) ? $history->created_at : ''}}</p>
            <div class="card-body mb-3 pb-0">
                <h4 class="text-uppercase font-weight-bold">{{$datas->code}}</h4>
                <p class="font-xs fw-700 lh-28 text-grey-700 pl-0">{{$datas->name}}</p>
            </div>
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-xl-12">
                        <p class="mb-0 font-weight-bold">Deskripsi</p>
                        <div>{!!$datas->description!!}</div>
    
                        <p class="mb-0 font-weight-bold">Saran pengembangan diri</p>
                        <div>{!!$datas->advice_development!!}</div>
    
                        <p class="mb-0 font-weight-bold">Saran pekerjaan</p>
                        <div>{!!$datas->advice_job!!}</div>
    
                        <p class="mb-0 font-weight-bold">Hubungan</p>
                        <div>{!!$datas->advice_relationship!!}</div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    
    </div>
    
</body>
</html>

