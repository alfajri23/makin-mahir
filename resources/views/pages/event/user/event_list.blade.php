@extends('layouts.public')
@section('content')

<div class="banner-wrapper bg-lightblue pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center pt-lg--10 pt-7">
                <h2 class="fw-700 text-grey-900 display4-size display4-xs-size lh-1 mb-3 pt-5 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">Explore analyze our awesome feature</h2>
                <p class="fw-300 font-xsss lh-28 text-grey-500 pl-lg--5 pr-lg--5 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dol ad minim veniam, quis nostrud exercitation</p>
                <a href="#" class="btn border-0 bg-dark text-uppercase p-3 text-white fw-700 ls-3 rounded-lg d-inline-block font-xssss btn-light mt-3 w200 aos-init" data-aos="fade-up" data-aos-delay="400" data-aos-duration="500">Start Free Trial</a>
            </div>
        </div>
    </div>

    <div class="spacer"></div>

   
</div>

<div class="banner-wrapper bg-lightblue pb-5">
    <div class="container">
        <div class="row">
            @for ($i=0;$i<3;$i++)
            <div class="col-xl-4 col-xxxl-3 col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                    <div class="card-image w-100 mb-3">
                        <a href="default-course-details.html" class="video-bttn position-relative d-block"><img src="https://via.placeholder.com/400x300.png" alt="image" class="w-100"></a>
                    </div>
                    <div class="card-body pt-0">
                        <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-warning d-inline-block text-warning mr-1">Python</span>
                        <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss">$</span> 240</span>
                        <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="default-course-details.html" class="text-dark text-grey-900">Complete Python Bootcamp From Zero to Hero in Python </a></h4>
                        <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2"> 32 Lesson </h6>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>

<div class="feedback-wrapper pt-lg--7 pb-lg--7 pb-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-left mb-5 pb-0">

                <h2 class="text-grey-800 fw-700 font-xl lh-2">Customer love  what we do</h2>
            </div>
        
            <div class="col-lg-12">
                <div class="feedback-slider2 owl-carousel owl-theme overflow-visible dot-none right-nav pb-4 nav-xs-none">
                    @for ($i=0;$i<3;$i++)
                    <div class="owl-items bg-transparent">
                        <div class="card w-100 p-0 bg-transparent text-left border-0">
                            <div class="card-body p-5 bg-white shadow-xss rounded-lg triangle-after">
                                <p class="font-xsss fw-500 text-grey-700 lh-30 mt-0 mb-0 ">Quite simply the best theme we’ve ever purchased. The customisation and flexibility are superb. Speed is awesome. Not a criticism we can make. Fun to use the theme, easy installation, super easy to use. Excellent work.”</p>
                            </div>

                            <div class="card-body p-0 mt-5 bg-transparent">
                                <img src="https://via.placeholder.com/40x40.png" alt="user" class="w45 float-left mr-3">
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Goria Coast</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-500">Digital Marketing Executive</h5>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>


@endsection