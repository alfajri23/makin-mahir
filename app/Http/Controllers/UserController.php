<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('update');
    }

    public function update(Request $request){
        $this->validate($request, [
			'file' => 'image|mimes:jpeg,png,jpg|max:2048',
		]);
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

        if(empty($request->file)){
            $foto = User::find($request->id);
            $files = $foto->foto;
        }else{
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'asset/img/foto';
            $files = $tujuan_upload . '/'. $nama_file;
            $file->move($tujuan_upload,$nama_file);
        }

        if(empty($request->password)){
            $foto = User::find($request->id);
            $password = $foto->password;
        }else{
            $password = bcrypt($request->password);
        }

        $data = User::find($request->id);
        $data->nama = $request->nama; 
        $data->password = $password; 
        $data->email = $request->email;
        $data->desc = $request->desc;
        $data->telepon = $request->telepon;
        $data->foto = $files;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->ig = $request->ig;
        $data->facebook = $request->facebook;
        $data->linkedin = $request->linkedin;
        $data->twitter = $request->twitter;
        $data->alamat = $request->alamat;
        $data->pekerjaan = $request->pekerjaan;
        $data->pendidikan = $request->pendidikan;
        $data->save();

        return redirect()->back();  
    }

    public function admin(Request $request){
        if ($request->ajax()) {
            $data = User::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('beduk', function($row){
                $nama = ''.count($row->daftar_beduk).'';
                return $nama;
            })
            ->addColumn('webinar', function($row){
                $nama = ''.count($row->daftar_webinar).'';
                return $nama;
            })
            ->addColumn('konsultasi', function($row){
                $nama = ''.count($row->daftar_konsultasi).'';
                return $nama;
            })
            ->addColumn('video', function($row){
                $nama = ''.count($row->daftar_video).'';
                return $nama;
            })
            ->addColumn('cv', function($row){
                $nama = ''.count($row->daftar_video).'';
                return $nama;
            })
            ->addColumn('mbti', function($row){
                $nama = ''.count($row->mbti_result).'';
                return $nama;
            })
            ->addColumn('riasec', function($row){
                $nama = ''.count($row->riasec_result).'';
                return $nama;
            })
            ->addColumn('aksi', function($row){
                $nama = '
                <div class="btn-group" role="group" aria-label="Basic example">
                        <a onclick="detail('.$row['id'].')" class="btn btn-secondary btn-sm">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        </a>
                        <a href="https://wa.me/'.$row['telepon'].'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
                ';
                return $nama;
            })
            ->rawColumns(['aksi','beduk','webinar','konsultasi','video','mbti','riasec'])
            ->make(true);
        }

        return view('pages.admin.member.member');
    }

    public function detail(Request $request){
        $data = User::find($request->id);
        //dd($data->daftar_beduk);

        return response()->json([
            'data' => $data,
            'beduk' => $data->daftar_beduk,
            'webinar' => $data->daftar_webinar,
            'konsultasi' => $data->daftar_konsultasi,
            'video' => $data->daftar_video,

        ]);
    }

    public function getUser(Request $request){
        $data = User::where('nama','like','%'.$request->nama.'%')->get();

        return response()->json([
            'data' => $data,
        ]);
    }
}
