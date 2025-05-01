<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Category;
use App\Models\KategoriObat;
use App\Models\Notifikasi;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Users;
use App\Models\Post;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ObatTesController extends Controller
{
    //
    public function Index(){


        if (request('search')) {


                          $id=Auth::user()->id;
                          $users = users::findOrFail($id);
                          if ($users->level =='Admin' ){

                                                    $id=Auth::user()->id;
                                                    //$user = users::findOrFail($id);
                                                    $user = Users::where('id', $id)->get();
                                                    //$user=Users::where('name','=',request('search'))->get();
                                                $Obat=Obat::where('name','LIKE','%'.request('search').'%')->get();

                                                $no=0;
                                                $no++;

                                                $KategoriObat=Category::all();
                                                $produkcount = Produk::count();
                                                $ordercount = Order::count();
                                                $postcount = Post::count();
                                                $keranjangcount = Keranjang::count();
                                                //$modelNamaCategoriObats = new Obat();
                                                //$NamaCategoridanObat=$modelNamaCategoriObats->getNamaCategoriObats("ORDER BY id ASC");
                                                //$modelNamaCategoriObats = new Obat();
                                                $modelNamaCategoriObats = new Obat();
                                                $NamaCategoridanObat = $modelNamaCategoriObats->where('name', 'LIKE', '%'.request('search').'%')
                                                ->where('id_toko', '=', auth()->user()->id_toko) // Contoh menambahkan kondisi lain
                                                ->orderBy('id', 'ASC')
                                                ->get();


                                                return View('Obat.Index',["title"=>"Control Panel","active"=>"Obat"],compact('NamaCategoridanObat','Obat','category','no','produkcount','postcount','ordercount','keranjangcount'));

                                        }
                        else{

                                            $id=Auth::user()->id;
                                                        //$user = users::findOrFail($id);
                                                        //$user = Users::where('id', $id)->get();
                                                        $user = Users::findOrFail($id);
                                                        //$user=Users::where('name','=',request('search'))->get();
                                                    $Obat=Obat::where('name','LIKE','%'.request('search').'%')->get()
                                                                ->where('id_toko', auth()->user()->id_toko) // Filter berdasarkan id_toko
                                                                ->get();

                                                    $no=0;
                                                    $no++;

                                                    $KategoriObat=Category::all();
                                                    $produkcount = Produk::count();
                                                    $ordercount = Order::count();
                                                    $postcount = Post::count();
                                                    $keranjangcount = Keranjang::count();
                                                    //$modelNamaCategoriObats = new Obat();
                                                    //$NamaCategoridanObat=$modelNamaCategoriObats->getNamaCategoriObats("ORDER BY id ASC");
                                                    $modelNamaCategoriObats = new Obat();
                                                    $NamaCategoridanObat = $modelNamaCategoriObats->where('name', 'LIKE', '%'.request('search').'%')
                                                    ->where('id_toko', '=', auth()->user()->id_toko) // Contoh menambahkan kondisi lain
                                                    ->orderBy('id', 'ASC')
                                                    ->get();

                                                    return View('Obat.Index',["title"=>"Control Panel","active"=>"Obat"],compact('NamaCategoridanObat','Obat','category','no','produkcount','postcount','ordercount','keranjangcount'));
                            }
                        }

        else{
            $id=Auth::user()->id;
            $users = users::findOrFail($id);
            if ($users->level =='Admin' ){

                        $no=0;
                        $no++;
                        $id=Auth::user()->id;
                        //$user = users::findOrFail($id);
                        $user = Users::where('id', $id)->get();

                        $Obat=obat::all();
                        $KategoriObat=Category::all();
                        $produkcount = Produk::count();
                        $ordercount = Order::count();
                        $postcount = Post::count();
                        $keranjangcount = Keranjang::count();
                        $modelNamaCategoriObats = new Obat();
                        $NamaCategoridanObat=$modelNamaCategoriObats->getNamaCategoriObats("ORDER BY id ASC");
                        return View('Obat.Index',["title"=>"Control Panel","active"=>"Obat"],compact('NamaCategoridanObat','user','Obat','KategoriObat','no','produkcount','postcount','ordercount','keranjangcount'));
            }
            else{

                $no=0;
                $no++;
                $id=Auth::user()->id;
                //$user = users::findOrFail($id);
                $user = Users::where('id', $id)->get();

                $Obat=obat::where('id_toko','=',auth()->user()->id_toko)->get();
                $KategoriObat=Category::all();
                $produkcount = Produk::count();
                $ordercount = Order::count();
                $postcount = Post::count();
                $keranjangcount = Keranjang::count();
                $modelNamaCategoriObats = new Obat();
                $NamaCategoridanObat=$modelNamaCategoriObats->getNamaCategoriObats("ORDER BY id ASC");
                return View('Obat.Index',["title"=>"Control Panel","active"=>"Obat"],compact('NamaCategoridanObat','user','Obat','KategoriObat','no','produkcount','postcount','ordercount','keranjangcount'));


            }

        }


    }

    public function show(string $id)
{
    if (request('search')) {



       // Pastikan pengguna sudah login sebelum lanjut
       if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
         }else{
                $KategoriObat = KategoriObat::where('id', $id)->first();

                // Jika kategori tidak ditemukan, kirim respons JSON error
                if (!$KategoriObat) {
                    return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
                }

                // Ambil semua obat berdasarkan kategori
                $Obat = Obat::where('category', $KategoriObat->id)->get();

                // Jika request berasal dari API (JSON), kirim JSON
                if (request()->wantsJson()) {
                    return response()->json($Obat);
                }

                //untuk header
                $ids=Auth::user()->id;
                $users = users::findOrFail($ids);
                //$user = users::findOrFail($id);
                $user = Users::where('id', $ids)->get();
                $kategoriobats=KategoriObat::all();
                $KeranjangObat = Keranjang::where('id_user', Auth::id())->get();

                $modelNamaCategoriObats = new Obat();
                $NamaCategoridanObat = $modelNamaCategoriObats->where('name', 'LIKE', '%'.request('search').'%')
                ->where('category', '=', $KategoriObat->id)
                ->where('status', '=', "aktif") // Contoh menambahkan kondisi lain
                ->orderBy('id', 'ASC')
                ->get();


                // Jika tidak, return tampilan biasa
                return view('Obat.Show',["title"=>"Control Panel","active"=>"Obat"], compact('NamaCategoridanObat','user','KeranjangObat','Obat', 'KategoriObat','kategoriobats'));



            }
        }
        else{


           // Pastikan pengguna sudah login sebelum lanjut
           if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
             }else{
                    $KategoriObat = KategoriObat::where('id', $id)->first();

                    // Jika kategori tidak ditemukan, kirim respons JSON error
                    if (!$KategoriObat) {
                        return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
                    }

                    // Ambil semua obat berdasarkan kategori
                    $Obat = Obat::where('category', $KategoriObat->id)->get();

                    // Jika request berasal dari API (JSON), kirim JSON
                    if (request()->wantsJson()) {
                        return response()->json($Obat);
                    }

                    $ids=Auth::user()->id;
                    $users = users::findOrFail($ids);
                    //untuk header

                    //$user = users::findOrFail($id);
                    $user = Users::where('id', $ids)->get();
                    $kategoriobats=KategoriObat::all();
                    $KeranjangObat = Keranjang::where('id_user', Auth::id())->get();

                    $modelNamaCategoriObats = new Obat();
                    $NamaCategoridanObat = $modelNamaCategoriObats->getNamaCategoriObats($KategoriObat->id);


                    //jdd($modelNamaCategoriObats->alamat);
                    // Jika tidak, return tampilan biasa
                    return view('Obat.Show',["title"=>"Control Panel","active"=>"Obat"], compact('NamaCategoridanObat','user','KeranjangObat','Obat', 'KategoriObat','kategoriobats'));



                }

        }

}

    public function create()
    {
        $Obat=obat::all();
        $KategoriObat=KategoriObat::all();
        return view('Obat.Create',["title"=>"obat","active"=>"obat"],compact('Obat','KategoriObat'));
    }

    public function store(Request $request): RedirectResponse
    {

        //dd($request);


        $validated = $request->validate([
        'category'=>'required|max:255',
        'name'=>'required|max:255',
        'image'=>'required|image|mimes:jpeg,jpg,png',
        'deskripsi'=>'required|max:255',
        'price'=>'required',
        'status'=>'required|max:255',
        'stock'=>'required'
        ]);
        $image=$request->file('image');
        $image->storeAs('public/obats/', $image->hashName());

        //$image-> storeAs('public/obat', $image->hashName());

        obat::create([

            'id_toko'=>$request->id_toko,
            'category'=>$request->category,
            'name'=>$request->name,
            'image'=>$image->hashName(),
            'dosis'=>$request->dosis,
            'bentuk'=>$request->bentuk,
            'aturan_pakai'=>$request->aturan_pakai,
            'deskripsi'=>$request->deskripsi,
            'komposisi'=>$request->komposisi,
            'kemasan'=>$request->kemasan,
            'resep'=>$request->resep,
            'jenis_obat'=>$request->jeni_obat,
            'jangan_digunakan_oleh'=>$request->jangan_digunakan_oleh,
            'efek_samping'=>$request->efek_samping,
            'produksi'=>$request->produksi,
            'produsen'=>$request->produsen,
            'deskripsi'=>$request->deskripsi,
            'price'=>$request->price,
            'status'=>$request->status,
            'stock'=>$request->stock,
            'promo'=>$request->promo,
            'merek'=>$request->merek,
            'best_seller'=>$request->best_seller,
            'jumlah_penjualan'=>$request->jumlah_penjualan,
            'berat'=>$request->berat,
            'harga_coret'=>$request->harga_coret
        ]);
        notifikasi::create([
            'id_user'=>$request->category,
            'aksi'=>'Menambah obat',
            'date'=>now()
        ]);
        return redirect('/obat')->with('success',' successfull! ');
    }


    public function edit(string $id)
    {
        $Obat=obat::findOrFail($id);
        $KategoriObat=KategoriObat::all();
        return view('Obat.Edit',["title"=>"obat","active"=>"Edit"],compact('Obat','KategoriObat'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $request->validate([

            'category'=>'required|max:255',
            'name'=>'required|max:255',
            'deskripsi'=>'required|max:255',
            'price'=>'required',
            'status'=>'required|max:255',
            'stock'=>'required'


        ]);
           // dd($request);
            $Obat=obat::FindOrFail($id);

            if($request->hasFile('image'))
            {
                //dd($request);
                //upload new image
                $image=$request->file('image');
                $image->storeAs('public/obats/', $image->hashName());

                //$image->storeAs('public/obat',$image->hashName());


                //delete old image
                //dd(Storage::delete('public/obat/'.$Obat->image));
                Storage::delete('public/obats/'.$Obat->image);

                //update obat with new image
                $Obat->update([
                    'id_toko'=>$request->id_toko,
                    'category'=>$request->category,
                    'name'=>$request->name,
                    'image'=>$image->hashName(),
                    'dosis'=>$request->dosis,
                    'bentuk'=>$request->bentuk,
                    'aturan_pakai'=>$request->aturan_pakai,
                    'deskripsi'=>$request->deskripsi,
                    'komposisi'=>$request->komposisi,
                    'kemasan'=>$request->kemasan,
                    'resep'=>$request->resep,
                    'jenis_obat'=>$request->jeni_obat,
                    'jangan_digunakan_oleh'=>$request->jangan_digunakan_oleh,
                    'efek_samping'=>$request->efek_samping,
                    'produksi'=>$request->produksi,
                    'produsen'=>$request->produsen,
                    'deskripsi'=>$request->deskripsi,
                    'price'=>$request->price,
                    'status'=>$request->status,
                    'stock'=>$request->stock,
                    'promo'=>$request->promo,
                    'merek'=>$request->merek,
                    'best_seller'=>$request->best_seller,
                    'jumlah_penjualan'=>$request->jumlah_penjualan,
                    'berat'=>$request->berat,
                    'harga_coret'=>$request->harga_coret

                ]);

            }

            else
            {
                $Obat->update([
                    'id_toko'=>$request->id_toko,
                    'category'=>$request->category,
                    'name'=>$request->name,
                    'dosis'=>$request->dosis,
                    'bentuk'=>$request->bentuk,
                    'aturan_pakai'=>$request->aturan_pakai,
                    'deskripsi'=>$request->deskripsi,
                    'komposisi'=>$request->komposisi,
                    'kemasan'=>$request->kemasan,
                    'resep'=>$request->resep,
                    'jenis_obat'=>$request->jeni_obat,
                    'jangan_digunakan_oleh'=>$request->jangan_digunakan_oleh,
                    'efek_samping'=>$request->efek_samping,
                    'produksi'=>$request->produksi,
                    'produsen'=>$request->produsen,
                    'deskripsi'=>$request->deskripsi,
                    'price'=>$request->price,
                    'status'=>$request->status,
                    'stock'=>$request->stock,
                    'promo'=>$request->promo,
                    'merek'=>$request->merek,
                    'best_seller'=>$request->best_seller,
                    'jumlah_penjualan'=>$request->jumlah_penjualan,
                    'berat'=>$request->berat,
                    'harga_coret'=>$request->harga_coret

                ]);

            }
            return redirect('/obat')->with('success','Edit Berhasil! ');
        }


    public function destroy(string $id)
    {
        $Obat=obat::findOrFail($id);

        //delete image
           //delete old image
           Storage::delete('public/obats/'.$Obat->image);



        // delete member
        $Obat->delete();

        //redirect to index
        return redirect()->route('obat.index',["title"=>"obat",'active'=>'User'])->with(['success'=>'data telah berhasil di delete!']);
    }

}
