<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\KelolaGambarController;
use App\Http\Controllers\BagiTugasController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KontributorsController; 
use App\Http\Controllers\LikesController; 

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
// Route::redirect('/', '/LandingPage');
Route::redirect('/', '/maintenance');


/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
|
*/ 

Route::prefix('/maintenance')->group(function () {
    Route::get('/', [DashboardsController::class, 'maintenance'])->name('landingpage.maintenance');  
});
Route::prefix('/LandingPage')->group(function () {
    Route::get('/', [DashboardsController::class, 'landingpage'])->name('landingpage.landpage');  
});
 

Route::middleware('auth')->group(function () {
    // Route::redirect('/', '/LandingPage'); 
    Route::post('/like-post/{id}',[LikesController::class,'likePost'])->name('like.post');
    Route::post('/unlike-post/{id}',[LikesController::class,'unlikePost'])->name('unlike.post');
    
 
    Route::prefix('Dashboard')->group(function () {
        Route::get('/', [DashboardsController::class, 'dashboard'])->name('dashboard.halamandepan');  
        Route::get('DetailGambar/{gambar_id}', [DashboardsController::class, 'viewGambar'])->name('dashboard.detailgambar'); 
        Route::get('Download/{gambar_id}',[DashboardsController::class, 'downloadGambar'])->name('dashboard.downloadgambar');
        Route::get('DownloadFile/{file_id}',[DashboardsController::class, 'downloadFile'])->name('dashboard.downloadfile'); 
        Route::get('Statistik',[DashboardsController::class, 'statistik'])->name('petugas.statistik');
    });

    Route::prefix('Kontributor')->group(function () {
        Route::get('/', [KontributorsController::class, 'showprofile']);
        Route::get('Profiluser/{user_id}', [KontributorsController::class, 'showprofile'])->name('kontributor.profil'); 
        Route::get('UploadKarya', [KontributorsController::class, 'uploadkarya']);
        Route::get('Store', [KontributorsController::class, 'store']); 
    });

    Route::prefix('hasilpencarian')->group(function () {
        Route::post('caridashboard', [DashboardsController::class, 'hasilPencarian'])->name('dashboard.hasilpencarian');
        Route::post('cari', [DashboardsController::class, 'hasilPencarian_'])->name('dashboard.hasilpencarian_');
        Route::get('/katakunci/{katakunci}', [DashboardsController::class, 'result_pencarian'])->name('result_pencarian');
    });

    Route::prefix('KelolaGambar')->group(function () {
        Route::get('/', [KelolaGambarController::class, 'index']);
        Route::get('Index',[KelolaGambarController::class, 'index'])->name('kelolagambar.index');
        Route::get('DaftarPermintaan',[KelolaGambarController::class, 'daftar_permintaan']);
        Route::post('Store', [KelolaGambarController::class, 'store'])->name('kelolagambar.store');
        // Route::view('Update', 'kelolagambar/update');
    });
    
    Route::prefix('Petugas')->group(function () {
        Route::get('/', [PetugasController::class, 'index']);
        Route::get('Index',[PetugasController::class, 'index'])->name('petugas.index');
        Route::get('DaftarTugas',[PetugasController::class, 'daftar_tugas']);
        Route::get('Review/Daftar',[PetugasController::class, 'reviewdaftar'])->name('review.daftar');
        Route::get('Review/Layani/{reviewid}',[PetugasController::class, 'reviewlayani'])->name('review.layani');
        Route::get('Review/Publish/{reviewid}',[PetugasController::class, 'reviewpublish'])->name('review.publish');
        Route::post('Review/Unpublish/{reviewid}',[PetugasController::class, 'reviewunpublish'])->name('review.unpublish');
    
        Route::get('/transaksi/{transaksi_id}/permintaan/{permintaan_id}', [PetugasController::class, 'layani'])->name('petugas.layani');
        Route::get('/edit_transaksi/{transaksi_id}', [PetugasController::class, 'edit_layani'])->name('petugas.edit_layani');
        Route::get('/Transaksi_tolak/{transaksi_id}/Permintaan_tolak/{permintaan_id}', [PetugasController::class, 'layani_tolak'])->name('petugas.layani_tolak');
        Route::get('Pengaturan',[PetugasController::class, 'pengaturan'])->name('petugas.pengaturan');
    
    
        Route::post('Store', [PetugasController::class, 'store'])->name('petugas.store');
        Route::post('Edit_Store', [PetugasController::class, 'edit_store'])->name('petugas.edit_store');
        Route::post('Tolak', [PetugasController::class, 'tolak'])->name('petugas.tolak');
        Route::post('Tambah', [PetugasController::class, 'tambah'])->name('petugas.tambah'); 
 
        
    });

});


require __DIR__.'/auth.php';
