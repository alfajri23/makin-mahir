@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jenis Konsultasi</h1>
        <button href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-download fa-sm text-white-50"></i> Tambah
        </button>
    </div>

    <!-- Content Row -->
    <div class="row">

        @forelse ($data as $dt)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="{{route('konsultasiExpertIndex',$dt->id)}}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Rp. {{number_format($dt->harga)}}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dt->nama}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div> 
        @empty
            
        @endforelse

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Tipe</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{route('konsultasiTipeStore')}}">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga</label>
                <input type="text" name="harga" onkeyup="currencyFormat(this)" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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

@endsection