<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Category;
use App\Models\Notifikasi;
use App\Models\Order;
use App\Models\Obat;
use App\Models\Post;
use App\Models\Users;
use App\Models\Keranjang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    //
    public function Index(){

        if (request('search')) {

            $id=Auth::user()->id;
            $users = users::findOrFail($id);
            if ($users->level =='Admin' ){

                    //$user=Users::where('name','=',request('search'))->get();
                    $produk=Produk::where('name','LIKE','%'.request('search').'%')->get();


                    //dd($user);
                        $id=Auth::user()->id;
                        //$user = users::findOrFail($id);
                        $user = Users::where('id', $id)->get();

                    $no = 0;
                    $no++;
                    //$tableName='produks';
                    //$sql = "SELECT COUNT(*) AS total_data FROM $tableName";
                    //$result = $conn->query($sql);

                    //$produk=Produk::all();
                    $category=Category::all();
                    $produkcount = Produk::count();
                    $ordercount = Order::count();
                    $postcount = Post::count();
                    $keranjangcount = Keranjang::count();
                    return View('Product.Index',["title"=>"Control Panel","active"=>"Product"],compact('user','produk','category','no','produkcount','postcount','ordercount','keranjangcount'));
                        }
                else{

                    //$user=Users::where('name','=',request('search'))->get();
                    //$produk=Produk::where('name','LIKE','%'.request('search').'%')->get();
                    $produk = Produk::where('name', 'LIKE', '%' . request('search') . '%')
                                    ->where('id_toko', auth()->user()->id_toko) // Filter berdasarkan id_toko
                                    ->get();


                    //dd($user);
                        $id=Auth::user()->id;
                        //$user = users::findOrFail($id);
                        $user = Users::where('id', $id)->get();

                    $no = 0;
                    $no++;
                    //$tableName='produks';
                    //$sql = "SELECT COUNT(*) AS total_data FROM $tableName";
                    //$result = $conn->query($sql);

                    //$produk=Produk::all();
                    $category=Category::all();
                    $produkcount = Produk::count();
                    $ordercount = Order::count();
                    $postcount = Post::count();
                    $keranjangcount = Keranjang::count();
                    return View('Product.Index',["title"=>"Control Panel","active"=>"Product"],compact('user','produk','category','no','produkcount','postcount','ordercount','keranjangcount'));


                }

        }

        else{

            $id=Auth::user()->id;
            $users = users::findOrFail($id);
            if ($users->level =='Admin' ){
                                            $id=Auth::user()->id;
                                            //$user = users::findOrFail($id);
                                            $user = Users::where('id', $id)->get();
                                            $no = 0;
                                            $no++;
                                            //$tableName='produks';
                                            //$sql = "SELECT COUNT(*) AS total_data FROM $tableName";
                                            //$result = $conn->query($sql);

                                            $produk = Produk::all();
                                            $category=Category::all();
                                            $produkcount = Produk::count();
                                            $ordercount = Order::count();
                                            $postcount = Post::count();
                                            $keranjangcount = Keranjang::count();
                                            return View('Product.Index',["title"=>"Control Panel","active"=>"Product"],compact('user','produk','category','no','produkcount','postcount','ordercount','keranjangcount'));
                                    }
            else {

                $id=Auth::user()->id;
                //$user = users::findOrFail($id);
                $user = Users::where('id', $id)->get();
                $no = 0;
                $no++;
                //$tableName='produks';
                //$sql = "SELECT COUNT(*) AS total_data FROM $tableName";
                //$result = $conn->query($sql);

                $produk = Produk::where('id_toko','=',auth()->user()->id_toko)->get();
                $category=Category::all();
                $produkcount = Produk::count();
                $ordercount = Order::count();
                $postcount = Post::count();
                $keranjangcount = Keranjang::count();
                return View('Product.Index',["title"=>"Control Panel","active"=>"Product"],compact('user','produk','category','no','produkcount','postcount','ordercount','keranjangcount'));

            }

        }
 }


    public function create()
    {
        $produk=Produk::all();
        $category=Category::all();
        return view('Product.Create',["title"=>"Produk","active"=>"Produk"],compact('produk','category'));
    }


    public function show(string $id)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
        }else{

        $KategoriProduksId = Category::where('id', $id)->first();
        //dd($KategoriProduksId);

          // Jika kategori tidak ditemukan, kirim respons JSON error
          if (!$KategoriProduksId) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }
         // Ambil semua alkes berdasarkan kategori
         $Produk = Produk::where('category', $KategoriProduksId->id)->get();

           // Jika request berasal dari API (JSON), kirim JSON
        if (request()->wantsJson()) {
            return response()->json($Produk);
        }

        //untuk header
        $id=Auth::user()->id;
        //$user = users::findOrFail($id);
        $user = Users::where('id', $id)->get();
        $kategoriAlkes=Category::all();
        $KeranjangObat = Keranjang::where('id_user', Auth::id())->get();

          //dd($Obat);
        // Hitung jumlah data terkait
        $produkcount = Produk::count();
        $ordercount = Order::count();
        $postcount = Post::count();
        $keranjangcount = Keranjang::count();
        $KategoriProduks = Category::all();
        $kategoriobats = Obat::all();
        $keranjangcount = Keranjang::count();
        $KeranjangProduks = Keranjang::where('id_user', Auth::id())->get();
        $modelShoppingCart = new Keranjang();
        $KeranjangObat=$modelShoppingCart->getListshoppingCart();
        $modelNamaCategoriProduk = new Produk();
        $NamaCategoridanProduk=$modelNamaCategoriProduk->getNamaCategoriProduk($KategoriProduksId->id);
        return view('Product.Show', [
            "title" => "Control Panel",
            "active" => "Obat"
        ], compact('NamaCategoridanProduk','kategoriAlkes','user','KeranjangObat','KategoriProduksId','kategoriobats','KeranjangProduks','Produk', 'produkcount', 'postcount', 'ordercount', 'KategoriProduks', 'keranjangcount'));
    }
}

    public function store(Request $request): RedirectResponse
    {

        //dd($request);


        $validated = $request->validate([


        'category'=>'required|max:255',
        'name'=>'required|max:255',
        'image'=>'image|mimes:jpeg,jpg,png',
        'description'=>'required|max:255',
        'price'=>'required',
        'status'=>'required|max:255',
        'stock'=>'required'
        ]);
        $image=$request->file('image');
        $image->storeAs('public/Produk/', $image->hashName());

        //$image-> storeAs('public/Produk', $image->hashName());

        Produk::create([
            'id_toko'=>$request->id_toko,
            'category'=>$request->category,
            'name'=>$request->name,
            'image'=>$image->hashName(),
            'description'=>$request->description,
            'price'=>$request->price,
            'merek'=>$request->merek,
            'status'=>$request->status,
            'stock'=>$request->stock,
            'promo'=>$request->promo,
            'best_seller'=>$request->best_seller,
            'jumlah_penjualan'=>$request->jumlah_penjualan,
            'jumlah_maksimal_beli'=>$request->jumlah_maksimal_beli,
            'berat'=>$request->berat,
            'harga_coret'=>$request->harga_coret,
            'produksi'=>$request->produksi,
            'produsen'=>$request->produsen
        ]);
        notifikasi::create([
            'id_user'=>$request->category,
            'aksi'=>'Menambah Produk',
            'date'=>now()
        ]);
        return redirect('/produk')->with('success',' successfull! ');
    }


    public function edit(string $id)
    {
        $produk=Produk::findOrFail($id);
        $category=category::all();
        return view('Product.Edit',["title"=>"Produk","active"=>"Edit"],compact('produk','category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'category'=>'required|max:255',
            'name'=>'required|max:255',
            'description'=>'required|max:255',
            'price'=>'required',
            'status'=>'required|max:255',
            'stock'=>'required'


        ]);
           // dd($request);
            $Produk=Produk::FindOrFail($id);

            if($request->hasFile('image'))
            {
                //dd($request);
                //upload new image
                $image=$request->file('image');
                $image->storeAs('public/Produk/', $image->hashName());

                //$image->storeAs('public/Produk',$image->hashName());


                //delete old image
                //dd(Storage::delete('public/Produk/'.$Produk->image));
                Storage::delete('public/Produk/'.$Produk->image);

                //update Produk with new image
                $Produk->update([
                    'id_toko'=>$request->id_toko,
                    'category'=>$request->category,
                    'name'=>$request->name,
                    'image'=>$image->hashName(),
                    'description'=>$request->description,
                    'price'=>$request->price,
                    'merek'=>$request->merek,
                    'status'=>$request->status,
                    'stock'=>$request->stock,
                    'promo'=>$request->promo,
                    'best_seller'=>$request->best_seller,
                    'jumlah_penjualan'=>$request->jumlah_penjualan,
                    'jumlah_maksimal_beli'=>$request->jumlah_maksimal_beli,
                    'berat'=>$request->berat,
                    'harga_coret'=>$request->harga_coret,
                    'produksi'=>$request->produksi,
                    'produsen'=>$request->produsen

                ]);

            }

            else
            {
                $Produk->update([
                    'id_toko'=>$request->id_toko,
                    'category'=>$request->category,
                    'name'=>$request->name,
                    'description'=>$request->description,
                    'price'=>$request->price,
                    'merek'=>$request->merek,
                    'status'=>$request->status,
                    'stock'=>$request->stock,
                    'promo'=>$request->promo,
                    'best_seller'=>$request->best_seller,
                    'jumlah_penjualan'=>$request->jumlah_penjualan,
                    'jumlah_maksimal_beli'=>$request->jumlah_maksimal_beli,
                    'jumlah_ketersediaan'=>$request->jumlah_ketersediaan,
                    'berat'=>$request->berat,
                    'harga_coret'=>$request->harga_coret,
                    'produksi'=>$request->produksi,
                    'produsen'=>$request->produsen

                ]);

            }
            return redirect('/produk')->with('success','Edit Berhasil! ');
        }


    public function destroy(string $id)
    {
        $Produk=Produk::findOrFail($id);

        //delete image
           //delete old image
           Storage::delete('public/Produk/'.$Produk->image);



        // delete member
        $Produk->delete();

        //redirect to index
        return redirect()->route('produk.index',["title"=>"Produk",'active'=>'User'])->with(['success'=>'data telah berhasil di delete!']);
    }

}
