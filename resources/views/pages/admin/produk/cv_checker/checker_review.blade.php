@extends('layouts.admin')

@section('content')

<div class="container">
    <h2 class="text-center font-lg font-weight-bold text-gray-800 mb-4">Review CV</h2>
    <div class="row">
        <div class="col-3">
            <div class="item">
                <div class="card w200 d-block border-0 shadow-xss rounded-lg overflow-hidden mb-4">
                    <div class="card-body position-relative h100 bg-gradiant-bottom bg-image-cover bg-image-center" style="background-image: urlhttps://via.placeholder.com/200x100.png);"></div>
                    <div class="card-body d-block w-100 pl-4 pr-4 pb-4 text-center">
                        <figure class="avatar ml-auto mr-auto mb-0 mt--6 position-relative w75 z-index-1">
                            <img src="{{asset($data->user->foto)}}" alt="image" class="float-right p-1 bg-white rounded-circle w-100"></figure>
                        <div class="clearfix"></div>
                        <h4 class="fw-700 font-xsss mt-3 mb-1">{{$data->user->nama}}</h4>
                        <p class="fw-500 font-xsssss text-grey-500 mt-0 mb-2">support@gmail.com</p>
                        <a href="{{asset($data->cv_user)}}" class="btn p-2 mt-3 text-xs text-center text-white bg-success text-uppercase fw-600 ls-3">Download CV</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-9">
            <p class="text-md font-weight-bold text-dark">Pesan :</p>
            <p class="text-md text-dark">{{$data->keterangan_user}}</p>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
        <form action="{{route('cvCheckerSave')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="text-lg font-weight-bold text-dark" for="exampleInputnama1">Review</label>
                <textarea name="review_expert" class="form-control" required>
                    
                </textarea>
            </div>

            <div class="custom-file">
                <label class="" for="customFile">Upload file</label><br>
                <input type="file" name="cv_review" class="" >
                <input type="hidden" name="id" value="{{$data->id}}" >
            </div>

            <button type="submit" class="btn btn-primary mt-3">Kirim</button>
        </form>
        </div>
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
	                "paste wordcount"
	            ],
	            toolbar: "undo redo | bold italic | bullist numlist outdent indent "
	      
	    });
	});

</script>




@endsection