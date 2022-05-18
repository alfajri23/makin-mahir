<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Makin Mahir</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<style>
    .spacer{
        height: 100px;
    }

    .form-control{
        height: 40px;
    }

    li{
        list-style: decimal;
        margin-left: 25px;
    }
</style>

<body class="color-theme-blue mont-font">
    <div class="main-wrap">
        <div class="header-wrapper pt-3 pb-3 shadow-none pos-fixed position-absolute bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 navbar pt-0 pb-0">
                        <a href="{{route('publicIndex')}}"><h1 class="ls-3 fw-700 text-white font-xxl">MakinMahir.id<span class="d-block font-xsssss ls-1 text-grey-500 open-font ">Berkembang dan Makin Mahir !</span></h1></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="spacer"></div>
        
        <div class="page-title style1 col-10 mb-5 mx-auto">
            <span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-warning d-inline-block text-warning mr-1">Pendaftaran</span>
            <h2 class="text-grey-900 fw-700 font-xxl pb-3 mb-0 mt-3 d-block lh-3">Daftar {{$data->nama}}</h2>
        </div>

        <div class="container d-flex flex-column-reverse flex-sm-row">
            <div class="col-12 col-sm-7">
                <form action="{{route('pembayaranCreate')}}" method="post" enctype="multipart/form-data">
                @csrf
                    @forelse ($ceks as $cek)
                    <div class="form-group my-4">
                        <label for="exampleInputEmail1" class="fw-600 mb-0">{{$cek}}</label>
                        <input type="{{$loop->first ? 'date' : 'text'}}" name="jawaban[]" class="form-control">
                    </div>
                        
                    @empty
                        
                    @endforelse

                    <div class="form-group my-4">
                        <label for="exampleInputPassword1" class="font-lg fw-700">Upload Bukti Pembayaran</label>
                        
                        <ul class="font-xssss text-grey-800 fw-600">
                            <li>BCA : No. Rek. 8030112343 A. N. Tri Astuti</li>
                            <li>BRI : No. Rek. 144701001148505 A. N. Tri Astuti</li>
                            <li>BNI : No. Rek. 0850844796 A. N. Tri Astuti</li>
                            <li>Mandiri : No. Rek. 1360010201660 A. N. Tri Astuti</li>
                            <li>EWALLET= GOPAY, OVO, DANA : 08579993240 A.N. Tri Astuti</li>
                        </ul>
    
    
                        <div class="custom-file mt-3">
                            {{-- <label class="custom-file-label" for="customFile">Bukti file</label> --}}
                            <input type="file" name="bukti" class="" required>
                        </div>
    
                        <div>
                            <input type="hidden" name="id_produk" value="{{$data->id}}">
                            <input type="hidden" name="nama" value="{{$data->nama}}">
                            <input type="hidden" name="harga" value="{{$data->harga}}">
                        </div>
    
                        <div>
                            <a href="{{route('transferIndex')}}" class=" btn p-2 border-1 mt-3 font-xsss text-center btn-light text-dark text-uppercase fw-600 ls-3">Batal</a>    
                            <button type="submit" class="btn p-2 mt-3 font-xsss text-center text-white bg-success text-uppercase fw-600 ls-3">Upload</button>    
                        </div>
                    </div>

                </form>
            </div>

            <div class="col-12 col-md-5">
                <div class="order-details">
                    {{-- <h4 class="mont-font fw-600 font-md mb-5">Order Details</h4> --}}
                    <div class="table-content table-responsive mb-5 card border-0 bg-greyblue p-5">
                       <table class="table order-table order-table-2 mb-0">
                           <thead>
                               <tr>
                                   <th class="border-0 font-lg">Detail</th>
                                   <th class="text-right border-0">{{$data->updated_at}}</th>
                               </tr>
                           </thead>
                           <tbody>
                                <tr>
                                    <th class="text-grey-700 fw-600 font-xss">Nama 
                                    </th>
                                    <td class="text-right text-grey-700 fw-600 font-xss">{{$data->nama}} </td>
                                </tr>
                               <tr>
                                   <th class="text-grey-700 fw-600 font-xss">Harga
                                   </th>
                                   <td class="text-right text-grey-700 fw-600 font-xss">Rp. {{number_format($data->harga)}}</td>
                               </tr>
                               <tr>
                                    <th class="text-grey-700 fw-600 font-xss">Status
                                    </th>
                                    <td class="text-right text-grey-700 fw-600 font-xss">{{$data->status_bayar}}</td>
                                </tr>
                           </tbody>
    
                       </table>
                   </div>
                </div>
                
            </div>
        </div>
        
        
        
        <div class="footer-wrapper layer-after bg-dark mt-5 py-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 lower-footer"></div>
                    <div class="col-sm-6">
                        <p class="copyright-text">© 2021 copyright. All rights reserved.</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p class="float-right copyright-text">In case of any concern, <a href="#">contact us</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{ asset('js/plugin.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>



</html>