@extends('layouts.expert')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6">
        <form action="{{route('saveEvent')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body mb-5">
                <div class="row no-gutters align-items-center">
                    <img src="{{asset($data->poster)}}" style="max-width:100%" alt="">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Judul</label>
                <input type="number" name="tipe" value="3" hidden>
                <input type="hidden" name="id" value="{{$data->id}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                <input type="hidden" name="id_produk" value="{{$produk->id}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                <input type="text" name="judul" value="{{$data->judul}}" class="form-control" id="exampleFormControlInput1" placeholder="">
              </div>

              
                <div class="form-group">
                    <label for="exampleFormControlInput1">Waktu</label>
                    <input type="text" name="waktu" value="{{$data->waktu}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
        </div>

        <div class="col-6 pt-3">

            <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal</label>
                <input type="date" name="tanggal" value="{{$data->tanggal}}" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Harga</label>
                <input type="text" onkeyup="currencyFormat(this)" name="harga" value="{{$data->harga}}" class="form-control" placeholder="">
            </div>
    
            <div class="form-group">
                <label for="exampleFormControlInput1">Harga promo</label>
                <input type="text" onkeyup="currencyFormat(this)" name="harga_promo" value="{{$data->harga_promo}}" class="form-control" placeholder="">
            </div>
    
            <div class="form-group">
                <label for="exampleFormControlInput1">Poster</label><br>
                <input type="file" name="file" class="" id="exampleFormControlInput1" placeholder="">
            </div>
    
            <div class="form-group">
                <label for="exampleFormControlInput1">Link</label>
                <input type="text" name="link" value="{{$data->link}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                <input type="text" name="id_pemateri" value="{{\Session::get('auth.id_expert')}}" hidden>
            </div>
        
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="exampleInputnama1">Deskripsi</label>
                <textarea name="desc" class="form-control">
                    {{$data->deskripsi}}
                </textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputnama1">Deskripsi Pemateri</label>
                <textarea name="pemateri" class="form-control">
                    {{$data->pemateri}}
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