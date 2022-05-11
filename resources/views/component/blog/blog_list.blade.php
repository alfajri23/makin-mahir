
<div class="spacer"></div>
<div class="how-to-work pb-lg--7 pt-3">
    <div class="container">
        <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 pl-0">
            <h4 class="text-grey-900 fw-700 pb-3 mb-0 d-block">Daftar blog</h4>
        </div>
        <div class="row">
            @forelse ($data as $dt)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
                    <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                        <div class="card-image w-100 mb-3">
                            <a  class="video-bttn position-relative d-block"><img src="{{asset($dt->gambar)}}" alt="image" class="w-100"></a>
                        </div>
                        <div class="card-body pt-0">
                            <h4 class="fw-700 font-xss mt-3 lh-28 mt-0">
                                {{-- beri pembeda route --}}
                                <a href="{{route('blogDetail',['judul' => $dt->judul ])}}" class="text-dark text-grey-900">{{$dt->judul}}</a>
                                
                            </h4>
                            <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2 mb-0"> {{$dt->penulis}} </h6>
                            <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-0"> {{$dt->created_at}} </h6>
                            
                        </div>
                    </div>
                </div>
            @empty
                
            @endforelse

        </div>
    </div>
</div>