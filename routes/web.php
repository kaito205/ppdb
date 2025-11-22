<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Controller;
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
// halaman utama & info umum
Route::get('/', [EkstrakurikulerController::class, 'home'])->name('home');
Route::get('/tentang', [MainController::class, 'tentangKami']);
Route::get('/info', [MainController::class, 'informasi']);
Route::get('/kontak', [MainController::class, 'kontak']);
Route::get('/pendaftaran', [MainController::class, 'pendaftaran']);

// auth user

Route::get('/login', [PenggunaController::class, 'loginForm'])->name('login');
Route::post('/login', [PenggunaController::class, 'login']);
Route::get('/register', [PenggunaController::class, 'index'])->name('register.form'); // hanya view
Route::post('/register', [PenggunaController::class, 'simpanRegistrasi'])->name('register'); // simpan data
Route::post('/logout', [PenggunaController::class, 'logout'])->name('logout');
Route::get('/formulir', [UserController::class, 'formulir'])->name('formulir.user');
Route::post('/formulir', [UserController::class, 'simpanFormulir'])->name('formulir.simpan');


// user dashboard
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard.user');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.user');
    Route::get('/formulir', [UserController::class, 'formulir'])->name('formulir.user');
    Route::post('/formulir', [UserController::class, 'simpanFormulir'])->name('formulir.simpan');
    Route::get('/seleksi', [UserController::class, 'seleksi'])->name('seleksi.user');
    Route::get('/daftar', [UserController::class, 'daftar'])->name('daftar.user');
});


// admin area
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login.admin');
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard.admin');
    Route::get('/datasiswa', [AdminController::class, 'dataSiswa'])->name('datasiswa');
    Route::post('/datasiswa/hapus/{id}', [AdminController::class, 'hapusSiswa'])->name('admin.siswa.hapus');
    Route::get('/datasiswa/detail/{id}', [AdminController::class, 'detailSiswa'])->name('admin.siswa.detail');

    // PROFIL SEKOLAH
    Route::get('/admin/profil', [ProfilSekolahController::class, 'index'])->name('admin.profil');
    Route::post('/admin/profil/update', [ProfilSekolahController::class, 'update'])->name('admin.profil.update');

    Route::get('/ekskul', [EkstrakurikulerController::class, 'index'])->name('admin.ekskul');
    Route::get('/ekskul/tambah', [EkstrakurikulerController::class, 'create'])->name('admin.ekskul.tambah');
    Route::post('/ekskul/store', [EkstrakurikulerController::class, 'store'])->name('admin.ekskul.store');

    Route::get('/ekskul/edit/{id}', [EkstrakurikulerController::class, 'edit'])->name('admin.ekskul.edit');
    Route::post('/ekskul/update/{id}', [EkstrakurikulerController::class, 'update'])->name('admin.ekskul.update');

    Route::get('/ekskul/hapus/{id}', [EkstrakurikulerController::class, 'delete'])->name('admin.ekskul.hapus');


    Route::get('/verifikasi', [AdminController::class, 'verifikasiIndex'])->name('admin.verifikasi');
    Route::get('/admin/verifikasi/{id}', [AdminController::class, 'verifikasiForm'])->name('admin.verifikasi.form');
    Route::post('/admin/verifikasi/{id}', [AdminController::class, 'verifikasiSimpan'])->name('admin.verifikasi.simpan');

    Route::get('/seleksi', [AdminController::class, 'seleksi'])->name('seleksi.admin');
    Route::get('/pengumuman', [AdminController::class, 'pengumuman'])->name('pengumuman.admin');
    Route::get('/daftar', [AdminController::class, 'daftar'])->name('daftar.admin');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile.admin');
});
