<div class="container">

    <div class="col-lg-12 pt-2">
        <h2 class="fw-400 font-lg">Daftar <b>{{$title}}</b> 
        </h2>
    </div>

    <div class="col-lg-12 mt-3">
        <div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none">
            @forelse ($data as $dt)
            <div class="item">
                <div class="card w300 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                    <div class="card-image w-100 mb-3">
                            <img src="{{asset($dt->poster)}}" alt="image" class="w-100">
                    </div>
                    <div class="card-body pt-0">
                        <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-danger d-inline-block text-danger mr-1">{{$dt->tipe != null ? $dt->tipe : $tipe}}</span>
                        <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss">Rp.</span> {{$dt->harga}}</span>
                        <h4 class="fw-700 font-xss mt-3 lh-28 mt-0">
                            <a href="{{route('memberProdukDetail',$dt->produk->id)}}" class="text-dark text-grey-900">{{$dt->judul}}</a>
                        </h4>
                        <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-2 mb-0"> {{$dt->tanggal}} </h6>
                        <h6 class="font-xssss text-grey-500 fw-600 ml-0 mt-0"> {{$dt->waktu}} </h6>  
                    </div>
                </div>
            </div>

            @empty
                
            @endforelse
        </div>
    </div>

    <div class="spacer"></div>
</div>