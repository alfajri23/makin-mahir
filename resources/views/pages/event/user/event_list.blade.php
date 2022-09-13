@extends('layouts.public')
@section('content')

<div class="banner-wrapper bg-lightblue pb-5 position-relative">
  <div class="ornamen position-absolute bottom-0" style="right: -70px;">
      <img src="{{asset('asset/home/ornamen-1.png')}}" alt="">
  </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center pt-lg--10 pt-7">
                <h2 class="fw-700 text-grey-900 display4-size display4-xs-size lh-1 mb-3 pt-5 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">Event kami</h2>
                <p class="fw-300 font-xss lh-28 text-grey-700 pl-lg--5 pr-lg--5 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">Daftar Event Bersertifikat Dengan Pemateri Profesional di Dunia Kerja</p>
            </div>
        </div>
    </div>

    <div class="spacer"></div>
    <div class="spacer"></div>
    <div class="spacer"></div>
 
</div>

<div class="banner-wrapper bg-lightblue pb-5">
    <div class="container">
        <div class="row">
            @include('component.produk.produk_card')
        </div>
    </div>
</div>

<div class="how-to-work pb-lg--7 pt-5 pb-5 pt-lg--7">
    <div class="container">
        <div class="row justify-content-center">
            <div class="page-title style1 col-xl-6 col-lg-10 col-md-10 text-center mb-5">
                <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block mt-3">Frequently Asked Question</h2>
                <p class="fw-300 font-xsss lh-28 text-grey-500">Pertanyaan yang sering ditanyakan</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div id="accordion" class="accordion">
                  <div class="card border-0 mb-4">
                    <div class="card-header bg-greylight" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          I have read and agree to the Privacy Policy and Terms &amp; Conditions*
                        </button>
                      </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 mb-4">
                    <div class="card-header bg-greylight" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          You can easily build a page without any design or custom coding.
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 mb-4">
                    <div class="card-header bg-greylight" id="headingFour">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          I have read and agree to the Privacy Policy and Terms &amp; Conditions*
                        </button>
                      </h5>
                    </div>

                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                      <div class="card-body">
                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 mb-4">
                    <div class="card-header bg-greylight" id="headingFive">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          I have read and agree to the Privacy Policy and Terms &amp; Conditions*
                        </button>
                      </h5>
                    </div>

                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                      <div class="card-body">
                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 mb-4">
                    <div class="card-header bg-greylight" id="headingSix">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                          I have read and agree to the Privacy Policy and Terms &amp; Conditions*
                        </button>
                      </h5>
                    </div>

                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                      <div class="card-body">
                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card border-0 mb-4">
                    <div class="card-header bg-greylight" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Stream that converts more visitors than any website.
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="feedback-wrapper pt-lg--7 pb-lg--7 pb-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-left mb-5 pb-0">

                <h2 class="text-grey-800 fw-700 font-xl lh-2">Testimoni</h2>
            </div>
        
            <div class="col-lg-12">
                @include('component.testimoni.testimoni_card_1')
            </div>
        </div>
    </div>
</div>



@endsection