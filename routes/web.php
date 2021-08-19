<?php

use App\Http\Controllers\Admin\BanerController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RajaOngkirController;
use App\Http\Controllers\User\DikemasController;
use App\Http\Controllers\User\DikembalikanController;
use App\Http\Controllers\User\KeranjangController;
use App\Http\Controllers\User\MenungguController;
use App\Http\Controllers\User\PembayaranController;
use App\Http\Controllers\User\PengirimanController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SelesaiController;
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

Route::get('/', [HomeController::class,'index']);

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [AuthController::class,'login']);
Route::get('/logout', [AuthController::class,'logout']);

Route::get('/tentang-kami', function () {
    return view('tentangKami');
});

Route::get('/register-page', function () {
    return view('registerPage');
});
Route::post('/register-page', [AuthController::class, 'registerMember']);



Route::get('/custom', function () {
    return view('detail-custom');
});




Route::get('/user/proses', function () {
    return view('user/proses-desain');
});





Route::prefix('/user')->group(function (){
    Route::get('/', function () {
        return view('user/dashboard');
    });
    Route::match(['post','get'],'/keranjang', [KeranjangController::class,'index']);
    Route::get('/keranjang/{id}/delete', [KeranjangController::class,'delete']);
    Route::match(['post','get'],'/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/menunggu', [MenungguController::class,'index']);
    Route::match(['post','get'],'/pengiriman', [PengirimanController::class,'index']);
    Route::post('/pengiriman/retur', [PengirimanController::class,'retur']);
    Route::get('/dikemas', [DikemasController::class,'index']);
    Route::get('/dikembalikan', [DikembalikanController::class,'index']);
    Route::get('/selesai', [SelesaiController::class, 'index']);
    Route::match(['post','get'],'/profil', [ProfileController::class, 'index']);
});


Route::prefix('/admin')->group(function (){
    Route::get('/', [DashboardController::class, 'index']);

    Route::match(['get','post'],'/bank', [BankController::class,'index']);
    Route::get('/kategori', [KategoriController::class,'index']);
    Route::post('/kategori', [KategoriController::class,'addKategori']);

    Route::prefix('/produk')->group(function (){
        Route::get('/', [ProdukController::class,'index']);
        Route::match(['get','post'],'/data', [ProdukController::class,'data']);
        Route::get('/kategori', [KategoriController::class,'dataKategori'])->name('produk_kategori');
        Route::post('/kategori', [KategoriController::class,'addKategori']);
        Route::match(['get','post'],'/image', [ProdukController::class,'addImage']);
    });

    Route::get('/pelanggan', [MemberController::class,'index']);

    Route::match(['post','get'],'/baner', [BanerController::class,'index']);
    Route::get('/baner/{id}/delete', [BanerController::class,'delete']);

    Route::get('/pesanan', [PesananController::class,'index']);
    Route::post('/pesanan/{id}/retur', [PesananController::class,'konfirmasiRetur']);
    Route::match(['post','get'],'/pesanan/{id}', [PesananController::class,'getDetailPesanan']);
});

Route::get('/kategori', [KategoriController::class,'dataKategori'])->name('produk_kategori');

Route::get('/produk', [\App\Http\Controllers\ProdukController::class,'index']);
Route::get('/produk/detail/{id}', [\App\Http\Controllers\ProdukController::class,'detail']);
Route::post('/produk/detail/{id}', [\App\Http\Controllers\ProdukController::class,'simpanPesanan']);
Route::get('/produk/detail/{id}/image', [\App\Http\Controllers\ProdukController::class,'getImageProduk']);

Route::get('/baner', [HomeController::class,'baner']);
Route::get('/bank', [BankController::class,'getBank']);
Route::get('/get-city',[RajaOngkirController::class,'getCity']);
Route::get('/get-cost',[RajaOngkirController::class,'cost']);



Route::post('/register',[AuthController::class,'register']);

Route::get('/get-keranjang',[HomeController::class,'getKeranjang']);

