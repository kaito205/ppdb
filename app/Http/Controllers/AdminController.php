<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function login()
    {
        return view('admin.login');
    }

    public function dataSiswa()
    {
        $data = Pendaftaran::paginate(10);

        return view('admin.datasiswa', compact('data'));
    }

    public function hapusSiswa($id)
    {
        $data = Pendaftaran::findOrFail($id);
        $data->delete();

        return redirect()->route('datasiswa')->with('success', 'Data siswa berhasil dihapus.');
    }
    public function detailSiswa(string $id)
    {
        $data = Pendaftaran::findOrFail($id);
        return view('admin.detail', compact('data'));
    }

    public function verifikasiIndex()
    {
        $data = Pendaftaran::all(); // bisa difilter pakai where jika hanya yang pending
        return view('admin.verifikasi', compact('data'));
    }

    public function verifikasiForm($id)
    {
        $data = Pendaftaran::findOrFail($id);
        return view('admin.verifikasiForm', compact('data'));
    }

    public function verifikasiSimpan(Request $request, $id)
    {
        $request->validate([
            'verifikasi_dokumen' => 'required|in:Disetujui,Ditolak'
        ]);

        $data = Pendaftaran::findOrFail($id);
        $data->verifikasi_dokumen = $request->verifikasi_dokumen;
        $data->save();

        return redirect()->route('admin.siswa.detail', $id)->with('success', 'Status verifikasi diperbarui.');
    }
    public function pengumuman()
    {
        $data = Pendaftaran::all();
        return view('admin.pengumuman', compact('data'));
    }
    public function daftar()
    {
        $data = Pendaftaran::first();
        return view('admin.daftar', compact('data'));
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
