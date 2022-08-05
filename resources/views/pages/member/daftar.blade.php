<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Makin Mahir</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<style>
    .spacer{
        height: 100px;
    }

    .form-control{
        height: 40px;
    }

    li{
        list-style: decimal;
        margin-left: 25px;
    }

    :root {
        --prm-color: #0381ff;
        --prm-gray: #b1b1b1;
    }
    /*  unnecessary */
    body {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    flex-direction:column;
    }
    section{
    width:100%;
    }
    /*  unnecessary finished*/

    /* CSS */
    .steps {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        position: relative;
    }

    .step-button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: none;
        background-color: var(--prm-gray);
        transition: .4s;
    }

    .step-button[aria-expanded="true"] {
        width: 60px;
        height: 60px;
        background-color: var(--prm-color);
        color: #fff;
    }

    .done {
        background-color: var(--prm-color);
        color: #fff;
    }

    .step-item {
        z-index: 10;
        text-align: center;
    }

    #progress {
    -webkit-appearance:none;
        position: absolute;
        width: 95%;
        z-index: 5;
        height: 10px;
        margin-left: 18px;
        margin-bottom: 18px;
    }

    /* to customize progress bar */
    #progress::-webkit-progress-value {
        background-color: var(--prm-color);
        transition: .5s ease;
    }

    #progress::-webkit-progress-bar {
        background-color: var(--prm-gray);

    }

    .main-wrap{
        width : 100% !important;
    }
</style>

<body class="color-theme-blue mont-font">
    <div class="main-wrap">
        <div class="header-wrapper pt-3 pb-3 shadow-none pos-fixed position-absolute bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 navbar pt-0 pb-0">
                        <a href="{{route('publicIndex')}}"><h1 class="ls-3 fw-700 text-white font-xxl">MakinMahir.id<span class="d-block font-xsssss ls-1 text-grey-500 open-font ">Berkembang dan Makin Mahir !</span></h1></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="spacer"></div>
        
        <h1 class="text-center my-3">Pendaftaran</h1>

    <section>
        <div class="row">
            <div class="col-sm-8 col-11 mx-auto">

                <div class="accordion" id="accordionExample">
    
                    <div class="steps">
                        <progress id="progress" value=0 max=100 ></progress>
                        <div class="step-item">
                            <button class="step-button text-center" type="button" >
                                1
                            </button>
                            <div class="step-title">
                                First Step
                            </div>
                        </div>
                        <div class="step-item">
                            <button class="step-button text-center collapsed" type="button">
                                2
                            </button>
                            <div class="step-title">
                                Second Step
                            </div>
                        </div>
                        <div class="step-item">
                            <button class="step-button text-center collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                3
                            </button>
                            <div class="step-title">
                                Third Step
                            </div>
                        </div>
                    </div>

                    <div id="alert"></div>
                    
                    {{-- REGISTER --}}
                    <div class="card">
                        <div  id="headingOne">
                            
                        </div>
    
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                @auth
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputNama4" class="form-label">Nama</label>
                                        <input type="text" name="name" value="{{auth()->user()->nama}}" class="form-control" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputTel4" class="form-label">Telepon</label>
                                        <input type="tel" name="telepon" value="{{auth()->user()->telepon}}" class="form-control" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputTel4" class="form-label">Email</label>
                                        <input type="email" name="email" value="{{auth()->user()->email}}" class="form-control" readonly>
                                    </div>
                                    <div class="col-6 d-flex">
                                        <div class="d-flex align-items-end">
                                            <button onclick="shows()" class="btn btn-primary text-white px-3">Lanjut</button>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <form class="row g-3" id="formRegister" action="javascript:void(0)" method="post">
                                        <div class="card border border-warning">
                                            <div class="card-body">
                                            Sudah punya akun ? <a class="text-primary text-decoration-none" href="{{route('login')}}">Login Sekarang</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="inputNama4" class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control" id="inputNama">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputTel4" class="form-label">Telepon</label>
                                            <input type="tel" name="telepon" class="form-control" id="inputTelepon">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputTel4" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="inputEmail">
                                        </div>
                                        
                                        <div class="col-md-6">
                                        <label for="inputPassword4" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="inputPassword">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputPassword4" class="form-label">Konfirmasi Password</label>
                                            <input type="password" class="form-control" id="inputPasswordConfirmation">
                                        </div>

                                    
                                        <div class="col-6 d-flex">
                                            <div class="d-flex align-items-end">
                                                <button type="submit" class="btn btn-primary text-white px-3">Lanjut</button>
                                            </div>
                                        </div>
                                    </form>
                                @endauth
                                
                            </div>

                            
                            
                        </div>
                    </div>
    
                    <div class="card">
                        <div  id="headingTwo">
                            
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="container d-flex flex-column-reverse flex-sm-row">
                                    <div class="col-12">
                                        <form action="{{$gateway != null ? route('pembayaranCreateGateway') : route('pembayaranCreate')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                
                                            <div class="form-group my-4">
                                                <label for="exampleInputEmail1" class="fw-600 mb-0">Telepon</label>
                                                <input type="tel" placeholder="081897234771" pattern="08\d{9,10}" maxlength="13" minlength="10" name="telepon" class="form-control" required>
                                                <small class="form-text text-muted">
                                                    Format telepon min.10, max.13
                                                </small>
                                            </div>
                                
                                            @empty(!$pertanyaans)
                                                @php
                                                    $index_bukti = 1;
                                                    $index_pilihan = 0;
                                                @endphp
                                                @for ($i=0;$i<count($pertanyaans);$i++)
                                                    @empty(!$files[$i])
                                                    <img class="w-100" src="{{asset($files[$i])}}"/>
                                                    @endempty
                                                    <div class="form-group my-4">
                                                        <label for="exampleInputEmail1" class="fw-600 mb-0 text-break">{!!$pertanyaans[$i]!!}</label>
                                                        
                                                        @if($tipes[$i] != 'radio')
                                                            <input type="{{$tipes[$i]}}" name="{{$tipes[$i] == 'file' ? 'bukti[]' : 'jawaban[]' }}" class="form-control" {{$required[$i] == 1 ? 'required' : ''}}>
                                                            @if($tipes[$i] == 'file')
                                                                @error('bukti.'.$index_bukti.'')
                                                                <span class="" role="alert alert-danger">
                                                                    <small  class="text-danger">{{ $message }}</small>
                                                                </span>
                                                                @enderror
                                
                                                                @php
                                                                    $index_bukti++;
                                                                @endphp
                                                            @endif
                                                        {{-- Jika tipenya option --}}
                                                        @else
                                                            @php
                                                                $pilihans = explode("/",$pilihan[$i]);
                                                            @endphp
                                
                                                            @forelse ($pilihans as $pil)  
                                                            <div class="form-check">
                                                                <input type="radio" name="pilihan[{{$index_pilihan}}]" value="{{$pil}}" class="form-check-input" required>
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                    {{$pil}}
                                                                </label>
                                                            </div>
                                                            @empty
                                                            @endforelse
                                
                                                            @php
                                                                $index_pilihan++;
                                                            @endphp
                                                        @endif
                                
                                
                                                        @if($tipes[$i] == 'file')
                                                            <small class="form-text text-muted">
                                                                Format file yang diterima pdf, jpg, png, jpeg | Max 2 Mb
                                                            </small>
                                                        @endif
                                                    </div>
                                                @endfor
                                            @endempty
                                          
                                            <div class="form-group my-4">
                                                <div>
                                                    <input type="hidden" name="id" value="{{$data->id}}">
                                                    <input type="hidden" name="id_produk" value="{{$data->id_produk}}">
                                                    <input type="hidden" name="id_kategori" value="{{$data->id_kategori}}">
                                                    <input type="hidden" name="nama" value="{{$data->nama}}">
                                                    @if($data->harga != '#' || $data->harga != null)
                                                    <input type="hidden" name="harga" value="{{$data->harga}}">
                                                    @endif
                                                </div>
                                
                                                <div>
                                                    {{-- <a href="{{route('transferIndex')}}" class=" btn p-2 border-1 mt-3 font-xsss text-center btn-light text-dark text-uppercase fw-600 ls-3">Batal</a>     --}}
                                                    <button type="submit" class="btn p-2 mt-3 font-xsss text-center text-white bg-success text-uppercase fw-600 ls-3">Upload</button>    
                                                </div>
                                            </div>
                                
                                        
                                    </div>
                                
                                   
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="card">
                        <div  id="headingThree">
                            
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                                lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                                probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
        
        
        <div class="footer-wrapper layer-after bg-dark mt-5 py-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 lower-footer"></div>
                    <div class="col-sm-6">
                        <p class="copyright-text">© 2021 copyright. All rights reserved.</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p class="float-right copyright-text">In case of any concern, <a href="#">contact us</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{ asset('js/plugin.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': `Bearer {{Session::get('token')}}`
        }
	});

    const stepButtons = document.querySelectorAll('.step-button');
    const progress = document.querySelector('#progress');

   
    
    function shows(){

        var btn = document.getElementById("myBtn");
        var element1 = document.getElementById("collapseOne");
        var element2 = document.getElementById("collapseTwo");
        
        let myCollapse1 = new bootstrap.Collapse(element1);
        
        myCollapse1.toggle();

        let myCollapse2 = new bootstrap.Collapse(element2);
        
        myCollapse2.toggle();

        stepButtons[1].click();
        
        
    }



    $('#formRegister').on('submit',function(){
        ;
        let datas = {
            name : $('#inputNama').val(),
            email : $('#inputEmail').val(),
            telepon : $('#inputTelepon').val(),
            password : $('#inputPassword').val(),
            password_confirmation : $('#inputPasswordConfirmation').val(),
        };

        $.ajax({
            type : "post",
            url  : "{{ route('registerCustom') }}",
            data : datas,
            dataType: 'json',
            success : (data)=>{
                
                shows();
            },
            error : (data)=>{
                
                    let alert = `
                    <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                        <strong>Gagal !</strong> ${data.responseJSON.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `;

                    let pos =   $('#alert');                   
                    pos[0].innerHTML = alert;
                    console.log($('#alert'));
                    console.log('gagal');
                
            }
        });
        console.log('selesai');
    });



    
    

    Array.from(stepButtons).forEach((button,index) => {
        button.addEventListener('click', () => {
            progress.setAttribute('value', index * 100 /(stepButtons.length - 1) );//there are 3 buttons. 2 spaces.

            stepButtons.forEach((item, secindex)=>{
                if(index > secindex){
                    item.classList.add('done');
                }
                if(index < secindex){
                    item.classList.remove('done');
                }
            })
        })
    })

    
    

</script>





</html>