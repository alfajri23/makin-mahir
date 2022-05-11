<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class RegisterDaftarController extends Controller
{

    protected $redirectTo = 'formulir';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function create(array $data)
    {
        //dd("daftar");
        return User::create([
            'nama' => $data['name'],
            'telepon' => $data['telepon'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function validator(array $data)
    {
        $data =  Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telepon' => ['required', 'string'],
        ]);

        return $data;
    }

    protected function registered(Request $request, $user)
    {
        //dd("hallo");
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
    
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return redirect()->route('memberForm', ['tipe' => $request->tipe , 'id' => $request->id]);
    }


}
