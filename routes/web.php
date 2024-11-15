<?php
use App\Http\Controllers\Auth\{
    LoginController,
    ForgotPasswordController,
    ResetPasswordController
};
use App\Http\Controllers\{
    DashboardController,
    KodeAkunController,
    ProdukController,
    OpsiPembayaranController,
    CustomerController,
    SupplierController,
    PenjualanController,
    PenjualanTransaksi,
    PenjualanDetailController,
    PembelianController,
    LapPendapatanController,
    LapPembelianController,
    LapHutangController,
    LapPiutangController,
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
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth');

Route::middleware(['guest'])->group(function () {
    Route::prefix('login')->group(function () {
        Route::get('/indentify', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('login_identify');
        Route::post('/send-email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('send_email');
    });
    Route::prefix('recover')->group(function () {
        Route::get('/password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password_recover');
        Route::post('/password', [ResetPasswordController::class, 'reset'])->name('password_update');
    });
});

Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/load-sales', [DashboardController::class, 'LoadSales'])->name('load_sales');

    //TRANSAKSI
    Route::prefix('transaksi-penjualan')->group(function () {
        Route::get('/', [PenjualanController::class, 'index'])->name('transaksi-penjualan.index');
        Route::post('/store', [PenjualanController::class, 'store'])->name('transaksi-penjualan.store');
        Route::post('/process', [PenjualanController::class, 'transactionProcess'])->name('transaksi-penjualan.process');
        Route::get('/detail/{id}/{no_nota}', [PenjualanController::class, 'show'])->name('transaksi-penjualan.show');
        Route::get('/invoice/{id}/{no_nota}', [PenjualanController::class, 'cetakInvoice'])->name('transaksi-penjualan.invoice');
        Route::get('/kwitansi/{id}/{no_nota}', [PenjualanController::class, 'cetakKwitansi'])->name('transaksi-penjualan.kwitansi');
    });

    Route::prefix('transaksi-baru')->group(function () {
        Route::get('/', [PenjualanTransaksi::class, 'index'])->name('transaksi-baru.index');
        Route::post('/store', [PenjualanTransaksi::class, 'store'])->name('transaksi-baru.store');
        Route::get('/show/{id}', [PenjualanTransaksi::class, 'show'])->name('transaksi-baru.show');
        Route::post('/update/{id}', [PenjualanTransaksi::class, 'update'])->name('transaksi-baru.update');
        Route::delete('/destroy/{id}', [PenjualanTransaksi::class, 'destroy'])->name('transaksi-baru.destroy');
        Route::get('/loadform/{diskon}/{total}/{diterima}', [PenjualanTransaksi::class, 'loadForm'])->name('transaksi-detail.load_form');
        Route::get('/getcustomer', [PenjualanTransaksi::class, 'getCustomer'])->name('transaksi-detail.get_customer');
        Route::get('/cart', [PenjualanTransaksi::class, 'transactionCart'])->name('transaksi-baru.cart');
    });

    Route::prefix('transaksi-pembelian')->group(function () {
        Route::get('/', [PembelianController::class, 'index'])->name('transaksi_pembelian.index');
        Route::get('/getdata', [PembelianController::class, 'data'])->name('transaksi_pembelian.getdata');
        Route::get('/getsupplier', [PembelianController::class, 'getSupplier'])->name('transaksi_pembelian.getsupplier');
        Route::get('/getakun', [PembelianController::class, 'getAkun'])->name('transaksi_pembelian.getakun');
        Route::post('/generate-pembelian-form', [PembelianController::class, 'generatePembelianForm'])->name('transaksi_pembelian.generatepembelianform');
        Route::get('/input/{id}', [PembelianController::class, 'inputPembelianForm'])->name('transaksi_pembelian.inputpembelianform');
        Route::post('/addproduct', [PembelianController::class, 'addProduct'])->name('transaksi_pembelian.addproduct');
        Route::get('/cart', [PembelianController::class, 'transactionCart'])->name('transaksi_pembelian.cart');
        Route::get('/loadform/{total}/{diterima}', [PembelianController::class, 'loadForm'])->name('transaksi_pembelian.load_form');
        Route::get('/show/{id}', [PembelianController::class, 'show'])->name('transaksi_pembelian.show');
        Route::post('/update/{id}', [PembelianController::class, 'update'])->name('transaksi_pembelian.update');
        Route::delete('/destroy/{id}', [PembelianController::class, 'destroy'])->name('transaksi_pembelian.destroy');
        Route::post('/store', [PembelianController::class, 'store'])->name('transaksi_pembelian.store');
        Route::post('/processing', [PembelianController::class, 'transactionProcess'])->name('transaksi_pembelian.process_repayment');
        Route::get('/detail/{id}', [PembelianController::class, 'detailPembelian'])->name('transaksi_pembelian.detail');
    });

    //MASTER
    Route::prefix('data-akun')->group(function () {
        Route::get('/', [KodeAkunController::class, 'index'])->name('data-akun.index');
        Route::post('/store', [KodeAkunController::class, 'store'])->name('data-akun.store');
        Route::get('/show/{id}', [KodeAkunController::class, 'show'])->name('data-akun.show');
        Route::post('/update/{id}', [KodeAkunController::class, 'update'])->name('data-akun.update');
    });

    Route::prefix('data-produk')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('data-produk.index');
        Route::post('/store', [ProdukController::class, 'store'])->name('data-produk.store');
        Route::get('/show/{id}', [ProdukController::class, 'show'])->name('data-produk.show');
        Route::post('/update/{id}', [ProdukController::class, 'update'])->name('data-produk.update');
        Route::delete('/destroy/{id}', [ProdukController::class, 'destroy'])->name('data-produk.destroy');
    });

    Route::prefix('opsi-pembayaran')->group(function () {
        Route::get('/', [OpsiPembayaranController::class, 'index'])->name('opsi-pembayaran.index');
        Route::post('/store', [OpsiPembayaranController::class, 'store'])->name('opsi-pembayaran.store');
        Route::get('/show/{id}', [OpsiPembayaranController::class, 'show'])->name('opsi-pembayaran.show');
        Route::post('/update/{id}', [OpsiPembayaranController::class, 'update'])->name('opsi-pembayaran.update');
        Route::delete('/destroy/{id}', [OpsiPembayaranController::class, 'destroy'])->name('opsi-pembayaran.destroy');
    });

    Route::prefix('data-pelanggan')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('data-pelanggan.index');
        Route::post('/store', [CustomerController::class, 'store'])->name('data-pelanggan.store');
        Route::get('/show/{id}', [CustomerController::class, 'show'])->name('data-pelanggan.show');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('data-pelanggan.update');
        Route::delete('/destroy/{id}', [CustomerController::class, 'destroy'])->name('data-pelanggan.destroy');
    });

    Route::prefix('data-supplier')->group(function () {
        Route::get('/', [SupplierController::class, 'index'])->name('data-supplier.index');
        Route::post('/store', [SupplierController::class, 'store'])->name('data-supplier.store');
        Route::get('/show/{id}', [SupplierController::class, 'show'])->name('data-supplier.show');
        Route::post('/update/{id}', [SupplierController::class, 'update'])->name('data-supplier.update');
        Route::delete('/destroy/{id}', [SupplierController::class, 'destroy'])->name('data-supplier.destroy');
    });

    //LAPORAN
    Route::prefix('laporan-pendapatan')->group(function () {
        Route::get('/', [LapPendapatanController::class, 'index'])->name('laporan_pendapatan.index');
        Route::get('/data', [LapPendapatanController::class, 'data'])->name('laporan_pendapatan.data');
    });

    Route::prefix('laporan-pembelian')->group(function () {
        Route::get('/', [LapPembelianController::class, 'index'])->name('laporan_pembelian.index');
        Route::get('/data', [LapPembelianController::class, 'data'])->name('laporan_pembelian.data');
    });

    Route::prefix('laporan-hutang')->group(function () {
        Route::get('/', [LapHutangController::class, 'index'])->name('laporan_hutang.index');
        Route::get('/bayar/{id}', [LapHutangController::class, 'pelunasan'])->name('laporan_hutang.pelunasan');
        Route::post('/repayment', [LapHutangController::class, 'repayment'])->name('laporan_hutang.repayment');
        Route::post('/processing', [LapHutangController::class, 'processRepayment'])->name('laporan_hutang.process_repayment');
    });

    Route::prefix('laporan-piutang')->group(function () {
        Route::get('/', [LapPiutangController::class, 'index'])->name('laporan_piutang.index');
        Route::get('/bayar/{id}/{no_nota}', [LapPiutangController::class, 'pelunasan'])->name('laporan_piutang.pelunasan');
        Route::post('/repayment', [LapPiutangController::class, 'repayment'])->name('laporan_piutang.repayment');
        Route::post('/processing', [LapPiutangController::class, 'processRepayment'])->name('laporan_piutang.process_repayment');
    });

    //SETTING
    Route::resource('users', UsersController::class);

    Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('setting.index');
        Route::get('/show', [SettingController::class, 'show'])->name('setting.show');
        Route::post('/update', [SettingController::class, 'update'])->name('setting.update');
    });
});

Route::get('/route-cache', function() {
    \Artisan::call('cache:clear');
    \Artisan::call('route:cache');
    return 'Routes cache cleared';
});
