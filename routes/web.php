<?php

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

// index routing via Route feature
Route::redirect('/', '/Dashboard/Beranda');


/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
|
*/
Route::view('/Horizontal', 'horizontal');
Route::view('/Vertical', 'vertical');
Route::view('/Kelolagambar', 'kelolagambar');
Route::view('/Kontributor', 'kontributor');

Route::prefix('Dashboard')->group(function () {
    Route::view('/', 'dashboard/dashboard');
    Route::view('Beranda', 'dashboard/dashboard');
    Route::view('Permintaan Gambar', 'dashboard/permintaan_gambar');
    Route::view('Hasil Pencarian', 'dashboard/hasilpencarian');
});

Route::prefix('Pages')->group(function () {
    Route::view('/', 'pages/index');

    Route::prefix('Authentication')->group(function () {
        Route::view('/', 'pages/authentication/index');
        Route::view('Login', 'pages/authentication/login');
        Route::view('Register', 'pages/authentication/register');
        Route::view('ForgotPassword', 'pages/authentication/forgot_password');
        Route::view('ResetPassword', 'pages/authentication/reset_password');
    });

});
