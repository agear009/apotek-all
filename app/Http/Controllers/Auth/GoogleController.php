<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Mencari atau membuat user baru berdasarkan google_id
        $user = User::where('email', $googleUser->getEmail())->first();

        // Jika user tidak ditemukan, buat user baru

        if (!$user) {
            $user = User::updateOrCreate([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt('randompassword'), // Password akan direset
            ]);
            Auth::login($user);

            return redirect()->to('/admin');
        }

        Auth::login($user);

        // Redirect ke halaman yang diinginkan setelah login
       // return redirect()->route('/admin'); // Sesuaikan dengan route yang diinginkan
        return redirect('/admin'); // ✅ Benar

    }






    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }


    public function callback($google)
    {
        $sosialUser = Socialite::driver($google)->user();

        $registeredUser = user::where("google_id", $sosialUser->id)->first();

        if(!$registeredUser){

            $user = User::updateOrCreate([
                'google_id' => $sosialUser->id,
            ], [
                'name' => $sosialUser->name,
                'email' => $sosialUser->email,
                'password' => hash::make('1234'),
                'google_token' => $sosialUser->token,
                'google_refresh_token' => $sosialUser->refreshToken,
            ]);

            Auth::login($user);

            return redirect('/');

        }


        Auth::login($registeredUser);

        return redirect('/');
    }
}
