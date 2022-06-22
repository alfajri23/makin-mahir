<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SettingFormBeduk;
use App\Models\SettingFormWebinar;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\FormSetting;
use App\Models\ProdukKategori;


class SettingFormController extends Controller
{

    public function index(){
        
        $data = FormSetting::all();

        return view('pages.admin.setting.form.list_form',compact('data'));
    }

    public function init(Request $request){
        $kategori = ProdukKategori::all();
        $data = FormSetting::find($request->id);

        return view('pages.admin.setting.form.add_form',compact('kategori','data'));
    }

    public function delete(Request $request){
        $filed = FormSetting::find($request->id);

        $pertanyaan = explode(",",$filed->pertanyaan);
        $jawaban = explode(",",$filed->jawaban);
        $file = explode(",",$filed->file);
        $tipe = explode(",",$filed->tipe);
        $pilihan = explode(",",$filed->pilihan);

        unset($pertanyaan[$request->index]);
        unset($jawaban[$request->index]);
        unset($tipe[$request->index]);
        unset($file[$request->index]);
        unset($pilihan[$request->index]);

        $datas = [
            'id_produk_kategori' => $filed->id_produk_kategori,
            'pertanyaan' => implode(",",$pertanyaan),
            'tipe' => implode(",",$tipe),
            'file' => implode(",",$file),
            'tipe' => implode(",",$tipe),
            'pilihan' => implode(",",$pilihan),
        ];

        $data = FormSetting::updateOrCreate(['id'=>$request->id],$datas);

        return redirect()->back();

    }

    public function store(Request $request){

        //dd($request->pilihan);
        $pertanyaan = implode(",",$request->pertanyaan);
        $tipe = implode(",",$request->tipe);
        $required = implode(",",$request->required);
        $File = $request->file != null ? $request->file : [];
        $pilihan = implode(",",$request->pilihan);
        //dd($pilihan);

        if($request->id != null){
            $filed = FormSetting::find($request->id);
            $filed = $filed->file;
            $filed =  explode(",",$filed);
        }else{
            $filed = [];
        }

        //if(!empty($request->file)){
            for($i=0;$i<=count($request->tipe);$i++){
                if(array_key_exists($i,$File)){
                    if(!empty($request->file)){
                        $nama_file = $File[$i]->getClientOriginalName();
                        $tujuan_upload_server = public_path('storage/setting/form');
                        $tujuan_upload = 'storage/setting/form';
                        $files = $tujuan_upload . '/'. $nama_file;
                        $File[$i]->move($tujuan_upload_server,$nama_file);
                        $filed[$i] = $files;
                    }
                }else{  
                    if(array_key_exists($i,$filed)){
                        if($filed[$i] == null){
                            $filed[$i] = '';
                        }
                    }else{
                        $filed[$i] = '';
                    }
                }
            }
        //}


        $file = implode(",",$filed);
        //$file = ',' . $file;


        $datas = [
            'id_produk_kategori' => $request->id_produk_kategori,
            'pertanyaan' => $pertanyaan,
            'tipe' => $tipe,
            'file' => $file,
            'required' => $required,
            'pilihan' => $pilihan,
        ];

        //dd($datas);
        
        $data = FormSetting::updateOrCreate(['id'=>$request->id],$datas);


        return redirect()->route('formSetting');
    }

}
