@extends('layouts.admin')

@section('content')


<div class="container-fluid">
    <h2 class="fw-500 text-grey-800 font-lg">Tambah Materi - {{$data->bab_kelas->nama}}</h2>
    <div class="row">
        <div class="col-9">
            <form action="{{route('materiStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-3">
                <div class="mb-3">
                    <label class="fw-500 text-grey-600 display2-md-size">Judul</label>
                    <input type="text" name="judul" value="{{$data->judul}}" class="form-control">
                    <input type="hidden" name="id" value="{{$data->id}}" class="form-control">
                    <input type="hidden" name="id_bab" value="{{$data->id_bab}}" class="form-control">
                    <input type="hidden" name="id_kelas" value="{{$data->id_kelas}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="fw-500 text-grey-600 display2-md-size">Isi</label>
                    <textarea name="isi" class="form-control isi">  
                        {{$data->isi}}
                    </textarea>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="p-2">

                <div class="card w-100 text-left border-0 shadow-xss rounded-lg p-3 mb-3">
                    <button type="submit" class="btn btn-success mb-2">Edit</button>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mb-2">Kembali</a>
                </div>

                <div class="card w-100 text-left border-0 shadow-xss rounded-lg p-3 mb-3">
                    <label class="fw-500 text-grey-600 font-xsss">Link URL Video</label>
                    <img id="output" src="https://image.shutterstock.com/image-vector/ui-image-placeholder-wireframes-apps-260nw-1037719204.jpg"/>
                    <input type="text" name="link_video" value="{{$data->link_video}}" class="form-control">
                </div>

                <div class="card w-100 text-left border-0 shadow-xss rounded-lg p-3 mb-3">
                    <label class="fw-500 text-grey-600 font-xsss">Upload materi PDF</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file">
                        <label class="custom-file-label" for="customFileLang">Upload disini</label>
                    </div>

                    @isset($data->file)
                    <div class="mt-3">
                        <a href="{{asset($data->file)}}">
                            <i class="fas fa-file"></i>
                            Download file
                        </a>
                    </div>
                    @endisset
                    
                </div>
            </div>
            </form>
        </div>
    </div>


</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"
integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
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
</script>

@endsection