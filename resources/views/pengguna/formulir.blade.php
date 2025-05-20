@extends('layouts.user')

@section('title', 'Formulir Pendaftaran')

@section('containt')
<div class="container mt-5 mb-5">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <h4><i class="bi bi-pencil-square me-2"></i> Formulir Pendaftaran</h4>
            <p class="mb-0 small">Lengkapi atau periksa kembali formulir pendaftaranmu.</p>
        </div>

        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- === DATA DIRI === --}}
                <h5 class="text-primary mb-3"><i class="bi bi-person-lines-fill me-1"></i> Data Diri</h5>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" name="nisn" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="agama" class="">Agama</label>
                        <select name="agama" class="form-select" aria-label="Default select example" required>
                            <option value="">-- Pilih --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Tulis alamat lengkapmu..." required></textarea>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Aktif</label>
                    <input type="email" name="email" class="form-control" placeholder="contoh@email.com" required>
                </div>

                <div class="mb-4">
                    <label for="foto" class="form-label">Foto Diri</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>

                {{-- === DATA KELUARGA === --}}
                <h5 class=" mt-4 mb-3"><i class="bi bi-people-fill me-1"></i> Detail Data Keluarga</h5>

                <div class="mb-3">
                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="no_kk" class="form-label">Nomor KK</label>
                    <input type="text" name="no_kk" class="form-control" required>
                </div>

                {{-- Upload Dokumen Keluarga --}}
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="file_kk" class="form-label">Upload Kartu Keluarga (PDF)</label>
                        <input type="file" name="file_kk" class="form-control" accept=".pdf" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="file_akte" class="form-label">Upload Akte Kelahiran (PDF)</label>
                        <input type="file" name="file_akte" class="form-control" accept=".pdf" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="file_ijazah" class="form-label">Upload Ijazah Terakhir (PDF)</label>
                        <input type="file" name="file_ijazah" class="form-control" accept=".pdf">
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle me-1"></i> Kirim Formulir
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
