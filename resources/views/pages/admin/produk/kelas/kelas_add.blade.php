@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-8">
            <form action="{{route('kelasUpdate')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-3">
                <div class="mb-3">
                    <label class="fw-700 text-grey-800 display2-md-size">Nama kelas</label>
                    <input type="text" name="judul" value="{{$data->judul}}" class="form-control">
                    <input type="hidden" name="id" value="{{$data->id}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="fw-700 text-grey-800 display2-md-size">Tentang kelas</label>
                    <input type="text" name="tentang" value="{{$data->tentang}}"  class="form-control">
                </div>

                <div class="mb-3">
                    <label class="fw-700 text-grey-800 display2-md-size">Deskripsi</label>
                    <input type="text" value="{{$data->desc}}" name="desc" class="form-control">
                        
                </div>

                <div class="mb-3">
                    <label class="fw-700 text-grey-800 display2-md-size">Point yang akan dipelajari</label>
                    <textarea name="point" class="form-control point"> 
                        {{$data->poin_produk}} 
                    </textarea>
                </div>

                <div class="mb-3">
                    <label class="fw-700 text-grey-800 display2-md-size">Bab</label>

                    <div class="accordion accordion-flush" id="babList" >

                        {{-- LOOPING BAB --}}
                        @forelse ($babs as $bab)
                        <div class="accordion-item my-2">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button id="babNama-{{$bab->id}}" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$bab->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                    {{$bab->nama}}
                                </button>
                            </h2>
                            <div id="collapse-{{$bab->id}}" class="accordion-collapse collapse py-3" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                {{-- LOOPING MATERI --}}
                                @forelse ($bab->isi_bab as $isi)     
                                    <div class="accordion-body" id="materi-{{$isi->id}}">
                                        <div class="row">
                                            <div class="col-10">
                                                {{$isi->judul}}
                                            </div>
                                            <div class="col-2">
                                                <a class="btn btn-sm btn-outline-primary" href="{{route('materiDetail',$isi->id)}}">
                                                    <i class="fas fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-sm btn-outline-danger" onclick="deleteMateri({{$isi->id}})">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    
                                @endforelse
                                
                                {{-- button --}}
                                <div class="container">
                                    <a href="{{route('materiCreate',['id_bab' => $bab->id , 'id_kelas' => $data->id ])}}" type="button" class="btn btn-sm btn-outline-primary">Tambah materi</a>
                                    <button type="button" onclick="editBab({{$bab->id}},'{{$bab->nama}}')" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    <a href="{{route('babDelete',$bab->id)}}" type="button" class="btn btn-sm btn-outline-success">Hapus</a>
                                </div>
                            </div>
                        </div>                   
                        @empty
                        @endforelse
                    </div>

                    {{-- Modal Tambah Bab --}}
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#babModal">
                        Tambah bab
                    </button>

                    @if (isset($ujian))
                    <a href="{{route('ujianDetail',$ujian->id)}}" class="btn btn-secondary btn-sm">
                        Detail ujian
                    </a>
                    @else
                    <a href="{{route('ujianInit',$data->id)}}" class="btn btn-outline-secondary btn-sm">
                        Tambah ujian
                    </a>
                    @endif
                </div>

            </div>
        </div>
    
        <div class="col-4">
            <div class="p-3">
                <div class="card w-100 text-left border-0 shadow-xss rounded-lg p-3 mb-3">
                    <button type="submit" class="btn btn-success mb-2">Tambahkan</button>
                    <button onclick="deleteProduk({{$data->id}})" type="button" class="btn btn-outline-danger">Hapus</button>
                </div>

                <div class="card w-100 text-left border-0 shadow-xss rounded-lg p-3 mb-3">
                    <img id="output" src="{{ $data->poster ? asset($data->poster) : 'https://via.placeholder.com/240'}}"/>
                    <div class="custom-file mt-2">
                        <input onchange="loadFile(event)" type="file" class="custom-file-input" name="poster">
                        <label class="custom-file-label" for="customFileLang">Upload gambar</label>
                    </div>
                </div>

                <div class="card w-100 text-left border-0 shadow-xss rounded-lg p-3 mb-3">
                    <div class="mb-3">
                        <p class="mb-0 fw-700 text-grey-800 display2-md-size">Kategori</p>
                        <p class="badge bg-info">{{isset($data->kategori->nama) ? $data->kategori->nama : ''}}</p>
                        <select class="custom-select" name="id_kategori">
                            <option selected value="{{$data->id_kategori}}">Choose...</option>
                            @forelse ($kategori as $kat)
                                <option value="{{$kat->id}}">{{$kat->nama}}</option>
                            @empty  
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="fw-700 text-grey-800 display2-md-size">Harga</label>
                    <input type="text" name="harga" value="{{$data->harga}}" class="form-control">
                </div>

            </form>

            </div>
        </div>
    </div>
</div>

  
<!-- Modal -->
<div class="modal fade" id="babEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit bab</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('babEdit') }}" method="post">
            @csrf
        <div class="modal-body" id="modalBabEdit">
            
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>
      </div>
    </div>
</div>

<!-- Modal Bab -->
<div class="modal fade" id="babModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Bab</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            
          </button>
        </div>
        <div class="modal-body">
            <form id="form_bab" action="javascript:void(0)">
                <input type="text" name="nama_bab" class="form-control">
                <input type="hidden" name="id_kelas" value="{{$data->id}}" class="form-control">
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



<script type="text/javascript">

    $(document).ready(function() {

		tinymce.init({
                menubar: 'insert',
	            selector: "textarea.isi",
	            branding: false,
	            width: "100%",
	            height: "250",
	            plugins: [
	                "advlist autolink lists charmap print preview anchor",
	                "searchreplace visualblocks code fullscreen",
	                "paste wordcount",
                    "media"
	            ],
	            toolbar: "undo redo | bold italic | bullist numlist outdent indent | media"
	    });

        tinymce.init({
                menubar: 'insert',
	            selector: "textarea.point",
	            branding: false,
	            width: "100%",
	            height: "200",
	            plugins: [
	                " lists ",
	            ],
	            toolbar: " bold italic | bullist numlist outdent indent "
	    });

        
	});
   
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

    $('#form_bab').on('submit',function(){
        let data = $(this).serialize();
        console.log(data);

        $.ajax({
            type : 'POST',
            url  : "{{ route('babCreate') }}",
            data : data,
            dataType: 'json',
            success : (data)=>{
                console.log(data);
                swal("Sukses", "sukses menambah", "success");
                let item = `
                <div class="accordion-item my-2">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${data.data.id}" aria-expanded="false" aria-controls="flush-collapseOne">
                            ${data.data.nama}
                        </button>
                    </h2>
                    <div id="collapse-${data.data.id}" class="accordion-collapse collapse py-3" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="container">
                            <a href="http://localhost:8000/materi/create?id_bab=${data.data.id}&id_produk=${data.data.id_produk}" type="button" class="btn btn-sm btn-outline-primary">Tambah materi</a>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            <button type="button" class="btn btn-sm btn-outline-success">Hapus</button>
                        </div>
                    </div>
                </div> 
             
                `;

                $('#babModal').modal('hide');
                $('#babList').append(item);
            }
        });
        
    });

   

    function editBab(id,nama){

        let edit = `
            <input type="text" name="nama" value="${nama}" class="form-control">
            <input type="hidden" name="id" value="${id}" class="form-control">
        `;

        $('#modalBabEdit').html(edit);

        $('#babEdit').modal('show');

    }


    function deleteMateri(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('materiDelete') }}",
            data : {
                id : id,
            },
            dataType: 'json',
            success : (data)=>{
                $('#materi-'+id).remove();
                swal("Sukses", "sukses menghapus", "success");
            }
        });
    }

    function deleteProduk(id){
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
                    url  : "{{ route('kelasDelete') }}",
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

</script>


@endsection