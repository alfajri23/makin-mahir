@extends('layouts.admin')

@section('content')

<div class="container">
    <h2 class="text-center h1 font-weight-bold text-gray-800 mb-4">Edit Template</h2>
    <div class="row">
        <div class="col-6">
            <form action="{{route('createTemplate')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input type="text" name="id" value="{{$data->id}}" hidden>
                    <input type="text" name="id_produk" value="{{$id_produk}}" hidden>
                    <input type="text" name="judul" value="{{$data->judul}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input type="text" onkeyup="currencyFormat(this)" value="{{$data->harga}}" name="harga" class="form-control" id="exampleFormControlInput1" placeholder="">
                    <div id="emailHelp" class="form-text">Kosongkan jika gratis</div>
                </div>

                <div class="form-group">
                    <img id="output" src="{{ $data->poster ? asset($data->poster) : 'https://via.placeholder.com/240'}}"/><br>
                    <label for="exampleFormControlInput1">poster</label><br>
                    <input type="file" name="poster" class="" id="exampleFormControlInput1" placeholder="">
                </div>

                <div class="d-none">
                    <div class="form-group" id="files" >
                        <label for="exampleFormControlInput1">File</label><br>
                        <input type="file" name="file[]" class="" placeholder="">
                    </div>
                </div>

                <div>
                    <label for="exampleFormControlInput1">File</label><br>
                    @php
                        $files = explode(",",$data->file);
                    @endphp

                    @forelse ($files as $file)
                        <a href="{{asset($file)}}" type="button" class="btn btn-outline-info btn-sm">File</a>     
                    @empty 
                    @endforelse
                </div>

                <div id="fileInput">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File</label><br>
                        <input type="file" name="file[]" class="" placeholder="">
                    </div>

                </div>
                <a onclick="addFiles()" class="btn btn-primary btn-sm">Tambah file</a>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputnama1">Deskripsi</label>
                <textarea name="desc" class="form-control">
                    {{$data->desc}}
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary ml-3">Tambah</button>
            <a href="{{route('deleteTemplate',$data->id)}}" class="btn btn-outline-danger">Hapus</a>
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
	                "paste wordcount"
	            ],
	            toolbar: "undo redo | bold italic | bullist numlist outdent indent "
	      
	    });

        
	});
    
    function addFiles(){
        console.log("hallo");
        $("#files").clone().appendTo("#fileInput");
    }

    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
    

</script>

@endsection