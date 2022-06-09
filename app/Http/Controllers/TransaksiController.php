<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\FormSetting;
use App\Models\Transaksi;
use App\Helper\UploadFile;
use App\Models\CVCheckerEnroll;
use App\Models\EbookEnroll;
use App\Models\EventEnroll;
use App\Models\KelasEnroll;
use App\Models\KonsultasiEnroll;
use App\Models\ProdukEvent;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function cekForm(Request $request){
        $data = Produk::find($request->id);
        $ceks = FormSetting::where('id_produk_kategori',$data->id_kategori)->first(); //Cek apakah ada pertanyaan
        if($ceks != null){
            $pertanyaans = explode(",",$ceks->pertanyaan);
            $tipes = explode(",",$ceks->tipe);
            $files = explode(",",$ceks->file);
            $required = explode(",",$ceks->required);

            if($data->id_kategori == 2){                    // Jika beduk
                return view('pages.pembayaran.pembayaran_beduk',compact('tipes','pertanyaans','data','files','required'));
            }

            return view('pages.member.daftar',compact('tipes','pertanyaans','data','files','required'));

        }elseif($data->harga == null){
            if($data->id_kategori == 5){                                            //ebook
                $enroll = EbookEnroll::create([
                    'id_user' => $request->session()->get('auth.id_user'),
                    'id_ebook' => $data->id_produk,
                    'id_expert' => $data->ebook->id_expert
                ]);
            }
            return redirect()->route('memberEbook');
        }elseif($data->id_kategori == 6){
            return view('pages.pembayaran.pembayaran_cvchecker',compact('data'));
        }else{

            return view('pages.pembayaran.pembayaran_bukti',compact('data'));
        }

    }

    public function create(Request $request){
        $buktis = $request->bukti;

        //dd($request->bukti);

        for($i=0;$i<count($request->bukti);$i++){
            $rules['bukti.' . $i] = 'file|mimes:jpeg,png,jpg,pdf|max:5120';
        }
        $rules['telepon'] = 'required|string|min:9';

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            dd($validator->messages()->first()); 
            return redirect()->back();
        }

        $jawaban = $request->jawaban != null ? implode(",",$request->jawaban) : '';

        $datas = [
            'id_produk' => $request->id_produk,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'status' => 'pending',
            'id_user' => $request->session()->get('auth.id_user'),
            'tanggal_bayar' => now(),
            'jawaban' => $jawaban,
            'telepon' => $request->telepon,
            'file_tambahan' => null
        ];

        $filed = [];

        if(!empty($request->bukti)){    
            foreach($request->bukti as $key => $file){
                if ($key == array_key_first($request->bukti)) {
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload_server = public_path('storage/transaksi');
                    $tujuan_upload = 'storage/transaksi';
                    $files = $tujuan_upload . '/'. $nama_file;
                    $file->move($tujuan_upload_server,$nama_file);
                    $datas['bukti'] = $files;
                }else{
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload_server = public_path('storage/file_tambahan');
                    $tujuan_upload = 'storage/file_tambahan';
                    $files = $tujuan_upload . '/'. $nama_file;
                    $file->move($tujuan_upload_server,$nama_file);
                    $filed[] = $files;
                }
            }

            $file_name = implode(",",$filed);

            $datas['file_tambahan'] = $file_name;
        }


        // if(!empty($request->bukti)){
        //     $datas = UploadFile::file($request,'bukti','storage/transaksi',$datas);
        // }

        $data = Transaksi::updateOrCreate(['id'=>$request->id],$datas);
    
        return redirect()->route('transferIndex');
    }


    public function pembayaranCvChecker(Request $request){
        $validator = Validator::make($request->all(), [
            'bukti' => 'file|mimes:jpeg,png,jpg,pdf|max:5120',
            'cv_user' => 'file|mimes:jpeg,png,jpg,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            dd($validator->messages()->first()); 
            return redirect()->back();
        }

        $datas = [
            'id_produk' => $request->id_produk,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'status' => 'pending',
            'id_user' => $request->session()->get('auth.id_user'),
            'tanggal_bayar' => now(),
            'telepon' => $request->telepon
        ];

        $datas = UploadFile::file($request,'bukti','storage/transaksi',$datas);
        $data_transaksi = Transaksi::updateOrCreate(['id'=>$request->id],$datas);

        $data_cv = [
            'id_user' => $request->session()->get('auth.id_user'),
            'keterangan_user' => $request->pesan,
            'status' => 1,
            'id_transaksi' => $data_transaksi->id
        ];

        $data_cv = UploadFile::file($request,'cv_user','storage/cv_review/member',$data_cv);
        $datas_cv = CVCheckerEnroll::create($data_cv);

        return redirect()->route('memberChecker');

    }

    public function pembayaranBeduk(Request $request){
        $buktis = $request->bukti;

        for($i=0;$i<count($request->bukti);$i++){
            $rules['bukti.' . $i] = 'file|mimes:jpeg,png,jpg,pdf|max:5120';
        }

        $rules['telepon'] = 'required|string|min:9';

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            dd($validator->messages()->first()); 
            return redirect()->back();
        }

        $jawaban = $request->jawaban != null ? implode(",",$request->jawaban) : '';

        $datas = [
            'id_produk' => $request->id_produk,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'status' => 'pending',
            'id_user' => $request->session()->get('auth.id_user'),
            'tanggal_bayar' => now(),
            'jawaban' => $jawaban,
            'telepon' => $request->telepon
        ];

        $filed = [];

        if(!empty($request->bukti)){    
            foreach($request->bukti as $key => $file){
                if ($key === array_key_first($request->bukti)) {
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload_server = public_path('storage/transaksi');
                    $tujuan_upload = 'storage/transaksi';
                    $files = $tujuan_upload . '/'. $nama_file;
                    $file->move($tujuan_upload_server,$nama_file);
                    $datas['bukti'] = $files;
                }else{
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload_server = public_path('storage/beduk');
                    $tujuan_upload = 'storage/beduk';
                    $files = $tujuan_upload . '/'. $nama_file;
                    $file->move($tujuan_upload_server,$nama_file);
                    $filed[] = $files;
                }

            }

            $file_name = implode(",",$filed);

            $datas['file_tambahan'] = $file_name;
        }

        $data_transaksi = Transaksi::create($datas);

        $produk = ProdukEvent::find($request->id_produk);

        return redirect()->route('transferIndex')->with(['grup' => $produk->grup_wa]);;

    }

}
