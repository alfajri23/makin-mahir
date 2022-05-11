@extends('layouts.admin')

@section('content')

<style>
    .img-click{
        position: absolute;
        right: 0;
        top: 30px;
        z-index: 5;
        
    }

    .img-bukti{
        max-width: 500px;
        max-height: 500px;
    }

    .hiddenclick {
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Pendaftaran Beduk</h1>

    <div class="table-responsive">
        <table class="table table-bordered tablePendaftaran" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Timestamp</th> 
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Alamat</th> 
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Info event</th>
                    <th>Status</th>
                    <th>Umur</th> 
                    <th>Alasan</th>
                    <th>Gabung grub</th>
                    <th>Subscribe</th>
                    <th>Reward</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail transaksi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <p>Nama</p>
                        <p>Tipe</p>
                        <p>Tipe bayar</p>
                        <p>Tanggal</p>
                        <p>Tenggat</p>
                        <p>Status bayar</p>
                        <p>Nominal</p>
                        <p>Bukti</p>
                    </div>
                    <div class="col-8" id="modalBody">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': `Bearer {{Session::get('token')}}`
        }
	});

    $(function (){

        $('.tablePendaftaran').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pendaftaranBeduk') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true
                },
                {data: 'updated_at', name: 'updated_at',visible: false},
                {data: 'name', name: 'name',width: '20%'},
                {data: 'telepon', name: 'telepon',visible: false},
                {data: 'email', name: 'email',visible: false},
                {data: 'alamat', name: 'alamat',visible: false},
                {data: 'judul', name: 'judul',width: '20%'},
                {data: 'tanggal', name: 'tanggal',className: "dtCenter"},
                {data: 'info_event', name: 'info_event',visible: false},
                {data: 'status', name: 'status',visible: false},
                {data: 'umur', name: 'umur',visible: false},
                {data: 'alasan', name: 'alasan',visible: false},
                {data: 'grub_wa', name: 'grub_wa',className: "dtCenter"},
                {data: 'subscribe', name: 'subscribe',className: "dtCenter"},
                {data: 'reward', name: 'reward',width: '5%',className: "dtCenter"},
                {data: 'stat', name: 'stat',width: '5%',className: "dtCenter"},
                {data: 'aksi', name: 'aksi',width: '8%'},
            ],
            dom: 'Bfrtlip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    header : false,
                    title: '',
                    exportOptions: {
                        header : false,
                        columns : [ 1, 2 ,3 ,4,5,10,8,9,11,12]
                    },
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Beduk',
                    exportOptions: {
                        columns : [ 1, 2 ,3 ,4,5,10,8,9,11,12]
                    },
                },
                {
                    extend: 'csvHtml5',
                    title: 'Data Beduk',
                    exportOptions: {
                        columns : [ 1, 2 ,3 ,4,5,10,8,9,11,12]
                    },
                },
                
            ]
        })
    })

    function subImage(id) {
        $(".subscribe-"+id).toggle();
    };

    function buktiImage(id) {
        $(".bukti-"+id).toggle();
    };

    function acc(id){
        swal({
                title: "Setujui ?",
                text: "Coba cek sekali lagi, data tidak bisa diubah lagi",
                buttons: {
                    setujui: true,
                    tolak: true,
                },
            })
            .then((value) => {
            switch (value) {
            
                case "setujui":
                $.ajax({
                    type : 'GET',
                    url  : "{{ route('accBeduk') }}",
                    data : {
                        id : id
                    },
                    dataType: 'json',
                    success : (data)=>{
                        swal("Sukses", "Daftar terupdate", "success");
                        $('.tablePendaftaran').DataTable().ajax.reload();
                    }
                });
                break;
            
                case "tolak":
                $.ajax({
                    type : 'GET',
                    url  : "{{ route('rejBeduk') }}",
                    data : {
                        id : id
                    },
                    dataType: 'json',
                    success : (data)=>{
                        swal("Sukses menolak", "Daftar terupdate", "success");
                        $('.tablePendaftaran').DataTable().ajax.reload();
                    }
                });
                break;
            
                default:
                swal("Tidak ada perubahan");
            }
        });

        // swal({
        //     title: "Setujui ?",
        //     text: "Coba cek sekali lagi, data tidak bisa diubah lagi",
        //     icon: "warning",
        //     buttons: true,
        //     dangerMode: true,
        //     })
        //     .then((willDelete) => {
        //     if (willDelete) {
        //         $.ajax({
        //             type : 'GET',
        //             url  : "{{ route('accBeduk') }}",
        //             data : {
        //                 id : id
        //             },
        //             dataType: 'json',
        //             success : (data)=>{
        //                 swal("Sukses", "Daftar terupdate", "success");
        //                 $('.tablePendaftaran').DataTable().ajax.reload();
        //             }
        //         });

        //     } else {
        //         $.ajax({
        //             type : 'GET',
        //             url  : "{{ route('rejBeduk') }}",
        //             data : {
        //                 id : id
        //             },
        //             dataType: 'json',
        //             success : (data)=>{
        //                 swal("Sukses menolak", "Daftar terupdate", "success");
        //                 $('.tablePendaftaran').DataTable().ajax.reload();
        //             }
        //         });
        //     }
        // });
        
    }

</script>

@endsection