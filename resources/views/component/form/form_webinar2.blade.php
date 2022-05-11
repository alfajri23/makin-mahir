<div class="page-title style1 col-10 mb-5 mx-auto">
    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-warning d-inline-block text-warning mr-1">Pendaftaran</span>
    <h2 class="text-grey-900 fw-700 font-xxl pb-3 mb-0 mt-3 d-block lh-3">Daftar Webinar {{$nama->judul}}</h2>
    <div class="fw-300 font-xss lh-28 text-grey-600">{!!$nama->deskripsi!!}</div>
    {{-- <p class="fw-300 font-xss lh-28 text-grey-600">WEBINAR MENTORING PEMBUATAN CV  adalah salah satu program event dari Makin Mahir ID. Tujuan daripada event  sendiri  ingin memberikan  informasi, edukasi, dan pembelajaran teknis tentang dunia kerja yang diisi oleh narasumber profesional. Event ini kami persembahakan bagi khalayak umum yan sedang membutuhkan edukasi. </p>
    <p class="fw-300 font-xss lh-28 text-grey-600 mb-0">Adapun materi teknis yang akan didapatkan adalah:</p>
    <ul>
        <li>1. Perbedaan  CV ATS Friendly dan Kreatif serta ruang lingkupnya</li>
        <li>2. Pembuatan Profil Diri, pengalaman kerja, organisasi sampai skill</li>
        <li>3. Trik membuat CV Click Bait</li>
    </ul>

    <p class="fw-300 font-xss lh-28 text-grey-600 mb-0">Bonus :</p>
    <ul>
        <li>1. Sertifikat Digital</li>
        <li>2. Template CV</li>
        <li>3. Materi</li>
        <li>4. Template Cover Letter</li>
    </ul> --}}
</div>

<div class="col-10 col-md-10 mx-auto mb-4">
    <form action="{{route('daftarWebinar')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id_user" value="{{auth()->user()->id}}" class="form-control" id="exampleInputPassword1">
        <input type="hidden" name="id_produk" value="{{$_GET['id']}}" class="form-control" id="exampleInputPassword1">
        @forelse ($data as $dt)
            @if ($dt->tipe == 'option')
                <div class="form-group my-4">
                    <label for="exampleFormControlSelec" class="fw-600 mb-0">{{$dt->judul}}</label>
                    <small id="emailHelp" class="form-text text-grey-800 fw-300 font-xsss">{{$dt->desc}}
                    </small>
                    <select class="form-control" name="{{$dt->nama}}" onchange="other()" id="alasanSelect">
                        @php
                            $option = explode(",",$dt->data)
                        @endphp
                        @forelse ($option as $opt)
                            <option value="{{$opt}}">{{$opt}}</option>
                        @empty
                            
                        @endforelse
                    </select>
                    <input type="hidden" name="infos" class="form-control" id="alasanInput">
                </div>
            @elseif ($dt->tipe == 'file')
                <div class="form-group">
                    <label for="exampleInputPassword1" class="fw-600 mb-0">{{$dt->judul}}</label>
                    <small id="emailHelp" class="form-text text-grey-800 fw-300 font-xsss">{{$dt->desc}}
                    </small>
                    <img src="{{asset($dt->gambar)}}" style="width: 50%" alt="">
                    <div class="custom-file">
                    <input type="file" name="{{$dt->nama}}" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Bukti file</label>
                    </div>
                </div>
            @elseif ($dt->nama == 'telepon')
                <div class="form-group my-4">
                    <label for="exampleInputEmail1" class="fw-600 mb-0">Telepon</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text">+62</div>
                        </div>
                        <input type="text" name="telepon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
            @else
                <div class="form-group my-4">
                    <label for="exampleInputEmail1" class="fw-600 mb-0">{{$dt->judul}}</label>
                    <small id="emailHelp" class="form-text text-grey-800 fw-300 font-xsss">{{$dt->desc}}
                    </small>
                    <input type="{{$dt->tipe}}" name="{{$dt->nama}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            @endif

        @empty
            
        @endforelse

        
</div>

