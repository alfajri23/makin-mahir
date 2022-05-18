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
        $data = FormSetting::updateOrCreate(['id'=>$request->id],[
            'id_produk_kategori' => $request->id_produk_kategori,
            'pertanyaan' => $request->pertanyaan,
            'tipe' => $request->tipe,
        ]);

        return redirect()->route('formSetting');
    }


    //Beduk
    public function beduk(Request $request){
        $data = SettingFormBeduk::all();
        return view('pages.admin.setting.form.setting_beduk',compact('data'));
    }

    public function detail_beduk(Request $request){
        $data = SettingFormBeduk::find($request->id);
        return response()->json([
            'data' => $data
        ]);
    }

    public function edit_beduk(Request $request){
        dd($request->all());
        $this->validate($request, [
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'nama' => $request->nama,
            'judul' => $request->judul,
            'data' => isset($request->data) ? $request->data : '',
            'tipe' => $request->tipe,
            'desc' => $request->desc,
        ];

        if(!empty($request->file('gambar'))){
            $file = $request->file('gambar');
            $tujuan_upload = 'asset/img/setting/beduk';
            $nama_file_reward = time()."_".$file->getClientOriginalName();
            $file_rewards = $tujuan_upload . '/'. $nama_file_reward;
            $file->move($tujuan_upload,$nama_file_reward);
            $data += ['gambar' => $file_rewards];
        }
        
        SettingFormBeduk::updateOrCreate(['id'=>$request->id],$data);
        return redirect()->back();
    }

    public function save_beduk(Request $request){
        
        $nama = $request->nama;
        Schema::table('pendaftaran_beduks', function (Blueprint $table) use ($nama) {
            $table->string($nama)->nullable();
        });

        $data = [
            'nama' => $request->nama,
            'judul' => $request->judul,
            'data' => isset($request->data) ? $request->data : '',
            'tipe' => $request->tipe,
            'desc' => $request->desc,
        ];

        if(!empty($request->file('gambar'))){
            $file = $request->file('gambar');
            $tujuan_upload = 'asset/img/setting/beduk';
            $nama_file_reward = time()."_".$file->getClientOriginalName();
            $file_rewards = $tujuan_upload . '/'. $nama_file_reward;
            $file->move($tujuan_upload,$nama_file_reward);
            $data += ['gambar' => $file_rewards];
        }

        SettingFormBeduk::updateOrCreate(['id'=>$request->id],$data);
        return redirect()->back();
    }

    public function switch_setting_beduk(Request $request){
        $data = SettingFormBeduk::find($request->id);
        $data->status = $request->status;
        $data->save();
        return response()->json([
            'data' => 'sukses mengganti '
        ]);
    }

    //Webinar
    public function webinar(Request $request){
        $data = SettingFormWebinar::all();
        return view('pages.admin.setting.form.setting_webinar',compact('data'));
    }

    public function detail_webinar(Request $request){
        $data = SettingFormWebinar::find($request->id);
        return response()->json([
            'data' => $data
        ]);
    }

    public function edit_webinar(Request $request){
        $this->validate($request, [
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'nama' => $request->nama,
            'judul' => $request->judul,
            'data' => isset($request->data) ? $request->data : '',
            'tipe' => $request->tipe,
            'desc' => $request->desc,
        ];

        if(!empty($request->file('gambar'))){
            $file = $request->file('gambar');
            $tujuan_upload = 'asset/img/setting/webinar';
            $nama_file_reward = time()."_".$file->getClientOriginalName();
            $file_rewards = $tujuan_upload . '/'. $nama_file_reward;
            $file->move($tujuan_upload,$nama_file_reward);
            $data += ['gambar' => $file_rewards];
        }
        
        SettingFormWebinar::updateOrCreate(['id'=>$request->id],$data);
        return redirect()->back();
    }

    public function save_webinar(Request $request){
        $nama = $request->nama;
        Schema::table('pendaftaran_webinars', function (Blueprint $table) use ($nama) {
            $table->string($nama)->nullable();
        });

        $data = [
            'nama' => $request->nama,
            'judul' => $request->judul,
            'data' => isset($request->data) ? $request->data : '',
            'tipe' => $request->tipe,
            'desc' => $request->desc,
        ];

        if(!empty($request->file('gambar'))){
            $file = $request->file('gambar');
            $tujuan_upload = 'asset/img/setting/webinar';
            $nama_file_reward = time()."_".$file->getClientOriginalName();
            $file_rewards = $tujuan_upload . '/'. $nama_file_reward;
            $file->move($tujuan_upload,$nama_file_reward);
            $data += ['gambar' => $file_rewards];
        }

        SettingFormWebinar::updateOrCreate(['id'=>$request->id],$data);
        return redirect()->back();
    }

    public function switch_setting_webinar(Request $request){
        $data = SettingFormWebinar::find($request->id);
        $data->status = $request->status;
        $data->save();
        return response()->json([
            'data' => 'sukses mengganti '
        ]);
    }
}
