<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    public function formulir()
    {
        // ambil data formulir jika ada (berdasarkan email di session atau query jika diperlukan)
        // namun untuk saat ini kita biarkan kosong/baru untuk guest
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

        // Find or Create User background (Student role)
        $user = \App\Models\User::where('email', $request->email)->first();
        if (!$user) {
            $user = \App\Models\User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(12)),
                'role' => 'user'
            ]);
        }

        $pendaftaran = Pendaftaran::where('email', $request->email)->first();

        // Logika Re-upload: Hapus file lama jika ada upload baru
        $foto = $pendaftaran ? $pendaftaran->foto : null;
        if ($request->hasFile('foto')) {
            if ($foto) \Illuminate\Support\Facades\Storage::disk('public')->delete($foto);
            $foto = $request->file('foto')->store('foto', 'public');
        }

        $kk = $pendaftaran ? $pendaftaran->file_kk : null;
        if ($request->hasFile('file_kk')) {
            if ($kk) \Illuminate\Support\Facades\Storage::disk('public')->delete($kk);
            $kk = $request->file('file_kk')->store('dokumen/kk', 'public');
        }

        $akte = $pendaftaran ? $pendaftaran->file_akte : null;
        if ($request->hasFile('file_akte')) {
            if ($akte) \Illuminate\Support\Facades\Storage::disk('public')->delete($akte);
            $akte = $request->file('file_akte')->store('dokumen/akte', 'public');
        }

        $ijazah = $pendaftaran ? $pendaftaran->file_ijazah : null;
        if ($request->hasFile('file_ijazah')) {
            if ($ijazah) \Illuminate\Support\Facades\Storage::disk('public')->delete($ijazah);
            $ijazah = $request->file('file_ijazah')->store('dokumen/ijazah', 'public');
        }

        // Simpan ke database
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

            // Generate PDF
            try {
                $pdf = Pdf::loadView('pengguna.cetak', ['data' => $data, 'is_pdf' => true]);
                $pdfPath = storage_path('app/public/Bukti-Pendaftaran-' . $data->nisn . '.pdf');
                $pdf->save($pdfPath);
                
                // Kirim Email Notifikasi dengan Lampiran PDF
                \Illuminate\Support\Facades\Mail::to($request->email)->send(new \App\Mail\NotificationMail(
                    'Bukti Pendaftaran - SMA ERHA',
                    "Halo {$request->nama},\n\nSelamat, pendaftaran Anda telah berhasil!\n\nBerikut kami lampirkan Bukti Pendaftaran dalam bentuk PDF.\nSimpan bukti ini sebagai syarat daftar ulang.\n\nStatus verifikasi berkas akan kami informasikan selanjutnya melalui email ini.\n\nSalam,\nPanitia PPDB SMA ERHA Jatinagara",
                    $pdfPath
                ));
            } catch (\Exception $e) {
                logger('Gagal generate PDF atau kirim email: ' . $e->getMessage());
            }

            return redirect()->route('home')->with('success', 'Pendaftaran Berhasil! Bukti pendaftaran telah dikirim ke email Anda. Silakan cek Inbox/Spam.');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memproses pendaftaran: ' . $e->getMessage())->withInput();
        }
    }
}
