@extends('layouts.member')
@section('content')

<div class="row container mt-5 mt-sm-0 py-5 px-sm-5 clearfix">
    <div class="spacer"></div>
    <div class="page-title style1 mx-auto col-10 text-center">
        <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Review CV</h2>
        <h2 class="text-grey-600 fw-500 font-xss">{{date_format(date_create($data->created_at),"d M Y")}} </h2>
    </div>

    <div class="col-9 mx-auto">
        <img class="w-100" src="https://img.freepik.com/free-vector/expert-checking-business-leader-order_74855-10624.jpg?t=st=1650951742~exp=1650952342~hmac=55ecdb9c23a81531b345398af8b3fbf411169b28670bb11a812a98083574fc33&w=996" alt="">
        
        <div class="d-flex flex-column justify-content-center mt-4">
                            
            <div class="mb-3">
                <h2 class="text-grey-800 fw-600 font-md pb-3 mb-0 d-block">CV</h2>
                <a href="{{asset($data->cv_user)}}"  type="button" class="btn btn-primary btn-sm">CV Anda</a>
                @isset($data->cv_review)
                    <a href="{{asset($data->cv_review)}}"  type="button" class="btn btn-secondary btn-sm">CV Review</a>
                @endisset
            </div>

            <h2 class="text-grey-800 fw-600 font-md pb-3 mb-0 d-block ">Review</h2>
            <h2 class="text-grey-600 fw-500 font-xsss lh-3 p-3 border">
                {!! $data->review_expert !!}
            </h2>

        </div>
    </div>

</div>

@endsection
