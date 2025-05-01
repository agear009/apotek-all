<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gudang;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Post;
use App\Models\Keranjang;
use App\Models\Notifikasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GudangController extends Controller
{
    public function index() : View
    {

        if (request('search')) {

            //$user=Users::where('name','=',request('search'))->get();
            $gudang = Gudang::where('name','LIKE','%'.request('search').'%')->get();

            $no = 0;
            $no++;

            $produkcount = Produk::count();
            $ordercount = Order::count();
            $postcount = Post::count();
            $keranjangcount = Keranjang::count();
            return view('Gudang.Index', ["title" => "Control Panel", "active" => "Home"], compact('gudang','no','produkcount','postcount','ordercount','keranjangcount'));

            }

        else{


        $no = 0;
        $no++;

        $produkcount = Produk::count();
        $ordercount = Order::count();
        $postcount = Post::count();
        $keranjangcount = Keranjang::count();
        $gudang = gudang::all();
        return view('Gudang.Index', ["title" => "Control Panel", "active" => "Home"], compact('gudang','no','produkcount','postcount','ordercount','keranjangcount'));

            }

    }

    public function create() : View
    {

        return view('Gudang.Create', ["title" => "gudang", "active" => "gudang"]);
    }

    public function store(Request $request): RedirectResponse
    {
        // validate form
        $validated = $request->validate([
            'category'=>'required|max:255',
            'image'=>'image|mimes:jpeg,jpg,png',
            'name'=>'required|max:255',
            'deskripsi'=>'required',
            'status'=>'required|max:255',
            'jumlah'=>'required'
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/gudangs', $image->hashName());

        // create gudang
        gudang::create([
            'category'   => $request->category,
            'image'         => $image->hashName(),
            'name'         => $request->name,
            'deskripsi'       => $request->deskripsi,
            'status'        => $request->status,
            'jumlah'        => $request->jumlah
        ]);

        // create notification
        notifikasi::create([
            'id_user'   => $request->category,
            'aksi'      => 'Menambah Positingan',
            'date'      => now()
        ]);

        return redirect('/gudang')->with('success',' successfull! ');
    }

    public function edit(string $id)
    {
        // get gudang by id
        $gudang = gudang::findOrFail($id);

        return view('Gudang.Edit', ["title" => "gudang", "active" => "Edit"], compact('gudang'));
    }

    public function update(Request $request, $id)
    {
        // validate form
        $request->validate([
            'category'=>'required|max:255',
            'image'=>'image|mimes:jpeg,jpg,png',
            'name'=>'required|max:255',
            'deskripsi'=>'required',
            'status'=>'required|max:255',
            'jumlah'=>'required'
        ]);

        // get gudang by id
        $gudang = gudang::findOrFail($id);

        // check if new image is uploaded
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/gudangs/', $image->hashName());

            // delete old image
            Storage::delete('public/gudangs/'. $gudang->image);

            // update gudang with new image
            $gudang->update([
                'category'   => $request->category,
                'image'      => $image->hashName(),
                'name'       => $request->name,
                'deskripsi'  => $request->deskripsi,
                'status'     => $request->status,
                'jumlah'     => $request->jumlah
            ]);
        } else {
            // update gudang without image
            $gudang->update([
                'category'      => $request->category,
                'name'          => $request->name,
                'deskripsi'     => $request->deskripsi,
                'status'        => $request->status,
                'jumlah'        => $request->jumlah
            ]);
        }

        //redirect to gudang index
        return redirect()->route('gudang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy(string $id)
    {
        // get gudang by id
        $gudang = gudang::findOrFail($id);

        // delete image
        Storage::delete('public/gudangs/'. $gudang->image);

        // delete gudang
        $gudang->delete();

        //redirect to gudang index
        return redirect()->route('gudang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
