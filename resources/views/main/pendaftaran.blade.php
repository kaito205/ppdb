@extends('layouts.app')

@section('containt')
<div class="container mt-5 mb-5">
    <h2>Pendaftaran Calon Siswa</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nama -->
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email Aktif</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <!-- Nomor Telepon -->
        <div class="form-group">
            <label for="noTelp">Nomor Telepon</label>
            <input type="text" class="form-control" name="noTelp" required>
        </div>

        <!-- Alamat -->
        <div class="form-group">
            <label for="alamat">Alamat Lengkap</label>
            <textarea class="form-control" name="alamat" required></textarea>
        </div>

        <!-- Pilihan Jurusan -->
        <div class="form-group">
            <label for="pilihanJurusan">Pilihan Jurusan</label>
            <select class="form-control" name="pilihanJurusan" required>
                <option value="IPA">IPA</option>
                <option value="IPS">IPS</option>
                <option value="Bahasa">Bahasa</option>
            </select>
        </div>

        <!-- Upload Dokumen -->
        <div class="form-group">
            <label for="dokumen">Upload Dokumen (PDF/ZIP)</label>
            <input type="file" class="form-control" name="dokumen[]" multiple required>
        </div>

        <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
    </form>
</div>
@endsection
