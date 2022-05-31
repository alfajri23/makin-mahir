@extends('layouts.admin')

@section('content')

<div class="container">
    <a href="{{route('notifikasiAdd')}}" class="btn btn-primary">Tambah</a>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
        Tambah
    </button>
    <div class="table-responsive">
        <table class="table table-bordered tableNotifikasi" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th> 
                    <th>Jenis</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('notifikasiStore')}}" method="post" id="formBody" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  {{-- <input type="text" name="nama" class="form-control" id="formNama" aria-describedby="emailHelp"> --}}
                    <textarea name="nama" class="form-control point"> 
                    
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Jenis</label>
                    <input type="text" name="jenis" class="form-control" id="formJudul" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Link</label>
                    <input type="text" name="link" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Tipe</label>
                    <select class="option form-control select-create" name="tipe">
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                    </select>
                </div>

                <div class="form-group" id="customFormAdd" style="display: none;">
                    <label for="exampleInputEmail1">Cari</label>
                    <input type="text" name="names" class="form-control" id="searchNama">
                    <label for="exampleInputEmail1 mt-2">User</label>
                    <select class="form-control" id="selectSection" data-live-search="true" name="id_user">

                    </select>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"
integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': `Bearer {{Session::get('token')}}`
        }
    });

    $(function (){
        $('.tableNotifikasi').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('notifikasiIndex') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true,
                    width: '5%'
                },
                {data: 'nama', name: 'nama',width: '60%'},
                {data: 'jenis', name: 'jenis',width: '5%'},
                {data: 'tipe', name: 'tipe',width: '5%'},
                {data: 'aksi', name: 'aksi',width: '3%'},
            ],
            dom: 'frtlip',
        });

        tinymce.init({
            menubar: 'insert',
            selector: "textarea.point",
            branding: false,
            width: "100%",
            height: "250",
            plugins: [
                "advlist autolink lists charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "paste wordcount link",
                "media"
            ],
            toolbar: "undo redo | bold italic | bullist numlist outdent indent | media | link",
            convert_urls: false,
        });
    });

    function deletes(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('notifikasiDelete') }}",
            dataType: 'json',
            data : {id:id},
            success : (data)=>{
                $('.tableNotifikasi').DataTable().ajax.reload();
            }
        })
    }

    $("#searchNama").on('keyup', function() {
        console.log(this.value);
        let opt;
        $.ajax({
            type : 'GET',
            url  : "{{ route('listMember') }}",
            data : {nama: this.value},
            dataType: 'json',
            success : (data)=>{
                console.log(data.data);
                let datas = data.data;
                    
                    datas.forEach( e => {
                        opt += `<option value="${e.id}">${e.nama}</option>`;
                    });

                    $('#selectSection').html(opt);

            }
        });

    });

    $(".select-create").on('change', function() {
        let customFormAdd = $('#customFormAdd');
        // let opt;
        // let option;
        // if(this.value == 'private'){
            // $.ajax({
            //     type : 'GET',
            //     url  : "{{ route('listMember') }}",
            //     dataType: 'json',
            //     success : (data)=>{
            //         let datas = data.data;
                    
            //         datas.forEach( e => {
            //             opt += `<option value="${e.id}">${e.nama}</option>`;
            //         });

            //         $('#selectSection').append(opt);

            //     }
            // });

            customFormAdd.toggle();
            
        // }else{
        //     customFormAdd.toggle();
        // }
    });


</script>


@endsection