<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Location;

class MapController extends Controller
{
    public function index()
    {
        $locations = Location::where('id_user', 'LIKE', '%Apotek%')->get();
        return view('Page.Maps', compact('locations'));
    }
    public function show()
    {
        $locations = Location::where('id_user', 'LIKE', '%Apotek%')->get();
        return view('Page.PilihMaps', compact('locations'));
    }
}

