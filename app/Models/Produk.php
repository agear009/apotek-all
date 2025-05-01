<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;
    protected $fillable = [
        'categories',
        'name',
        'image',
        'description',
        'price',
        'merek',
        'status',
        'stock',
        'promo',
        'best_seller',
        'jumlah_penjualan',
        'jumlah_maksimal_beli',
        'berat',
        'harga_coret',
        'produksi',
        'produsen',
        'id_toko'
        ];

        public function getNamaCategoriProduk($id_kategori = null)
    {

        $query = DB::table('produks')
            ->leftJoin('categories', 'produks.category', '=', 'categories.id')
            ->leftJoin('tokos', 'produks.id_toko', '=', 'tokos.id')
            ->select(
                'produks.*',
                'categories.name AS kategori_name',
                'tokos.name AS nama_toko',
                'tokos.kabupaten AS kota_toko'
            );

        // Hapus semua pembatasan user/toko

        // Filter kategori jika dikirim
        if (!is_null($id_kategori)) {
            $query->where('produks.category', $id_kategori);
        }

        // Filter status aktif
        $query->where('produks.status', 'aktif');


        return $query->orderBy('produks.id', 'ASC')->get();
    }
}
