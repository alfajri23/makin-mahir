@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Pendaftaran Webinar</h1>

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
                    <th>Umur</th>
                    <th>Alasan</th>
                    <th>Gabung grub</th>
                    <th>Status</th>
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

<script src=""></script>
<script src=""></script>

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
            ajax: "{{ route('pendaftaranWebinar') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true
                },
                {data: 'updated_at', name: 'updated_at',visible: false},
                {data: 'name', name: 'name'},
                {data: 'telepon', name: 'telepon',visible: false},
                {data: 'email', name: 'email',visible: false},
                {data: 'alamat', name: 'alamat',visible: false},
                {data: 'judul', name: 'judul'},
                {data: 'tanggal', name: 'tanggal',className: "dtCenter"},
                {data: 'info_event', name: 'info_event',visible: false},
                {data: 'umur', name: 'umur',visible: false},
                {data: 'alasan', name: 'alasan',visible: false},
                {data: 'group', name: 'group',className: "dtCenter"},
                {data: 'status', name: 'status',visible: false},
                {data: 'stat', name: 'stat',className: "dtCenter"},
                {data: 'aksi', name: 'aksi'},
            ],
            //dom : '<"top"fB>rt<"bottom"lip><"clear">',
            dom: 'Bfrtlip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    header : false,
                    title: '',
                    exportOptions: {
                        header : false,
                        columns : [ 1, 2 ,3 ,4,5,9,8,12,10,11]
                    },
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Beduk',
                    exportOptions: {
                        columns : [ 1, 2 ,3 ,4,5,9,8,12,10,11]
                    },
                },
                {
                    extend: 'csvHtml5',
                    title: 'Data Beduk',
                    exportOptions: {
                        columns : [ 1, 2 ,3 ,4,5,9,8,12,10,11]
                    },
                },
            ]
        })
    })

    function detail(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('transaksiDetail') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                let modalBody = $('#modalBody');
                let bukti;
                let asset,konfirmasi;

                if(datas.bukti == null && datas.pdf_url == null){
                    bukti = 'tidak tersedia'
                }else if(datas.bukti != null){
                    asset = window.location.origin;
                    bukti = `<a href="${window.location.origin}/${datas.bukti}">Bukti</a>`;
                    bukti = `<img src="${window.location.origin}/${datas.bukti}" style="width:200px" >`;
                }else if(datas.pdf_url != null){
                    bukti = `<a href="${datas.pdf_url}">Bukti</a>`;
                }

                if(datas.status_code == 200 || datas.status_bayar == 'lunas'){
                    konfirmasi = '';
                }else if(datas.status_bayar == 'pending' && datas.tipe_bayar == 'transfer bukti'){
                    konfirmasi = `
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary">Tolak</button>
                        <button onclick="konfirmasi_bank(${datas.id})" class="btn btn-secondary">Konfirmasi</button>
                    </div>
                    `;
                }else if(datas.tipe_bayar != 'transfer bukti'){
                    konfirmasi = `
                        <button onclick="konfirmasi_mid(${datas.order_id},${datas.id})" class="btn btn-success btn-sm">Cek Pembayaran</button>
                    `;
                    
                }

                let element = ` 
                    <p>${datas.nama}</p>
                    <p>${datas.tipe}</p>
                    <p>${datas.tipe_bayar}</p>
                    <p>${datas.tgl_transfer}</p>
                    <p>${datas.tenggat}</p>
                    <p>${datas.status_bayar}</p>
                    <p>${datas.nominal}</p>
                    <p>${bukti}</p>
                    <p>${konfirmasi}</p>
                `;
            
                modalBody[0].innerHTML = element;

                $('#modalDetail').modal('show');
                
            }
        });

    }

    function konfirmasi_bank(id){
        // $('.tablePendaftaran').DataTable().ajax.reload();
        $.ajax({
            type : 'GET',
            url  : "{{ route('transaksiBankKonfirmasi') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                swal(datas, "Pembayaran telah dikonfirmasi", "success");
                $('#modalDetail').modal('hide');
                $('.tablePendaftaran').DataTable().ajax.reload();
            }
        });
    }

    function konfirmasi_mid(order_id,id){
        // $('.tablePendaftaran').DataTable().ajax.reload();
        $.ajax({
            type : 'GET',
            url  : "{{ route('transaksiMidKonfirmasi') }}",
            data : {
                order_id : order_id,
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                //console.log(datas)
                
                if(datas.transaction_status == 'settlement'){
                    $('.tablePendaftaran').DataTable().ajax.reload();
                    swal('Berhasil','data telah terupdate', "success");
                }else{
                    swal('Pending','menunggu pembayaran user', "warning");
                }  
                
            }
        });
    }

</script>

@endsection
