<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\KategoriController;

Route::controller(LandingController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
});


Route::get('/download/{path}/{filename}', [AdminController::class, 'download'])->name('admin.download');
// AUTH ADMIN
Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/logout', 'logout')->name('logout');

        Route::get('/tentang', 'tentang')->name('tentang');

        Route::get('/metodePengiriman', 'metodePengiriman')->name('metodePengiriman');

        Route::get('/userList', 'userList')->name('userList');

        Route::get('/pesanan', 'transaksi')->name('transaksi');

        Route::get('/transaksi/{id}', 'transaksiDetail')->name('transaksi.detail');

        Route::get('/laporan', 'laporan')->name('laporan');

        Route::get('/testimoni', 'testimoni')->name('testimoni');

        Route::get('/kontak', 'kontak')->name('kontak');

        Route::get('/message', 'message')->name('message');

        Route::get('/produk-list', 'produk_list')->name('produk');
        Route::get('/produk-create', 'produk_create')->name('produk.create');
    });

    Route::controller(KategoriController::class)->group(function () {
        Route::get('/kategori', 'index')->name('kategori');
    });
});
// AUTH ADMIN END

// AUTH USER 
Route::middleware(['auth:web'])->prefix('dashboard')->name('dashboard.')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/logout', 'logout')->name('logout');

    Route::get('/keranjang', 'keranjang')->name('keranjang');
    Route::get('/checkout/{id}', 'checkoutSingle')->name('checkoutSingle');

    Route::get('/pesanan', 'pesanan')->name('pesanan');
    Route::get('/pesanan/{id}', 'detailPesanan')->name('detailPesanan');
    Route::get('/setting', 'setting')->name('setting');
});
// AUTH USER END
