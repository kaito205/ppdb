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
    use \App\Traits\UploadTrait;

    public function dashboard()
    {
        // Hitung total pendaftar dari tabel Pendaftaran
        $totalPendaftar = Pendaftaran::count();
        
        // Status Menunggu Validasi (Pendaftar yang belum dikonfirmasi)
        $menungguValidasi = Pendaftaran::where('status_seleksi', 'Diproses')->count();
        
        // Status Diterima (Lulus)
        $diterima = Pendaftaran::where('status_seleksi', 'Lulus')->count();
        
        // Status Ditolak (Tidak Lulus)
        $ditolak = Pendaftaran::where('status_seleksi', 'Tidak Lulus')->count();
        
        return view('admin.dashboard', compact('totalPendaftar', 'menungguValidasi', 'diterima', 'ditolak'));
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
            $data->foto = $this->uploadFile($request->file('foto'), 'uploads/ekskul');
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
        $request->validate([
            'nama' => 'required',
            'foto' => 'image|max:2048'
        ]);

        $data = Ekstrakurikuler::findOrFail($id);
        $data->nama = $request->nama;

        if ($request->hasFile('foto')) {
            $data->foto = $this->uploadFile($request->file('foto'), 'uploads/ekskul', $data->foto);
        }

        $data->save();

        return redirect()->route('admin.ekskul')->with('success', 'Berhasil update ekskul');
    }

    public function ekskulDelete($id)
    {
        $data = Ekstrakurikuler::findOrFail($id);
        if ($data->foto) {
            $this->deleteFile('uploads/ekskul', $data->foto);
        }
        $data->delete();
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
            $profil->foto = $this->uploadFile($request->file('foto'), 'uploads/profil', $profil->foto);
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
            $berita->gambar = $this->uploadFile($request->file('gambar'), 'uploads/berita');
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
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $berita = Berita::findOrFail($id);

        $berita->judul = $request->judul;
        
        // Generate unique slug
        $slug = Str::slug($request->judul);
        $count = Berita::where('slug', $slug)->where('id', '!=', $id)->count();
        if ($count > 0) {
            $slug .= '-' . time();
        }
        $berita->slug = $slug;
        $berita->isi = $request->isi;

        if ($request->hasFile('gambar')) {
            $berita->gambar = $this->uploadFile($request->file('gambar'), 'uploads/berita', $berita->gambar);
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
    }


    public function beritaDelete($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar) {
            $this->deleteFile('uploads/berita', $berita->gambar);
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

    // Summary Stats
    $stats = [
        'total' => Pendaftaran::count(),
        'pending' => Pendaftaran::where('status_seleksi', 'Diproses')->count(),
        'lulus' => Pendaftaran::where('status_seleksi', 'Lulus')->count(),
        'ditolak' => Pendaftaran::where('status_seleksi', 'Tidak Lulus')->count(),
    ];

    return view('admin.datasiswa', compact('data', 'stats'));
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
        
        // Logika real-time: tandai sudah dibaca saat dibuka
        if (!$data->is_read) {
            $data->is_read = true;
            $data->save();
        }

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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto && file_exists(storage_path('app/public/' . $user->foto))) {
                unlink(storage_path('app/public/' . $user->foto));
            }
            $user->foto = $request->file('foto')->store('profile', 'public');
        }

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
            'pemenang' => 'nullable|string',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = new \App\Models\Prestasi();
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->pemenang = $request->pemenang;

        if ($request->hasFile('foto')) {
            $data->foto = $this->uploadFile($request->file('foto'), 'uploads/prestasi');
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
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'pemenang' => 'nullable|string',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = \App\Models\Prestasi::findOrFail($id);
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->pemenang = $request->pemenang;

        if ($request->hasFile('foto')) {
            $data->foto = $this->uploadFile($request->file('foto'), 'uploads/prestasi', $data->foto);
        }

        $data->save();

        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function prestasiDelete($id)
    {
        $data = \App\Models\Prestasi::findOrFail($id);
        if ($data->foto) {
            $this->deleteFile('uploads/prestasi', $data->foto);
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
    $filename = "Laporan_Pendaftar_PPDB_" . date('Y-m-d') . ".xls";
    
    // Header for Excel Download
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Pragma: no-cache");
    header("Expires: 0");

    // Start HTML Table for Styled Excel
    echo '<style>
        .text-center { text-align: center; }
        .font-bold { font-weight: bold; }
        .bg-blue { background-color: #0e2e72; color: white; }
        td, th { padding: 5px; }
    </style>';
    echo '<table border="1">';
    echo '<tr><th colspan="14" style="font-size: 20px; font-weight: bold; background-color: #0e2e72; color: white; height: 40px; vertical-align: middle;">LAPORAN DATA PENDAFTAR SISWA BARU (PPDB)</th></tr>';
    echo '<tr><th colspan="14" style="font-size: 14px; font-weight: bold; height: 25px; vertical-align: middle;">Tahun Ajaran ' . date('Y') . '/' . (date('Y') + 1) . '</th></tr>';
    echo '<tr><td colspan="14" style="font-size: 11px;">Dicetak pada: ' . date('d F Y H:i:s') . '</td></tr>';
    echo '<tr></tr>'; // Empty row

    // Table Headers
    echo '<tr style="background-color: #0e2e72; color: white; font-weight: bold; text-align: center; height: 30px; vertical-align: middle;">';
    echo '<th>Nomor</th>';
    echo '<th>Nama Lengkap</th>';
    echo '<th>NIK</th>';
    echo '<th>NISN</th>';
    echo '<th>Nomor Kartu Keluarga</th>';
    echo '<th>Jenis Kelamin</th>';
    echo '<th>Tempat Lahir</th>';
    echo '<th>Tanggal Lahir</th>';
    echo '<th>Asal Sekolah</th>';
    echo '<th width="300">Alamat Lengkap</th>';
    echo '<th>Telepon / WhatsApp</th>';
    echo '<th>Email</th>';
    echo '<th>Nama Ayah</th>';
    echo '<th>Nama Ibu</th>';
    echo '</tr>';

    // Data rows
    foreach ($data as $index => $row) {
        echo '<tr>';
        echo '<td align="center" style="vertical-align: middle;">' . ($index + 1) . '</td>';
        echo '<td style="font-weight: bold; vertical-align: middle;">' . $row->nama . '</td>';
        echo '<td style="mso-number-format:\'@\'; vertical-align: middle;">' . ($row->nik ?? '-') . '</td>';
        echo '<td style="mso-number-format:\'@\'; vertical-align: middle;">' . $row->nisn . '</td>';
        echo '<td style="mso-number-format:\'@\'; vertical-align: middle;">' . ($row->no_kk ?? '-') . '</td>';
        echo '<td align="center" style="vertical-align: middle;">' . $row->jenis_kelamin . '</td>';
        echo '<td style="vertical-align: middle;">' . $row->tempat_lahir . '</td>';
        echo '<td style="vertical-align: middle;">' . \Carbon\Carbon::parse($row->tanggal_lahir)->format('d F Y') . '</td>';
        echo '<td style="vertical-align: middle;">' . $row->asal_sekolah . '</td>';
        echo '<td style="vertical-align: middle;">' . $row->alamat . '</td>';
        echo '<td style="mso-number-format:\'@\'; vertical-align: middle;">' . $row->no_hp . '</td>';
        echo '<td style="vertical-align: middle;">' . $row->email . '</td>';
        echo '<td style="vertical-align: middle;">' . $row->nama_ayah . '</td>';
        echo '<td style="vertical-align: middle;">' . $row->nama_ibu . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    exit();
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
