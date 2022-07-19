@extends('layouts.member')

@section('content')

<div class="container">
    <div class="spacer"></div>
    <div class="row justify-content-center">
        <div class="page-title style1 col-xl-6 col-lg-6 col-md-10 text-center mb-5">
            <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-3 mb-0 d-block">Transfer</h2>
            <p class="fw-300 font-xs lh-28 text-grey-500">Daftar riwayat transfer</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row px-2">
        @if (Session::get('grup') && Session::get('grup') != null)
        <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
            <strong>Selamat Kamu Sudah Jadi Peserta !</strong><br>
            Gabung Grup WA untuk Informasi Acara dan Bonus <a href="{{Session::get('grup')}}">KLIK DISINI </a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (Session::get('sukses') && Session::get('sukses') != null)
        <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
            <strong>Selamat Transaksi Berhasil !</strong><br>
            Admin akan segera memproses pembayaranmu
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @forelse ($data as $dt)
        <div class="col-xl-10 col-lg-6 col-md-6 col-sm-6 mx-auto">
            <div class="card mb-4 d-block w-100 shadow-xss rounded-lg p-4 border-0">
                <div class="d-flex justify-content-between">
                    @if($dt->status == 'lunas')
                    <a href="{{route('enrollProdukDetail',$dt->id_produk)}}" class="text-dark fw-700 font-lg mt-3 mb-1">{{$dt->nama}}</a>
                    @else
                    <h4 class="fw-700 font-lg mt-3 mb-1">{{$dt->nama}}</h4>
                   
                    @endif
                    <p class="fw-600 font-xs text-grey-500 mt-0 mb-2">
                        @if ($dt->status == 'ditolak')
                            <span class="badge badge-pill badge-danger p-2 px-3">{{$dt->status}}</span>
                        @elseif ($dt->status == 'pending')
                            <span class="badge badge-pill badge-warning p-2 px-3">{{$dt->status}}</span>
                        @else
                            <span class="badge badge-pill badge-success p-2 px-3">{{$dt->status}}</span>
                        @endif
                    </p>
                </div>
                <p class="fw-600 font-xsss text-grey-600 mt-0 mb-2">
                    {{$dt->tipe}}
                </p>
                
                <div class="clearfix"></div>
                
                <div class="d-flex flex-column flex-sm-row justify-content-between">
                    <div>
                        <ul class="list-inline border-0 mt-0">
                            <p class="fw-600 font-xsss text-grey-600 mt-0 mb-0 mt-5">
                                {{$dt->tipe_bayar}}
                            </p>
                            <li class="list-inline-item text-center mr-0">
                                <small>{{$dt->tanggal_bayar}}</small>
                                <h4 class="fw-700 font-xs text-grey-700">Rp. {{number_format($dt->harga)}} 
                                </h4>
                                
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-end">
                        @if($dt->status == 'lunas')
                        <a href="{{route('enrollProdukDetail',$dt->id_produk)}}" class="mt-3 p-1 btn lh-24 w100 ml-1 ls-3 d-inline-block btn-sm bg-messenger font-xssss fw-700 ls-lg text-white">Lihat</a>
                        @endif
                        <a href="{{route('transferDetail',$dt->id)}}" class="mt-3 p-1 btn lh-24 w100 ml-1 ls-3 d-inline-block btn-sm bg-light font-xssss fw-700 ls-lg text-dark">Detail</a>
                       
                    </div>
                </div>
            </div>
        </div>
    
        @empty
            
        @endforelse
    </div>
    <div class="spacer"></div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': `Bearer {{Session::get('token')}}`
        }
	});

    function cancels(id){
        let ids = atob(id);
        console.log(ids);

        $.ajax({
            type : 'GET',
            url  : "{{ route('transaksiDelete') }}",
            data : {
                id : ids
            },
            dataType: 'json',
            success : (data)=>{
                console.log(data);
                location.reload();
            },
            error : (data)=>{
                console.log(data);
            }
        })

        console.log(ids);
        
    }
</script>




    
@endsection