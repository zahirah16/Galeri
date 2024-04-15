<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ProfilController;

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

Route::get('foto_detail/{id}/detail', [FotoController::class, 'detail']);
Route::post('foto/{id}/komentar_post', [FotoController::class, 'komentar_post']);
Route::delete('komentar/{id}/hapus_komentar', [FotoController::class, 'hapus_komentar']);
Route::post('foto/{id}/like_post', [FotoController::class, 'like_post']);

Route::resource('foto', FotoController::class);

Route::resource('album', AlbumController::class);

Route::resource('profil_saya', ProfilController::class);

});
