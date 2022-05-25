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
            <div class="col-5">
              <label>Pertanyaan</label>
              <input type="text" class="form-control" name="pertanyaan[]" placeholder="">
            </div>
            <div class="col-2">
              <label>Tipe</label>
              <select id="inputState" name="tipe[]" class="form-control">
                <option value="text">text</option>
                <option value="number">number</option>
                <option value="file">file</option>
              </select>
            </div>
            <div class="col-3">
              <label>File</label>
              <input type="file" class="form-control" name="file[]" placeholder="">
            </div>
            <div class="col-2">
                <label>Required</label>
                <select id="inputState" name="required[]" class="form-control">
                    <option value="0">no</option>
                    <option value="1">ya</option>
                </select>
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
                    $file = explode(",",$data->file);
                    $required = explode(",",$data->required);
                @endphp

                @for ($i=0;$i<count($pertanyaan);$i++)
                <div class="row align-items-end my-2">
                    <div class="col-5">
                      <label>Pertanyaan</label>
                      <input type="text" class="form-control" name="pertanyaan[]" value="{{$pertanyaan[$i]}}">
                    </div>
                    <div class="col-2">
                      <label>Tipe</label>
                      <select id="inputState" name="tipe[]" class="form-control">
                        <option value="{{$tipe[$i]}}" selected>{{$tipe[$i]}}</option>
                        <option value="text">text</option>
                        <option value="number">number</option>
                        <option value="file">file</option>
                      </select>
                      {{-- <input type="text" class="form-control" name="tipe[]" value="{{$tipe[$i]}}"> --}}
                    </div>
                    <div class="col-3">
                        <img class="w-100" src="{{$file[$i] != null ? asset($file[$i]) : ''}}" alt="" srcset="">
                      <label>File</label><br>
                      <input type="file" class="" name="file[]">
                    </div>
                    <div class="col-1">
                        <a href="{{route('formSettingDelete',['id'=>$data->id,'index'=>$i])}}" class="btn btn-outline-danger mt-4">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                    <div class="col-1">
                        <label>Required</label>
                        <select id="inputState" name="required[]" class="form-control">
                            <option value="{{$required[$i]}}" selected>{{$required[$i] == 1 ? 'ya' : 'no'}}</option>
                            <option value="0">no</option>
                            <option value="1">ya</option>
                        </select>
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