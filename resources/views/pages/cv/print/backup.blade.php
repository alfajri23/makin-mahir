
<!-- 23 -->
<section style="background-color:lightgreen">
    <div class="about pe-5 py-3 child-flex">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">Tentang saya</h4>
        <p>{{$user->desc}}
        </p>
    </div>

    <div class="pengalaman-kerja py-3 child-flex">
        <h4 class="title-section font-weight-bold text-uppercase">PENGALAMAN KERJA</h4>
        @forelse ($kerja as $kr)
        <div>
            <p class="font-weight-bold mb-0">{{$kr->perusahaan}}</p>
            <p class="mb-0 font-italic">{{$kr->mulai}} sampai {{$kr->akhir}}</p>
            <p class="mb-0">{{$kr->posisi}}</p>
            <p>{{$kr->deskripsi}}
            </p>
        </div>                                 
        @empty                                 
        @endforelse
    </div>

    <div class="skill pe-5 py-3 child-flex">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">SKILL</h4>
        <ul class="ps-0 ms-3">
            @forelse ($skil as $sk)
                <li>{{$sk->skil}}</li>
            @empty
                
            @endforelse
        </ul>
    </div>

    <div class="pengalaman-kerja pe-5 py-3 child-flex">
        <h4 class="title-section font-weight-bold text-uppercase">ORGANISASI</h4>
        @forelse ($organisasi as $org)
        <div>
            <p class="font-weight-bold mb-0">{{$org->posisi}}</p>
            <p class="mb-0">{{$org->organisasi}}</p>
            <p class="mb-0 font-italic">{{$org->mulai}} sampai {{$org->akhir}}</p>
            <p class="">{{$org->deskripsi}}</p>
            </p>
        </div>
        @empty
        @endforelse
    </div> 

    <div class="training pe-5 py-3 child-flex">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">PELATIHAN</h4>
        @forelse ($training as $tr)
        <div>
            <p class="font-weight-bold mb-0">{{$tr->program}}</p>
            <p class="mb-0 font-italic">{{$tr->mulai}} sampai {{$tr->akhir}}</p>
            <p class="mb-0 fw-normal">{{$tr->penyelenggara}}</p>
            <p>{{$tr->deskripsi}}
            </p>
        </div>
        @empty
        @endforelse
    </div>

    <div class="prestasi pe-5 py-3 child-flex">
        <h4 class="title-section font-weight-bold text-uppercase">PRESTASI</h4>
        @forelse ($prestasi as $pres)
        <div>
            <p class="font-weight-bold mb-0">{{$pres->prestasi}}</p>
            <p class="mb-0 font-italic">{{$pres->tahun}}</p>
            <p class="mb-0">{{$pres->organisasi}}</p>
            </p>
        </div> 
        @empty 
        @endforelse
    </div>
    {{-- <div class="page_break"></div> --}}

    <div class="edukasi-kerja pe-5 py-3 child-flex">
        <h4 class="title-section font-weight-bold text-uppercase">PENDIDIKAN</h4>
        @forelse ($edukasi as $edu)
        <div>
            <p class="font-weight-bold mb-0">{{$edu->sekolah}}</p>
            <p class="mb-0 font-italic">{{$edu->masuk}} - {{$edu->keluar}}</p>
            <p class="mb-0">{{$edu->jurusan}}</p>
            <p>Index nilai : {{$edu->gpa}}
            </p>
        </div>
            
        @empty
            
        @endforelse
    </div>
</section>

<!-- 24 Hampir bisa dengan float,kanan mulai dari kedua -->
<section class="row" style="background-color:lightgreen">

    {{-- KIRI --}}
    <div class="about pe-5 py-3 col-5 bg-secondary float-left" style="z-index: 3">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">Tentang saya</h4>
        <p>{{$user->desc}}</p>
    </div>

    {{-- KANAN --}}
    <div class="pengalaman-kerja py-3 col-5 bg-info float-right">
        <h4 class="title-section font-weight-bold text-uppercase">PENGALAMAN KERJA</h4>
        @forelse ($kerja as $kr)
        <div>
            <p class="font-weight-bold mb-0">{{$kr->perusahaan}}</p>
            <p class="mb-0 font-italic">{{$kr->mulai}} sampai {{$kr->akhir}}</p>
            <p class="mb-0">{{$kr->posisi}}</p>
            <p>{{$kr->deskripsi}}</p>
        </div>                                 
        @empty                                 
        @endforelse
    </div>

    {{-- KIRI --}}
    <div class="skill pe-5 py-3 col-5 bg-info">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">SKILL</h4>
        <ul class="ps-0 ms-3">
            @forelse ($skil as $sk)
                <li>{{$sk->skil}}</li>
            @empty
                
            @endforelse
        </ul>
    </div>

    {{-- KANAN --}}
    <div class="edukasi-kerja pe-5 py-3 col-5 bg-info float-right">
        <h4 class="title-section font-weight-bold text-uppercase">PENDIDIKAN</h4>
        @forelse ($edukasi as $edu)
        <div>
            <p class="font-weight-bold mb-0">{{$edu->sekolah}}</p>
            <p class="mb-0 font-italic">{{$edu->masuk}} - {{$edu->keluar}}</p>
            <p class="mb-0">{{$edu->jurusan}}</p>
            <p>Index nilai : {{$edu->gpa}}</p>
        </div>
            
        @empty
            
        @endforelse
    </div>

    {{-- KIRI --}}
    <div class="training pe-5 py-3 col-5 bg-success">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">PELATIHAN</h4>
        @forelse ($training as $tr)
        <div>
            <p class="font-weight-bold mb-0">{{$tr->program}}</p>
            <p class="mb-0 font-italic">{{$tr->mulai}} sampai {{$tr->akhir}}</p>
            <p class="mb-0 fw-normal">{{$tr->penyelenggara}}</p>
            <p>{{$tr->deskripsi}}</p>
        </div>
        @empty
        @endforelse
    </div>

    {{-- KANAN --}}
    <div class="page_break"></div>    
    <div class="prestasi pe-5 py-3 col-5 bg-info">
        <h4 class="title-section font-weight-bold text-uppercase">PRESTASI</h4>
        @php
            $no = 0;
        @endphp
        @forelse ($prestasi as $pres)
            @php
                $no++;
            @endphp

            @if($no == 4)
            <div>Hallo</div>
            <div class="page_break"></div>    
            @endif

        <div>
            <p class="font-weight-bold mb-0">{{$pres->prestasi}}</p>
            <p class="mb-0 font-italic">{{$pres->tahun}}</p>
            <p class="mb-0">{{$pres->organisasi}}-{{$no}}</p>
        </div> 
        
        @empty 
        @endforelse
    </div>

    {{-- KIRI --}}
    <div class="pengalaman-kerja pe-5 py-3 col-5 bg-info float-right">
        <h4 class="title-section font-weight-bold text-uppercase">ORGANISASI</h4>
        @forelse ($organisasi as $org)
        <div>
            <p class="font-weight-bold mb-0">{{$org->posisi}}</p>
            <p class="mb-0">{{$org->organisasi}}</p>
            <p class="mb-0 font-italic">{{$org->mulai}} sampai {{$org->akhir}}</p>
            <p class="">{{$org->deskripsi}}</p>
        </div>
        @empty
        @endforelse
    </div> 

    
</section>

<!-- Bagi 2 dengan float, jika kiri offset kanan mulai dari page 2 -->
<section class="row" style="background-color:lightgreen">

    <div class="col-5 float-left">
        {{-- KIRI About Me--}}
        <div class="about pe-5 py-3 col-12 bg-secondary">
            <h4 class="title-section font-weight-bold text-uppercase mb-3">Tentang saya</h4>
            <p>{{$user->desc}}</p>
        </div>

        {{-- KIRI Skill--}}
        <div class="skill pe-5 py-3 col-12 bg-info">
            <h4 class="title-section font-weight-bold text-uppercase mb-3">SKILL</h4>
            <ul class="ps-0 ms-3">
                @forelse ($skil as $sk)
                    <li>{{$sk->skil}}</li>
                @empty
                    
                @endforelse
            </ul>
        </div>

        {{-- KIRI Train--}}
        <div class="training pe-5 py-3 col-12 bg-success">
            <h4 class="title-section font-weight-bold text-uppercase mb-3">PELATIHAN</h4>
            @forelse ($training as $tr)
            <div>
                <p class="font-weight-bold mb-0">{{$tr->program}}</p>
                <p class="mb-0 font-italic">{{$tr->mulai}} sampai {{$tr->akhir}}</p>
                <p class="mb-0 fw-normal">{{$tr->penyelenggara}}</p>
                <p>{{$tr->deskripsi}}</p>
            </div>
            @empty
            @endforelse
        </div>

            

    </div>

    <div class="col-5 float-right">
        {{-- KANAN kerja--}}
        <div class="pengalaman-kerja py-3 col-12 bg-info">
            <h4 class="title-section font-weight-bold text-uppercase">PENGALAMAN KERJA</h4>
            @forelse ($kerja as $kr)
            <div>
                <p class="font-weight-bold mb-0">{{$kr->perusahaan}}</p>
                <p class="mb-0 font-italic">{{$kr->mulai}} sampai {{$kr->akhir}}</p>
                <p class="mb-0">{{$kr->posisi}}</p>
                <p>{{$kr->deskripsi}}</p>
            </div>                                 
            @empty                                 
            @endforelse
        </div>

        {{-- KANAN Pendidikan--}}
        <div class="edukasi-kerja pe-5 py-3 col-12 bg-secondary">
            <h4 class="title-section font-weight-bold text-uppercase">PENDIDIKAN</h4>
            @forelse ($edukasi as $edu)
            <div>
                <p class="font-weight-bold mb-0">{{$edu->sekolah}}</p>
                <p class="mb-0 font-italic">{{$edu->masuk}} - {{$edu->keluar}}</p>
                <p class="mb-0">{{$edu->jurusan}}</p>
                <p>Index nilai : {{$edu->gpa}}</p>
            </div>
                
            @empty
                
            @endforelse
        </div>

        {{-- KANAN Prestasi--}}  
        <div class="prestasi pe-5 py-3 col-12 bg-info">
            <h4 class="title-section font-weight-bold text-uppercase">PRESTASI</h4>
            @php
                $no = 0;
            @endphp
            @forelse ($prestasi as $pres)
                @php
                    $no++;
                @endphp

                @if($no == 4)
                <div>Hallo</div>
                <div class="page_break"></div>    
                @endif

            <div>
                <p class="font-weight-bold mb-0">{{$pres->prestasi}}</p>
                <p class="mb-0 font-italic">{{$pres->tahun}}</p>
                <p class="mb-0">{{$pres->organisasi}}-{{$no}}</p>
            </div> 
            
            @empty 
            @endforelse
        </div>

        {{-- KIRI Org--}}
        <div class="pengalaman-kerja pe-5 py-3 col-12 bg-info">
            <h4 class="title-section font-weight-bold text-uppercase">ORGANISASI</h4>
            @forelse ($organisasi as $org)
            <div>
                <p class="font-weight-bold mb-0">{{$org->posisi}}</p>
                <p class="mb-0">{{$org->organisasi}}</p>
                <p class="mb-0 font-italic">{{$org->mulai}} sampai {{$org->akhir}}</p>
                <p class="">{{$org->deskripsi}}</p>
            </div>
            @empty
            @endforelse
        </div>

    </div>

</section>

<!-- hampir -->
<section class="row" style="background-color:lightgreen">

    {{-- KIRI --}}
    <div class="about pe-5 py-3 cols-5 bg-secondary" style="z-index: 3">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">Tentang saya</h4>
        <p>{{$user->desc}}</p>
    </div>

    {{-- KANAN --}}
    <div class="pengalaman-kerja py-3 cols-5 bg-info float-right">
        <h4 class="title-section font-weight-bold text-uppercase">PENGALAMAN KERJA</h4>
        @forelse ($kerja as $kr)
        <div>
            <p class="font-weight-bold mb-0">{{$kr->perusahaan}}</p>
            <p class="mb-0 font-italic">{{$kr->mulai}} sampai {{$kr->akhir}}</p>
            <p class="mb-0">{{$kr->posisi}}</p>
            <p>{{$kr->deskripsi}}</p>
        </div>                                 
        @empty                                 
        @endforelse
    </div>

    {{-- KIRI --}}
    <div class="skill pe-5 py-3 cols-5 bg-info ">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">SKILL</h4>
        <ul class="ps-0 ms-3">
            @forelse ($skil as $sk)
                <li>{{$sk->skil}}</li>
            @empty
                
            @endforelse
        </ul>
    </div>

    {{-- KANAN --}}
    <div class="edukasi-kerja pe-5 py-3 cols-5 bg-info float-right">
        <h4 class="title-section font-weight-bold text-uppercase">PENDIDIKAN</h4>
        @forelse ($edukasi as $edu)
        <div>
            <p class="font-weight-bold mb-0">{{$edu->sekolah}}</p>
            <p class="mb-0 font-italic">{{$edu->masuk}} - {{$edu->keluar}}</p>
            <p class="mb-0">{{$edu->jurusan}}</p>
            <p>Index nilai : {{$edu->gpa}}</p>
        </div>
            
        @empty
            
        @endforelse
    </div>

    {{-- KIRI --}}
    <div class="training pe-5 py-3 cols-5 bg-success">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">PELATIHAN</h4>
        @forelse ($training as $tr)
        <div>
            <p class="font-weight-bold mb-0">{{$tr->program}}</p>
            <p class="mb-0 font-italic">{{$tr->mulai}} sampai {{$tr->akhir}}</p>
            <p class="mb-0 fw-normal">{{$tr->penyelenggara}}</p>
            <p>{{$tr->deskripsi}}</p>
        </div>
        @empty
        @endforelse
    </div>

    {{-- KANAN --}}  
    <div class="prestasi pe-5 py-3 cols-5 bg-info float-right">
        <h4 class="title-section font-weight-bold text-uppercase">PRESTASI</h4>
        @php
            $no = 0;
        @endphp
        @forelse ($prestasi as $pres)
            @php
                $no++;
            @endphp

            @if($no == 4)
            <div>Hallo</div>
            <div class="page_break"></div>    
            @endif

        <div>
            <p class="font-weight-bold mb-0">{{$pres->prestasi}}</p>
            <p class="mb-0 font-italic">{{$pres->tahun}}</p>
            <p class="mb-0">{{$pres->organisasi}}-{{$no}}</p>
        </div> 
        
        @empty 
        @endforelse
    </div>

    {{-- KIRI --}}
    <div class="pengalaman-kerja pe-5 py-3 cols-5 bg-info ">
        <h4 class="title-section font-weight-bold text-uppercase">ORGANISASI</h4>
        @forelse ($organisasi as $org)
        <div>
            <p class="font-weight-bold mb-0">{{$org->posisi}}</p>
            <p class="mb-0">{{$org->organisasi}}</p>
            <p class="mb-0 font-italic">{{$org->mulai}} sampai {{$org->akhir}}</p>
            <p class="">{{$org->deskripsi}}</p>
        </div>
        @empty
        @endforelse
    </div> 

    
</section>

<!-- hampir tes -->
<section class="row" style="background-color:lightgreen">

    {{-- KIRI --}}
    <div class="about pe-5 py-3 col-5 bg-secondary" style="z-index: 3">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">Tentang saya</h4>
        <p>{{$user->desc}}</p>
    </div>

    {{-- KANAN --}}
    <div class="pengalaman-kerja py-3 col-5 bg-info">
        <h4 class="title-section font-weight-bold text-uppercase">PENGALAMAN KERJA</h4>
    </div>

    {{-- KIRI --}}
    <div class="skill pe-5 py-3 col-5 bg-info ">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">SKILL</h4>
        <ul class="ps-0 ms-3">
            @forelse ($skil as $sk)
                <li>{{$sk->skil}}</li>
            @empty
                
            @endforelse
        </ul>
    </div>

    {{-- KANAN --}}
    <div class="edukasi-kerja pe-5 py-3 col-5 bg-secondary ">
        <h4 class="title-section font-weight-bold text-uppercase">PENDIDIKAN</h4>
    </div>

    {{-- KIRI --}}
    <div class="training pe-5 py-3 col-5 bg-success">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">PELATIHAN</h4>
    </div>

    {{-- KANAN --}}  
    <div class="prestasi pe-5 py-3 col-5 bg-info ">
        <h4 class="title-section font-weight-bold text-uppercase">PRESTASI</h4>
    </div>

    {{-- KIRI --}}
    <div class="pengalaman-kerja pe-5 py-3 col-5 bg-info ">
        <h4 class="title-section font-weight-bold text-uppercase">ORGANISASI</h4>
    </div> 

    
</section>


<!-- cek -->
<section class="row" style="background-color:lightgreen">
    {{-- KIRI --}}
    <div class="about pe-5 py-3 col-5 bg-secondary float-left" style="z-index: 3">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">Tentang saya</h4>
        <p>{{$user->desc}}</p>
    </div>

    {{-- KANAN --}}
    <div class="pengalaman-kerja py-3 col-5 bg-info float-right">
        <h4 class="title-section font-weight-bold text-uppercase">PENGALAMAN KERJA</h4>
        @forelse ($kerja as $kr)
        <div>
            <p class="font-weight-bold mb-0">{{$kr->perusahaan}}</p>
            <p class="mb-0 font-italic">{{$kr->mulai}} sampai {{$kr->akhir}}</p>
            <p class="mb-0">{{$kr->posisi}}</p>
            <p>{{$kr->deskripsi}}</p>
        </div>                                 
        @empty                                 
        @endforelse
    </div>

    {{-- KIRI --}}
    <div class="skill pe-5 py-3 col-5 bg-info">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">SKILL</h4>
        <ul class="ps-0 ms-3">
            @forelse ($skil as $sk)
                <li>{{$sk->skil}}</li>
            @empty
                
            @endforelse
        </ul>
    </div>

    {{-- KANAN --}}
    <div class="edukasi-kerja pe-5 py-3 col-5 bg-info float-right">
        <h4 class="title-section font-weight-bold text-uppercase">PENDIDIKAN</h4>
        @forelse ($edukasi as $edu)
        <div>
            <p class="font-weight-bold mb-0">{{$edu->sekolah}}</p>
            <p class="mb-0 font-italic">{{$edu->masuk}} - {{$edu->keluar}}</p>
            <p class="mb-0">{{$edu->jurusan}}</p>
            <p>Index nilai : {{$edu->gpa}}</p>
        </div>
            
        @empty
            
        @endforelse
    </div>

    {{-- KIRI --}}
    <div class="training pe-5 py-3 col-5 bg-success">
        <h4 class="title-section font-weight-bold text-uppercase mb-3">PELATIHAN</h4>
        @forelse ($training as $tr)
        <div>
            <p class="font-weight-bold mb-0">{{$tr->program}}</p>
            <p class="mb-0 font-italic">{{$tr->mulai}} sampai {{$tr->akhir}}</p>
            <p class="mb-0 fw-normal">{{$tr->penyelenggara}}</p>
            <p>{{$tr->deskripsi}}</p>
        </div>
        @empty
        @endforelse
    </div>

    {{-- KANAN --}}
    <div class="page_break"></div>    
    <div class="prestasi pe-5 py-3 col-5 bg-info">
        <h4 class="title-section font-weight-bold text-uppercase">PRESTASI</h4>
        @php
            $no = 0;
        @endphp
        @forelse ($prestasi as $pres)
            @php
                $no++;
            @endphp

            @if($no == 4)
            <div>Hallo</div>
            <div class="page_break"></div>    
            @endif

        <div>
            <p class="font-weight-bold mb-0">{{$pres->prestasi}}</p>
            <p class="mb-0 font-italic">{{$pres->tahun}}</p>
            <p class="mb-0">{{$pres->organisasi}}-{{$no}}</p>
        </div> 
        
        @empty 
        @endforelse
    </div>

    {{-- KIRI --}}
    <div class="pengalaman-kerja pe-5 py-3 col-5 bg-info float-right">
        <h4 class="title-section font-weight-bold text-uppercase">ORGANISASI</h4>
        @forelse ($organisasi as $org)
        <div>
            <p class="font-weight-bold mb-0">{{$org->posisi}}</p>
            <p class="mb-0">{{$org->organisasi}}</p>
            <p class="mb-0 font-italic">{{$org->mulai}} sampai {{$org->akhir}}</p>
            <p class="">{{$org->deskripsi}}</p>
        </div>
        @empty
        @endforelse
    </div> 

    
</section>


{{-- done with color --}}
<section class="row clearfix" style="background-color:lightgreen; height:297mm">

    <div class="col-4 float-left" style="background-color:rgb(226, 100, 195);">

        {{-- KIRI About Me--}}
        <div class="about pe-5 py-3 col-12 bg-secondary">
            <h4 class="title-section font-weight-bold text-uppercase mb-3">Tentang saya</h4>
            <p>{{$user->desc}}</p>
        </div>

        {{-- KIRI Skill--}}
        @if(!empty($skil))
        <div class="skill pe-5 py-3 col-12 bg-info">
            <h4 class="title-section font-weight-bold text-uppercase mb-3">SKILL</h4>
            <ul class="ps-0 ms-3">
                @forelse ($skil as $sk)
                    <li>{{$sk->skil}}</li>
                @empty
                    
                @endforelse
            </ul>
        </div>
        @endif

        {{-- KIRI Train--}}
        @if(!empty($training))
        <div class="training pe-5 py-3 col-12 bg-success">
            <h4 class="title-section font-weight-bold text-uppercase mb-3">PELATIHAN</h4>
            @forelse ($training as $tr)
            <div>
                <p class="font-weight-bold mb-0">{{$tr->program}}</p>
                <p class="mb-0 font-italic">{{$tr->mulai}} sampai {{$tr->akhir}}</p>
                <p class="mb-0 fw-normal">{{$tr->penyelenggara}}</p>
                <p>{{$tr->deskripsi}}</p>
            </div>
            @empty
            @endforelse
        </div>
        @endif

    </div>

    <div class="col-7 float-right">
        {{-- KANAN kerja--}}
        @if(!empty($kerja))
        <div class="pengalaman-kerja py-3 col-12 bg-info">
            <h4 class="title-section font-weight-bold text-uppercase">PENGALAMAN KERJA</h4>
            @forelse ($kerja as $kr)
            <div>
                <p class="font-weight-bold mb-0">{{$kr->perusahaan}}</p>
                <p class="mb-0 font-italic">{{$kr->mulai}} sampai {{$kr->akhir}}</p>
                <p class="mb-0">{{$kr->posisi}}</p>
                <p>{{$kr->deskripsi}}</p>
            </div>                                 
            @empty                                 
            @endforelse
        </div>
        @endif

        {{-- KANAN Pendidikan--}}
        @if(!empty($edukasi))
        <div class="edukasi-kerja pe-5 py-3 col-12 bg-secondary">
            <h4 class="title-section font-weight-bold text-uppercase">PENDIDIKAN</h4>
            @forelse ($edukasi as $edu)
            <div>
                <p class="font-weight-bold mb-0">{{$edu->sekolah}}</p>
                <p class="mb-0 font-italic">{{$edu->masuk}} - {{$edu->keluar}}</p>
                <p class="mb-0">{{$edu->jurusan}}</p>
                <p>Index nilai : {{$edu->gpa}}</p>
            </div>     
            @empty 
            @endforelse
        </div>
        @endif

        {{-- KANAN Prestasi--}}  
        @if(!empty($prestasi))
        <div class="prestasi pe-5 py-3 col-12 bg-info">
            <h4 class="title-section font-weight-bold text-uppercase">PRESTASI</h4>
            @forelse ($prestasi as $pres)
            <div>
                <p class="font-weight-bold mb-0">{{$pres->prestasi}}</p>
                <p class="mb-0 font-italic">{{$pres->tahun}}</p>
                <p class="">{{$pres->organisasi}}</p>
            </div> 
            
            @empty 
            @endforelse
        </div>
        @endif

        {{-- KIRI Org--}}
        @if(!empty($organisasi))
        <div class="pengalaman-kerja pe-5 py-3 col-12 bg-info">
            <h4 class="title-section font-weight-bold text-uppercase">ORGANISASI</h4>
            @forelse ($organisasi as $org)
            <div>
                <p class="font-weight-bold mb-0">{{$org->posisi}}</p>
                <p class="mb-0">{{$org->organisasi}}</p>
                <p class="mb-0 font-italic">{{$org->mulai}} sampai {{$org->akhir}}</p>
                <p class="">{{$org->deskripsi}}</p>
            </div>
            @empty
            @endforelse
        </div>
        @endif

    </div>

</section>