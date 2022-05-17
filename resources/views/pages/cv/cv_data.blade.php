@extends('layouts.member')
@section('content')
<div class="spacer"></div>
<div class="container">
    <div class="spacer"></div>

    <div>
        {{-- <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#modalCV">
            Pilih CV
        </button> --}}
        <a href="{{route('cvPrint' )}}" type="button" class="btn btn-success font-weight-bold">Download <span id="tipeCV"></span></a>
    </div>

    <div class="row">
        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 p-5 rounded-lg">
                <span class="btn-round-xxxl alert-success">
                    <img src="{{asset($user->foto)}}" alt="image" class="float-right p-1 bg-white rounded-circle w-100">
                </span>

                <div class="mt-3">
                    <span class="float-right"><i class="fa-solid fa-pencil" onclick="changeName()"></i></span>
                    <h2 class="fw-700 font-lg text-grey-900" id="showNama">{{$user->nama}}</h2>                           
                    <div id="inputNama" style="display: none">
                        <form class="form-inline" action="{{route('memberUpdateNama')}}" method="post">
                            @csrf
                            <input type="text" name="id" value="{{$user->id}}" hidden>
                            <input type="text" name="nama" value="{{$user->nama}}" class="">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg">
                <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Biodata
                    <a href="#" class="float-right" onclick="btnModalBio()"><i class="feather-edit text-grey-800 fw-700 font-sm"></i></a></h2>
                <p id="bioText" class="font-xsss text-grey-600 fw-500 mb-3">{{$user->desc}}</p>
            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg">
                <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Kontak</h2>
                    <div class="row">
                        <form action="{{route('editKontak')}}" method="post" style="width:100%">
                            @csrf
                        <div class="my-2">
                            <span style="width:80%">
                                <label for="Nomor">Nomor</label>
                                <input type="text" name="telepon" id="telepon" value="{{$user->telepon}}" class="form-control bg-color-none text-grey-700" placeholder="nomor">
                            </span>
                        </div>

                        <div class="my-2">
                            <span style="width:80%">
                                <label for="Nomor">LinkedIn</label>
                                <input type="text" name="linkedIn" id="linkedIn" value="{{$user->linkedin}}" class="form-control bg-color-none text-grey-700" placeholder="isi linkedin anda">
                            </span>
                        </div>

                        <div class="my-2">
                            <span style="width:80%">
                                <label for="Nomor">Alamat</label>
                                <input type="text" name="alamat" id="alamat" value="{{$user->alamat}}" class="form-control bg-color-none text-grey-700" placeholder="isi linkedin anda">
                            </span>
                        </div>

                        <div class="my-2">
                            <span style="width:80%">
                                <label for="Nomor">Email</label>
                                <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control bg-color-none text-grey-700" placeholder="isi linkedin anda">
                            </span>
                            
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </form>
                    </div>
                    
            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg">
                <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Pengalaman Kerja
                    <a href="#" onclick="btnModalKerja()" class="float-right" ><i class="feather-plus text-grey-800 fw-700 font-sm"></i></a></h2>
                @forelse ($kerja as $kj)
                <div class="my-2">
                    <p class="font-xss fw-700 text-grey-800 fw-500 mb-1">{{$kj->posisi}}
                        <a href="#" onclick="btnEditKerja({{$kj->id}})" class="float-right" ><i class="feather-edit text-grey-500 font-xs"></i></a></p>
                    <p class="font-xsss text-grey-600 fw-500 mb-0">{{$kj->perusahaan}}</p>
                    <p class="font-xsss text-grey-600 fw-500 mb-2">{{$kj->mulai}} sampai {{$kj->akhir}}</p>
                    <p class="font-xsss text-grey-600 fw-500 mb-3">{{$kj->deskripsi}}</p>
                </div>
                @empty
                    
                @endforelse

            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg">
                <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Pendidikan
                    <a href="#" onclick="btnModalEdu()" class="float-right" ><i class="feather-plus text-grey-800 fw-700 font-sm"></i></a></h2>
                @forelse ($edukasi as $edu)
                <div class="my-2">
                    <p class="font-xss fw-700 text-grey-800 fw-500 mb-1">{{$edu->sekolah}}
                        <a href="#" onclick="btnEditEdu({{$edu->id}})" class="float-right" ><i class="feather-edit text-grey-500 font-xs"></i></a></p>
                    <p class="font-xsss text-grey-600 fw-500 mb-0">{{$edu->jurusan}}</p>
                    <p class="font-xsss text-grey-600 fw-500 mb-2">{{$edu->masuk}} - {{$edu->keluar}}</p>
                    <p class="font-xsss text-grey-600 fw-500 mb-3">Index nilai : {{$edu->gpa}}</p>
                </div>
                @empty
                    
                @endforelse

            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg">
                <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Pelatihan
                    <a href="#" onclick="btnModalTrain()" class="float-right" ><i class="feather-plus text-grey-800 fw-700 font-sm"></i></a></h2>
                @forelse ($training as $tr)
                <div class="my-2">
                    <p class="font-xss fw-700 text-grey-800 fw-500 mb-1">{{$tr->program}}
                        <a href="#" onclick="btnEditTrain({{$tr->id}})"  class="float-right" ><i class="feather-edit text-grey-500 font-xs"></i></a></p>
                    <p class="font-xsss text-grey-600 fw-500 mb-0">{{$tr->penyelenggara}}</p>
                    <p class="font-xsss text-grey-600 fw-500 mb-2">{{$tr->mulai}} sampai {{$tr->akhir}}</p>
                    <p class="font-xsss text-grey-600 fw-500 mb-3">{{$tr->deskripsi}}</p>
                </div>
                @empty
                    
                @endforelse


            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg">
                <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Keahlian
                    <a href="#" onclick="btnModalSkill()" class="float-right" ><i class="feather-plus text-grey-800 fw-700 font-sm"></i></a></h2>
                @forelse ($skil as $sk)
                    <div class="my-2">
                        <p class="font-xss fw-700 text-grey-800 fw-500 mb-1">{{$sk->skil}}
                            <a href="#" onclick="btnEditSkill('{{$sk->skil}}','{{$sk->id}}')" class="float-right" ><i class="feather-edit text-grey-500 font-xs"></i></a></p>
                    </div>    
                @empty
                    
                @endforelse

            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg">
                <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Prestasi
                    <a href="#" onclick="btnModalAcv()"  class="float-right" ><i class="feather-plus text-grey-800 fw-700 font-sm"></i></a></h2>
                @forelse ($prestasi as $acv)
                <div class="my-2">
                    <p class="font-xss fw-700 text-grey-800 fw-500 mb-1">{{$acv->prestasi}}
                        <a href="#" onclick="btnEditAcv('{{$acv->id}}')" class="float-right" ><i class="feather-edit text-grey-500 font-xs"></i></a></p>
                    <p class="font-xsss text-grey-600 fw-500 mb-0">{{$acv->organisasi}}</p>
                    <p class="font-xsss text-grey-600 fw-500 mb-2">{{$acv->tahun}}</p>
                </div>
                @empty
                    
                @endforelse
            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg">
                <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Organisasi
                    <a href="#" onclick="btnModalOrg()"  class="float-right" ><i class="feather-plus text-grey-800 fw-700 font-sm"></i></a></h2>
                @forelse ($organisasi as $org)
                <div class="my-2">
                    <p class="font-xss fw-700 text-grey-800 fw-500 mb-1">{{$org->posisi}}
                        <a href="#" onclick="btnEditOrg('{{$org->id}}')" class="float-right" ><i class="feather-edit text-grey-500 font-xs"></i></a></p>
                    <p class="font-xsss text-grey-600 fw-500 mb-0">{{$org->mulai}} sampai {{$org->akhir}}</p>
                    <p class="font-xsss text-grey-600 fw-500 mb-0">{{$org->organisasi}}</p>
                    <p class="font-xsss text-grey-600 fw-500 mb-2">{{$org->deskripsi}}</p>
                </div>
                @empty
                    
                @endforelse
                

            </div>
        </div>

    </div>

    <div class="spacer"></div>

</div>

{{-- modalBio --}}
<div class="modal fade" id="modalBio" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Biodata</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('editBio')}}" method="post">
            @csrf
            <div class="col-12">
                <div class="form-group mb-3 md-mb25">
                    <textarea id="formBio" name="bio" class="w-100 h125 style2-textarea p-3 form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="rounded-lg btn-sm float-right bg-current text-white text-center font-xsss fw-500 border-2 border-0 w100">Save</button>
                </div>
            </div>
            </form>
        </div>
      </div>
    </div>
</div>

{{-- modalKerja --}}
<div class="modal fade" id="modalKerja" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pekerjaan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('editWork')}}" method="post">
            @csrf
            <div class="col-12 pb-4">
                <div class="form-group mb-3">
                    <label for="">Jabatan</label>
                    <input type="hidden" name="id" id="id" class="form-control bg-color-none text-grey-700" value=""> 
                    <input type="text" name="jabatan" id="jabatan" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group mb-3">
                    <label for="">Perusahaan</label>
                    <input type="text" name="perusahaan" id="perusahaan" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group mb-3">
                    <label for="">Alamat perusahaan</label>
                    <input type="text" name="alamat" id="alamat" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group mb-3">
                    <label for="">Mulai</label>
                    <input type="date" name="mulai" id="mulai" class="form-control bg-color-none text-grey-700" value="">                        
                </div>
                <div class="form-group mb-3">
                    <label for="">Akhir</label>
                    <input type="date" name="akhir" id="akhir" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group mb-3">
                    <label for="">Deskripsi</label>
                    <input type="text" name="desc" id="desc" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group">
                    <button type="submit" class="rounded-lg btn-sm float-right bg-current text-white text-center font-xsss fw-500 border-2 border-0 w100">Save</button>
                </div>
            </div>
            </form>
        </div>
      </div>
    </div>
</div>

{{-- modalPendidikan --}}
<div class="modal fade" id="modalEdu" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pendidikan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('editEdu')}}" method="post">
            @csrf
            <div class="col-12 pb-4">
                <div class="form-group mb-3">
                    <label for="">level</label>
                    <input type="hidden" name="id" id="id_edu" class="form-control bg-color-none text-grey-700" value=""> 
                    <input type="text" name="level" id="level" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group mb-3">
                    <label for="">sekolah</label>
                    <input type="text" name="sekolah" id="sekolah" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group mb-3">
                    <label for="">jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group mb-3">
                    <label for="">masuk</label>
                    <input type="number" name="masuk" id="masuk" min="1900" max="2099" step="1" class="form-control bg-color-none text-grey-700" value="" />                        
                </div>
                <div class="form-group mb-3">
                    <label for="">keluar</label>
                    <input type="number" name="keluar" id="keluar" min="1900" max="2099" step="1" class="form-control bg-color-none text-grey-700" value="" />                        
                </div>
                <div class="form-group mb-3">
                    <label for="">gpa</label>
                    <input type="number" name="gpa" id="gpa" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group">
                    <button type="submit" class="rounded-lg btn-sm float-right bg-current text-white text-center font-xsss fw-500 border-2 border-0 w100">Save</button>
                </div>
            </div>
            </form>
        </div>
      </div>
    </div>
</div>

{{-- modalTraining --}}
<div class="modal fade" id="modalTrain" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Training</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('editTrain')}}" method="post">
            @csrf
            <div class="col-12 pb-4">
                <div class="form-group mb-3">
                    <label for="">program</label>
                    <input type="hidden" name="id" id="id_train" class="form-control bg-color-none text-grey-700" value=""> 
                    <input type="text" name="program" id="program" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group mb-3">
                    <label for="">penyelenggara</label>
                    <input type="text" name="penyelenggara" id="penyelenggara" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group mb-3">
                    <label for="">mulai</label>
                    <input type="date" name="mulai" id="mulai_train" step="1" class="form-control bg-color-none text-grey-700" value="" />                        
                </div>
                <div class="form-group mb-3">
                    <label for="">akhir</label>
                    <input type="date" name="akhir" id="akhir_train" step="1" class="form-control bg-color-none text-grey-700" value="" />                        
                </div>
                <div class="form-group mb-3">
                    <label for="">deskripsi</label>
                    <input type="text" name="desc" id="desc_train" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group">
                    <button type="submit" class="rounded-lg btn-sm float-right bg-current text-white text-center font-xsss fw-500 border-2 border-0 w100">Save</button>
                </div>
            </div>
            </form>
        </div>
      </div>
    </div>
</div>

{{-- modalSkill --}}
<div class="modal fade" id="modalSkill" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Keahlian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('editSkil')}}" method="post">
            @csrf
            <div class="col-12 pb-4">
                <div class="form-group mb-3 md-mb25">
                    <input type="hidden" id="id_skil" name="id" class="w-100 h125 style2-textarea p-3 form-control"/>
                    <input type="text" id="formSkill" name="skil" class="form-control bg-color-none text-grey-700" value=""/>
                </div>
                <div class="form-group">
                    <button type="submit" class="rounded-lg btn-sm float-right bg-current text-white text-center font-xsss fw-500 border-2 border-0 w100">Save</button>
                </div>
            </div>
            </form>
        </div>
      </div>
    </div>
</div>

{{-- modalPrestasi --}}
<div class="modal fade" id="modalAcv" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Prestasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('editAcv')}}" method="post">
            @csrf
            <div class="col-12 pb-4">
                <div class="form-group mb-3">
                    <label for="">prestasi</label>
                    <input type="hidden" name="id" id="id_acv" class="form-control bg-color-none text-grey-700" value=""> 
                    <input type="text" name="prestasi" id="prestasi" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group mb-3">
                    <label for="">organisasi</label>
                    <input type="text" name="organisasi" id="organisasi" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group mb-3">
                    <label for="">tahun</label>
                    <input type="number" name="tahun" id="tahun_acv" min="1900" max="2099" step="1" class="form-control bg-color-none text-grey-700" value="" />                        
                </div> 
                <div class="form-group">
                    <button type="submit" class="rounded-lg btn-sm float-right bg-current text-white text-center font-xsss fw-500 border-2 border-0 w100">Save</button>
                </div>
            </div>
            </form>
        </div>
      </div>
    </div>
</div>

{{-- modalOrganisasi --}}
<div class="modal fade" id="modalOrg" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Organisasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('editOrg')}}" method="post">
            @csrf
            <div class="col-12 pb-4">
                <div class="form-group mb-3">
                    <label for="">posisi</label>
                    <input type="hidden" name="id" id="id_org" class="form-control bg-color-none text-grey-700" value=""> 
                    <input type="text" name="posisi" id="posisi_org" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group mb-3">
                    <label for="">organisasi</label>
                    <input type="text" name="organisasi" id="organisasi_org" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group mb-3">
                    <label for="">mulai</label>
                    <input type="date" name="mulai" id="mulai_org" step="1" class="form-control bg-color-none text-grey-700" value="" />                        
                </div>
                <div class="form-group mb-3">
                    <label for="">akhir</label>
                    <input type="date" name="akhir" id="akhir_org" step="1" class="form-control bg-color-none text-grey-700" value="" />                        
                </div>
                <div class="form-group mb-3">
                    <label for="">deskripsi</label>
                    <input type="text" name="desc" id="desc_org" class="form-control bg-color-none text-grey-700" value="">                        
                </div> 
                <div class="form-group">
                    <button type="submit" class="rounded-lg btn-sm float-right bg-current text-white text-center font-xsss fw-500 border-2 border-0 w100">Save</button>
                </div>
            </div>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- Pilih CV -->
<div class="modal fade" id="modalCV" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Pilih CV</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row px-3 justify-content-center">
                @forelse ($cvs as $cv)
                <div class="card shadow-sm mx-1" style="width:200px;">
                    <img src="{{asset($cv->gambar)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$cv->nama}}</h5>
                      <a onclick="setCV({{$cv->id}})" class="btn btn-primary btn-sm text-white">Pilih</a>
                    </div>
                </div> 
                @empty
                    
                @endforelse
            </div>
        </div>
        </div>
    </div>
</div>



<script>

    $.ajaxSetup({
	      headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	          'Authorization': `Bearer {{Session::get('token')}}`
	      }
	});

    function changeName(){
        $('#showNama').toggle();
        $('#inputNama').toggle();

    }

    function setCV(id){
        $.ajax({
			type : 'GET',
			url  : "{{ route('cvSet') }}",
			data : {
				id : id
			},
			dataType: 'json',
			success : (data)=>{
                console.log(data.data)
                $('#tipeCV').html(data.data);
                $('#modalCV').modal('hide');
            }
        });
    }

    function btnModalBio(){
        $('#formBio').text($('#bioText').text()) ;
        $('#modalBio').modal('show');
    }

    //KERJA
    function btnEditKerja(id){
        $.ajax({
			type : 'GET',
			url  : "{{ route('getWork') }}",
			data : {
				id : id
			},
			dataType: 'json',
			success : (data)=>{
                data = data.data;
                $('#id').val(data.id);
                $('#jabatan').val(data.posisi);
                $('#perusahaan').val(data.perusahaan);
                $('#alamat').val(data.alamat);
                $('#mulai').val(data.mulai);
                $('#akhir').val(data.akhir);
                $('#desc').val(data.deskripsi);
            }
        });

        $('#modalKerja').modal('show')
    }

    function btnModalKerja(){
        $('#modalKerja').modal('show')
    }

    //EDUKASI
    function btnModalEdu(){
        $('#modalEdu').modal('show')
    }

    function btnEditEdu(id){
        $.ajax({
			type : 'GET',
			url  : "{{ route('getEdu') }}",
			data : {
				id : id
			},
			dataType: 'json',
			success : (data)=>{
                data = data.data;
                console.log(data);
                $('#id_edu').val(data.id);
                $('#sekolah').val(data.sekolah);
                $('#jurusan').val(data.jurusan);
                $('#masuk').val(data.masuk);
                $('#keluar').val(data.keluar);
                $('#gpa').val(data.gpa);
                $('#level').val(data.jenjang);
            }
        });

        $('#modalEdu').modal('show')
    }

    //TRAINING
    function btnModalTrain(){
        $('#modalTrain').modal('show')
    }

    function btnEditTrain(id){
        $.ajax({
			type : 'GET',
			url  : "{{ route('getTrain') }}",
			data : {
				id : id
			},
			dataType: 'json',
			success : (data)=>{
                data = data.data;
                $('#id_train').val(data.id);
                $('#program').val(data.program);
                $('#penyelenggara').val(data.penyelenggara);
                $('#mulai_train').val(data.mulai);
                $('#akhir_train').val(data.akhir);
                $('#desc_train').val(data.deskripsi);
            }
        });

        $('#modalTrain').modal('show')
    }

    //SKILL
    function btnModalSkill(){
        $('#modalSkill').modal('show');
    }

    function btnEditSkill(data,id){
        $('#formSkill').val(data)
        $('#id_skil').val(id);
        $('#modalSkill').modal('show');
    }

    //ACV
    function btnModalAcv(){
        $('#modalAcv').modal('show');
    }

    function btnEditAcv(id){
        $.ajax({
			type : 'GET',
			url  : "{{ route('getAcv') }}",
			data : {
				id : id
			},
			dataType: 'json',
			success : (data)=>{
                data = data.data;
                $('#id_acv').val(data.id);
                $('#prestasi').val(data.prestasi);
                $('#organisasi').val(data.organisasi);
                $('#tahun_acv').val(data.tahun);
                $('#modalAcv').modal('show');
            }
        });
    }

    //ORG
    function btnModalOrg(){
        $('#modalOrg').modal('show');
    }

    function btnEditOrg(id){
        $.ajax({
			type : 'GET',
			url  : "{{ route('getOrg') }}",
			data : {
				id : id
			},
			dataType: 'json',
			success : (data)=>{
                data = data.data;
                $('#id_org').val(data.id);
                $('#posisi_org').val(data.posisi);
                $('#organisasi_org').val(data.organisasi);
                $('#mulai_org').val(data.mulai);
                $('#akhir_org').val(data.akhir);
                $('#desc_org').val(data.deskripsi);
                $('#modalOrg').modal('show');
            }
        });
    }

    

</script>

@endsection