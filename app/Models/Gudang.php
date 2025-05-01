<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    /** @use HasFactory<\Database\Factories\GudangFactory> */
    use HasFactory;
    protected $fillable = [
        'category',
        'image',
        'name',
        'deskripsi',
        'status',
        'jumlah',
        'id_toko'
        ];
}
