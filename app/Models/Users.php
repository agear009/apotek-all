<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /** @use HasFactory<\Database\Factories\UsersFactory> */
    use HasFactory;

    protected $fillable = [
    'name',
    'email',
    'foto',
    'nohp',
    'level',
    'status',
    'id_toko',
    'norek',
    'saldo',
    'bank',
    'password',
    'spesialis',
    'praktek',
    'alamat',
    'google_id',
    'google_token',
    'google_refresh_token',
    'latitude',
    'longitude',
    'provinsi',
    'kabupatenkota',
    'kode_pos'
    ];
}
