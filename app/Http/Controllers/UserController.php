<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dashboard()
    {
        $data = \App\Models\Pendaftaran::where('user_id', Auth::id())->first();
        return view('pengguna.dashboard', compact('data'));
    }

    public function profile()
    {
        $data = Pendaftaran::where('user_id', Auth::id())->first();
        return view('pengguna.profile', compact('data'));
    }

    public function formulir()
    {
        // ambil data formulir jika sudah pernah mengisi
        $formulir = Pendaftaran::where('user_id', Auth::id())->first();
        return view('pengguna.formulir', compact('formulir'));
    }

    public function simpanFormulir(Request $request)
    {
        logger('User ID:', [Auth::id()]);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'asal_sekolah' => 'required|string|max:255',
            'jurusan' => 'nullable|string|max:255',
            'tahun_lulus' => 'required|string|max:10',
            'nilai_rata' => 'required|numeric|min:0|max:100',


            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'no_kk' => 'required|string|max:20',
            'file_kk' => 'required|mimes:pdf|max:2048',
            'file_akte' => 'required|mimes:pdf|max:2048',
            'file_ijazah' => 'nullable|mimes:pdf|max:2048',
        ]);

        // Simpan file
        $foto = $request->file('foto') ? $request->file('foto')->store('foto', 'public') : null;
        $kk = $request->file('file_kk')->store('dokumen/kk', 'public');
        $akte = $request->file('file_akte')->store('dokumen/akte', 'public');
        $ijazah = $request->file('file_ijazah') ? $request->file('file_ijazah')->store('dokumen/ijazah', 'public') : null;

        // Simpan ke database
        Pendaftaran::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'nama' => $request->nama,
                'nisn' => $request->nisn,
                'nik' => $request->nik,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'foto' => $foto,

                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'no_kk' => $request->no_kk,
                'file_kk' => $kk,
                'file_akte' => $akte,
                'file_ijazah' => $ijazah,

                'status_seleksi' => 'Diproses',
                'verifikasi_dokumen' => 'Pending',
            ]
        );

        return redirect()->route('dashboard.user')->with('success', 'Formulir berhasil dikirim!');
    }

    public function seleksi()
    {
        $data = Pendaftaran::where('user_id', Auth::id())->first();
        return view('pengguna.seleksi', compact('data'));
    }

    public function daftar()
    {
        return view('pengguna.daftar');
    }
}
