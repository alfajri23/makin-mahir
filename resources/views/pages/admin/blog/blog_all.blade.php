@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1 class="h1 font-weight-bold text-gray-800 mb-4">Blog Aktif</h1>

    <div class="row justify-content-between">
        <div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kategori</label>
                <select id="status" class="form-control">
                    <option value="">Pilih</option>
                    @forelse ( $kat as $dt)
                        <option value="{{$dt->id}}">{{$dt->nama}}</option>
                    @empty
                        
                    @endforelse
                </select>
              </div>
        </div>

        <div>
            <a href="{{route('blogAdd')}}" class="btn btn-sm btn-primary">Tambah</a>
            <a href="{{route('blogKategori')}}" class="btn btn-sm btn-secondary">Setting</a>
        </div>
    </div>
    
    <p></p>

    <div class="table-responsive">
        <table class="table table-bordered tableBlog" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Id kategori</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Tanggal</th>
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': `Bearer {{Session::get('token')}}`
        }
	});

    let tabel = $('.tableBlog');

    $(function (){
        let table = tabel.DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('blogAdmin') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true
                },
                {data: 'judul', name: 'judul'},
                {data: 'id_kategori', name: 'id_kategori',visible: false},
                {data: 'kategori', name: 'kategori'},
                {data: 'penulis', name: 'penulis'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'aksi', name: 'aksi'},
            ]
        })

        $('#status').change(function( ){
            table.columns(2)
            .search($(this).val())
            .draw( );
        });
    })

    function unpublish(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('blogUnpublish') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                $('.tableBlog').DataTable().ajax.reload();
                swal('Berhasil','Blog telah diarsipkan', "success");
            }
        });
    }

    

    

</script>



@endsection