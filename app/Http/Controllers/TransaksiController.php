<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\FormSetting;
use App\Models\Transaksi;
use App\Helper\UploadFile;
use App\Models\EbookEnroll;
use App\Models\EventEnroll;
use App\Models\KelasEnroll;
use App\Models\KonsultasiEnroll;

use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function cekForm(Request $request){
        $data = Produk::find($request->id);

        $ceks = FormSetting::where('id_produk_kategori',$data->id_kategori)->first();
        
        if($ceks != null){
            $ceks = strip_tags($ceks->pertanyaan);
            $ceks = explode("\r\n",$ceks);
            $ceks = array_slice($ceks,1);
            array_pop($ceks);

            return view('pages.member.daftar',compact('ceks','data'));

        }elseif($data->harga == null){

            if($data->id_kategori == 2){
                $enroll = EventEnroll::create([
                    'id_user' => $request->session()->get('auth.id_user'),
                    'id_event' => $data->id_produk,
                    'id_expert' => $data->event->id_expert
                ]);
            }else if($data->id_kategori == 5){
                $enroll = EbookEnroll::create([
                    'id_user' => $request->session()->get('auth.id_user'),
                    'id_event' => $data->id_produk,
                    'id_expert' => $data->ebook->id_expert
                ]);
            }
            return redirect()->route('memberIndex');

        }else{
            return view('pages.pembayaran.pembayaran_bukti',compact('data'));
        }

    }

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'bukti' => 'file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            dd($validator->messages()->first()); 
            return redirect()->back();
        }

        
        if($request->jawaban != null) {
            $jawaban = implode(",",$request->jawaban);
        }else{
            $jawaban = '';
        }

        $datas = [
            'id_produk' => $request->id_produk,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'status' => 'pending',
            'id_user' => auth()->user()->id,
            'tanggal_bayar' => now(),
            'jawaban' => $jawaban,
        ];

        if(!empty($request->bukti)){
            $datas = UploadFile::file($request,'bukti','asset/img/bukti',$datas);
        }

        $data = Transaksi::updateOrCreate(['id'=>$request->id],$datas);
    
        return redirect()->route('transferIndex');
    }
}
