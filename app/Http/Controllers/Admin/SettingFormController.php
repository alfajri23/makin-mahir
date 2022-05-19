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

    public function store(Request $request){
        $pertanyaan = implode(",",$request->pertanyaan);
        $tipe = implode(",",$request->tipe);
        $File = $request->file != null ? $request->file : [];

        if($request->id != null){
            $filed = FormSetting::find($request->id);
            $filed = $filed->file;
            $filed =  explode(",",$filed);
        }else{
            $filed = [];
        }

        //if(!empty($request->file)){
            for($i=0;$i<count($request->tipe);$i++){
                if(array_key_exists($i,$File)){
                    if(!empty($request->file)){
                        $nama_file = $File[$i]->getClientOriginalName();
                        $tujuan_upload_server = public_path('asset/event/beduk');
                        $tujuan_upload = 'asset/event/beduk';
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

        //dd($filed);

        $file = implode(",",$filed);

        $datas = [
            'id_produk_kategori' => $request->id_produk_kategori,
            'pertanyaan' => $pertanyaan,
            'tipe' => $tipe,
            'file' => $file,
        ];
        
        $data = FormSetting::updateOrCreate(['id'=>$request->id],$datas);


        return redirect()->route('formSetting');
    }

}
