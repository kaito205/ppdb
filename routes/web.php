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
Route::get('/akademik', [MainController::class, 'akademik'])->name('akademik');
Route::get('/ekskul', [MainController::class, 'ekskul'])->name('ekskul');
Route::get('/prestasi', [MainController::class, 'prestasi'])->name('prestasi');
Route::get('/galeri', [MainController::class, 'galeri'])->name('galeri');
Route::get('/informasi-ppdb', [MainController::class, 'ppdb'])->name('ppdb.info');
Route::get('/fasilitas', [MainController::class, 'fasilitas'])->name('fasilitas');











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

    // ============================
    // DATA SISWA
    // ============================
    Route::prefix('datasiswa')->name('admin.siswa.')->group(function () {
        Route::get('/', [AdminController::class, 'dataSiswa'])->name('index'); // name: admin.siswa.index (was datasiswa) -> alias manually if needed or stick to new naming
        // Keeping old names for compatibility where possible, but grouping makes it cleaner.
        // Actually, to avoid breaking `route('datasiswa')`, I should be careful.
        // The old name was 'datasiswa'. New name would be 'admin.siswa.index' if I use name prefix.
        // Let's NOT use name prefix if it breaks existing views, or I must update views.
        // User asked for "Code cleanup", but breaking changes should be avoided if I can't check all views.
        // I will keep the names explicit or use the same names.
    });

    // Re-writing with explicit grouping but same names to be safe.
    
    Route::prefix('datasiswa')->group(function () {
        Route::get('/', [AdminController::class, 'dataSiswa'])->name('datasiswa');
        Route::post('/hapus/{id}', [AdminController::class, 'hapusSiswa'])->name('admin.siswa.hapus');
        Route::get('/detail/{id}', [AdminController::class, 'detailSiswa'])->name('admin.siswa.detail');
        Route::post('/terima/{id}', [AdminController::class, 'terimaSiswa'])->name('admin.siswa.terima');
        Route::post('/tolak/{id}', [AdminController::class, 'tolakSiswa'])->name('admin.siswa.tolak');
        Route::get('/export/excel', [AdminController::class, 'exportExcel'])->name('admin.export.excel');
        Route::get('/export/pdf', [AdminController::class, 'exportPdf'])->name('admin.export.pdf');
    });

    // PROFIL SEKOLAH
    Route::prefix('profil')->group(function () {
        Route::get('/', [AdminController::class, 'profilIndex'])->name('admin.profil');
        Route::post('/update', [AdminController::class, 'profilUpdate'])->name('admin.profil.update');
    });

    // EKSTRAKURIKULER
    Route::prefix('ekskul')->group(function () {
        Route::get('/', [AdminController::class, 'ekskulIndex'])->name('admin.ekskul');
        Route::get('/tambah', [AdminController::class, 'ekskulCreate'])->name('admin.ekskul.tambah');
        Route::post('/store', [AdminController::class, 'ekskulStore'])->name('admin.ekskul.store');
        Route::get('/edit/{id}', [AdminController::class, 'ekskulEdit'])->name('admin.ekskul.edit');
        Route::post('/update/{id}', [AdminController::class, 'ekskulUpdate'])->name('admin.ekskul.update');
        Route::delete('/hapus/{id}', [AdminController::class, 'ekskulDelete'])->name('admin.ekskul.hapus');
    });

    // PRESTASI
    Route::prefix('prestasi')->group(function () {
        Route::get('/', [AdminController::class, 'prestasiIndex'])->name('admin.prestasi');
        Route::get('/tambah', [AdminController::class, 'prestasiCreate'])->name('admin.prestasi.tambah');
        Route::post('/store', [AdminController::class, 'prestasiStore'])->name('admin.prestasi.store');
        Route::get('/edit/{id}', [AdminController::class, 'prestasiEdit'])->name('admin.prestasi.edit');
        Route::post('/update/{id}', [AdminController::class, 'prestasiUpdate'])->name('admin.prestasi.update');
        Route::delete('/hapus/{id}', [AdminController::class, 'prestasiDelete'])->name('admin.prestasi.hapus');
    });

    // BERITA
    Route::prefix('berita')->group(function () {
        Route::get('/', [AdminController::class, 'beritaIndex'])->name('berita.index');
        Route::get('/create', [AdminController::class, 'beritaCreate'])->name('berita.create');
        Route::post('/', [AdminController::class, 'beritaStore'])->name('berita.store');
        Route::get('/{id}/edit', [AdminController::class, 'beritaEdit'])->name('berita.edit');
        Route::put('/{id}', [AdminController::class, 'beritaUpdate'])->name('berita.update');
        Route::delete('/{id}', [AdminController::class, 'beritaDelete'])->name('berita.delete');
    });

    // PROFILE ADMIN
    Route::prefix('profile')->group(function () {
        Route::get('/', [AdminController::class, 'profile'])->name('profile.admin');
        Route::put('/', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    });

    // Contact Messages
    Route::prefix('pesan')->group(function () {
        Route::get('/', [App\Http\Controllers\ContactController::class, 'index'])->name('admin.pesan');
        Route::get('/unread-count', [App\Http\Controllers\ContactController::class, 'getUnreadCount'])->name('admin.pesan.unread-count');
        Route::post('/{id}/read', [App\Http\Controllers\ContactController::class, 'markAsRead'])->name('admin.pesan.read');
        Route::delete('/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('admin.pesan.hapus');
    });
});

// Public Contact Route
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
