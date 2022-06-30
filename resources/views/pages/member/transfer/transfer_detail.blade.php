@extends('layouts.member')

@section('content')

    <div class="container">
        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 mt-5 mx-auto">
            <div class="order-details pt-5 pt-sm-0">
                <div class="table-content table-responsive mb-5 card border border-dark p-2 p-sm-5">
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
                                <th class="text-grey-700 fw-600 font-xss">Metode Bayar
                                </th>
                                <td class="text-right text-grey-700 fw-600 font-xss">Transfer bank</td>
                            </tr>
                            @if(isset($data->pdf_url))
                            <tr>
                                <th class="text-grey-700 fw-600 font-xss">Invoice
                                </th>
                                <td class="text-right text-grey-700 fw-600 font-xss">
                                    <a href="{{$data->pdf_url}}">Lihat</a>
                                </td>
                            </tr>
                            @elseif(isset($data->bukti))
                            <tr>
                                <th class="text-grey-700 fw-600 font-xss">Bukti
                                </th>
                                <td class="text-right text-grey-700 fw-600 font-xss">
                                    <a href="{{asset($data->bukti)}}">Lihat</a>
                                </td>
                            </tr>
                            @endif
                           <tr>
                                <th class="text-grey-700 fw-600 font-xss">Status
                                </th>
                                <td class="text-right text-grey-700 fw-600 font-xss">{{$data->status}}</td>
                            </tr>
                            
                            
                       </tbody>

                   </table>
               </div>
            </div>
            
        </div>
    </div>


@endsection
