<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KelasSoal;
use App\Models\KelasJawaban;
use App\Models\KelasUjian;
use App\Models\KelasEnroll;
use App\Models\Kelas;

class UjianController extends Controller
{
    public function index(Request $request,$id){
        
        $soals = KelasSoal::where('id_ujian',$id)->orderBy('no')->get();
        $ujian = KelasUjian::find($id);
        
        //id produk unutk redirect balik ke detail kelas
        $id_produk = $ujian->kelas->produk->id;

        $attempt = KelasEnroll::where([
            'id_kelas' => $ujian->kelas->id,
            'id_user' => $request->session()->get('auth.id_user')
        ])->first();

        //dd($attempt);

        if($attempt->user_test_attempt >= $ujian->attempt){
            //dd("hallo");
            return redirect()->back()->with('attempt', 'Melebihi jumlah test Anda ( '.$ujian->attempt.' / '.$ujian->attempt.' )');
        }else{
            $attempt->user_test_attempt = $attempt->user_test_attempt + 1;
            $attempt->save();

            $request->session()->put('test', 1 );

            return view('pages.member.produk.kelas.ujian.ujian1',compact('soals','ujian','id_produk'));
        }


    }

    public function answer(Request $request){
        $data = KelasJawaban::updateOrCreate(['id_soal'=>$request->id_soal, 'id_user' => $request->session()->get('auth.id_user')],[
            'id_user' => $request->session()->get('auth.id_user'),
            'id_ujian' => $request->id_ujian,
            'no' => $request->no,
            'jawaban' => $request->jawaban,
            'benar' => $request->benar,
        ]);

        return response()->json([
            'data' => $data
        ]);
    }

    public function detailUjian(Request $request,$id){
        $soals = KelasSoal::where('id_ujian',$id)->orderBy('no')->get();
        $ujian = KelasUjian::find($id);
        $hasilTest = KelasJawaban::where([
            'id_user' => $request->session()->get('auth.id_user'),
            'id_ujian' => $ujian->id,
        ])->orderBy('no')->get();

        //id produk unutuk redirect balik ke detail kelas
        $id_kelas = $ujian->kelas->id;

        $data = Kelas::find($id_kelas);

        return view('pages.member.produk.kelas.ujian.ujian_hasil',compact('soals','ujian'
                                                                    ,'id_kelas','data','hasilTest'));
    }

}
