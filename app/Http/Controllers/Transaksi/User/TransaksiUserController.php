<?php

namespace App\Http\Controllers\Transaksi\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\FormSetting;
use App\Helper\UploadFile;
use App\Models\EventEnroll;
use App\Models\KelasEnroll;
use App\Models\KonsultasiEnroll;
use App\Models\ProdukEvent;
use App\Models\SettingPembayaran;
use App\Models\TemplateEnroll;
use Illuminate\Support\Facades\Validator;
use Xendit\Xendit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransaksiUserController extends Controller
{
    public function index(){
        $data = Transaksi::where('id_user',auth()->user()->id)->latest()->get();

        return view('pages.member.transfer.transfer',compact('data'));
    }

    public function detail($id){
        $id = base64_decode($id);
        $data = Transaksi::where([
            'id'=>$id,
            'id_user' => auth()->user()->id
        ])->first();
        

        return view('pages.member.transfer.transfer_detail',compact('data'));
    }

    public function cekForm($link){
        //$data = Produk::find($request->id);
        $data = Produk::where([
            'link' => $link,
        ])->first();


        //! Cek apakah ada pertanyaan
        $ceks = FormSetting::where('id_produk_kategori',$data->id_kategori)->first(); 

        //! Cek apakah pembayaran menggunakan payment gateway atau tidak
        $gateway = $this->checkTipeBayar();
        

        if($ceks != null){
            $pertanyaans = explode(",",$ceks->pertanyaan);
            $tipes = explode(",",$ceks->tipe);
            $files = explode(",",$ceks->file);
            $required = explode(",",$ceks->required);
            $pilihan = explode(",",$ceks->pilihan);

            return view('pages.pembayaran.user.pembayaran_gateway',compact('tipes','pertanyaans','data',
                                                        'files','pilihan','required',
                                                        'gateway'));
        }else{
            $pertanyaans = null;
            return view('pages.pembayaran.user.pembayaran_gateway',compact('pertanyaans','data','gateway'));
        }

    }

    public function checkTipeBayar() {
        return $gateway = SettingPembayaran::where('status',1)->get()->first();
    }

    //Pembayaran Biasa
    public function create(Request $request){
        $data = Produk::find($request->id);

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

        //Mengirim data produk, request dan jawaban
        if($this->cekGratis($data,$request,$jawaban)){
            return redirect()->route('memberIndex');
        }

        $datas = [
            'id_produk' => $request->id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'status' => 'pending',
            'id_user' => $request->session()->get('auth.id_user'),
            'tanggal_bayar' => now(),
            'jawaban' => $jawaban,
            'telepon' => $request->telepon,
        ];

        $filed = [];

        // if(!empty($request->bukti)){    
        //     foreach($request->bukti as $key => $file){
        //         if ($key == array_key_last($request->bukti)) {
        //             $nama_file = time()."_".$file->getClientOriginalName();
        //             $tujuan_upload_server = public_path('storage/transaksi');
        //             $tujuan_upload = 'storage/transaksi';
        //             $files = $tujuan_upload . '/'. $nama_file;
        //             $file->move($tujuan_upload_server,$nama_file);
        //             $datas['bukti'] = $files;
        //         }else{
        //             $nama_file = time()."_".$file->getClientOriginalName();
        //             $tujuan_upload_server = public_path('storage/file_tambahan');
        //             $tujuan_upload = 'storage/file_tambahan';
        //             $files = $tujuan_upload . '/'. $nama_file;
        //             $file->move($tujuan_upload_server,$nama_file);
        //             $filed[] = $files;
        //         }
        //     }

        //     $file_name = implode(",",$filed);
        //     $datas['file_tambahan'] = $file_name;
        // }

        $produk = null;
        $sukses = 'sukses';

        $data = Transaksi::create($datas);
    
        return redirect()->route('transferIndex')->with(['sukses' => $sukses,
                                                        'grup' => $produk]);
    }

    //Pembayaran Xendit
    public function createGateway(Request $request){
        $data = Produk::find($request->id);
    
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

        //Mengirim data produk, request dan jawaban
        if($this->cekGratis($data,$request,$jawaban)){
            return redirect()->route('memberIndex');
        }

        $gateway = $this->createXenditInvoice($request);

        $datas = [
            'id_produk' => $request->id,
            'nama' => $request->nama,
            'metode' => 'payment_gateway',
            'harga' => $request->harga,
            'status' => 'pending',
            'id_user' => $request->session()->get('auth.id_user'),
            'tanggal_bayar' => now(),
            'jawaban' => $jawaban,
            'telepon' => $request->telepon,
            'status_payment_gateway' => $gateway['status'],
            'id_invoice' => $gateway['id'],
            'external_id' => $gateway['external_id'],
            'invoice_url' => $gateway['invoice_url']
        ];

        $filed = [];

        // if(!empty($request->bukti)){    
        //     foreach($request->bukti as $key => $file){
        //         if ($key == array_key_first($request->bukti)) {
        //             $nama_file = time()."_".$file->getClientOriginalName();
        //             $tujuan_upload_server = public_path('storage/transaksi');
        //             $tujuan_upload = 'storage/transaksi';
        //             $files = $tujuan_upload . '/'. $nama_file;
        //             //$file->move($tujuan_upload_server,$nama_file);
        //             $datas['bukti'] = $files;
        //         }else{
        //             $nama_file = time()."_".$file->getClientOriginalName();
        //             $tujuan_upload_server = public_path('storage/file_tambahan');
        //             $tujuan_upload = 'storage/file_tambahan';
        //             $files = $tujuan_upload . '/'. $nama_file;
        //             //$file->move($tujuan_upload_server,$nama_file);
        //             $filed[] = $files;
        //         }
        //     }
        //     $file_name = implode(",",$filed);
        //     $datas['file_tambahan'] = $file_name;
        // }

        $data = Transaksi::create($datas);

        return redirect($gateway['invoice_url']);
    }

    public function createXenditInvoice($request){
        $api_key = SettingPembayaran::where('nama','like','%xendit%')->first();

        Xendit::setApiKey($api_key->secret_key);

        $gateway = SettingPembayaran::where('status',1)->get()->first();
        $gateway = explode(",",$gateway->payment_methods);

        $external_id = 'MM_' . rand() . '_' .Carbon::now()->timestamp;
        $encrypted_external_id = Crypt::encryptString($external_id);

        $params = [ 
            'user_id' => auth()->user()->id,
            'external_id' => $external_id,
            'merchant_name' => 'Xendit Testing',
            'merchant_profile_picture_url' => 'https://cdn.logo.com/hotlink-ok/logo-social.png',
            'amount' => $request->harga,
            'description' => 'Pembayaran',
            'expiration_date' => Carbon::now()->addDays(1)->toISOString(),
            'payment_methods' => $gateway,
            'customer' => [
                'given_names' => auth()->user()->nama,
                'surname' => auth()->user()->nama,
                'email' => auth()->user()->email,
                'mobile_number' => $request->telepon,
            ],
            'customer_notification_preference' => [
                'invoice_created' => [
                    'whatsapp',
                    'sms',
                    'email'
                ],
                'invoice_reminder' => [
                    'whatsapp',
                    'sms',
                    'email'
                ],
                'invoice_paid' => [
                    'whatsapp',
                    'sms',
                    'email'
                ],
                'invoice_expired' => [
                    'whatsapp',
                    'sms',
                    'email'
                ]
            ],
            'fixed_va' => true,
            'success_redirect_url' => 'https://demo.makinmahir.id/callback?external_id='.$encrypted_external_id.'',
            'failure_redirect_url' => 'https://demo.makinmahir.id/callback-expired?external_id='.$encrypted_external_id.'',
            'currency' => 'IDR',
            'items' => [
                [
                    'name' => $request->nama,
                    'quantity' => 1,
                    'price' => $request->harga,
                ]
            ],
        ];
        
        //$createInvoice = \Xendit\VirtualAccounts::create($params);
        $createInvoice = \Xendit\Invoice::create($params);
        return $createInvoice;
    }

    //Call back jika pembayaran berhasil
    public function callbackSuccess(Request $request){
        $external_id = Crypt::decryptString($request->external_id);
        $data = Transaksi::where('external_id',$external_id)->first();
        $data->status = 'lunas';
        $data->status_payment_gateway = 'SETTLED';
        $data = $this->enroll($data); //Kirim transaksi
        $data->save();

        return redirect()->route('memberIndex');
    }

    //Call back jika pembayaran berhasil
    public function callbackExpired(Request $request){
        $external_id = Crypt::decryptString($request->external_id);
        $data = Transaksi::where('external_id',$external_id)->first();
        $data->forceDelete();
    }

    //Enroll produk saat pembayaran xendit berhasil -> mengirim model transkasi
    public function enroll($data){
        if($data->produk->id_kategori == 1 || $data->produk->id_kategori == 2){       
            $enroll = EventEnroll::create([
                'id_user' => $data->id_user,
                'id_event' => $data->produk->id_produk,
                'id_transaksi' => $data->id,
                'id_expert' => $data->produk->event->id_expert
            ]);
        }else if($data->produk->id_kategori == 3){
            $enroll = KonsultasiEnroll::create([
                'id_user' => $data->id_user,
                'id_konsultasi' => $data->produk->id_produk,
                'id_transaksi' => $data->id,
                'id_expert' => $data->produk->konsultasi->id_expert
            ]);
        }else if($data->produk->id_kategori == 10){
            $enroll = KelasEnroll::create([
                'id_user' => $data->id_user,
                'id_kelas' => $data->produk->id_produk,
                'id_transaksi' => $data->id,
                'id_expert' => $data->produk->kelas->id_expert
            ]);
        }else if($data->produk->id_kategori == 4){
            $enroll = TemplateEnroll::create([
                'id_user' => $data->id_user,
                'id_transaksi' => $data->id,
                'id_template' => $data->produk->id_produk,
            ]);
        }
        return $data;
    }

    //KOndisi jika produk gratis, 
    public function cekGratis($dataProduk,$request,$jawaban){ 
        if($dataProduk->harga == null || $dataProduk->harga == ''){
            $datas = [
                'id_produk' => $request->id,
                'nama' => $request->nama,
                'harga' => null,
                'status' => 'lunas',
                'id_user' => $request->session()->get('auth.id_user'),
                'tanggal_bayar' => now(),
                'jawaban' => $jawaban,
                'telepon' => $request->telepon,
            ];

            $transaksi = Transaksi::create($datas);
            
            
            if($dataProduk->id_kategori == 1 || $dataProduk->id_kategori == 2){       
                $enroll = EventEnroll::create([
                    'id_user' => auth()->user()->id,
                    'id_event' => $dataProduk->id_produk,
                    'id_transaksi' => $transaksi->id,
                    'id_expert' => $dataProduk->event->id_expert
                ]);
            }else if($dataProduk->id_kategori == 3){
                $enroll = KonsultasiEnroll::create([
                    'id_user' => auth()->user()->id,
                    'id_konsultasi' => $dataProduk->id_produk,
                    'id_transaksi' => $transaksi->id,
                    'id_expert' => $dataProduk->konsultasi->id_expert
                ]);
            }else if($dataProduk->id_kategori == 10){
                $enroll = KelasEnroll::create([
                    'id_user' => auth()->user()->id,
                    'id_kelas' => $dataProduk->id_produk,
                    'id_transaksi' => $transaksi->id,
                    'id_expert' => $dataProduk->kelas->id_expert
                ]);
            }else if($dataProduk->id_kategori == 4){
                $enroll = TemplateEnroll::create([
                    'id_user' => auth()->user()->id,
                    'id_transaksi' => $transaksi->id,
                    'id_template' => $dataProduk->id_produk,
                ]);
            }

            return true;
        }else{
            return false;
        }

    }

    public function delete_transaksi(Request $request){
        $data = Transaksi::find($request->id);
        $data->delete();
        
        return redirect()->back();
    }
}
