<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranKonsultasi;
use App\Models\PendaftaranVideo;
use Illuminate\Http\Request;
use App\Models\ProdukEvent;
use App\Models\ProdukKonsul;
use App\Models\ProdukVideo;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\PendaftaranWebinar;
use Illuminate\Support\Facades\Crypt;
use DateTime;
use Carbon\Carbon;
use App\Events\BuyNotification;

class PembayaranController extends Controller
{

    public function index(Request $request){

        $user = User::find(auth()->user()->id);

        if($request->tipe == 'webinar' || $request->tipe == 'beduk'){
            $data = ProdukEvent::find($request->id_produk);
        }elseif($request->tipe == 'konsultasi'){
            $data = ProdukKonsul::find($request->id_produk);
        }elseif($request->tipe == 'video'){
            $data = ProdukVideo::find($request->id_produk);
        }

        if($request->payment == '1'){
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = 'SB-Mid-server-KtfR91EVQnwOuD13iH0d01sf';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $data->harga,
                ),
                'item_details' => array(
                    [
                    'id' => $data->id,
                    'price' => $data->harga,
                    'quantity' => 1,
                    'name' => $data->judul
                    ],
                ),
                'customer_details' => array(
                    'first_name' => $user->nama,
                    'email' => $user->email,
                    'phone' => $user->telepon,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $transfer = Transaksi::create([
                'nama' => $data->judul,
                'id_pendaftaran' => $request->id_pendaftaran,
                'id_produk' => $request->id_produk,
                'id_user' => auth()->user()->id,
                'tipe' => $request->tipe,
                //'tipe_bayar' => 'transfer bukti',
                //'nominal' => $data['data']['harga_promo'] == '' ? $data['data']['harga'] : $data['data']['harga_promo'],
                //'tgl_transfer' => now(),
                //'tenggat' => new DateTime('tomorrow'),
                //'status_bayar' => 'belum bayar'
            ]);

            $id_transfer = $transfer->id;

            // send notikasi
            event(new BuyNotification($user->nama,$data->judul));

            return view('pages.pembayaran.pembayaran_midtrans',compact('snapToken','id_transfer'));

        }else{
            $data = [
                'id_user' => auth()->user()->id,
                'id_produk' => $request->id_produk,
                'tipe' => $request->tipe,
                'data' => $data
            ];

            $transfer = Transaksi::create([
                'nama' => $data['data']['judul'],
                'id_pendaftaran' => $request->id_pendaftaran,
                'id_produk' => $data['id_produk'],
                'id_user' => $data['id_user'],
                'tipe' => $request->tipe,
                'tipe_bayar' => 'transfer bukti',
                'nominal' => $data['data']['harga_promo'] == '' ? $data['data']['harga'] : $data['data']['harga_promo'],
                'tgl_transfer' => now(),
                'tenggat' => Carbon::now()->addDay(),
                'status_bayar' => 'belum bayar'
            ]);

            $produk = $data['data']['judul'];
            $id_transfer = $transfer->id;
            $data = Transaksi::find($id_transfer);
            // action notifikasi ke admin

            // $noti = new BuyNotification($user->nama,$user->nama);
            //event($noti);
            event(new BuyNotification($user->nama,$produk));


            return view('pages.pembayaran.pembayaran_bukti',compact('id_transfer','data'));
        }
    }

    //* Fungsi memunculkan upload pembyaran bukti later
    public function pay_bukti_invoice(Request $request){

        $data = Transaksi::find($request->id);
        $id_transfer = $request->id;

        return view('pages.pembayaran.pembayaran_bukti',compact('id_transfer','data'));
    }


    //* Fungsi bayar transfer
    public function pay_bukti(Request $request){

        $this->validate($request, [
			'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
		]);
		$file = $request->file('file');

        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload_server = public_path('storage/transaksi');
        $tujuan_upload = 'storage/transaksi';

        $files = $tujuan_upload . '/'. $nama_file;
        //$file->move($tujuan_upload,$nama_file);  //local
        $file->move($tujuan_upload_server,$nama_file);

        $id = $request->id_transfer;


        Transaksi::updateOrCreate([
            'id' => $id
            ],[
            'bukti' => $files,
            'status_bayar' => 'pending'
        ]);

        return redirect()->route('transferIndex');
    }

    public function pay_midtrans(Request $request){

        $json = json_decode($request->json);
        $json = json_decode(json_encode($json), TRUE);

        $tenggat = Carbon::createFromFormat("Y-m-d H:i:s", $json['transaction_time']);
        $tenggat = $tenggat->addDays(1);


        $transfer = Transaksi::updateOrCreate(['id' => $request->id_transfer],[
            'transaction_id' => isset($json['transaction_id']) ? $json['transaction_id'] : null ,
            'tipe_bayar' => isset($json['payment_type']) ? $json['payment_type'] : null,
            'order_id' => $json['order_id'],
            'nominal' => $json['gross_amount'],
            'tgl_transfer' => $json['transaction_time'],
            'tenggat' => $tenggat,
            'status_bayar' => $json['transaction_status'],
            'payment_code' => isset($json['payment_code']) ? $json['payment_code'] : null,
            'status_code' => $json['status_code'],
            'pdf_url' => isset($json['pdf_url']) ? $json['pdf_url'] : null,
            'waktu_transaksi' => $json['transaction_time'],
        ]);


        //Cek apakah sudah lunas atau belum
        if($json['status_code'] == 200){
            if($transfer->tipe == 'webinar'){
                $daftar = PendaftaranWebinar::find($transfer->id_pendaftaran);
            }elseif($transfer->tipe == 'konsultasi'){
                $daftar = PendaftaranKonsultasi::find($transfer->id_pendaftaran);
            }elseif($transfer->tipe == 'video'){
                $daftar = PendaftaranVideo::find($transfer->id_pendaftaran);
            }

            $daftar->status_bayar = 'lunas';
            $daftar->save();
        }

        return redirect()->route('transferIndex');

    }

    //! Delete Transfer button
    public function delete_transaksi(Request $request){
        $data = Transaksi::find($request->id);
        $id_data = $data->id_pendaftaran;

        if($request->tipe == 'webinar'){
            $daftar = PendaftaranWebinar::find($id_data);
        }elseif($request->tipe == 'konsultasi'){
            $daftar = PendaftaranKonsultasi::find($id_data);
        }elseif($request->tipe == 'video'){
            $daftar = PendaftaranVideo::find($id_data);
        }

        $data->delete();
        
        //riwayat daftar mau di delete / tidak
        $daftar->delete();

        return redirect()->back();
    }


}
