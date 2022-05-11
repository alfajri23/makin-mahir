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
        font-family: "Roboto";
        src: url("fonts/Roboto-Regular.ttf");
        font-weight: 700; 
        font-style: normal; 
    }

    @font-face {
        font-family: "Poppins";
        src: url("fonts/Poppins-Regular.ttf");
        font-weight: 900; 
        font-style: bold; 
    }

    body {
        font-family: 'Roboto', sans-serif;
        margin:0;
        padding: 0 !important;
    }

    .head{
        border-top: 1px solid green;
        border-bottom: 1px solid green;
    }

    .sub-title{
        font-size: 14px;
        font-weight: bold;
        color: green;
        text-transform: uppercase;
    }

    .desc{
        font-size: 12px;
        line-height:12px;
        color: rgb(70, 70, 70);
    }

</style>

<body>
    <header class="bg-info mb-5">
        <h6 class="nama">{{$user->nama}}</h6>
    </header>

    <main>
        <div class="head py-2 position-relative">

            <div class="row bg-light">
                <div class="col-9 d-inline-block">
                    <div class="col-10">
                        <div>

                            <p class="bg-info sub-title">Tentang Saya</p>
                            <p class="desc">{{$user->desc}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-1 clearfix d-inline-block">
                    <img src="data:image/png;base64,{{ $image }}" style="width:100px" class="rounded float-start" alt="...">
                </div>
            </div>
            
        </div>



        <div>
            <div class="row">
                <div class="col-4">
                    hallo
                </div>
                <div class="col-6">
                    hallos
                </div>
            </div>
        </div>

    </main>

</body>


</html>