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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<style>
    .spacer{
        height: 100px;
    }

</style>

<body class="color-theme-blue mont-font">
    
    <div class="main-wrap">
        <div class="header-wrapper pt-3 pb-3 shadow-none bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 navbar pt-0 pb-0">
                        <a href="{{route('publicIndex')}}"><h1 class="ls-3 fw-700 text-white font-xxl">MakinMahir.id<span class="d-block font-xsssss ls-1 text-grey-500 open-font ">Berkembang dan Makin Mahir !</span></h1></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-10 col-md-6 mx-auto mt-5">
            <div class="order-details">
                {{-- <h4 class="mont-font fw-600 font-md mb-5">Order Details</h4> --}}

                <div class="table-content table-responsive mb-5 card border-0 bg-greyblue p-4 p-sm-5">
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
                                <th class="text-grey-700 fw-600 font-xss">Status
                                </th>
                                <td class="text-right text-grey-700 fw-600 font-xss">{{$data->status_bayar}}</td>
                            </tr>
                       </tbody>

                   </table>
               </div>
            </div>
            
        </div>

        <div class="col-10 col-md-6 mx-auto mb-4">
            <form action="{{route('pembayaranBeduk')}}" method="post" class="payment-form" enctype="multipart/form-data">
                @csrf
                <div class="form-group my-4">
                    @empty(!$pertanyaans)
                        @for ($i=0;$i<count($pertanyaans);$i++)
                            @empty(!$files[$i])
                            <img class="w-100" src="{{asset($files[$i])}}"/>
                            @endempty
                            <div class="form-group my-4">
                                <label for="exampleInputEmail1" class="fw-600 mb-0 text-break">{{$pertanyaans[$i]}}</label>
                                <input type="{{$tipes[$i]}}" name="{{$tipes[$i] == 'file' ? 'bukti[]' : 'jawaban[]' }}" class="form-control" {{$required[$i] == 1 ? 'required' : ''}}>
                            </div>
                        @endfor
                    @endempty

                    <div class="form-group my-4">
                        <label for="exampleInputEmail1" class="fw-600 mb-0">Telepon</label>
                        <input type="tel"  pattern="08\d{9,10}" maxlength="13" minlength="10" name="telepon" class="form-control" required>
                    </div>

                    <div>
                        <input type="hidden" name="id_produk" value="{{$data->id}}">
                        <input type="hidden" name="nama" value="{{$data->nama}}">
                        <input type="hidden" name="harga" value="{{$data->harga}}">
                    </div>

                    <div>
                        <a href="{{route('transferIndex')}}" class=" btn p-2 border-1 mt-3 font-xsss text-center btn-light text-dark text-uppercase fw-600 ls-3">Batal</a>    
                        <button type="submit" class="btn p-2 mt-3 font-xsss text-center text-white bg-success text-uppercase fw-600 ls-3">Kirim</button>    
                    </div>
                </div>
            </form>
        </div>

    </div>
</body>
<script src="{{ asset('js/plugin.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</html>