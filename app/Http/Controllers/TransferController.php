<?php

namespace App\Http\Controllers;

use App\Helper\Telepon;
use App\Models\CVCheckerEnroll;
use App\Models\EbookEnroll;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\PendaftaranKonsultasi;
use App\Models\PendaftaranVideo;
use App\Models\PendaftaranWebinar;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

use App\Models\EventEnroll;
use App\Models\KelasEnroll;
use App\Models\KonsultasiEnroll;
use App\Models\TemplateEnroll;

class TransferController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except('index','detail');
    }

    public function index(){
        $data = Transaksi::where('id_user',auth()->user()->id)->get();

        return view('pages.member.transfer.transfer',compact('data'));
    }

    public function detail(Request $request){
        $data = Transaksi::find($request->id);
        //dd($data);

        return view('pages.member.transfer.transfer_detail',compact('data'));
    }

    public function transaksi(Request $request){

        if ($request->ajax()) {
            if($request->tipe == 'lunas'){
                $data = Transaksi::where('status','lunas')->get();
            }elseif($request->tipe == 'pending'){
                $data = Transaksi::where('status','pending')->get();
            }elseif($request->tipe == 'ditolak'){
                $data = Transaksi::where('status','ditolak')->get();
            }elseif($request->tipe == 'belum'){
                $data = Transaksi::where('status','belum bayar')->get();
            }elseif($request->tipe == 'semua'){
                $data = Transaksi::latest()->get();
            }

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function($row){
                    $nama = '
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="'.$row['id'].'" id="check-'.$row['id'].'">
                    </div>
                    ';
                    return $nama;
                })
                ->addColumn('name', function($row){
                    $nama = '
                        <p>'.$row->nama.'</p>
                    ';
                    return $nama;
                })
                ->addColumn('bayar', function($row){
                    $actionBtn = '';
                    if($row['status'] == 'lunas'){
                        $actionBtn = '
                            <span class="badge badge-success">Lunas</span>
                        ';
                    }elseif( $row['status'] == 'belum bayar' ){
                        $actionBtn = '
                            <span class="badge badge-warning">Belum bayar</span>
                        ';
                    }elseif( $row['status'] == 'pending' ){
                        $actionBtn = '
                            <span class="badge badge-info">Konfirmasi</span>
                        ';
                    }elseif( $row['status'] == 'ditolak' ){
                        $actionBtn = '
                            <span class="badge badge-danger">Ditolak</span>
                        ';
                    }
                    return $actionBtn;
                })
                ->addColumn('user', function($row){
                    $actionBtn = '
                        <p>'.$row->user->nama.'</p>
                    ';
                    return $actionBtn;
                })
                ->addColumn('tipe', function($row){
                    $actionBtn = '
                        <p>'.$row->produk->kategori->nama.'</p>
                    ';
                    return $actionBtn;
                })
                ->addColumn('nominal', function($row){
                    $actionBtn = '
                    <div>Rp. '.number_format($row['harga']).'</div>
                    ';
                    return $actionBtn;
                })
                ->addColumn('aksi', function($row){


                    $tel = $row->user->telepon;
                    $tel = Telepon::changeTo62($tel);

                    $btnDel = '
                        <a onclick="deletes('.$row['id'].')" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                    ';
                    if($row['status'] == 'lunas'){
                        $btnDel = '';    
                    }

                    $actionBtn = '
                    <div class="btn-group"">
                        <a onclick="detail('.$row['id'].')" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>
                        <a href="https://wa.me/'.$tel.'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                        '.$btnDel.'
                    </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['checkbox','aksi','bayar','name','nominal','user','tipe'])
                ->make(true);
        }
       
        return view('pages.admin.transaksi.transaksi_all');
    }

    public function transaksi_detail(Request $request){
        $data = Transaksi::find($request->id);

        return response()->json([
            'data' => $data
        ]);
    }

    public function transaksi_konfirmasi_bank(Request $request){
        $data = Transaksi::find($request->id);
        //! Besok ganti switch aja 

        if($data->produk->id_kategori == 2 || $data->produk->id_kategori == 3){
            $enroll = EventEnroll::create([
                'id_user' => $data->id_user,
                'id_event' => $data->produk->id_produk,
                'id_transaksi' => $data->id,
                'id_expert' => $data->produk->event->id_expert
            ]);
        }else if($data->produk->id_kategori == 4){
            $enroll = KonsultasiEnroll::create([
                'id_user' => $data->id_user,
                'id_konsultasi' => $data->produk->id_produk,
                'id_transaksi' => $data->id,
                'id_expert' => $data->produk->konsultasi->id_expert
            ]);
        }else if($data->produk->id_kategori == 1){
            $enroll = KelasEnroll::create([
                'id_user' => $data->id_user,
                'id_kelas' => $data->produk->id_produk,
                'id_transaksi' => $data->id,
                'id_expert' => $data->produk->kelas->id_expert
            ]);
        }else if($data->produk->id_kategori == 5){
            $enroll = EbookEnroll::create([
                'id_user' => $data->id_user,
                'id_ebook' => $data->produk->id_produk,
                'id_expert' => $data->produk->ebook->id_expert,
                'id_transaksi' => $data->id,
            ]);
        }else if($data->produk->id_kategori == 6){
            $enroll = CVCheckerEnroll::create([
                'id_user' => $data->id_user,
                'id_transaksi' => $data->id,
            ]);
        }else if($data->produk->id_kategori == 7){
            $enroll = TemplateEnroll::create([
                'id_user' => $data->id_user,
                'id_transaksi' => $data->id,
                'id_template' => $data->produk->id_produk,
            ]);
        }

        $data->status = 'lunas';
        $data->save();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function transaksi_tolak(Request $request){
        $data = Transaksi::find($request->id);

        $data->status_bayar = 'ditolak';
        $data->save();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function transaksi_konfirmasi_mid(Request $request){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'U0ItTWlkLXNlcnZlci1LdGZSOTFFVlFud091RDEzaUgwZDAxc2Y6'
        ])->get('https://api.sandbox.midtrans.com/v2/'.$request->order_id.'/status');
        
        $response = $response->json();
        //dd($response);
        
        //cek jika berhasil,maka akan mengubah transakasi dan pendaftaran menjadi lunas
        if($response['transaction_status'] == 'settlement' || $response['transaction_status'] == 'settlement' ){
            $data = Transaksi::find($request->id);
            if($data->tipe == 'webinar'){
                $daftar = PendaftaranWebinar::find($data->id_pendaftaran);
            }elseif($data->tipe == 'konsultasi'){
                $daftar = PendaftaranKonsultasi::find($data->id_pendaftaran);
            }elseif($data->tipe == 'video'){
                $daftar = PendaftaranVideo::find($data->id_pendaftaran);
            }

            $data->status_bayar = 'lunas';
            $data->save();
            $daftar->status_bayar = 'lunas';
            $daftar->save();
            //$status = 'succes';
        }
        
        return response()->json([
            'data' => $response,

        ]);
    }

    function transaksi_delete(Request $request){
        $data = Transaksi::find($request->id);
        //$data = $data->tipe;
        if($data->tipe == 'webinar'){
            $daftar = PendaftaranWebinar::find($data->id_pendaftaran);
        }elseif($data->tipe == 'konsultasi'){
            $daftar = PendaftaranKonsultasi::find($data->id_pendaftaran);
        }elseif($data->tipe == 'video'){
            $daftar = PendaftaranVideo::find($data->id_pendaftaran);
        }


        $data->forceDelete();
        $daftar->forceDelete();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    function transaksi_delete_multi(Request $request){
        $req = json_decode($request->data, true);
        $data = Transaksi::whereIn('id', $req)->delete();
        $data->delete();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    

    

}