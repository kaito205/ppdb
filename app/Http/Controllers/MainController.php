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
        $profil = ProfilSekolah::first() ?? new ProfilSekolah();
        return view('main.profil', compact('profil'));
    }


    public function akademik()
    {
        $profil = ProfilSekolah::first() ?? new ProfilSekolah();
        return view('main.akademik', compact('profil'));
    }

    public function ekskul()
    {
        $ekskul = Ekstrakurikuler::all();
        return view('main.ekskul', compact('ekskul'));
    }

    public function prestasi()
    {
        $prestasi = \App\Models\Prestasi::latest()->get();
        return view('main.prestasi', compact('prestasi'));
    }

    public function galeri()
    {
        $profil = ProfilSekolah::first() ?? new ProfilSekolah();
        return view('main.galeri', compact('profil'));
    }

    public function ppdb()
    {
        $profil = ProfilSekolah::first() ?? new ProfilSekolah();
        return view('main.ppdb', compact('profil'));
    }

}








