@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-10">
            <h2 class="text-gray-800 fw-700 display1-size">Konsultasi</h2>
        </div>
        <div class="col-2">
            <button href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-download fa-sm text-white-50"></i> Tambah
            </button>
        </div>
    </div>
    
    <div class="container d-flex mt-3">
        @forelse ($data as $dt) 
        <div class="card mx-2" style="width: 14rem;">
            <div class="card-image w-100 mb-3">
                <img src="{{asset($dt->poster)}}" alt="image" class="w-100">
            </div>
            <div class="card-body pt-0">
                @if ($dt->status == 1)
                    <span class="badge badge-success">Aktif</span>
                @else
                    <span class="badge badge-danger">Non aktif</span>
                @endif
                
                <p class="font-weight-bold display2-md-size text-dark mb-0">{{$dt->judul}}</p>
                <p class="mb-0">Rp. {{$dt->harga}}</p>    
            </div>
            
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{route('konsultasiExpertDetail',$dt->id)}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-sm fa-pencil "></i>
                </a>
                <a href="{{route('konsultasiExpertDelete',$dt->id)}}" class="btn btn-sm btn-warning">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </div>
            
        </div>
        @empty
        @endforelse
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Tipe</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{route('konsultasiExpertStore')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlSelect1">Pemateri</label>
                <select name="id_expert" class="form-select">
                    @forelse ($expert as $exp)
                    <option value="{{$exp->id}}">{{$exp->nama}}</option>
                    @empty   
                    @endforelse
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect1">Tipe</label>
                <select name="id_konsultasi" class="form-select">
                    @forelse ($tipe as $tp)
                    <option value="{{$tp->id}}">{{$tp->nama}}</option>
                    @empty   
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Poster</label><br>
                <input type="file" name="poster" class="" id="exampleFormControlInput1" >
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga</label>
                <input type="text" onkeyup="currencyFormat(this)" name="harga" id="harga" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jadwal</label>
                <textarea name="jadwal" id="jadwal" class="form-control">
                </textarea>
            </div>
                
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
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