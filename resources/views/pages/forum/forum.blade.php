@extends($layout)

@section('content')
<style>
    .main-wrap{

        background-color: #f8f8f8;
    }

    form{
        border: 1px solid #dedede;
    }

    .form-group.icon-input i {
        position: absolute;
        left: 15px;
        top: 8px;
    }

    .edit{
        position: absolute;
        right: 10px;
        top: 10px;
        cursor: pointer;
    }

    p{
        color: black;
    }

</style>

<div class="container mt-3 mt-sm-0">
    <div class="spacer-sm"></div>

    <div class="row flex-column-reverse flex-sm-row">
        <div class="col-12 col-sm-9">

            <div class="row justify-content-between px-3 mb-4">
                <div class="">
                    <form action="{{route('forumIndex')}}" method="GET" class="float-left header-search border-1 rounded-sm">
                        <div class="form-group mb-0 icon-input d-flex">
                            <i class="feather-search font-lg text-grey-400"></i>
                            <input name="cari" type="text" placeholder="Start typing to search.." class="flex-grow-1 bg-transparent border-0 lh-32 pt-1 pb-1 pl-5 pr-3 font-xsss fw-500 rounded-xl">
                            <button type="submit" class="btn btn-info">Cari</button>
                        </div>
                    </form>
                </div>
                <div class="mt-3 mt-sm-0">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                        Tambah pertanyaan
                    </button>
                </div>
            </div>

            @include('component.error.error_message')
            
            @forelse ($data as $dt)           
            <div class="card w-100 p-3 rounded-md border-1 my-3 position-relative">
                <div class="row ml-1 justify-content-between px-3">
                    <div class="row">
                        <figure class="avatar mr-3">
                            <img src="{{$dt->user->foto != null ? asset($dt->user->foto) : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png?20150327203541'}}" alt="image" class="rounded-circle w40">
                        </figure>
                        <div>
                            <h5 class="font-xsss mb-0 fw-700">{{$dt->user->nama}}</h5>
                            <div class="font-xssss">{{date_format(date_create($dt->created_at),"d M Y")}} </div>
                        </div>
                    </div>
                </div>

                @if ($dt->id_user == Session::get('auth.id_user'))
                <span class="edit">
                    <i onclick="edit({{$dt->id}})" class="fas fa-pencil mr-1"></i>
                    <i class="fa-solid fa-trash" onclick="event.preventDefault();
                    document.getElementById('form-delete-' + {{$dt->id}}).submit();"></i>


                    <form id="form-delete-{{$dt->id}}" class="d-none" action="{{route('forumDelete')}}" method="post">
                        @csrf
                        <input type="text" name="id" value="{{$dt->id}}" hidden>
                    </form>
                </span>
                @endif

                <div class="mb-2">
                    <img src="{{asset($dt->gambar)}}" class="img-responsive w-100" alt="" srcset="">
                </div>
                <small>{{$dt->kategori->nama}}</small>

                <a href="{{route('forumDetail',$dt->id)}}" class="text-decoration-none">
                    <h6 class="font-xss fw-600 lh-3 mb-0">{{$dt->judul}}</h6>
                </a>

                <div class="font-xsss font-grey-900">
                    {!!$dt->isi!!}
                </div>
               

                <div class="row px-3 mt-3">
                    
                    <div class="clearfix mr-3">
                        <small class="cursor-pointer">
                        <i class="fas fa-eye mr-1 text-cyan"></i>{{$dt->lihat}}  View
                        </small>
                    </div>
                    {{-- <div class="clearfix mx-4">
                        <small>
                        <i class="fas fa-thumbs-up text-danger"></i> Like
                        </small>
                    </div> --}}
                    <div class="clearfix">
                        <small class="cursor-pointer">
                        <i class="fas fa-comment-alt text-twiiter"></i>
                        <a href="{{route('forumDetail',$dt->id)}}" class="text-decoration-none">{{count($dt->jawaban)}} Comment</a>
                        </small>
                    </div>
                    
                </div>
              
            </div>
            @empty
                
            @endforelse

        </div>

        <div class="col-12 col-sm-3 mb-5">
            <h5 class="font-sm fw-500">Kategori</h5>
            @if(\Auth::check()) 
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#kategoriModal">
                    <i class="fa-solid fa-plus"></i>
                    Tambah kategori
                </button>
            @endif
            
            @forelse ($kategori as $kat)
            <a href="{{route('forumIndex',['kategori'=> $kat->nama])}}" class="d-flex align-items-center btn btn-light my-1">  
                <p class="ml-2 mb-0">{{$kat->nama}}</p>
            </a>
            @empty
                
            @endforelse
        </div>
    </div>
    <div class="spacer"></div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        <div class="modal-body">
        <form class="border-0" action="{{route('forumStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <p class="mb-0 fw-700">Judul</p>
                <input type="hidden" name="id" class="form-control" id="ids" placeholder="">
                <input type="text" name="judul" class="form-control" id="judul" placeholder="">
            </div>

            <div class="form-group">
                <p class="mb-0 fw-700">Isi</p>
                <textarea name="isi" id="isi" class="form-control isi">
                    
                </textarea>
            </div>

            <div class="form-group">
                <p class="mb-0 fw-700">Kategori</p>
                <select class="form-control" name="id_kategori" id="id_kat" required>
                    @foreach ($kategori as $kt)
                    <option value="{{$kt->id}}">{{$kt->nama}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <p class="mb-0 fw-700">Insert gambar</p>
                <div id="image">

                </div>
                <input type="file" name="gambar" id="exampleFormControlInput1" placeholder="">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Publish</button>
        </div>
        </form>
      </div>
    </div>
</div>

  <!-- Modal kategori -->
<div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buat kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="formKategori" class="border-0" action="javascript:void(0)">
            @csrf
            <div class="form-group">
                <p class="mb-0 fw-700">Nama</p>
                <input type="text" name="nama" class="form-control" placeholder="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Tambah kategori</button>
        </form>
        </div>
      </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"
  integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': `Bearer {{Session::get('token')}}`
        }
    });

    $(document).ready(function() {
		 tinymce.init({
                menubar: 'insert',
	            selector: "textarea.isi",
	            branding: false,
	            width: "100%",
	            height: "400",
	            plugins: [
	                "advlist autolink lists charmap print preview anchor",
	                "searchreplace visualblocks code fullscreen",
	                "paste wordcount",
                    "media"
	            ],
	            toolbar: "undo redo | bold italic | bullist numlist outdent indent | media"
	    });
	});

    function edit(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('forumDetailAjax') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                $('#ids').val(datas.id);
                $('#judul').val(datas.judul);
                $('#id_kategori').val(datas.id_kategori);
                tinymce.get("isi").setContent(datas.isi);
                $('#image').html(`
                    <img src="${window.location.origin}/${datas.gambar}" style="width:200px" >
                    
                `);
                $('#exampleModal').modal('show');
            }
        });
    }

    $('#formKategori').on('submit',function(){
        let data = $(this).serialize();
        $.ajax({
            type : 'POST',
            url  : "{{ route('forumStoreKategori') }}",
            data : data,
            dataType: 'json',
            success : (data)=>{
                $('#kategoriModal').modal('hide');
                if(data.data == 'success'){
                    swal('Berhasil','Kategori telah ditambahkan', "success");
                }else{
                    swal('Gagal','kategori '+data.pesan+' sudah ada', "warning");
                }
            }
        });
    });

    $('#kategoriModal').on('hidden.bs.modal', function(){
        $('#formKategori').trigger("reset");
    });

</script>




@endsection