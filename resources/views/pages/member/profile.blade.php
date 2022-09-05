@extends('layouts.public')

@section('content')
    <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden mb-3 pt-5 pt-sm-0" style="">
        <div class="card-body p-lg-5 p-4 bg-black-08">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-lg-12 pl-xl-5 pt-xl-5">
                    <figure class="avatar ml-0 mb-4 position-relative w100 z-index-1"><img src="{{ $user->foto != null ? asset($user->foto) : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png?20150327203541'}}" alt="image" class="float-right p-1 bg-white w-100"></figure>
                </div>
                <div class="col-xl-4 col-lg-6 pl-xl-5 pb-xl-5 pb-3">
                    
                    <h4 class="fw-700 font-md text-white mt-3 mb-1">{{$user->nama}}<i class="ti-check font-xssss btn-round-xs bg-success text-white ml-1"></i></h4>
                    <span class="font-xssss fw-600 text-grey-500 d-inline-block ml-0">{{$user->email}}</span>
                    <span class="dot ml-2 mr-2 d-inline-block btn-round-xss bg-grey"></span>
                    <span class="font-xssss fw-600 text-grey-500 d-inline-block">{{$user->pendidikan}}</span>
                    <span class="font-xssss fw-600 text-grey-500 d-inline-block"> | {{$user->pekerjaan}}</span>
                    
                </div>
                <div class="col-xl-4 col-lg-6 d-block">
                    <h2 class="display5-size text-white fw-700 lh-1 mr-3">99 % <i class="feather-arrow-up-right text-success font-xl"></i></h2>
                    <h4 class="text-white font-sm fw-600 mt-0 lh-3">"Tinggal sedikit lagi jangan menyerah"</h4>

                </div>
                <div class="col-xl-3 mt-4">
                    <div id="chart-users-blue3" class="mt-2"></div>
                </div>
            </div>
                    
                

        </div>
    </div>

    <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden mb-4">
        <ul class="nav nav-tabs xs-p-4 d-flex align-items-center justify-content-center product-info-tab border-bottom-0" id="pills-tab" role="tablist">
            <li class="active list-inline-item"><a class="fw-700 pb-sm-5 pt-sm-5 xs-mb-2 font-xssss text-grey-500 ls-3 d-inline-block text-uppercase active" href="#navtabs0" data-toggle="tab">About</a></li>
            <li class="list-inline-item"><a class="fw-700 pb-sm-5 pt-sm-5 xs-mb-2 font-xssss text-grey-500 ls-3 d-inline-block text-uppercase" href="#tab-edit" data-toggle="tab">Profil</a></li>
            
        </ul>
    </div>

    <div class="tab-content" id="pills-tabContent" style="width:100%">
        {{-- About Me --}}
        <div class="tab-pane fade show active" id="navtabs0">
            <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-4">
                <div class="card-body mb-3 pb-0">
                    <h2 class="fw-400 font-lg d-block">  
                        <b>About Me</b> 
                        {{-- <a href="#" class="float-right"><i class="feather-edit text-grey-500 font-xs"></i></a> --}}
                    </h2>
                </div>
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="font-xssss fw-600 lh-28 text-grey-500 pl-0">{{$user->desc}}</p>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="spacer"></div>
        </div>

        {{-- Test --}}
        <div class="tab-pane fade show" id="tab-test">
            <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-4">
                <div class="card-body mb-3 pb-0"><h2 class="fw-400 font-lg d-block">  <b>About Me</b> <a href="#" class="float-right"><i class="feather-edit text-grey-500 font-xs"></i></a></h2></div>
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="font-xssss fw-600 lh-28 text-grey-500 pl-0">I have a Business Management degree from Bangalore University and a long time Excel expert. I create professional Excel reports/dashboards for clients and conduct Excel workshops for business professionals. Currently am a freelance motion graphics artist and a Music producer. I like to be productive and creative at work. I like to continuously increase my skills and stay in tuned with the technology industry.</p>
                            <p class="font-xssss fw-600 lh-28 text-grey-500 pl-0">I have a Business Management degree from Bangalore University and a long time Excel expert. I create professional Excel reports/dashboards for clients and conduct Excel workshops for business professionals. Currently am a freelance motion graphics artist and a Music producer. I like to be productive and creative at work. I like to continuously increase my skills and stay in tuned with the technology industry.</p>
                            <ul class="d-flex align-items-center mt-2 mb-3 float-left">
                                <li class="mr-2"><a href="#" class="btn-round-md bg-facebook"><i class="font-xs ti-facebook text-white"></i></a></li>
                                <li class="mr-2"><a href="#" class="btn-round-md bg-twiiter"><i class="font-xs ti-twitter-alt text-white"></i></a></li>
                                <li class="mr-2"><a href="#" class="btn-round-md bg-linkedin"><i class="font-xs ti-linkedin text-white"></i></a></li>
                                <li class="mr-2"><a href="#" class="btn-round-md bg-instagram"><i class="font-xs ti-instagram text-white"></i></a></li>
                                <li class="mr-2"><a href="#" class="btn-round-md bg-pinterest"><i class="font-xs ti-pinterest text-white"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade show" id="tab-edit">
            <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-4">
                <div class="card-body mb-3 pb-0"><h2 class="fw-400 font-lg d-block">  <b>Profil saya</b> <a href="#" class="float-right"><i class="feather-edit text-grey-500 font-xs"></i></a></h2></div>
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-xl-12">
                            <form action="{{route('memberUpdate')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="exampleInputFile">Foto</label><br>
                                    <input type="file" class="" name="foto" id="logo">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama lengkap</label>
                                    <input value="{{$user->id}}" type="hidden" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <input value="{{$user->nama}}" type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email</label>
                                  <input name="email"  value="{{$user->email}}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat</label>
                                    <input  value="{{$user->alamat}}" type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telepon</label>
                                    <input  value="{{$user->telepon}}" type="number" name="telepon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal lahir</label>
                                    <input  value="{{$user->tgl_lahir}}" type="date" name="tgl_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pekerjaan</label>
                                    <input  value="{{$user->pekerjaan}}" type="text" name="pekerjaan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pendidikan</label>
                                    <input  value="{{$user->pendidikan}}" type="text" name="pendidikan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="exampleInputEmail1">Instagram</label>
                                        <input  value="{{$user->ig}}" type="text" class="form-control" name="ig">
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">Twitter</label>
                                        <input  value="{{$user->twitter}}" type="text" class="form-control" name="twitter">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="exampleInputEmail1">LinkedIn</label>
                                        <input  value="{{$user->linkedin}}" type="text" class="form-control" name="linkedin">
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1">Facebook</label>
                                        <input  value="{{$user->facebook}}" type="text" class="form-control" name="facebook">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Deskripsikan singkat diri Anda</label>
                                    <input  value="{{$user->desc}}" type="text" name="desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>

                                <button type="submit" class="btn border-0 w200 bg-primary p-3 text-white fw-600 rounded-lg d-inline-block font-xssss btn-light mt-1 ">Simpan</button>

                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




@endsection