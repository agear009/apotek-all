<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        // Mengarahkan pengguna ke Facebook untuk otentikasi
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        // Mendapatkan pengguna dari Facebook
        $facebookUser = Socialite::driver('facebook')->user();

        // Mencari pengguna berdasarkan Facebook ID
        $user = User::where('facebook_id', $facebookUser->getId())->first();

        if (!$user) {
            // Jika pengguna tidak ditemukan, buat pengguna baru
            $user = User::create([
                'name' => $facebookUser->getName(),
                'email' => $facebookUser->getEmail(),
                'facebook_id' => $facebookUser->getId(),
                'password' => bcrypt(str::random(16)),  // Membuat password acak
            ]);
        }

        // Login pengguna
        Auth::login($user);

        // Redirect ke halaman utama setelah login
        return redirect()->to('/admin');
    }
}

