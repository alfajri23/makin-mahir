<div class="spacer"></div>

<div class="col-11 col-sm-9 mx-auto">
    <div class="card border-0 mb-0 rounded-lg overflow-hidden">
        <div class="row">
            {{-- video --}}
            <div class="col-12 col-sm-10 mx-auto">
                <div class="card-image w-100 mb-3">
                    <a class="video-bttn position-relative d-block">
                        <img src="{{asset($data->poster)}}" alt="image" class="w-100">
                    </a>
                </div>
            </div>
        </div>
        
    </div>

    <div class="card d-block border-0 rounded-lg overflow-hidden dark-bg-transparent bg-transparent mt-4 pb-3">
        <div class="row justify-content-md-between">
            <div class="col-12 col-md-8">
                <h2 class="display1-size fw-700">{{$data->judul}}</h2>
            </div>
            
        </div>

        <span class="font-xssss fw-700 text-grey-900 d-inline-block ml-0 text-dark">Pemateri : {!!$data->pemateri!!}</span>
        <span class="dot ml-2 mr-2 d-inline-block btn-round-xss bg-grey"></span>
    </div>

    <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4">
        <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Deskripsi</h2>
        <p class="font-xs fw-500 lh-28 text-grey-600 mb-0 pl-2">{!!$data->deskripsi!!}</p>
    </div>

    <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4">
        <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Link rekaman</h2>
        <p class="font-xs fw-500 lh-28 text-grey-600 mb-0 pl-2">{{$data->link_rekaman}}</p>
    </div>

    <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4">
        <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Materi</h2>
        <p class="font-xs fw-500 lh-28 text-grey-600 mb-0 pl-2">{{$data->link_materi}}</p>
    </div>
</div>