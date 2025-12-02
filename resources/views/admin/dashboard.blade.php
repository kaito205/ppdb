@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('containt')

<div class="row mb-4">
    <div class="col-12">
        <h4 class="fw-bold text-dark">Selamat Datang, Admin</h4>
        <p class="text-muted">Ringkasan aktivitas sistem PPDB & Website Profil SMA ERHA</p>
    </div>
</div>

<div class="row g-4">

    <!-- Total Akun -->
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                    <i class="bi bi-person-circle text-primary fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Pendaftar</h6>
                    <h3 class="fw-bold mb-0">{{ $totalAkun }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulir Masuk -->
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="bg-info bg-opacity-10 p-3 rounded-circle me-3">
                    <i class="bi bi-file-earmark-text-fill text-info fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Formulir Masuk</h6>
                    <h3 class="fw-bold mb-0">{{ $formulirMasuk }}</h3>
                </div>
            </div>
        </div>
    </div>


    <!-- Diterima -->
    <!-- Diterima -->
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                    <i class="bi bi-check-circle-fill text-success fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Diterima</h6>
                    <h3 class="fw-bold mb-0">{{ $diterima }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Pesan Masuk -->
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="bg-warning bg-opacity-10 p-3 rounded-circle me-3">
                    <i class="bi bi-envelope-fill text-warning fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Pesan Masuk</h6>
                    <h3 class="fw-bold mb-0">{{ $pesanMasuk }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="my-5">

<!-- Menu Cepat -->
<h5 class="fw-bold mb-4 text-dark">Menu Cepat</h5>
<div class="row g-4">

    <div class="col-md-4">
        <a href="{{ route('admin.profil') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 hover-shadow transition-all">
                <div class="card-body text-center p-4">
                    <div class="bg-light rounded-circle d-inline-flex p-3 mb-3">
                        <i class="bi bi-building fs-2 text-dark"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Kelola Profil Sekolah</h5>
                    <p class="text-muted small mb-0">Edit visi misi, sejarah, dan informasi sekolah</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('admin.ekskul') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 hover-shadow transition-all">
                <div class="card-body text-center p-4">
                    <div class="bg-light rounded-circle d-inline-flex p-3 mb-3">
                        <i class="bi bi-collection fs-2 text-dark"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Kelola Ekstrakurikuler</h5>
                    <p class="text-muted small mb-0">Tambah atau edit data ekskul</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('admin.prestasi') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 hover-shadow transition-all">
                <div class="card-body text-center p-4">
                    <div class="bg-light rounded-circle d-inline-flex p-3 mb-3">
                        <i class="bi bi-trophy fs-2 text-dark"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Kelola Prestasi</h5>
                    <p class="text-muted small mb-0">Input prestasi & dokumentasi</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('datasiswa') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 hover-shadow transition-all">
                <div class="card-body text-center p-4">
                    <div class="bg-light rounded-circle d-inline-flex p-3 mb-3">
                        <i class="bi bi-people fs-2 text-dark"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Data Calon Siswa</h5>
                    <p class="text-muted small mb-0">Validasi data & download berkas</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('admin.pesan') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 hover-shadow transition-all">
                <div class="card-body text-center p-4">
                    <div class="bg-light rounded-circle d-inline-flex p-3 mb-3">
                        <i class="bi bi-envelope-open fs-2 text-dark"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Pesan Masuk</h5>
                    <p class="text-muted small mb-0">Lihat pesan dari pengunjung</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('berita.index') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 hover-shadow transition-all">
                <div class="card-body text-center p-4">
                    <div class="bg-light rounded-circle d-inline-flex p-3 mb-3">
                        <i class="bi bi-newspaper fs-2 text-dark"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Kelola Berita</h5>
                    <p class="text-muted small mb-0">Posting atau edit informasi terbaru</p>
                </div>
            </div>
        </a>
    </div>
</div>

<style>
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
    .transition-all {
        transition: all 0.3s ease;
    }
</style>

@endsection
