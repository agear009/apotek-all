<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        $no=0;
        $no++;
        return View('Page.Login',["title"=>"Saamparan Digital Group","active"=>"login"]);
    }

    public function authenticate(request $request)
    {
            $credentials=$request->validate([

                'email'=>'required|email:dns',
                'password'=> 'required'

            ]);
            //dd('berhasil');
            //return $request()->all();
            if(Auth::attempt($credentials)){

                $request->session()->regenerate();
                $request->session()->regenerateToken();
                return redirect()->intended('/admin');


            }
            return redirect()->back()->with('error', 'Email atau password salah!');
            //return back()->with('loginError','Login Filed!');

    }

        public function logout(Request $request){

            Auth::logout();
            $request->session()->invalidate();
            //$request->session()->regenerateToken();

            return redirect('/');

        }
}
