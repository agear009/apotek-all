<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Keranjang;
use App\Models\Notifikasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index() : View
    {


        if (request('search')) {

            //$user=Users::where('name','=',request('search'))->get();
           $post=Post::where('title','LIKE','%'.request('search').'%')->get();

           $no = 0;
           $no++;
;
           $produkcount = Produk::count();
           $ordercount = Order::count();
           $postcount = Post::count();
           $keranjangcount = Keranjang::count();
           return view('Post.Index', ["title" => "Control Panel", "active" => "Home"], compact('post','no','produkcount','postcount','ordercount','keranjangcount'));

            }

        else{

            $no = 0;
            $no++;

            $post = Post::all();
            $produkcount = Produk::count();
            $ordercount = Order::count();
            $postcount = Post::count();
            $keranjangcount = Keranjang::count();
            return view('Post.Index', ["title" => "Control Panel", "active" => "Home"], compact('post','no','produkcount','postcount','ordercount','keranjangcount'));

            }


    }

    public function create() : View
    {
        return view('Post.Create', ["title" => "Post", "active" => "Post"]);
    }

    public function store(Request $request): RedirectResponse
    {
        // validate form
        $validated = $request->validate([
            'id_category'=>'required|max:255',
            'image'=>'image|mimes:jpeg,jpg,png',
            'title'=>'required|max:255',
            'content'=>'required',
            'author'=>'required|max:255',
            'source'=>'required'
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        // create post
        Post::create([
            'id_category'   => $request->id_category,
            'image'         => $image->hashName(),
            'title'         => $request->title,
            'content'       => $request->content,
            'author'        => $request->author,
            'source'        => $request->source
        ]);

        // create notification
        notifikasi::create([
            'id_user'   => $request->id_category,
            'aksi'      => 'Menambah Positingan',
            'date'      => now()
        ]);

        return redirect('/post')->with('success',' successfull! ');
    }

    public function edit(string $id)
    {
        // get post by id
        $post = Post::findOrFail($id);

        return view('Post.Edit', ["title" => "Post", "active" => "Edit"], compact('post'));
    }

    public function update(Request $request, $id)
    {
        // validate form
        $request->validate([
            'id_category'   => 'required|max:255',
            'title'         => 'required|max:255',
            'content'       => 'required',
            'author'        => 'required|max:255',
            'source'        => 'required'
        ]);

        // get post by id
        $post = Post::findOrFail($id);

        // check if new image is uploaded
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts/', $image->hashName());

            // delete old image
            Storage::delete('public/posts/'. $post->image);

            // update post with new image
            $post->update([
                'id_category'   => $request->id_category,
                'image'         => $image->hashName(),
                'title'         => $request->title,
                'content'       => $request->content,
                'author'        => $request->author,
                'source'        => $request->source
            ]);
        } else {
            // update post without image
            $post->update([
                'id_category'   => $request->id_category,
                'title'         => $request->title,
                'content'       => $request->content,
                'author'        => $request->author,
                'source'        => $request->source
            ]);
        }

        //redirect to post index
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy(string $id)
    {
        // get post by id
        $post = Post::findOrFail($id);

        // delete image
        Storage::delete('public/posts/'. $post->image);

        // delete post
        $post->delete();

        //redirect to post index
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
