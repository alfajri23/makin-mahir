@extends('layouts.admin')

@section('content')

<style>
    .btnEdit{
        position: absolute;
        right: 10px;
        top: 15px;
        cursor: pointer;
    }
</style>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Konsultasi {{$tipe->nama}}</h1>
        <button href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-download fa-sm text-white-50"></i> Tambah
        </button>
    </div>

    <div class="row">
        @forelse ($data as $dt)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">

                <a href="">
                <div class="card-body clearfix">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Rp. {{number_format($dt->harga)}} / <br>
                                <small>{{$dt->waktu}}</small>  
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dt->expert->nama}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>

                <div class="px-3">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{route('konsultasiExpertDetail',$dt->id)}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-sm fa-pencil "></i>
                        </a>
                        <a href="{{route('konsultasiExpertDelete',$dt->id)}}" class="btn btn-sm btn-warning">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                </div>
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
        <form method="post" action="{{route('konsultasiExpertStore')}}">
        @csrf
        <div class="modal-body">
            {{-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control">
            </div> --}}
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
                <label for="exampleInputEmail1" class="form-label">Harga</label>
                <input type="text" onkeyup="currencyFormat(this)" name="harga" id="harga" class="form-control">
                <input type="hidden" name="id_konsultasi" value="{{$id}}" class="form-control">
                <input type="hidden" name="id" id="id" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Waktu</label>
                <input type="text" name="waktu" id="waktu" class="form-control">
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

<!-- Modal Edit-->


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

    function details(id){
        console.log("data");
        $.ajax({
            type : 'GET',
            url  : "{{ route('konsultasiTipeIndex') }}",
            data : {
                id : id,
            },
            dataType: 'json',
            success : (data)=>{
                console.log(data);
                // $('#exampleModal').modal('show');
                // $('#id').val(data.id);
            }
        });
        console.log("data end");
         $('#exampleModal').modal('show');
    }
</script>


@endsection