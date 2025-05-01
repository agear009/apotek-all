<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $fillable = [
        'id_produk',
        'id_user',
        'id_toko',
        'waktu_order',
        'waktu_pengiriman',
        'perkiraan_sampai',
        'nama_pengirim',
        'jumlah',
        'harga',
        'ongkir',
        'total_harga',
        'jenis_pembayaran',
        'keterangan',
        'status',
        'id_toko'

        ];
}
