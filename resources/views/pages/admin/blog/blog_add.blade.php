@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h2 class="text-center h1 font-weight-bold text-gray-800 mb-4"></h2>
    <div class="row">
        <div class="col-9">
            <form action="{{route('blogStore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Judul</label>
                    <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Link</label>
                    <input type="text" name="link" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputnama1">Isi</label>
                    <textarea name="isi" class="form-control isi">
                        
                    </textarea>
                </div>
        </div>
        <div class="col-3">
            
            <div class="form-group">
                <label for="exampleFormControlInput1">Gambar</label><br>
                <input type="file" name="file" id="exampleFormControlInput1" placeholder="" required>
                @error('file')
                    <div>
                        <span class="" role="alert alert-danger">
                            <small  class="text-danger">{{ $message }}</small>
                        </span>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Video</label>
                <input type="text" name="video" class="form-control" id="exampleFormControlInput1" placeholder="">
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Opsional
                  </small>
            </div>
            
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kategori</label>
                    <select name="id_kategori" class="form-control" id="exampleFormControlSelect1">
                        <option value="">Kosong</option>
                        @forelse ( $data as $dt)
                            <option value="{{$dt->id}}">{{$dt->nama}}</option>
                        @empty
                            
                        @endforelse
                    </select>
                </div>
                {{-- <input type="text" name="kategori" class="form-control" id="exampleFormControlInput1" placeholder=""> --}}
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Penulis</label>
                <input type="text" name="penulis" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">tag</label>
                <input type="text" name="tag" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">meta_title</label>
                <input type="text" name="meta_title" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">meta_desc</label>
                <input type="text" name="meta_desc" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">meta_keyword</label>
                <input type="text" name="meta_keyword" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-paper-plane-top"></i>
                Publish
            </button>
        </div>


        
        

        </form>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"
integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

    $(document).ready(function() {
		tinymce.init({
	            selector: "textarea",
	            branding: false,
	            width: "100%",
	            height: "400",
	            plugins: [
	                "advlist autolink lists charmap print preview anchor",
	                "searchreplace visualblocks code fullscreen",
	                "paste wordcount link","directionality",
                    "media image code"
	            ],
	            toolbar: "link | undo redo | bold italic | bullist numlist outdent indent | ltr rtl | media image",
                image_title: true,
                /* enable automatic uploads of images represented by blob or data URIs*/
                automatic_uploads: true,
                file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                Note: In modern browsers input[type="file"] is functional without
                even adding it to the DOM, but that might not be the case in some older
                or quirky browsers like IE, so you might want to add it to the DOM
                just in case, and visually hide it. And do not forget do remove it
                once you do not need it anymore.
                */

                input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    /*
                    Note: Now we need to register the blob in TinyMCEs image blob
                    registry. In the next release this part hopefully won't be
                    necessary, as we are looking to handle it internally.
                    */
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
                };

                input.click();
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
	      
	    });
	});

</script>

@endsection