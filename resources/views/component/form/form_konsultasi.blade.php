<div class="page-title style1 col-10 mb-5 mx-auto">
    <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-warning d-inline-block text-warning mr-1">Pendaftaran</span>
    <h2 class="text-grey-900 fw-700 font-xxl pb-3 mb-0 mt-3 d-block lh-3">Daftar Konsultasi  {{$nama->judul}}</h2>
    <div class="fw-300 font-xss lh-28 text-grey-600">{!!$nama->deskripsi!!}</div>
</div>

<div class="col-10 col-md-10 mx-auto mb-4">
    <form action="{{route('daftarKonsultasi')}}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleInputPassword1" class="fw-600">Status pekerjaan</label>
            <input type="text" name="status_kerja" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="form-group my-4">
            <label for="exampleInputEmail1" class="fw-600">Telepon</label>
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">+62</div>
                </div>
                <input type="text" name="telepon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <input type="hidden" name="id_user" value="{{auth()->user()->id}}" class="form-control" id="exampleInputPassword1">
            <input type="hidden" name="id_produk" value="{{$_GET['id']}}" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="form-group my-4">
            <label for="exampleInputEmail1" class="fw-600">Umur</label>
            <input type="text" name="umur" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

</div>

<div class="col-10 col-md-10 mx-auto mb-4">

    <div class="form-group my-4">
        <label for="exampleInputPassword1" class="fw-600">Tanggal konsultasi</label>
        <input type="date" name="tgl_konsul" class="form-control" id="exampleInputPassword1">
    </div>

    <div class="form-group my-4">
        <label for="exampleInputPassword1" class="fw-600">Waktu konsultasi</label>
        <input type="text" name="waktu_konsul" class="form-control" id="exampleInputPassword1">
    </div>

    
   
</div>