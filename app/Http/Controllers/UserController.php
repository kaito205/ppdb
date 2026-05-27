<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function formulir()
    {
        return view('pengguna.formulir');
    }

    public function simpanFormulir(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|numeric|digits:10',
            'nik' => 'required|numeric|digits:16',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string',
            'no_hp' => 'required|numeric|digits_between:10,14',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'asal_sekolah' => 'required|string|max:255',
            'tahun_lulus' => 'required|numeric|digits:4',

            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'no_kk' => 'required|numeric|digits:16',
            'file_kk' => 'nullable|mimes:pdf|max:2048',
            'file_akte' => 'nullable|mimes:pdf|max:2048',
            'file_ijazah' => 'nullable|mimes:pdf|max:2048',
        ]);

        // Find or Create User
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make(Str::random(12)),
                'role' => 'user'
            ]);
        }

        $pendaftaran = Pendaftaran::where('email', $request->email)->first();

        // Handle File Uploads
        $foto = $pendaftaran ? $pendaftaran->foto : null;
        if ($request->hasFile('foto')) {
            if ($foto) Storage::disk('public')->delete($foto);
            $foto = $request->file('foto')->store('foto', 'public');
        }

        $kk = $pendaftaran ? $pendaftaran->file_kk : null;
        if ($request->hasFile('file_kk')) {
            if ($kk) Storage::disk('public')->delete($kk);
            $kk = $request->file('file_kk')->store('dokumen/kk', 'public');
        }

        $akte = $pendaftaran ? $pendaftaran->file_akte : null;
        if ($request->hasFile('file_akte')) {
            if ($akte) Storage::disk('public')->delete($akte);
            $akte = $request->file('file_akte')->store('dokumen/akte', 'public');
        }

        $ijazah = $pendaftaran ? $pendaftaran->file_ijazah : null;
        if ($request->hasFile('file_ijazah')) {
            if ($ijazah) Storage::disk('public')->delete($ijazah);
            $ijazah = $request->file('file_ijazah')->store('dokumen/ijazah', 'public');
        }

        try {
            $data = Pendaftaran::updateOrCreate(
                ['email' => $request->email],
                [
                    'user_id' => $user->id,
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
                    'asal_sekolah' => $request->asal_sekolah,
                    'tahun_lulus' => $request->tahun_lulus,
                    'nama_ayah' => $request->nama_ayah,
                    'nama_ibu' => $request->nama_ibu,
                    'no_kk' => $request->no_kk,
                    'file_kk' => $kk,
                    'file_akte' => $akte,
                    'file_ijazah' => $ijazah,
                    'status_seleksi' => $pendaftaran ? $pendaftaran->status_seleksi : 'Diproses',
                    'verifikasi_dokumen' => $pendaftaran ? $pendaftaran->verifikasi_dokumen : 'Pending',
                ]
            );

            // Send Email
            try {
                Mail::to($request->email)->send(new \App\Mail\NotificationMail(
                    'Pendaftaran Berhasil - SMA ERHA',
                    "Halo {$request->nama},\n\nSelamat, pendaftaran Anda telah berhasil kami terima!\n\nID Pendaftaran Anda: #PPDB-".str_pad($data->id, 4, '0', STR_PAD_LEFT)."\n\nSilakan cetak kartu pendaftaran Anda melalui link berikut: ".route('pendaftaran.cetak', $data->id)."\n\nTerima kasih."
                ));
            } catch (\Exception $e) {
                logger('Gagal kirim email: ' . $e->getMessage());
            }

            return redirect()->route('pendaftaran.sukses', ['id' => $data->id]);

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal: ' . $e->getMessage())->withInput();
        }
    }

    public function sukses(Request $request)
    {
        $id = $request->query('id');
        $data = Pendaftaran::findOrFail($id);
        return view('pengguna.sukses', compact('data'));
    }

    public function cetakKartu($id)
    {
        $data = Pendaftaran::findOrFail($id);
        $pdf = Pdf::loadView('pengguna.kartu_pdf', compact('data'));
        return $pdf->download('Kartu_Pendaftaran_'.$data->nisn.'.pdf');
    }
}
