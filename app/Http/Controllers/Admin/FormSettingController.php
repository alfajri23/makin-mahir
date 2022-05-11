<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormSetting;

class FormSettingController extends Controller
{
    public function index(){
        $data = FormSetting::all();

        
    }
}
