<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LaporanController;

use App\Http\Controllers\KategoriBukuController;

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
Route::get('/login', [LoginController::class, 'index']);
Route::get('logout', [LoginController::class, 'logout']);
Route::post('/login-proses/', [LoginController::class, 'login_proses']);

Route::group(['middleware' => 'cekstatus'], function () {
Route::get('/', function () {
    return view('home.index');
});
Route::get('/home', function () {
    return view('home.index');
});

Route::resource('buku', BukuController::class);

Route::resource('user', UserController::class);

Route::resource('peminjaman', PeminjamanController::class);

Route::resource('laporan', LaporanController::class);
Route::get('laporan_pdf', [LaporanController::class, 'pdf']);

Route::resource('kategori_buku', KategoriBukuController::class);

});
