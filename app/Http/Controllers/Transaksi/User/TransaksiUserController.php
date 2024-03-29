<?php

namespace App\Http\Controllers\Transaksi\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\FormSetting;
use App\Helper\UploadFile;
use App\Models\CVCheckerEnroll;
use App\Models\EbookEnroll;
use App\Models\ProdukEvent;
use App\Models\TemplateEnroll;
use Illuminate\Support\Facades\Validator;

class TransaksiUserController extends Controller
{
    public function index(){
        $data = Transaksi::where('id_user',auth()->user()->id)->latest()->get();

        return view('pages.member.transfer.transfer',compact('data'));
    }

    public function detail($id){
        $data = Transaksi::find($id);

        return view('pages.member.transfer.transfer_detail',compact('data'));
    }

    public function cekForm(Request $request){
        $data = Produk::find($request->id);
        $ceks = FormSetting::where('id_produk_kategori',$data->id_kategori)->first(); //! Cek apakah ada pertanyaan
        
        if($ceks != null){
            $pertanyaans = explode(",",$ceks->pertanyaan);
            $tipes = explode(",",$ceks->tipe);
            $files = explode(",",$ceks->file);
            $required = explode(",",$ceks->required);
            $pilihan = explode(",",$ceks->pilihan);

            // if($data->id_kategori == 2){                    // Jika beduk
            //     return view('pages.pembayaran.pembayaran_beduk',compact('tipes','pertanyaans','data',
            //                                                             'files','required','pilihan'));
            // }

            return view('pages.member.daftar',compact('tipes','pertanyaans','data',
                                                        'files','pilihan','required'));

        }elseif($data->harga == null){
            if($data->id_kategori == 5){                                            //ebook
                $enroll = EbookEnroll::create([
                    'id_user' => $request->session()->get('auth.id_user'),
                    'id_ebook' => $data->id_produk,
                    'id_expert' => $data->ebook->id_expert
                ]);
                return redirect()->route('memberEbook');
            }else if($data->id_kategori == 7){
                TemplateEnroll::create([
                    'id_user' => $request->session()->get('auth.id_user'),
                    'id_template' => $data->id_produk,
                ]);

                return redirect()->route('memberTemplate');
            }
        }elseif($data->id_kategori == 6){
            return view('pages.pembayaran.pembayaran_cvchecker',compact('data'));
        }else{

            return view('pages.pembayaran.pembayaran_bukti',compact('data'));
        }

    }

    public function create(Request $request){
        $buktis = $request->bukti;

        if(!empty($request->bukti)){ 
            for($i=0;$i<count($request->bukti);$i++){
                $rules['bukti.' . $i] = 'file|mimes:jpeg,png,jpg,pdf|max:2048';
                $customAttributes['bukti.' . $i] = 'File';
            }
        }

        $rules['telepon'] = 'required|string|min:10|regex:/08\d{9,10}/';

        $messages = [
            'required' => ':attribute harus diisi.',
            'mimes' => ':attribute tipe yang diterima: :values',
            'max' => 'Ukuran maksimal file 2 Mb'
        ];

        $validator = Validator::make($request->all(),$rules, $messages);
        $validator->validate();

        $pilihan = $request->pilihan != null ? implode(",",$request->pilihan) : '';
        $jawaban = $request->jawaban != null ? implode(",",$request->jawaban) : '';

        $jawaban = $pilihan != null ? $jawaban . ',' . $pilihan : $jawaban;

        $datas = [
            'id_produk' => $request->id,
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
                if ($key == array_key_last($request->bukti)) {
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

        if($request->id_kategori == 2){
            $produk = ProdukEvent::find($request->id_produk);
            $produk = $produk->grup_wa;
            $sukses = null;
        }else{
            $produk = null;
            $sukses = 'sukses';
        }

        $data = Transaksi::create($datas);
    
        return redirect()->route('transferIndex')->with(['sukses' => $sukses,
                                                        'grup' => $produk]);
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

        return redirect()->route('memberChecker')->with(['sukses' => 'sukses']);

    }

    public function pembayaranBeduk(Request $request){
        $buktis = $request->bukti;

        for($i=0;$i<count($request->bukti);$i++){
            $rules['bukti.' . $i] = 'file|mimes:jpeg,png,jpg,pdf|max:2048';
            $customAttributes['bukti.' . $i] = 'File';
        }

        $rules['telepon'] = 'required|string|min:9|regex:/08\d{9,10}/';

        $messages = [
            'required' => ':attribute harus diisi.',
            'mimes' => ':attribute tipe yang diterima: :values',
            'max' => 'Ukuran maksimal file 2 Mb'
        ];

        $validator = Validator::make($request->all(),$rules, $messages);
        $validator->validate();

        $pilihan = $request->pilihan != null ? implode(",",$request->pilihan) : '';
        $jawaban = $request->jawaban != null ? implode(",",$request->jawaban) : '';

        $jawaban = $pilihan != null ? $jawaban . ',' . $pilihan : $jawaban;

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

        $produk = ProdukEvent::find($request->id_event);

        return redirect()->route('transferIndex')->with(['grup' => $produk->grup_wa]);

    }

    public function delete_transaksi(Request $request){
        $data = Transaksi::find($request->id);
        $data->delete();
        
        return redirect()->back();
    }
}
