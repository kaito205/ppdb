<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Pendaftaran;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalAkun = \App\Models\User::where('role', 'user')->count();
        $formulirMasuk = Pendaftaran::count();
        $menungguValidasi = Pendaftaran::where('verifikasi_dokumen', 'Pending')->count();
        $diterima = Pendaftaran::where('status_seleksi', 'Lulus')->count();
        $pesanMasuk = \App\Models\Contact::count();

        return view('admin.dashboard', compact('totalAkun', 'formulirMasuk', 'menungguValidasi', 'diterima', 'pesanMasuk'));
    }
    public function login()
    {
        return view('admin.login');
    }

    public function ekskulIndex()
    {
        $data = Ekstrakurikuler::all();
        return view('admin.ekskul.index', compact('data'));
    }

    public function ekskulCreate()
    {
        return view('admin.ekskul.create');
    }

    public function ekskulStore(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'image|max:2048'
        ]);

        $data = new Ekstrakurikuler();
        $data->nama = $request->nama;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('uploads/ekskul'), $nama);
            $data->foto = $nama;
        }

        $data->save();

        return redirect()->route('admin.ekskul')->with('success', 'Berhasil tambah ekskul');
    }

    public function ekskulEdit($id)
    {
        $data = Ekstrakurikuler::findOrFail($id);
        return view('admin.ekskul.edit', compact('data'));
    }

    public function ekskulUpdate(Request $request, $id)
    {
        $data = Ekstrakurikuler::findOrFail($id);
        $data->nama = $request->nama;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('uploads/ekskul'), $nama);
            $data->foto = $nama;
        }

        $data->save();

        return redirect()->route('admin.ekskul')->with('success', 'Berhasil update ekskul');
    }

    public function ekskulDelete($id)
    {
        Ekstrakurikuler::findOrFail($id)->delete();
        return back()->with('success', 'Ekskul dihapus');
    }




    // ============================
    // PROFIL SEKOLAH
    // ============================
    public function profilIndex()
    {
        $profil = ProfilSekolah::first();
        return view('admin.profile.index', compact('profil'));
    }

    public function profilUpdate(Request $request)
    {
        $profil = ProfilSekolah::first() ?? new ProfilSekolah();

        $profil->nama_sekolah = $request->nama_sekolah;
        $profil->deskripsi = $request->deskripsi;
        $profil->visi = $request->visi;
        $profil->misi = $request->misi;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('uploads/profil'), $nama);
            $profil->foto = $nama;
        }

        $profil->save();

        return back()->with('success', 'Profil diperbarui');
    }

    // ===========================
    // CRUD BERITA
    // ===========================

    public function beritaIndex()
    {
        $berita = Berita::orderBy('id', 'DESC')->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function beritaCreate()
    {
        return view('admin.berita.create');
    }

    public function beritaStore(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->slug = Str::slug($request->judul);
        $berita->isi = $request->isi;


        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/berita'), $filename);
            $berita->gambar = $filename;
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function beritaEdit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function beritaUpdate(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $berita->judul = $request->judul;
        $berita->slug = Str::slug($request->judul); // ← wajib juga
        $berita->isi = $request->isi;

        if ($request->hasFile('gambar')) {

            if ($berita->gambar && file_exists(public_path('uploads/berita/' . $berita->gambar))) {
                unlink(public_path('uploads/berita/' . $berita->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/berita'), $filename);
            $berita->gambar = $filename;
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
    }


    public function beritaDelete($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar && file_exists(public_path('uploads/berita/' . $berita->gambar))) {
            unlink(public_path('uploads/berita/' . $berita->gambar));
        }

        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus');
    }


    public function dataSiswa(Request $request)
    {
        $query = Pendaftaran::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'LIKE', '%' . $search . '%')
                  ->orWhere('nisn', 'LIKE', '%' . $search . '%');
            });
        }

        $data = $query->paginate(10);
        $data->appends(['search' => $request->search]);

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

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    // ============================
    // PRESTASI SEKOLAH
    // ============================
    public function prestasiIndex()
    {
        $data = \App\Models\Prestasi::orderBy('id', 'DESC')->paginate(10);
        return view('admin.prestasi.index', compact('data'));
    }

    public function prestasiCreate()
    {
        return view('admin.prestasi.create');
    }

    public function prestasiStore(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = new \App\Models\Prestasi();
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/prestasi'), $filename);
            $data->foto = $filename;
        }

        $data->save();

        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function prestasiEdit($id)
    {
        $data = \App\Models\Prestasi::findOrFail($id);
        return view('admin.prestasi.edit', compact('data'));
    }

    public function prestasiUpdate(Request $request, $id)
    {
        $data = \App\Models\Prestasi::findOrFail($id);
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            if ($data->foto && file_exists(public_path('uploads/prestasi/' . $data->foto))) {
                unlink(public_path('uploads/prestasi/' . $data->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/prestasi'), $filename);
            $data->foto = $filename;
        }

        $data->save();

        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function prestasiDelete($id)
    {
        $data = \App\Models\Prestasi::findOrFail($id);
        if ($data->foto && file_exists(public_path('uploads/prestasi/' . $data->foto))) {
            unlink(public_path('uploads/prestasi/' . $data->foto));
        }
        $data->delete();
        return back()->with('success', 'Prestasi berhasil dihapus');
    }

    // ============================
    // EXPORT & EMAIL FEATURES
    // ============================

    public function exportExcel()
    {
        $data = Pendaftaran::all();
        $filename = "data_pendaftar_" . date('Y-m-d_H-i-s') . ".csv";
        
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Nama', 'NISN', 'Jenis Kelamin', 'Tempat Lahir', 'Tanggal Lahir', 'Asal Sekolah', 'Alamat', 'No HP', 'Email', 'Nama Ayah', 'Nama Ibu', 'Status Formulir');

    $callback = function() use($data, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($data as $row) {
            fputcsv($file, array(
                $row['nama'],
                $row['nisn'],
                $row['jenis_kelamin'],
                $row['tempat_lahir'],
                $row['tanggal_lahir'],
                $row['asal_sekolah'],
                $row['alamat'],
                $row['no_hp'],
                $row['email'],
                $row['nama_ayah'],
                $row['nama_ibu'],
                $row['status_seleksi'] == 'Lulus' ? 'Lengkap' : ($row['status_seleksi'] == 'Tidak Lulus' ? 'Tidak Lengkap' : 'Menunggu')
            ));
        }

        fclose($file);
    };
        return response()->stream($callback, 200, $headers);
    }

    public function exportPdf()
    {
        $data = Pendaftaran::all();
        return view('admin.pdf_view', compact('data'));
    }

    public function terimaSiswa(Request $request, $id)
    {
        $siswa = Pendaftaran::findOrFail($id);
        $siswa->status_seleksi = 'Lulus';
        $siswa->save();

        // Generate PDF
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.surat_diterima', [
            'siswa' => $siswa,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'tempat' => $request->tempat
        ]);

        // Send Email
        if ($siswa->email) {
            try {
                \Illuminate\Support\Facades\Mail::send([], [], function ($message) use ($siswa, $pdf) {
                    $message->to($siswa->email)
                        ->subject('Selamat! Anda Diterima di SMA ERHA')
                        ->attachData($pdf->output(), 'Surat_Diterima.pdf');
                });
            } catch (\Exception $e) {
                return back()->with('warning', 'Siswa diterima, tetapi gagal mengirim email: ' . $e->getMessage());
            }
        }

        return back()->with('success', 'Siswa diterima dan email telah dikirim.');
    }

    public function tolakSiswa(Request $request, $id)
    {
        $siswa = Pendaftaran::findOrFail($id);
        $siswa->status_seleksi = 'Tidak Lulus';
        $siswa->save();

        // Send Email
        if ($siswa->email) {
            try {
                $alasan = $request->alasan;
                \Illuminate\Support\Facades\Mail::raw("Mohon maaf, Anda tidak lulus seleksi.\n\nAlasan: " . $alasan . "\n\nTetap semangat!", function ($message) use ($siswa) {
                    $message->to($siswa->email)
                        ->subject('Pengumuman Hasil Seleksi SMA ERHA');
                });
            } catch (\Exception $e) {
                return back()->with('warning', 'Siswa ditolak, tetapi gagal mengirim email: ' . $e->getMessage());
            }
        }

        return back()->with('success', 'Siswa ditolak dan email pemberitahuan telah dikirim.');
    }
}
