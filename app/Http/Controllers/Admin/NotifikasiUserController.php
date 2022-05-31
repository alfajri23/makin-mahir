<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NotifikasiUser;
use Illuminate\Http\Request;

class NotifikasiUserController extends Controller
{
    public function index(Request $request){
        $data = NotifikasiUser::latest()->get();

        if ($request->ajax()) {
            $data = NotifikasiUser::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function($row){
                $nama = '
                <div class="btn-group" role="group" aria-label="Basic example">
                        <a onclick="deletes('.$row['id'].')" class="btn btn-danger btn-sm">
                        <i class="fa-solid fa-trash"></i>
                        </a>
                </div>
                ';
                return $nama;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        };

        return view('pages.admin.notifikasi.notifikasi',compact('data'));
    }

    public function store(Request $request){
        NotifikasiUser::create([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'jenis' => $request->jenis,
            'id_user' => $request->id_user,
            'link' => $request->link,
        ]);

        return redirect()->route('notifikasiIndex');

    }

    public function add(){
        return view('pages.admin.notifikasi.notifikasi_add');
    }

    public function delete(Request $request){
        $data = NotifikasiUser::find($request->id)->delete();
        return response()->json([
            'data' => 'sukses'
        ]);
    }
}
