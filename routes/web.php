<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MainController::class, 'dashboard']);
Route::get('tentang', [MainController::class, 'tentangKami']);
Route::get('info', [MainController::class, 'informasi']);
Route::get('kontak', [MainController::class, 'kontak']);
Route::get('pendaftaran', [MainController::class, 'pendaftaran']);

Route::prefix('login')->group(function () {
    Route::get('user', [UserController::class, 'login'])->name('login');
    Route::get('registrasi', [UserController::class, 'registrasi'])->name('registrasi');
});


Route::prefix('user')->group(function () {
    Route::get('dashboard/user', [UserController::class, 'dashboard'])->name('dashboard.user');
    Route::get('profile', [UserController::class, 'profile'])->name('profile.user');
    Route::get('formulir', [UserController::class, 'formulir'])->name('formulir.user');
    Route::get('seleksi', [UserController::class, 'seleksi'])->name('seleksi.user');
    Route::get('daftar', [UserController::class, 'daftar'])->name('daftar.user');
});

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'login'])->name('login.admin');
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard.admin');
    Route::get('datasiswa', [AdminController::class, 'dataSiswa'])->name('datasiswa');
    Route::get('seleksi', [AdminController::class, 'seleksi'])->name('seleksi.admin');
    Route::get('pengumuman', [AdminController::class, 'pengumuman'])->name('pengumuman.admin');
    Route::get('daftar', [AdminController::class, 'daftar'])->name('daftar.admin');
    Route::get('profile', [AdminController::class, 'profile'])->name('profile.admin');
});
