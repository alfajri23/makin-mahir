@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered tableNotifikasi" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th> 
                    <th>Isi</th>
                    <th>Terjawab</th>
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
            <form action="{{route('forumAdminJawab')}}" method="post" id="formBody" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Jawaban</label>
                    <textarea name="jawaban" class="form-control point"> 
                    
                    </textarea>
                </div>

                <input type="number" name="id" id="id_pertanyaan" hidden>
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
            ajax: "{{ route('forumAdmin') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true,
                    width: '5%'
                },
                {data: 'judul', name: 'judul',width: '25%'},
                {data: 'isi', name: 'isi',width: '60%'},
                {data: 'is_answered', name: 'is_answered',width: '2%'},
                {data: 'aksi', name: 'aksi',width: '8%'},
            ],
            dom: 'frtlip',
        });

        tinymce.init({
            menubar: 'insert',
            selector: "textarea",
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

    function show(id) {
        //console.log(id);
        $('#modalCreate').modal('show');
        $('#id_pertanyaan').val(id);
        // let modal = $('#id_pertanyaan');
        // modal = modal[0];
        // console.log(modal);
        // modal.text(id);
    }


</script>


@endsection