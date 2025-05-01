<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriObat extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriObatFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'deskripsi',
        'id_toko'
        ];
}
