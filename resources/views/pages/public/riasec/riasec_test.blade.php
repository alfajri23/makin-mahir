<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Document</title>
    <style>
        .mt-100 {
            margin-top: 100px
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #d2d2dc;
            border-radius: 0
        }

        .card .card-body {
            padding: 1.25rem 1.75rem
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1.25rem
        }

        .card .card-title {
            color: #000000;
            margin-bottom: 0.625rem;
            text-transform: capitalize;
            font-size: 0.875rem;
            font-weight: 500
        }

        .card .card-description {
            margin-bottom: .875rem;
            font-weight: 400;
            color: #76838f
        }

        p {
            font-size: 0.875rem;
            margin-bottom: .5rem;
            line-height: 1.5rem
        }

        @keyframes click-wave {
            0% {
                height: 40px;
                width: 40px;
                opacity: 0.15;
                position: relative
            }

            100% {
                height: 200px;
                width: 200px;
                margin-left: -80px;
                margin-top: -80px;
                opacity: 0
            }
        }

        .option-input {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            position: relative;
            top: 13.33333px;
            right: 0;
            bottom: 0;
            left: 0;
            height:30px;
            width:30px;
            transition: all 0.15s ease-out 0s;
            background: #cbd1d8;
            border: none;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            margin-right: 0.5rem;
            outline: none;
            position: relative;
            z-index: 1000
        }

        .option-input:hover {
            background: #9faab7
        }

        .option-input:checked {
            background: #E91E63
        }

        .option-input:checked::before {
            height: 30px;
            width: 30px;
            position: absolute;
            content: "\f111";
            font-family: "Font Awesome 5 Free";
            display: inline-block;
            font-size: 26.66667px;
            text-align: center;
            line-height: 30px
        }

        .option-input:checked::after {
            -webkit-animation: click-wave 0.25s;
            -moz-animation: click-wave 0.25s;
            animation: click-wave 0.25s;
            background: #E91E63;
            content: '';
            display: block;
            position: relative;
            z-index: 100
        }

        .option-input.radio {
            border-radius: 50%
        }

        .option-input.radio::after {
            border-radius: 50%
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Tes Kepribadian</span>
      </nav>
    <div class="row">
        <div class="col-12">
            <p>Urutkan sesuai kepribadian kamu</p>
            <ul class="list-group" id="list-tipe">
                <li data-id="r" class="list-group-item">Saya suka membuat dan membangun sesuatu</li>
                <li data-id="i" class="list-group-item">Saya suka mencari tau bagaimana suatu benda bekerja</li>
                <li data-id="a" class="list-group-item">Saya orang yang kreatif</li>
                <li data-id="s" class="list-group-item">Saya sangat senang jika dapat membantu orang lain</li>
                <li data-id="e" class="list-group-item">Saya suka memimpin</li>
                <li data-id="c" class="list-group-item">Saya suka memperhatikan hal detail</li>
            </ul>
        </div>

        <div class="col-12 col-sm-8 mx-auto">
        @forelse ($data as $dt)
            <div class="card my-3">
                <div class="card-body">
                    <h4 class="text-center mb-4">{{$loop->iteration}}. {{$dt->question}}</h4>
                    <div class="row justify-content-around align-items-center">
                        <p style="width: 20%" class="text-center">Tidak setuju</p>
                        <div style="width: 60%" class="d-flex justify-content-center justify-content-sm-around"> 
                            <label> <input type="radio" value="-2" class="option-input radio {{$dt->category}}" name="data-{{$loop->iteration}}" /></label> 
                            <label> <input type="radio" value="-1" class="option-input radio {{$dt->category}}" name="data-{{$loop->iteration}}" /></label> 
                            <label> <input type="radio" value="1" class="option-input radio {{$dt->category}}" name="data-{{$loop->iteration}}" /></label> 
                            <label> <input type="radio" value="2" class="option-input radio {{$dt->category}}" name="data-{{$loop->iteration}}" /></label>
                        </div>
                        <p style="width: 20%" class="text-center">Sangat setuju</p>
                    </div>
                </div>
            </div>
        @empty
            
        @endforelse
        </div>
    </div>

    <form action="{{route('saveRiasecTest')}}" method="POST" id="formRias">
        @csrf
        <input type="hidden" name="hasil" id="hasil">
    </form>
    <div class="row justify-content-center">
        <button class="btn btn-primary" onclick="hasils()">Kirim</button>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js" integrity="sha512-zYXldzJsDrNKV+odAwFYiDXV2Cy37cwizT+NkuiPGsa9X1dOz04eHvUWVuxaJ299GvcJT31ug2zO4itXBjFx4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById('list-tipe');
      var sortable = Sortable.create(el);
    
    let clas;
    let iteration= 0;
    let datas = ['r','i','a','s','e','c'];
    let hasil = [0,0,0,0,0,0];

    function cek(data){
        clas = document.getElementsByClassName(data);
        for(var i of clas){
            if(i.checked){
                hasil[iteration] += parseInt(i.value);
            }
        }
        iteration++;
    }

    function hasils(){
        
        datas.forEach(data => {
            cek(data);
        });

        document.getElementById('hasil').value = JSON.stringify(hasil);
        document.getElementById('formRias').submit();
    }


    
</script>
</body>
</html>