
<div class="pb-lg--7 pt-3 w-100">
    <div class="container">
        <div class="row ml-1">

            @forelse ($data as $dt)
                <div class="{{$layout == 'layouts.public' ? 'col-xl-4' : 'col-xl-4'}} col-lg-6 col-md-6 col-sm-6 col-11 mb-4">
                    <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
                        {{-- <div class="card-image w-100 mb-3">--}}
                        <div class="{{$layout == 'layouts.member' ? 'card-image' : 'card-image-main'}} w-100 mb-3">
                            <img src="{{asset($dt->poster)}}" alt="image" class="w-100">   
                        </div>
                        <div class="card-body pt-0">
                            <div class="row justify-content-around">
                                <div>
                                    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-danger d-inline-block text-danger mr-1">{{$dt->tipe}}</span>
                                </div>
                                <div class="lh-2">
                                    @if($dt->harga_bias)
                                    <p class="font-xssss fw-400 pl-3 pr-3 text-muted text-right mb-0">
                                        <del>Rp. {{number_format($dt->harga_bias)}}</del>
                                    </p>
                                    @endif
                                    <p class="font-xss fw-700 pl-3 pr-3 lh-1 d-inline-block text-success mb-0">
                                        @if ($dt->harga == '#')
                                            Bayar suka-suka 
                                        @elseif ($dt->harga == null)
                                            GRATIS
                                        @else
                                            Rp. {{number_format($dt->harga)}}
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <h4 class="fw-700 font-xss mt-3 lh-20 mt-0">
                                <a href="{{route('memberProdukDetail',$dt->produk->id)}}" class="text-dark text-grey-900">{{$dt->judul}}</a>
                            </h4>
                            <h6 class="font-xsss text-grey-600 fw-500 ml-0 mt-2 mb-0">
                                @if (!empty($dt->tanggal))
                                    {{date_format(date_create($dt->tanggal),"d M Y")}} 
                                @else
                                @endif
                            </h6>
                            <h6 class="font-xsss text-grey-600 fw-500 ml-0 mt-0"> {{$dt->waktu}} </h6>
                        </div>
                    </div>
                </div>
            @empty             
            @endforelse
        </div>
    </div>
</div>