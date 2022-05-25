@extends('layouts.admin')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Konsultasi {{$data->nama}}</h1>
    </div>

    <div class="row">
        <form method="post" action="{{route('konsultasiExpertStore')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlSelect1">Pemateri</label>
            <input type="text" value="{{$data->expert->nama}}" class="form-control" disabled>
            <input type="hidden" name="id_expert" value="{{$data->id_expert}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Poster</label><br>
            <input type="file" name="poster" class="" id="exampleFormControlInput1" >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlSelect1">Judul</label>
            <input type="text" name="judul" value="{{$data->judul}}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Harga bias</label>
            <input type="text" onkeyup="currencyFormat(this)" name="harga_bias" value="{{$data->harga_bias}}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Harga</label>
            <input type="text" onkeyup="currencyFormat(this)" name="harga" value="{{$data->harga}}" class="form-control">
            <input type="hidden" name="id_konsultasi" value="{{$data->id_konsultasi}}" class="form-control">
            <input type="hidden" name="id" value="{{$data->id}}" class="form-control">
            <input type="hidden" name="id_produk" value="{{$id_produk}}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jadwal</label>
            <textarea name="jadwal" id="jadwal" class="form-control">
                {!!$data->jadwal!!}
            </textarea>
        </div>

        <div>
            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-download fa-sm text-white-50"></i> Simpan
            </button>
        </div>
        </form>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"
integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
		 tinymce.init({
	            selector: "textarea",
	            branding: false,
	            width: "100%",
	            height: "300",
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