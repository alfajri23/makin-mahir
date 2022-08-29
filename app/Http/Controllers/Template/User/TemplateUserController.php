<?php

namespace App\Http\Controllers\Template\User;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateUserController extends Controller
{
    public function list(Request $request){
        if($request->search != null){
            $data = Template::where('judul','like','%'.$request->search.'%')->get();

        }else{
            $data = Template::where('status',1)
            ->latest()
            ->get();
        }

        $tipe = 'template';
        $route = 'produkListTemplate';
        $riwayat = 'memberTemplate';
        $meta_title = "Paket CV Makin Mahir | MakinMahir.id";
        $layout = Layout::layout_check();

        return view('pages.public.list_produk',compact('data','tipe',
                                                        'route','layout',
                                                        'meta_title','riwayat'));
    }
}
