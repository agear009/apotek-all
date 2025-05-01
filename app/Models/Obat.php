<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Obat extends Model
{
    /** @use HasFactory<\Database\Factories\ObatFactory> */
    use HasFactory;
    protected $fillable = [
            'id_toko',
            'category',
            'name',
            'image',
            'dosis',
            'bentuk',
            'aturan_pakai',
            'komposisi',
            'kemasan',
            'resep',
            'jenis_obat',
            'jangan_digunakan_oleh',
            'efek_samping',
            'kadaluarsa',
            'produksi',
            'produsen',
            'deskripsi',
            'price',
            'harga_beli',
            'status',
            'stock',
            'promo',
            'merek',
            'best_seller',
            'jumlah_penjualan',
            'jumlah_maksimal_beli',
            'berat',
            'harga_coret',

        ];

            // Relasi ke model Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }

    public static function getListImageObatById($userId)
    {
        return self::where('id_user', $userId)->pluck('image');
    }

    public function getNamaCategoriObats($id_kategori = null)
    {
        $query = DB::table('obats')
            ->leftJoin('kategori_obats', 'obats.category', '=', 'kategori_obats.id')
            ->leftJoin('tokos', 'obats.id_toko', '=', 'tokos.id')
            ->select(
                'obats.*',
                'kategori_obats.name AS kategori_name',
                'tokos.name AS nama_toko',
                'tokos.kabupaten AS kota_toko',
                'tokos.ongkir_toko AS ongkir_toko',
                'tokos.ongkir AS ongkir',
                'tokos.id AS toko_id'
            );

        // Hapus semua pembatasan user/toko

        // Filter kategori jika dikirim
        if (!is_null($id_kategori)) {
            $query->where('obats.category', $id_kategori);
        }

        // Filter status aktif
        $query->where('obats.status', 'aktif');
        // Ini penting
        $query->where('obats.status', 'aktif');

        return $query->orderBy('obats.id', 'ASC')->get();
    }



}
