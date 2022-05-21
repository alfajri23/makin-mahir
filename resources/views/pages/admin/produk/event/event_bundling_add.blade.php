@extends('layouts.admin')

@section('content')

<div class="container">
    <h2 class="text-center h1 font-weight-bold text-gray-800 mb-4">Tambah Event Bundling</h2>
    <div class="row">
        <div class="container">
            <form action="{{route('saveBundlingEvent')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$bundling != null ? $bundling->nama : ''}}" placeholder="">
                    <input type="text" name="id" class="form-control" value="{{$bundling != null ? $bundling->id : ''}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input type="text" onkeyup="currencyFormat(this)" name="harga" class="form-control" value="{{$bundling != null ? $bundling->harga : ''}}">
                </div>
    
                <div class="form-group">
                    <label for="exampleFormControlInput1">Poster</label><br>
                    <input type="file" name="poster" class="" id="exampleFormControlInput1" placeholder="">
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputnama1">Deskripsi</label>
                        <textarea name="desc" class="form-control">
                            {{$bundling != null ? $bundling->desc : ''}}
                        </textarea>
                    </div>
                </div>
        </div>


        <div class="row mt-3">
            @forelse ($data as $dt) 
            <div class="col">
                <div class="card mx-2">
                    <div class="card-image w-100 clearfix">
                        <div class="float-left">
                            <input id="produk-{{$loop->iteration}}" class="form-check-input d-block" type="checkbox" value="{{$dt->id}}" name="id_produk[]">
                        </div>
                        <img src="{{asset($dt->poster)}}" alt="image" class="w-100">
                    </div>
                    <div class="card-body px-2 pt-1">
                        <p class="font-weight-bold text-dark mb-0">{{$dt->judul}}</p>
                        <p class="mb-0">Rp. {{$dt->harga}}</p>    
                    </div>
                </div>
            </div>
            @empty
            @endforelse
            
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