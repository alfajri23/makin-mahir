<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Swiper demo</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
    />
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <!-- Demo styles -->
    <style>
      html,
      body {
        position: relative;
        height: 100%;
      }

      body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
      }

      .swiper {
        width: 100%;
        height: 100%;
      }

      /* .swiper-btn-next{
        background-color: #007aff;
      }

      .swiper-btn-prev{
        background-color: #007aff;
      } */

      .swiper-container{
        position: absolute;
        bottom: 50px;
        color: rgb(37, 39, 39);
        font-size: 40px;
        z-index: 5;
        display: flex;
        justify-content: center;
        width: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .swiper-pagination-bullet {
        width: 20px;
        height: 20px;
        text-align: center;
        line-height: 20px;
        font-size: 12px;
        color: #000;
        opacity: 1;
        background: rgba(0, 0, 0, 0.2);
      }

      .swiper-pagination-bullet-active {
        color: #fff;
        background: #007aff;
      }

      /* input */
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

        .list-group-item{
          cursor: move;
        }

        .prior-section{
          justify-content: center;
          align-items: center;
        }


    </style>
  </head>

  <body>
    <!-- Swiper -->
    <div class="swiper mySwiper" id="swipper">
      <div class="swiper-wrapper">
          <div class="d-none">
              <button id="swiper-next" class="swiper-next">Click</button>
          </div>
        @forelse ($data as $dt)
        <div class="swiper-slide">
          <div class="container">
            <h4 class="text-center mb-4">{{$loop->iteration}}. {{$dt->question}}</h4>
            <div class="row justify-content-around align-items-center">
                <p style="width: 20%" class="text-center">Tidak setuju</p>
                <div style="width: 50%" class="d-flex justify-content-center justify-content-sm-around"> 
                    <label> <input type="radio" value="-2" class="option-input radio {{$dt->category}}" onclick="slide()" name="data-{{$loop->iteration}}" /></label> 
                    <label> <input type="radio" value="-1" class="option-input radio {{$dt->category}}" onclick="slide()"  name="data-{{$loop->iteration}}" /></label> 
                    <label> <input type="radio" value="1" class="option-input radio {{$dt->category}}" onclick="slide()"  name="data-{{$loop->iteration}}" /></label> 
                    <label> <input type="radio" value="2" class="option-input radio {{$dt->category}}" onclick="slide()"  name="data-{{$loop->iteration}}" /></label>
                </div>
                <p style="width: 20%" class="text-center">Sangat setuju</p>
            </div>
          </div>
        </div>
        @empty
          
        @endforelse

        <div class="swiper-slide">
          <button class="btn btn-info" onclick="prior()">Lanjutkan</button>
        </div>

        <div class="swiper-slide">
            <form action="{{route('saveRiasecTest')}}" method="GET" id="formRias">
                @csrf
                <input type="hidden" name="hasil" id="hasil">
                <input type="hidden" name="prior" id="prior_form">
            </form>
            <div class="row justify-content-center">
                <button class="btn btn-primary" onclick="hasils()">Kirim</button>
            </div>
        </div>
        
      </div>

      <div class="swiper-container">
        <div class="btn mx-1 btn-sm btn-primary text-white swiper-btn-prev"><i class="fa-solid fa-arrow-left"></i> sebelumnya</div>
        {{-- <div class="btn mx-1 btn-lg btn-dark swiper-btn-next swiper-next"><i class="fa-solid fa-arrow-right"></i></div> --}}
      </div>

      <div class="swiper-pagination"></div>
    </div>

    <div id="prior-section" class="" style="display: none; height:100vh">
      <div class="container d-flex flex-column justify-content-center align-items-center">
        <h4 class="text-center">Urutkan sesuai kepribadian Anda</h4>
        <ul class="list-group" id="prior">
          <li class="list-group-item" data-prior="r">1.Saya suka membuat dan membangun sesuatu</li>
          <li class="list-group-item" data-prior="i">2.Saya suka mencari tau bagaimana suatu benda bekerja</li>
          <li class="list-group-item" data-prior="a">3.Saya orang yang kreatif</li>
          <li class="list-group-item" data-prior="s">4.Saya sangat senang jika dapat membantu orang lain</li>
          <li class="list-group-item" data-prior="e">5.Saya suka memimpin</li>
          <li class="list-group-item" data-prior="c">6.Saya suka memperhatikan hal detail</li>
        </ul>
        <div class="py-3">
          <button class="btn btn-info text-white mx-auto" onclick="slides()">Lanjutkan</button>
        </div>
      </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <!-- Initialize -->
    <script>
      //tombol utk next
      let next = document.getElementById("swiper-next")


      var swiper = new Swiper(".mySwiper", {
        cssMode : true,
        navigation: {
          nextEl: ".swiper-next",
          prevEl: ".swiper-btn-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          type: "progressbar",
          type: "fraction",
        }
      });

      let swipers = document.getElementById('swipper');
      let priorSection = document.getElementById('prior-section');


      //masuk prior
      function prior(){
        swipers.style.display = "none";
        priorSection.style.display = "flex";
      }

      function slides(){
        swipers.style.display = "block";
        priorSection.style.display = "none";
        next.click();
      }

      var el = document.getElementById('prior');
      var sortable = Sortable.create(el);

    </script>

    {{-- Aksi Akhir --}}
    <script>
        //slide when clicking 
        function slide(){
          next.click();
        }

        let clas;
        let iteration= 0;
        let datas = ['r','i','a','s','e','c'];
        let hasil = [0,0,0,0,0,0];
        let priors_comp = document.getElementsByClassName('list-group-item');


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

            //mengurutkan prioritas
            let priors = [];
            for(let y of priors_comp){
              priors.push(y.dataset.prior);
            }
            
            datas.forEach(data => {
                cek(data);
            });

            // console.log(priors);
            // console.log(hasil);

            document.getElementById('hasil').value = JSON.stringify(hasil);
            document.getElementById('prior_form').value = JSON.stringify(priors);
            document.getElementById('formRias').submit();
        }

        // function kirim(){
        //   document.getElementById('formRias').submit();
        // }

      

    </script>

  </body>

  
</html>
