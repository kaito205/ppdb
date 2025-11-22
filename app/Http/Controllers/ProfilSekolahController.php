<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();
        return view('admin.profile.index', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = ProfilSekolah::first();

        $request->validate([
            'nama_sekolah' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if (!$profil) {
            $profil = new ProfilSekolah();
        }

        $profil->nama_sekolah = $request->nama_sekolah;
        $profil->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profil'), $namaFile);
            $profil->foto = $namaFile;
        }

        $profil->save();

        return back()->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}
