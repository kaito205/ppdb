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
        $prestasi = \App\Models\Prestasi::latest()->take(6)->get();

        return view('main.dashboard', compact('ekskul', 'profil', 'berita', 'prestasi'));
    }

    public function detailBerita($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $beritaLain = Berita::where('slug', '!=', $slug)->latest()->take(5)->get();
        return view('main.berita-detail', compact('berita', 'beritaLain'));
    }

    public function berita(Request $request)
    {
        $query = $request->input('q');
        
        $berita = Berita::query();

        if ($query) {
            $berita->where('judul', 'like', '%' . $query . '%')
                   ->orWhere('isi', 'like', '%' . $query . '%');
        }

        $berita = $berita->latest()->paginate(6);
        $beritaLain = Berita::latest()->take(5)->get();

        return view('main.berita', compact('berita', 'beritaLain', 'query'));
    }

    public function profil()
    {
        return view('main.profil');
    }

    public function pesantren()
    {
        $profil = ProfilSekolah::first() ?? new ProfilSekolah();
        return view('main.pesantren', compact('profil'));
    }
}
