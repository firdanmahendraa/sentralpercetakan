<?php
use App\Http\Controllers\{
    LoginController,
    DashboardController,
    PenjualanController,
    PenjualanDetailController,
    DataKaryawanController,
    KategoriController,
    ProdukController,
    MemberController,
    SupplierController,
    UsersController,
    SettingController,
    PengajuanController

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
    Route::resource('transaksi', PenjualanController::class);

    Route::get('transaksi-detail/{id}/data', [PenjualanDetailController::class, 'data'])->name('transaksi-detail.data');
    Route::get('transaksi-detail/loadform/{diskon}/{total}/{diterima}', [PenjualanDetailController::class, 'loadForm'])->name('transaksi-detail.load_form');
    Route::resource('transaksi-detail', PenjualanDetailController::class)
        ->except('create', 'show', 'edit');

    //MASTER
    Route::get('data-karyawan/trash', [DataKaryawanController::class, 'trash'])->name('data-karyawan.trash');
    Route::get('data-karyawan/restore/{id?}', [DataKaryawanController::class, 'restore'])->name('data-karyawan.restore');
    Route::get('data-karyawan/delete/{id?}', [DataKaryawanController::class, 'delete'])->name('data-karyawan.delete');
    Route::resource('data-karyawan', DataKaryawanController::class);

    Route::get('data-kategori/trash', [KategoriController::class, 'trash'])->name('data-kategori.trash');
    Route::get('data-kategori/restore/{id?}', [KategoriController::class, 'restore'])->name('data-kategori.restore');
    Route::get('data-kategori/delete/{id?}', [KategoriController::class, 'delete'])->name('data-kategori.delete');
    Route::resource('data-kategori', KategoriController::class);

    Route::get('data-produk/trash', [ProdukController::class, 'trash'])->name('data-produk.trash');
    Route::get('data-produk/restore/{id?}', [ProdukController::class, 'restore'])->name('data-produk.restore');
    Route::get('data-produk/delete/{id?}', [ProdukController::class, 'delete'])->name('data-produk.delete');
    Route::resource('data-produk', ProdukController::class);
    
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

