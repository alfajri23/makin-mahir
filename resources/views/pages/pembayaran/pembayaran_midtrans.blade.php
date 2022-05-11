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
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-5OwgQq9RgmT8gHLX"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
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
          <div class="col-6 mx-auto">
            <form action="{{route('payInvoiceMidtrans')}}" id="submit_form" method="POST">
              @csrf
              <input type="hidden" name="id_transfer" value="{{$id_transfer}}">
              <input type="hidden" name="json" id="json_callback">
            </form>

          </div>
        </div>
    </div>

 
      <script type="text/javascript">
        (function() {
          // your page initialization code here
          // the DOM will be available here
          window.snap.pay('{{$snapToken}}', {
            onSuccess: function(result){
              /* You may add your own implementation here */
              alert("payment success!"); console.log(result);
              send_response_to_form(result);
            },
            onPending: function(result){
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
              send_response_to_form(result);
            },
            onError: function(result){
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
              send_response_to_form(result);
            },
            onClose: function(){
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          })

        })();

        function send_response_to_form(result){
          document.getElementById('json_callback').value = JSON.stringify(result);
          $('#submit_form').submit();
        }

      </script>

</body>
<script src="{{ asset('js/plugin.js') }}"></script>
    <script src="{{ asset('js/aos.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        AOS.init();
    </script>
</html>
        
