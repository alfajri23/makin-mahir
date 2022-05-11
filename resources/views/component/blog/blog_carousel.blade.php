<div class="container">

    <div class="col-lg-12 pt-2">
        <h2 class="fw-400 font-lg">Daftar blog</b> 
            <a href="#" class="float-right" >
                <i class="feather-edit text-grey-500 font-xs"></i>
            </a>
        </h2>
    </div>

    <div class="col-lg-12 mt-3">
        <div class="owl-carousel category-card owl-theme overflow-hidden overflow-visible-xl nav-none">
            @forelse ($data as $dt)
            <div class="item">
                <div class="card w300 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                    <div class="card-image w-100 mb-3">
                       <img src="{{asset($dt->gambar)}}" alt="image" class="w-100">
                    </div>
                    <div class="card-body pt-0">
                        <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-danger d-inline-block text-danger mr-1">{{$dt->created_at}}</span>
                        <span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss">Rp.</span> {{$dt->harga}}</span>
                        <h4 class="fw-700 font-xss mt-3 lh-28 mt-0">
                            {{-- beri pembeda route --}}
                            {{-- @if($tipe == 'konsultasi') --}}
                            <a href="{{route('memberProdukDetail',['tipe' => $tipe, 'id' => $dt->id])}}" class="text-dark text-grey-900">{{$dt->judul}}</a>
                            {{-- @elseif($tipe == 'kelas') --}}
                            {{-- <a href="{{route('produkDetailVideo',$dt->id)}}" class="text-dark text-grey-900">{{$dt->judul}}</a> --}}
                            {{-- @endif --}}
                            
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
</div>