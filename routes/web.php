<?php

use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/tentang-kami', function () {
    return view('tentangKami');
});

Route::get('/register-page', function () {
    return view('registerPage');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/custom', function () {
    return view('detail-custom');
});

Route::get('/kategori', function () {
    return view('kategori');
});

Route::get('/user', function () {
    return view('user/dashboard');
});



Route::get('/user/keranjang', function () {
    return view('user/keranjang');
});

Route::get('/user/pembayaran', function () {
    return view('user/pembayaran');
});


Route::get('/user/menunggu', function () {
    return view('user/menunggu');
});

Route::get('/user/proses', function () {
    return view('user/proses-desain');
});

Route::get('/user/pengiriman', function () {
    return view('user/pengiriman');
});

Route::get('/user/selesai', function () {
    return view('user/selesai');
});

Route::get('/user/profil', function () {
    return view('user/profil');
});


Route::get('/user/profil', function () {
    return view('user/profil');
});


Route::prefix('/admin')->group(function (){
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::match(['get','post'],'/bank', [BankController::class,'index']);
    Route::get('/kategori', [KategoriController::class,'index']);
    Route::post('/kategori', [KategoriController::class,'addKategori']);

    Route::prefix('/produk')->group(function (){
        Route::match(['post','get'],'/', [ProdukController::class,'index']);
        Route::get('/kategori', [KategoriController::class,'dataKategori'])->name('produk_kategori');
        Route::post('/image', [ProdukController::class,'addImage']);
    });

    Route::get('/pelanggan', function () {
        return view('admin/pelanggan/pelanggan');
    });

    Route::get('/pesanan', function () {
        return view('admin/pesanan/pesanan');
    });
});

Route::get('/kategori', [KategoriController::class,'dataKategori'])->name('produk_kategori');





Route::post('/register',[AuthController::class,'register']);

Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang', [BarangController::class, 'createProduct']);
