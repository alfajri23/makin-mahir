<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\UploadFile;
use App\Models\KelasMateri;
use App\Models\KelasBab;
use Illuminate\Support\Facades\Validator;

class KelasMateriController extends Controller
{
    public function index(Request $request){
        $bab = KelasBab::find($request->id_bab);
        $data = [
            'nama_bab' => $bab,
            'id_bab' => $request->id_bab,
            'id_kelas' => $request->id_kelas
        ];
        return view('pages.admin.produk.kelas.materi_add',compact('data'));
    }

    public function detail($id){
        $data = KelasMateri::find($id);

        return view('pages.admin.produk.kelas.materi_edit',compact('data'));

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'file' => 'file|mimes:pdf,docx,doc,ppt,pptx|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
            dd($validator->messages()->first()); 
        }

        $datas = [
            'judul' => $request->judul,
            'id_bab' => $request->id_bab,
            'id_kelas' => $request->id_kelas,
            'isi' => $request->isi,
            'link_video' => $request->link_video,
        ];

        if(!empty($request->file)){
            $datas = UploadFile::file($request,'file','asset/file',$datas);
        }

        $bab = KelasMateri::updateOrCreate(['id'=>$request->id],$datas);

        return redirect()->route('kelasDetail',$request->id_kelas);
    }

    public function delete(Request $request){
        $data = KelasMateri::find($request->id);
        $data->delete();

        return response()->json([
            'message' => 'sukses',
            'data' => 'sukses menghapus'
        ]);

    }
}
