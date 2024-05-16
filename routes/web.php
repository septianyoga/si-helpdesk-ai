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
use App\Http\Controllers\ProfileController;
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

Route::get('/', [LandingpageController::class, 'index'])->name('/');

Route::get('/tanya_ai', [LandingpageController::class, 'ask_ai']);

Route::get('/buat_tiket', [TiketController::class, 'buatTiket'])->name('buat_tiket');
Route::post('/buat_tiket', [TiketController::class, 'kirimTiket']);
Route::get('/cek_tiket', [TiketController::class, 'cekTiket'])->name('cek_tiket');
Route::post('/cek_tiket', [TiketController::class, 'prosesCekTiket']);
Route::get('/detail_tiket', [TiketController::class, 'detailTiket'])->name('detail_tiket');
Route::get('/logout_cek_tiket', [TiketController::class, 'logoutCekTiket'])->name('logout_cek_tiket');
Route::get('/download/{nama_lampiran}', [TiketController::class, 'downloadLampiran'])->name('download');
Route::post('/balas_tiket/{id}', [TiketController::class, 'balasTiket']);
Route::get('/tiket_user/closed/{id}', [TiketController::class, 'closedTiket'])->name('tiket_user');
Route::get('/kirim_tiket', [TiketController::class, 'kirimTiketMail'])->name('kirim_tiket');


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi');
    Route::post('/registrasi', [RegistrasiController::class, 'store']);

    Route::get('/lupa_password', [LoginController::class, 'lupaPassword'])->name('lupa_password');
    Route::post('/lupa_password', [LoginController::class, 'sendMail']);
    Route::get('/confirm_reset/{token}', [LoginController::class, 'confirmResetPass'])->name('confirm_reset');
    Route::post('/reset_pass', [LoginController::class, 'resetPassword']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update']);


    Route::group(['middleware' => 'userAkses:Admin,Agent,General Manager'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/chart-data', [DashboardController::class, 'chart'])->name('chart-data');
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
        Route::get('/tiket/{id}/cetak', [TiketController::class, 'cetak'])->name('tiket.cetak');

        Route::get('/kb', [KnowledgebaseController::class, 'index'])->name('kb');
        Route::post('/kb', [KnowledgebaseController::class, 'store']);
        Route::delete('/kb', [KnowledgebaseController::class, 'destroy']);
        Route::get('/kb/{id}', [KnowledgebaseController::class, 'edit']);
        Route::patch('/kb/{id}', [KnowledgebaseController::class, 'update']);
    });

    Route::group(['middleware' => 'userAkses:User'], function () {
        Route::get('/tiket_user', [TiketController::class, 'tiketUser'])->name('tiket_user');
        Route::get('/tiket_user/detail', [TiketController::class, 'detailTiket'])->name('tiket_user');
    });

    Route::group(['middleware' => 'userAkses:General Manager'], function () {
        Route::get('/tiket_keluhan', [TiketController::class, 'tiketKeluhan'])->name('tiket_keluhan');
        Route::get('/tiket_layanan', [TiketController::class, 'tiketLayanan'])->name('tiket_layanan');
        Route::get('/agent', [TiketController::class, 'dataAgent'])->name('agent');
        Route::get('/cetak_tiket_keluhan', [TiketController::class, 'cetakTiketKeluhan'])->name('cetak_tiket_keluhan');
        Route::get('/cetak_tiket_layanan', [TiketController::class, 'cetakTiketLayanan'])->name('cetak_tiket_layanan');
        Route::get('/cetak_agent', [TiketController::class, 'cetakAgent'])->name('cetak_agent');
    });

    Route::group(['middleware' => 'userAkses:Agent,General Manager'], function () {
        Route::get('/tiket/{id}', [TiketController::class, 'edit'])->name('tiket');
    });
});
Route::get('/logout', [LoginController::class, 'destroy']);
