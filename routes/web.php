<?php
use App\Http\Controllers\{
    LoginController,
    DashboardController,
    KategoriController,
    UsersController,
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

    Route::get('data-kategori/trash', [KategoriController::class, 'trash'])->name('data-kategori.trash');
    Route::get('data-kategori/restore/{id?}', [KategoriController::class, 'restore'])->name('data-kategori.restore');
    Route::get('data-kategori/delete/{id?}', [KategoriController::class, 'delete'])->name('data-kategori.delete');
    Route::resource('data-kategori', KategoriController::class);
    Route::resource('users', UsersController::class);
});

