<?php

namespace App\Http\Controllers\Auth\OAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\JsonResponse;

class LoginOAuthController extends Controller{
    
    //GOOGLE
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackToGoogle(Request $request){
        dd("halo");
        try {
            $user_google    = Socialite::driver('google')->user();
            $user           = User::where('email', $user_google->getEmail())->first();

            //jika user ada maka langsung di redirect ke halaman home
            //jika user tidak ada maka simpan ke database
            //$user_google menyimpan data google account seperti email, foto, dsb

            if($user != null){
                \auth()->login($user, true);
                
                if ($request->hasSession()) {
                    $request->session()->put('auth.password_confirmed_at', time());
                    $request->session()->put('auth.id_user', auth()->user()->id);
                    $user = User::find(auth()->user()->id);
                    $user->last_login = now();
                    $user->save();
                }
                
                return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());

            }else{
                $create = User::Create([
                    'email'             => $user_google->getEmail(),
                    'nama'              => $user_google->getName(),
                    'password'          => 0,
                    'email_verified_at' => now()
                ]);
                
                \auth()->login($create, true);

                if ($request->hasSession()) {
                    $request->session()->put('auth.password_confirmed_at', time());
                    $request->session()->put('auth.id_user', auth()->user()->id);
                    $user = User::find(auth()->user()->id);
                    $user->last_login = now();
                    $user->save();
                }

                return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());

            }

        } catch (\Exception $e) {
            return redirect()->route('login');
        }


    }

    //FACEBOOK
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackToFacebook(Request $request){
        try {
            $user_facebook    = Socialite::driver('facebook')->user();
            $user           = User::where('email', $user_facebook->getEmail())->first();

            //jika user ada maka langsung di redirect ke halaman home
            //jika user tidak ada maka simpan ke database
            //$user_facebook menyimpan data facebook account seperti email, foto, dsb

            if($user != null){
                \auth()->login($user, true);
                return redirect()->route('publicIndex');
            }else{
                $create = User::Create([
                    'email'             => $user_facebook->getEmail(),
                    'name'              => $user_facebook->getName(),
                    'password'          => 0,
                    'email_verified_at' => now()
                ]);
        
                
                \auth()->login($create, true);
                return redirect()->route('publicIndex');
            }

        } catch (\Exception $e) {
            return redirect()->route('login');
        }


    }

    //TWITTER
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function callbackToTwitter(Request $request){
        try {
            $user_twitter    = Socialite::driver('twitter')->user();
            $user           = User::where('email', $user_twitter->getEmail())->first();

            //jika user ada maka langsung di redirect ke halaman home
            //jika user tidak ada maka simpan ke database
            //$user_twitter menyimpan data twitter account seperti email, foto, dsb

            if($user != null){
                \auth()->login($user, true);
                return redirect()->route('publicIndex');
            }else{
                $create = User::Create([
                    'email'             => $user_twitter->getEmail(),
                    'name'              => $user_twitter->getName(),
                    'password'          => 0,
                    'email_verified_at' => now()
                ]);
        
                
                \auth()->login($create, true);
                return redirect()->route('publicIndex');
            }

        } catch (\Exception $e) {
            return redirect()->route('login');
        }


    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), 
            $request->filled('remember')
        );
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }


}
