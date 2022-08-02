<?php

namespace App\Http\Controllers\Ebook\User;

use App\Http\Controllers\Controller;
use App\Models\Ebook;
use App\Models\EbookEnroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EbookUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['download_auth']);
    }

    public function index(Request $request){
        if($request->search != null){
            $data = Ebook::where('judul','like','%'.$request->search.'%')->get();
           
        }else{
            $data = Ebook::where('status',1)
            ->get();
        }

        $layout = '';

        if (Auth::check()) {
            $layout = 'layouts.member';
            
        }else{
            $layout = 'layouts.public';
        }

        return view('pages.public.ebook.ebook',compact('data','layout'));

    }

    public function detail(Request $request){
        $datas = Ebook::limit(6)->where('status',1)
        ->get();

        $data = Ebook::where([
            'judul' => $request->judul,
            'status' => 1
        ])->first();
        
        $layout = '';

        if (Auth::check()) {
            $layout = 'layouts.member';
            
        }else{
            $layout = 'layouts.public';
        }

        return view('pages.public.ebook.ebook_detail',compact('data','layout','datas'));
    }

    public function download_auth(Request $request){
        $cek = EbookEnroll::where([
            'id_user' => auth()->user()->id,
        ])->get();

        if(count($cek) <= 0){
            return redirect()->route('ebookDetail',['judul' => $request->judul ]);
        }

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        $data = Ebook::where('judul',$request->judul)->first();

        $file = explode("/", $data->link);
        $file = end($file);

        return response()->download(public_path().'/'.$data->link, $file, $headers);
        
    }
}
