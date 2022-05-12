@extends('layouts.expert')

@section('content')

<div class="container">
    <h2 class="text-center h1 font-weight-bold text-gray-800 mb-4">Tambah Ebook</h2>
    <div class="row">
        <div class="col-6">
            <form action="{{route('ebookCreate')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Judul</label>
                    <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Kategori</label>
                    <input type="text" name="kategori" class="form-control" >
                    <input type="text" name="id_expert" class="form-control" value="{{\Session::get('auth.id_expert')}}" hidden>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input type="text" onkeyup="currencyFormat(this)" name="harga" class="form-control" id="exampleFormControlInput1" placeholder="">
                    <div id="emailHelp" class="form-text">Kosongkan jika gratis</div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Gambar</label><br>
                    <input type="file" name="gambar" class="" id="exampleFormControlInput1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">File</label><br>
                    <input type="file" name="file" class="" id="exampleFormControlInput1" placeholder="">
                </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputnama1">Deskripsi</label>
                <textarea name="desc" class="form-control">
                    
                </textarea>
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
</script>

@endsection