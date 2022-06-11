@extends('layouts.admin')

@section('content')

<div class="container">
    <h2 class="text-center h1 font-weight-bold text-gray-800 mb-4">Edit Ebook</h2>
    <div class="row">
        <div class="col-6">
            <form action="{{route('ebookCreate')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Judul</label>
                    <input type="hidden" name="id_produk" value="{{$data->produk->id}}" class="form-control">
                    <input type="hidden" name="id" class="form-control" id="exampleFormControlInput1" value="{{$data->id}}">
                    <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" value="{{$data->judul}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Kategori</label>
                    <input type="text" name="kategori" class="form-control" id="exampleFormControlInput1" value="{{$data->kategori}}">
                </div>

                <div class="form-group">
                    <label for="disabledSelect" class="form-label">Pemateri</label>
                    <select id="disabledSelect" name="id_pemateri" class="form-select">
                        <option value="">Tidak ada</option>        
                        @forelse ($pemateri as $pm)
                        <option value="{{$pm->id}}">{{$pm->nama}}</option>              
                        @empty
                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputState">Status</label>
                    <select id="inputState" class="form-control" name="status">
                        <option value="{{$data->status}}" selected>Pilih</option>
                        <option value="1">Aktif</option>
                        <option value="0">Non aktif</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input type="text" onkeyup="currencyFormat(this)" value="{{$data->harga}}" name="harga" class="form-control" id="exampleFormControlInput1" placeholder="">
                    <div id="emailHelp" class="form-text">Kosongkan jika gratis</div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Gambar</label><br>
                    <input type="file" name="gambar" class="" id="exampleFormControlInput1">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">File</label><br>
                    <input type="file" name="file" class="" id="exampleFormControlInput1">
                </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputnama1">Deskripsi</label>
                <textarea name="desc" class="form-control">
                   {{$data->desc}}
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