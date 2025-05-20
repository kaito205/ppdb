<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard() {
        return view('main.dashboard');
    }

    public function tentangKami() {
        return view('main.tentangkami');
    }

    public function informasi() {
        return view('main.informasi');
    }

    public function kontak() {
        return view('main.kontak');
    }

    public function pendaftaran() {
        return view('main.pendaftaran');
    }
}
