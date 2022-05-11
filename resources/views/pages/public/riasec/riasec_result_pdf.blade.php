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
        <div class="spacer"></div>
        <div id="printableArea" class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-4 my-3">
        @forelse ($datas as $data)
        <div class="mb-5">
            <h5 class="font-weight-bold pl-3">{{$data->name}}</h5>
            <div class="card-body mb-3 pb-0">
                <p class="font-xss text-grey-700 fw-200 d-block">  
                    {{$data->description}}
                </p>
            </div>
        </div>
        @empty
        
        @endforelse
        </div>
    </div>

</body>
</html>