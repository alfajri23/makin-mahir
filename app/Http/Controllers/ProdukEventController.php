<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukEvent;

class ProdukEventController extends Controller
{
    public function webinar(Request $request){
        $webinar = ProdukEvent::where('tipe','webinar')->get();

        if($request->ajax()){
            $table = datatables()->of($webinar);
            $table->addIndexColumn();

            $table->editColumn('aksi',function ($row) {
                return '
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary">Left</button>
                    <button type="button" class="btn btn-secondary">Middle</button>
                    <button type="button" class="btn btn-secondary">Right</button>
                </div>
                ';
            });

            $table->rawColumns(['aksi']);
            return $table->make(true);

        }

        return view('pages.event.webinar',compact('webinar'));
        
    }
}
