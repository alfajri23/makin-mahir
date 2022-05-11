@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <h2 class="text-grey-700 fw-700 display1-size">Tambah Expert</h2>
    </div>

    <div class="row">
        <div class="col-8">
            <form action="{{route('expertAdminStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-3">
                <div class="mb-3">
                    <label class="fw-700 text-grey-800 display2-md-size">Nama</label>
                    <input type="text" name="nama" value="" class="form-control">
                    <input type="hidden" name="id" value="" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="fw-700 text-grey-800 display2-md-size">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="fw-700 text-grey-800 display2-md-size">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="p-3">
                <div class="card w-100 text-left border-0 shadow-xss rounded-lg p-3 mb-3">
                    <button type="submit" class="btn btn-success mb-2">Tambahkan</button>
                    <button type="button" class="btn btn-outline-danger">Kembali</button>
                </div>

                <div class="card w-100 text-left border-0 shadow-xss rounded-lg p-3 mb-3">
                    <img id="output" src="https://via.placeholder.com/240"/>
                    <div class="custom-file mt-2">
                        <input onchange="loadFile(event)" type="file" class="custom-file-input" name="foto">
                        <label class="custom-file-label" for="customFileLang">Upload gambar</label>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    

</div>


<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

</script>

@endsection