<?php

namespace App\Helper;
use Illuminate\Support\Facades\Auth;

class UploadFile {
    public static function file($request,$name,$path,$datas){
        $data = $request->file($name);
        $nama_file = time()."_".$data->getClientOriginalName();
        $tujuan_upload_server = public_path($path);
        $tujuan_upload = $path;
        $files = $tujuan_upload . '/'. $nama_file;
        $data->move($tujuan_upload_server,$nama_file);
        $datas[$name] = $files;
        return $datas;
    }
}

?>