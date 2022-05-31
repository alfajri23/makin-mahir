{{-- {{ route('notifications') }} --}}
<div>
    <span class="dot-count bg-warning"></span>
    <i class="fa-solid fa-bell font-xl fa-shake text-current"></i>
    <div class="menu-dropdown">
        <h4 class="fw-700 font-xs mb-4">Notifikasi</h4>
        @forelse ($data as $dt)
            <div class="card bg-transparent-card w-100 border-0 mb-3">
                <div>
                    <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-500 d-block">
                        <div>
                            {!!$dt->nama!!}
                        </div>
                    </h5>
                </div>
                <h6 class="text-grey-500 fw-500 font-xssss lh-4">{{$dt->tipe}}</h6>
            </div>
        @empty
            
        @endforelse
    </div>
</div>