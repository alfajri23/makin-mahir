
<div class="spacer"></div>

<style>
    .video-container {
    overflow: hidden;
    position: relative;
    width:100%;
}

.video-container::after {
    padding-top: 56.25%;
    display: block;
    content: '';
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>

<div class="col-11 col-sm-9 mx-auto">
    <div class="card border-0 mb-0 rounded-lg" style="width: 100%">
        <div class="row">
            <div class="video-container">
                <iframe src="{{$data->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div> 
    </div>

    <div class="card d-block border-0 rounded-lg overflow-hidden dark-bg-transparent bg-transparent mt-4 pb-3">
        <div class="row justify-content-md-between">
            <div class="col-12 col-md-6">
                <h2 class="font-xl fw-700">{{$data->judul}}</h2>
            </div>
        </div>

        <span class="font-xssss fw-700 text-grey-900 d-inline-block ml-0 text-dark">Pemateri : {!!$data->pemateri!!}</span>
        <span class="dot ml-2 mr-2 d-inline-block btn-round-xss bg-grey"></span>
    </div>

    <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4">
        <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Deskripsi</h2>
        <p class="font-xs fw-500 lh-28 text-grey-600 mb-0 pl-2">{!!$data->deskripsi!!}</p>
    </div>

    @if(count($subs) > 0)
    <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4">
        <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Video</h2>
        <ul class="list-group">
            @forelse ($subs as $sub)
                <li class="list-group-item">
                    <a href="{{route('memberKelasSubDetail',['id'=>$data->id , 'sub'=>$sub->id])}}">{{$sub->judul}}</a>
                </li>
                
            @empty
                
            @endforelse
        </ul>
    </div>
    @endif

</div>