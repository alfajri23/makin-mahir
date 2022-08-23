<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukVideo;
use App\Models\ProdukKonsul;
use App\Models\ProdukEvent;
use App\Models\SubProdukVideo;
use Illuminate\Http\Request;
use Datatables;

use App\Models\Produk;

use App\Models\Kelas;
use App\Models\KelasBab;
use App\Models\KelasKategori;
use App\Models\Expert;
use App\Models\ProdukKategori;
use App\Models\Template;

use Illuminate\Support\Facades\Validator;
use App\Helper\UploadFile;
use App\Models\CVCheckerEnroll;
use App\Models\KelasUjian;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{

    //KELAS
        public function index(Request $request){

            $data = Kelas::query()
            ->when(request('cari') != null, function ($q){ 
                return $q = Kelas::where('judul','like','%'.request('cari').'%');
            })
            ->when(request('status') == 'publish', function ($q){ 
                return $q = Kelas::where('id_status',1);
            })
            ->when(request('status') == 'draf', function ($q){ 
                return $q = Kelas::where('id_status',2);
            })
            ->when(request('status') == null, function ($q){ 
                return $q = Kelas::latest();
            })
            ->get();

            return view('pages.admin.produk.kelas.kelas',compact('data'));
        }

        public function detail($id){
            $data = Kelas::find($id);
            $babs = KelasBab::where('id_kelas',$data->id)->get();

            $kategori = KelasKategori::latest()->get();
            $status = '';

            $ujian = KelasUjian::latest()->get();
            $ujian = $ujian[0];

            //dd($ujian);

            return view('pages.admin.produk.kelas.kelas_add',compact('kategori', 'status',
                                                            'data','babs','ujian'));
        }

        public function init(Request $request){
            $data = Kelas::updateOrCreate(['id'=>$request->id],[
                'judul' => $request->judul,
                'tentang' => $request->tentang,
                'desc' => $request->desc,
                'poin_produk' => $request->point,
                'poster' => $request->poster,
                'id_kategori' => $request->id_kategori,
                'id_status' => $request->id_status,
                'poster' => $request->poster,
            ]);

            $produk = Produk::create([
                'id_kategori' => 1,
                'id_produk' => $data->id
            ]);

            return redirect()->route('kelasDetail',$data->id);
        }

        public function update(Request $request){
            $validator = Validator::make($request->all(), [
                'poster' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back();
                dd($validator->messages()->first()); 
            }

            $datas = [
                'judul' => $request->judul,
                'tentang' => $request->tentang,
                'desc' => $request->desc,
                'poin_produk' => $request->point,
                'id_kategori' => $request->id_kategori,
                'id_status' => $request->id_status,
                'harga' => $request->harga,
                'status' => $request->status,
            ];

            if(!empty($request->poster)){
                $datas = UploadFile::file($request,'poster','asset/img/produk/kelas',$datas);
            }
            
            //dd($datas);

            $data = Kelas::updateOrCreate(['id'=>$request->id],$datas);


            //Update data pada produk
            $produk = Produk::where([
                'id_kategori' => 1,
                'id_produk' => $data->id
            ])->first();

            $produk->nama = $request->judul;
            $produk->harga = $request->harga;
            $produk->save();

            return redirect()->back();
        }

        public function delete(Request $request){
            $data = Kelas::find($request->id);
            $data->delete();

            return response()->json([
                'message' => 'sukses',
                'data' => 'sukses menghapus',
                'code' => 200
            ]);
        }
    //End Kelas


    //CV Checker
        public function cvCheckerIndex(Request $request){
            if ($request->ajax()) {
                $data = CVCheckerEnroll::latest()->get();
                return datatables()->of($data)
                    ->addIndexColumn()
                    ->addColumn('nama', function($row){
                        $datas = '
                            <p>'. $row->user->nama .'</p>
                        ';
                        return $datas;
                    })
                    ->addColumn('tanggal', function($row){
                        $datas = '
                            <p>'. date_format(date_create($row->created_at),"d M Y") .'</p>
                        ';
                        return $datas;
                    })
                    ->addColumn('keterangan', function($row){
                        $datas = '
                            <p class="d-inline-block text-truncate" style="max-width: 400px;">'. $row->keterangan_user.'</p>
                        ';
                        return $datas;
                    })
                    ->addColumn('status', function($row){
                        switch ($row->status){
                            case 0:
                                $datas = '
                                    <span class="badge badge-danger">User belum upload</span>
                                ';
                                break;
                            case 1:
                                $datas = '
                                    <span class="badge badge-warning">Menunggu</span>
                                ';
                                break;
                            case 2:
                                $datas = '
                                    <span class="badge badge-success">Direview</span>
                                ';
                                break;
                        }

                        return $datas;
                    })
                    ->addColumn('status_bayar', function($row){
                        switch ($row->transaksi->status){
                            case 'pending':
                                $datas = '
                                    <span class="badge badge-danger">Belum bayar</span>
                                ';
                                break;
                            case 'lunas':
                                $datas = '
                                    <span class="badge badge-success">Lunas</span>
                                ';
                                break;
                        }

                        return $datas;
                    })
                    ->addColumn('action', function($row){
                        $actionBtn = '
                        <div class="">
                            <a href="'.route('cvCheckerDetail',$row['id']).'" class="edit btn btn-secondary btn-sm"><i class="fas fa-search mr-1"></i>Review</a> 
                        </div>
                        ';
                        return $actionBtn;
                    })
                    ->rawColumns(['action','nama','tanggal','keterangan','status','status_bayar'])
                    ->make(true);
            }

            return view('pages.admin.produk.cv_checker.checker');
        }
        
        public function cvCheckerDetail($id){
            $data = CVCheckerEnroll::find($id);

            return view('pages.admin.produk.cv_checker.checker_review',compact('data'));
        }

        public function cvCheckerSave(Request $request){
            $validator = Validator::make($request->all(), [
                'bukti' => 'file|mimes:jpeg,png,jpg,pdf|max:2048',
            ]);

            if ($validator->fails()) {
                dd($validator->messages()->first()); 
                return redirect()->back();
            }

            $datas = [
                'review_expert' => $request->review_expert,
                'status' => 2
            ];

            if(!empty($request->bukti)){
                $datas = UploadFile::file($request,'cv_review','asset/file/cv_review/expert',$datas);
            }

            $data = CVCheckerEnroll::updateOrCreate(['id'=>$request->id],$datas);
        
            return redirect()->route('cvCheckerIndex');
        }
    //end cv checker


    //TEMPLATE
        public function template(Request $request){
            $data = Template::latest()->get();

            return view('pages.admin.produk.template.template',compact('data'));
        }

        public function templateAdd(Request $request){
            return view('pages.admin.produk.template.template_add');
        }

        public function templateEdit($id){
            $data = Template::find($id);
            $id_produk = $data->produk->id;
            return view('pages.admin.produk.template.template_edit',compact('data','id_produk'));
        }

        public function templateCreate(Request $request){

            $validator = Validator::make($request->all(), [
                'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back();
                dd($validator->messages()->first()); 
            }

            $datas = [
                'judul' => $request->judul,
                'harga' => str_replace(",", "", $request->harga),
                'desc' => $request->desc,
                'status' => $request->status,
            ];

            if(!empty($request->poster)){
                $datas = UploadFile::file($request,'poster','asset/img/produk/template',$datas);
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
                'harga' => str_replace(",", "", $request->harga),
                'id_kategori' => 7,
                'id_produk' => $data->id,
            ]);

            return redirect()->route('templateAdmin');
        }

        public function templateDelete($id){
            $data = Template::find($id);
            $produk = Produk::find($data->produk->id);

            $produk->delete();
            $data->delete();

            return redirect()->back();
        }

    //END TEMPLATE

}

