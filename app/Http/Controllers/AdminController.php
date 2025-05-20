<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }
    public function login() {
        return view('admin.login');
    }

    public function dataSiswa() {
        return view('admin.datasiswa');
    }
    public function seleksi() {
        return view('admin.seleksiadministrasi');
    }
    public function pengumuman() {
        return view('admin.pengumuman');
    }
    public function daftar() {
        return view('admin.daftar');
    }

    public function profile() {
        return view('admin.profile');
    }
}
