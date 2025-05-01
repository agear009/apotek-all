<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\notifikasi;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Post;
use App\Models\Keranjang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NotificationController extends Controller
{
    public function index() : View
    {
        $no = 0;
        $no++;
        $produkcount = Produk::count();
        $ordercount = Order::count();
        $postcount = Post::count();
        $keranjangcount = Keranjang::count();
        $notification = notifikasi::all();
        return view('Notification.Index', ["title" => "Control Panel", "active" => "Home"], compact('notification','no','produkcount','postcount','ordercount','keranjangcount'));
    }




    public function destroy(string $id)
    {
        // get notification by id
        $notification = notifikasi::findOrFail($id);

        // delete notification
        $notification->delete();

        //redirect to notification index
        return redirect()->route('notification.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
