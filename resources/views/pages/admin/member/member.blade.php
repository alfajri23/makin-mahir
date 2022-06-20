@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Member</h1>

    <div class="table-responsive">
        <table class="table table-bordered tableUser" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Tanggal lahir</th>
                    <th>Alamat</th> 
                    <th>Pendidikan</th>
                    <th>IG</th>
                    <th>Facebook</th>
                    <th>Twitter</th>
                    <th>Linkedin</th>
                    <th>Event</th>
                    <th>Konsultasi</th>
                    <th>Kelas</th>
                    <th>MBTI</th>
                    <th>Riasec</th>
                    <th>Daftar</th>
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
            <h5 class="modal-title" id="exampleModalLabel">Detail member</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div id="imgUser">

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <p>Nama</p>
                        <p>Email</p>
                        <p>Telepon</p>
                        <p>Tanggal lahir</p>
                        <p>Alamat</p>
                        <p>Pendidikan</p>
                        <p>IG</p>
                        <p>Linkedin</p>
                        <p>Twitter</p>
                        <p>Facebook</p>
                    </div>
                    <div class="col-10" id="modalBody">
                    </div>
                </div>
                <div class="container-fluid px-0 mt-2">
                    <h5>Riwayat event</h5>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Beduk</th>
                            <th scope="col">Webinar</th>
                            <th scope="col">Konsultasi</th>
                            <th scope="col">Kelas</th>
                          </tr>
                        </thead>
                        <tbody  id="detailEvent">
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': `Bearer {{Session::get('token')}}`
        }
	});

    $(function (){

        $('.tableUser').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('memberAdminIndex') }}",
            columns: [ 
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true
                },
                {data: 'nama', name: 'nama'},
                {data: 'email', name: 'email'},
                {data: 'telepon', name: 'telepon',visible: false},
                {data: 'tgl_lahir', name: 'tgl_lahir',visible: false},
                {data: 'alamat', name: 'alamat',visible: false},
                {data: 'pendidikan', name: 'pendidikan',visible: false},
                {data: 'ig', name: 'ig',visible: false},
                {data: 'facebook', name: 'facebook',visible: false},
                {data: 'twitter', name: 'twitter',visible: false},
                {data: 'linkedin', name: 'linkedin',visible: false},
                {data: 'event', name: 'event',className: "dtCenter" },
                {data: 'konsultasi', name: 'konsultasi',className: "dtCenter"},
                {data: 'kelas', name: 'kelas',className: "dtCenter"},
                {data: 'mbti', name: 'mbti',className: "dtCenter"},
                {data: 'riasec', name: 'riasec',className: "dtCenter"},
                {data: 'daftar', name: 'daftar'},
                {data: 'aksi', name: 'aksi',className: "dtCenter"},
                
            ],
            dom: 'Bfrtlip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    header : false,
                    title: '',
                    exportOptions: {
                        header : false,
                        columns : [0, 1, 2,16 ,3 ,4,5,6,7,8,9,10]
                    },
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Beduk',
                    exportOptions: {
                        header : false,
                        columns : [0, 1, 2,16 ,3 ,4,5,6,7,8,9,10]
                    },
                },
                {
                    extend: 'csvHtml5',
                    title: 'Data Beduk',
                    exportOptions: {
                        header : false,
                        columns : [0, 1, 2,16 ,3 ,4,5,6,7,8,9,10]
                    },
                },
                
            ]
        });
    });

    function detail(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('memberAdminDetail') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                let modalBody = $('#modalBody');

                //Data
                let element = ` 
                    <p>:  ${datas.nama}</p>
                    <p>:  ${datas.email}</p>
                    <p>:  ${datas.telepon}</p>
                    <p>:  ${datas.tgl_lahir}</p>
                    <p>:  ${datas.alamat}</p>
                    <p>:  ${datas.pendidikan}</p>
                    <p>:  ${datas.ig}</p>
                    <p>:  ${datas.linkedin}</p>
                    <p>:  ${datas.twitter}</p>
                    <p>:  ${datas.facebook}</p>
                `;
                modalBody[0].innerHTML = element;

                //Foto
                if(datas.foto != null){
                    $('#imgUser')[0].innerHTML = `
                        <img src="${window.location.origin}/${datas.foto}" style="width:200px" >
                    `;
                }

                //Event
                let event = `
                    <tr>
                        <td>${data.event.length}</td>
                        <td>${data.konsultasi.length}</td>
                        <td>${data.kelas.length}</td>
                    </tr>
                `;

                $('#detailEvent')[0].innerHTML = event;


                $('#modalDetail').modal('show');
            }
        });
    }

</script>


@endsection