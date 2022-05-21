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
use App\Models\KonsultasiExpert;

class PublicController extends Controller
{
    public function index(){
        $kelas = Kelas::limit(6)->get();
        $event = ProdukEvent::limit(3)->get(); 
        $blog = Blog::limit(6)->get();
        $konsuls = KonsultasiExpert::limit(4)->get();

        //dd($event);

        return view('pages.public.home',compact('kelas','blog','event','konsuls'));
    }

    public function produk_detail_konsul(Request $request){         //! JSON Ajax
        $data = KonsultasiExpert::find($request->id);
        return response()->json([
            'data' => $data,
            'message' => 'sukses'
        ]);
    }

    public function produk_detail_video($id){
        $data = ProdukVideo::find($id);
        return view('pages.public.produk_detail',compact('data'));
    }

    //!Sementara ini tidak terpakai
    public function produk_list_konsul(Request $request){
       
        $data = KonsultasiTipe::all();
        $meta_title = "Konsultasi Makin Mahir | MakinMahir.id";
        $layout = Layout::layout_check();

        return view('pages.produk.konsultasi.konsultasi_list',compact('data','layout','meta_title'));
    }

    //* Unutk sementara konsultasi ditampilkan semua tidak pertipe 
    //public function produk_list_detail_konsul($id,Request $request){  
    public function produk_list_detail_konsul(Request $request){  
        if($request->search != null){
            $data = KonsultasiExpert::where('nama','like','%'.$request->search.'%')->get();

        }else{
            //$data = KonsultasiExpert::where('id_konsultasi',$id)->get();
            $data = KonsultasiExpert::latest()->get();
        }

        $layout = Layout::layout_check();

        $meta_title = "Konsultasi Makin Mahir | MakinMahir.id";
        $tipe = 'konsultasi';
        $route = 'produkListKonsul';
        return view('pages.produk.konsultasi.konsultasi_list_detail',compact('data','tipe','meta_title',
                                                                            'route','layout'));
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
            $data = Kelas::all();
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
        $data = Template::latest()->get();
        $tipe = 'Bundling';
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
