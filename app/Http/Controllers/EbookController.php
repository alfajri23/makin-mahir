<?php

namespace App\Http\Controllers;
use App\Models\Ebook;
use App\Models\EbookEnroll;
use App\Models\Expert;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class EbookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['download_auth']);
        $this->middleware('admin')->only(['admin']);
    }

    public function index(Request $request){
        if($request->search != null){
            $data = Ebook::where('judul','like','%'.$request->search.'%')->get();
           
        }else{
            $data = Ebook::where('status',1)
            ->get();

        }

        $layout = '';

        if (Auth::check()) {
            $layout = 'layouts.member';
            
        }else{
            $layout = 'layouts.public';
        }

        return view('pages.public.ebook.ebook',compact('data','layout'));

    }

    public function detail(Request $request){
        $datas = Ebook::limit(6)->where('status',1)
        ->get();

        $data = Ebook::where([
            'judul' => $request->judul,
            'status' => 1
        ])->first();
        
        if($data == null) {
            dd("kososng");
        }
        
        $layout = '';

        if (Auth::check()) {
            $layout = 'layouts.member';
            
        }else{
            $layout = 'layouts.public';
        }

        return view('pages.public.ebook.ebook_detail',compact('data','layout','datas'));
    }

    public function download_auth(Request $request){
        $cek = EbookEnroll::where([
            'id_user' => auth()->user()->id,
        ])->get();

        if(count($cek) <= 0){
            return redirect()->route('ebookDetail',['judul' => $request->judul ]);
        }

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        $data = Ebook::where('judul',$request->judul)->first();

        $file = explode("/", $data->link);
        $file = end($file);

        return response()->download(public_path().'/'.$data->link, $file, $headers);
        
    }

    //*Admin

    public function admin(Request $request){
        if ($request->ajax()) {
            $data = Ebook::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('gambar', function($row){
                $image = asset($row['gambar']);
                $images = '<img src="'.$image.'" style="width:100px">';
                return $images;
            })
            ->addColumn('aksi', function($row){
                $actionBtn = '
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a onclick="detail('.$row['id'].')" class="btn btn-secondary btn-sm">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </a>
                        <a href="'.route('ebookEdit',['id' => $row['id']]).'" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a href="'.route('ebookDelete',$row['id']).'" class="btn btn-danger btn-sm">
                        <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                ';
                return $actionBtn;
            })
            ->rawColumns(['gambar','aksi'])
            ->make(true);
        
        };

        return view('pages.admin.produk.ebook.ebook');
    }

    public function pageAdd(){
        $pemateri = Expert::latest()->get();
        return view('pages.admin.produk.ebook.ebook_add',compact('pemateri'));
    }

    public function pageEdit(Request $request){
        $data = Ebook::find($request->id);
        $pemateri = Expert::latest()->get();
        return view('pages.admin.produk.ebook.ebook_edit',compact('data','pemateri'));
    }

    public function ebookCreate(Request $request){
        
        $validator = Validator::make($request->all(), [
			'file' => 'file|mimes:doc,docx,pdf,pptx,ppt|max:10000',
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
		]);

        if ($validator->fails()) {
            dd($validator->messages()); 
            return redirect()->back();
        }
        

        //file asli
        $files = $request->file('file');
        $gambars = $request->file('gambar');


        //gambar
        if(empty($request->gambar)){
            $gambar = Ebook::find($request->id);
            $gambar = $gambar->gambar;
        }else{
            $nama_file = time()."_".$gambars->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diuploadpublic_path('\img\uploads')
            $tujuan_upload_server = public_path('asset/img/ebook'); //untuk dihosting
            $tujuan_upload = 'asset/img/ebook';                     //untuk local
            $gambar = $tujuan_upload . '/'. $nama_file;
            $gambars->move($tujuan_upload_server,$nama_file);
            //$gambars->move($tujuan_upload,$nama_file);
        }

        //file
        if(empty($request->file)){
            $file = Ebook::find($request->id);
            $file = $file->file;
        }else{
            $nama_file = time()."_".$files->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diuploadpublic_path('\img\uploads')
            $tujuan_upload_server = public_path('storage/ebook'); //untuk dihosting
            $tujuan_upload = 'storage/ebook';                     //untuk local
            $file = $tujuan_upload . '/'. $nama_file;
            $files->move($tujuan_upload_server,$nama_file);
            //$files->move($tujuan_upload,$nama_file);
        }

        $data = Ebook::updateOrCreate(['id'=>$request->id],[
            'judul'=>$request->judul,
            'kategori' => $request->kategori,
            'desc'=>$request->desc,
            'link' => $request->link,
            'gambar'=>$gambar,
            'link' =>$file,
            'harga' => $request->harga != null ? str_replace(",", "", $request->harga) : null,
            'id_expert' => $request->id_expert,
            'status' => $request->status
        ]);

        $produk = Produk::updateOrCreate(['id'=>$request->id_produk],[
            'id_kategori' => 5,
            'id_produk' => $data->id,
            'nama' => $request->judul,
            'harga' => $request->harga != null ? str_replace(",", "", $request->harga) : null,
        ]);

        // Cek untuk redirect sebagai admin atau expert
        if (Auth::guard('admin')->check()){
            return redirect()->route('ebookAdmin');
        }else{
            return redirect()->route('ebookExpert');
        }

        
    }

    public function ebookDelete($id){
        $data = Ebook::find($id);
        File::delete($data->gambar);
        //File::delete(public_path($data->gambar));
        $data->delete();
        return redirect()->back();
    }


    public function adminDetail(Request $request){
        $data = Ebook::find($request->id);

        return response()->json([
            'data' => $data
        ]);
    }

    


}
