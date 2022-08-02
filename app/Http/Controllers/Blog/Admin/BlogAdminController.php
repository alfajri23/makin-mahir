<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogAdminController extends Controller
{
    public function admin(Request $request){ 
        if ($request->ajax()) {
            $data = Blog::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('tanggal', function($row){
                $nama = '
                <p>'.date_format(date_create($row->updated_at),"d M Y").'</p>
                ';
                return $nama;
            })
            ->addColumn('kategori', function($row){
                $nama = '
                <p>'.$row->kategori.'</p>
                ';
                return $nama;
            })
            ->addColumn('aksi', function($row){
                $actionBtn = '
                <div class="">
                    <a href="'.route('blogDetail',['id' => $row['id'], 'link' => $row['link'] ]).'" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>
                    <a href="'.route('blogEdit',['id' => $row['id']]).'" class="btn btn-success btn-sm"><i class="fa-solid fa-pencil"></i></a>
                    <a onclick="unpublish('.$row['id'].')" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-eye-slash"></i></a>
                </div>
                ';
                return $actionBtn;
            })
            ->rawColumns(['aksi','tanggal','kategori'])
            ->make(true);
        }

        $kat = BlogKategori::all();

        return view('pages.admin.blog.blog_all',compact('kat'));
    }

    public function admin_unpublish(Request $request){
        if ($request->ajax()) {
            $data = Blog::onlyTrashed()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('tanggal', function($row){
                $nama = '
                <p>'.date_format(date_create($row->updated_at),"d M Y").'</p>
                ';
                return $nama;
            })
            ->addColumn('aksi', function($row){
                $actionBtn = '
                <div class="">
                    <a onclick="deletes('.$row['id'].')" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></i></a>
                    <a onclick="publish('.$row['id'].')" class="delete btn btn-success btn-sm"><i class="fa-solid fa-eye-slash"></i></a>
                </div>
                ';
                return $actionBtn;
            })
            ->rawColumns(['aksi','tanggal'])
            ->make(true);
        }

        return view('pages.admin.blog.blog_unpublish');
    }

    public function createBlog(Request $request){
        $this->validate($request, [
			'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
		]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
       
        if(empty($request->file)){
            $foto = Blog::find($request->id);
            $files = $foto->gambar;
        }else{ //! Nanti lewat helper aja
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload_server = public_path('storage/blog'); //untuk dihosting
            $tujuan_upload = 'storage/blog';                     //untuk local
            $files = $tujuan_upload . '/'. $nama_file;
            $file->move($tujuan_upload_server,$nama_file);

            $foto = Blog::find($request->id);
            if(isset($foto)){
                File::delete(public_path($foto->gambar));
            }
        }

        //Kategori ditambah manually uploaded
        $kat = BlogKategori::find($request->id_kategori);

        Blog::updateOrCreate(['id' => $request->id],[
            'judul' => $request->judul,
            'link' => $request->link,
            'penulis' => $request->penulis,
            'isi' => $request->isi,
            'tag' => $request->tag,
            'id_kategori' => $request->id_kategori,
            'kategori' => $kat->nama,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_desc,
            'video' => $request->video,
            'gambar' => $files
        ]);

        return redirect()->route('blogAdmin');
    }

    public function pageAdd(){
        $data = BlogKategori::all();
        return view('pages.admin.blog.blog_add',compact('data'));
    }

    public function editBlog(Request $request){
        $data = Blog::find($request->id);
        $kat = BlogKategori::all();
        return view('pages.admin.blog.blog_edit',compact('data','kat'));
    }

    public function unpublish(Request $request){
        $data = Blog::find($request->id);
        $data->delete();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function publish(Request $request){
        $data = Blog::onlyTrashed()->find($request->id);
        $data->restore();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function delete(Request $request){
        $data = Blog::onlyTrashed()->find($request->id);
        //File::delete($data->gambar);
        File::delete(public_path($data->gambar));
        $data->forceDelete();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function setting_kat(){
        $data = BlogKategori::all();
        return view('pages.admin.blog.setting_kategori',compact('data'));
    }

    public function saveKat(Request $request){
        BlogKategori::updateOrCreate(['id' => $request->id],[
            'nama' => $request->nama,
        ]);

        return redirect()->back();
    }

    public function delKat($id){
        BlogKategori::find($id)->delete();

        return redirect()->back();
    }
}
