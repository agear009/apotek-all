<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Resep extends Model
{
    /** @use HasFactory<\Database\Factories\ResepFactory> */
    use HasFactory;
    protected $fillable = [
        'id_dokter',
        'id_pasien',
        'nomor_resep',
        'diagnosa',
        'tgl_diberikan',
        'status',
        'image',
        'id_toko'
        ];

        public function getListdokterById($id)
        {
            $getListresepsById = DB::table('reseps')
                ->join('users','reseps.id_dokter','=','users.id')
                ->where('reseps.id','=',$id)
                ->select('reseps.*','users.name AS nama_dokter')
                ->get();
            return $getListresepsById;
        }
}
