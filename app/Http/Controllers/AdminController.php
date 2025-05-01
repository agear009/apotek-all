<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Post;
use App\Models\Keranjang;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Notifikasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() : View
    {
        $no = 0;
        $no++;

        $id=Auth::user()->id;
        $produkcount = Produk::count();
        $ordercount = Order::count();
        $postcount = Post::count();
        $keranjangcount = Keranjang::count();
        $produkcount = Produk::count();
        //$id=auth()->user()->id;
        $users = users::findOrFail($id);
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $kelurahan = Kelurahan::all();
        //dd($users);
        if ($users->Level== Null || $users->level =='' || $users->level =='User' ){
            $user = users::findOrFail($id);

            return view('Admin.Index_User', ["title" => "Control Panel", "active" => "Home"], compact('produkcount','user','no','produkcount','postcount','ordercount','keranjangcount','provinsi','kota','kelurahan'));

        }
        elseif($users->level =='Pemilik_Apotek' ){

            $id=Auth::user()->id;
            $user = users::findOrFail($id);
            $produkcount = Produk::count();
            $ordercount = Order::count();
            $postcount = Post::count();
            $keranjangcount = Keranjang::count();
            $provinsi = Provinsi::all();
            $kota = Kota::all();
            $kelurahan = Kelurahan::all();

            //$user = users::findOrFail($id);
            return view('User_Toko.Index', ["title" => "Post", "active" => "User"], compact('user','produkcount','postcount','ordercount','keranjangcount','provinsi','kota','kelurahan'));

        }
        else{
            $user = users::findOrFail($id);
            $produkcount = Produk::count();
            $ordercount = Order::count();
            $postcount = Post::count();
            $keranjangcount = Keranjang::count();

        return view('Admin.Index', ["title" => "Control Panel", "active" => "Home"], compact('produkcount','user','no','provinsi','kota','kelurahan'));
        }
    }

}
