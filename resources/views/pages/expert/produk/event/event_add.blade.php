@extends('layouts.expert')

@section('content')

<div class="container">
    <h2 class="text-center h1 font-weight-bold text-gray-800 mb-4">Tambah Event</h2>
    <div class="row">
        <div class="col-6">
            <form action="{{route('saveEvent')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Judul</label>
                    <input type="number" name="id_pemateri" value="{{Request::session()->get('auth.id_expert')}}" hidden>
                    <input type="number" name="tipe" value="3" hidden>
                    <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Waktu</label>
                    <input type="text" name="waktu" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
        
        </div>

        <div class="col-6">

            <div class="form-group">
                <label for="exampleFormControlInput1">Harga</label>
                <input type="text" onkeyup="currencyFormat(this)" name="harga" class="form-control" placeholder="Kosongkan jika gratis">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Harga promo</label>
                <input type="text" onkeyup="currencyFormat(this)" name="harga_promo" class="form-control" placeholder="Kosongkan tidak ada">
            </div>
    
            <div class="form-group">
                <label for="exampleFormControlInput1">Link</label>
                <input type="text" name="link" class="form-control">
                <input type="text" name="id_pemateri" value="{{\Session::get('auth.id_expert')}}" hidden>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Poster</label><br>
                <input type="file" name="file" class="" id="exampleFormControlInput1" placeholder="" required>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="exampleInputnama1">Deskripsi</label>
                <textarea name="desc" class="form-control">
                    
                </textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputnama1">Deskripsi Pemateri</label>
                <textarea name="pemateri" class="form-control">
                    
                </textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary ml-3">Tambah</button>
        </form>
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