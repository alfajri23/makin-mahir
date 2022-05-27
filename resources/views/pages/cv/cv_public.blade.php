@extends('layouts.public')
@section('content')
<div class="spacer"></div>
<div class="container">
    <div class="spacer"></div>

    <div class="row">
        <div class="page-title style1 col-12 text-center mb-5">
            <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-warning d-inline-block text-warning mr-1">Online</span>
            <h2 class="poppins text-grey-900 fw-700 display1-size display1-sm-size pb-3 mb-0 mt-3 d-block lh-3">CV Maker</h2>
        </div>
    </div>

    <form action="{{route('printPublicCV')}}" method="post">
    @csrf

    <div>
        <button type="submit" class="btn btn-success font-weight-bold">Download <span id="tipeCV"></span></button>
    </div>

    <div class="row">
        
        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg">
                <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Nama</h2>
                <input type="text" name="user[nama]" value="" class="form-control bg-color-none text-grey-700" placeholder="nama">
            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg">
                <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Biodata</h2>
                <input type="text" name="user[desc]" value="" class="form-control bg-color-none text-grey-700" placeholder="biodata">
            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg">
                <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Kontak</h2>
                <div class="row">
                    <div class="col-md-3 col-12 my-2">
                        <span>
                            <label for="Nomor">Nomor</label>
                            <input type="text" name="user[telepon]" id="telepon" value="" class="form-control bg-color-none text-grey-700" placeholder="nomor">
                        </span>
                    </div>

                    <div class="col-md-3 col-12 my-2">
                        <span>
                            <label for="Nomor">LinkedIn</label>
                            <input type="text" name="user[linkedin]" id="linkedIn" value="" class="form-control bg-color-none text-grey-700" placeholder="isi linkedin anda">
                        </span>
                    </div>

                    <div class="col-md-3 col-12 my-2">
                        <span>
                            <label for="Nomor">Alamat</label>
                            <input type="text" name="user[alamat]" id="alamat" value="" class="form-control bg-color-none text-grey-700" placeholder="isi linkedin anda">
                        </span>
                    </div>

                    <div class="col-md-3 col-12 my-2">
                        <span>
                            <label for="Nomor">Email</label>
                            <input type="email" name="user[email]" id="email" value="" class="form-control bg-color-none text-grey-700" placeholder="isi linkedin anda">
                        </span>
                        
                    </div>
                </div>   
            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg" x-data="{ open: false }">
                <div class="row justify-content-between align-items-center">
                    <div class="col-9">
                        <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Pengalaman Kerja</h2>
                    </div>
                    <div class="">
                        <button x-on:click="open = ! open" type="button" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Jabatan</label>
                            <input type="text" name="kerja[0][posisi]" id="jabatan" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Perusahaan</label>
                            <input type="text" name="kerja[0][perusahaan]" id="perusahaan" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Alamat</label>
                            <input type="text" name="kerja[0][alamat]" id="alamat" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">deskripsi</label>
                            <input type="text" name="kerja[0][deskripsi]" id="deskripsi" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-6 my-2">
                        <span>
                            <label for="Nomor">Mulai</label>
                            <input type="date" name="kerja[0][mulai]" id="mulai" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-6 my-2">
                        <span>
                            <label for="Nomor">Akhir</label>
                            <input type="date" name="kerja[0][akhir]" id="akhir" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>
                </div>

                <div class="row" x-show="open">
                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Jabatan</label>
                            <input type="text" name="kerja[1][posisi]" id="jabatan" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Perusahaan</label>
                            <input type="text" name="kerja[1][perusahaan]" id="perusahaan" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Alamat</label>
                            <input type="text" name="kerja[1][alamat]" id="alamat" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">deskripsi</label>
                            <input type="text" name="kerja[1][deskripsi]" id="deskripsi" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-6 my-2">
                        <span>
                            <label for="Nomor">Mulai</label>
                            <input type="date" name="kerja[1][mulai]" id="mulai" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-6 my-2">
                        <span>
                            <label for="Nomor">Akhir</label>
                            <input type="date" name="kerja[1][akhir]" id="akhir" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg" x-data="{ open: false }">
                <div class="row justify-content-between align-items-center">
                    <div class="col-9">
                        <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Sekolah</h2>
                    </div>
                    <div class="">
                        <button x-on:click="open = ! open" type="button" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Sekolah</label>
                            <input type="text" name="edukasi[0][sekolah]" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-3 col-8 my-2">
                        <span>
                            <label for="Nomor">Jenjang</label>
                            <input type="text" name="edukasi[0][jenjang]" id="jenjang" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-3 col-4 my-2">
                        <span>
                            <label for="Nomor">GPA</label>
                            <input type="text" name="edukasi[0][gpa]" id="gpa" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Jurusan</label>
                            <input type="text" name="edukasi[0][jurusan]" id="jurusan" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-3 col-6 my-2">
                        <span>
                            <label for="Nomor">Masuk</label>
                            <input type="date" name="edukasi[0][masuk]" id="masuk" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-3 col-6 my-2">
                        <span>
                            <label for="Nomor">Keluar</label>
                            <input type="date" name="edukasi[0][keluar]" id="keluar" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>
                </div>

                <div class="row" x-show="open">
                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Sekolah</label>
                            <input type="text" name="edukasi[1][sekolah]" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-3 col-8 my-2">
                        <span>
                            <label for="Nomor">Jenjang</label>
                            <input type="text" name="edukasi[1][jenjang]" id="jenjang" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-3 col-4 my-2">
                        <span>
                            <label for="Nomor">GPA</label>
                            <input type="text" name="edukasi[1][gpa]" id="gpa" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Jurusan</label>
                            <input type="text" name="edukasi[1][jurusan]" id="jurusan" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-3 col-6 my-2">
                        <span>
                            <label for="Nomor">Masuk</label>
                            <input type="date" name="edukasi[1][masuk]" id="masuk" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-3 col-6 my-2">
                        <span>
                            <label for="Nomor">Keluar</label>
                            <input type="date" name="edukasi[1][keluar]" id="keluar" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg" x-data="{ open: false }">
                <div class="row justify-content-between align-items-center">
                    <div class="col-9">
                        <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Training</h2>
                    </div>
                    <div class="">
                        <button x-on:click="open = ! open" type="button" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Program</label>
                            <input type="text" name="training[0][program]" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Penyelenggara</label>
                            <input type="text" name="training[0][penyelenggara]" id="penyelenggara" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Deskripsi</label>
                            <input type="text" name="training[0][deskripsi]" id="deskripsi" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-3 col-6 my-2">
                        <span>
                            <label for="Nomor">Masuk</label>
                            <input type="date" name="training[0][mulai]" id="masuk" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-3 col-6 my-2">
                        <span>
                            <label for="Nomor">Keluar</label>
                            <input type="date" name="training[0][akhir]" id="keluar" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>
                </div>

                <div class="row" x-show="open">
                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Program</label>
                            <input type="text" name="training[1][program]" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Penyelenggara</label>
                            <input type="text" name="training[1][penyelenggara]" id="penyelenggara" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Deskripsi</label>
                            <input type="text" name="training[1][deskripsi]" id="deskripsi" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-3 col-6 my-2">
                        <span>
                            <label for="Nomor">Masuk</label>
                            <input type="date" name="training[1][mulai]" id="masuk" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-3 col-6 my-2">
                        <span>
                            <label for="Nomor">Keluar</label>
                            <input type="date" name="training[1][akhir]" id="keluar" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg" x-data="{ open: false }">
                <div class="row justify-content-between align-items-center">
                    <div class="col-9">
                        <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Keahlian</h2>
                    </div>
                    <div class="">
                        <button x-on:click="open = ! open" type="button" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Keahlian</label>
                            <input type="text" name="skil[0][skil]" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2" x-show="open">
                        <span>
                            <label for="Nomor">Keahlian</label>
                            <input type="text" name="skil[1][skil]" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg" x-data="{ open: false }">
                <div class="row justify-content-between align-items-center">
                    <div class="col-9">
                        <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Prestasi</h2>
                    </div>
                    <div class="">
                        <button x-on:click="open = ! open" type="button" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-5 col-12 my-2">
                        <span>
                            <label for="Nomor">Program</label>
                            <input type="text" name="prestasi[0][prestasi]" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-5 col-12 my-2">
                        <span>
                            <label for="Nomor">Organisasi</label>
                            <input type="text" name="prestasi[0][organisasi]" id="organisasi" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-2 col-12 my-2">
                        <span>
                            <label for="Nomor">Tahun</label>
                            <input type="year" name="prestasi[0][tahun]" id="tahun" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                </div>

                <div class="row" x-show="open">
                    <div class="col-sm-5 col-12 my-2">
                        <span>
                            <label for="Nomor">Program</label>
                            <input type="text" name="prestasi[1][prestasi]" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-5 col-12 my-2">
                        <span>
                            <label for="Nomor">Organisasi</label>
                            <input type="text" name="prestasi[1][organisasi]" id="organisasi" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-2 col-12 my-2">
                        <span>
                            <label for="Nomor">Tahun</label>
                            <input type="year" name="prestasi[1][tahun]" id="tahun" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 my-2">
            <div class="card shadow-xss border-0 px-5 py-4 rounded-lg" x-data="{ open: false }">
                <div class="row justify-content-between align-items-center">
                    <div class="col-9">
                        <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Organisasi</h2>
                    </div>
                    <div class="">
                        <button x-on:click="open = ! open" type="button" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Posisi</label>
                            <input type="text" name="organisasi[0][posisi]" id="posisi" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Nama</label>
                            <input type="text" name="organisasi[0][organisasi]" id="nama" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">deskripsi</label>
                            <input type="text" name="organisasi[0][deskripsi]" id="deskripsi" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-6 my-2">
                        <span>
                            <label for="Nomor">Mulai</label>
                            <input type="date" name="organisasi[0][mulai]" id="mulai" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-6 my-2">
                        <span>
                            <label for="Nomor">Akhir</label>
                            <input type="date" name="organisasi[0][akhir]" id="akhir" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>
                </div>

                <div class="row" x-show="open">
                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Posisi</label>
                            <input type="text" name="organisasi[1][posisi]" id="posisi" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Nama</label>
                            <input type="text" name="organisasi[1][organisasi]" id="nama" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-sm-6 col-12 my-2">
                        <span>
                            <label for="Nomor">Deskripsi pekerjaan</label>
                            <input type="text" name="organisasi[1][deskripsi]" id="deskripsi" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-6 my-2">
                        <span>
                            <label for="Nomor">Mulai</label>
                            <input type="date" name="organisasi[1][mulai]" id="mulai" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>

                    <div class="col-6 my-2">
                        <span>
                            <label for="Nomor">Akhir</label>
                            <input type="date" name="organisasi[1][akhir]" id="akhir" value="" class="form-control bg-color-none text-grey-700">
                        </span>
                    </div>
                </div>

            </div>
        </div>



    </div>

</form>

    <div class="spacer"></div>

</div>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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