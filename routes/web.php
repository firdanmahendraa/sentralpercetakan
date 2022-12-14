<?php
use App\Http\Controllers\{
    LoginController,
    DashboardController,
    PenjualanController,
    PenjualanDetailController,
    KodeAkunController,
    ProdukController,
    OpsiPembayaranController,
    CustomerController,
    SupplierController,
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
    Route::resource('transaksi-penjualan', PenjualanController::class);

    Route::get('transaksi-baru/{id}/data', [PenjualanDetailController::class, 'data'])->name('transaksi-baru.data');
    Route::get('transaksi-baru/loadform/{diskon}/{total}/{diterima}', [PenjualanDetailController::class, 'loadForm'])->name('transaksi-detail.load_form');
    Route::resource('transaksi-baru', PenjualanDetailController::class)
        ->except('create', 'edit');

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
    Route::get('piutang-karyawan/detail', [PengajuanController::class, 'detail'])->name('piutang-karyawan.detail');
    Route::resource('piutang-karyawan', PengajuanController::class);

    //SETTING
    Route::resource('users', UsersController::class);

    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::get('setting/show', [SettingController::class, 'show'])->name('setting.show');
    Route::post('setting', [SettingController::class, 'update'])->name('setting.update');
});

