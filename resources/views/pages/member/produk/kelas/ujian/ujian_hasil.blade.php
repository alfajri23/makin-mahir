@extends('layouts.member')

@section('content')
    <div class="spacer"></div>

    <div class="w-100 position-relative mt-4 mt-sm-0">
            <div class="col-12 col-sm-12 mx-auto mt-4 mt-sm-0">
                <div class="card-image w-100">
                    <a class="video-bttn position-relative d-block">
                        <img src="{{asset($data->poster)}}" alt="image" class="w-100">
                    </a>
                </div>
            </div>

            <div class="container pb-4 bg-light">
                <div class="col-xl-8 col-lg-6 align-items-center d-flex">
                    <div class="card w-100 border-0 bg-transparent d-block mt-3">
                        <h2 class="fw-700 text-grey-900 display5-size display4-lg-size display4-md-size lh-1 mb-0 os-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
                            {{$data['judul']}}
                        </h2>
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-grey-600 mt-3 os-init">
                            {{$data['tentang']}}
                        </h4>
                    </div>
                </div>
            </div>
        
            <div class="row justify-content-between mt-5">
                <div class="col-11 mx-auto mb-5 mb-sm-0">
                    <div class="container">
                        <h2 class="fw-700 font-xs mb-3 mt-1 pl-1 mb-3">TENTANG KELAS</h2>
                        <p class="font-xsss fw-500 lh-28 text-grey-600 mb-0 pl-2 text-justify">
                            {!!$data['desc']!!}
                        </p>
                    </div>

                    <div class="container mt-5">
                        <div class="mb-3">
                            <label class="fw-700 text-grey-800 display2-md-size">Soal</label>

                            <div class="accordion" id="accordionExample">
                                @for($i = 0; $i < count($hasilTest); $i++)
                                <div class="card">
                                  <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{$soals[$i]->id}}" aria-expanded="true" aria-controls="collapse-{{$soals[$i]->id}}">
                                        {{$soals[$i]->no}}. {{$soals[$i]->pertanyaan}}
                                      </button>
                                    </h2>
                                  </div>
                              
                                  <div id="collapse-{{$soals[$i]->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="container">
                                            <p class="{{ $soals[$i]->jawaban == 'A' ? 'text-success' : ''}}">A. {{$soals[$i]->pilihanA}} <span class='float-right'><small>{{$hasilTest[$i]->jawaban  == 'A' ? "Jawaban anda" : ''}}</small></span></p>
                                            <p class="{{ $soals[$i]->jawaban == 'B' ? 'text-success' : ''}}">B. {{$soals[$i]->pilihanB}} <span class='float-right'><small>{{$hasilTest[$i]->jawaban  == 'B' ? "Jawaban anda" : ''}}</small></span></p>
                                            <p class="{{ $soals[$i]->jawaban == 'C' ? 'text-success' : ''}}">C. {{$soals[$i]->pilihanC}} <span class='float-right'><small>{{$hasilTest[$i]->jawaban  == 'C' ? "Jawaban anda" : ''}}</small></span></p>
                                            <p class="{{ $soals[$i]->jawaban == 'D' ? 'text-success' : ''}}">D. {{$soals[$i]->pilihanD}} <span class='float-right'><small>{{$hasilTest[$i]->jawaban  == 'D' ? "Jawaban anda" : ''}}</small></span></p>
                                            <p class="text-dark text-monospace">Jawaban : {{$soals[$i]->penjelasan}}</p>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                @endfor
                            </div>

                        </div>
                    </div>
                </div>
    
            </div>
        <div class="spacer"></div>   
    </div>
    

@endsection