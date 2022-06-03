<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ForumJawaban;
use App\Models\ForumPertanyaaan;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(Request $request){
        $data = ForumPertanyaaan::latest()->get();

        if ($request->ajax()) {
            $data = ForumPertanyaaan::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('isi', function($row){
                $nama = '
                <p>'.htmlspecialchars_decode($row->isi).'</p>
                ';
                return $nama;
            })
            ->addColumn('aksi', function($row){
                $nama = '
                <div class="btn-group" role="group" aria-label="Basic example">
                        <a onclick="show('.$row['id'].')" class="btn btn-success btn-sm">
                        <i class="fa-solid fa-square-pen"></i>
                        </a>
                </div>
                ';
                return $nama;
            })
            ->rawColumns(['aksi','isi'])
            ->make(true);
        };

        return view('pages.admin.forum.forum',compact('data'));
    }

    public function jawab(Request $request){
        //dd($request->all());
        $data = ForumPertanyaaan::find($request->id);
        $data->is_answered = 1;
        $data->save();

        $jawaban = ForumJawaban::create([
            'id_pertanyaan' => $request->id,
            'id_user' => 20,
            'jawaban' => $request->jawaban,
        ]);

        return redirect()->back();

        // return response()->json([
        //     'data' => 'sukses'
        // ]);
    }
}
