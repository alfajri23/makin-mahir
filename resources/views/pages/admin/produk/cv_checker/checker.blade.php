@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">CV Checker</h1>

    <!-- DataTales Example -->
    <div class="table-responsive">
        <table class="table table-bordered tableEvent" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Status bayar</th>
                    <th>Status</th>
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
            ajax: "{{ route('cvCheckerIndex') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true,
                    width: '5%'
                },
                {data: 'nama', name: 'nama',width: '15%'},
                {data: 'tanggal', name: 'tanggal',width: '15%'},
                {data: 'keterangan', name: 'keterangan'},
                {data: 'status_bayar', name: 'status_bayar',width: '5%'},
                {data: 'status', name: 'status',width: '5%'},
                {data: 'action', name: 'action',width: '12%'},
            ]
        })
    })

</script>

@endsection