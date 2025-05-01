<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    /** @use HasFactory<\Database\Factories\CheckOutFactory> */
    use HasFactory;
    protected $fillable = [
        'order_id',
        'user_id',
        'nama_pemesan',
        'no_hp',
        'email',
        'produk_id',
        'nama_produk',
        'id_resep',
        'nama_dokter',
        'hasil_diagnosa',
        'toko_id',
        'nama_toko',
        'alamat_toko',
        'no_hp_toko',
        'jumlah',
        'harga',
        'status_checkout',
        'tanggal_checkout',
        'alamat_tujuan_pengiriman',
        'kota',
        'provinsi',
        'kode_pos',
        'metode_pengiriman',
        'nama_pengirim',
        'ongkos_kirim',
        'metode_pembayaran',
        'status_pembayaran',
        'token_transaksi_midtrans',
        'Total_pembayaran',
        'pajak',
        'catatan'
        ];
}
