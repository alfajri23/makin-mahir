<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Makin Mahir</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('css/feather.css') }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.min.css') }}">
    @yield('css')

</head>

<style>
    .spacer{
        height: 100px;
    }

    .form-control{
        height: 40px;
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

        <div class="container">
            <div class="row mt-4">
                <div class="col-xl-10 offset-xl-1 col-lg-6">
                    <div class="order-details py-4">
                        <h4 class="mont-font fw-600 font-md mb-5">Order Details</h4>
                        <div class="table-content table-responsive mb-5 card border-0 bg-greyblue p-5">
                           <table class="table order-table order-table-2 mb-0">
                               <thead>
                                   <tr>
                                       <th class="border-0">Product</th>
                                       <th class="text-right border-0">Total</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <th class="text-grey-700 fw-500 font-xsss">{{$data->judul}} 
                                       </th>
                                       <td class="text-right text-grey-700 fw-500 font-xsss">Rp. {{number_format($data->harga)}}</td>
                                   </tr>
                               </tbody>
                               <tfoot>
                                   <tr class="order-total">
                                       <th>Total</th>
                                       <td class="text-right text-grey-900 font-xss fw-600"><span class="order-total-ammount">Rp. {{number_format($data->harga)}}</span></td>
                                   </tr>
                               </tfoot>
                           </table>
                       </div>

                       <div class="checkout-payment card border-0 mb-3 bg-greyblue p-5">
                           <form action="{{route('invoiceIndex')}}" method="post" class="payment-form">
                            @csrf
                                <div class="payment-group mb-4">
                                   <div class="payment-radio">
                                        <input type="hidden" name="id_pendaftaran" value="{{$id_pendaftaran}}">
                                        <input type="hidden" name="tipe" value="{{$tipe}}">
                                        <input type="hidden" name="id_produk" value="{{$data->id}}">
                                       <input type="radio" value="1" name="payment" id="bank">
                                       <label class="payment-label fw-600 text-grey-900 ml-2" for="cheque">Virtual Account</label>
                                   </div>
                                   <div class="payment-info" data-method="bank" style="">
                                       <p class="font-xsss text-grey-500 pl-4">
                                           Bayar melalui E-Banking, Dompet digital ataupun supermarket
                                       </p>
                                   </div>
                               </div>
                               <div class="payment-group mb-4">
                                   <div class="payment-radio">
                                       <input type="radio" value="0" name="payment" id="bank">
                                       <label class="payment-label fw-600 text-grey-90" for="cheque">
                                           Kirim bukti transfer
                                       </label>
                                   </div>
                                   <div class="payment-info cheque hide-in-default" data-method="cheque" style="display: none;">
                                       <p class="font-xsss text-grey-500 pl-4">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                   </div>
                               </div>
                               
                           
                       </div>
                       <div class="clearfix"></div>

                       <div class="card shadow-none border-0">
                           <button type="submit" class="w-100 p-3 mt-3 font-xsss text-center text-white bg-current rounded-lg text-uppercase fw-600 ls-3">Place Order</button>    
                       </div>

                    </form>

                    </div>
               </div>

            </div>
        </div>


    </div>
</body>
<script src="{{ asset('js/plugin.js') }}"></script>
    <script src="{{ asset('js/aos.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        AOS.init();
    </script>
</html>

                