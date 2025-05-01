<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    /** @use HasFactory<\Database\Factories\TokoFactory> */
    use HasFactory;
    protected $fillable = [
            'id_user',
            'name',
            'image',
            'alamat',
            'tipe_badan_usaha',
            'email',
            'nohp',
            'tipe_toko',
            'latitude',
            'longitude',
            'provinsi',
            'kabupaten',
            'deskripsi',
            'like',
            'bintang',
            'kurir',
            'follow',
            'facebook',
            'tiktok',
            'instagram',
            'whatsapp',
            'nama_direktur',
            'nama_pic_toko',
            'nama_apoteker',
            'image_cv_pt',
            'image_siup_nib',
            'nomor_siup_nib',
            'image_ktp',
            'bank',
            'norek',
            'image_buku_tabungan',
            'image_npwp',
            'nama_npwp',
            'alamat_npwp',
            'image_sia',
            'nomor_sia',
            'tgl_terbit_sia',
            'tgl_kadaluarsa_sia',
            'image_sipa',
            'nomor_sipa',
            'tgl_terbit_sipa',
            'tgl_kadaluarsa_sipa',
            'status',
            'ongkir_toko',
            'ongkir'
        ];
}
