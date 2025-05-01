<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Users;
use App\Models\Post;
use App\Models\Keranjang;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    //
    public function Index(){

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
    public function create()
    {

        $order=Order::all();
        $produk=Produk::all();
        $user=Users::all();
        return view('Order.Create',["title"=>"order","active"=>"order"],compact('order','produk','user'));
    }


    public function store(Request $request): RedirectResponse
    {

        //dd($request);


        $validated = $request->validate([
        'id_produk'=>'required|max:255',
        'id_user'=>'required|max:255',
        'keterangan'=>'required',
        'status'=>'required|max:255',
        'jumlah'=>'required'
        ]);
        //$image=$request->file('image');
        //$image->storeAs('public/order/', $image->hashName());

        //$image-> storeAs('public/order', $image->hashName());
        $semuaharga=$request->harga*$request->jumlah;
        $total_harga=$semuaharga+$request->ongkir;
        order::create([
            'id_produk'=>$request->id_produk,
            'id_user'=>$request->id_user,
            'waktu_order'=>now(),
            'waktu_pengiriman'=>$request->id_user,
            'perkiraan_sampai'=>$request->id_user,
            'nama_pengirim'=>$request->nama_pengirim,
            'jumlah'=>$request->jumlah,
            'harga'=>$request->harga,
            'ongkir'=>$request->ongkir,
            'total_harga'=>$total_harga,
            'jenis_pembayaran',
            'keterangan'=>$request->keterangan,
            'status'=>$request->status
        ]);
        notifikasi::create([
            'id_user'=>$request->id_user,
            'aksi'=>'Menambah order',
            'date'=>now()
        ]);
        return redirect('/order')->with('success',' successfull! ');
    }


    public function edit(string $id)
    {
        $order=Order::findOrFail($id);
        $produk=Produk::all();
        $user=Users::all();
        return view('Order.Edit',["title"=>"order","active"=>"Edit"],compact('order','produk','user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'id_produk'=>'required|max:255',
        'id_user'=>'required|max:255',
        'keterangan'=>'required',
        'status'=>'required|max:255',
        'jumlah'=>'required'


        ]);
           // dd($request);
            $order=order::FindOrFail($id);


                //dd($request);
                //upload new image
                //$image=$request->file('image');
                //$image->storeAs('public/order/', $image->hashName());

                //$image->storeAs('public/order',$image->hashName());


                //delete old image
                //dd(Storage::delete('public/order/'.$order->image));
                //Storage::delete('public/order/'.$order->image);

                //update order with new image
                $order->update([
                    'id_produk'=>$request->id_produk,
                    'id_user'=>$request->id_user,
                    'waktu_pengiriman'=>$request->waktu_pengiriman,
                    'perkiraan_sampai'=>$request->perkiraan_sampai,
                    'nama_pengirim'=>$request->nama_pengirim,
                    'jumlah'=>$request->jumlah,
                    'harga'=>$request->harga,
                    'ongkir'=>$request->ongkir,
                    'total_harga'=>$request->total_harga,
                    'jenis_pembayaran',
                    'keterangan'=>$request->keterangan,
                    'status'=>$request->status


                ]);



            return redirect('/order')->with('success','Edit Berhasil! ');
    }


    public function destroy(string $id)
    {
        $order=order::findOrFail($id);

        //delete image
           //delete old image
           //Storage::delete('public/order/'.$order->image);



        // delete member
        $order->delete();

        //redirect to index
        return redirect()->route('order.index',["title"=>"order",'active'=>'User'])->with(['success'=>'data telah berhasil di delete!']);
    }
}
