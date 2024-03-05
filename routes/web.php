<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriBukuController;
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

Route::get('buku/{id}/ulasan', [BukuController::class, 'ulasan']);
Route::post('buku/{id}/ulasan_post', [BukuController::class, 'ulasan_post']);
Route::delete('ulasan/{id}/hapus_ulasan', [BukuController::class, 'hapus_ulasan']);

Route::resource('buku', BukuController::class);

Route::resource('user', UserController::class);

Route::resource('peminjaman', PeminjamanController::class);

Route::resource('laporan', LaporanController::class);
Route::get('laporan_pdf', [LaporanController::class, 'pdf']);

Route::resource('kategori_buku', KategoriBukuController::class);

Route::resource('koleksi_pribadi', KoleksiPribadiController::class);

});
