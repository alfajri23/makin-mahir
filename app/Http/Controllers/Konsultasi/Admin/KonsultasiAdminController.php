<?php

namespace App\Http\Controllers\Konsultasi\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Helper\UploadFile;
use App\Models\ProdukKategori;
use App\Models\ProdukKonsul;
use Illuminate\Support\Str;

class KonsultasiAdminController extends Controller
{
    //Konsultasi
    public function konsultasi(Request $request){
        if ($request->ajax()) {
            $data = ProdukKonsul::latest()->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    $actionBtn = $row->status == 1 ? '<span class="badge badge-success">Berjalan</span>' : '<span class="badge badge-warning">Berhenti</span>';
                    return $actionBtn;
                })
                ->addColumn('poster', function($row){
                    $image = asset($row['poster']);
                    $actionBtn = '<img src="'.$image.'" style="width:100px">';
                    return $actionBtn;
                })
                ->addColumn('tanggal', function($row){
                    
                    return '
                        <span>'.date_format(date_create($row['tanggal_mulai']),"d M Y").'
                        
                        </span>
                    ';
                })
                ->addColumn('vendor', function($row){
                    
                    return $expert = $row->id_expert !== null ? $row->expert->nama : '';
                })
                ->addColumn('action', function($row){
                    $deleteBtn = '
                    <button onclick="deleteKonsultasi('.$row['id'].')" class="delete btn btn-danger btn-sm">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    ';

                    $event = $row->status == 1 ? 
                        '<button onclick="endKonsultasi('.$row['id'].')" class="delete btn btn-warning btn-sm">
                            <i class="fa-solid fa-ban"></i>
                        </button>' :
                        '<button onclick="startKonsultasi('.$row['id'].')" class="delete btn btn-info btn-sm">
                            <i class="fa-solid fa-check"></i>
                        </button>';

                    $actionBtn = '
                    <div class="btn-group">
                        <a href="'.route('editKonsultasi',['id' => $row['id']]).'" class="edit btn btn-success btn-sm">
                            <i class="fa-solid fa-pencil"></i>
                        </a> 
                        
                        '.$event.'
                    </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action','poster','status','vendor','tanggal'])
                ->make(true);
        }

        return view('pages.konsultasi.admin.konsultasi');
    }

    public function konsultasiPast(Request $request){
        if ($request->ajax()) {
            $data = ProdukKonsul::onlyTrashed()->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('poster', function($row){
                    $image = asset($row['poster']);
                    $actionBtn = '<img src="'.$image.'" style="width:100px">';
                    return $actionBtn;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <div class="">
                        <a href="'.route('restoreEvent',['id' => $row['id']]).'" class="edit btn btn-success btn-sm">Restore</a> 
                    </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action','poster'])
                ->make(true);
        }

        return view('pages.konsultasi.admin.konsultasi_past');
    }

    public function konsultasiEdit(Request $request){
        $data =ProdukKonsul::find($request->id);

        $tipe = ProdukKategori::where('nama',$data->tipe)->pluck('id')->first();
        
        $tipes = ProdukKategori::latest()->get();
        $pemateri = Expert::latest()->get();

        $produk = Produk::where([
            'id_produk' => $data->id,
            'id_kategori' => $tipe
        ])->first();

        return view('pages.konsultasi.admin.konsultasi_edit',compact('data','produk','tipes','pemateri'));
    }

    public function konsultasiEnd(Request $request){
        $data =ProdukKonsul::find($request->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'data' => 'sukses',
            'message' => 'Konsultasi tidak akan tampil diberanda'
        ]);

        //return redirect()->back();
    }

    public function konsultasiStart(Request $request){
        $data =ProdukKonsul::find($request->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'data' => 'sukses',
            'message' => 'Konsultasi tidak akan tampil diberanda'
        ]);

        //return redirect()->back();
    }

    public function konsultasiDelete(Request $request){
        $data =ProdukKonsul::find($request->id);
        $data->delete();

        return response()->json([
            'data' => 'sukses',
            'message' => 'Data Konsultasi terhapus'
        ]);

        //return redirect()->back();
    }

    public function konsultasiRestore(Request $request){
        $data =ProdukKonsul::onlyTrashed()->where('id',$request->id);
        $data->restore();
        return redirect()->back();
    }

    public function konsultasiAdd(){
        $pemateri = Expert::latest()->get();
        $tipes = ProdukKategori::latest()->get();
        return view('pages.konsultasi.admin.konsultasi_add',compact('pemateri','tipes'));
    }

    public function konsultasiSave(Request $request){
    
        $messages = [
            'required' => ':attribute harus diisi.',
            'mimes' => ':attribute tipe yang diterima: :values',
            'max' => 'Ukuran maksimal file 2 Mb'
        ];

        $this->validate($request, [
            'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ],$messages);

        $datas = [
            'judul'=>$request->judul,
            'link' => Str::slug($request->judul, '-'),
            'harga'=> str_replace(",", "", $request->harga),
            'tipe' =>$request->tipe,
            'harga_bias' => str_replace(",", "", $request->harga_bias),
            'deskripsi'=>$request->desc,
            'pemateri' =>$request->pemateri,
            'jenis_konsultasi' =>$request->jenis_konsultasi,
            'status' => 1,
            'id_expert' => $request->id_pemateri,
        ];


        //handle file
        if(!empty($request->poster)){
            $datas = UploadFile::file($request,'poster','storage/produk/konsultasi',$datas);

            $data = ProdukKonsul::find($request->id);
            if(isset($data)){
                File::delete(public_path($data->poster));
            }
        }

        //cari tipe produk
        $tipe = ProdukKategori::find($request->tipe);
        $datas['tipe'] = $tipe->nama;

        $konsultasi = ProdukKonsul::updateOrCreate(['id'=>$request->id],$datas);

        $produk = Produk::updateOrCreate(['id'=>$request->id_produk],[
            'id_kategori' => $request->tipe,
            'id_produk' => $konsultasi->id,
            'nama' => $request->judul,
            'harga' => str_replace(",", "", $request->harga),
            'id_expert' => $konsultasi->id_expert
        ]);


        // Cek untuk redirect sebagai admin atau expert
        if (Auth::guard('admin')->check()){
            return redirect()->route('adminKonsultasi');
        }else{
            return redirect()->route('konsultasiExpert');
        }
    }

   
//END Konsultasi

}
