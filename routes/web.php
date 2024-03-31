<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\DampakPermasalahanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KategoriPermasalahanController;
use App\Http\Controllers\KnowledgebaseController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TimController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingpageController::class, 'index']);

Route::get('/tanya_ai', [LandingpageController::class, 'ask_ai']);

Route::get('/buat_tiket', [TiketController::class, 'buatTiket'])->name('buat_tiket');
Route::post('/buat_tiket', [TiketController::class, 'kirimTiket']);
Route::get('/cek_tiket', [TiketController::class, 'cekTiket'])->name('cek_tiket');
Route::post('/cek_tiket', [TiketController::class, 'prosesCekTiket']);
Route::get('/detail_tiket', [TiketController::class, 'detailTiket'])->name('detail_tiket');
Route::get('/logout_cek_tiket', [TiketController::class, 'logoutCekTiket'])->name('logout_cek_tiket');
Route::get('/download/{nama_lampiran}', [TiketController::class, 'downloadLampiran'])->name('download');
Route::post('/balas_tiket/{id}', [TiketController::class, 'balasTiket']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi');
    Route::post('/registrasi', [RegistrasiController::class, 'store']);
});

Route::middleware('auth')->group(function () {

    Route::group(['middleware' => 'userAkses:Admin,Agent,General Manager'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
    Route::group(['middleware' => 'userAkses:Admin'], function () {
        Route::get('/akun', [AkunController::class, 'index'])->name('akun');
        Route::post('/akun', [AkunController::class, 'store']);
        Route::delete('/akun', [AkunController::class, 'destroy']);
        Route::get('/akun/{id}', [AkunController::class, 'edit']);
        Route::post('/akun/{id}', [AkunController::class, 'update']);

        Route::get('/tim', [TimController::class, 'index'])->name('tim');
        Route::post('/tim', [TimController::class, 'store']);
        Route::delete('/tim', [TimController::class, 'destroy']);
        Route::get('/tim/{id}', [TimController::class, 'edit']);
        Route::patch('/tim/{id}', [TimController::class, 'update']);

        Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan');
        Route::post('/jabatan', [JabatanController::class, 'store']);
        Route::delete('/jabatan', [JabatanController::class, 'destroy']);
        Route::get('/jabatan/{id}', [JabatanController::class, 'edit']);
        Route::patch('/jabatan/{id}', [JabatanController::class, 'update']);

        Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi');
        Route::post('/divisi', [DivisiController::class, 'store']);
        Route::delete('/divisi', [DivisiController::class, 'destroy']);
        Route::get('/divisi/{id}', [DivisiController::class, 'edit']);
        Route::patch('/divisi/{id}', [DivisiController::class, 'update']);

        Route::get('/dampak_permasalahan', [DampakPermasalahanController::class, 'index'])->name('dampak_permasalahan');
        Route::post('/dampak_permasalahan', [DampakPermasalahanController::class, 'store']);
        Route::delete('/dampak_permasalahan', [DampakPermasalahanController::class, 'destroy']);
        Route::get('/dampak_permasalahan/{id}', [DampakPermasalahanController::class, 'edit']);
        Route::patch('/dampak_permasalahan/{id}', [DampakPermasalahanController::class, 'update']);

        Route::get('/kb', [KnowledgebaseController::class, 'index'])->name('kb');
        Route::post('/kb', [KnowledgebaseController::class, 'store']);
        Route::delete('/kb', [KnowledgebaseController::class, 'destroy']);
        Route::get('/kb/{id}', [KnowledgebaseController::class, 'edit']);
        Route::patch('/kb/{id}', [KnowledgebaseController::class, 'update']);

        Route::get('/kategori_masalah', [KategoriPermasalahanController::class, 'index'])->name('kategori_masalah');
        Route::post('/kategori_masalah', [KategoriPermasalahanController::class, 'store']);
        Route::delete('/kategori_masalah', [KategoriPermasalahanController::class, 'destroy']);
        Route::get('/kategori_masalah/{id}', [KategoriPermasalahanController::class, 'edit']);
        Route::patch('/kategori_masalah/{id}', [KategoriPermasalahanController::class, 'update']);
    });
    Route::group(['middleware' => 'userAkses:Agent'], function () {
        Route::get('/tiket', [TiketController::class, 'index'])->name('tiket');
        Route::get('/tiket/{id}', [TiketController::class, 'edit'])->name('tiket');
        Route::patch('/jawab_tiket/{id}', [TiketController::class, 'update']);
        Route::delete('/tiket', [TiketController::class, 'destroy']);
        Route::delete('/tiket/restore', [TiketController::class, 'restore']);
        Route::post('/tiket/alih', [TiketController::class, 'alihTiket']);
    });
});
Route::get('/logout', [LoginController::class, 'destroy']);
