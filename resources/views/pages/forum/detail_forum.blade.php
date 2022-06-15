@extends($layout)

@section('content')

<style>
    .trash{
        position: absolute;
        right: 0;
        top: 0;
        cursor: pointer;
    }
    p{
        color: black;
    }

    .form-control{
        line-height: 1rem !important;
    }
</style>
<div class="spacer"></div>

<div class="row flex-column-reverse flex-sm-row mt-3">
    <div class="col-12 col-sm-9">
        <div class="container">
            {{-- <a href="{{route('forumIndex')}}" class="mb-3">
                <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
            </a> --}}
            <div class="card w-100 p-3 rounded-sm border-1 mb-1 p-sm-4">
                <div>
                    <div class="row ml-1 justify-content-between px-3">
                        <div class="row">
                            <figure class="avatar mr-2">
                                <img src="{{asset($dt->user->foto)}}" alt="image" style="width:50px">
                            </figure>
                            <div>
                                <h5 class="font-xsss mb-0">{{$dt->user->nama}}</h5>
                                <div class="font-xsss">{{date_format(date_create($dt->created_at),"d M Y")}} </div>
                            </div>
                        </div>
            
                        <div>
                            <p class="text-uppercase font-weight-bolder">{{$dt->kategori->nama}}</p>
                        </div>
                    </div>
                    
                    <div class="mb-2">
                        <img src="{{asset($dt->gambar)}}" class="img-responsive w-100" alt="" srcset="">
                    </div>
                    <h6 class="font-xss fw-600 lh-3">{{$dt->judul}}</h6>
                    <div class="font-xsss font-grey-900">
                        {!!$dt->isi!!}
                    </div>
            
                    {{-- <div class="row px-3">
                        <div class="clearfix mx-4">
                            <i class="fas fa-thumbs-up"></i> Like
                        </div>
                        <div class="clearfix">
                            <i class="fas fa-comment-alt"></i> Comment
                        </div>
                    </div> --}}

                    <div class="row bg-light p-2 mt-3 align-items-center">
                        <div class="flex-grow-1">
                            <form class="border-0" action="{{route('forumStoreKomentar')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <textarea rows="4" name="jawaban" class="form-control" placeholder="komentar"></textarea>
                            <input type="hidden" name="id_pertanyaan" value="{{$dt->id}}" class="form-control" placeholder="komentar">
                        </div>

                        <div class="ml-1">
                            <button type="submit" class="btn btn-primary">Publish</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    @forelse ($komentar as $km)
                    <div class="messages-content p-3 ml-3 border-bottom" id="komentar-{{$km->id}}">
                        <div class="message-item position-relative">
                            <div class="row px-3">
                                <figure class="avatar mr-2">
                                    @if(!empty($km->user->foto))
                                    <img src="{{asset($km->user->foto)}}" alt="image" style="width:40px">
                                    @else
                                    <i class="fa-solid fa-user fa-lg"></i>
                                    @endif
                                </figure>
                                
                            
                                <div>
                                    <h5 class="font-xssss mb-0">{{$km->user->nama}}</h5>
                                    <div class="font-xssss">{{date_format(date_create($km->created_at),"d M Y")}} </div>
                                </div>
                                @if($km->id_user == 20)
                                <i class="fa-solid fa-circle-check ml-2 text-info"></i>
                                @endif
                            </div>

                            @if ($km->id_user == Session::get('auth.id_user'))
                            <span class="trash">
                                <i onclick="deleteKomentar({{$km->id}})" class="fas fa-trash-alt"></i>
                            </span>
                                
                            @endif
                            <div class="message-wrap text-dark">{!!$km->jawaban!!}</div>
                        </div>
                    </div> 
                    @empty
                        
                    @endforelse
                    
                </div>
            
            </div>

        </div>
    </div>

    <div class="col-12 col-sm-3">
        <h5 class="font-sm fw-500">Kategori</h5>
        @forelse ($kategori as $kat)
        <a href="{{route('forumIndex',['kategori'=> $kat->nama])}}" class="d-flex align-items-center btn btn-light my-1">  
            <p class="ml-2 mb-0">{{$kat->nama}}</p>
        </a>
        @empty
            
        @endforelse
        {{-- <div class="spacer"></div> --}}
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': `Bearer {{Session::get('token')}}`
        }
	});

    function deleteKomentar(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('forumDeleteKomentar') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                $('#komentar-'+id).remove();
            }
        });
    }

    
</script>


@endsection