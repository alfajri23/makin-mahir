<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
</head>
<style>
    /* coding with nick */

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');

    *{
      box-sizing: border-box;
    }
    body{
      background-color: #b8c6db;
      background-image: linear-gradient(315deg, #b8c6db 0%, #f5f7f7 100%);
      font-family: 'Poppins', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      overflow: hidden;
      margin: 0;
    }
    .quiz-container{
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px 2px rgba(100, 100, 100, 0.1);
      width: 600px;
      overflow: hidden;
    }
    .quiz-number{
      top: 10px;
      right: 10px;
      left: 10px;
      position: relative;
    }
    .quiz-header{
      padding: 4rem;
    }
    h2{
      padding: 1rem;
      text-align: center;
      margin: 0;
    }

    ul{
      list-style-type: none;
      padding: 0;
    }
    ul li{
      font-size: 1.2rem;
      margin: 1rem 0;
    }
    ul li label{
      cursor: pointer;
    }

    .btn-group {
      width: 100%;
    }

    .btn-group>button {
      width:50%;
    }
    /* button{
    background-color: #03cae4;
    color: #fff;
    border: none;
    display: block;
    width: 100%;
    cursor: pointer;
    font-size: 1.1rem;
    font-family: inherit;
    padding: 1.3rem;
    }
    button:hover{
    background-color: #04adc4;
    }
    button:focus{
    outline: none;
    background-color: #44b927;
    } */

    .swiper-pagination-bullet{
      width:30px;
      height: 30px;
      color: white;
      padding-top: 3px;
    }
</style>
<body>
  @php
    $jawaban = [];
  @endphp
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      @forelse ($soals as $soal)
      @php
        $jawaban[] = $soal->jawaban;
      @endphp
      <div class="swiper-slide d-flex justify-content-center">
        <div class="quiz-container" id="quiz">
          <div class="quiz-number">
            <span class="float-start badge bg-info">
              <span class="jam"></span> : 
              <span class="menit"></span> : 
              <span class="detik"></span>
            </span>
            <span class="float-end badge text-dark me-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">( {{$soal->no}} of {{count($soals)}} )</span>
          </div> 
            <div class="quiz-header">
              <h2 id="question">{{$soal->pertanyaan}}</h2>
              <ul>
                <form id="formJawaban-{{$soal->id}}" action="javascript:void(0)">
                  <input type="hidden" name="id_soal" value="{{$soal->id}}">
                  <input type="hidden" name="id_ujian" value="{{$soal->id_ujian}}">
                  <input type="hidden" name="no" value="{{$soal->no}}">
                <li>
                  <input type="radio" name="jawaban" value="A" class="answer">
                  <label for="a" >{{$soal->pilihanA}}</label>
                </li>
        
                <li>
                  <input type="radio" name="jawaban" value="B" class="answer">
                  <label for="b" >{{$soal->pilihanB}}</label>
                </li>
        
                <li>
                  <input type="radio" name="jawaban" value="C" class="answer">
                  <label for="c">{{$soal->pilihanC}}</label>
                </li>
        
                <li>
                  <input type="radio" name="jawaban" value="D" class="answer">
                  <label for="d">{{$soal->pilihanD}}</label>
                </li>
        
              </ul>
            </div>
        
            <div id="submit">
              <div class="btn-group" role="group">
                <button type="button" class="btn btn-light swiper-prev">Previous</button>
                <button onclick="answer({{$soal->id}})" class="btn btn-info text-white swiper-next">Next</button>
              </div>
              </form>
            </div>
        
        </div>
      </div>
      @empty
        
      @endforelse

      <div class="swiper-slide d-flex justify-content-center">
        <div class="quiz-container" id="quiz">
          <div class="quiz-number">
            <span class="float-start badge bg-primary timer" class=""></span>
            <span class="float-end badge text-dark me-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">( {{$soal->no}} of {{count($soals)}} )</span>
          </div> 
            <div class="quiz-header">
              <h2 id="question">Selesai</h2>
            </div>
        
            <div id="submit">
              <div class="btn-group" role="group">
                <button onclick="done()" class="btn btn-info text-white">Selesai</button>
              </div>
            </div>
        
        </div>
      </div> 
    </div>

    @php
      $jawaban = implode(",",$jawaban);
    @endphp
  </div>


    

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Soal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container py-4">
            <div class="row">
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button  onclick="done()" type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
  <script>

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': `Bearer {{Session::get('token')}}`
        }
      });

      // window.addEventListener('beforeunload', (event) => {
      //   //event.preventDefault();
      //   event.returnValue = 'Are you sure you want to leave?';
      // });

      // window.onbeforeunload = function(event)
      // {
      //     return confirm("Confirm refresh");
      // };

      const second = 1000;
      const minute = second * 60;
      const hour = minute * 60;
      const day = hour * 24;
      let init = 0;
      
      let jawaban = "{{$jawaban}}";
      jawaban = jawaban.split(",")

      var interval = {{$ujian->durasi}} * 60000;
      //var interval = 20000;


      let test = {{Session::get('test')}};

      function answer(id){
        $('#formJawaban-'+id).on('submit',function(){
            let data = $(this).serialize();
            let dataForm = $(this).serializeArray();
            //console.log(dataForm.indexOf(3));

            //cek jawaban benar atau salah
            if(dataForm[3] == null){
              data = data + "&benar=0";
            }else if(dataForm[3].value == jawaban[dataForm[2].value-1]){
              data = data + "&benar=1";
            }else{
              data = data + "&benar=0";
            }

            $.ajax({
                type : 'POST',
                url  : "{{ route('answerTest') }}",
                data : data,
                dataType: 'json',
                success : (data)=>{
                    let result = data.data;
                }
            });
        });

        $('#formJawaban-'+id).submit();
      }

      function start(){

          localStorage.endTime = +new Date + interval;
          test = 0;

      }

      function done(){
        localStorage.endTime = 0;
        window.location = "{{ route('enrollProdukDetail',$id_produk) }}";
      }

      function reset(){
        localStorage.endTime = 0;
      }

      if(!localStorage.endTime){
          start();
      }

      setInterval(function(){ 
          var remaining = localStorage.endTime - new Date;
          if( remaining > 0 )
          {
              if(test == 1){
                test = 0;
              }

              let hours = Math.trunc((remaining % day) / hour);
              let minutes = Math.trunc((remaining % hour) / minute);
              let seconds = Math.trunc((remaining % minute) / second);

              $('.jam').text( hours );
              $('.menit').text( minutes );
              $('.detik').text( seconds );

          } else
          {
            if(test == 1){
              start();
            }else{
              console.log('done');
              done();
            }
          }
      }, 1000);

      var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: {
          nextEl: ".swiper-next",
          prevEl: ".swiper-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
          renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
          },
        },
        mousewheel: true,
      });

  </script>
</body>
</html>