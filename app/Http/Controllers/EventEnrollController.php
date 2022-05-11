<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukEvent;
use App\Models\EventEnroll;



class EventEnrollController extends Controller
{
    public function enroll($id){
        $datas = ProdukEvent::find($id);

        $data = EventEnroll::create([
            'id_user' => auth()->user()->id,
            'id_produk' => $datas->produk->id,
            'id_event' => $datas->id,
        ]);

        
    }
}
