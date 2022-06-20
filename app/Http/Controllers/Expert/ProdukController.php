<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Ebook;
use App\Models\KonsultasiExpert;
use App\Models\KonsultasiTipe;
use App\Models\Produk;
use App\Models\ProdukEvent;
use App\Models\ProdukKategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    //*Event
        public function event(Request $request){
            if ($request->ajax()) {
                //$data = ProdukEvent::latest()->get();
                $data = ProdukEvent::where('id_expert',$request->session()->get('auth.id_expert'))->get();
                return datatables()->of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                        $actionBtn = $row->status == 1 ? '<span class="badge badge-success">Publish</span>' : '<span class="badge badge-warning">Berhenti</span>';
                        return $actionBtn;
                    })
                    ->addColumn('poster', function($row){
                        $image = asset($row['poster']);
                        $actionBtn = '<img src="'.$image.'" style="width:100px">';
                        return $actionBtn;
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
                            <a href="'.route('editEventExpert',['id' => $row['id']]).'" class="edit btn btn-success btn-sm">
                                <i class="fa-solid fa-pencil"></i>
                            </a> 
                            
                            '.$event.'
                        </div>
                        ';
                        return $actionBtn;
                    })
                    ->rawColumns(['action','poster','status'])
                    ->make(true);
            }

            return view('pages.expert.produk.event.event');
        }

        public function eventPast(Request $request){
            if ($request->ajax()) {
                $data = ProdukEvent::onlyTrashed()->where('id_expert',$request->session()->get('auth.id_expert'))->get();
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

            return view('pages.expert.produk.event.event_past');
        }

        public function eventAdd(){
            $tipes = ProdukKategori::latest()->get();
            return view('pages.expert.produk.event.event_add',compact('tipes'));
        }

        public function eventEdit(Request $request){
            $data =ProdukEvent::find($request->id);

            $tipe = ProdukKategori::where('nama',$data->tipe)->pluck('id')->first();
            
            $tipes = ProdukKategori::latest()->get();

            $produk = Produk::where([
                'id_produk' => $data->id,
                'id_kategori' => $tipe
            ])->first();

            return view('pages.expert.produk.event.event_edit',compact('data','produk','tipes'));
        }
    //End event 

    //*Konsultasi
        public function konsultasi(){
            $data = KonsultasiTipe::latest()->get();
            return view('pages.expert.produk.konsultasi.konsultasi',compact('data'));
        }

        public function expertIndex(Request $request,$id){
            $tipe = KonsultasiTipe::find($id);
            $data = KonsultasiExpert::where([
                'id_konsultasi' => $id,
                'id_expert' => $request->session()->get('auth.id_expert'),
            ])->get();
    
            return view('pages.expert.produk.konsultasi.konsultasi_expert',compact('data','tipe','id'));
        }

        public function expertDetail($id){
            $data = KonsultasiExpert::find($id);
    
            $id_produk = $data->produk->id;
    
            return view('pages.expert.produk.konsultasi.konsultasi_expert_edit',compact('data',
                                                                             'id','id_produk'));
        }

    //End konsultasi


    //Ebook
        public function ebook(Request $request){
            if ($request->ajax()) {
                $data = Ebook::where('id_expert',$request->session()->get('auth.id_expert'))->get();
                return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('gambar', function($row){
                    $image = asset($row['gambar']);
                    $images = '<img src="'.$image.'" style="width:100px">';
                    return $images;
                })
                ->addColumn('aksi', function($row){
                    $actionBtn = '
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a onclick="detail('.$row['id'].')" class="btn btn-secondary btn-sm">
                                <i class="fa-solid fa-circle-exclamation"></i>
                            </a>
                            <a href="'.route('ebookEditExpert',['id' => $row['id']]).'" class="btn btn-success btn-sm">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <a href="'.route('ebookDeleteExpert',$row['id']).'" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash"></i>
                            </a>
                        </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['gambar','aksi'])
                ->make(true);
            
            };

            return view('pages.expert.produk.ebook.ebook');
        }

        public function ebookAdd(){
            return view('pages.expert.produk.ebook.ebook_add');
        }

        public function ebookEdit(Request $request){
            $data = Ebook::find($request->id);
            return view('pages.expert.produk.ebook.ebook_edit',compact('data'));
        }

        public function ebookDelete($id){
            $data = Ebook::find($id);
            $data->delete();
            return redirect()->back();
        }

        public function adminDetail(Request $request){
            $data = Ebook::find($request->id);

            return response()->json([
                'data' => $data
            ]);
        }


    //End book
}
