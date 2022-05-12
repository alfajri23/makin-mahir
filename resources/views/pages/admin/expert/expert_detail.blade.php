@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <img src="{{asset($data->foto)}}" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-8">
            <button onclick="reset({{$data->id}})" type="button" class="btn btn-warning btn-sm float-end">reset password</button>
            <div class="card-body">
                <h5 class="card-title fw-bold">{{$data->nama}}</h5>
                <p class="card-text">{{$data->email}}</p>
                <p class="card-text">{!!$data->tentang!!}</p>
            </div>
        </div>
    </div>

</div>

<script>
    function reset(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('expertAdminReset') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
               alert("Password baru : " + data.data);
            }
        });
    }
</script>

@endsection