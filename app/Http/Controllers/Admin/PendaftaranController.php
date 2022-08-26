<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Telepon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KonsultasiEnroll;
use App\Models\EventEnroll;

use App\Exports\EventEnrollExport;
use App\Exports\KonsultasiEnrollExport;
use App\Models\TemplateEnroll;
use Maatwebsite\Excel\Facades\Excel;

class PendaftaranController extends Controller
{

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
                return $actionBtn = '
                    <div class="">
                    <a onclick="detail('.$row->transaksi->id.','.$row->id.')" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>
                        <a href="https://wa.me/'.Telepon::changeTo62($row->transaksi->telepon).'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                ';
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
                if($row->transaksi != null){
                    $actionBtn = '
                        <div class="">
                            <a onclick="detail('.$row->transaksi->id.','.$row->id.')" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>
                            <a href="https://wa.me/'.Telepon::changeTo62($row->transaksi->telepon).'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    ';

                }else{
                    $actionBtn = '';
                }
                
                return $actionBtn;
            })
            ->rawColumns(['judul','email','aksi','tanggal'])
            ->make(true);
        
        }

        return view('pages.admin.pendaftaran.pendaftaran_template');
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
            ->addColumn('nama', function($row){
                $nama = '
                <p>'.$row->user->nama.'</p>
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
            ->addColumn('vendor', function($row){
                return $expert = '
                        <p>'.$row->expert->nama.'</p>
                    ';
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
            ->rawColumns(['judul','nama','jawaban','aksi','bayar','status','vendor'])
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
