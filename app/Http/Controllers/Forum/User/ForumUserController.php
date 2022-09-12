<?php

namespace App\Http\Controllers\Forum\User;

use App\Helper\Layout;
use App\Http\Controllers\Controller;
use App\Models\ForumJawaban;
use App\Models\ForumKategori;
use App\Models\ForumPertanyaaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ForumUserController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only(['create','komentar','deleteKomentar','createKategori']);
    }

    public function index(Request $request){

        $data = ForumPertanyaaan::query()
        ->when(request('cari') != null, function ($q){ 
            return $q = ForumPertanyaaan::where('judul','like','%'.request('cari').'%');
        })
        ->when(request('kategori') != null, function ($q){ 
            $id = ForumKategori::where('nama','like','%'.request('kategori').'%')->get();
            return $q = ForumPertanyaaan::whereIn('id_kategori',$id);
        })
        ->when(request('kategori') == null && request('cari') == null, function ($q){ 
            return $q = ForumPertanyaaan::latest();
        })->get();


        $kategori = ForumKategori::all();
        $layout = Layout::layout_check();

        return view('pages.forum.forum',compact('data','layout','kategori'));

    }

    public function create(Request $request){
        $this->validate($request, [
			'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'id_kategori' => 'required'
		]);

        $datas = [
            'id_user' => auth()->user()->id,
            'isi' => $request->isi,
            'judul' => $request->judul,
            'id_kategori' => $request->id_kategori,
        ];

        if(!empty($request->gambar)){
            $gambar = $request->file('gambar');
            $nama_file = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload_server = public_path('storage/forum');
            $tujuan_upload = 'storage/forum';
            $files = $tujuan_upload . '/'. $nama_file;
            $gambar->move($tujuan_upload_server,$nama_file);
            $datas['gambar'] = $files;
        }

        $data = ForumPertanyaaan::updateOrCreate(['id'=>$request->id],$datas);

        return redirect()->back();
    }

    public function delete(Request $request){
        $data = ForumPertanyaaan::find($request->id);
        File::delete(public_path($data->gambar));
        $data->delete();
        return redirect()->back();
    }

    public function detail($id){
        $dt = ForumPertanyaaan::find($id);
        $dt->lihat++;
        $dt->save();

        $kategori = ForumKategori::all();
        $layout = Layout::layout_check();
        $komentar = ForumJawaban::where('id_pertanyaan', $id)->latest()->get();
        return view('pages.forum.detail_forum',compact('dt','layout','komentar','kategori'));
    }

    public function komentar(Request $request){  
        $data = ForumJawaban::updateOrCreate(['id'=>$request->id],[
            'id_pertanyaan' => $request->id_pertanyaan,
            'jawaban' => $request->jawaban,
            'id_user' => isset(auth()->user()->id) ? auth()->user()->id : 23,
        ]);

        return redirect()->back();
    }

    public function deleteKomentar(Request $request){
        $data = ForumJawaban::find($request->id);
        $data->delete();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function like(Request $request){
        $data = ForumPertanyaaan::find($request->id);
        $data->likes++; 
        
        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function show(Request $request){
        $data = ForumPertanyaaan::find($request->id);

        return response()->json([
            'data' => $data
        ]);
    } 

    public function createKategori(Request $request){

        $cek = ForumKategori::where('nama',$request->nama)->get();
        if(count($cek) > 0){
            return response()->json([
                'data' => 'gagal',
                'pesan' => $request->nama
            ]);
        }else{
            $data = ForumKategori::updateOrCreate(['id' => $request->id],[
                'nama' => $request->nama,
            ]);
    
            return response()->json([
                'data' => 'sukses',
                'pesan' => 'sukses'
            ]);
        }
    }
}
