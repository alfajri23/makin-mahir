@extends('layouts.public')
@section('content')

<style>
    .form-control{
        line-height: auto !important;
    }

</style>


<div class="col-md-10 col-11 mx-auto">
    <div class="spacer"></div>

    <div class="row">
        <div class="page-title style1 col-12 text-center mb-5">
            <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-warning d-inline-block text-warning mr-1">Online</span>
            <h2 class="poppins text-grey-900 fw-700 display1-size display1-sm-size pb-3 mb-0 mt-3 d-block lh-3">CV Maker</h2>
        </div>
    </div>

    <form action="{{route('printPublicCV')}}" method="get">
    @csrf

    <div class="row">
        
        <div class="col-12 my-3">
            <div class="card shadow-md border-0 p-md-5 p-3 rounded-lg">
                <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Nama</h2>
                <input type="text" name="user[nama]" value="" class="form-control bg-color-none text-grey-700" placeholder="nama">
            </div>
        </div>

        {{-- PERSONAL --}}
        <div class="col-12 my-3">
            <div class="card shadow-md border-0 p-md-5 p-3 rounded-lg">
                <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Personal info</h2>
                <textarea class="" name="user[desc]">

                </textarea>
            </div>
        </div>

        {{-- KONTAK --}}
        <div class="col-12 my-3">
            <div class="card shadow-md border-0 p-md-5 p-3 rounded-lg">
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
                            <input type="text" name="user[alamat]" id="alamat" value="" class="form-control bg-color-none text-grey-700" placeholder="alamat anda">
                        </span>
                    </div>

                    <div class="col-md-3 col-12 my-2">
                        <span>
                            <label for="Nomor">Email</label>
                            <input type="email" name="user[email]" id="email" value="" class="form-control bg-color-none text-grey-700" placeholder="email anda">
                        </span>
                        
                    </div>
                </div>   
            </div>
        </div>

        {{-- KEAHLIAN --}}
        <div class="col-12 my-3">
            <div class="card shadow-md border-0 p-md-5 p-3 rounded-lg" x-data="{ open: false }">
                <div class="row">
                    <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Keahlian</h2>
                </div>

                <div id="content-skill">
                    <div class="row mb-5">
                        <div class="col-12">
                            <span>
                                <label for="Nomor">Keahlian</label>
                                <input type="text" name="skil[0][skil]" value="" class="form-control bg-color-none text-grey-700">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="">
                    <button onclick="addSkill()" type="button" class="btn btn-primary btn-sm">Tambah</button>
                </div>

            </div>
        </div>

        {{-- KERJA --}}
        <div class="col-12 my-3">
            <div class="card shadow-md border-0 p-md-5 p-3 rounded-lg">
                <div class="row ">
                    <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Pengalaman Kerja</h2>
                </div>

                <div id="content-kerja">
                    <div class="row mb-5">
                        <div class="col-sm-4 col-12 my-2">
                            <span>
                                <label for="Nomor">Jabatan</label>
                                <input type="text" name="kerja[0][posisi]" id="jabatan" value="" class="form-control bg-color-none text-grey-700">
                            </span>
                        </div>
    
                        <div class="col-sm-4 col-12 my-2">
                            <span>
                                <label for="Nomor">Perusahaan</label>
                                <input type="text" name="kerja[0][perusahaan]" id="perusahaan" value="" class="form-control bg-color-none text-grey-700">
                            </span>
                        </div>
    
                        <div class="col-sm-4 col-12 my-2">
                            <span>
                                <label for="Nomor">Alamat</label>
                                <input type="text" name="kerja[0][alamat]" id="alamat" value="" class="form-control bg-color-none text-grey-700">
                            </span>
                        </div>
    
                        <div class="col-6 my-2">
                            <span>
                                <label for="Nomor">Mulai</label>
                                <input type="month" name="kerja[0][mulai]" id="mulai" value="" class="form-control bg-color-none text-grey-700">
                            </span>
                        </div>
    
                        <div class="col-6 my-2">
                            <span>
                                <label for="Nomor">Akhir</label>
                                <input type="month" name="kerja[0][akhir]" id="akhir" value="" class="form-control bg-color-none text-grey-700">
                            </span>
                        </div>
    
                        <div class="col-12 my-2">
                            <span>
                                <label for="Nomor">Deskripsi</label>
                                <textarea type="text" name="kerja[0][deskripsi]" id="deskripsi" value=""></textarea>
                            </span>
                        </div>   
                    </div>
                </div>
                <div>
                    <button onclick="addKerja()" type="button" class="btn btn-primary btn-sm">Tambah</button>
                </div>

            </div>
        </div>

        {{-- PENDIDIKAN --}}
        <div class="col-12 my-3">
            <div class="card shadow-md border-0 p-md-5 p-3 rounded-lg">
                <div class="row">
                    <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Sekolah</h2>
                </div>
                
                <div id="content-pendidikan">
                    <div class="row mb-5">
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
                                <input type="month" name="edukasi[0][masuk]" id="masuk" value="" class="form-control bg-color-none text-grey-700">
                            </span>
                        </div>

                        <div class="col-sm-3 col-6 my-2">
                            <span>
                                <label for="Nomor">Keluar</label>
                                <input type="month" name="edukasi[0][keluar]" id="keluar" value="" class="form-control bg-color-none text-grey-700">
                            </span>
                        </div>
                    </div>
                </div>
                <div>
                    <button onclick="addPendidikan()" type="button" class="btn btn-primary btn-sm">Tambah</button>
                </div>
            </div>
        </div>

        {{-- TRAINING --}}
        <div class="col-12 my-3">
            <div class="card shadow-md border-0 p-md-5 p-3 rounded-lg">
                <div class="">
                    <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Training</h2>
                </div>
                
                <div id="content-training">
                    <div class="row mb-5">
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
                                <textarea name="training[0][deskripsi]" id="deskripsi" value="" ></textarea>
                            </span>
                        </div>

                        <div class="col-sm-3 col-6 my-2">
                            <span>
                                <label for="Nomor">Masuk</label>
                                <input type="month" name="training[0][mulai]" id="masuk" value="" class="form-control bg-color-none text-grey-700">
                            </span>
                        </div>

                        <div class="col-sm-3 col-6 my-2">
                            <span>
                                <label for="Nomor">Keluar</label>
                                <input type="month" name="training[0][akhir]" id="keluar" value="" class="form-control bg-color-none text-grey-700">
                            </span>
                        </div>
                    </div>
                </div>
                <div>
                    <button onclick="addTraining()" type="button" class="btn btn-primary btn-sm">Tambah</button>
                </div>

            </div>
        </div>

        {{-- ORGANISASI --}}
        <div class="col-12 my-3">
            <div class="card shadow-md border-0 p-md-5 p-3 rounded-lg">
                <div class="row">
                    <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Organisasi</h2>
                </div>

                <div id="content-organisasi">
                    <div class="row mb-5">
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

                        <div class="col-6 my-2">
                            <span>
                                <label for="Nomor">Mulai</label>
                                <input type="month" name="organisasi[0][mulai]" id="mulai" value="" class="form-control bg-color-none text-grey-700">
                            </span>
                        </div>

                        <div class="col-6 my-2">
                            <span>
                                <label for="Nomor">Akhir</label>
                                <input type="month" name="organisasi[0][akhir]" id="akhir" value="" class="form-control bg-color-none text-grey-700">
                            </span>
                        </div>

                        <div class="col-12 my-2">
                            <span>
                                <label for="Nomor">deskripsi</label>
                                <textarea name="organisasi[0][deskripsi]" id="deskripsi" value="" ></textarea>
                            </span>
                        </div>
 
                    </div>
                </div>
                <div>
                    <button onclick="addOrganisasi()" type="button" class="btn btn-primary btn-sm">Tambah</button>
                </div>

            </div>
        </div>

        {{-- PRESTASI --}}
        <div class="col-12 my-3">
            <div class="card shadow-md border-0 p-md-5 p-3 rounded-lg">
                <div class=""> 
                    <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Prestasi</h2>
                </div>
                
                <div id="content-prestasi">
                    <div class="row mb-5">
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
                                <input type="number" min="1900" max="2099" name="prestasi[0][tahun]" id="tahun" value="" class="form-control bg-color-none text-grey-700">
                            </span>
                        </div>

                        <div class="col-12 my-2">
                            <span>
                                <label for="Nomor">Deskripsi</label>
                                <textarea name="prestasi[0][deskripsi]" id="deskripsi" value="" ></textarea>
                            </span>
                        </div>

                    </div>
                </div>
                <div>
                    <button onclick="addPrestasi()" type="button" class="btn btn-primary btn-sm">Tambah</button>
                </div>
            </div>
        </div>

        <div class="col-12 d-flex justify-content-center mt-5">
            <div>
                <button type="submit" class="btn btn-success font-weight-bold">Download CV<span id="tipeCV"></span></button>
            </div>
        </div>



    </div>

</form>

    <div class="spacer"></div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"
integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
<script>
    $(document).ready(function() {
		tinymce.init({
            selector: "textarea",
            branding: false,
            width: "100%",
            height: "300",
            plugins: [
                "lists"
            ],
            toolbar: "bullist numlist"
	    });
	});


    $.ajaxSetup({
	      headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	          'Authorization': `Bearer {{Session::get('token')}}`
	      }
	});

    let prestasi = 0;
    let organisasi = 0;
    let training = 0;
    let edukasi = 0;
    let kerja = 0;
    let skill = 0;

    function changeName(){
        $('#showNama').toggle();
        $('#inputNama').toggle();

    }

   
    function btnModalBio(){
        $('#formBio').text($('#bioText').text()) ;
        $('#modalBio').modal('show');
    }

    function addKerja(){
        let div = `
        <div class="row mb-5">
            <div class="col-sm-4 col-12 my-2">
                <span>
                    <label for="Nomor">Jabatan</label>
                    <input type="text" name="kerja[${kerja+1}][posisi]" id="jabatan" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-sm-4 col-12 my-2">
                <span>
                    <label for="Nomor">Perusahaan</label>
                    <input type="text" name="kerja[${kerja+1}][perusahaan]" id="perusahaan" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-sm-4 col-12 my-2">
                <span>
                    <label for="Nomor">Alamat</label>
                    <input type="text" name="kerja[${kerja+1}][alamat]" id="alamat" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-6 my-2">
                <span>
                    <label for="Nomor">Mulai</label>
                    <input type="month" name="kerja[${kerja+1}][mulai]" id="mulai" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-6 my-2">
                <span>
                    <label for="Nomor">Akhir</label>
                    <input type="month" name="kerja[${kerja+1}][akhir]" id="akhir" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-12 my-2">
                <span>
                    <label for="Nomor">Deskripsi</label>
                    <textarea type="text" name="kerja[${kerja+1}][deskripsi]" id="inputKerja-${kerja+1}" value=""></textarea>
                </span>
            </div>   
        </div>
        `;

        kerja++;
        $('#content-kerja').append(div);
        tinymce.EditorManager.execCommand('mceAddEditor', true, 'inputKerja-'+ kerja);
        
    }

    function addSkill(){
        let div = `
        <div class="row mb-5">
            <div class="col-12">
                <span>
                    <label for="Nomor">Keahlian</label>
                    <input type="text" name="skil[${skill+1}][skil]" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>
        </div>
        `;

        skill++;
        $('#content-skill').append(div);

    }

    function addPendidikan(){
        let div = `
        <div class="row mb-5">
            <div class="col-sm-6 col-12 my-2">
                <span>
                    <label for="Nomor">Sekolah</label>
                    <input type="text" name="edukasi[${edukasi+1}][sekolah]" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-sm-3 col-8 my-2">
                <span>
                    <label for="Nomor">Jenjang</label>
                    <input type="text" name="edukasi[${edukasi+1}][jenjang]" id="jenjang" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-sm-3 col-4 my-2">
                <span>
                    <label for="Nomor">GPA</label>
                    <input type="text" name="edukasi[${edukasi+1}][gpa]" id="gpa" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-sm-6 col-12 my-2">
                <span>
                    <label for="Nomor">Jurusan</label>
                    <input type="text" name="edukasi[${edukasi+1}][jurusan]" id="jurusan" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-sm-3 col-6 my-2">
                <span>
                    <label for="Nomor">Masuk</label>
                    <input type="month" name="edukasi[${edukasi+1}][masuk]" id="masuk" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-sm-3 col-6 my-2">
                <span>
                    <label for="Nomor">Keluar</label>
                    <input type="month" name="edukasi[${edukasi+1}][keluar]" id="keluar" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>
        </div>
        `;

        edukasi++;
        $('#content-pendidikan').append(div);
    }

    function addOrganisasi(){
        let div = `
        <div class="row mb-5">
            <div class="col-sm-6 col-12 my-2">
                <span>
                    <label for="Nomor">Posisi</label>
                    <input type="text" name="organisasi[${organisasi+1}][posisi]" id="posisi" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-sm-6 col-12 my-2">
                <span>
                    <label for="Nomor">Nama</label>
                    <input type="text" name="organisasi[${organisasi+1}][organisasi]" id="nama" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-6 my-2">
                <span>
                    <label for="Nomor">Mulai</label>
                    <input type="month" name="organisasi[${organisasi+1}][mulai]" id="mulai" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-6 my-2">
                <span>
                    <label for="Nomor">Akhir</label>
                    <input type="month" name="organisasi[${organisasi+1}][akhir]" id="akhir" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-12 my-2">
                <span>
                    <label for="Nomor">deskripsi</label>
                    <textarea name="organisasi[${organisasi+1}][deskripsi]" id="inputOrganisasi-${organisasi+1}" value="" ></textarea>
                </span>
            </div>

        </div>
        `;

        organisasi++;
        $('#content-organisasi').append(div);
        tinymce.EditorManager.execCommand('mceAddEditor', true, 'inputOrganisasi-'+ organisasi);
    }

    function addPrestasi(){
        let div = `
        <div class="row mb-5 border-top">
            <div class="col-sm-5 col-12 my-2">
                <span>
                    <label for="Nomor">Program</label>
                    <input type="text" name="prestasi[${prestasi+1}][prestasi]" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-sm-5 col-12 my-2">
                <span>
                    <label for="Nomor">Organisasi</label>
                    <input type="text" name="prestasi[${prestasi+1}][organisasi]" id="organisasi" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-sm-2 col-12 my-2">
                <span>
                    <label for="Nomor">Tahun</label>
                    <input type="year" name="prestasi[${prestasi+1}][tahun]" id="tahun" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-12 my-2">
                <span>
                    <label for="Nomor">deskripsi</label>
                    <textarea name="prestasi[${prestasi+1}][deskripsi]" id="inputPrestasi-${prestasi+1}" value="" ></textarea>
                </span>
            </div>
        </div>
        `;
        prestasi++;
        $('#content-prestasi').append(div);
        tinymce.EditorManager.execCommand('mceAddEditor', true, 'inputPrestasi-'+ prestasi);
        
    }

    function addTraining(){
        let div = `
        <div class="row mb-5">
            <div class="col-sm-6 col-12 my-2">
                <span>
                    <label for="Nomor">Program</label>
                    <input type="text" name="training[${training+1}][program]" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-sm-6 col-12 my-2">
                <span>
                    <label for="Nomor">Penyelenggara</label>
                    <input type="text" name="training[${training+1}][penyelenggara]" id="penyelenggara" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-sm-6 col-12 my-2">
                <span>
                    <label for="Nomor">Deskripsi</label>
                    <textarea name="training[${training+1}][deskripsi]" id="inputTraining-${training+1}" value="" ></textarea>
                </span>
            </div>

            <div class="col-sm-3 col-6 my-2">
                <span>
                    <label for="Nomor">Masuk</label>
                    <input type="month" name="training[${training+1}][mulai]" id="masuk" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>

            <div class="col-sm-3 col-6 my-2">
                <span>
                    <label for="Nomor">Keluar</label>
                    <input type="month" name="training[${training+1}][akhir]" id="keluar" value="" class="form-control bg-color-none text-grey-700">
                </span>
            </div>
        </div>
        `;

        training++;
        $('#content-training').append(div);
        tinymce.EditorManager.execCommand('mceAddEditor', true, 'inputTraining-'+ training);
    }
    

</script>

@endsection