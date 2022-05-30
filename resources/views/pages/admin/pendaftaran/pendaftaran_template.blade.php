@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-4">Pendaftaran <br>Template</h1>

    <div class="table-responsive">
        <table class="table table-bordered tablePendaftaran" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Email</th>
                    <th>Bayar</th>
                    <th>Tanggal</th>
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
                        <p>Status bayar</p>
                        <p>Nominal</p>
                        <p>Tanggal bayar</p>
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
            ajax: {
                url : "{{ route('pendaftaranTemplate') }}",
            },
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true
                },
                {data: 'judul', name: 'judul'},
                {data: 'email', name: 'email'},
                {data: 'bayar', name: 'bayar'},
                {data: 'tanggal', name: 'tanggal',className: "dtCenter"},
                {data: 'aksi', name: 'aksi'},
            ]
        })
    })

    function detail(id,id_enroll){
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

                
                asset = window.location.origin;
                bukti = `<a target="_blank" href="${asset}/${datas.bukti}">Bukti</a>`;
                    
                
               
                konfirmasi = `
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button onclick="tolak(${datas.id},${id_enroll})" class="btn btn-danger btn-sm">Tolak</button>
                </div>
                `;
                

                let element = ` 
                    <p>:  ${datas.nama}</p>
                    <p>:  ${datas.status}</p>
                    <p>:  ${datas.harga}</p>
                    <p>:  ${datas.tanggal_bayar}</p>
                    <p>:  ${bukti}</p>
                    <p>:  ${konfirmasi}</p>
                `;
            
                modalBody[0].innerHTML = element;

                $('#modalDetail').modal('show');
                
            }
        });

    }

    function tolak(id_transaksi,id_enroll){
        $.ajax({
            type : 'GET',
            url  : "{{ route('transaksiTolak') }}",
            data : {
                id : id_transaksi
            },
            dataType: 'json',
            success : (data)=>{
                console.log(data)
                $.ajax({
                    type : 'GET',
                    url  : "{{ route('deleteEnrollTemplate') }}",
                    data : {
                        id : id_enroll
                    },
                    dataType: 'json',
                    success : (data)=>{
                        swal('datas', "Pembayaran telah dikonfirmasi", "success");
                        $('#modalDetail').modal('hide');
                        $('.tablePendaftaran').DataTable().ajax.reload();
                    }
                });
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
                let datas = data.data;
                swal(datas, "Pembayaran telah dikonfirmasi", "success");
                $('#modalDetail').modal('hide');
                $('.tablePendaftaran').DataTable().ajax.reload();
            }
        });
    }

    function konfirmasi_mid(order_id,id){
    
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