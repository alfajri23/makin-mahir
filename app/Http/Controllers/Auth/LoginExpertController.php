<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginExpertController extends Controller
{
    public function index(){
        return view('auth.login_expert');
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
            $request->session()->put('auth.id_expert', auth()->guard('expert')->user()->id);
            return redirect()->route('homeExpert');
        }
  
        return view('auth.login_expert');
    }

    protected function guard()
    {
        return Auth::guard('expert');
    }
}
