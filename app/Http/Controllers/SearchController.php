<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;

class SearchController extends Controller
{
    public function user(Request $request)
    {
        if (request('search')) {

            $Users=Users::where('name','=',request('search'))->get();
           //$Users=Users::where('code','LIKE','%'.request('search').'%')->get('code');


           //dd($Users);

            return view('.Detail',["title"=>"Search","active"=>"index"],compact('Users'));
            }

        else{
            $Users=users::latest();
            return view('Index.Index',["title"=>"Search","active"=>"index"],compact('Users'));


            }

                $Users=Users::latest();
                //dd($Users);
                return view('Index.Detail',["title"=>"Search","active"=>"index"],compact('Users'));

    }
    public function cariData(Request $request)
    {
        $q = $request->get('q');

        $obats = DB::table('obats')
            ->where('nama', 'like', "%$q%")
            ->limit(5)
            ->get();

        $products = DB::table('produks')
            ->where('nama', 'like', "%$q%")
            ->limit(5)
            ->get();

        $html = '<ul class="list-unstyled mb-0">';
        foreach ($obats as $item) {
            $html .= '<li class="p-2 border-bottom">🩺 Obat: ' . $item->nama . '</li>';
        }
        foreach ($products as $item) {
            $html .= '<li class="p-2 border-bottom">📦 Produk: ' . $item->nama . '</li>';
        }

        if ($obats->isEmpty() && $products->isEmpty()) {
            $html .= '<li class="p-2">🔍 Tidak ditemukan.</li>';
        }

        $html .= '</ul>';

        return $html;
    }
}
