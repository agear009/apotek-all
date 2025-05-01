<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['id_user','nama_tempat', 'latitude', 'longitude','id_toko'];
}
