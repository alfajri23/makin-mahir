<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\ProdukEvent;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $event = collect(ProdukEvent::all());
        $event_aktif = $event->where('status',1)->count();

        $events = [
            'semua' => $event->count(),
            'aktif' => $event_aktif,
        ];

        $konsultan = collect(Expert::all());
        $konsultan_aktif = $konsultan->where('status',1)->count();

        $konsultans = [
            'semua' => $konsultan->count(),
            'aktif' => $konsultan_aktif,
        ];

        $user = collect(User::all())->count();

        $transaksi = collect(Transaksi::where('status','like','%lunas%')
        ->where('harga','!=','NULL')->get());
        $transaksi_display = $transaksi->groupBy('tanggal_bayar');

        $rentang = [];
        $jumlah = [];
        $index = 0;

        foreach ($transaksi_display as $key => $tr){
            $data = explode("-",$key);
            $rentang[$index] = $key;

            foreach ($tr as $trs){
                $jumlah[$index] = $trs->harga;
            }

            $index++;
        }

        $rentang = implode(",",$rentang);
        $jumlah = implode(",",$jumlah);

        $user_transaksi = $transaksi->groupBy('id_user')->count();


        // foreach ($transaksi as $tr){
        //     $data = explode("-",$tr->tanggal_bayar);
        //     dd($data[1]);
        //     $rentang[$index] = $tr;
        //     dd($tr);


        // }

        return view('pages.admin.home',compact('events','konsultans',
                                                'rentang','jumlah',
                                                'user','user_transaksi'));
    }
}
