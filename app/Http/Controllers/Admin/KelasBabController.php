<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KelasBab;

class KelasBabController extends Controller
{
    public function create(Request $request){
        $data = KelasBab::updateOrCreate(['id'=>$request->id],[
            'id_kelas' => $request->id_kelas,
            'nama' => $request->nama_bab,
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $data
        ],200);
    }

    public function edit(Request $request){
        $data = KelasBab::find($request->id);
        $data->nama = $request->nama;
        $data->save();

        return redirect()->back();
    }

    public function delete($id){
        $data = KelasBab::find($id);
        $data->delete();

        return redirect()->back();
    }
}
