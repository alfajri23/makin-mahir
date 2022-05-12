<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expert;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Helper\UploadFile;

class ExpertController extends Controller
{
    public function admin(Request $request){
        
        $data = Expert::latest()->get();
        return view('pages.admin.expert.expert',compact('data'));
    }

    public function create(){
        return view('pages.admin.expert.expert_add');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
            dd($validator->messages()->first()); 
        }

        $datas = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        if(!empty($request->foto)){
            $datas = UploadFile::file($request,'foto','asset/img/expert',$datas);
        }

        $data = Expert::updateOrCreate(['id' => $request->id],$datas);

        return redirect()->route('expertAdminIndex');
    }

    public function detail($id){
        $data = Expert::find($id);
        return view('pages.admin.expert.expert_detail',compact('data'));
    }

    public function resetPass(Request $request){
        $data = Expert::find($request->id);
        $data->password = Hash::make('12345678');
        $data->save();

        return response()->json([
            'data' => 12345678
        ]);
    }
}
