<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\KelolaGambarController;
use App\Http\Controllers\BagiTugasController;
use App\Http\Controllers\PetugasController;
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

// index routing via Route feature
Route::redirect('/', '/Dashboard/Beranda');


/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
|
*/
Route::middleware('auth')->group(function () {
    Route::redirect('/', '/Dashboard');

    Route::prefix('Dashboard')->group(function () {
        Route::get('/', [DashboardsController::class, 'dashboard']);
        Route::get('Beranda', [DashboardsController::class, 'dashboard']);
        Route::post('HasilPencarian', [DashboardsController::class, 'hasilPencarian'])->name('dashboard.hasilpencarian');
        Route::get('DetailGambar/{gambar_id}', [DashboardsController::class, 'viewGambar']);
    });
});

Route::prefix('KelolaGambar')->group(function () {
    Route::get('/', [KelolaGambarController::class, 'index'])->name('kelolagambar.index');
    Route::get('Index',[KelolaGambarController::class, 'index'])->name('kelolagambar.index');
    Route::get('DaftarPermintaan',[KelolaGambarController::class, 'daftar_permintaan']);
    Route::post('Store', [KelolaGambarController::class, 'store'])->name('kelolagambar.store');
    // Route::view('Update', 'kelolagambar/update');
});

Route::prefix('Statistik')->group(function () {
    Route::get('/', [BagiTugasController::class, 'index'])->name('bagipetugas.index');
    Route::get('Index',[BagiTugasController::class, 'index'])->name('bagipetugas.index');
});

Route::prefix('Petugas')->group(function () {
    Route::get('/', [PetugasController::class, 'index'])->name('petugas.index');
    Route::get('Index',[PetugasController::class, 'index'])->name('petugas.index');
    Route::get('DaftarTugas',[PetugasController::class, 'daftar_tugas']);

    Route::get('/transaksi/{transaksi_id}/permintaan/{permintaan_id}', [PetugasController::class, 'layani'])->name('petugas.layani');
    Route::get('/Transaksi_tolak/{transaksi_id}/Permintaan_tolak/{permintaan_id}', [PetugasController::class, 'layani_tolak'])->name('petugas.layani_tolak');
    Route::get('Pengaturan',[PetugasController::class, 'pengaturan'])->name('petugas.pengaturan');


    Route::post('Store', [PetugasController::class, 'store'])->name('petugas.store');
    Route::post('Tolak', [PetugasController::class, 'tolak'])->name('petugas.tolak');
    Route::post('Tambah', [PetugasController::class, 'tambah'])->name('petugas.tambah');

    Route::view('Contoh','petugas/contoh');
});

Route::prefix('Pages')->group(function () {
    Route::view('/', 'pages/index');


});

require __DIR__.'/auth.php';
