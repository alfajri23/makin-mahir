@extends('layouts.admin')

@section('content')
<div class="container pt-4">
    <div class="row justify-content-between my-4">
        <h4 class="text-dark font-weight-bold">Settings Webinar</h4>
        <button type="button" data-toggle="modal" data-target="#modalCreate" class="btn btn-primary">Tambah</button>
    </div>
    
    <div class="row">
        @forelse ($data as $dt)
        <div class="col-6 my-1 px-4">
            <div class="custom-control custom-switch d-flex justify-content-between">
                <div>
                    <input type="checkbox" value="{{$dt->status}}" class="custom-control-input" id="switch-{{$dt->id}}" {{$dt->status == 1 ? 'checked' : ''}} >
                    <label  onclick="switchs({{$dt->id}})" class="custom-control-label" for="switch-{{$dt->id}}">
                        <h5>{{$dt->nama}}</h5>
                    </label>
                </div>
                <div style="cursor:pointer" onclick="edit({{$dt->id}})" id="btnEdit-{{$dt->id}}">
                    <i class="fa-solid fa-gear"></i>
                </div>
            </div>
        </div>
            
        @empty
            
        @endforelse
    </div>
</div>


<!-- Modal Edit -->
  <div class="modal fade" id="modalData" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('saveWebinar')}}" method="post" id="formBody" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="hidden" name="id" class="form-control" id="formId" aria-describedby="emailHelp">
                  <input type="text" name="nama" class="form-control" id="formNama" aria-describedby="emailHelp" readonly>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Tipe</label>
                    {{-- <input type="text" name="tipe" class="form-control" id="formTipe" aria-describedby="emailHelp" readonly> --}}
                    <select class="option form-control form-control-sm select-edit" name="tipe">
                        <option value="file">File</option>
                        <option value="option">Opsi</option>
                        <option value="text">Text</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input type="text" name="judul" class="form-control" id="formJudul" aria-describedby="emailHelp">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi</label>
                    <input type="text" name="desc" class="form-control" id="formDesc" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Gambar</label>
                    <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <div id="customFormEdit">

                </div> 
                
                <div id="customForm">

                </div>    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('createWebinar')}}" method="post" id="formBody" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" name="nama" class="form-control" id="formNama" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input type="text" name="judul" class="form-control" id="formJudul" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Tipe</label>
                    <select class="option form-control form-control-sm select-create" name="tipe">
                        <option value="file">File</option>
                        <option value="option">Opsi</option>
                        <option value="text">Text</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi</label>
                    <input type="text" name="desc" class="form-control" id="formDesc" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                    <img id="blah" alt="your image" width="200" />
                    <div>
                        <label for="exampleFormControlFile1">Gambar</label>
                        <input type="file" name="gambar" class="form-control-file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                </div>

                <div id="customFormAdd">

                </div>    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
</div>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': `Bearer {{Session::get('token')}}`
        }
	});

    $(".select-create").on('change', function() {
        let customFormAdd = $('#customFormAdd');
        if(this.value == 'option'){
            let option = `
            <div class="form-group">
                <label for="exampleInputEmail1">Option</label>
                <input type="text" name="data" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            `;
            customFormAdd.html(option);
        }else{
            customFormAdd.html('');
        }
    });

    $(".select-edit").on('change', function() {
        if(this.value == 'option'){
            let option = `
            <div class="form-group">
                <label for="exampleInputEmail1">Option</label>
                <input type="text" name="data" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            `;
            $('#customFormEdit').html(option);
        }else{
            $('#customFormEdit').html('');
        }
    });
    
    function switchs(id){
        let element = $('#switch-'+id);
        let value = element.val();
        let status;
        if(value == 0){
            element.val(1);
            status = 1;
        }else{
            element.val(0);
            status = 0;
        }

        $.ajax({
            type : 'GET',
            url  : "{{ route('formWebinarSwitch') }}",
            data : {
                id : id,
                status : status,
            },
            dataType: 'json',
            success : (data)=>{
                swal("Sukses", data.data, "success");
            }
        });

        //console.log(value);

    }

    $('#modalData').on('hidden.bs.modal', function (event) {
        $('#formBody')[0].reset();
    })

    function edit(id){
        let btn = $('#btnEdit-'+id)
        let data;
        $.ajax({
            type : 'GET',
            url  : "{{ route('detailWebinar') }}",
            data : {
                id : id,
            },
            beforeSend : (btn)=>{
                btn.html = ``;
                btn.html = `<i class="fa-solid fa-spinner"></i>`;
            },
            dataType: 'json',
            success : (datas)=>{
               data = datas.data;
               let form = $('#customForm');
               let formId = $('#formId').val(data.id);
               let formNama = $('#formNama').val(data.nama);
               let formJudul = $('#formJudul').val(data.judul);
               let formTipe = $('#formTipe').val(data.tipe);
               let formDesc = $('#formDesc').val(data.desc);

               if(data.tipe === 'option'){
                   let option = `
                   <div class="form-group">
                        <label for="exampleInputEmail1">Option</label>
                        <input type="text" name="data" value="${data.data}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                   `;
                   form.html(option);
                }else{
                    form.html('');
               }

               
               

               $('#modalData').modal('show');
               //console.log(data);
            }
        });
    }


</script>




@endsection