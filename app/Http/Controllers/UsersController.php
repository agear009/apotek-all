<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Post;
use App\Models\Keranjang;
use App\Models\Notifikasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index() : View
    {


        if (request('search')) {

            //$user=Users::where('name','=',request('search'))->get();
           $user=Users::where('name','LIKE','%'.request('search').'%')->get();


           //dd($user);

           $no = 0;
           $no++;
           //$tableName='produks';
           //$sql = "SELECT COUNT(*) AS total_data FROM $tableName";
           //$result = $conn->query($sql);

           $userall = users::all();
           $produkcount = Produk::count();
           $ordercount = Order::count();
           $postcount = Post::count();
           $keranjangcount = Keranjang::count();
           $provinsi = Provinsi::all();
           $kota = Kota::all();
           $kelurahan = Kelurahan::all();
           return view('User.Index', ["title" => "Control Panel", "active" => "Home"], compact('user','produkcount','postcount','ordercount','keranjangcount','no','provinsi','kota','kelurahan'));
            }

        else{
            $no = 0;
            $no++;
            //$tableName='produks';
            //$sql = "SELECT COUNT(*) AS total_data FROM $tableName";
            //$result = $conn->query($sql);

            $user = users::all();
            $produkcount = Produk::count();
            $ordercount = Order::count();
            $postcount = Post::count();
            $keranjangcount = Keranjang::count();
           $provinsi = Provinsi::all();
            $kota = Kota::all();
            $kelurahan = Kelurahan::all();
            return view('User.Index', ["title" => "Control Panel", "active" => "Home"], compact('user','produkcount','postcount','ordercount','keranjangcount','no','provinsi','kota','kelurahan'));



            }

        $no = 0;
        $no++;
        //$tableName='produks';
        //$sql = "SELECT COUNT(*) AS total_data FROM $tableName";
        //$result = $conn->query($sql);

        $user = users::latest();
        $produkcount = Produk::count();
        $ordercount = Order::count();
        $postcount = Post::count();
        $keranjangcount = Keranjang::count();
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $kelurahan = Kelurahan::all();
        return view('User.Index', ["title" => "Control Panel", "active" => "Home"], compact('user','produkcount','postcount','ordercount','keranjangcount','no','provinsi','kota','kelurahan'));
    }

    public function create() : View
    {
        $user = users::latest();
        $produkcount = Produk::count();
        $ordercount = Order::count();
        $postcount = Post::count();
        $keranjangcount = Keranjang::count();
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $kelurahan = Kelurahan::all();
        return view('User.Create', ["title" => "Post", "active" => "Post"], compact('user','produkcount','postcount','ordercount','keranjangcount','provinsi','kota','kelurahan'));

    }

    public function show(): View
    {
        $id=Auth::user()->id;
        $user = users::findOrFail($id);
        $produkcount = Produk::count();
        $ordercount = Order::count();
        $postcount = Post::count();
        $keranjangcount = Keranjang::count();
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $kelurahan = Kelurahan::all();

        //$user = users::findOrFail($id);
        return view('Admin.Index_User', ["title" => "Post", "active" => "User"], compact('user','produkcount','postcount','ordercount','keranjangcount','provinsi','kota','kelurahan'));

    }

    public function store(Request $request): RedirectResponse
    {
        // validate form
        $validated = $request->validate([

        'name'=>'required|max:255',
        'email'=>'required|max:255',
        'foto'=>'image|mimes:jpeg,jpg,png',
        'nohp'=>'required|max:255',
        'level'=>'required',
        'status'=>'required|max:255',
        'id_transaksi'=>'required',
        'norek'=>'required',
        'saldo'=>'required',
        'bank'=>'required',
         'password'=>'required'
        ]);

        // upload image
        $image = $request->file('foto');
        $image->storeAs('public/users', $image->hashName());

        // create post
        users::create([
           'name'=>$request->name,
            'email'=>$request->email,
            'foto'=>$image->hashName(),
            'nohp'=>$request->nohp,
            'level'=>$request->level,
            'status'=>$request->status,
            'id_transaksi'=>$request->id_transaksi,
            'norek'=>$request->norek,
            'saldo'=>$request->saldo,
            'bank'=>$request->bank,
            'password'=>Hash::make($request->password),
            'spesialis'=>$request->spesialis,
            'praktek'=>$request->praktek,
            'alamat'=>$request->alamat,
			'latitude' => $request->latitude,
			'longitude' => $request->longitude,
			'provinsi' => $request->provinsi,
			'kabupatenkota' => $request->kabupatenkota
        ]);

        // create notification
        Notifikasi::create([
            'id_user'   => $request->name,
            'aksi'      => 'Menambah User',
            'date'      => now()
        ]);

        return redirect('/user')->with('success',' successfull! ');
    }

    public function edit(string $id)
      {
        // get post by id
        $user = users::findOrFail($id);
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $kelurahan = Kelurahan::all();
        return view('User.Edit', ["title" => "Post", "active" => "Edit"], compact('user','provinsi','kota','kelurahan'));
    }

    public function update(Request $request, $id)
    {
        // validate form
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'foto'=>'image|mimes:jpeg,jpg,png',
            'nohp'=>'required|max:255'

        ]);

        // get post by id
        //dd($id);
        $user = users::findOrFail($id);

        if( $user->password === $request->password){


        //dd($user);
        // check if new image is uploaded
                    if ($request->hasFile('foto')) {
                        //upload new image
                        $image = $request->file('foto');
                        $image->storeAs('public/users/', $image->hashName());

                        // delete old image
                        Storage::delete('public/users/'. $user->foto);
                        // update post with new image
                        $user->update([
                        'name'=>$request->name,
                                'email'=>$request->email,
                                'foto'=>$image->hashName(),
                                'nohp'=>$request->nohp,
                                'level'=>$request->level,
                                'status'=>$request->status,
                                'id_transaksi'=>$request->id_transaksi,
                                'norek'=>$request->norek,
                                'saldo'=>$request->saldo,
                                'bank'=>$request->bank,
                                'spesialis'=>$request->spesialis,
                                'praktek'=>$request->praktek,
                                'alamat'=>$request->alamat,
                                'latitude' => $request->latitude,
                                'longitude' => $request->longitude,
                                'provinsi' => $request->provinsi,
                                'kabupatenkota' => $request->kabupatenkota
                        ]);
                        }
                    else {
                        // update post without image
                        $user->update([
                            'name'=>$request->name,
                            'email'=>$request->email,
                            'nohp'=>$request->nohp,
                            'level'=>$request->level,
                            'status'=>$request->status,
                            'id_transaksi'=>$request->id_transaksi,
                            'norek'=>$request->norek,
                            'saldo'=>$request->saldo,
                            'bank'=>$request->bank,
                            'spesialis'=>$request->spesialis,
                            'praktek'=>$request->praktek,
                            'alamat'=>$request->alamat,
                            'latitude' => $request->latitude,
                            'longitude' => $request->longitude,
                            'provinsi' => $request->provinsi,
                            'kabupatenkota' => $request->kabupatenkota
                        ]);
                        }

     }

        else{
            //$password=Hash::make($request->password);
            //dd($password);
             // check if new image is uploaded
                if ($request->hasFile('foto')) {


                    //upload new image
                    $image = $request->file('foto');
                    $image->storeAs('public/users/', $image->hashName());

                    // delete old image
                    Storage::delete('public/users/'. $user->foto);
                    // update post with new image
                    $user->update([
                    'name'=>$request->name,
                            'email'=>$request->email,
                            'foto'=>$image->hashName(),
                            'nohp'=>$request->nohp,
                            'level'=>$request->level,
                            'status'=>$request->status,
                            'id_transaksi'=>$request->id_transaksi,
                            'norek'=>$request->norek,
                            'saldo'=>$request->saldo,
                            'bank'=>$request->bank,
                            'password'=>Hash::make($request->password),
                            'spesialis'=>$request->spesialis,
                            'praktek'=>$request->praktek,
                            'alamat'=>$request->alamat,
							'latitude' => $request->latitude,
							'longitude' => $request->longitude,
							'provinsi' => $request->provinsi,
							'kabupatenkota' => $request->kabupatenkota
                    ]);
                }
                else {

                    //$password=Hash::make($request->password);
                    //dd($password);
                    // update post without image
                    $user->update([
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'nohp'=>$request->nohp,
                        'level'=>$request->level,
                        'status'=>$request->status,
                        'id_transaksi'=>$request->id_transaksi,
                        'norek'=>$request->norek,
                        'saldo'=>$request->saldo,
                        'bank'=>$request->bank,
                        'password'=>Hash::make($request->password),
                        'spesialis'=>$request->spesialis,
                        'praktek'=>$request->praktek,
                        'alamat'=>$request->alamat,
						'latitude' => $request->latitude,
						'longitude' => $request->longitude,
						'provinsi' => $request->provinsi,
						'kabupatenkota' => $request->kabupatenkota
                    ]);
                }

        }

        if ($user->Level=== Null || $user->level ==='' ){
            $user = users::findOrFail($id);
            $produkcount = Produk::count();
            $ordercount = Order::count();
            $postcount = Post::count();
            $keranjangcount = Keranjang::count();
            $provinsi = Provinsi::all();
            $kota = Kota::all();
            $kelurahan = Kelurahan::all();
            return view('Admin.Index_User', ["title" => "Control Panel", "active" => "Home"],  compact('user','produkcount','postcount','ordercount','keranjangcount','provinsi','kota','kelurahan'));

        }
        elseif($user->level ==='Belum_Ada')
        {
            $user = users::findOrFail($id);
            $produkcount = Produk::count();
            $ordercount = Order::count();
            $postcount = Post::count();
            $keranjangcount = Keranjang::count();
            $provinsi = Provinsi::all();
            $kota = Kota::all();
            $kelurahan = Kelurahan::all();
            return view('Admin.Index_User', ["title" => "Control Panel", "active" => "Home"],  compact('user','produkcount','postcount','ordercount','keranjangcount','no','provinsi','kota','kelurahan'));
        }

        elseif($user->level ==='User')
        {
            $user = users::findOrFail($id);
            $produkcount = Produk::count();
            $ordercount = Order::count();
            $postcount = Post::count();
            $keranjangcount = Keranjang::count();
            $provinsi = Provinsi::all();
            $kota = Kota::all();
            $kelurahan = Kelurahan::all();
            return view('Admin.Index_User', ["title" => "Control Panel", "active" => "Home"],  compact('user','produkcount','postcount','ordercount','keranjangcount','no','provinsi','kota','kelurahan'));
        }

        else{
           //$user = users::findOrFail($id);
          //redirect to post index
          $user = users::latest();
          $produkcount = Produk::count();
          $ordercount = Order::count();
          $postcount = Post::count();
          $keranjangcount = Keranjang::count();
          $provinsi = Provinsi::all();
          $kota = Kota::all();
          $kelurahan = Kelurahan::all();
          return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diubah!'], compact('user','produkcount','postcount','ordercount','keranjangcount','no','provinsi','kota','kelurahan'));
        }


    }


    public function destroy(string $id)
    {
        // get post by id
        $user = users::findOrFail($id);

        // delete image
        Storage::delete('public/users/'. $user->foto);

        // delete post
        $user->delete();

        //redirect to post index
        return redirect()->route('/user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Pencarian dengan Eloquent Query
        $posts = Post::where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%')
                    ->get();

        return view('posts.index', compact('posts', 'search'));
    }

}
