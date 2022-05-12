<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KonsultasiEnroll;
use App\Models\EventEnroll;
use App\Models\EbookEnroll;

class PendaftaranController extends Controller
{
    public function index(Request $request){
        $id_expert = $request->session()->get('auth.id_expert');
        $event = collect(EventEnroll::where('id_expert',$id_expert)->get());
        $konsultasi = collect(KonsultasiEnroll::where('id_expert',$id_expert)->get());
        $ebook = collect(EbookEnroll::where('id_expert',$id_expert)->get());

        $data = $event->merge($konsultasi);
        $data = $data->merge($ebook);

        //dd($data);

        return view('pages.expert.pendaftaran.pendaftaran',compact('data'));
    }
}
