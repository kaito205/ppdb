@extends('layouts.admin')

@section('containt')
<div class="container-fluid py-4">

    <!-- Judul Dashboard -->
    <h3 class="mb-4 fw-bold">Dashboard Admin</h3>

    <!-- Kartu Statistik -->
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Calon Siswa</h5>
                    <p class="card-text fs-3 fw-bold text-primary">120</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Siswa Diterima</h5>
                    <p class="card-text fs-3 fw-bold text-success">80</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Ekstrakurikuler</h5>
                    <p class="card-text fs-3 fw-bold text-warning">12</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Berita</h5>
                    <p class="card-text fs-3 fw-bold text-danger">5</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Navigasi Admin -->
    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <a href="#" class="text-decoration-none">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Kelola Profil Sekolah</h5>
                        <p>Edit profil, visi misi, dan informasi sekolah.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="#" class="text-decoration-none">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Kelola Ekstrakurikuler</h5>
                        <p>Tambah dan edit kegiatan ekstrakurikuler.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="#" class="text-decoration-none">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Kelola Prestasi</h5>
                        <p>Atur prestasi sekolah.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="#" class="text-decoration-none">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Kelola Pendaftaran</h5>
                        <p>Melihat dan memverifikasi calon siswa.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="#" class="text-decoration-none">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Kelola Berita</h5>
                        <p>Buat dan edit berita sekolah.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="#" class="text-decoration-none">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Laporan Pendaftaran</h5>
                        <p>Lihat rekap dan laporan siswa diterima.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
