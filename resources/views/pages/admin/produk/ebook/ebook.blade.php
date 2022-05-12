@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ebook</h1>
    <a href="{{route('ebookAdd')}}" class="btn btn-primary mb-2">Tambah</a>
    <!-- DataTales Example -->
    <div class="table-responsive">
        <table class="table table-bordered tableEbook" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Kategori</th>
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
        <div class="modal-body">
            <div class="card-body">
                <div class="row" id="modalBody">
                    
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


<script>
    $(function (){
        let tabel = $('.tableEbook');

        tabel.DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('ebookExpert') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true,
                    width:'5%'
                },
                {data: 'judul', name: 'judul'},
                {data: 'gambar', name: 'gambar'},
                {data: 'kategori', name: 'kategori',width:'10%'},
                {data: 'aksi', name: 'aksi',width:'10%'},
            ]
        })
    })

    const detail = id =>{
        $.ajax({
            type : 'GET',
            url  : "{{ route('ebookDetailAdmin') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                let img = `
                <div class="col-3">
                    <img src="${window.location.origin}/${datas.gambar}" style="width:200px" >
                </div>
                <div class="col-8">
                    <blockquote class="blockquote">
                        <h4 class="mb-0">${datas.judul}</h4>
                        <footer class="blockquote-footer">${datas.kategori}
                        </footer>
                        <a href="${window.location.origin}/${datas.link}">Download</a>
                    </blockquote>
                    <p>${datas.desc}</p>
                </div>
                `;

                $('#modalBody')[0].innerHTML = img;

                $('#modalDetail').modal('show');
            }
        });
    }

</script>


@endsection