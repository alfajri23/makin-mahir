<?php

namespace App\Helper;
use Illuminate\Support\Facades\Auth;

class Layout {
    public static function layout_check(){
        if (Auth::check()) {
            $layout = 'layouts.member';
            
        }else{
            $layout = 'layouts.public';
        }

        return $layout = Auth::check() ? 'layouts.member' : 'layouts.public';
    }
}

?>

