<?php

namespace App\Helper;
use Illuminate\Support\Facades\Auth;

class Telepon {
    public static function changeTo62($num){
        if($num == null){
            return null;
        }
        else if($num[0] == '0'){
            $num = ltrim($num, $num[0]);
        }
        return $num = '+62'.$num;
    }
}

?>