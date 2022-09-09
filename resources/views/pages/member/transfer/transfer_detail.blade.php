@extends('layouts.public')

@section('content')

    <div class="col-11 col-8 mx-auto">
        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 mt-5 mx-auto">
            @if(!empty($data))
            <div class="order-details pt-5 pt-sm-0">
                <div class="table-content table-responsive mb-5 card border border-dark p-2 p-sm-5">
                   <table class="table order-table order-table-2 mb-0 clearfix">
                       <thead>
                           <tr>
                               <th class="border-0 font-lg">Invoice</th>
                               <th class="text-right border-0 text-grey-700 fw-400 font-xsss">{{$data->updated_at}}</th>
                           </tr>
                       </thead>
                       <tbody>
                            <tr>
                                <th class="text-grey-700 fw-500 font-xsss">Nama 
                                </th>
                                <td class="text-right text-grey-700 fw-500 font-xsss">{{$data->nama}} </td>
                            </tr>
                           <tr>
                               <th class="text-grey-700 fw-500 font-xsss">Harga
                               </th>
                               <td class="text-right text-grey-700 fw-500 font-xsss">Rp. {{number_format($data->harga)}}</td>
                           </tr>
                           <tr>
                                <th class="text-grey-700 fw-500 font-xsss">Metode
                                </th>
                                <td class="text-right text-grey-700 fw-500 font-xsss">{{$data->metode}}</td>
                            </tr>
                            
                           <tr>
                                <th class="text-grey-700 fw-500 font-xsss">Status
                                </th>
                                <td class="text-right text-grey-700 fw-500 font-xsss">{{$data->status}}</td>
                            </tr>
                            
                            
                       </tbody>

                   </table>
                   
               </div>
            </div>
            @else
            <div class="spacer"></div>
            <h5 class="text-center my-4 font-lg">
                Data tidak ditemukan
            </h5>
            <div class="spacer"></div>
            @endif
            
            
        </div>
    </div>


@endsection
