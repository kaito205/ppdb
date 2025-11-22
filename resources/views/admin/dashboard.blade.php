@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('containt')

<div class="row mb-4">
    <div class="col-12">
        <h4 class="font-weight-bold text-dark">Selamat Datang, Admin</h4>
        <p class="text-muted">Ringkasan aktivitas sistem PPDB & Website Profil SMA ERHA</p>
    </div>
</div>

<div class="row">

    <!-- Total Pendaftar -->
    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-left-primary">
            <div class="card-body">
                <h6 class="text-primary font-weight-bold">Total Pendaftar</h6>
                <h3 class="font-weight-bold">150</h3>
            </div>
        </div>
    </div>

    <!-- Validasi Calon Siswa -->
    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-left-warning">
            <div class="card-body">
                <h6 class="text-warning font-weight-bold">Menunggu Validasi</h6>
                <h3 class="font-weight-bold">40</h3>
            </div>
        </div>
    </div>

    <!-- Berkas Masuk -->
    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-left-info">
            <div class="card-body">
                <h6 class="text-info font-weight-bold">Berkas Masuk</h6>
                <h3 class="font-weight-bold">120</h3>
            </div>
        </div>
    </div>

    <!-- Diterima -->
    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-left-success">
            <div class="card-body">
                <h6 class="text-success font-weight-bold">Diterima</h6>
                <h3 class="font-weight-bold">90</h3>
            </div>
        </div>
    </div>
</div>

<hr>

<!-- Menu Cepat -->
<div class="row mt-4">

    <div class="col-md-4 mb-4">
        <a href="/admin/profil" class="text-decoration-none">
            <div class="card shadow-sm p-4">
                <h5 class="font-weight-bold text-dark">Kelola Profil Sekolah</h5>
                <p class="text-muted mb-0">Edit visi misi, sejarah, dan informasi sekolah</p>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-4">
        <a href="/admin/ekskul" class="text-decoration-none">
            <div class="card shadow-sm p-4">
                <h5 class="font-weight-bold text-dark">Kelola Ekstrakurikuler</h5>
                <p class="text-muted mb-0">Tambah atau edit data ekskul</p>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-4">
        <a href="/admin/prestasi" class="text-decoration-none">
            <div class="card shadow-sm p-4">
                <h5 class="font-weight-bold text-dark">Kelola Prestasi</h5>
                <p class="text-muted mb-0">Input prestasi & dokumentasi</p>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-4">
        <a href="/admin/calon-siswa" class="text-decoration-none">
            <div class="card shadow-sm p-4">
                <h5 class="font-weight-bold text-dark">Data Calon Siswa</h5>
                <p class="text-muted mb-0">Validasi data & download berkas</p>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-4">
        <a href="/admin/surat-diterima" class="text-decoration-none">
            <div class="card shadow-sm p-4">
                <h5 class="font-weight-bold text-dark">Surat Bukti Diterima</h5>
                <p class="text-muted mb-0">Cetak surat dan hasil pengumuman</p>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-4">
        <a href="/admin/berita" class="text-decoration-none">
            <div class="card shadow-sm p-4">
                <h5 class="font-weight-bold text-dark">Kelola Berita</h5>
                <p class="text-muted mb-0">Posting atau edit informasi terbaru</p>
            </div>
        </a>
    </div>
</div>

@endsection
