<div class="page-title style1 col-10 text-center mb-5 mx-auto">
    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-warning d-inline-block text-warning mr-1">Pendaftaran</span>
    <h2 class="text-grey-900 fw-700 font-xxl pb-3 mb-0 mt-3 d-block lh-3">Daftar Beduk {{$nama->judul}}</h2>
    <p class="fw-300 font-xss lh-28 text-grey-600">Bedah Dunia Kerja adalah salah satu program live event dari Makin Mahir ID. Tujuan daripada BEDUK sendiri  ingin memberikan  informasi, edukasi, dan konsultasi dunia kerja yang diisi oleh narasumber profesional. Event ini kami persembahakan bagi khalayak umum yan sedang membutuhkan edukasi . Event ini  terselenggara secara daring, melalui diskusi online yang biasanya di hari Senin, pukul 16.00 WIB kini berganti ke hari Sabtu Pukul 10.00- 12.00</p>
</div>

<div class="col-10 col-md-10 mx-auto mb-4">
    <form action="{{route('daftarBeduk')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group my-4">
            <label for="exampleFormControlSelec" class="fw-600">Tahu event ini dari mana</label>
            <select class="form-control" onchange="other()" name="info" id="alasanSelect">
              <option value="telegram">telegram</option>
              <option value="whatsapp">whatsapp</option>
              <option value="IG Makin Mahir">IG Makin Mahir</option>
              <option value="IG Magang Info">IG Magang Info</option>
              <option value="IG Zero Mindset">IG Zero Mindset</option>
              <option value="Linked In">Linked In</option>
              <option value="Twitter">Twitter</option>
              <option value="Facebook">Facebook</option>
              <option value="Tik Tok">Tik Tok</option>
              <option value="Kreed ID">Kreed ID</option>
              <option value="MauMilu">MauMilu</option>
              <option value="Ikidemy">Ikidemy</option>
              <option value="Website Makin Mahir">Website Makin Mahir</option>
              <option value="Lainnya">Lainnya</option>
            </select>
            <input type="hidden" name="infos" class="form-control" id="alasanInput">
          </div>

          
        <div class="form-group my-4">
            <label for="exampleInputEmail1" class="fw-600">Umur</label>
            <input type="text" name="umur" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="form-group my-4">
          <label for="exampleInputPassword1" class="fw-600">Status pekerjaan</label>
          <input type="text" name="status_kerja" class="form-control" id="exampleInputPassword1">
          <input type="hidden" name="id_user" value="{{auth()->user()->id}}" class="form-control" id="exampleInputPassword1">
          <input type="hidden" name="id_produk" value="{{$_GET['id']}}" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="form-group my-4">
            <label for="exampleInputEmail1" class="fw-600">Telepon</label>
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">+62</div>
                </div>
                <input type="text" name="telepon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>

        <div class="form-group my-4">
            <label for="exampleInputPassword1" class="fw-600">Apa kesulitan terbesarmu ketika mencari kerja? Coba sharing sama kami ya</label>
            <input type="text" name="kesusahan" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="form-group my-4">
            <label for="exampleInputPassword1" class="fw-600">Subscribe</label>
            <small id="emailHelp" class="form-text text-grey-800 fw-600">Udah tahu kanal YouTube Makin Mahir belum? Kalau belum, sini mampir dulu. Sertakan bukti screnshoot kalau udah subscribe ya.
            </small>
            <div class="custom-file">
                <input type="file" name="file-subscribe" class="custom-file-input" id="customFile" required>
                <label class="custom-file-label" for="customFile">Bukti file</label>
            </div>
        </div>

        <div class="form-group my-4">
            <label for="exampleInputEmail1" class="fw-600">Gabung grub</label>
            <small id="emailHelp" class="form-text text-muted">Yuk Gabung di grup WhatsApp : 
                <a href="https://chat.whatsapp.com/LWu5clkPU8gFRju9JOpIDL">https//chat.whatsapp.com/LWu5clkPU8gFRju9JOpIDL</a>.
            </small>
            <div class="custom-control custom-radio custom-control-inline mt-1">
                <input type="radio" id="customRadioInline1" value="1" name="wa" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline1">Sudah gabung</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline mt-1">
                <input type="radio" id="customRadioInline2" value="0" name="wa" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">Belum gabung</label>
            </div>
        </div>
</div>

<div class="col-10 col-md-10 mx-auto">
        <div class="form-group">
          <label for="exampleInputPassword1" class="fw-600">Reward ( opsional )</label>
          <small id="emailHelp" class="form-text text-grey-800 fw-600">Jika tertarik silakan upload bukti pembayaran, Namun bisa langsung submit jika ingin melewatkan pertanyaan ini.
          </small>
          <small id="emailHelp" class="form-text text-grey-700">Bisa bayar melalui : BCA : 8030112343 an Tri Astuti, BRI : 144701001148505 an Tri Astuti, BNI : 0850844796 an Tri Astuti, Mandiri : 1360010201660 an Tri Astuti, Jenius: 90020376498 an Tri Astuti, Gopay, OVO, Dana : 08579993240
          </small>
          <img src="{{asset('asset/img/program/reward_beduk.png')}}" style="width: 100%" alt="">
          <div class="custom-file">
            <input type="file" name="file-reward" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Bukti file</label>
          </div>
        </div>
      
</div>