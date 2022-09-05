<?php

namespace App\Http\Controllers\Transaksi\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Helper\Telepon;

use App\Models\EventEnroll;
use App\Models\KelasEnroll;
use App\Models\KonsultasiEnroll;
use App\Models\TemplateEnroll;
use App\Models\CVCheckerEnroll;
use App\Models\EbookEnroll;
use App\Models\Transaksi;
use App\Models\PendaftaranKonsultasi;
use App\Models\PendaftaranVideo;
use App\Models\PendaftaranWebinar;
use App\Models\SettingPembayaran;

class TransaksiAdminController extends Controller
{
    public function transaksi(Request $request){
        
        $data = Transaksi::latest()->get();

        if ($request->ajax()) {
            if($request->tipe == 'lunas'){
                $data = Transaksi::where('status','lunas')->get();
            }elseif($request->tipe == 'pending'){
                $data = Transaksi::where('status','pending')->get();
            }elseif($request->tipe == 'ditolak'){
                $data = Transaksi::where('status','ditolak')->get();
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
                    $name = explode(",",$row->jawaban);
                    $nama = '
                        <p>'.$name[0].'</p>
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
                ->addColumn('vendor', function($row){
                    if($row->produk->vendor != null ){
                        $expert = '
                            <p>'.$row->produk->vendor->nama.'</p>
                        ';
                    }else{
                        $expert = '
                            <p> kosong</p>
                        ';
                    }
                    return $expert;
                })
                ->addColumn('tipe', function($row){
                    $actionBtn = '
                        <p>'.$row->produk->kategori->nama.'</p>
                    ';
                    return $actionBtn;
                })
                ->addColumn('nominal', function($row){

                    $actionBtn = $row['harga'] != null ?
                    '
                        <div>Rp. '.$row['harga'].'</div>
                    ' : '<span class="badge bg-success">Gratis</span>';
                    return $actionBtn;
                })
                ->addColumn('tanggal', function($row){
                    $nama = '
                    <p>'.date_format(date_create($row->tanggal_bayar),"d M Y").'</p>
                    ';
                    return $nama;
                })
                ->addColumn('aksi', function($row){

                    $tel = $row->telepon;
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
                ->rawColumns(['checkbox','tanggal','aksi','bayar','name','nominal','user','tipe','vendor'])
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

        $data->status = 'lunas';
        $data->save();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function transaksi_tolak(Request $request){
        $data = Transaksi::find($request->id);

        $data->status = 'ditolak';
        $data->save();

        return response()->json([
            'data' => 'sukses'
        ]);

        //! Hapus menghapus enroll
    }

    function transaksi_delete(Request $request){
        $data = Transaksi::find($request->id);
        File::delete(public_path($data->bukti));

        $fileLain = $data->file_tambahan;
        if(!empty($fileLain)){
            $fileLain = explode(",",$fileLain);

            foreach($fileLain as $lain){
                File::delete(public_path($lain));
            }
        }

        $data->forceDelete();

        return response()->json([
            'data' => 'sukses',
            'message' => ' Data terhapus'
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


    //* SETTING PEMBAYRAN METHOD

    public function admin(){
        $datas = SettingPembayaran::all();
        return view('pages.pembayaran.admin.pembayaran_metode',compact('datas'));
    }

    public function detail($id){
        $data = SettingPembayaran::find($id);
        return view('pages.pembayaran.admin.pembayaran_metode_edit',compact('data'));
    }

    public function switch(Request $request){

        $datas = SettingPembayaran::where('id','!=',$request->id)
                ->where('status',1)
                ->get();
            
        if(count($datas) > 0){
            return response()->json([
                'message' => 'hanya boleh ada satu payment gateway yang aktif',
                'status' => 'error'
            ]);
        }

        $data = SettingPembayaran::find($request->id);
        $data->status = $data->status == 1 ? 0 : 1;
        $data->save();

        return response()->json([
            'message' => 'sukses mengganti',
            'status' => 'success'
        ]);
    }

    public function saveMethod(Request $request){
        $data = SettingPembayaran::find($request->id);
        $data->secret_key = $request->secret_key;
        $data->payment_methods = implode(",",$request->payment);
        $data->save();

        return redirect()->back();
    }


}
