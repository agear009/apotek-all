<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Post;
use App\Models\Keranjang;

abstract class Controller
{
    public function index(){
        $no=0;
        $no++;

        $produkcount = Produk::count();
        $ordercount = Order::count();
        $postcount = Post::count();
        $keranjangcount = Keranjang::count();
        return View('Page.Index',["title"=>"Saamparan Digital Group","active"=>"Home"]);
    }
}
