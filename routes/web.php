<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ObatTesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\GoogleController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\TutupController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PercobaanController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckOutController;
use App\Models\Obat;

Route::get('/index', function () {
    return view('welcome');
});


Route::get('/pilihmap', [MapController::class, 'show']);
Route::post('/save-location', [LocationController::class, 'store'])->name('save.location');

// google login memakai ai
Route::get('login/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('login/login/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);


// facebook login memakai ai
Route::get('login/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('login/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);



// google login memakai youtube
Route::get('/auth/redirect', [GoogleController::class,'redirect']);
Route::get('/auth/google/callback', [GoogleController::class,'callback']);



Route::get('/',[PageController::class,'index'])->name('home');
Route::get('/produkpage',[PageController::class,'produk']);
Route::get('/beritapage',[PageController::class,'berita']);
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login-check', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::resource('/register',\App\Http\Controllers\RegisterController::class);
Route::get('/percobaan',[PercobaanController::class,'index']);

//Route::resource('/obats',\App\Http\Controllers\ObatController::class);
Route::resource('/obats',\App\Http\Controllers\ObatTesController::class);
Route::resource('/products',\App\Http\Controllers\ProdukController::class);
Route::resource('/keranjang',\App\Http\Controllers\KeranjangController::class);
//Route::get('/obats/{category}', [ObatController::class, 'byCategory'])->name('obats.byCategory');
Route::get('/cari-data', [SearchController::class, 'cariData'])->name('cari.data');




Route::group(["middleware"=>["auth"]],function(){
Route::resource('/admin',\App\Http\Controllers\AdminController::class);
Route::get('/dasboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::resource('/user',\App\Http\Controllers\UsersController::class);
Route::resource('/usertoko',\App\Http\Controllers\AdminController::class);
Route::resource('/post',\App\Http\Controllers\PostController::class);
Route::resource('/produk',\App\Http\Controllers\ProdukController::class);
Route::resource('/asetkantor',\App\Http\Controllers\AsetKantorController::class);
Route::resource('/berita',\App\Http\Controllers\BeritaController::class);
Route::resource('/kategori',\App\Http\Controllers\KategoriController::class);
Route::resource('/kategori_obat',\App\Http\Controllers\KategoriObatController::class);
Route::resource('/kategori_post',\App\Http\Controllers\KategoriPostController::class);
Route::resource('/notification',\App\Http\Controllers\NotificationController::class);
Route::resource('/gudang',\App\Http\Controllers\GudangController::class);
Route::resource('/order',\App\Http\Controllers\OrderController::class);
Route::resource('/obat',\App\Http\Controllers\ObatController::class);
Route::resource('/toko',\App\Http\Controllers\TokoController::class);
Route::resource('/resep',\App\Http\Controllers\ResepController::class);
Route::get('/map', [MapController::class, 'index'])->name('map');
Route::get('/tutup', [TutupController::class, 'index'])->name('tutup');
Route::resource('/tokouser',\App\Http\Controllers\TokoController::class);
Route::resource('/keranjanguser',\App\Http\Controllers\KeranjangController::class);
Route::resource('/checkout',\App\Http\Controllers\CheckOutController::class);
Route::resource('/chatdokter',\App\Http\Controllers\ChatController::class);



Route::get('/orderuser', [OrderController::class, 'index'])->name('orderuser');
Route::get('/profil', [UsersController::class, 'show'])->name('profil');
//Route::post('/search', [SearchController::class, 'user'])->name('search');
//Route::resource('/orderuser',\App\Http\Controllers\OrderUserController::class);
Route::get('/pilih-wilayah', [WilayahController::class, 'index']);
Route::get('/get-kota/{provinsi_id}', [WilayahController::class, 'getKota']);
Route::get('/get-kecamatan/{kota_id}', [WilayahController::class, 'getKecamatan']);
Route::get('/get-kelurahan/{kecamatan_id}', [WilayahController::class, 'getKelurahan']);

//route allfine
Route::get('/products_', function () {
    return response()->json(Obat::all());
});

});
