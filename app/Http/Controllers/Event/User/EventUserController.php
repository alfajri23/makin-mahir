<?php

namespace App\Http\Controllers\Event\User;

use App\Http\Controllers\Controller;
use App\Models\ProdukEvent;
use Illuminate\Http\Request;

class EventUserController extends Controller
{
    public function list(Request $request){
        if($request->search != null){
            $data = ProdukEvent::where('judul','like','%'.$request->search.'%')
            ->where('status',1)
            ->get();

        }else{
            $data = ProdukEvent::where('status',1)
            ->latest()
            ->get();
        }


        $meta_title = "Event Makin Mahir | MakinMahir.id";
        $tipe = 'event';
        $route = 'produkListEvent';
        $riwayat = 'memberEventHistori';
        return view('pages.event.user.event_list',compact('data'));
        // return view('pages.public.list_produk',compact('riwayat','data',
        //                                                 'tipe','route',
        //                                                 'meta_title','layout'));
    }
}
