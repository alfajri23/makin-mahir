<style>
    #buttonBuy{
        display: flex;
        justify-content: center;
    }
</style>

<div class="page-title style1 col-12 mb-0 mx-auto text-center">
    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-warning d-inline-block text-warning mr-1">Pendaftaran {{$nama->judul}}</span>
    <h2 class="text-grey-900 fw-700 font-xxl pb-3 mb-0 mt-3 d-block lh-3">Beli kelas<br>{{$nama->judul}}</h2>
    <div class="col-12 col-sm-6 mx-auto">
        <img src="{{asset($nama->poster)}}" class="w-100" alt="">
    </div>
    <div class="col-12 col-sm-6 mx-auto mt-2">
        <p class="fw-300 font-xss lh-28 text-grey-600">{!!$nama->deskripsi!!}</p>
    </div>
</div>

<div class="col-10 col-md-5 mx-auto mb-4 d-none">
    <form action="{{route('daftarVideo')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group my-4 ">
        
        <div class="custom-file">
            <input type="hidden" name="id_user" value="{{auth()->user()->id}}" class="form-control" id="exampleInputPassword1">
            <input type="hidden" name="id_produk" value="{{$_GET['id']}}" class="form-control" id="exampleInputPassword1">
        </div>
    </div>


</div>