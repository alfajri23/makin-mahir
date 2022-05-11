{{-- {{ route('notifications') }} --}}
<a><span class="dot-count bg-warning"></span>
    {{-- <i class="feather-bell font-xl fa-shake text-current"></i> --}}
    <i class="fa-solid fa-bell font-xl fa-shake text-current"></i>
    <div class="menu-dropdown">
        <h4 class="fw-700 font-xs mb-4">Notifikasi</h4>
        @forelse ($data as $dt)
            <div class="card bg-transparent-card w-100 border-0 mb-3">
                {{-- <i class="fas fa-bell fa-fw fa-lg fa-shake fa-5x position-absolute left-0 top-10"></i> --}}
                {{-- <img src="https://via.placeholder.com/50x50.png" alt="user" class="w40 position-absolute left-0 rounded-circle"> --}}
                <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-500 d-block">{{$dt->nama}}</h5>
                <h6 class="text-grey-500 fw-500 font-xssss lh-4">{{$dt->tipe}}</h6>
            </div>
        @empty
            
        @endforelse
    </div>
</a>