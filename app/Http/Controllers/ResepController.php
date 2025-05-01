<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use App\Models\resep;
use App\Models\Post;
use App\Models\Keranjang;
use App\Models\Notifikasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class ResepController extends Controller
{
    //
    public function index(){

        if (request('search')) {

            //$user=Users::where('name','=',request('search'))->get();
           $resep=Resep::where('id_produk','LIKE','%'.request('search').'%')->get();

           $no=0;
           $no++;

           $produk=Produk::all();
           $usercount=User::where('level','=','Dokter')->count();
           $pasiencount=User::where('level','=','User')->count();
           $produkcount = Produk::count();
           $resepcount = Resep::count();
           $postcount = Post::count();
           $keranjangcount = Keranjang::count();
           return View('Resep.Index',["title"=>"Control Panel","active"=>"resep"],compact('resep','produk','usercount','pasiencount','no','produkcount','postcount','resepcount','keranjangcount'));

            }

        else{

            $no=0;
            $no++;

            $resep=Resep::all();
            $produk=Produk::all();
            $usercount=User::where('level','=','Dokter')->count();
            $pasiencount=User::where('level','=','User')->count();
            $produkcount = Produk::count();
            $resepcount = Resep::count();
            $postcount = Post::count();
            $keranjangcount = Keranjang::count();
            return View('Resep.Index',["title"=>"Control Panel","active"=>"resep"],compact('resep','produk','usercount','pasiencount','no','produkcount','postcount','resepcount','keranjangcount'));

            }


    }
    public function create()
    {

        $resep=Resep::all();
        $produk=Produk::all();
        $user=User::all();
        $dokter=User::where('level','=','Dokter')->get();
        $date=date("Ymd");
        $part1=date("his");
        $code=$date.$part1;
        return view('Resep.Create',["title"=>"resep","active"=>"resep"],compact('code','resep','produk','user','dokter'));
    }


    public function store(Request $request): RedirectResponse
    {

        //dd($request);


        $validated = $request->validate([
        'id_dokter'=>'required|max:255',
        'id_pasien'=>'required|max:255',
        'diagnosa'=>'required',
        'status'=>'required|max:255',
        ]);
        //$image=$request->file('image');
        //$image->storeAs('public/resep/', $image->hashName());

        //$image-> storeAs('public/resep', $image->hashName());
        // upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/reseps', $image->hashName());
            //dd($request);
            Resep::create([
                        'nomor_resep'=>$request->nomor_resep,
                        'id_dokter'=>$request->id_dokter,
                        'id_pasien'=>$request->id_pasien,
                        'image'=>$request->$image,
                        'tgl_diberikan'=>now(),
                        'diagnosa'=>$request->diagnosa,
                        'status'=>$request->status
            ]);
            Notifikasi::create([
                'id_user'=>$request->id_dokter,
                'aksi'=>'Menambah resep',
                'date'=>now()
            ]);
            return redirect('/resep')->with('success',' successfull! ');
        }
        else {
            Resep::create([
                'nomor_resep'=>$request->nomor_resep,
                'id_dokter'=>$request->id_dokter,
                'id_pasien'=>$request->id_pasien,
                'tgl_diberikan'=>now(),
                'diagnosa'=>$request->diagnosa,
                'status'=>$request->status
    ]);
    Notifikasi::create([
        'id_user'=>$request->id_dokter,
        'aksi'=>'Menambah resep',
        'date'=>now()
    ]);
    return redirect('/resep')->with('success',' successfull! ');

        }
    }


    public function edit(string $id)
    {
        $resep=Resep::findOrFail($id);
        $produk=Produk::all();
        $user=User::all();
        $produk=Produk::all();
        $user=User::all();
        $dokter=User::where('level','=','Dokter')->get();
        $date=date("Ymd");
        $part1=date("his");
        $code=$date.$part1;
        $modelresep = new resep;
        $nama_dokter=$modelresep->getListdokterById($id);
        return view('Resep.Edit',["title"=>"resep","active"=>"Edit"],compact('code','resep','produk','user','dokter','nama_dokter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'id_dokter'=>'required|max:255',
        'id_pasien'=>'required|max:255',
        'diagnosa'=>'required',
        'status'=>'required|max:255',


        ]);
            //dd($request);
            $resep=Resep::FindOrFail($id);


            $resep = Resep::findOrFail($id);

            // check if new image is uploaded
            if ($request->hasFile('image')) {
                //upload new image
                $image = $request->file('image');
                $image->storeAs('public/reseps/', $image->hashName());

                // delete old image
                Storage::delete('public/reseps/'. $resep->image);

                // update resep with new image
                $resep->update([
                    'nomor_resep'=>$request->nomor_resep,
                    'id_user'=>$request->id_user,
                    'image'=>$image->hashName(),
                    'tgl_diberikan'=>now(),
                    'diagnosa'=>$request->diagnosa,
                    'status'=>$request->status


                ]);
            }

            else {

                $resep->update([
                    'nomor_resep'=>$request->nomor_resep,
                    'id_user'=>$request->id_user,
                    'tgl_diberikan'=>now(),
                    'diagnosa'=>$request->diagnosa,
                    'status'=>$request->status
                ]);

            }



            return redirect('/resep')->with('success','Edit Berhasil! ');
    }


    public function destroy(string $id)
    {
        $resep=Resep::findOrFail($id);

        //delete image
           //delete old image
           Storage::delete('public/reseps/'.$resep->image);



        // delete member
        $resep->delete();

        //redirect to index
        return redirect()->route('resep.index',["title"=>"resep",'active'=>'User'])->with(['success'=>'data telah berhasil di delete!']);
    }
}
