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
Route::get('/', [MainController::class, 'dashboard'])->name('home');
Route::get('/berita/{slug}', [MainController::class, 'detailBerita'])->name('berita.detail');
Route::get('/berita', [MainController::class, 'berita'])->name('berita.list');
Route::get('/profil', [MainController::class, 'profil'])->name('profil');
Route::get('/pesantren', [MainController::class, 'pesantren'])->name('pesantren');

// auth user

Route::get('/login', [PenggunaController::class, 'loginForm'])->name('login');
Route::post('/login', [PenggunaController::class, 'login']);
Route::get('/register', [PenggunaController::class, 'index'])->name('register.form'); // hanya view
Route::post('/register', [PenggunaController::class, 'simpanRegistrasi'])->name('register'); // simpan data
Route::post('/logout', [PenggunaController::class, 'logout'])->name('logout');



// user dashboard
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard.user');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.user');
    Route::get('/formulir', [UserController::class, 'formulir'])->name('formulir.user');
    Route::post('/formulir', [UserController::class, 'simpanFormulir'])->name('formulir.simpan');
    Route::get('/seleksi', [UserController::class, 'seleksi'])->name('seleksi.user');
    Route::get('/status', [UserController::class, 'status'])->name('status.user');
    Route::get('/daftar', [UserController::class, 'daftar'])->name('daftar.user');
});


// admin area
// ============================
// Admin Area
// ============================
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {

    Route::get('/login', [AdminController::class, 'login'])->name('login.admin');
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard.admin');

    Route::get('/datasiswa', [AdminController::class, 'dataSiswa'])->name('datasiswa');
    Route::post('/datasiswa/hapus/{id}', [AdminController::class, 'hapusSiswa'])->name('admin.siswa.hapus');
    Route::get('/datasiswa/detail/{id}', [AdminController::class, 'detailSiswa'])->name('admin.siswa.detail');
    Route::post('/datasiswa/terima/{id}', [AdminController::class, 'terimaSiswa'])->name('admin.siswa.terima');
    Route::post('/datasiswa/tolak/{id}', [AdminController::class, 'tolakSiswa'])->name('admin.siswa.tolak');

    // Export Routes
    Route::get('/datasiswa/export/excel', [AdminController::class, 'exportExcel'])->name('admin.export.excel');
    Route::get('/datasiswa/export/pdf', [AdminController::class, 'exportPdf'])->name('admin.export.pdf');

    // Email Routes


    // ============================
    // PROFIL SEKOLAH — ROUTE YANG BENAR
    // ============================
    Route::get('/profil', [AdminController::class, 'profilIndex'])->name('admin.profil');
    Route::post('/profil/update', [AdminController::class, 'profilUpdate'])->name('admin.profil.update');


    // ============================
    // EKSTRAKURIKULER
    // ============================
    Route::get('/ekskul', [AdminController::class, 'ekskulIndex'])->name('admin.ekskul');
    Route::get('/ekskul/tambah', [AdminController::class, 'ekskulCreate'])->name('admin.ekskul.tambah');
    Route::post('/ekskul/store', [AdminController::class, 'ekskulStore'])->name('admin.ekskul.store');

    Route::get('/ekskul/edit/{id}', [AdminController::class, 'ekskulEdit'])->name('admin.ekskul.edit');
    Route::post('/ekskul/update/{id}', [AdminController::class, 'ekskulUpdate'])->name('admin.ekskul.update');

    Route::get('/ekskul/hapus/{id}', [AdminController::class, 'ekskulDelete'])->name('admin.ekskul.hapus');

    Route::get('/prestasi', [AdminController::class, 'prestasiIndex'])->name('admin.prestasi');
    Route::get('/prestasi/tambah', [AdminController::class, 'prestasiCreate'])->name('admin.prestasi.tambah');
    Route::post('/prestasi/store', [AdminController::class, 'prestasiStore'])->name('admin.prestasi.store');
    Route::get('/prestasi/edit/{id}', [AdminController::class, 'prestasiEdit'])->name('admin.prestasi.edit');
    Route::post('/prestasi/update/{id}', [AdminController::class, 'prestasiUpdate'])->name('admin.prestasi.update');
    Route::get('/prestasi/hapus/{id}', [AdminController::class, 'prestasiDelete'])->name('admin.prestasi.hapus');

    Route::get('/berita', [AdminController::class, 'beritaIndex'])->name('berita.index');

    Route::get('/berita/create', [AdminController::class, 'beritaCreate'])->name('berita.create');

    Route::post('/berita', [AdminController::class, 'beritaStore'])->name('berita.store');

    Route::get('/berita/{id}/edit', [AdminController::class, 'beritaEdit'])->name('berita.edit');

    Route::put('/berita/{id}', [AdminController::class, 'beritaUpdate'])->name('berita.update');

    Route::delete('/berita/{id}', [AdminController::class, 'beritaDelete'])->name('berita.delete');

    Route::get('/profile', [AdminController::class, 'profile'])->name('profile.admin');
    Route::put('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    // Contact Messages
    Route::get('/pesan', [App\Http\Controllers\ContactController::class, 'index'])->name('admin.pesan');
    Route::delete('/pesan/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('admin.pesan.hapus');
});

// Public Contact Route
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
