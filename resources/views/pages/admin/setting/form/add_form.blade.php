@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-10">
            <h2 class="text-grey-800 fw-700 font-lg">Setting</h2>
        </div>
    </div>

    <div class="d-none">
        <div class="row" id="formInit">
            <div class="col-6">
              <label>Pertanyaan</label>
              <input type="text" class="form-control" name="pertanyaan[]" placeholder="">
            </div>
            <div class="col-2">
              <label>Tipe</label>
              <input type="text" class="form-control" name="tipe[]" placeholder="">
            </div>
            <div class="col-4">
              <label>File</label>
              <input type="file" class="form-control" name="file[]" placeholder="">
            </div>
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

        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Petunjuk pengisian</h4>
            <p>Daftar aturan</p>
            <ol>
                <li>Text biasa = text</li>
                <li>Tanggal    = date</li>
                <li>Angka      = number</li>
            </ol>
            <p class="text-danger"><strong>*Jumlah pertanyaan dan tipe harus sama</strong></p>
        </div>

        <div class="row">
           

            <div id="form">
                @empty(!$data)
                @php
                    $pertanyaan = explode(",",$data->pertanyaan);
                    $tipe = explode(",",$data->tipe);
                @endphp

                @for ($i=0;$i<count($pertanyaan);$i++)
                <div class="row">
                    <div class="col-6">
                      <label>Pertanyaan</label>
                      <input type="text" class="form-control" name="pertanyaan[]" value="{{$pertanyaan[$i]}}">
                    </div>
                    <div class="col-2">
                      <label>Tipe</label>
                      <input type="text" class="form-control" name="tipe[]" value="{{$tipe[$i]}}">
                    </div>
                    <div class="col-4">
                      <label>File</label>
                      <input type="file" class="form-control" name="file[]">
                    </div>
                </div>
                @endfor
                @endempty

            </div>

            <div>
                <a onclick="addForm()" class="btn btn-primary btn-sm">Tambah</a>
            </div>
        </div>

        

        <button type="submit" class="btn btn-success mt-3">Tambah</button>
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
	                "advlist autolink lists",
	                "searchreplace",
	                "paste"
	            ],
	            toolbar: "undo redo | bold italic | numlist "
	      
	    });
    });

    function addForm(){
        console.log("data");
        $( "#formInit" ).clone().appendTo( "#form" );
    }

</script>


@endsection