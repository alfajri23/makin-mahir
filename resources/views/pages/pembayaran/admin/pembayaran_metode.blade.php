@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="welcome-text">
            <h4 class="mb-2">Metode pembayaran</h4>
            <p>Jika tidak ada tipe pembayaran payment gateway yang aktif maka pembayaran dilakukan dengan<br>
            <strong>Upload bukti transfer</strong> dengan setting transfer bank
            {{-- <a class="text-secondary fw-bolder" href={{route('masterAddProgram',['id'=>3])}}> disini</a> --}}
            </p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <h5 class="mb-4">Metode pembayaran via payment gateway</h5>
                @forelse ($datas as $data)
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-warning">
                        <div class="card-body">
                                <div class="media ai-icon">
                                    <span class="me-3">
                                        <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
											<ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
											<path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
											<path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
										</svg>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-0">Via</p>
                                        <a href="{{route('settingDetailPembayaranAdmin',$data->id)}}">
                                            <h3 class="mb-0 fw-bolder text-white">{{$data->nama}}</h3>    
                                        </a>

                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="status" onchange="switchs({{$data->id}})" class="custom-control-input" id="{{$loop->iteration}}" {{$data->status ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="{{$loop->iteration}}">Status</label>
                                        </div>
                                        
                                        {{-- <div class="form-check form-switch mt-3">
                                            <input type="checkbox" role="switch" onchange="switchs({{$data->id}})" name="status" class="form-check-input" id="{{$loop->iteration}}" {{$data->status ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="{{$loop->iteration}}">Status</label>
                                        </div> --}}
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                @empty
                    
                @endforelse

            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function switchs(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('settingPembayaranSave') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                if(data.status == 'success'){
                    swal("Sukses",data.message, "success");
                }else{
                    swal("Error", data.message, "danger");
                    location.reload();
                }
            }
        });
    }
</script>


@endsection