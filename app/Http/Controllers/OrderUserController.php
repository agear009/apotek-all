<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\Order;
use App\Models\Users;
use App\Models\Post;
use App\Models\Keranjang;

class OrderUserController extends Controller
{
    public function index()
    {

        if (request('search')) {

            //$user=Users::where('name','=',request('search'))->get();
           $order=Order::where('id_produk','LIKE','%'.request('search').'%')->get();

           $no=0;
           $no++;

           $produk=Produk::all();
           $user=Users::all();
           $produkcount = Produk::count();
           $ordercount = Order::count();
           $postcount = Post::count();
           $keranjangcount = Keranjang::count();
           return View('Order.Index',["title"=>"Control Panel","active"=>"Order"],compact('order','produk','user','no','produkcount','postcount','ordercount','keranjangcount'));

            }

        else{

            $no=0;
            $no++;

            $order=Order::all();
            $produk=Produk::all();
            $user=Users::all();
            $produkcount = Produk::count();
            $ordercount = Order::count();
            $postcount = Post::count();
            $keranjangcount = Keranjang::count();

            return View('Order.Index',["title"=>"Control Panel","active"=>"Order"],compact('order','produk','user','no','produkcount','postcount','ordercount','keranjangcount'));

            }
    }
}
