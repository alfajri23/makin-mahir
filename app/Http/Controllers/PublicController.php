<?php

namespace App\Http\Controllers;

use App\Helper\Layout;
use Illuminate\Http\Request;
use App\Models\ProdukKonsul;   //! Nanti Dihapus
use App\Models\ProdukVideo;
use App\Models\ProdukEvent;
use App\Models\Kelas;
use App\Models\Blog;
use App\Models\Template;
use App\Models\KonsultasiTipe;

class PublicController extends Controller
{
    public function index(){
        $kelas = Kelas::limit(6)->get();
        $event = ProdukEvent::limit(3)->get(); 
        $blog = Blog::limit(6)->get();
      
        return view('pages.public.home',compact('kelas','blog','event'));
    }

    // public function produk_detail_konsul(Request $request){         //! JSON Ajax
    //     $data = ProdukKonsul::find($request->id);
    //     return response()->json([
    //         'data' => $data,
    //         'message' => 'sukses'
    //     ]);
    // }

    public function produk_detail_video($id){
        $data = ProdukVideo::find($id);
        return view('pages.public.produk_detail',compact('data'));
    }

    public function produk_list_event(Request $request){
        if($request->search != null){
            $data = ProdukEvent::where('judul','like','%'.$request->search.'%')
            ->where('status',1)
            ->get();

        }else{
            $data = ProdukEvent::where('status',1)
            ->latest()
            ->get();
        }


        $layout = Layout::layout_check();
        $meta_title = "Event Makin Mahir | MakinMahir.id";
        $tipe = 'event';
        $route = 'produkListEvent';
        $riwayat = 'memberEventHistori';
        return view('pages.public.list_produk',compact('riwayat','data',
                                                        'tipe','route',
                                                        'meta_title','layout'));
    }

    public function produk_list_kelas(Request $request){
        if($request->search != null){
            $data = Kelas::where('judul','like','%'.$request->search.'%')->get();

        }else{
            $data = Kelas::where('status',1)
            ->latest()
            ->get();
        }

        $layout = Layout::layout_check();
        $meta_title = "Kelas Makin Mahir | MakinMahir.id";
        $tipe = 'kelas';
        $route = 'produkListKelas';
        $riwayat = 'memberKelas';
        return view('pages.public.list_produk',compact('riwayat','data',
                                                        'tipe','route',
                                                        'meta_title','layout'));
    }

    public function produk_list_template(Request $request){
        if($request->search != null){
            $data = Template::where('judul','like','%'.$request->search.'%')->get();

        }else{
            $data = Template::where('status',1)
            ->latest()
            ->get();
        }

        $tipe = 'template';
        $route = 'produkListTemplate';
        $riwayat = 'memberTemplate';
        $meta_title = "Paket CV Makin Mahir | MakinMahir.id";
        $layout = Layout::layout_check();

        return view('pages.public.list_produk',compact('data','tipe',
                                                        'route','layout',
                                                        'meta_title','riwayat'));

    }

    public function profile(){
        return view('pages.public.about.profile');
    }

    public function term_condition(){
        return view('pages.public.about.term_condition');
    }

    public function privacy(){
        return view('pages.public.about.privacy');
    }

    public function faq(){
        return view('pages.public.about.faq');
    }

    public function goes_sekolah(){
        return view('pages.public.goes-to.sekolah');
    }

    public function goes_campus(){
        return view('pages.public.goes-to.campus');
    }

    
}
