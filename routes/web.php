<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\KelolaGambarController;
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
    Route::redirect('/', '/Dashboard/Beranda');

    Route::prefix('Dashboard')->group(function () {
        Route::get('/', [DashboardsController::class, 'dashboard']);
        Route::get('Beranda', [DashboardsController::class, 'dashboard']);
        Route::get('HasilPencarian', [DashboardsController::class, 'hasilPencarian']);
        Route::get('DetailGambar', [DashboardsController::class, 'viewGambar']);
    });
});

// Route::view('/Horizontal', 'horizontal');
// Route::view('/Vertical', 'vertical');

Route::prefix('KelolaGambar')->group(function () {
    Route::get('/', [KelolaGambarController::class, 'index']);
    Route::get('Index',[KelolaGambarController::class, 'index'])->name('kelolagambar.index');
    Route::post('Store', [KelolaGambarController::class, 'store'])->name('kelolagambar.store');
    Route::view('Update', 'kelolagambar/update');
});

Route::prefix('Admin')->group(function () {
    Route::view('/', 'admin/index');
    Route::view('Index', 'admin/index');
    Route::view('View', 'admin/view');
});

Route::prefix('Pages')->group(function () {
    Route::view('/', 'pages/index');


});

require __DIR__.'/auth.php';
