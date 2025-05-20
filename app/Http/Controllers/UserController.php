<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login() {
        return view('pengguna.login');
    }

    public function registrasi() {
        return view('pengguna.registrasi');
    }

    public function dashboard() {
        return view('pengguna.dashboard');
    }
    public function profile() {
        return view('pengguna.profile');
    }
    public function formulir() {
        return view('pengguna.formulir');
    }
    public function seleksi() {
        return view('pengguna.seleksi');
    }
    public function daftar() {
        return view('pengguna.daftar');
    }

}
