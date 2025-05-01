<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Obat;
use App\Models\Produk;
use App\Models\Berita;
use App\Models\Order;
use App\Models\Users;
use App\Models\Keranjang;
use App\Models\Category;
use App\Models\KategoriObat;

class PercobaanController extends Controller
{
    public function index(){
        $no=0;
        $no++;
        $Post=post::all();
        $produkcount = Produk::count();
        $ordercount = Order::count();
        $postcount = Post::count();
        $keranjangcount = Keranjang::count();
        $kategoriobats = KategoriObat::all();
        $user = Users::all();
        $obats = Obat::all();
        $kategorialkess = Category::all();

        return View('Page.Percobaan',["title"=>"Saamparan Digital Group","active"=>"Home"],compact('user','kategoriobats','kategorialkess','Post'));
    }
}
