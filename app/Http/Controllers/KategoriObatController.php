<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriObat;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Post;
use App\Models\Keranjang;
use App\Models\Notifikasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class KategoriObatController extends Controller
{
    public function index() : View
    {

        if (request('search')) {

            //$user=Users::where('name','=',request('search'))->get();
           $kategori=KategoriObat::where('name','LIKE','%'.request('search').'%')->get();

           $no = 0;
           $no++;

           $produkcount = Produk::count();
           $ordercount = Order::count();
           $postcount = Post::count();
           $keranjangcount = Keranjang::count();
           return view('Kategori_Obat.Index', ["title" => "Control Panel", "active" => "Home"], compact('kategori','no','produkcount','postcount','ordercount','keranjangcount'));


            }

        else{

            $no = 0;
            $no++;

            $produkcount = Produk::count();
            $ordercount = Order::count();
            $postcount = Post::count();
            $keranjangcount = Keranjang::count();
            $kategori = KategoriObat::all();
            return view('Kategori_Obat.Index', ["title" => "Control Panel", "active" => "Home"], compact('kategori','no','produkcount','postcount','ordercount','keranjangcount'));

            }


    }

    public function create() : View
    {
        $kategori = KategoriObat::all();
        return view('Kategori_Obat.Create', ["title" => "kategori", "active" => "kategori"], compact('kategori'));
    }

    public function show() : View
    {
        $kategori = KategoriObat::all();
        return view('Kategori_Obat.Create', ["title" => "kategori", "active" => "kategori"], compact('kategori'));
    }

    public function store(Request $request): RedirectResponse
    {
        // validate form
        $validated = $request->validate([
            'name'=>'required|max:255',
            'image'=>'image|mimes:jpeg,jpg,png',
            'deskripsi'=>'required|max:255',

        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/kategoriobats', $image->hashName());

        // create kategori
        KategoriObat::create([
            'name'       => $request->name,
            'image'      => $image->hashName(),
            'deskripsi'  => $request->deskripsi
        ]);

        // create notification
        notifikasi::create([
            //@auth()
            //'id_user'   => $request->auth()->users()->name,
            'id_user'   => $request->name,
            'aksi'      => 'Menambah Kategori',
            'date'      => now()
        ]);

        return redirect('/kategori_obat')->with('success',' successfull! ');
    }

    public function edit(string $id)
    {
        // get kategori by id
        $kategori = KategoriObat::findOrFail($id);

        return view('Kategori_Obat.Edit', ["title" => "kategori", "active" => "Edit"], compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        // validate form
        $request->validate([
            'name'=>'required|max:255',
            'image'=>'image|mimes:jpeg,jpg,png',
            'deskripsi'=>'required|max:255',
        ]);

        // get kategori by id
        $kategori = KategoriObat::findOrFail($id);

        // check if new image is uploaded
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/kategoriobats/', $image->hashName());

            // delete old image
            Storage::delete('public/kategoriobats/'. $kategori->image);

            // update kategori with new image
            $kategori->update([
                'name'       => $request->name,
                'image'      => $image->hashName(),
                'deskripsi'  => $request->deskripsi
            ]);
        } else {
            // update kategori without image
            $kategori->update([
                'name'       => $request->name,
                'deskripsi'  => $request->deskripsi
            ]);
        }

        //redirect to kategori index
        return redirect()->route('kategori_obat.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy(string $id)
    {
        // get kategori by id
        $kategori = KategoriObat::findOrFail($id);

        // delete image
        Storage::delete('public/kategoriobats/'. $kategori->image);

        // delete kategori
        $kategori->delete();

        //redirect to kategori index
        return redirect()->route('kategori_obat.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
