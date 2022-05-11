@extends('layouts.member')
@section('content')
<div class="how-to-work pb-lg--7 pt-3">
    <div class="container">
        <style>
            .spacer {
                height: 50px;
            }
        </style>
        <div class="spacer"></div>
        <div class="page-title style1 col-xl-6 col-lg-6 col-md-10">
            <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Notifications</h2>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Isi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($pesan) > 0)
                        @foreach ($pesan as $pesanx => $val)
                            <tr>
                                 <td> {{ $loop->iteration }} </td>
                                 <td>{{ $val['judul'] }}</td>
                                 <td>{{ $val['isi'] }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3"> Belum ada Pemberitahuan </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
