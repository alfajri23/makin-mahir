@forelse ($data as $dt)
<div class="col-xl-4 col-xxxl-3 col-lg-6 col-md-6 col-sm-6 mb-4">
    <div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1">
        <div class="card-image w-100 mb-3">
            <img data-src="{{$dt->poster != null ? asset($dt->poster) : 'https://via.placeholder.com/400x300.png'}}" alt="image" class="w-100 lozad">
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
                        @if ($dt->harga == null)
                            GRATIS
                        @else
                            Rp. {{number_format($dt->harga)}}
                        @endif
                    </p>
                </div>
            </div>

            <h4 class="fw-700 font-xsss mt-3 lh-20 mt-0">
                <a href="{{route('memberProdukDetail',$dt->produk->link)}}" class="text-grey-900">{{$dt->judul != null ? $dt->judul : $dt->nama}}</a>
            </h4>
            <h6 class="font-xssss text-grey-600 fw-500 ml-0 mt-2 mb-0">
                @if (!empty($dt->tanggal))
                    {{date_format(date_create($dt->tanggal),"d M Y")}} 
                @else
                @endif
            </h6>
            <h6 class="font-xssss text-grey-600 fw-500 ml-0 mt-0"> {{$dt->waktu}} </h6>
        </div>
    </div>
</div>
@empty     
<div class="col-6 mx-auto text-center aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
        <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z"/>
      </svg>
    <h4 class="font-xsss text-grey-600 fw-400 text-center mt-3">Belum ada ...</h4>        
</div>
@endforelse

<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script>
    const observer = lozad();
    observer.observe();
</script>