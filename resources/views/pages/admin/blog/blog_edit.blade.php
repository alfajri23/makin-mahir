@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h2 class="text-center h1 font-weight-bold text-gray-800 mb-4"></h2>
    <div class="row">
        <div class="col-9">
            <form action="{{route('blogStore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Judul</label>
                    <input type="hidden" name="id" value="{{$data->id}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                    <input type="text" name="judul" value="{{$data->judul}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Link</label>
                    <input type="text" name="link" value="{{$data->link}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputnama1">Isi</label>
                    <textarea name="isi" class="form-control isi">
                        {{ old('isi') ?? $data->isi ?? '' }}
                    </textarea>
                </div>
        </div>
        <div class="col-3 pt-4">
            <img src="{{asset($data->gambar)}}" style="width:250px" alt="" >
            <div class="form-group">
                <label for="exampleFormControlInput1">Gambar</label><br>
                <input type="file" name="file" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Video</label>
                <input type="text" name="video" value="{{$data->video}}" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kategori</label>
                    <select name="id_kategori" class="form-control" id="exampleFormControlSelect1">
                        <option value="">Kosong</option>
                        @forelse ( $kat as $dt)
                            <option value="{{$dt->id}}">{{$dt->nama}}</option>
                        @empty
                            
                        @endforelse
                    </select>
                </div>
                {{-- <input type="text" name="kategori" class="form-control" id="exampleFormControlInput1" placeholder=""> --}}
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Penulis</label>
                <input type="text" name="penulis" value="{{$data->penulis}}" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">tag</label>
                <input type="text" name="tag" value="{{$data->tag}}" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">meta_title</label>
                <input type="text" name="meta_title" value="{{$data->meta_title}}" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">meta_desc</label>
                <input type="text" name="meta_desc" value="{{$data->meta_description}}" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">meta_keyword</label>
                <input type="text" name="meta_keyword" value="{{$data->meta_keyword}}" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-paper-plane-top"></i>
                Publish
            </button>
        </div>


        
        

        </form>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"
integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

	$(document).ready(function() {
		 tinymce.init({
                menubar: 'insert',
	            selector: "textarea.isi",
	            branding: false,
	            width: "100%",
	            height: "1000",
	            plugins: [
	                "advlist autolink lists charmap print preview anchor",
	                "searchreplace visualblocks code fullscreen",
	                "paste wordcount",
                    "media"
	            ],
	            toolbar: "undo redo | bold italic | bullist numlist outdent indent | media"
	      
	    });
	});
</script>

@endsection