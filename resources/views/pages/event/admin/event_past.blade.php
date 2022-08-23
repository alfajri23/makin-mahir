@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Event lampau</h1>
    <a href="{{route('eventAdmin')}}" class="btn btn-primary mb-2">Kembali</a>
    <!-- DataTales Example -->
    <div class="table-responsive">
        <table class="table table-bordered tableEvent" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Judul</th>
                    <th>Tipe</th>
                    <th>Tanggal</th>
                    <th>Harga</th>
                    <th>Poster</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>


</div>

<script>
    $(function (){
        let tabel = $('.tableEvent');

        tabel.DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('eventPast') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true
                },
                {data: 'judul', name: 'judul'},
                {data: 'tipe', name: 'tipe'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'harga', name: 'harga'},
                {data: 'poster', name: 'poster'},
                {data: 'action', name: 'action'},
            ]
        })
    })

</script>

@endsection