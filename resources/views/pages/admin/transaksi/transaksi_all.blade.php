@extends('layouts.admin')

@section('content')

<style>
    p{
        color: black;
    }

    .btn-group, .btn-group-vertical {
        position: absolute;
        display: inline-flex;
        vertical-align: middle;
        z-index: 5;
    }
</style>

<div class="container-fluid">
    <h1 class="h1 font-weight-bold text-gray-800 mb-4">Transaksi {{$_GET['tipe']}}</h1>
    

    <div class="table-responsive">

        <div class="row justify-content-center">
            <div class="col-6">
                @if ($_GET['tipe'] == 'ditolak' || $_GET['tipe'] == 'belum_bayar')
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button onclick="check_all()" class="btn btn-secondary btn-sm">Check all</button>
                    <button onclick="deleteMulti()" class="btn btn-danger btn-sm">Delete All</button>
                </div>
                @endif
            </div>
        </div>


        <table class="table table-bordered tableTransaksi" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>v</th>
                    <th>No</th>
                    <th>Tipe</th>
                    <th>Vendor</th>
                    <th>Nama</th>
                    <th>Member</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                    <th>Status bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</div>

{{-- Modal Detail --}}
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail transaksi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body py-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <p>Nama</p>
                        <p>Status bayar</p>
                        <p>Nominal</p>
                        <p>Tanggal bayar</p>
                        <p>Bukti</p>
                        <p>File tambahan</p>
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

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    let ajax = urlParams.get('tipe');

    let tabel = $('.tableTransaksi');

    $(function (){

        tabel.DataTable({
            order: [[7, 'desc']],
            processing: true,
            serverSide: true,
            ajax: {
                url : "{{ route('transaksiIndex')}}",
                data : {
                    tipe : "{{$_GET['tipe']}}"
                }
            },
            columns: [
                {data: 'checkbox', name: 'checkbox',width: "5%"},
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true,
                    width: "5%"
                },
                {data: 'tipe', tipe: 'tipe'},
                {data: 'vendor', tipe: 'vendor',width: "3%"},
                {data: 'nama', name: 'nama',width: "40%"},
                {data: 'user', name: 'user',width: "10%"},
                {data: 'nominal', name: 'nominal'},
                {data: 'tanggal_bayar', name: 'tanggal_bayar'},
                {data: 'bayar', name: 'bayar',width: "5%"},
                {data: 'aksi', name: 'aksi',width: "15%"},
            ],
            dom: 'Bfrtlip',

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
                let bukti,file_tambahan;
                let asset,konfirmasi;

                //asset = window.location.origin + '/public';
                asset = window.location.origin;
        
                //Bukti bayar
                bukti = `<a target="_blank" href="${asset}/${datas.bukti}">Bukti</a>`;

                //JIka ada file tambahan
                if(datas.file_tambahan != null && datas.file_tambahan != ""){
                    file_tambahan = datas.file_tambahan.split(",");
                    function mapFile(item) {
                        return `<a href="${asset}/${item}" target="_blank">File</a>`;
                    }
                    file_tambahan = file_tambahan.map(mapFile);
                }


                if(datas.status != 'lunas'){
                    konfirmasi = `
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button onclick="tolak(${datas.id})" class="btn btn-danger btn-sm">Tolak</button>
                        <button onclick="konfirmasi_bank(${datas.id})" class="btn btn-success">Konfirmasi</button>
                    </div>
                    `;    
                }else{
                    konfirmasi = `
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button onclick="tolak(${datas.id})" class="btn btn-danger btn-sm">Tolak</button>
                    </div>
                    `; 
                }


                let element = ` 
                    <p>:  ${datas.nama}</p>
                    <p>:  ${datas.status}</p>
                    <p>:  Rp. ${datas.harga}</p>
                    <p>:  ${datas.tanggal_bayar}</p>
                    <p>:  ${bukti}</p>
                    <p>:  ${file_tambahan}</p>
                    <p>:  ${konfirmasi}</p>
                `;
            
                modalBody[0].innerHTML = element;

                $('#modalDetail').modal('show');
                
            }
        });

    }

    function konfirmasi_bank(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('transaksiBankKonfirmasi') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                console.log(data);
                swal('datas', "Pembayaran telah dikonfirmasi", "success");
                $('#modalDetail').modal('hide');
                $('.tableTransaksi').DataTable().ajax.reload();
            }
        });
    }

    function konfirmasi_mid(order_id,id){
        // $('.tableTransaksi').DataTable().ajax.reload();
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
                    $('.tableTransaksi').DataTable().ajax.reload();
                    swal('Berhasil','data telah terupdate', "success");
                }else{
                    swal('Pending','menunggu pembayaran user', "warning");
                }  
                
            }
        });
    }

    function tolak(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('transaksiTolak') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                swal(datas, "Pembayaran telah ditolak", "success");
                $('#modalDetail').modal('hide');
                $('.tableTransaksi').DataTable().ajax.reload();
            }
        });
    }

    function deletes(id){
        const route = "{{ route('transaksiDelete') }}";
        const tabel = $('.tableTransaksi');
        const pesan_hapus = "Jika dihapus data akan hilang";

        swalAction(route,tabel,id,pesan_hapus);
    }

    function deleteMulti(){
        swal({
            title: "Are you sure?",
            text: "Jika dihapus maka data akan hilang",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                let check = document.querySelectorAll('.form-check-input');
                let data_check = [];
                check.forEach((data)=>{
                    if(data.checked){
                        data_check.push(data.value);
                    }
                })

                $.ajax({
                    type : 'GET',
                    url  : "{{ route('transaksiDeleteMulti') }}",
                    data : {
                        data : JSON.stringify(data_check),
                    },
                
                    dataType: 'json',
                    success : (datas)=>{
                        $('.tableTransaksi').DataTable().ajax.reload();
                    }

                });
            } else {
                swal("Aman", "Data Anda aman", "success");
            }
        });

        
    }

    function check_all(){
        $('input[type="checkbox"]').prop("checked", true);
    }




</script>

@endsection