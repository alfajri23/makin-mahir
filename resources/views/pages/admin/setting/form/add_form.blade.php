@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-10">
            <h2 class="text-grey-800 fw-700 font-lg">Setting</h2>
        </div>
    </div>
    
    <div class="container">
        <form action="{{route('formSettingStore')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <p class="mb-0 fw-700 text-grey-800 display2-md-size">Kategori</p>
            <input type="hidden" name="id" value="{{isset($data) ? $data->id : null}}">
            <select class="custom-select" name="id_produk_kategori">
                <option selected value="{{isset($data) ? $data->id_produk_kategori : null}}">Choose...</option>
                @forelse ($kategori as $kat)
                    <option value="{{$kat->id}}">{{$kat->nama}}</option>
                @empty  
                @endforelse
            </select>
        </div>

        <div class="mb-3">
            <label class="fw-700 text-grey-800 display2-md-size">Pertanyaan</label>
            <textarea name="pertanyaan" class="form-control"> 
                {{isset($data) ? $data->pertanyaan : null}}
            </textarea>
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