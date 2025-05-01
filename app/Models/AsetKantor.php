<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetKantor extends Model
{
    /** @use HasFactory<\Database\Factories\AsetKantorFactory> */
    use HasFactory;
    protected $fillable = [
        'category',
        'image',
        'name',
        'deskripsi',
        'pemilik',
        'harga',
        'id_toko'
        ];
}
