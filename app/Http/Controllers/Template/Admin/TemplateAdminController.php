<?php

namespace App\Http\Controllers\Template\Admin;

use App\Helper\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TemplateAdminController extends Controller
{
    public function template(Request $request){
        $data = Template::latest()->get();

        return view('pages.template.admin.template',compact('data'));
    }

    public function templateAdd(Request $request){
        return view('pages.template.admin.template_add');
    }

    public function templateEdit($id){
        $data = Template::find($id);
        $id_produk = $data->produk->id;
        return view('pages.template.admin.template_edit',compact('data','id_produk'));
    }

    public function templateCreate(Request $request){


        $messages = [
            'required' => ':attribute harus diisi.',
            'mimes' => ':attribute tipe yang diterima: :values',
            'max' => 'Ukuran maksimal file 2 Mb'
        ];

        $this->validate($request, [
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ],$messages);

        $datas = [
            'judul' => $request->judul,
            'link' => Str::slug($request->judul, '-'),
            'harga' => str_replace(",", "", $request->harga),
            'harga_bias' => str_replace(",", "", $request->harga_bias),
            'desc' => $request->desc,
            'status' => $request->status,
        ];

        if(!empty($request->poster)){
            $datas = UploadFile::file($request,'poster','storage/produk/template',$datas);

            $data = Template::find($request->id);
            if(isset($data)){
                File::delete(public_path($data->poster));
            }
        }

        $filed = [];

        if(!empty($request->file)){
            foreach($request->file as $file){
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload_server = public_path('storage/template');
                $tujuan_upload = 'storage/template';
                $files = $tujuan_upload . '/'. $nama_file;
                $file->move($tujuan_upload_server,$nama_file);
                $filed[] = $files;
            }

            $file_name = implode(",",$filed);

            if($request->id != null){
                $file_lama = Template::find($request->id);
                
                if($file_lama != null){
                    $file_name = $file_name . ',' . $file_lama->file;
                }else{
                    $file_name = $file_name;
                }
            }

            $datas['file'] = $file_name;
        }

        $data = Template::updateOrCreate(['id'=>$request->id],$datas);


        $produk = Produk::updateOrCreate(['id'=>$request->id_produk],[
            'nama' => $request->judul,
            'link' => Str::slug($request->judul, '-'),
            'harga' => str_replace(",", "", $request->harga),
            'id_kategori' => 4,
            'id_produk' => $data->id,
        ]);

        return redirect()->route('templateAdmin');
    }

    public function templateDelete($id){
        $data = Template::find($id);
        File::delete(public_path($data->poster));

        $files = explode(",",$data->file);
        if(!empty($file)){
            foreach($files as $file){
                File::delete(public_path($file));
            }
        }

        $produk = Produk::find($data->produk->id);

        $produk->delete();
        $data->delete();

        return redirect()->back();
    }

    public function deleteFileTemplate(Request $request){
        $data = Template::find($request->id);
        $files = explode(",",$data->file);

        File::delete(public_path($files[$request->index - 1]));
        unset( $files[$request->index - 1] );
        $files = implode(",",$files);
        $data->file = $files;
        $data->save();

        return redirect()->back();
    }

}
