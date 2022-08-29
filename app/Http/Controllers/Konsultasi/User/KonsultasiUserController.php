<?php

namespace App\Http\Controllers\Konsultasi\User;

use App\Http\Controllers\Controller;
use App\Models\ProdukKonsul;
use Illuminate\Http\Request;

class KonsultasiUserController extends Controller
{
    public function list(Request $request){
        if($request->search != null){
            $data = ProdukKonsul::where('judul','like','%'.$request->search.'%')
            ->where('status',1)
            ->get();

        }else{
            $data = ProdukKonsul::where('status',1)
            ->latest()
            ->get();
        }


        $meta_title = "konsultasi Makin Mahir | MakinMahir.id";
        $tipe = 'konsultasi';
        $route = 'produkListkonsultasi';
        $riwayat = 'memberkonsultasiHistori';
        return view('pages.konsultasi.user.konsultasi_list');
        // return view('pages.public.list_produk',compact('riwayat','data',
        //                                                 'tipe','route',
        //                                                 'meta_title','layout'));
    }
}
