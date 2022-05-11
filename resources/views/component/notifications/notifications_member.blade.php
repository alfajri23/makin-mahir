@extends('layouts.member')
@section('content')
    <div class="row">
        <style>
            .spacer {
                height: 100px;
            }

            form {
                border: 1px solid #dedede;
            }

            .form-group.icon-input i {
                position: absolute;
                left: 15px;
                top: 8px;
            }

        </style>

        <div class="spacer"></div>
        <div class="container mt-5 mt-sm-0">
            <div class="row align-items-center flex-column pt-4">
                <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center">
                    <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Notifications</h2>
                </div>
                <div class="mb-5">
                    <form action="#" method="GET" class="float-left header-search border-1 rounded-sm">
                        <div class="form-group mb-0 icon-input">
                            <i class="feather-search font-lg text-grey-400"></i>
                            <input name="search" type="text" placeholder="Start typing to search.."
                                class="bg-transparent border-0 lh-32 pt-1 pb-1 pl-5 pr-3 font-xsss fw-500 rounded-xl">
                            <button type="submit" class="btn btn-info">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="how-to-work pb-lg--7 pt-3">
            <div class="container">
                <center>
                    <div class="col-12 mx-auto">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabelWebinar" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Konfirmasi Pembayaran</td>
                                        <td>Selamat Andi ! Konfirmasi Pembayaran kelas telah di setujui oleh Admin </td>
                                        <td><a href="{{ route('detail-notifications', ['id' => '1']) }}"><i
                                                    class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Konfirmasi Pembayaran</td>
                                        <td>Selamat Andi ! Konfirmasi Pembayaran kelas telah di setujui oleh Admin </td>
                                        <td><a href="{{ route('detail-notifications', ['id' => '2']) }}"><i
                                                    class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Konfirmasi Pembayaran</td>
                                        <td>Selamat Andi ! Konfirmasi Pembayaran kelas telah di setujui oleh Admin </td>
                                        <td><a href="{{ route('detail-notifications', ['id' => '3']) }}"><i
                                                    class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </center>
            </div>
        </div>
        <div class="spacer"></div>
    </div>
@endsection
