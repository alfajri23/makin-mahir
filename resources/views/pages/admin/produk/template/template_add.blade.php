@extends('layouts.admin')

@section('content')

<div class="container">
    <h2 class="text-center h1 font-weight-bold text-gray-800 mb-4">Tambah Template</h2>
    <div class="row">
        <div class="col-6">
            <form action="{{route('createTemplate')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input type="text" onkeyup="currencyFormat(this)" name="harga" class="form-control" id="exampleFormControlInput1" placeholder="">
                    <div id="emailHelp" class="form-text">Kosongkan jika gratis</div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Gambar</label><br>
                    <input type="file" name="poster" class="" id="exampleFormControlInput1" >
                </div>

                <div class="d-none">
                    <div class="form-group" id="files" >
                        <label for="exampleFormControlInput1">File</label><br>
                        <input type="file" name="file[]" class="" placeholder="">
                    </div>
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
                    
                </textarea>
            </div>

            <div class="form-group">
                <label for="inputState">Status</label>
                <select id="inputState" class="form-control" name="status">
                    <option value="{{$data->status}}" selected>{{$data->status}}</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
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
	                "paste wordcount"
	            ],
	            toolbar: "undo redo | bold italic | bullist numlist outdent indent "
	      
	    });

        
	});
    
    function addFiles(){
        console.log("hallo");
        $("#files").clone().appendTo("#fileInput");
    }
    

</script>

@endsection