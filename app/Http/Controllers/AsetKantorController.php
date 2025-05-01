<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\AsetKantor;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Post;
use App\Models\Keranjang;
use App\Models\Notifikasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsetKantorController extends Controller
{
    public function index() : View
    {

        if (request('search')) {

            //$user=Users::where('name','=',request('search'))->get();
            $asetkantor = AsetKantor::where('name','LIKE','%'.request('search').'%')->get();

            $no = 0;
        $no++;
        $produkcount = Produk::count();
        $ordercount = Order::count();
        $postcount = Post::count();
        $keranjangcount = Keranjang::count();
        return view('Aset_Kantor.Index', ["title" => "Control Panel", "active" => "Home"], compact('asetkantor','no','produkcount','postcount','ordercount','keranjangcount'));

            }

        else{

            $no = 0;
        $no++;

        $asetkantor = AsetKantor::all();
        $produkcount = Produk::count();
        $ordercount = Order::count();
        $postcount = Post::count();
        $keranjangcount = Keranjang::count();
        return view('Aset_Kantor.Index', ["title" => "Control Panel", "active" => "Home"], compact('asetkantor','no','produkcount','postcount','ordercount','keranjangcount'));

            }


    }

    public function create() : View
    {
        return view('Aset_Kantor.Create', ["title" => "asetkantor", "active" => "asetkantor"]);
    }

    public function show() : View
    {
        return view('Aset_Kantor.Create', ["title" => "asetkantor", "active" => "asetkantor"]);
    }

    public function store(Request $request): RedirectResponse
    {
        // validate form
        $validated = $request->validate([
            'category'=>'required|max:255',
            'image'=>'image|mimes:jpeg,jpg,png',
            'name'=>'required|max:255',
            'deskripsi'=>'required|max:255',
            'pemilik'=>'required|max:255',
            'harga'=>'required|max:255'

        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/asetkantors', $image->hashName());

        // create asetkantor
        asetkantor::create([
            'category'   => $request->category,
            'image'      => $image->hashName(),
            'name'       => $request->name,
            'deskripsi'  => $request->deskripsi,
            'pemilik'    => $request->pemilik,
            'harga'      => $request->harga
        ]);

        // create notification
        notifikasi::create([
            'id_user'   => $request->category,
            'aksi'      => 'Menambah Positingan',
            'date'      => now()
        ]);

        return redirect('/asetkantor')->with('success',' successfull! ');
    }

    public function edit(string $id)
    {
        // get asetkantor by id
        $asetkantor = asetkantor::findOrFail($id);

        return view('Aset_Kantor.Edit', ["title" => "asetkantor", "active" => "Edit"], compact('asetkantor'));
    }

    public function update(Request $request, $id)
    {
        // validate form
        $request->validate([
           'category'=>'required|max:255',
            'image'=>'image|mimes:jpeg,jpg,png',
            'name'=>'required|max:255',
            'deskripsi'=>'required|max:255',
            'pemilik'=>'required|max:255',
            'harga'=>'required|max:255'
        ]);

        // get asetkantor by id
        $asetkantor = asetkantor::findOrFail($id);

        // check if new image is uploaded
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/asetkantors/', $image->hashName());

            // delete old image
            Storage::delete('public/asetkantors/'. $asetkantor->image);

            // update asetkantor with new image
            $asetkantor->update([
                'category'      => $request->category,
                'image'         => $image->hashName(),
                'name'          => $request->name,
                'deskripsi'     => $request->deskripsi,
                'pemilik'       => $request->pemilik,
                'harga'         => $request->harga
            ]);
        } else {
            // update asetkantor without image
            $asetkantor->update([
                'category'   => $request->category,
                'name'       => $request->name,
                'deskripsi'  => $request->deskripsi,
                'pemilik'    => $request->pemilik,
                'harga'      => $request->harga
            ]);
        }

        //redirect to asetkantor index
        return redirect()->route('asetkantor.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy(string $id)
    {
        // get asetkantor by id
        $asetkantor = asetkantor::findOrFail($id);

        // delete image
        Storage::delete('public/asetkantors/'. $asetkantor->image);

        // delete asetkantor
        $asetkantor->delete();

        //redirect to asetkantor index
        return redirect()->route('asetkantor.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
