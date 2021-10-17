<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SubKategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiDetailController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PenjualanDetailController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\CustomerController;

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

Route::get('/', fn () => redirect()->route('login'));

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('home');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/supplier/data', [SupplierController::class, 'data'])->name('supplier.data');
    Route::resource('/supplier', SupplierController::class);
    Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
    Route::resource('/kategori', KategoriController::class);
    Route::get('/subkategori/data', [SubKategoriController::class, 'data'])->name('subkategori.data');
    Route::resource('/subkategori', SubKategoriController::class);
    Route::get('/produk/data', [ProdukController::class, 'data'])->name('produk.data');
    Route::resource('/produk', ProdukController::class);
    Route::get('/transaksi/data', [TransaksiController::class, 'data'])->name('transaksi.data');
    Route::resource('/transaksi', TransaksiController::class);
    Route::get('/customer/data', [CustomerController::class, 'data'])->name('customer.data');
    Route::resource('/customer', CustomerController::class);
    
    Route::get('/penjualan/data', [PenjualanController::class, 'data'])->name('penjualan.data');
        Route::get('/penjualan/{id}/create', [PenjualanController::class, 'create'])->name('penjualan.create');
        Route::resource('/penjualan', PenjualanController::class)
            ->except('create');

        Route::get('/penjualan_detail/{id}/data', [PenjualanDetailController::class, 'data'])->name('penjualan_detail.data');
        Route::get('/penjualan_detail/loadform/{diskon}/{total}', [PenjualanDetailController::class, 'loadForm'])->name('penjualan_detail.load_form');
        Route::resource('/penjualan_detail', PenjualanDetailController::class)
            ->except('create', 'show', 'edit');

});