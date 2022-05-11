<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranBeduk;
use App\Models\PendaftaranVideo;
use App\Models\PendaftaranKonsultasi;
use App\Models\PendaftaranWebinar;
use App\Models\RiwayatEvent;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\ProdukEvent;
use App\Models\ProdukKonsul;
use App\Models\ProdukVideo;
use App\Models\SettingFormBeduk;
use App\Models\SettingFormWebinar;
use Illuminate\Support\Facades\Auth;

class DaftarController extends Controller
{
    public function guest(){

        //! Ini untuk yg belum login,tp minor

    }

    public function form_member(Request $request){
        $tipe = $request->tipe;
        $id = $request->id;
        $data = '';

        //* Cek login,jika belum maka akan daftar dulu
        if (Auth::check()) {

            if($tipe == 'webinar' || $tipe == 'beduk'){
                $nama = ProdukEvent::find($request->id);
            }elseif($tipe == 'konsultasi'){
                $nama = ProdukKonsul::find($request->id);
            }elseif($tipe == 'video'){
                $nama = ProdukVideo::find($request->id);
            }

            if($tipe == 'beduk'){
                $data = SettingFormBeduk::where('status', 1)->get();
            }else if($tipe == 'webinar'){
                $data = SettingFormWebinar::where('status', 1)->get();
            }
    
            return view('pages.member.daftar',compact('tipe','id','nama','data'));
            
        }else{
            return view('auth.daftar');
        }



        
    }

    public function pendaftaran_beduk(Request $request){
        
        $files = $request->files;
        $tujuan_upload = 'asset/img/bukti/beduk'; //local
        $tujuan_upload_server = public_path('asset/img/bukti/beduk');
        $data_file= [];

        foreach($files as $key => $file){
            $validated = $request->validate([
                $key => 'file|image|mimes:jpeg,png,jpg|max:2048',
            ]);


            if(!empty($request->file($key))){

                $data_file += [
                    $key => $tujuan_upload_server . '/'. time()."_".$request->file($key)->getClientOriginalName(),
                    //$key => $tujuan_upload . '/'. time()."_".$request->file($key)->getClientOriginalName(),
                ];

                //pindahkan file 
                $request->file($key)->move($tujuan_upload_server,$request->file($key)->getClientOriginalName());
                //$request->file($key)->move($tujuan_upload,$request->file($key)->getClientOriginalName());
            }
        }

        $input = $request->all();
        $data_string =[];

        foreach($input as $key => $in){
            if($key == 'telepon'){
                //Cek kalau ada 0 didepan
                if($in[0] == '0'){
                    $in = ltrim($in, $in[0]);
                }
                $data_string += [
                    $key => '+62'.$in
                ];
            }elseif(gettype($in) == 'string' && $key != '_token'){
                $data_string += [
                    $key => $in
                ];
            }
        }

        $data_final = array_merge($data_string,$data_file);

        PendaftaranBeduk::create($data_final);

        //!LAMA

            // $this->validate($request, [
            // 	'file-subscribe' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            //     'file-reward' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            // ]);

            // $file_subscribe = $request->file('file-subscribe');
            // $file_reward = $request->file('file-reward');


            // $nama_file_sub = time()."_".$file_subscribe->getClientOriginalName();
            // $tujuan_upload = 'asset/img/bukti/beduk';

            // //reward
            // if(!empty($request->file('file-reward'))){
            //     $nama_file_reward = time()."_".$file_reward->getClientOriginalName();

            //     $file_rewards = $tujuan_upload . '/'. $nama_file_reward;
            //     $file_reward->move($tujuan_upload,$nama_file_reward);
            // }else{
            //     $file_rewards= null;
            // }

            // //*Subscribe
            // $file_subscribes = $tujuan_upload . '/'. $nama_file_sub;
            // $file_subscribe->move($tujuan_upload,$nama_file_sub);

            // //*GRUB
            // $grub = $request->wa == 1 ? 'sudah' : 'belum';

            // //*INFO
            // $info = empty($request->info) ? $request->infos : $request->info;

            // PendaftaranBeduk::updateOrCreate(['id' => $request->id],[
            // 	'id_user' => $request->id_user,
            //     'id_produk' => $request->id_produk,
            // 	'umur' => $request->umur,
            // 	'info_event' => $info,
            // 	'telepon'	=> '+62'.$request->telepon,
            //     'umur'	=> $request->umur,
            //     'status'	=> $request->status_kerja,
            //     'alasan'	=> $request->kesusahan,
            //     'bukti_subscribe' => $file_subscribes,
            //     'reward' => $file_rewards,
            //     'gabung_grub' => $grub
            // ]);

        //!

        //TODO = Buat halaman selamat

        return redirect()->route('memberEventHistori');
    }

    public function pendaftaran_webinar(Request $request){

        $files = $request->files;
        $tujuan_upload = 'asset/img/bukti/webinar'; //local
        $tujuan_upload_server = public_path('asset/img/bukti/webinar'); //local
        $data_file= [];

        foreach($files as $key => $file){
            $validated = $request->validate([
                $key => 'file|image|mimes:jpeg,png,jpg|max:2048',
            ]);


            if(!empty($request->file($key))){

                $data_file += [
                    $key => $tujuan_upload_server . '/'. time()."_".$request->file($key)->getClientOriginalName(),
                    //$key => $tujuan_upload . '/'. time()."_".$request->file($key)->getClientOriginalName(),
                ];

                //pindahkan file 
                $request->file($key)->move($tujuan_upload_server,$request->file($key)->getClientOriginalName());
                //$request->file($key)->move($tujuan_upload,$request->file($key)->getClientOriginalName());
                
                
                //array_push($tampung_file, $data_file);
            }
        }

        $input = $request->all();
        $data_string =[];

        foreach($input as $key => $in){
            if($key == 'telepon'){
                //Cek kalau ada 0 didepan
                if($in[0] == '0'){
                    $in = ltrim($in, $in[0]);
                }
                $data_string += [
                    $key => '+62'.$in
                ];
            }elseif(gettype($in) == 'string' && $key != '_token'){
                $data_string += [
                    $key => $in
                ];
            }
        }

        $data_final = array_merge($data_string,$data_file);

        //dd($data_final);

        $datas = PendaftaranWebinar::create($data_final);
        
    //!Lama
        // //*GRUB
        // $grub = $request->wa == 1 ? 'sudah' : 'belum';

        // //*INFO
        // $info = empty($request->info) ? $request->infos : $request->info;

        // $datas = PendaftaranWebinar::create([
    	// 	'id_user' => $request->id_user,
        //     'id_produk' => $request->id_produk,
        // 	'umur' => $request->umur,
        // 	'info_event' => $info,
        // 	'telepon'	=> '+62'.$request->telepon,
        //     'umur'	=> $request->umur,
        //     'status'	=> $request->status_kerja,
        //     'alasan'	=> $request->kesusahan,
        //     'gabung_grub' => $grub,
        //     'status_bayar' => 'pending' //! Nanti valiasi bayar dulu sebelum masuk riwayat event user
    	// ]);
    //!

        $id_pendaftaran = $datas->id;
        $data = ProdukEvent::find($request->id_produk);
        $tipe = 'webinar';

        //! Nanti valiasi bayar dulu sebelum masuk riwayat event user

        return view('pages.member.invoice.invoice_webinar',compact('data','tipe','id_pendaftaran'));
    }

    public function pendaftaran_konsultasi(Request $request){

         //*INFO
        $info = empty($request->info) ? $request->infos : $request->info;

        $datas = PendaftaranKonsultasi::create([
    		'id_user' => $request->id_user,
            'id_produk' => $request->id_produk,
    		'umur' => $request->umur,
    		'info_event' => $info,
    		'telepon'	=> '+62'.$request->telepon,
            'umur'	=> $request->umur,
            'status'	=> $request->status_kerja,
            'hari_konsul' => $request->tgl_konsul,
            'waktu_konsul' => $request->waktu_konsul,
            'status_bayar' => 'pending' //! Nanti valiasi bayar dulu sebelum masuk riwayat event user
    	]);


        $id_pendaftaran = $datas->id;
        $data = ProdukEvent::find($request->id_produk);
        $tipe = 'konsultasi';

        return view('pages.member.invoice.invoice_webinar',compact('data','tipe','id_pendaftaran'));
        //return redirect()->route('memberEventHistori');
    }

    public function pendaftaran_video(Request $request){
        
        $datas = PendaftaranVideo::create([
    		'id_user' => $request->id_user,
            'id_produk' => $request->id_produk,
            'status_bayar' => 'pending' //! Nanti valiasi bayar dulu sebelum masuk riwayat event user
    	]);

        $id_pendaftaran = $datas->id;
        $data = ProdukVideo::find($request->id_produk);
        $tipe = 'video';

        return view('pages.member.invoice.invoice_webinar',compact('data','tipe','id_pendaftaran'));
        //return redirect()->route('memberEventHistori');
    }

    public function invoice_webinar(){

    }

}
