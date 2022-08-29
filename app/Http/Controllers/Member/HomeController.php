<?php

namespace App\Http\Controllers\Member;

use App\Helper\Layout;
use App\Http\Controllers\Controller;
use App\Models\CVCheckerEnroll;
use App\Models\Ebook;
use App\Models\Template;
use App\Models\EbookEnroll;
use App\Models\EventEnroll;
use Illuminate\Http\Request;
use App\Models\ProdukVideo;
use App\Models\ProdukKonsul;
use App\Models\ProdukEvent;
use App\Models\RiwayatEvent;
use App\Models\PendaftaranVideo;
use App\Models\PendaftaranBeduk;
use App\Models\PendaftaranKonsultasi;
use App\Models\PendaftaranWebinar;
use App\Models\SubProdukVideo;
use App\Models\User;
use App\Models\Kelas;
use App\Models\KelasBab;
use App\Models\KelasMateri;
use App\Models\KelasEnroll;
use App\Models\KelasJawaban;
use App\Models\KelasUjian;
use App\Models\KonsultasiEnroll;


use App\Models\Produk;
use App\Models\TemplateEnroll;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(Request $request){

        if($request->session()->get('auth.id_user') == null){
            $request->session()->put('auth.id_user', Cookie::get('id_user'));
        }

        $data = ProdukVideo::limit(6)->get(); 
        $tipe = 'video';
        $title = 'Event';
        //$data = ProdukVideo::limit(6)->get(); 
        return view('pages.member.home',compact('data','tipe','title'));
    }

    public function produk_list(){
        $konsul = ProdukKonsul::all();
        $video = ProdukVideo::all();
        $webinar = ProdukEvent::where('tipe','webinar')->get();
        $beduk = ProdukEvent::where('tipe','beduk')->get();
        
        return view('pages.member.list_produk',compact('konsul','video','webinar','beduk'));
    }

    //Untuk detail belum beli
    public function produk_detail($link){

        //$produk = Produk::find($link);
        //$produk = Produk::find($link);
        $produk = Produk::where([
            'link' => $link,
        ])->first();

        $layout = Layout::layout_check();

        switch ($produk->kategori->nama){
            case "kelas" :
                $data = Kelas::find($produk->id_produk);
                $rekomen = Kelas::where('status',1)->limit(6)->latest()->get();
                $babs = KelasBab::where('id_kelas',$produk->id_produk)->get();

                return view('pages.kelas.user.kelas_detail',compact('data','layout',
                                                                        'babs','rekomen'));
                break;

            case "konsultasi" :
                $data = ProdukKonsul::find($produk->id_produk);
                $rekomen = ProdukKonsul::where('status',1)->limit(6)->latest()->get();

                return view('pages.konsultasi.user.konsultasi_detail',compact('data','layout',
                                                                        'rekomen'));
                break;  
                
            case "template" :
                $data = Template::find($produk->id_produk);

                return view('pages.template.user.template_detail',compact('data','layout'));
                break;  

            default :
                $data = ProdukEvent::find($produk->id_produk);
                $rekomen = ProdukEvent::where('status',1)->limit(6)->latest()->get();

                return view('pages.event.user.event_detail',compact('data','layout','rekomen'));
                
        }; 

        return view('pages.member.produk_detail',compact('data','layout','rekomen','tipe'));
    }

    //Mengecek produk terdapat bundling atau tidak
    //mengembalikan array
    //jika tidak ada, harus diambil array pertamanya nya
    // public function cek_produk_bundling($produk,$model){
    //     $idsProduk = explode(",",$produk->id_produk);
    //     return $data = count($idsProduk) > 1 ? $model::whereIn('id',$idsProduk)->get() : $model::where('id',$produk->id_produk)->get();
    // }

    public function produk_detail_enroll($link,Request $request){
        //$produk = Produk::find($id);
        $produk = Produk::where([
            'link' => $link,
        ])->first();

        switch ($produk->kategori->nama){
            case "webinar" :
                $cek = EventEnroll::where([
                    'id_user' => $request->session()->get('auth.id_user'),
                    'id_event' => $produk->id_produk
                ])->get();

                //jika sudah daftar
                if(count($cek) != 0){
                    $data = ProdukEvent::find($produk->id_produk);
                    return view('pages.member.produk.event.detail_event',compact('data'));
                }else{
                    return redirect()->route('memberProdukDetail',$link);
                }

                break;

            case "beduk" :
                $cek = EventEnroll::where([
                    'id_user' => $request->session()->get('auth.id_user'),
                    'id_event' => $produk->id_produk
                ])->get();

                //jika sudah daftar
                if(count($cek) != 0){
                    $data = ProdukEvent::find($produk->id_produk);
                    return view('pages.member.produk.event.detail_event',compact('data'));
                }else{
                    return redirect()->route('memberProdukDetail',$link);
                }

                break;

            case "kelas" :
                $cek = KelasEnroll::where([
                    'id_user' => $request->session()->get('auth.id_user'),
                    'id_kelas' => $produk->id_produk
                ])->get();
                
                if(count($cek) != 0){
                    $data = Kelas::find($produk->id_produk);
                    $babs = KelasBab::where('id_kelas',$data->id)->get();
                    $ujian = KelasUjian::where('id_kelas',$data->id)->first();

                    //hasil test
                    $hasilTest = KelasJawaban::where([
                        'id_user' => $request->session()->get('auth.id_user'),
                        'id_ujian' => $ujian->id,
                        'benar' => '1'
                    ])->get();

                    if(count($hasilTest) > 0){
                        $nilai = round(count($hasilTest)/$ujian->soal * 100);
                    }else{
                        $nilai = null;
                    }
                   

                    $request->session()->put('test', 0 );
                    return view('pages.member.produk.kelas.detail_kelas',compact('data','babs','ujian','nilai'));
                }else{
                    return redirect()->route('memberProdukDetail',$link);
                }

                
                break;

            case "konsultasi" :
                $data = ProdukKonsul::find($produk->id_produk);

                return view('pages.member.produk.konsultasi.detail_konsultasi',compact('data'));
                return view('pages.produk.konsultasi.konsultasi_detail',compact('data','layout'));
                break;   
                
            case "template" :
                $cek = TemplateEnroll::where([
                    'id_user' => $request->session()->get('auth.id_user'),
                    'id_template' => $produk->id_produk
                ])->get();

                //jika sudah daftar
                if(count($cek) != 0){
                    $data = Template::find($produk->id_produk);
                    return view('pages.member.produk.template.detail_template',compact('data'));
                }else{
                    return redirect()->route('memberProdukDetail',$link);
                }

                break;

            default :
                $cek = EventEnroll::where([
                    'id_user' => $request->session()->get('auth.id_user'),
                    'id_event' => $produk->id_produk
                ])->get();

                //jika sudah daftar
                if(count($cek) != 0){
                    $data = ProdukEvent::find($produk->id_produk);
                    return view('pages.member.produk.event.detail_event',compact('data'));
                }else{
                    return redirect()->route('memberProdukDetail',$link);
                }

        };
    }

    public function detail_kelas_materi($id,$ids){ //id => id kelas, ids = id materi

        $babs = KelasBab::where('id_kelas',$id)->get();
        $data = KelasMateri::where([
            'id_kelas' => $id,
            'id_bab' => $ids
        ])->first();

        return view('pages.member.produk.kelas.materi_kelas',compact('data','babs'));
    }

    //* ENROOLL

    public function riwayat_event(){
        $id = EventEnroll::where([
            'id_user' => auth()->user()->id,
        ])->pluck('id_event');

        $data = ProdukEvent::whereIn('id',$id)->get();
     
        return view('pages.member.riwayat_event',compact('data'));
    }


    // public function kelas_saya(){
    //     $id = KelasEnroll::where([
    //         'id_user' => auth()->user()->id,
    //     ])->pluck('id_kelas');

    //     $data = Kelas::whereIn('id',$id)->get();

    //     return view('pages.member.riwayat.riwayat_kelas',compact('data'));
    // }

    // public function ebook_saya(){
    //     $id = EbookEnroll::where([
    //         'id_user' => auth()->user()->id,
    //     ])->pluck('id_ebook');

    //     $data = Ebook::whereIn('id',$id)->get();

    //     return view('pages.member.riwayat.riwayat_ebook',compact('data'));
    // }

    public function konsultasi_saya(){
        $id = KonsultasiEnroll::where([
            'id_user' => auth()->user()->id,
        ])->pluck('id_konsultasi');

        $data = ProdukKonsul::whereIn('id',$id)->get();

        return view('pages.member.riwayat.riwayat_konsultasi',compact('data'));
    }

    public function template_saya(){
        $id = TemplateEnroll::where([
            'id_user' => auth()->user()->id,
        ])->pluck('id_template');

        $data = Template::whereIn('id',$id)->get();

        return view('pages.member.riwayat.riwayat_template',compact('data'));
    }

    // public function detail_kelas(Request $request){

    //     $cek = PendaftaranVideo::where([
    //         'id_user' => auth()->user()->id,
    //         'status_bayar' => 'lunas',
    //         'id_produk' => $request->id
    //     ])->pluck('id');

    //     if(count($cek) == 0){
    //         return redirect()->route('memberProdukDetail',['tipe'=>'video', 'id'=>$request->id]);
    //     }else{
    //         $data = ProdukVideo::find($request->id);
    //         $tipe = 'kelas';

    //         $subs = SubProdukVideo::where('id_produk', $request->id)->get();
    //         //dd($subs);
    //         return view('pages.member.produk_detail_member',compact('data','subs'));
    //     }
    // }

    // public function detail_sub_kelas($id,$sub){
    //     $cek = PendaftaranVideo::where([
    //         'id_user' => auth()->user()->id,
    //         'status_bayar' => 'lunas',
    //         'id_produk' => $id
    //     ])->pluck('id');

    //     if(count($cek) == 0){
    //         return redirect()->route('memberProdukDetail',['tipe'=>'video', 'id'=>$id]);
    //     }else{
    //         $data = SubProdukVideo::find($sub);
    //         $datas = SubProdukVideo::where('id_produk', $id)->get();

    //         return view('pages.member.produk_detail_sub_video',compact('data','datas'));
    //     }
    // }



    public function profile(){
        $user = User::find(auth()->user()->id);
        return view('pages.member.profile',compact('user'));
    }
}
