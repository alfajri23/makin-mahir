<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Telepon;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\KelasEnroll;
use Illuminate\Http\Request;
use App\Models\PendaftaranBeduk;
//use App\Models\PendaftaranKonsultasi;
use App\Models\PendaftaranWebinar;
use App\Models\PendaftaranVideo;
use App\Models\ProdukVideo;
use App\Models\Transaksi;

use App\Models\KonsultasiEnroll;
use App\Models\EventEnroll;

use App\Exports\EventEnrollExport;
use App\Exports\KonsultasiEnrollExport;
use App\Models\TemplateEnroll;
use Maatwebsite\Excel\Facades\Excel;

class PendaftaranController extends Controller
{
    public function beduk(Request $request){

        if ($request->ajax()) {
            $data = PendaftaranBeduk::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('name', function($row){
                $nama = '
                <p>'.$row->user->nama.'</p>
                ';
                return $nama;
            })
            ->addColumn('email', function($row){
                $nama = '
                <p>'.$row->user->email.'</p>
                ';
                return $nama;
            })
            ->addColumn('alamat', function($row){
                $nama = '
                <p>'.$row->user->alamat.'</p>
                ';
                return $nama;
            })
            ->addColumn('subscribe', function($row){
                $image = asset($row['bukti_subscribe']);
                $nama = '
                <div class="position-relative">
                <span class="hiddenclick" onclick = "subImage('.$row['id'].')">here</span>
                <span class="img-click subscribe-'.$row['id'].'" style = "display: none;">
                    <img src="'.$image.'" class="img-bukti"/>
                </span>
                </div>
                ';
                return $nama;
            })
            ->addColumn('reward', function($row){
                if($row['reward'] != null){
                    $image = asset($row['bukti_reward']);
                    $nama = '
                    <div class="position-relative">
                    <span class="hiddenclick" onclick = "buktiImage('.$row['id'].')">here</span>
                    <span class="img-click bukti-'.$row['id'].'" style = "display: none;">
                        <img src="'.$image.'" class="img-bukti"/>
                    </span>
                    </div>
                    ';
                }else{
                    $nama = 'tidak';
                }
                return $nama;
            })
            ->addColumn('tanggal', function($row){
                $nama = '
                <p>'.date_format(date_create($row->beduk->tanggal),"d M Y").'</p>
                ';
                return $nama;
            })
            ->addColumn('judul', function($row){
                $nama = '
                <p class="mb-0">'.$row->beduk->judul.'</p><br>
                ';
                return $nama;
            })
            ->addColumn('stat', function($row){
                if($row['status_daftar'] == 1 ){
                    $nama = '<span class="badge badge-success">acc</span>';
                }elseif($row['status_daftar'] == 0 ){
                    $nama = '<span class="badge badge-warning">pending</span>';
                }else{
                    $nama = '<span class="badge badge-danger">ditolak</span>';
                }
                
                return $nama;
            })
            ->addColumn('aksi', function($row){
                if($row['status_daftar'] == 0){
                    $actionBtn = '
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a onclick="acc('.$row['id'].')" class="btn btn-secondary btn-sm">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        </a>
                    </div>
                    ';
                }else{
                    $actionBtn = '
                    <a href="https://wa.me/'.$row['telepon'].'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                    ';
                }
                return $actionBtn;
            })
            ->rawColumns(['aksi','name','judul','subscribe','reward','stat','tanggal','email','alamat'])
            ->make(true);
        
        }

        return view('pages.admin.pendaftaran.pendaftaran_beduk');
    }

    public function acc_beduk(Request $request){
        $data = PendaftaranBeduk::find($request->id);
        $data->status_daftar = 1;
        $data->save();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function rej_beduk(Request $request){
        $data = PendaftaranBeduk::find($request->id);
        $data->status_daftar = -1;
        $data->save();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function webinar(Request $request){
    
        if ($request->ajax()) {
            $data = PendaftaranWebinar::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('name', function($row){
                $nama = '
                <p>'.$row->user->nama.'</p>
                ';
                return $nama;
            })
            ->addColumn('email', function($row){
                $nama = '
                <p>'.$row->user->email.'</p>
                ';
                return $nama;
            })
            ->addColumn('alamat', function($row){
                $nama = '
                <p>'.$row->user->alamat.'</p>
                ';
                return $nama;
            })
            ->addColumn('judul', function($row){
                $nama = '
                <p>'.$row->webinar->judul.'</p>
                ';
                return $nama;
            })
            ->addColumn('tanggal', function($row){
                $nama = '
                <p>'.date_format(date_create($row->webinar->tanggal),"d M Y").'</p>
                ';
                return $nama;
            })
            ->addColumn('stat', function($row){
                if($row['status_bayar'] == 'lunas' ){
                    $nama = '<span class="badge badge-success">lunas</span>';
                }elseif($row['status_bayar'] == 'pending' ){
                    $nama = '<span class="badge badge-info">pending</span>';
                }elseif($row['status_bayar'] == null){
                    $nama = '<span class="badge badge-warning">belum bayar</span>';
                }else{
                    $nama = '<span class="badge badge-danger">ditolak</span>';
                }
                
                return $nama;
            })
            ->addColumn('aksi', function($row){
                $data = Transaksi::where([
                    'id_pendaftaran' => $row['id'],
                    'tipe' => 'webinar'
                ])->first();

                $actionBtn = '
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a onclick="detail('.$data->id.')" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>
                        <a href="https://wa.me/'.Telepon::changeTo62($row['telepon']).'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                ';
                
                return $actionBtn;
            })
            ->rawColumns(['aksi','name','judul','subscribe','reward','stat','tanggal','email','alamat'])
            ->make(true);
        
        }

        return view('pages.admin.pendaftaran.pendaftaran_webinar');
    }

    //* Event
    public function event(Request $request){
        
        $data = EventEnroll::latest()->get();

        if ($request->ajax()) {
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('judul', function($row){
                $nama = '
                <p>'.$row->event->judul.'</p>
                ';
                return $nama;
            })
            ->addColumn('email', function($row){
                $nama = '
                <p>'.$row->user->email.'</p>
                ';
                return $nama;
            })
            ->addColumn('bayar', function($row){
                $actionBtn = '';
                if($row->transaksi->status == 'lunas'){
                    $actionBtn = '
                        <span class="badge badge-success">Lunas</span>
                    ';
                }elseif( $row->transaksi->status == 'belum bayar' ){
                    $actionBtn = '
                        <span class="badge badge-warning">Belum bayar</span>
                    ';
                }elseif( $row->transaksi->status == 'pending' ){
                    $actionBtn = '
                        <span class="badge badge-info">Konfirmasi</span>
                    ';
                }elseif( $row->transaksi->status == 'ditolak' ){
                    $actionBtn = '
                        <span class="badge badge-danger">Ditolak</span>
                    ';
                }
                return $actionBtn;
            })
            ->addColumn('tipe', function($row){
                $nama = '
                <p>'.$row->event->tipe.'</p>
                ';
                return $nama;
            })
            ->addColumn('tanggal', function($row){
                $nama = '
                <p>'.date_format(date_create($row->created_at),"d M Y").'</p>
                ';
                return $nama;
            })
            ->addColumn('aksi', function($row){
                $actionBtn = '
                    <div class="">
                        <a onclick="detail('.$row->transaksi->id.','.$row->id.')" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>
                        <a href="https://wa.me/'.Telepon::changeTo62($row->transaksi->telepon).'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                ';
                
                return $actionBtn;
            })
            ->rawColumns(['judul','email','tipe','aksi','bayar','tanggal'])
            ->make(true);
        
        }

        return view('pages.admin.pendaftaran.pendaftaran_event');
    }

    public function deleteEnrollEvent(Request $request){
        $data = EventEnroll::find($request->id);
        $data->forceDelete();

        return response()->json([
            'data' => 'sukses menghapus'
        ]);
    }

    public function downloadEvent(Request $request){
        return Excel::download(new EventEnrollExport($request->id), 'beduk.xlsx');
    }

    public function deleteEnrollTemplate(Request $request){
        $data = TemplateEnroll::find($request->id);
        $data->forceDelete();

        return response()->json([
            'data' => 'sukses menghapus'
        ]);
    }

    //* Template
    public function template(Request $request){
        if ($request->ajax()) {
            $data = TemplateEnroll::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('judul', function($row){
                $nama = '
                <p>'.$row->template->judul.'</p>
                ';
                return $nama;
            })
            ->addColumn('email', function($row){
                $nama = '
                <p>'.$row->user->email.'</p>
                ';
                return $nama;
            })
            // ->addColumn('bayar', function($row){
            //     $actionBtn = '';
            //     if($row->transaksi->status == 'lunas'){
            //         $actionBtn = '
            //             <span class="badge badge-success">Lunas</span>
            //         ';
            //     }elseif( $row->transaksi->status == 'belum bayar' ){
            //         $actionBtn = '
            //             <span class="badge badge-warning">Belum bayar</span>
            //         ';
            //     }elseif( $row->transaksi->status == 'pending' ){
            //         $actionBtn = '
            //             <span class="badge badge-info">Konfirmasi</span>
            //         ';
            //     }elseif( $row->transaksi->status == 'ditolak' ){
            //         $actionBtn = '
            //             <span class="badge badge-danger">Ditolak</span>
            //         ';
            //     }
            //     return $actionBtn;
            // })
            ->addColumn('tanggal', function($row){
                $nama = '
                <p>'.date_format(date_create($row->created_at),"d M Y").'</p>
                ';
                return $nama;
            })
            ->addColumn('aksi', function($row){
                $actionBtn = '
                    <div class="">
                        <a onclick="detail('.$row->transaksi->id.','.$row->id.')" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>
                        <a href="https://wa.me/'.Telepon::changeTo62($row->transaksi->telepon).'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                ';
                
                return $actionBtn;
            })
            ->rawColumns(['judul','email','aksi','tanggal'])
            ->make(true);
        
        }

        return view('pages.admin.pendaftaran.pendaftaran_template');
    }

    //* Kelas
    public function list_kelas(){
        $data = Kelas::latest()->get();

        return view('pages.admin.pendaftaran.pendaftaran_list_kelas',compact('data'));
    }

    public function kelas(Request $request){

        $datas = Kelas::find($request->id);
    
        if ($request->ajax()) {
            $data = KelasEnroll::where('id_kelas',$request->id)->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('user', function($row){
                $nama = '
                <p>'.$row->user->nama.'</p>
                ';
                return $nama;
            })
            ->addColumn('tanggal', function($row){
                $nama = '
                <p>'.date_format(date_create($row->created_at),"d M Y").'</p>
                ';
                
                return $nama;
            })
            ->addColumn('aksi', function($row){

                $actionBtn = '
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a onclick="detail('.$row->transaksi->id.','.$row->id.')" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>
                        <a href="https://wa.me/'.Telepon::changeTo62($row->transaksi->telepon).'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                ';
                
                return $actionBtn;
            })
            ->rawColumns(['aksi','tanggal','user','status'])
            ->make(true);
        
        }

        return view('pages.admin.pendaftaran.pendaftaran_kelas',compact('datas'));
    }

    public function deleteEnrollKelas(Request $request){
        $data = KelasEnroll::find($request->id);
        $data->forceDelete();

        return response()->json([
            'data' => 'sukses menghapus'
        ]);
    }

    //* Konsultasi
    public function konsultasi(Request $request){
        if ($request->ajax()) {
            $data = KonsultasiEnroll::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('judul', function($row){
                $nama = '
                <p>'.$row->konsultasi->judul.'</p>
                ';
                return $nama;
            })
            ->addColumn('email', function($row){
                $nama = '
                <p>'.$row->user->email.'</p>
                ';
                return $nama;
            })
            ->addColumn('bayar', function($row){
                $actionBtn = '';
                if($row->transaksi->status == 'lunas'){
                    $actionBtn = '
                        <span class="badge badge-success">Lunas</span>
                    ';
                }elseif( $row->transaksi->status == 'belum bayar' ){
                    $actionBtn = '
                        <span class="badge badge-warning">Belum bayar</span>
                    ';
                }elseif( $row->transaksi->status == 'pending' ){
                    $actionBtn = '
                        <span class="badge badge-info">Konfirmasi</span>
                    ';
                }elseif( $row->transaksi->status == 'ditolak' ){
                    $actionBtn = '
                        <span class="badge badge-danger">Ditolak</span>
                    ';
                }
                return $actionBtn;
            })
            ->addColumn('jawaban', function($row){
                $nama = '
                <p>'.$row->transaksi->jawaban.'</p>
                ';
                return $nama;
            })
            ->addColumn('status', function($row){
                switch($row->is_done){
                    case 1:
                        $nama = '<span class="badge badge-success">selesai</span>';
                        break;
                    default:
                        $nama = '<span class="badge badge-warning">pending</span>';
                };

                return $nama;
            })
            ->addColumn('aksi', function($row){

                $done = $row->is_done == 0 ? 
                    '
                    <a onclick="doneKonsultasi('.$row->id.')" class="btn btn-warning btn-sm"><i class="fas fa-check-circle"></i></a>
                    ': '';

                $actionBtn = '
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a onclick="detail('.$row->transaksi->id.','.$row->id.')" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>
                        <a href="https://wa.me/'.Telepon::changeTo62($row->transaksi->telepon).'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                        '.$done.'
                    </div>
                ';
                
                return $actionBtn;
            })
            ->rawColumns(['judul','email','jawaban','aksi','bayar','status'])
            ->make(true);
        
        }

        return view('pages.admin.pendaftaran.pendaftaran_konsultasi');
    }

    public function konsultasiDone(Request $request){
        $data = KonsultasiEnroll::find($request->id);
        $data->is_done = 1;
        $data->save();

        return response()->json([
            'message' => 'Konsultasi selesai'
        ]);
    }

    public function deleteEnrollKonsultasi(Request $request){
        $data = KonsultasiEnroll::find($request->id);
        $data->forceDelete();

        return response()->json([
            'data' => 'sukses menghapus'
        ]);
    }

    public function downloadKonsultasi(Request $request){
        return Excel::download(new KonsultasiEnrollExport($request->id), 'konsultasi.xlsx');
    }
}
