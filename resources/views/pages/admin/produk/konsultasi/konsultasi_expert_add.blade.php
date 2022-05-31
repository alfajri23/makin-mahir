@extends('layouts.admin')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Konsultasi</h1>
    </div>

    <div class="row">
        <form method="post" action="{{route('konsultasiExpertStore')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="inputState">Pemateri</label>
            <select id="inputState" class="form-control" name="id_expert">
                @forelse ($expert as $exp)   
                    <option value="{{$exp->id}}">{{$exp->nama}}</option>
                @empty   
                @endforelse
            </select>
        </div>

        <div class="mb-3">
            <label for="inputState">Tipe</label>
            <select id="inputState" class="form-control" name="id_konsultasi">
                @forelse ($tipe as $tp)   
                    <option value="{{$tp->id}}">{{$tp->nama}}</option>
                @empty   
                @endforelse
            </select>
        </div>

        {{-- <div class="mb-3">
            <label for="exampleFormControlSelect1">Pemateri</label>
            <input type="text" value="{{$data->expert->nama}}" class="form-control" disabled>
            <input type="hidden" name="id_expert" value="{{$data->id_expert}}" class="form-control">
        </div> --}}
        <div class="form-group">
            <label for="exampleFormControlInput1">Poster</label><br>
            <input type="file" name="poster" class="" id="exampleFormControlInput1" >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlSelect1">Judul</label>
            <input type="text" name="judul" class="form-control">
        </div>

        <div class="form-row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Harga bias</label>
                    <input type="text" onkeyup="currencyFormat(this)" name="harga_bias" class="form-control">
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Harga</label>
                    <input type="text" onkeyup="currencyFormat(this)" name="harga" class="form-control">
                </div>
            </div>

            <div class="col">
                <label for="inputState">Status</label>
                <select id="inputState" class="form-control" name="status">
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>
            </div>
        </div>

        

        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jadwal</label>
            <textarea name="jadwal" id="jadwal" class="form-control">
                
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