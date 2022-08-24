<?php

namespace App\Http\Controllers;

use App\Helper\Layout;
use App\Models\ProdukKonsul;
use Illuminate\Http\Request;
use App\Models\MbtiQuestion;
use App\Models\MbtiResult;
use App\Models\MbtiType;
use App\Models\RiasecQuestion;
use App\Models\RiasecResult;
use App\Models\RiasecType;
use Illuminate\Support\Facades\Auth;
use PDF;

class TestController extends Controller
{
    protected $dataTest;

    public function __construct(){
        $this->middleware('auth')->only(['save_mbti','save_riasec']);
    }

    public function index(){
        $layout = Layout::layout_check();
        return view('pages.public.test_welcome',compact('layout'));
    }

    public function mbti_test(Request $request){
        //cek apakah user auth atau tidak
        $id_user =Auth::check() ? auth()->user()->id : null;

        //ambil data test user sebelumnya
        $cek = MbtiResult::where('id_user',$id_user)->first();

        //jika user login dan ingin mengulang tes
        if($request->filled('ulang')){
            $cek->delete();
            $data = MbtiQuestion::all();
            //$data = MbtiQuestion::limit(5)->get();
            return view('pages.public.mbti.mbti_test',compact('data'));
        }
        
        //cek apakah ada data tes sebelumnya
        if($cek){
            $data = ProdukKonsul::latest()->limit(3)->get();
            $title = 'produk pilihan';
            $tipe = 'konsultasi';

            $layout = Layout::layout_check();
            $datas = MbtiType::where('code',$cek->result)->first();
            $history = $cek;
            //dd($data);
            return view('pages.public.mbti.mbti_result',compact('datas','layout','data','title','tipe','history'));
        }else{
            //* Tes MBTI Baru
            $data = MbtiQuestion::all();
            //$data = MbtiQuestion::limit(5)->get();

            //dd("masuk sini login");

            return view('pages.public.mbti.mbti_test',compact('data'));
        }
    }

    public function mbti_print(){
        $cek = MbtiResult::where('id_user',auth()->user()->id)->first();
        $datas = MbtiType::where('code',$cek->result)->first();
        //dd($datas);

        //return view('pages.public.mbti.mbti_result_pdf',compact('datas'));
        $pdf = PDF::loadview('pages.public.mbti.mbti_result_pdf',['datas'=>$datas]);
        return $pdf->download('laporan-test-mbti'.auth()->user()->nama.'pdf');
    }

    //fungsi untuk cek apakah ada variabel key dari hasil tes atau tidak, jika tidak ada maka diisi 0
    public function cek_exist($char){
        return array_key_exists($char,$this->dataTest) ? $this->dataTest[$char] : 0;
    }

    public function save_mbti(Request $request){

        $this->dataTest = json_decode($request->values, true);
        $data = $this->dataTest;
        
        $result = "";
        $result = $this->cek_exist('I') > $this->cek_exist('E') ? "I" : "E";
        $result .= $this->cek_exist('S') > $this->cek_exist('N') ? "S" : "N";
        $result .= $this->cek_exist('T') > $this->cek_exist('F') ? "T" : "F";
        $result .= $this->cek_exist('J') > $this->cek_exist('P') ? "J" : "P";

        //dd($result);
        if (Auth::check()) {
            MbtiResult::updateOrCreate(['id_user' => auth()->user()->id],[
                'id_user' => auth()->user()->id,
                'I' => $this->cek_exist('I'),
                'E' => $this->cek_exist('E'),
                'T' => $this->cek_exist('T'),
                'I' => $this->cek_exist('I'),
                'F' => $this->cek_exist('F'),
                'S' => $this->cek_exist('S'),
                'N' => $this->cek_exist('N'),
                'J' => $this->cek_exist('J'),
                'P' => $this->cek_exist('P'),
                'result' => $result,
            ]); 
            $layout = 'layouts.member';
        }else{
            $data = ProdukKonsul::latest()->limit(3)->get();
            $title = 'produk pilihan';
            $tipe = 'konsutasi';

            $datas = MbtiType::where('code',$result)->first();
            $layout = 'layouts.public';
            //return view('pages.public.mbti.mbti_result',compact('datas','layout','data','title','tipe'));
        }

        //dd("disini");
        
        return redirect()->route('mbtiTest',compact('data'));
        
    }

    public function riasec_test(Request $request){
        //cek apakah user auth atau tidak
        $id_user =Auth::check() ? auth()->user()->id : null;

        //ambil data test user sebelumnya
        $cek = RiasecResult::where('id_user',$id_user)->first();
        

        if($request->filled('ulang')){
            $cek->delete();
            $data = RiasecQuestion::all();
            //$data = RiasecQuestion::limit(6)->get();

            return view('pages.public.riasec.riasec_test1',compact('data'));
        }
        
        //cek apakah ada data tes sebelumnya
        if($cek){
            $data = ProdukKonsul::where('status',1)->latest()->limit(3)->get();
            $title = 'produk pilihan';
            $tipe = 'konsutasi';

            $layout = Layout::layout_check();
            $ceks = explode(",",$cek->result);
            $datas = RiasecType::whereIn('code',$ceks)->get();

            $history = $cek;
            return view('pages.public.riasec.riasec_result',compact('datas','layout','history','data','title','tipe'));
        }else{
            //* Tes riasec Baru
            $data = RiasecQuestion::all();
            //$data = RiasecQuestion::limit(6)->get();
            return view('pages.public.riasec.riasec_test1',compact('data'));
        }
    }

    public function save_riasec(Request $request){
        $data = $request->hasil;
        $datas = ['r','i','a','s','e','c'];

        $json = json_decode($data);
        $json = json_decode(json_encode($json), TRUE);
        $prior = json_decode($request->prior);
        $prior = json_decode(json_encode($prior), TRUE);

        $hasil = [];
        $hasil2 = [];

        foreach($json as $key => $value){
            $hasil[$datas[$key]] = $value;
        }

        arsort($hasil);

        if(array_slice($hasil, 0, 1, true) == array_slice($hasil, 1, 1, true)){
            if(array_search(array_keys($hasil)[0],$prior) < array_search(array_keys($hasil)[1],$prior) ){
                $first = array_keys($hasil)[0];
                $second = array_keys($hasil)[1];
            }else{
                $first = array_keys($hasil)[1];
                $second = array_keys($hasil)[0];
            }
        }else{
            $first = array_keys($hasil)[1];
            $second = array_keys($hasil)[0];
        }
        
        $result = $first.','.$second;

        if (Auth::check()) {
            RiasecResult::updateOrCreate(['id_user' => auth()->user()->id],[
                'id_user' => auth()->user()->id,
                'R' => $json[0],
                'I' => $json[1],
                'A' => $json[2],
                'S' => $json[3],
                'E' => $json[4],
                'C' => $json[5],
                'result' => $result
            ]);  
        }else{
            $data = ProdukKonsul::latest()->limit(3)->get();
            $title = 'produk pilihan';
            $tipe = 'konsutasi';

            $result = explode(",",$result);
            $datas = RiasecType::whereIn('code',$result)->get();
            $layout = Layout::layout_check();
            return view('pages.public.riasec.riasec_result',compact('datas','layout','data','title','tipe'));
        }

        return redirect()->route('riasecTest');

    }

    public function riasec_print(){
        $cek = RiasecResult::where('id_user',auth()->user()->id)->first();
        $ceks = explode(",",$cek->result);
        $datas = RiasecType::whereIn('code',$ceks)->get();

        $pdf = PDF::loadview('pages.public.riasec.riasec_result_pdf',['datas'=>$datas]);
        return $pdf->download('riasec-resut.pdf');
        
    }
}
