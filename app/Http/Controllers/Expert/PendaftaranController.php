<?php

namespace App\Http\Controllers\Expert;

use App\Helper\Telepon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\KonsultasiEnroll;
use App\Models\EventEnroll;
use App\Models\EbookEnroll;

class PendaftaranController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {
            $data = EventEnroll::where('id_expert',$request->session()->get('auth.id_expert'))->get();
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
                        <a href="https://wa.me/'.Telepon::changeTo62($row->transaksi->telepon).'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                ';
                
                return $actionBtn;
            })
            ->rawColumns(['judul','email','tipe','aksi','bayar','tanggal'])
            ->make(true);
        
        }


        return view('pages.expert.pendaftaran.pendaftaran');
    }
}
