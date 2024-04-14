<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\KoleksiPribadiController;

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
Route::get('/register', [LoginController::class, 'register']);
Route::get('logout', [LoginController::class, 'logout']);
Route::post('/login-proses/', [LoginController::class, 'login_proses']);

Route::post('/register-proses/', [LoginController::class, 'register_proses']);

Route::group(['middleware' => 'cekstatus'], function () {

Route::resource('/', HomeController::class);

Route::resource('home', HomeController::class);

Route::get('foto/{id}/detail', [FotoController::class, 'detail']);
Route::post('foto/{id}/komentar_post', [FotoController::class, 'komentar_post']);
Route::delete('komentar/{id}/hapus_komentar', [FotoController::class, 'hapus_komentar']);

Route::resource('foto', FotoController::class);

Route::resource('user', UserController::class);

Route::resource('peminjaman', PeminjamanController::class);

Route::resource('laporan', LaporanController::class);
Route::get('laporan_pdf', [LaporanController::class, 'pdf']);

Route::resource('album', AlbumController::class);

Route::resource('koleksi_pribadi', KoleksiPribadiController::class);

});
