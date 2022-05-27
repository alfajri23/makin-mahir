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
    </style>
  </head>

  <body>
    <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        @forelse ($data as $dt)
        <div class="swiper-slide">
          <div>
            <p class="fw-bold">Pilih salah satu ?</p>
            <div class="d-flex flex-column">
              <button onclick="change({{$loop->iteration}},'{{$dt->type_1}}',1)" id="{{$loop->iteration}}.1" data-btn="{{$dt->type_1}}" class="btn btn-md btn-outline-dark px-5 py-3 shadow-sm swiper-next" style="display: block; margin: 5px 0;">
                {{$dt->statement_1}}
              </button>
              <button onclick="change({{$loop->iteration}},'{{$dt->type_2}}',2)" id="{{$loop->iteration}}.2" data-btn="{{$dt->type_2}}" class="btn btn-md btn-outline-dark px-5 py-3 shadow-sm swiper-next" style="display: block;">
                {{$dt->statement_2}}
              </button>
            </div>
          </div>
        </div>
        @empty
          
        @endforelse

        <div class="swiper-slide">
          <form id="formTest" action="{{route('saveMbtiTest')}}" method="get">
            @csrf
            <input type="hidden" id="resultTest" name="values" value="">
          </form>
          <button onclick="send()" class="btn btn-md d-block btn-outline-success px-5 py-3 shadow-sm">
            Selesai
          </button>
          
        </div>
        
      </div>

      <div class="swiper-container">
        <div class="btn mx-1 btn-lg btn-dark swiper-btn-prev"><i class="fa-solid fa-arrow-left"></i></div>
        <div class="btn mx-1 btn-lg btn-dark swiper-btn-next swiper-next"><i class="fa-solid fa-arrow-right"></i></div>
      </div>

      <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        navigation: {
          nextEl: ".swiper-next",
          prevEl: ".swiper-btn-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          type: "progressbar",
          type: "fraction",
          // clickable: true,
          // renderBullet: function (index, className) {
          //   return '<span class="' + className + '">' + (index + 1) + "</span>";
          // }
        }
      });
    </script>

    <script>
      let data = [];
      let ids;

      function change(index,value,id){
        //Isi data
        data[index-1] = value;

        ids = id == 1 ? 2 : 1;

        let main = document.getElementById( index +"." +id );
        let second = document.getElementById( index +"." +ids ); 

        if(second.classList.contains("btn-secondary")){
          second.classList.toggle("btn-secondary");
        }
        
        main.classList.toggle("btn-secondary"); 
      }

      function send(){
        let arr = document.getElementById('resultTest');

        //siapkan data
        //let set_data = [...new Set(data)];
        //console.log(set_data);

        let result_data;

        console.log(data);

        const countUnique = arr => {
          const counts = {};
          for (var i = 0; i < arr.length; i++) {
              counts[arr[i]] = 1 + (counts[arr[i]] || 0);
          };
          return counts;
        };

        let result = countUnique(data);

        console.log(result);
        let str = JSON.stringify(result);
        console.log(str);
        arr.setAttribute('value',str);
        
        document.getElementById('formTest').submit();
      }

      

    </script>
  </body>

  
</html>
