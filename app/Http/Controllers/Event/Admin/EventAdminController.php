<?php

namespace App\Http\Controllers\Event\Admin;

use App\Helper\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\Produk;
use App\Models\ProdukEvent;
use App\Models\ProdukKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EventAdminController extends Controller
{
     //EVENT
    public function event(Request $request){
        if ($request->ajax()) {
            $data = ProdukEvent::latest()->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    $actionBtn = $row->status == 1 ? '<span class="badge badge-success">Berjalan</span>' : '<span class="badge badge-warning">Berhenti</span>';
                    return $actionBtn;
                })
                ->addColumn('poster', function($row){
                    $image = asset($row['poster']);
                    $actionBtn = '<img src="'.$image.'" style="width:100px">';
                    return $actionBtn;
                })
                ->addColumn('tanggal', function($row){
                    
                    return '
                        <span>'.date_format(date_create($row['tanggal_mulai']),"d M Y").'
                        
                        </span>
                    ';
                })
                ->addColumn('vendor', function($row){
                    
                    return $expert = $row->id_expert !== null ? $row->expert->nama : '';
                })
                ->addColumn('action', function($row){
                    $deleteBtn = '
                    <button onclick="deleteEvent('.$row['id'].')" class="delete btn btn-danger btn-sm">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    ';

                    $event = $row->status == 1 ? 
                        '<button onclick="endEvent('.$row['id'].')" class="delete btn btn-warning btn-sm">
                            <i class="fa-solid fa-ban"></i>
                        </button>' :
                        '<button onclick="startEvent('.$row['id'].')" class="delete btn btn-info btn-sm">
                            <i class="fa-solid fa-check"></i>
                        </button>';

                    $actionBtn = '
                    <div class="btn-group">
                        <a href="'.route('editEvent',['id' => $row['id']]).'" class="edit btn btn-success btn-sm">
                            <i class="fa-solid fa-pencil"></i>
                        </a> 
                        
                        '.$event.'
                    </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action','poster','status','vendor','tanggal'])
                ->make(true);
        }

        return view('pages.event.admin.event');
    }

    public function eventPast(Request $request){
        if ($request->ajax()) {
            $data = ProdukEvent::onlyTrashed()->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('poster', function($row){
                    $image = asset($row['poster']);
                    $actionBtn = '<img src="'.$image.'" style="width:100px">';
                    return $actionBtn;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <div class="">
                        <a href="'.route('restoreEvent',['id' => $row['id']]).'" class="edit btn btn-success btn-sm">Restore</a> 
                    </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action','poster'])
                ->make(true);
        }

        return view('pages.event.admin.event_past');
    }

    public function eventEdit(Request $request){
        $data =ProdukEvent::find($request->id);

        $tipe = ProdukKategori::where('nama',$data->tipe)->pluck('id')->first();
        
        //$tipes = ProdukKategori::latest()->get();
        $tipes = ProdukKategori::whereIn('id',[1,2])->get();
        $pemateri = Expert::latest()->get();

        $produk = Produk::where([
            'id_produk' => $data->id,
            'id_kategori' => $tipe
        ])->first();

        return view('pages.event.admin.event_edit',compact('data','produk','tipes','pemateri'));
    }

    public function eventEnd(Request $request){
        $data =ProdukEvent::find($request->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'data' => 'sukses',
            'message' => 'Event tidak akan tampil diberanda'
        ]);

        //return redirect()->back();
    }

    public function eventStart(Request $request){
        $data =ProdukEvent::find($request->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'data' => 'sukses',
            'message' => 'Event tidak akan tampil diberanda'
        ]);

        //return redirect()->back();
    }

    public function eventDelete(Request $request){
        $data =ProdukEvent::find($request->id);
        $data->delete();

        return response()->json([
            'data' => 'sukses',
            'message' => 'Data event terhapus'
        ]);

        //return redirect()->back();
    }

    public function eventRestore(Request $request){
        $data =ProdukEvent::onlyTrashed()->where('id',$request->id);
        $data->restore();
        return redirect()->back();
    }

    public function eventAdd(){
        $pemateri = Expert::latest()->get();
        //$tipes = ProdukKategori::latest()->get();
        $tipes = ProdukKategori::whereIn('id',[1,2])->get();
        return view('pages.event.admin.event_add',compact('pemateri','tipes'));
    }

    public function eventSave(Request $request){
    
        $messages = [
            'required' => ':attribute harus diisi.',
            'mimes' => ':attribute tipe yang diterima: :values',
            'max' => 'Ukuran maksimal file 2 Mb'
        ];

        $this->validate($request, [
            'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ],$messages);

        $datas = [
            'judul'=>$request->judul,
            'link' => Str::slug($request->judul, '-'),
            'harga'=> str_replace(",", "", $request->harga),
            'tanggal_mulai'=>$request->tanggal_mulai,
            'tanggal_akhir'=>$request->tanggal_akhir,
            'waktu' =>$request->waktu,
            'harga_bias' => str_replace(",", "", $request->harga_bias),
            'deskripsi'=>$request->desc,
            'pemateri' =>$request->pemateri,
            'status' => 1,
            'id_expert' => $request->id_pemateri,
            'grup_wa' => $request->grup_wa,
        ];


        //handle file
        if(!empty($request->poster)){
            $datas = UploadFile::file($request,'poster','storage/produk/event',$datas);

            $data = ProdukEvent::find($request->id);
            if(isset($data)){
                File::delete(public_path($data->poster));
            }
        }

        //cari tipe produk
        $tipe = ProdukKategori::find($request->tipe);
        $datas['tipe'] = $tipe->nama;

        $event = ProdukEvent::updateOrCreate(['id'=>$request->id],$datas);

        $produk = Produk::updateOrCreate(['id'=>$request->id_produk],[
            'id_kategori' => $request->tipe,
            'id_produk' => $event->id,
            'nama' => $request->judul,
            'link' => Str::slug($request->judul, '-'),
            'harga' => str_replace(",", "", $request->harga),
            'id_expert' => $event->id_expert
        ]);


        // Cek untuk redirect sebagai admin atau expert
        if (Auth::guard('admin')->check()){
            return redirect()->route('eventAdmin');
        }else{
            return redirect()->route('eventExpert');
        }
    }

   
//END EVENT
}
