<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CVCheckerEnroll;
use Illuminate\Support\Facades\Validator;
use App\Helper\UploadFile;

class CVCheckerController extends Controller
{
    public function saveChecker(Request $request){

        $validator = Validator::make($request->all(), [
            'cv_user' => 'file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            dd($validator->messages()->first()); 
            return redirect()->back();
        }

        $datas = [
            'id_user' => $request->session()->get('auth.id_user'),
            'keterangan_user' => $request->pesan
        ];


        if(!empty($request->cv_user)){
            $datas = UploadFile::file($request,'cv_user','asset/file/cv_review/member',$datas);
        }

        $data = CVCheckerEnroll::create($datas);

        return redirect()->route('memberChecker');
    }

    public function adminCheck(Request $request){
        $data = 
    }


}
