<?php

namespace App\Http\Controllers;

use App\Models\Berita; // <-- tambahkan
use App\Models\Ekstrakurikuler;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function dashboard()
    {
        $ekskul = Ekstrakurikuler::all();
        $profil = ProfilSekolah::first() ?? new ProfilSekolah();
        $berita = Berita::latest()->take(10)->get(); 
        $prestasi = \App\Models\Prestasi::latest()->take(3)->get();

        return view('main.dashboard', compact('ekskul', 'profil', 'berita', 'prestasi'));
    }

    public function detailBerita($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $beritaLain = Berita::where('slug', '!=', $slug)->latest()->take(5)->get();
        return view('main.berita-detail', compact('berita', 'beritaLain'));
    }
}
