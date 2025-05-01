<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Post;
use App\Models\Keranjang;
use App\Models\Obat;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{


    public function index() : View
    {

        if (request('search')) {

            //$user=Users::where('name','=',request('search'))->get();
            //$user=Users::where('name','=',auth()->user()->level)->get();
           $Keranjang=Keranjang::where('name','LIKE','%'.request('search').'%')->get();

           $no = 0;
           $no++;
           $produkcount = Produk::count();
           $ordercount = Order::count();
           $postcount = Post::count();
           $keranjangcount = Keranjang::count();
           $KeranjangObat = Keranjang::where('id_user', Auth::id())->get();
           return view('Keranjang.Index', ["title" => "Control Panel", "active" => "Home"], compact('KeranjangObat','Keranjang','no','produkcount','postcount','ordercount','keranjangcount'));

            }

        else{

            $no = 0;
            $no++;
            $produkcount = Produk::count();
            $ordercount = Order::count();
            $postcount = Post::count();
            $Keranjangcount = Keranjang::where('id_user', Auth::id())->count();
            $Keranjang = Keranjang::all();

            //$KeranjangObat = Keranjang::with('obat')
            //->where('id_user', Auth::id())
            //->get();
            $modelShoppingCart = new Keranjang();
            $KeranjangObat=$modelShoppingCart->getListshoppingCart();
            //dd($KeranjangObat);
            return view('Keranjang.Index', ["title" => "Control Panel", "active" => "Home"], compact('KeranjangObat','Keranjang','no','produkcount','postcount','ordercount','Keranjangcount'));

            }


    }

    public function create() : View
    {
        return view('Keranjang.Create', ["title" => "Keranjang", "active" => "Keranjang"]);
    }

    public function show() : View
    {
        if (request('search')) {

            //$user=Users::where('name','=',request('search'))->get();
            //$user=Users::where('name','=',auth()->user()->level)->get();
           $Keranjang=Keranjang::where('name','LIKE','%'.request('search').'%')->get();

           $no = 0;
           $no++;
           $produkcount = Produk::count();
           $ordercount = Order::count();
           $postcount = Post::count();
           $keranjangcount = Keranjang::count();
           $KeranjangObat = Keranjang::where('id_user', Auth::id())->get();
           return view('Keranjang.Index', ["title" => "Control Panel", "active" => "Home"], compact('KeranjangObat','Keranjang','no','produkcount','postcount','ordercount','keranjangcount'));

            }

        else{

            $no = 0;
            $no++;
            $produkcount = Produk::count();
            $ordercount = Order::count();
            $postcount = Post::count();
            $Keranjangcount = Keranjang::where('id_user', Auth::id())->count();
            $Keranjang = Keranjang::all();

            //cara 1
            //$modelkeranjang= new Obat;
            //$$KeranjangObat=$modelkeranjang->getListImageObatById($id);
            //$KeranjangObat = Keranjang::with('obat')
            //->where('id_user', Auth::id())
           // ->get();

           //cara 2
           //$modelKeranjang = new Obat();
           //$keranjangObat = $modelKeranjang->getListImageObatById(Auth::id());

           //$keranjangObat = Keranjang::with(['obat' => function ($query) {
             // $query->select('id', 'image'); // Hanya mengambil ID dan gambar dari tabel obat
            //}])->where('id_user', Auth::id())->get();
           //cara 3
            //$KeranjangObat = Obat::getListImageObatById(Auth::id());
            $modelShoppingCart = new Keranjang();
            $KeranjangObat=$modelShoppingCart->getListshoppingCart();
            //dd($KeranjangObat);
            return view('Keranjang.Index', ["title" => "Control Panel", "active" => "Home"], compact('KeranjangObat','Keranjang','no','produkcount','postcount','ordercount','Keranjangcount'));

            }
    }

    public function store(Request $request): RedirectResponse
    {

         // Pastikan pengguna sudah login sebelum lanjut
         if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
        }
           // Cek apakah ini input dari form obat atau produk alat kesehatan
        //$tipeBarang = $request->has('id_obat') ? 'Obat' : 'Alkes';
        //dd($request->all()); // Debugging, tampilkan semua data yang dikirim
        // Validasi form
        // Validasi input berdasarkan tipe barang
        $validated = $request->validate([
        'name' => 'required|max:255',
        'id_user' => 'required|integer',
        'id_toko' => 'required|integer',
        'jumlah' => 'required|integer|min:1',
        'dilihatuser' => 'nullable|integer',
        'dilihattoko' => 'nullable|integer',
        'image' => 'required',
        'price' => 'required',
        'tipe_barang' => 'required|in:Obat,Alkes',
        ]);
        //$id_user=>auth()->user()->id_toko}};
        //dd($request);

        Keranjang::create([
            'name'                  => $request->name,
            'id_produk'             => $request->id_produk,
            'id_toko'               => $request->id_toko,
            'id_user'               => $request->id_user,
            'jumlah'                => $request->jumlah,
            'dilihatuser'           => $request->dilihatuser,
            'dilihattoko'           => $request->dilihattoko,
            'tipe_barang'           => $request->tipe_barang,
            'price'                 => $request->price,
            'image'                 => $request->image,
            'berat'                 => $request->berat,
            'status'                => $request->status,
            'jumlah_maksimal_beli'  => $request->jumlah_maksimal_beli,
            'ongkir_toko'           => $request->ongkir_toko,
            'ongkir'                => $request->ongkir
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');

    }

    public function edit(string $id)
    {
        // get Keranjang by id
        $Keranjang = Keranjang::findOrFail($id);

        return view('Keranjang.Edit', ["title" => "Keranjang", "active" => "Edit"], compact('Keranjang'));
    }

    public function update(Request $request, $id)
    {
        // validate form
        $request->validate([
            'name'=>'required|max:255',
        ]);

        // get Keranjang by id
        $Keranjang = Keranjang::findOrFail($id);



            // update Keranjang with new image
            $Keranjang->update([
                'name'       => $request->name,
                'deskripsi'  => $request->deskripsi
            ]);


        //redirect to Keranjang index
        return redirect()->route('keranjang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy(string $id)
    {
        // get Keranjang by id
        $Keranjang = Keranjang::findOrFail($id);

        // delete Keranjang
        $Keranjang->delete();

        //redirect to Keranjang index
        return redirect()->route('keranjang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
