<?php
use App\Http\Controllers\{
    LoginController,
    DashboardController,
    PenjualanController,
    PenjualanTransaksi,
    PenjualanDetailController,
    KodeAkunController,
    ProdukController,
    OpsiPembayaranController,
    CustomerController,
    SupplierController,
    PendapatanController,
    UsersController,
    SettingController

}; 

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

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //TRANSAKSI
    Route::get('transaksi-penjualan/invoice/{id}', [PenjualanController::class, 'cetakInvoice'])->name('transaksi-penjualan.invoice');
    Route::get('transaksi-penjualan/pelunasan/{id}', [PenjualanController::class, 'pelunasan'])->name('transaksi-penjualan.pelunasan');
    Route::get('transaksi-penjualan/data', [PenjualanController::class, 'data'])->name('transaksi-penjualan.data');
    Route::resource('transaksi-penjualan', PenjualanController::class);

    Route::get('transaksi-baru', [PenjualanTransaksi::class, 'index'])->name('transaksi-baru.index');
    Route::post('transaksi-baru/store', [PenjualanTransaksi::class, 'store'])->name('transaksi-baru.store');
    Route::get('transaksi-baru/show/{id}', [PenjualanTransaksi::class, 'show'])->name('transaksi-baru.show');
    Route::post('transaksi-baru/update/{id}', [PenjualanTransaksi::class, 'update'])->name('transaksi-baru.update');
    Route::delete('transaksi-baru/destroy/{id}', [PenjualanTransaksi::class, 'destroy'])->name('transaksi-baru.destroy');
    Route::get('transaksi-baru/loadform/{diskon}/{total}/{diterima}', [PenjualanTransaksi::class, 'loadForm'])->name('transaksi-detail.load_form');
    Route::get('transaksi-baru/getcustomer', [PenjualanTransaksi::class, 'getCustomer'])->name('transaksi-detail.get_customer');
    Route::get('transaksi-baru/cart', [PenjualanTransaksi::class, 'transactionCart'])->name('transaksi-baru.cart');


    //MASTER
    Route::prefix('data-akun')->group(function () {
        Route::get('/', [KodeAkunController::class, 'index'])->name('data-akun.index');
        Route::post('/store', [KodeAkunController::class, 'store'])->name('data-akun.store');
        Route::get('/show/{id}', [KodeAkunController::class, 'show'])->name('data-akun.show');
        Route::post('/update/{id}', [KodeAkunController::class, 'update'])->name('data-akun.update');
        Route::delete('/destroy/{id}', [KodeAkunController::class, 'destroy'])->name('data-akun.destroy');
        Route::get('/trash', [KodeAkunController::class, 'trash'])->name('data-akun.trash');
        Route::get('/restore', [KodeAkunController::class, 'restore'])->name('data-akun.restore');
        Route::delete('/delete', [KodeAkunController::class, 'delete'])->name('data-akun.delete');
    });


    Route::prefix('data-produk')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('data-produk.index');
        Route::post('/store', [ProdukController::class, 'store'])->name('data-produk.store');
        Route::get('/show/{id}', [ProdukController::class, 'show'])->name('data-produk.show');
        Route::post('/update/{id}', [ProdukController::class, 'update'])->name('data-produk.update');
        Route::delete('/destroy/{id}', [ProdukController::class, 'destroy'])->name('data-produk.destroy');
        Route::get('/trash', [ProdukController::class, 'trash'])->name('data-produk.trash');
        Route::get('/restore', [ProdukController::class, 'restore'])->name('data-produk.restore');
        Route::delete('/delete', [ProdukController::class, 'delete'])->name('data-produk.delete');
        
    });
    
    Route::prefix('opsi-pembayaran')->group(function () {
        Route::get('/', [OpsiPembayaranController::class, 'index'])->name('opsi-pembayaran.index');
        Route::post('/store', [OpsiPembayaranController::class, 'store'])->name('opsi-pembayaran.store');
        Route::get('/show/{id}', [OpsiPembayaranController::class, 'show'])->name('opsi-pembayaran.show');
        Route::post('/update/{id}', [OpsiPembayaranController::class, 'update'])->name('opsi-pembayaran.update');
        Route::delete('/destroy/{id}', [OpsiPembayaranController::class, 'destroy'])->name('opsi-pembayaran.destroy');
        Route::get('/trash', [OpsiPembayaranController::class, 'trash'])->name('opsi-pembayaran.trash');
        Route::get('/restore', [OpsiPembayaranController::class, 'restore'])->name('opsi-pembayaran.restore');
        Route::delete('/delete', [OpsiPembayaranController::class, 'delete'])->name('opsi-pembayaran.delete');
    });
    
    Route::prefix('data-pelanggan')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('data-pelanggan.index');
        Route::post('/store', [CustomerController::class, 'store'])->name('data-pelanggan.store');
        Route::get('/show/{id}', [CustomerController::class, 'show'])->name('data-pelanggan.show');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('data-pelanggan.update');
        Route::delete('/destroy/{id}', [CustomerController::class, 'destroy'])->name('data-pelanggan.destroy');
        Route::get('/trash', [CustomerController::class, 'trash'])->name('data-pelanggan.trash');
        Route::get('/restore', [CustomerController::class, 'restore'])->name('data-pelanggan.restore');
        Route::delete('/delete', [CustomerController::class, 'delete'])->name('data-pelanggan.delete');        
    });

    Route::prefix('data-supplier')->group(function () {
        Route::get('/', [SupplierController::class, 'index'])->name('data-supplier.index');
        Route::post('/store', [SupplierController::class, 'store'])->name('data-supplier.store');
        Route::get('/show/{id}', [SupplierController::class, 'show'])->name('data-supplier.show');
        Route::post('/update/{id}', [SupplierController::class, 'update'])->name('data-supplier.update');
        Route::delete('/destroy/{id}', [SupplierController::class, 'destroy'])->name('data-supplier.destroy');
        Route::get('/trash', [SupplierController::class, 'trash'])->name('data-supplier.trash');
        Route::get('/restore', [SupplierController::class, 'restore'])->name('data-supplier.restore');
        Route::delete('/delete', [SupplierController::class, 'delete'])->name('data-supplier.delete');        
    });

    //LAPORAN
    Route::get('pendapatan', [PendapatanController::class, 'index'])->name('pendapatan.index');
    Route::get('pendapatan/data', [PendapatanController::class, 'data'])->name('pendapatan.data');
    Route::get('pendapatan/detail/{id}', [PendapatanController::class, 'detail'])->name('pendapatan.detail');

    //SETTING
    Route::resource('users', UsersController::class);

    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::get('setting/show', [SettingController::class, 'show'])->name('setting.show');
    Route::post('setting', [SettingController::class, 'update'])->name('setting.update');
});

