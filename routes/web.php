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
    Route::get('data-akun/trash', [KodeAkunController::class, 'trash'])->name('data-akun.trash');
    Route::get('data-akun/restore/{id?}', [KodeAkunController::class, 'restore'])->name('data-akun.restore');
    Route::get('data-akun/delete/{id?}', [KodeAkunController::class, 'delete'])->name('data-akun.delete');
    Route::resource('data-akun', KodeAkunController::class);

    Route::get('data-produk/trash', [ProdukController::class, 'trash'])->name('data-produk.trash');
    Route::get('data-produk/restore/{id?}', [ProdukController::class, 'restore'])->name('data-produk.restore');
    Route::get('data-produk/delete/{id?}', [ProdukController::class, 'delete'])->name('data-produk.delete');
    Route::resource('data-produk', ProdukController::class);
    
    Route::get('opsi-pembayaran/trash', [OpsiPembayaranController::class, 'trash'])->name('opsi-pembayaran.trash');
    Route::get('opsi-pembayaran/restore/{id?}', [OpsiPembayaranController::class, 'restore'])->name('opsi-pembayaran.restore');
    Route::get('opsi-pembayaran/delete/{id?}', [OpsiPembayaranController::class, 'delete'])->name('opsi-pembayaran.delete');
    Route::resource('opsi-pembayaran', OpsiPembayaranController::class);
    
    Route::get('data-pelanggan/trash', [CustomerController::class, 'trash'])->name('data-pelanggan.trash');
    Route::get('data-pelanggan/restore/{id?}', [CustomerController::class, 'restore'])->name('data-pelanggan.restore');
    Route::get('data-pelanggan/delete/{id?}', [CustomerController::class, 'delete'])->name('data-pelanggan.delete');
    Route::resource('data-pelanggan', CustomerController::class);

    Route::get('data-supplier/trash', [SupplierController::class, 'trash'])->name('data-supplier.trash');
    Route::get('data-supplier/restore/{id?}', [SupplierController::class, 'restore'])->name('data-supplier.restore');
    Route::get('data-supplier/delete/{id?}', [SupplierController::class, 'delete'])->name('data-supplier.delete');
    Route::resource('data-supplier', SupplierController::class);

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

