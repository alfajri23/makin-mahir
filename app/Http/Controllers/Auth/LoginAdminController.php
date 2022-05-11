<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index(){
        return view('auth.login_admin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        //dd($credentials);
        if ($this->guard()->attempt($credentials)) {
            return redirect()->route('homeAdmin');
        }
  
        return view('auth.login_admin');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
