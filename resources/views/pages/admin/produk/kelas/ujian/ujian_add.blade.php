@extends('layouts.admin')

@section('content')


<div class="container-fluid">
    <h2 class="fw-500 text-grey-800 font-lg">Tambah Ujian</h2>
    <div class="row">
        <div class="col-8">
            <form action="{{route('ujianStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-3">
                <div class="mb-3">
                    <label class="fw-500 text-grey-600 display2-md-size">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$ujian->nama}}">
                    <input type="hidden" name="id_kelas" value="{{$ujian->id_kelas}}">
                    <input type="hidden" name="id" value="{{$ujian->id}}">
                </div>

                <div class="mb-3">
                    <label class="fw-700 text-grey-800 display2-md-size">Soal</label>

                    <div class="accordion accordion-flush" id="babList">
                         {{-- LOOPING BAB --}}
                         @forelse ($soals as $soal)
                         <div class="accordion-item my-2">
                             <h2 class="accordion-header" id="flush-headingOne">
                                 <button id="soalNama-{{$soal->id}}" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$soal->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                    {{$soal->no}}. {{$soal->pertanyaan}}
                                 </button>
                             </h2>

                             <div id="collapse-{{$soal->id}}" class="accordion-collapse collapse py-3" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                 {{-- button --}}
                                 <div class="container">
                                     <p class="{{ $soal->jawaban == 'A' ? 'text-success' : ''}}">A. {{$soal->pilihanA}}</p>
                                     <p class="{{ $soal->jawaban == 'B' ? 'text-success' : ''}}">B. {{$soal->pilihanB}}</p>
                                     <p class="{{ $soal->jawaban == 'C' ? 'text-success' : ''}}">C. {{$soal->pilihanC}}</p>
                                     <p class="{{ $soal->jawaban == 'D' ? 'text-success' : ''}}">D. {{$soal->pilihanD}}</p>
                                 </div>

                                 <div class="clearfix pr-3">
                                     <div class="btn-group float-right" role="group" aria-label="Basic example">
                                        <button onclick="editSoal({{$soal->id}})" type="button" class="btn btn-sm btn-success">Edit</button>
                                        <button onclick="deleteSoal({{$soal->id}})" type="button" class="btn btn-sm btn-danger">Hapus</button>
                                      </div>
                                 </div>
                                 
                             </div>          
                         </div>    

                         @empty
                         @endforelse

                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#soalModal">
                            Tambah soal
                        </button>
                    </div>

                </div>

            </div>
        </div>

        <div class="col-4">
            <div class="p-2">

                <div class="card w-100 text-left border-0 shadow-xss rounded-lg p-3 mb-3">
                    <button type="submit" class="btn btn-success mb-2">Tambahkan</button>
                    <button onclick="deleteUjian({{$ujian->id}})" type="button" class="btn btn-outline-danger">Hapus</button>
                </div>

                <div class="card w-100 text-left border-0 shadow-xss rounded-lg p-3 mb-3">
                    <div class="mb-3">
                        <label class="fw-700 text-grey-800 display2-md-size">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" value="{{$ujian->tanggal_mulai}}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="fw-700 text-grey-800 display2-md-size">Tanggal Mulai</label>
                        <input type="date" name="tanggal_selesai" value="{{$ujian->tanggal_selesai}}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="fw-700 text-grey-800 display2-md-size">Durasi</label>
                        <input type="text" name="durasi" value="{{$ujian->durasi}}" class="form-control">
                    </div>
                </div>

            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Bab -->
<div class="modal fade" id="soalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            
          </button>
        </div>
        <div class="modal-body">
            <form id="form_soal" action="javascript:void(0)">
                <div class="form-group">
                    <label for="exampleInputEmail1">No</label>
                    <input type="number" class="form-control"  name="no" id="no">
                    <input type="hidden" class="form-control"  name="id_soal" id="id_soal">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Soal</label>
                    <input type="text" class="form-control" name="pertanyaan" id="pertanyaan" aria-describedby="emailHelp">
                    <input type="hidden" name="id_ujian" value="{{$ujian->id}}" class="form-control">
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="exampleInputEmail1">A</label>
                        <input type="text" class="form-control" name="pilihanA" id="pilihanA">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1">B</label>
                        <input type="text" class="form-control" name="pilihanB" id="pilihanB">
                    </div>
                </div>

                <div class="form-row mt-1">
                    <div class="col">
                        <label for="exampleInputEmail1">C</label>
                        <input type="text" class="form-control" name="pilihanC" id="pilihanC">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1">D</label>
                        <input type="text" class="form-control" name="pilihanD" id="pilihanD">
                    </div>
                </div>

                <div class="mt-3">
                    <label for="exampleInputEmail1">Jawaban</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jawaban" id="A" value="A">
                        <label class="form-check-label" for="inlineCheckbox1">A</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jawaban" id="B" value="B">
                        <label class="form-check-label" for="inlineCheckbox2">B</label>
                    </div>

                    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jawaban" id="C" value="C">
                        <label class="form-check-label" for="inlineCheckbox2">C</label>
                    </div>

                    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jawaban" id="D" value="D">
                        <label class="form-check-label" for="inlineCheckbox2">D</label>
                    </div>

                </div>

                <div class="mb-3">
                    <label class="fw-700 text-grey-800 display2-md-size">Penjelasan</label>
                    <input type="text" name="penjelasan" id="penjelasan" class="form-control">
                </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
      </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"
integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
    $(document).ready(function() {
        tinymce.init({
                menubar: 'insert',
                selector: "textarea.isi",
                branding: false,
                width: "100%",
                height: "400",
                plugins: [
                    "advlist autolink lists charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "paste wordcount",
                    "media"
                ],
                toolbar: "undo redo | bold italic | bullist numlist outdent indent | media"
        });
    });

    function deleteUjian(id){
        swal({
            title: "Are you sure?",
            text: "Jika dihapus maka data akan hilang",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type : 'GET',
                    url  : "{{ route('ujianDelete') }}",
                    data : {
                        id : id,
                    },
                    dataType: 'json',
                    success : (data)=>{
                        console.log(data);
                        window.location = "{{ route('kelasIndex') }}";
                    }
                });
            } else {
                swal("Aman", "Data Anda aman", "success");
            }
        });


    }

    function editSoal(id) {
        $.ajax({
            type : 'GET',
            url  : "{{ route('soalDetail') }}",
            data : {
                id : id,
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                $('#id_soal').val(id);
                $('#no').val(datas.no);
                $('#pertanyaan').val(datas.pertanyaan);
                $('#penjelasan').val(datas.penjelasan);
                $('#pilihanA').val(datas.pilihanA);
                $('#pilihanB').val(datas.pilihanB);
                $('#pilihanC').val(datas.pilihanC);
                $('#pilihanD').val(datas.pilihanD);
                $('#'+datas.jawaban).prop('checked', true);
                $('#soalModal').modal('show');
            }
        });
    }

    $('#soalModal').on('hidden.bs.modal', function (event) {
        $('#form_soal')[0].reset();
    })


    $('#form_soal').on('submit',function(){
        let data = $(this).serialize();
        console.log(data);

        $.ajax({
            type : 'POST',
            url  : "{{ route('soalCreate') }}",
            data : data,
            dataType: 'json',
            success : (data)=>{
                console.log(data);
                swal("Sukses", "sukses menambah", "success");   
                
                $('#soalModal').modal('hide');
                location.reload();
            }
        });
    });

    function deleteSoal(id){
        swal({
            title: "Are you sure?",
            text: "Jika dihapus maka soal akan hilang",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type : 'GET',
                    url  : "{{ route('soalDelete') }}",
                    data : {
                        id : id,
                    },
                    dataType: 'json',
                    success : (data)=>{
                        location.reload();
                    }
                });
            } else {
                swal("Aman", "Data Anda aman", "success");
            }
        });

        
    }

</script>

@endsection