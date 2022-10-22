<?php
use App\Http\Controllers\{
    LoginController,
    DashboardController,
    KategoriController,
    ProdukController,
    MemberController,
    SupplierController,
    UsersController

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

    //MASTER
    Route::get('data-kategori/trash', [KategoriController::class, 'trash'])->name('data-kategori.trash');
    Route::get('data-kategori/restore/{id?}', [KategoriController::class, 'restore'])->name('data-kategori.restore');
    Route::get('data-kategori/delete/{id?}', [KategoriController::class, 'delete'])->name('data-kategori.delete');
    Route::resource('data-kategori', KategoriController::class);

    Route::get('data-produk/trash', [ProdukController::class, 'trash'])->name('data-produk.trash');
    Route::get('data-produk/restore/{id?}', [ProdukController::class, 'restore'])->name('data-produk.restore');
    Route::get('data-produk/delete/{id?}', [ProdukController::class, 'delete'])->name('data-produk.delete');
    Route::resource('data-produk', ProdukController::class);

    Route::get('data-member/trash', [MemberController::class, 'trash'])->name('data-member.trash');
    Route::get('data-member/restore/{id?}', [MemberController::class, 'restore'])->name('data-member.restore');
    Route::get('data-member/delete/{id?}', [MemberController::class, 'delete'])->name('data-member.delete');
    Route::resource('data-member', MemberController::class);
    
    Route::get('data-supplier/trash', [SupplierController::class, 'trash'])->name('data-supplier.trash');
    Route::get('data-supplier/restore/{id?}', [SupplierController::class, 'restore'])->name('data-supplier.restore');
    Route::get('data-supplier/delete/{id?}', [SupplierController::class, 'delete'])->name('data-supplier.delete');
    Route::resource('data-supplier', SupplierController::class);

    
    Route::resource('users', UsersController::class);
});

