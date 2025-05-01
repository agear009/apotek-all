<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Obat;
use App\Models\Produk;
use App\Models\Berita;
use App\Models\Order;
use App\Models\Users;
use App\Models\Toko;
use App\Models\Keranjang;
use App\Models\Category;
use App\Models\KategoriObat;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        $no=0;
        $no++;

        if (Auth::check()) {
                            $id=Auth::user()->id;
                            //$user = users::findOrFail($id);
                            $user = Users::where('id', $id)->get(); // Mengembalikan Collection
                            $Post=post::all();
                            $produkcount = Produk::count();
                            $ordercount = Order::count();
                            $postcount = Post::count();
                            $keranjangcount = Keranjang::count();
                            $kategoriobats = KategoriObat::all();
                            $obats = Obat::all();
                            $kategorialkess = Category::all();
                            $Toko = Toko::all();
                            $modelShoppingCart = new Keranjang();
                            $KeranjangObat=$modelShoppingCart->getListshoppingCart("ORDER BY id ASC");
                            return View('Page.Index',["title"=>"Apotek Online","active"=>"Home"],compact('KeranjangObat','user','kategorialkess','kategoriobats','Post','produkcount','postcount','ordercount','keranjangcount'));

                        }
        else {
                $Post=post::all();
                $user=users::all();
                $produkcount = Produk::count();
                $ordercount = Order::count();
                $postcount = Post::count();
                $keranjangcount = Keranjang::count();
                $kategoriobats = KategoriObat::all();
                $obats = Obat::all();
                $kategorialkess = Category::all();
                $modelShoppingCart = new Keranjang();
                $KeranjangObat=$modelShoppingCart->getListshoppingCart("ORDER BY id ASC");
                return View('Page.Index',["title"=>"Apotek Online","active"=>"Home"],compact('KeranjangObat','user','kategorialkess','kategoriobats','Post','produkcount','postcount','ordercount','keranjangcount'));
        }
    }
    public function produk(){
        $no=0;
        $no++;
        if (Auth::check()) {
                            $id=Auth::user()->id;
                            //$user = users::findOrFail($id);
                            $user = Users::where('id', $id)->get(); // Mengembalikan Collection

                            $Post=produk::all();
                            $Post=post::all();
                            $produkcount = Produk::count();
                            $ordercount = Order::count();
                            $postcount = Post::count();
                            $keranjangcount = Keranjang::count();
                            $kategoriobat = KategoriObat::all();
                            $kategoriobats = Obat::all();
                            $kategoralkess = Category::all();
                            return View('Page.Produk',["title"=>"Apotek Online","active"=>"Home"],compact('user','kategoriobats','kategorialkess','kategoriobat','Post'));
                        }
        else{

            $Post=produk::all();
        $Post=post::all();
        $produkcount = Produk::count();
        $ordercount = Order::count();
        $postcount = Post::count();
        $keranjangcount = Keranjang::count();
        $kategoriobat = KategoriObat::all();
        $kategoriobats = Obat::all();
        $kategoralkess = Category::all();
        return View('Page.Produk',["title"=>"Apotek Online","active"=>"Home"],compact('user','kategoriobats','kategorialkess','kategoriobat','Post'));

        }

    }
    public function berita(){
        $no=0;
        $no++;
        $Post=berita::orderBy('created_at', 'desc')->get();
        return View('Page.Berita',["title"=>"Saamparan Digital Group","active"=>"Home"],compact('Post'));
    }

}
