<?php

namespace App\Http\Controllers\Auth\Custom;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class LoginCustomController extends Controller
{
    public function login(Request $request){

        $messages = [
            'mimes' => ':attribute tipe yang diterima: :values',
            'min' => ' minimal panjang :attribute 8 karakter'
        ];

        $data =  Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ],$messages);

        if ($data->fails()) {
            return response()->json([
                'message' => $data->messages()->first(),
                'status' => 'failed',
            ], 302);
        }

        $credentials = $request->only('email', 'password');

        if ($this->guard()->attempt($credentials)) {
            $request->session()->put('auth.password_confirmed_at', time());
            $request->session()->put('auth.id_user', auth()->user()->id);
            $user = User::find(auth()->user()->id);
            $user->last_login = now();
            $user->save();

            return response()->json([
                'message' => 'sukses',
                'status' => 'success',
            ],200);
        }else{
            return response()->json([
                'message' => 'Email atau password salah',
                'status' => 'failed',
            ], 302);
        }


        

       
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), 
            $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    public function username()
    {
        return 'email';
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
