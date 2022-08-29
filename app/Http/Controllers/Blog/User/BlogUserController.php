<?php

namespace App\Http\Controllers\Blog\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\KomentarBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogUserController extends Controller
{
    public function index(Request $request){

        $popular = Blog::limit(3)->orderBy('kunjungan','desc')->get();
        $latest = Blog::limit(3)->latest()->get();

        if($request->key != null){
            $data = Blog::where('judul','like','%'.$request->key.'%')->paginate(6);
        }else{
            $data = Blog::latest()->paginate(6);
        }

        $lastPage = $data->lastPage();

       
        $layout = 'layouts.public';

        $currentPage = 0;

        $nextUrl = 2;
        $prevUrl = 0;
        return view('pages.public.blog.blog',compact('data','prevUrl', 'nextUrl',
                                                    'layout','popular','latest',
                                                    'lastPage','currentPage'));   
    }

    public function pagination($id){
        
        $paginate = 6;

        $skip = ($id*$paginate)-$paginate;
        $prevUrl = $nextUrl = '';
        if($skip>0){
            $prevUrl = $id - 1;
        }
        $data = Blog::orderBy('id', 'desc')->skip($skip)->take($paginate)->get();

        $popular = Blog::limit(3)->orderBy('kunjungan','desc')->get();
        $latest = Blog::limit(3)->latest()->get();
        $layout = '';

        $lastPage = Blog::latest()->paginate(6);
        $lastPage = $lastPage->lastPage();

        $currentPage = $id;

        if (Auth::check()) {
            $layout = 'layouts.member';
            
        }else{
            $layout = 'layouts.public';
        }

        if($data->count()>0){
            if($data->count()>=$paginate){
                $nextUrl = $id + 1;
            }
            return view('pages.public.blog.blog', compact('data','currentPage','prevUrl',
                                                         'nextUrl','layout','popular',
                                                         'latest','lastPage'));
        }

        return redirect()->route('blog');

    }

    public function cek_url($slug,$slug_1 = null){
        if(is_numeric($slug)){
            return $this->detail($slug,$slug_1);
        }else if($slug == 'page'){
            //dd("hallo");
            return $this->pagination($slug_1);
            //return redirect()->route('blogPagination',$slug_1);
        }
        else{
            return redirect('blog');
        }
    }

    public function detail($id,$link){
        $datas = Blog::limit(6)->get();
        $data = Blog::find($id);
        $komentar = null;
        
        if($data != null){
            $data->pengunjung = empty($data->pengunjung) ? 1 : $data->pengunjung+1;
            $data->save();
            $komentar = KomentarBlog::where('id_blog',$data->id)->get();

            if($data->link != $link){
                return redirect()->route('blogDetail',['id' => $id, 'link' =>$data->link]);
            }
        }

        $layout = '';

        if (Auth::check()) {
            $layout = 'layouts.member';
        }else if(Auth::guard('admin')->check()) {
            $layout = 'layouts.admin';
        }else{
            $layout = 'layouts.public';
        }

        return view('pages.public.blog.blog_detail',compact('data','layout','datas','komentar'));
    }

    public function by_categori(){
        $data = Blog::all();
        $data = collect($data);
        $data = $data->groupBy('kategori');

        if (Auth::check()) {
            $layout = 'layouts.member';
            
        }else{
            $layout = 'layouts.public';
        }

        return view('pages.public.blog.blog_kategori',compact('data','layout'));
    }

    public function create(Request $request){
        KomentarBlog::create([
            'id_user' => auth()->user()->id,
            'id_blog' => $request->id_blog,
            'tanggal' => now()->format('Y-m-d'),
            'waktu' => date('H:i:s'),
            'isi' => $request->komentar
        ]);

        return redirect()->back();
    }

}
