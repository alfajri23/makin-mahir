<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KelasSoal;
use Illuminate\Http\Request;
use App\Models\KelasUjian;

class KelasUjianController extends Controller
{
    public function ujianInit($id){
        $data = KelasUjian::create([
            'id_kelas' => $id
        ]);

        return redirect()->route('ujianDetail',$data->id);

    }

    public function ujianStore(Request $request){
        $data = KelasUjian::updateOrCreate(['id'=>$request->id],[
            'nama' => $request->nama,
            'durasi' => $request->durasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('ujianDetail',$data->id);

    }

    public function ujianDetail($id){
        $ujian = KelasUjian::find($id);
        $soals = KelasSoal::where('id_ujian',$id)->orderBy('no')->get();

        return view('pages.admin.produk.kelas.ujian.ujian_add',compact('ujian','soals'));
    }

    public function ujianDelete(Request $request){
        $data = KelasUjian::find($request->id);
        $data->delete();

        return response()->json([
            'message' => 'sukses',
            'data' => 'sukses menghapus',
            'code' => 200
        ]);
    }

    public function soalCreate(Request $request){
        $data = KelasSoal::updateOrCreate(['id'=>$request->id_soal],[
            'id_ujian' => $request->id_ujian,
            'no' => $request->no,
            'pertanyaan' => $request->pertanyaan,
            'pilihanA' => $request->pilihanA,
            'pilihanB' => $request->pilihanB,
            'pilihanC' => $request->pilihanC,
            'pilihanD' => $request->pilihanD,
            'jawaban' => $request->jawaban,
            'penjelasan' => $request->penjelasan,
        ]);

        $ujian = KelasUjian::find($data->ujian->id);
        $ujian->soal = $ujian->soal + 1;
        $ujian->save();

        return response()->json([
            'message' => 'sukses',
            'data' => 'sukses menghapus',
            'code' => 200
        ]);
    }

    public function soalDetail(Request $request){
        $data = KelasSoal::find($request->id);

        return response()->json([
            'data' => $data,
        ]);
    }

    public function soalDelete(Request $request){
        $data = KelasSoal::find($request->id);

        $ujian = KelasUjian::find($data->ujian->id);
        $ujian->soal = $ujian->soal - 1;
        $ujian->save();

        $data->delete();

        return response()->json([
            'data' => 'sukses',
        ]);
    }
}
