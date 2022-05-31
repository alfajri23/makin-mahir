@extends('layouts.admin')

@section('content')

<div class="container">
    <h2 class="text-center h1 font-weight-bold text-gray-800 mb-4">Tambah Event</h2>
    <div class="row">
        <div class="container">
            <form action="{{route('notifikasiStore')}}" method="post" enctype="multipart/form-data">
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

                <button type="submit" class="btn btn-primary ml-3">Tambah</button>
                </form>
        </div>

        
    </div>

  
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"
integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
	$(document).ready(function() {
		 tinymce.init({
	            selector: "textarea",
	            branding: false,
	            width: "100%",
	            height: "400",
	            plugins: [
	                "advlist autolink lists charmap print preview anchor",
	                "searchreplace visualblocks code fullscreen",
	                "paste wordcount link"
	            ],
	            toolbar: "link | undo redo | bold italic | bullist numlist outdent indent "
	      
	    });
	});

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