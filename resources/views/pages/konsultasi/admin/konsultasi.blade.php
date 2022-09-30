@extends('layouts.admin')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">

    @endpush

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
                    <th>Sort</th>
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

@push('scripts')
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        // $(function (){
        //     let tabel = $('.tableKonsultasi');

        //     tabel.DataTable({
        //         rowReorder: {
        //             dataSrc: 'judul',
        //             selector: 'tr'
        //         },
        //         processing: true,
        //         serverSide: true,
        //         ajax: "{{ route('adminKonsultasi') }}",
        //         columns: [
        //             {
        //                 data: 'DT_RowIndex', 
        //                 name: 'DT_RowIndex', 
        //                 nameorderable: true, 
        //                 searchable: true
        //             },
        //             {data: 'judul', name: 'judul'},
        //             {data: 'vendor', name: 'vendor'},
        //             {data: 'tipe', name: 'tipe'},
        //             {data: 'tanggal', name: 'tanggal'},
        //             {data: 'harga', name: 'harga'},
        //             {data: 'poster', name: 'poster'},
        //             {data: 'status', name: 'status'},
        //             {data: 'action', name: 'action'},
        //         ],
        //     })
            
        // })

        let tabel = 
            $('.tableKonsultasi').DataTable({
                rowReorder: {
                    dataSrc: 'sort',
                    selector: 'tr'
                },
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
                    {data: 'sort', name: 'sort', visible: true},
                    {data: 'judul', name: 'judul'},
                    {data: 'vendor', name: 'vendor'},
                    {data: 'tipe', name: 'tipe'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'harga', name: 'harga'},
                    {data: 'poster', name: 'poster'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action'},
                ],
            })

        tabel.on( 'row-reorder', function ( e, diff, edit ) {
            console.log(diff[0].oldData);
            console.log(diff[1].oldData);

            $.ajax({
                type : 'GET',
                url  : "{{ route('sortKonsultasi') }}",
                data : {
                    start : diff[0].oldData,
                    end : diff[1].oldData
                },
                dataType: 'json',
                success : (data)=>{
                    if(data.status){
                        tabel.ajax.reload();
                    }else{
                        alert(data.message);
                    }
                },
                error : (data)=>{

                }
            });
            // for ( var i=0, ien=diff.length ; i<ien ; i++ ) {
            //     // get id row
            //     let idQ = diff[i].node.id;
            //     //console.log(diff[i]);
            //     let idNewQ = idQ.replace("row_", "");
            //     //console.log(idNewQ);
            //     // get position
            //     let position = diff[i].newPosition+1;
            //     //call funnction to update data
            //     updateOrder(idNewQ, position);
            // }


        });

        function updateOrder(idNewQ, position){
            //console.log('asal : '+idNewQ, 'akhir : '+position)
        }

        //const tabel = $('.tableKonsultasi');

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
@endpush



@endsection