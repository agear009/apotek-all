<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Users;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Post;
use App\Models\Keranjang;
use App\Models\Notifikasi;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {

        if (request('search')) {


            $id=Auth::user()->id;
            $users = users::findOrFail($id);
            if ($users->level =='Admin' ){


                    //$user=Users::where('name','=',request('search'))->get();
                    $Toko = Toko::where('name','LIKE','%'.request('search').'%')->get();

                    $no = 0;
                    $no++;

                    $produkcount = Produk::count();
                    $ordercount = Order::count();
                    $postcount = Post::count();
                    $keranjangcount = Keranjang::count();
                    $tokoall = Toko::all();
                    $orderall = Order::where('id_toko','=',Auth::user()->id_toko)->get();
                    return view('Toko.Index', ["title" => "Control Panel", "active" => "Home"], compact('Toko','tokoall','no','produkcount','postcount','ordercount','keranjangcount','orderall'));

            }
            else{

                     //$user=Users::where('name','=',request('search'))->get();
                     $Toko = Toko::where('name','LIKE','%'.request('search').'%')->get();

                     $no = 0;
                     $no++;

                     $produkcount = Produk::count();
                     $ordercount = Order::count();
                     $postcount = Post::count();
                     $keranjangcount = Keranjang::count();
                     $orderall = Order::where('id_toko','=',Auth::user()->id_toko)->get();
                     $tokoall = Toko::where('id','=',Auth::user()->id_toko)->get();
                     return view('Toko.Index', ["title" => "Control Panel", "active" => "Home"], compact('Toko','tokoall','no','produkcount','postcount','ordercount','keranjangcount','orderall'));


                $no = 0;
                $no++;
                //dd(Auth::user()->id_toko);
                $produkcount = Produk::count();
                $ordercount = Order::count();
                $postcount = Post::count();
                $keranjangcount = Keranjang::count();
            $orderall = Order::where('id_toko','=',Auth::user()->id_toko)->get();
            $tokoall = Toko::where('id','=',Auth::user()->id_toko)->get();
            return view('Toko.Index', ["title" => "Control Panel", "active" => "Home"], compact('tokoall','no','produkcount','postcount','ordercount','keranjangcount','orderall'));


            }

        }

        else{


                    $id=Auth::user()->id;
                    $users = users::findOrFail($id);
                    if ($users->level =='Admin' ){

                        $no = 0;
                        $no++;
                        //dd(Auth::user()->id_toko);
                        $produkcount = Produk::count();
                        $ordercount = Order::count();
                        $postcount = Post::count();
                        $keranjangcount = Keranjang::count();
                        $Toko = Toko::all();
                        $tokoall = Toko::all();
                        $orderall = Order::all();
                        return view('Toko.Index', ["title" => "Control Panel", "active" => "Home"], compact('Toko','tokoall','no','produkcount','postcount','ordercount','keranjangcount','orderall'));

                    }
                    else{

                        $no = 0;
                        $no++;

                        $produkcount = Produk::count();
                        $ordercount = Order::count();
                        $postcount = Post::count();
                        $keranjangcount = Keranjang::count();
                    $orderall = Order::where('id_toko','=',Auth::user()->id_toko)->get();
                    $tokoall = Toko::where('id','=',Auth::user()->id_toko)->get();
                    return view('Toko.Index', ["title" => "Control Panel", "active" => "Home"], compact('tokoall','no','produkcount','postcount','ordercount','keranjangcount','orderall'));


                    }


            }

    }

    public function create() : View
    {
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $kelurahan = Kelurahan::all();
        return view('Toko.Create', ["title" => "Toko", "active" => "Toko"],compact('provinsi','kota'));
    }

    public function store(Request $request): RedirectResponse
    {
        // validate form
        $validated = $request->validate([
            'image'=>'image|mimes:jpeg,jpg,png',
            'image_siup_nib'=>'image|mimes:jpeg,jpg,png',
            'image_ktp'=>'image|mimes:jpeg,jpg,png',
            'image_buku_tabungan'=>'image|mimes:jpeg,jpg,png',
            'image_sia'=>'image|mimes:jpeg,jpg,png',
            'image_sipa'=>'image|mimes:jpeg,jpg,png',
            'image_npwp'=>'image|mimes:jpeg,jpg,png',
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/Tokos', $image->hashName());

        $image_siup_nib = $request->file('image_siup_nib');
        $image_siup_nib->storeAs('public/siup_nibs', $image_siup_nib->hashName());

        $image_cv_pt = $request->file('image_cv_pt');
        $image_cv_pt->storeAs('public/cv_pts', $image_cv_pt->hashName());

        $image_ktp = $request->file('image_ktp');
        $image_ktp->storeAs('public/ktps', $image_ktp->hashName());

        $image_buku_tabungan = $request->file('image_buku_tabungan');
        $image_buku_tabungan->storeAs('public/buku_tabungans', $image_buku_tabungan->hashName());

        $image_sia = $request->file('image_sia');
        $image_sia->storeAs('public/sias', $image_sia->hashName());

        $image_sipa= $request->file('image_sipa');
        $image_sipa->storeAs('public/sipas', $image_sipa->hashName());

        $image_npwp= $request->file('image_npwp');
        $image_npwp->storeAs('public/npwps', $image_npwp->hashName());

        // create Toko
        Toko::create([


            'id_user'=> $request->id_user,
            'name'=> $request->name,
            'image'=> $image->hashName(),
            'alamat'=> $request->alamat,
            'tipe_badan_usaha'=> $request->tipe_badan_usaha,
            'email'=> $request->email,
            'nohp'=> $request->nohp,
            'tipe_toko'=> $request->tipe_toko,
            'latitude'=> $request->latitude,
            'longitude'=> $request->longitude,
            'provinsi'=> $request->provinsi,
            'kabupaten'=> $request->kabupaten,
            'deskripsi'=> $request->deskripsi,
            'like'=> $request->like,
            'bintang'=> $request->bintang,
            'kurir'=> $request->kurir,
            'follow'=> $request->follow,
            'facebook'=> $request->facebook,
            'tiktok'=> $request->tiktok,
            'instagram'=> $request->instagram,
            'whatsapp'=> $request->whatsapp,
            'nama_direktur'=> $request->nama_direktur,
            'nama_pic_toko'=> $request->nama_pic_toko,
            'nama_apoteker'=> $request->nama_apoteker,
            'image_cv_pt'=> $image_cv_pt->hashName(),
            'image_siup_nib'=>  $image_siup_nib->hashName(),
            'nomor_siup_nib'=> $request->nomor_siup_nib,
            'image_ktp'=>  $image_ktp->hashName(),
            'bank'=> $request->bank,
            'norek'=> $request->norek,
            'image_buku_tabungan'=> $image_buku_tabungan->hashName(),
            'image_npwp'=>  $image_npwp->hashName(),
            'nama_npwp'=> $request->nama_npwp,
            'alamat_npwp'=> $request->alamat_npwp,
            'image_sia'=>  $image_sia->hashName(),
            'nomor_sia'=> $request->nomor_sia,
            'tgl_terbit_sia'=> $request->tgl_terbit_sia,
            'tgl_kadaluarsa_sia'=> $request->tgl_kadaluarsa_sia,
            'image_sipa'=>  $image_sipa->hashName(),
            'nomor_sipa'=> $request->nomor_sipa,
            'tgl_terbit_sipa'=> $request->tgl_terbit_sipa,
            'tgl_kadaluarsa_sipa'=> $request->tgl_kadaluarsa_sipa,
            'status'=> $request->status
        ]);

        // create notification
        notifikasi::create([
            'id_user'   => $request->id_user,
            'aksi'      => 'Menambah toko baru',
            'date'      => now()
        ]);

        return redirect('/toko')->with('success',' successfull! ');
    }

    public function edit(string $id)
    {
        // get Toko by id
        $toko = Toko::findOrFail($id);
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $kelurahan = Kelurahan::all();
        return view('Toko.Edit', ["title" => "Toko", "active" => "Edit"], compact('toko','provinsi','kota'));
    }

    public function update(Request $request, $id)
    {
        // validate form
        $request->validate([
            'name'=>'required|max:255',
            'deskripsi'=>'required',
            'status'=>'required|max:255'

        ]);

        // get Toko by id
        $Toko = Toko::findOrFail($id);

        // check if new image is uploaded
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/Tokos/', $image->hashName());

            // delete old image
            Storage::delete('public/Tokos/'. $Toko->image);

            // update Toko with new image
            $Toko->update([


            'id_user'=> $request->id_user,
            'name'=> $request->name,
            'image'=> $image->hashName(),
            'alamat'=> $request->alamat,
            'tipe_badan_usaha'=> $request->tipe_badan_usaha,
            'email'=> $request->email,
            'nohp'=> $request->nohp,
            'tipe_toko'=> $request->tipe_toko,
            'latitude'=> $request->latitude,
            'longitude'=> $request->longitude,
            'provinsi'=> $request->provinsi,
            'kabupaten'=> $request->kabupaten,
            'deskripsi'=> $request->deskripsi,
            'like'=> $request->like,
            'bintang'=> $request->bintang,
            'kurir'=> $request->kurir,
            'follow'=> $request->follow,
            'facebook'=> $request->facebook,
            'tiktok'=> $request->tiktok,
            'instagram'=> $request->instagram,
            'whatsapp'=> $request->whatsapp,
            'nama_direktur'=> $request->nama_direktur,
            'nama_pic_toko'=> $request->nama_pic_toko,
            'nama_apoteker'=> $request->nama_apoteker,
            'nomor_siup_nib'=> $request->nomor_siup_nib,
            'bank'=> $request->bank,
            'norek'=> $request->norek,
            'nama_npwp'=> $request->nama_npwp,
            'alamat_npwp'=> $request->alamat_npwp,
            'nomor_sia'=> $request->nomor_sia,
            'tgl_terbit_sia'=> $request->tgl_terbit_sia,
            'tgl_kadaluarsa_sia'=> $request->tgl_kadaluarsa_sia,
            'nomor_sipa'=> $request->nomor_sipa,
            'tgl_terbit_sipa'=> $request->tgl_terbit_sipa,
            'tgl_kadaluarsa_sipa'=> $request->tgl_kadaluarsa_sipa,
            'status'=> $request->status
            ]);

        }

        elseif($request->hasFile('image_siup_nib')){
            $image_siup_nib = $request->file('image_siup_nib');
            $image_siup_nib->storeAs('public/siup_nibs', $image_siup_nib->hashName());
            // delete old image
            Storage::delete('public/siup_nibs/'. $Toko->image_siup_nib);

            $Toko->update([


                'id_user'=> $request->id_user,
                'name'=> $request->name,
                'alamat'=> $request->alamat,
                'tipe_badan_usaha'=> $request->tipe_badan_usaha,
                'email'=> $request->email,
                'nohp'=> $request->nohp,
                'tipe_toko'=> $request->tipe_toko,
                'latitude'=> $request->latitude,
                'longitude'=> $request->longitude,
                'provinsi'=> $request->provinsi,
                'kabupaten'=> $request->kabupaten,
                'deskripsi'=> $request->deskripsi,
                'like'=> $request->like,
                'bintang'=> $request->bintang,
                'kurir'=> $request->kurir,
                'follow'=> $request->follow,
                'facebook'=> $request->facebook,
                'tiktok'=> $request->tiktok,
                'instagram'=> $request->instagram,
                'whatsapp'=> $request->whatsapp,
                'nama_direktur'=> $request->nama_direktur,
                'nama_pic_toko'=> $request->nama_pic_toko,
                'nama_apoteker'=> $request->nama_apoteker,
                'image_siup_nib'=>  $image_siup_nib->hashName(),
                'nomor_siup_nib'=> $request->nomor_siup_nib,
                'bank'=> $request->bank,
                'norek'=> $request->norek,
                'nama_npwp'=> $request->nama_npwp,
                'alamat_npwp'=> $request->alamat_npwp,
                'nomor_sia'=> $request->nomor_sia,
                'tgl_terbit_sia'=> $request->tgl_terbit_sia,
                'tgl_kadaluarsa_sia'=> $request->tgl_kadaluarsa_sia,
                'nomor_sipa'=> $request->nomor_sipa,
                'tgl_terbit_sipa'=> $request->tgl_terbit_sipa,
                'tgl_kadaluarsa_sipa'=> $request->tgl_kadaluarsa_sipa,
                'status'=> $request->status
                ]);

        }

        elseif($request->hasFile('image_ktp')){
            $image_ktp = $request->file('image_ktp');
            $image_ktp->storeAs('public/ktps', $image_ktp->hashName());
            // delete old image
            Storage::delete('public/ktps/'. $Toko->image_ktp);

            $Toko->update([


                'id_user'=> $request->id_user,
                'name'=> $request->name,
                'alamat'=> $request->alamat,
                'tipe_badan_usaha'=> $request->tipe_badan_usaha,
                'email'=> $request->email,
                'nohp'=> $request->nohp,
                'tipe_toko'=> $request->tipe_toko,
                'latitude'=> $request->latitude,
                'longitude'=> $request->longitude,
                'provinsi'=> $request->provinsi,
                'kabupaten'=> $request->kabupaten,
                'deskripsi'=> $request->deskripsi,
                'like'=> $request->like,
                'bintang'=> $request->bintang,
                'kurir'=> $request->kurir,
                'follow'=> $request->follow,
                'facebook'=> $request->facebook,
                'tiktok'=> $request->tiktok,
                'instagram'=> $request->instagram,
                'whatsapp'=> $request->whatsapp,
                'nama_direktur'=> $request->nama_direktur,
                'nama_pic_toko'=> $request->nama_pic_toko,
                'nama_apoteker'=> $request->nama_apoteker,
                'nomor_siup_nib'=> $request->nomor_siup_nib,
                'image_ktp'=>  $image_ktp->hashName(),
                'bank'=> $request->bank,
                'norek'=> $request->norek,
                'nama_npwp'=> $request->nama_npwp,
                'alamat_npwp'=> $request->alamat_npwp,
                'nomor_sia'=> $request->nomor_sia,
                'tgl_terbit_sia'=> $request->tgl_terbit_sia,
                'tgl_kadaluarsa_sia'=> $request->tgl_kadaluarsa_sia,
                'nomor_sipa'=> $request->nomor_sipa,
                'tgl_terbit_sipa'=> $request->tgl_terbit_sipa,
                'tgl_kadaluarsa_sipa'=> $request->tgl_kadaluarsa_sipa,
                'status'=> $request->status
                ]);

        }

        elseif($request->hasFile('image_buku_tabungan')){
            $image_buku_tabungan= $request->file('image_buku_tabungan');
            $image_buku_tabungan->storeAs('public/buku_tabungans', $image_buku_tabungan->hashName());
            // delete old image
            Storage::delete('public/buku_tabungans/'. $Toko->image_buku_tabungan);

            $Toko->update([


                'id_user'=> $request->id_user,
                'name'=> $request->name,
                'alamat'=> $request->alamat,
                'tipe_badan_usaha'=> $request->tipe_badan_usaha,
                'email'=> $request->email,
                'nohp'=> $request->nohp,
                'tipe_toko'=> $request->tipe_toko,
                'latitude'=> $request->latitude,
                'longitude'=> $request->longitude,
                'provinsi'=> $request->provinsi,
                'kabupaten'=> $request->kabupaten,
                'deskripsi'=> $request->deskripsi,
                'like'=> $request->like,
                'bintang'=> $request->bintang,
                'kurir'=> $request->kurir,
                'follow'=> $request->follow,
                'facebook'=> $request->facebook,
                'tiktok'=> $request->tiktok,
                'instagram'=> $request->instagram,
                'whatsapp'=> $request->whatsapp,
                'nama_direktur'=> $request->nama_direktur,
                'nama_pic_toko'=> $request->nama_pic_toko,
                'nama_apoteker'=> $request->nama_apoteker,
                'nomor_siup_nib'=> $request->nomor_siup_nib,
                'bank'=> $request->bank,
                'norek'=> $request->norek,
                'image_buku_tabungan'=> $image_buku_tabungan->hashName(),
                'nama_npwp'=> $request->nama_npwp,
                'alamat_npwp'=> $request->alamat_npwp,
                'nomor_sia'=> $request->nomor_sia,
                'tgl_terbit_sia'=> $request->tgl_terbit_sia,
                'tgl_kadaluarsa_sia'=> $request->tgl_kadaluarsa_sia,
                'nomor_sipa'=> $request->nomor_sipa,
                'tgl_terbit_sipa'=> $request->tgl_terbit_sipa,
                'tgl_kadaluarsa_sipa'=> $request->tgl_kadaluarsa_sipa,
                'status'=> $request->status
                ]);

        }

        elseif($request->hasFile('image_npwp')){
            $image_npwp= $request->file('image_npwp');
            $image_npwp->storeAs('public/npwps', $image_npwp->hashName());
            // delete old image
            Storage::delete('public/npwps/'. $Toko->image_npwp);

            $Toko->update([


                'id_user'=> $request->id_user,
                'name'=> $request->name,
                'alamat'=> $request->alamat,
                'tipe_badan_usaha'=> $request->tipe_badan_usaha,
                'email'=> $request->email,
                'nohp'=> $request->nohp,
                'tipe_toko'=> $request->tipe_toko,
                'latitude'=> $request->latitude,
                'longitude'=> $request->longitude,
                'provinsi'=> $request->provinsi,
                'kabupaten'=> $request->kabupaten,
                'deskripsi'=> $request->deskripsi,
                'like'=> $request->like,
                'bintang'=> $request->bintang,
                'kurir'=> $request->kurir,
                'follow'=> $request->follow,
                'facebook'=> $request->facebook,
                'tiktok'=> $request->tiktok,
                'instagram'=> $request->instagram,
                'whatsapp'=> $request->whatsapp,
                'nama_direktur'=> $request->nama_direktur,
                'nama_pic_toko'=> $request->nama_pic_toko,
                'nama_apoteker'=> $request->nama_apoteker,
                'nomor_siup_nib'=> $request->nomor_siup_nib,
                'bank'=> $request->bank,
                'norek'=> $request->norek,
                'image_npwp'=>  $image_npwp->hashName(),
                'nama_npwp'=> $request->nama_npwp,
                'alamat_npwp'=> $request->alamat_npwp,
                'nomor_sia'=> $request->nomor_sia,
                'tgl_terbit_sia'=> $request->tgl_terbit_sia,
                'tgl_kadaluarsa_sia'=> $request->tgl_kadaluarsa_sia,
                'nomor_sipa'=> $request->nomor_sipa,
                'tgl_terbit_sipa'=> $request->tgl_terbit_sipa,
                'tgl_kadaluarsa_sipa'=> $request->tgl_kadaluarsa_sipa,
                'status'=> $request->status
                ]);

        }

        elseif($request->hasFile('image_sia')){
            $image_sia= $request->file('image_sia');
            $image_sia->storeAs('public/sias', $image_sia->hashName());
            // delete old image
            Storage::delete('public/sias/'. $Toko->image_sia);

            $Toko->update([


                'id_user'=> $request->id_user,
                'name'=> $request->name,
                'alamat'=> $request->alamat,
                'tipe_badan_usaha'=> $request->tipe_badan_usaha,
                'email'=> $request->email,
                'nohp'=> $request->nohp,
                'tipe_toko'=> $request->tipe_toko,
                'latitude'=> $request->latitude,
                'longitude'=> $request->longitude,
                'provinsi'=> $request->provinsi,
                'kabupaten'=> $request->kabupaten,
                'deskripsi'=> $request->deskripsi,
                'like'=> $request->like,
                'bintang'=> $request->bintang,
                'kurir'=> $request->kurir,
                'follow'=> $request->follow,
                'facebook'=> $request->facebook,
                'tiktok'=> $request->tiktok,
                'instagram'=> $request->instagram,
                'whatsapp'=> $request->whatsapp,
                'nama_direktur'=> $request->nama_direktur,
                'nama_pic_toko'=> $request->nama_pic_toko,
                'nama_apoteker'=> $request->nama_apoteker,
                'nomor_siup_nib'=> $request->nomor_siup_nib,
                'bank'=> $request->bank,
                'norek'=> $request->norek,
                'nama_npwp'=> $request->nama_npwp,
                'alamat_npwp'=> $request->alamat_npwp,
                'image_sia'=>  $image_sia->hashName(),
                'nomor_sia'=> $request->nomor_sia,
                'tgl_terbit_sia'=> $request->tgl_terbit_sia,
                'tgl_kadaluarsa_sia'=> $request->tgl_kadaluarsa_sia,
                'nomor_sipa'=> $request->nomor_sipa,
                'tgl_terbit_sipa'=> $request->tgl_terbit_sipa,
                'tgl_kadaluarsa_sipa'=> $request->tgl_kadaluarsa_sipa,
                'status'=> $request->status
                ]);
        }
        elseif($request->hasFile('image_sipa')){
            $image_sipa= $request->file('image_sipa');
            $image_sipa->storeAs('public/sipas', $image_sipa->hashName());
            // delete old image
            Storage::delete('public/sipas/'. $Toko->image_sipa);

            $Toko->update([


                'id_user'=> $request->id_user,
                'name'=> $request->name,
                'alamat'=> $request->alamat,
                'tipe_badan_usaha'=> $request->tipe_badan_usaha,
                'email'=> $request->email,
                'nohp'=> $request->nohp,
                'tipe_toko'=> $request->tipe_toko,
                'latitude'=> $request->latitude,
                'longitude'=> $request->longitude,
                'provinsi'=> $request->provinsi,
                'kabupaten'=> $request->kabupaten,
                'deskripsi'=> $request->deskripsi,
                'like'=> $request->like,
                'bintang'=> $request->bintang,
                'kurir'=> $request->kurir,
                'follow'=> $request->follow,
                'facebook'=> $request->facebook,
                'tiktok'=> $request->tiktok,
                'instagram'=> $request->instagram,
                'whatsapp'=> $request->whatsapp,
                'nama_direktur'=> $request->nama_direktur,
                'nama_pic_toko'=> $request->nama_pic_toko,
                'nama_apoteker'=> $request->nama_apoteker,
                'nomor_siup_nib'=> $request->nomor_siup_nib,
                'bank'=> $request->bank,
                'norek'=> $request->norek,
                'nama_npwp'=> $request->nama_npwp,
                'alamat_npwp'=> $request->alamat_npwp,
                'nomor_sia'=> $request->nomor_sia,
                'tgl_terbit_sia'=> $request->tgl_terbit_sia,
                'tgl_kadaluarsa_sia'=> $request->tgl_kadaluarsa_sia,
                'image_sipa'=>  $image_sipa->hashName(),
                'nomor_sipa'=> $request->nomor_sipa,
                'tgl_terbit_sipa'=> $request->tgl_terbit_sipa,
                'tgl_kadaluarsa_sipa'=> $request->tgl_kadaluarsa_sipa,
                'status'=> $request->status
                ]);
        }
        elseif($request->hasFile('image_cv_pt')){
            $image_cv_pt= $request->file('image_cv_pt');
            $image_cv_pt->storeAs('public/cv_pts', $image_cv_pt->hashName());
            // delete old image
            Storage::delete('public/cv_pts/'. $Toko->image_cv_pt);

            $Toko->update([


                'id_user'=> $request->id_user,
                'name'=> $request->name,
                'alamat'=> $request->alamat,
                'tipe_badan_usaha'=> $request->tipe_badan_usaha,
                'email'=> $request->email,
                'nohp'=> $request->nohp,
                'tipe_toko'=> $request->tipe_toko,
                'latitude'=> $request->latitude,
                'longitude'=> $request->longitude,
                'provinsi'=> $request->provinsi,
                'kabupaten'=> $request->kabupaten,
                'deskripsi'=> $request->deskripsi,
                'like'=> $request->like,
                'bintang'=> $request->bintang,
                'kurir'=> $request->kurir,
                'follow'=> $request->follow,
                'facebook'=> $request->facebook,
                'tiktok'=> $request->tiktok,
                'instagram'=> $request->instagram,
                'whatsapp'=> $request->whatsapp,
                'nama_direktur'=> $request->nama_direktur,
                'nama_pic_toko'=> $request->nama_pic_toko,
                'nama_apoteker'=> $request->nama_apoteker,
                'image_cv_pt'=>$image_cv_pt->hashName(),
                'nomor_siup_nib'=> $request->nomor_siup_nib,
                'bank'=> $request->bank,
                'norek'=> $request->norek,
                'nama_npwp'=> $request->nama_npwp,
                'alamat_npwp'=> $request->alamat_npwp,
                'nomor_sia'=> $request->nomor_sia,
                'tgl_terbit_sia'=> $request->tgl_terbit_sia,
                'tgl_kadaluarsa_sia'=> $request->tgl_kadaluarsa_sia,
                'nomor_sipa'=> $request->nomor_sipa,
                'tgl_terbit_sipa'=> $request->tgl_terbit_sipa,
                'tgl_kadaluarsa_sipa'=> $request->tgl_kadaluarsa_sipa,
                'status'=> $request->status
                ]);
        }

        else {
            // update Toko without image
            $Toko->update([


                'id_user'=> $request->id_user,
                'name'=> $request->name,
                'alamat'=> $request->alamat,
                'tipe_badan_usaha'=> $request->tipe_badan_usaha,
                'email'=> $request->email,
                'nohp'=> $request->nohp,
                'tipe_toko'=> $request->tipe_toko,
                'latitude'=> $request->latitude,
                'longitude'=> $request->longitude,
                'provinsi'=> $request->provinsi,
                'kabupaten'=> $request->kabupaten,
                'deskripsi'=> $request->deskripsi,
                'like'=> $request->like,
                'bintang'=> $request->bintang,
                'kurir'=> $request->kurir,
                'follow'=> $request->follow,
                'facebook'=> $request->facebook,
                'tiktok'=> $request->tiktok,
                'instagram'=> $request->instagram,
                'whatsapp'=> $request->whatsapp,
                'nama_direktur'=> $request->nama_direktur,
                'nama_pic_toko'=> $request->nama_pic_toko,
                'nama_apoteker'=> $request->nama_apoteker,
                'nomor_siup_nib'=> $request->nomor_siup_nib,
                'bank'=> $request->bank,
                'norek'=> $request->norek,
                'nama_npwp'=> $request->nama_npwp,
                'alamat_npwp'=> $request->alamat_npwp,
                'nomor_sia'=> $request->nomor_sia,
                'tgl_terbit_sia'=> $request->tgl_terbit_sia,
                'tgl_kadaluarsa_sia'=> $request->tgl_kadaluarsa_sia,
                'nomor_sipa'=> $request->nomor_sipa,
                'tgl_terbit_sipa'=> $request->tgl_terbit_sipa,
                'tgl_kadaluarsa_sipa'=> $request->tgl_kadaluarsa_sipa,
                'status'=> $request->status
                ]);
        }

        notifikasi::create([
            'id_user'   => $request->id_user,
            'aksi'      => 'Mengubah data toko '.$request->name,
            'date'      => now()
        ]);

        //redirect to Toko index
        return redirect()->route('toko.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy(string $id)
    {
        // get Toko by id
        $Toko = Toko::findOrFail($id);

        // delete image
        Storage::delete('public/Tokos/'. $Toko->image);
        Storage::delete('public/siup_nibs/'. $Toko->image_siup_nib);
        Storage::delete('public/ktps/'. $Toko->image_ktp);
        Storage::delete('public/buku_tabungans/'. $Toko->image_buku_tabungan);
        Storage::delete('public/npwps/'. $Toko->image_npwp);
        Storage::delete('public/sias/'. $Toko->image_sia);
        Storage::delete('public/sipas/'. $Toko->image_sipa);
        Storage::delete('public/cv_pts/'. $Toko->image_cv_pt);

        // delete Toko
        $Toko->delete();



        //redirect to Toko index
        return redirect()->route('toko.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
