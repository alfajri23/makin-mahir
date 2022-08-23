@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Konsultasi</h1>
    <div class="mb-3">
        <a href="{{route('addKonsultasi')}}" class="btn btn-primary">Tambah</a>
        <a href="{{route('pastKonsultasi')}}" class="btn btn-outline-secondary">Riwayat</a>
    </div>
    
    <!-- DataTales Example -->
    <div class="table-responsive">
        <table class="table table-bordered tableKonsultasi" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Judul</th>
                    <th>Expert</th>
                    <th>Tipe</th>
                    <th>Tanggal</th>
                    <th>Harga</th>
                    <th>Poster</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>


</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(function (){
        let tabel = $('.tableKonsultasi');

        tabel.DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('adminKonsultasi') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true
                },
                {data: 'judul', name: 'judul'},
                {data: 'vendor', name: 'vendor'},
                {data: 'tipe', name: 'tipe'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'harga', name: 'harga'},
                {data: 'poster', name: 'poster'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action'},
            ]
        })
    })

    const tabel = $('.tableKonsultasi');

    function deleteKonsultasi(id){
        const route_del = "{{ route('deleteKonsultasi') }}";
        const pesan_del = "Jika dihapus data akan hilang di user dan Admin";

        swalAction(route_del,tabel,id,pesan_del);
    }

    function endKonsultasi(id){
        const route_end = "{{ route('endKonsultasi') }}";
        const pesan_end = "Konsultasi akan dihentikan";

        swalAction(route_end,tabel,id,pesan_end);
    }

    function startKonsultasi(id){
        const route_end = "{{ route('startKonsultasi') }}";
        const pesan_end = "Konsultasi akan berlangsung";

        swalAction(route_end,tabel,id,pesan_end);
    }

</script>

@endsection