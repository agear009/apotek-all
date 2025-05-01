<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Keranjang extends Model
{
    /** @use HasFactory<\Database\Factories\KeranjangFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'id_produk',
        'id_toko',
        'id_user',
        'jumlah',
        'dilihatuser',
        'dilihattoko',
        'tipe_barang',
        'price',
        'image',
        'berat',
        'status',
        'jumlah_maksimal_beli',
        'ongkir_toko',
        'ongkir'
        ];

        public function obat()
        {
            return $this->belongsTo(Obat::class, 'id_obat');
        }

        public function getListImageObatById($id_user)
        {
            $getListImageObatById= DB::table('keranjangs')
                ->join('obats','keranjangs.id_produk','=','obats.id')
                ->where('keranjangs.id_user','=',$id_user)
                ->select('keranjangs.*','obats.images AS ImageObat')
                ->get();
            return $getListImageObatById;
        }

        public function getListShoppingCart()
        {

            $id_user = Auth::id(); // Ambil ID user yang sedang login
            $user = Auth::user(); // Ambil data user yang sedang login

            // Cek apakah user adalah admin
            /**if (!$user || $user->level === 'Admin') {
                // Jika admin, tampilkan semua data keranjang
                $listshoppingCarts = DB::table('keranjangs')
                    ->join('obats', 'keranjangs.id_produk', '=', 'obats.id')
                    ->select(
                        'keranjangs.*',
                        'obats.image AS obats_image',
                        'obats.price AS obats_price'
                    )
                    ->get();
            } else {
            $id_user = Auth::id(); // Ambil ID user yang sedang login
            $listshoppingCarts = DB::table('keranjangs')
                                    ->join('obats','keranjangs.id_produk','=','obats.id')
                                    ->select('keranjangs.*','obats.image AS obats_image','obats.price AS obats_price')
                                    ->where('keranjangs.id_user', $id_user) // Filter berdasarkan user_id
                                    ->get();
            }*/
            if (!$user || $user->level === 'Admin') {
                // Jika admin, tampilkan semua data keranjang
                $listshoppingCarts = DB::table('keranjangs')
                    ->leftJoin('obats', 'keranjangs.id_produk', '=', 'obats.id') // Join dengan obats
                    ->leftJoin('produks', 'keranjangs.id_produk', '=', 'produks.id') // Join dengan produks
                    ->leftJoin('tokos', 'keranjangs.id_toko', '=', 'tokos.id') // Join dengan tokos
                    ->leftJoin('users', 'keranjangs.id_user', '=', 'users.id') // Join dengan users
                    ->select(
                        'keranjangs.*',
                        'obats.image AS obats_image',
                        'obats.price AS obats_price',
                        'produks.image AS produks_image',
                        'produks.price AS produks_price',
                        'tokos.name AS toko_name',
                        'tokos.ongkir_toko AS ongkir_toko',
                        'tokos.ongkir AS ongkir',
                        'tokos.id AS toko_id',
                        'tokos.kurir AS nama_pengirim',
                        'tokos.ongkir AS ongkos_kirim',
                        'users.name AS nama_pemesan',
                        'users.nohp AS no_hp',
                        'users.email AS email',
                        'users.alamat AS alamat_tujuan',
                        'users.kabupatenkota AS kota',
                        'users.provinsi AS provinsi',
                        'users.kode_pos AS kode_pos'
                    )
                    ->get();
            } else {
                $id_user = Auth::id(); // Ambil ID user yang sedang login
                $listshoppingCarts = DB::table('keranjangs')
                    ->leftJoin('obats', 'keranjangs.id_produk', '=', 'obats.id') // Join dengan obats
                    ->leftJoin('produks', 'keranjangs.id_produk', '=', 'produks.id') // Join dengan produks
                    ->leftJoin('tokos', 'keranjangs.id_toko', '=', 'tokos.id') // Join dengan tokos
                    ->leftJoin('users', 'keranjangs.id_user', '=', 'users.id') // Join dengan users
                    ->select(
                        'keranjangs.*',
                        'obats.image AS obats_image',
                        'obats.price AS obats_price',
                        'produks.image AS produks_image',
                        'produks.price AS produks_price',
                        'tokos.name AS toko_name',
                        'tokos.ongkir_toko AS ongkir_toko',
                        'tokos.ongkir AS ongkir',
                        'tokos.id AS toko_id',
                        'tokos.kurir AS nama_pengirim',
                        'tokos.ongkir AS ongkos_kirim',
                        'users.name AS nama_pemesan',
                        'users.nohp AS no_hp',
                        'users.email AS email',
                        'users.alamat AS alamat_tujuan',
                        'users.kabupatenkota AS kota',
                        'users.provinsi AS provinsi',
                        'users.kode_pos AS kode_pos'

                    )
                    ->where('keranjangs.id_user', $id_user) // Filter berdasarkan user_id
                    ->get();
            }

            return $listshoppingCarts;


        }
}
