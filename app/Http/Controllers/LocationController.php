<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Users;

class LocationController extends Controller
{
    public function store(Request $request)
    {
        Location::create([
            'id_user' => $request->id_user,
            'nama_tempat' => $request->nama_tempat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        $id   = $request->id_user;
        //dd($id);
        $user = Users::findOrFail($id);
        //dd($user);
        $user->update([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude

          ]);
         // dd("Sampai di sini");


         Log::error('Terjadi kesalahan di controller');
          return redirect()->route('tutup')->with('success', 'Lokasi berhasil disimpan');
       //return back()->with('success', 'Lokasi berhasil disimpan!');
    }
}
