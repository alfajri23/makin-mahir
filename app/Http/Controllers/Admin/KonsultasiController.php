<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KonsultasiTipe;
use App\Models\KonsultasiUserEnroll;
use App\Models\KonsultasiExpert;
use App\Models\Expert;
use App\Models\KonsultasiEnroll;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Helper\UploadFile;

class KonsultasiController extends Controller
{   
    public function index(){
        $data = KonsultasiExpert::latest()->get();
        $expert = Expert::latest()->get();
        $tipe = KonsultasiTipe::latest()->get();
        return view('pages.admin.produk.konsultasi.konsultasi',compact('data','expert','tipe'));
    }

//Tipe
    public function tipeIndex(){
        $data = KonsultasiTipe::latest()->get();
        return view('pages.admin.produk.konsultasi.konsultasi_home',compact('data'));
    }

    public function tipeStore(Request $request){
        $data = KonsultasiTipe::updateOrCreate(['id'=>$request->id],[
            'nama' => $request->nama,
            'harga' => str_replace(",", "", $request->harga),
        ]);

        return redirect()->back();
    }
//End tipe

//Experts

    public function expertIndex($id){
        $tipe = KonsultasiTipe::find($id);
        $data = KonsultasiExpert::where('id_konsultasi',$id)->get();

        //!Besok ganti client side agar lebih cepat
        $expert = Expert::latest()->get();

        return view('pages.admin.produk.konsultasi.konsultasi_expert',compact('data','tipe',
                                                                         'expert','id'));
    }

    public function expertDetail($id){
        $data = KonsultasiExpert::find($id);
        $expert = Expert::latest()->get();

        $id_produk = $data->produk->id;

        return view('pages.admin.produk.konsultasi.konsultasi_expert_edit',compact('data',
                                                                         'expert','id','id_produk'));
    }

    public function expertStore(Request $request){
        $validator = Validator::make($request->all(), [
            'poster' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            dd($validator->messages()->first()); 
            return redirect()->back();
        }

        $datas = [
            'judul' => $request->judul,
            'harga' => str_replace(",", "", $request->harga),
            'harga_bias' => str_replace(",", "", $request->harga_bias),
            'jadwal' => $request->jadwal,
            'id_konsultasi' => $request->id_konsultasi,
            'id_expert' => $request->id_expert,
        ];

        if(!empty($request->poster)){
            $datas = UploadFile::file($request,'poster','storage/konsultasi',$datas);
        
            $foto = KonsultasiExpert::find($request->id);
            if(isset($foto)){
                File::delete($foto->poster);
            }
        }

        $data = KonsultasiExpert::updateOrCreate(['id'=>$request->id],$datas);

        $produk = Produk::updateOrCreate(['id'=>$request->id_produk],[
            'id_kategori' => 4,
            'id_produk' => $data->id,
            'nama' => $request->judul,
            // 'nama' => "Konsultasi " . $data->tipe->nama . " oleh " . $data->expert->nama,
            'harga' => str_replace(",", "", $request->harga),
            'poster' => $data->poster
        ]);

        // Cek untuk redirect sebagai admin atau expert
        if (Auth::guard('admin')->check()){
            return redirect()->route('konsultasiIndex');
        }else{
            return redirect()->route('konsultasiExperts',$request->id_konsultasi);
        }

        
    }    

    public function expertDelete($id){
        $data = KonsultasiExpert::find($id);
        $produk = Produk::find($data->produk->id);

        $data->forceDelete();
        $produk->forceDelete();

        return redirect()->back();
    }

    public function done(Request $request){
        $data = KonsultasiEnroll::find($request->id);
        $data->is_done = 1;
        $data->save();
        

        return redirect()->back();
    }


}
