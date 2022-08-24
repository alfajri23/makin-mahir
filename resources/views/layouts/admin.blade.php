<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('asset/img/program/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('asset/img/program/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('asset/img/program/favicon.png')}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    
    {{-- <link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"> --}}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> --}}
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}

    {{-- bootstrap select for notifikasi --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    
    
    
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': `Bearer {{Session::get('token')}}`
            }
        });
    </script>
</head>

<style>
    .dtCenter{
        text-align: center;
    }

    #output{
        height: 150px;
        width: 240px;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin <sup>Makin Mahir</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('homeAdmin')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Header
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-cube ml-1"></i>
                    <span>Produk</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar produk</h6>
                        <a class="collapse-item" href="{{route('adminKonsultasi')}}">Konsultasi</a>
                        {{-- <a class="collapse-item" href="{{route('konsultasiTipeIndex')}}">Konsultasi Tipe</a> --}}
                        <a class="collapse-item" href="{{route('eventAdmin')}}">Event</a>
                        <a class="collapse-item" href="{{route('templateAdmin')}}">Template</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi"
                    aria-expanded="true" aria-controls="transaksi">
                    <i class="fa-solid fa-money-bill"></i>
                    <span>Transaksi</span>
                </a>
                <div id="transaksi" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>
                        <a class="collapse-item" href="{{route('transaksiIndex',['tipe'=>'semua'])}}">Semua</a>
                        <a class="collapse-item" href="{{route('transaksiIndex',['tipe'=>'lunas'])}}">Lunas</a>
                        <a class="collapse-item" href="{{route('transaksiIndex',['tipe'=>'pending'])}}">Menunggu</a>
                        <a class="collapse-item" href="{{route('transaksiIndex',['tipe'=>'ditolak'])}}">Ditolak</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-align-justify mx-1"></i>
                    <span>Pendaftaran</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>
                        <a class="collapse-item" href="{{route('pendaftaranEvent')}}">Event</a>
                        <a class="collapse-item" href="{{route('pendaftaranKonsultasi')}}">Konsultasi</a>
                        <a class="collapse-item" href="{{route('pendaftaranTemplate')}}">Template</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blogCollapse"
                    aria-expanded="true" aria-controls="blogCollapse">
                    <i class="fa-brands fa-blogger ml-1"></i>
                    <span>Blog</span>
                </a>
                <div id="blogCollapse" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>
                        <a class="collapse-item" href="{{route('blogAdmin')}}">Publish</a>
                        <a class="collapse-item" href="{{route('blogAdminUnpublish')}}">Unpublish</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-gear mx-1"></i>
                    <span>Setting</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('formSetting')}}">Form</a>
                        <a class="collapse-item" href="{{route('settingPembayaranAdmin')}}">Metode pembayaran</a>
                        {{-- <a class="collapse-item" href="{{route('formWebinar')}}">Webinar</a> --}}
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseUser">
                    <i class="fa-solid fa-user mx-1"></i>
                    <span>Member</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('memberAdminIndex')}}">Member</a>
                        <a class="collapse-item" href="{{route('expertAdminIndex')}}">Expert</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('forumAdmin')}}">
                    <i class="fa-solid fa-book mx-1"></i>
                    <span>Forum</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('notifikasiIndex')}}">
                    <i class="fas fa-bell fa-fw mx-1"></i>
                    <span>Notifikasi</span>
                </a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket ml-2"></i>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1 dropdown-notifications">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw fa-lg fa-shake"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter notification-count" data-count="0">0</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifikasi
                                </h6>
                                <div class="notification-menu">                               
                                </div>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Pusher --}}
    <script src="https://js.pusher.com/3.1/pusher.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" rel="stylesheet"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

    <script src="{{ asset('js/sb-admin-2.min.js') }}" rel="stylesheet"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        //PUSHER
            let notificationsWrapper   = $('.dropdown-notifications');
            //let notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
            let notificationsCountElem = $('.notification-count');
            let notificationsCount     = parseInt(notificationsCountElem.data('count'));
            let notifications          = $('.notification-menu');
            let newNotificationHtml;
            let existingNotifications;
        
            var pusher = new Pusher('151f9b18e61c87d5d423', {
                cluster: 'ap1',
                encrypted: true
            });

            var channel = pusher.subscribe('buy-notification');

            channel.bind('App\\Events\\BuyNotification', function(data) {
                existingNotifications = notifications.html();
                newNotificationHtml = `
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <span class="font-weight-bold">${data.produk}</span>
                    </div>
                </a>
                `;
                notifications.html(newNotificationHtml + existingNotifications);
                notificationsCount += 1;
                notificationsCountElem.attr('data-count', notificationsCount);
                notificationsCountElem.html(notificationsCount);
            });
        //End pusher

        //Number format
            String.prototype.reverse = function() {
                return this.split("").reverse().join("");
            }

            window.currencyFormat = function reformatText(input) {
                var x = input.value;
                x = x.replace(/,/g, ""); // Strip out all commas
                x = x.reverse();
                x = x.replace(/.../g, function(e) {
                    return e + ",";
                }); // Insert new commas
                x = x.reverse();
                x = x.replace(/^,/, ""); // Remove leading comma
                input.value = x;
            }
        //End number

        //SWAL
        function swalAction(routes,tabel,id,pesan){
            swal({
                title: "Are you sure?",
                text: pesan,
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type : 'GET',
                        url  : routes,
                        data : {
                            id : id
                        },
                        dataType: 'json',
                        success : (data)=>{
                            swal("Sukses", data.message, "warning");
                            tabel.DataTable().ajax.reload();
                        }
                    })

                } else {
                    swal("Aman", "Tidak ada perubahan", "success");
                }
            });
        }
        //End swall
    </script>

</body>

</html>