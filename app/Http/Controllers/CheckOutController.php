<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Users;
use App\Models\CheckOut;
use App\Models\Notifikasi;
use App\Models\Obat;
use App\Models\KategoriObat;
use App\Models\Keranjang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        $user_id = Auth::id();

        // Validasi Data Input
        $validated = $request->validate([
            'nama_pemesan' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'produk_id' => 'required|array',
            'produk_id.*' => 'required',
            'nama_produk' => 'required|array',
            'nama_produk.*' => 'required',
            'toko_id' => 'required|array',
            'toko_id.*' => 'required',
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|integer|min:1',
            'harga' => 'required|array',
            'harga.*' => 'required|numeric|min:0',
            'status_checkout' => 'required',
            'tanggal_checkout' => 'required|date',
            'alamat_tujuan_pengiriman' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'metode_pengiriman' => 'required',
            'nama_pengirim' => 'required',
            'ongkos_kirim' => 'required|numeric',
            'metode_pembayaran' => 'required',
            'status_pembayaran' => 'required',
            'pajak' => 'required|numeric',
            'catatan' => 'nullable'
        ]);

            // Generate Order ID
            $produkIds = $request->input('produk_id');
            $tokoIds = $request->input('toko_id');
            $tanggalJam = now()->format('YmdHis'); // Menggunakan helper now()
            $order_id = sprintf("USER%d-BRG%s-TKO%s-%s", $user_id, implode('-', $produkIds), implode('-', $tokoIds), $tanggalJam);

        // Menghitung total pembayaran
        $total_pembayaran = array_sum(array_map(function ($harga, $jumlah) {
            return $harga * $jumlah;
        }, $request->harga, $request->jumlah)) + $request->ongkos_kirim + $request->pajak;

        // Simpan ke tabel `CheckOut`
        $checkout = CheckOut::create([
            'order_id' => $order_id, // Tambahkan order_id di sini
            'user_id' => $user_id,
            'nama_pemesan' => $request->nama_pemesan,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'toko_id' => json_encode($request->toko_id),
            'nama_toko' => json_encode($request->toko_name),
            'produk_id' => json_encode($request->produk_id),
            'nama_produk' => json_encode($request->nama_produk),
            'jumlah' => json_encode($request->jumlah),
            'harga' => json_encode($request->harga),
            'status_checkout' => $request->status_checkout,
            'tanggal_checkout' => $request->tanggal_checkout,
            'alamat_tujuan_pengiriman' => $request->alamat_tujuan_pengiriman,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
            'metode_pengiriman' => $request->metode_pengiriman,
            'nama_pengirim' => $request->nama_pengirim,
            'ongkos_kirim' => $request->ongkos_kirim,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_pembayaran' => $request->status_pembayaran,
            'total_pembayaran' => $total_pembayaran,
            'pajak' => $request->pajak,
            'catatan' => $request->catatan
        ]);

        // 🔹 **Integrasi Midtrans**
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => "INV-" . $checkout->id,
                'gross_amount' => $total_pembayaran,
            ],
            'customer_details' => [
                'first_name' => $request->nama_pemesan,
                'email' => $request->email,
                'phone' => $request->no_hp,
            ],
            'item_details' => array_map(function ($id, $name, $price, $quantity) {
                return [
                    'id' => $id,
                    'price' => $price,
                    'quantity' => $quantity,
                    'name' => $name
                ];
            }, $request->produk_id, $request->nama_produk, $request->harga, $request->jumlah)
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $checkout->update(['token_transaksi_midtrans' => $snapToken]);

        // 🔹 **Buat Notifikasi**
        Notifikasi::create([
            'id_user' => $user_id,
            'aksi' => 'Checkout Berhasil',
            'date' => now()
        ]);

        return redirect('/order')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function show(string $id)
    {
        // Ambil obat berdasarkan kategori dari request
        //$Obat = Obat::where('category', '=', $request->input('category'))->get();

        $KategoriObat = KategoriObat::where('id', $id)->first();
        $no = 1;

        // Periksa apakah kategori ditemukan

        $Obat = Obat::where('category', $KategoriObat->name)->get();
          //dd($Obat);
        // Hitung jumlah data terkait
        $produkcount = Produk::count();
        $ordercount = Order::count();
        $KeranjangObat = Keranjang::where('id_user', Auth::id())->get();

        return view('CheckOut.Show', [
            "title" => "Obat",
            "active" => "Obat"
        ], compact('KeranjangObat','Obat', 'no', 'produkcount', 'ordercount'));
    }

}
