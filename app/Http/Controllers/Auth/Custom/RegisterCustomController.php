<?php

namespace App\Http\Controllers\Auth\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterCustomController extends Controller
{
    public function register(Request $request){

        $messages = [
            'mimes' => ':attribute tipe yang diterima: :values',
            'min' => ' minimal panjang :attribute 8 karakter'
        ];

        $data =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telepon' => ['required', 'string','regex:/\+?([ -]?\d+)+|\(\d+\)([ -]\d+)/','min:9','max:15'],
        ],$messages);

        if ($data->fails()) {
            return response()->json([
                'message' => $data->messages()->first(),
                'status' => 'failed',
            ], 302);
        }

        event(new Registered($user = $this->create($request->all())));

        $credentials = $request->only('email', 'password');
        
        if ($this->guard()->attempt($credentials)) {
            $request->session()->put('auth.password_confirmed_at', time());
            $request->session()->put('auth.id_user', auth()->user()->id);
        }


        return response()->json([
            'message' => 'sukses',
            'status' => 'success',
        ],200);

    }

    protected function create(array $data)
    {
        $user =  User::create([
            'nama' => $data['name'],
            'telepon' => $data['telepon'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        //$user->notify(new WelcomeEmailNotification($user));

        return $user;
    }

    public function guard()
    {
        return Auth::guard();
    }

    public function login(){
        $this->guard()->attempt(
            $this->credentials($request), 
            $request->filled('remember')
        );
    }
}
