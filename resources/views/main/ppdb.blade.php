@extends('layouts.app')

@section('containt')
<section class="py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <!-- Header -->
        <div class="text-center mb-5">
            <h1 class="fw-bold text-blue display-4">Informasi <span class="text-success">PPDB</span></h1>
            <div class="mx-auto mt-2" style="width: 80px; height: 4px; background-color: #ffd700; border-radius: 10px;"></div>
            <p class="lead text-muted mt-3">Penerimaan Peserta Didik Baru Tahun Ajaran 2025/2026</p>
        </div>

        <div class="row g-4 mb-5">
            <!-- Syarat -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                    <div class="bg-blue-light p-3 rounded-3 mb-4 d-inline-block">
                        <i class="bi bi-file-earmark-text fs-3 text-blue"></i>
                    </div>
                    <h4 class="fw-bold text-blue mb-3">Syarat Pendaftaran</h4>
                    <ul class="text-muted ps-3">
                        <li class="mb-2">Fotokopi Ijazah / SKL SMP/MTs</li>
                        <li class="mb-2">Fotokopi Akta Kelahiran & KK</li>
                        <li class="mb-2">Pas Foto Terbaru 3x4 (3 lembar)</li>
                        <li class="mb-2">Mengisi Formulir Pendaftaran Online</li>
                    </ul>
                </div>
            </div>

            <!-- Alur -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                    <div class="bg-success-light p-3 rounded-3 mb-4 d-inline-block">
                        <i class="bi bi-diagram-3 fs-3 text-success"></i>
                    </div>
                    <h4 class="fw-bold text-blue mb-3">Alur Pendaftaran</h4>
                    <ol class="text-muted ps-3">
                        <li class="mb-2">Pendaftaran Online melalui website</li>
                        <li class="mb-2">Verifikasi berkas di sekolah</li>
                        <li class="mb-2">Pelaksanaan Tes Seleksi</li>
                        <li class="mb-2">Pengumuman & Daftar Ulang</li>
                    </ol>
                </div>
            </div>

            <!-- Biaya/Jadwal -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                    <div class="bg-warning-light p-3 rounded-3 mb-4 d-inline-block">
                        <i class="bi bi-calendar-event fs-3 text-warning"></i>
                    </div>
                    <h4 class="fw-bold text-blue mb-3">Jadwal Penting</h4>
                    <div class="text-muted">
                        <p class="mb-2"><strong>Gelombang 1:</strong><br>1 Jan - 31 Maret 2025</p>
                        <p class="mb-2"><strong>Gelombang 2:</strong><br>1 April - 30 Juni 2025</p>
                        <hr>
                        <a href="{{ route('register') }}" class="btn btn-blue w-100 rounded-pill">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .text-blue { color: #0e2e72; }
    .bg-blue-light { background-color: rgba(14, 46, 114, 0.1); }
    .bg-success-light { background-color: rgba(25, 135, 84, 0.1); }
    .bg-warning-light { background-color: rgba(255, 193, 7, 0.1); }
</style>
@endsection
