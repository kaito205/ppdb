@extends('layouts.app')

@section('containt')
<section class="akademik py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <!-- Header -->
        <div class="text-center mb-5">
            <h1 class="fw-bold text-blue display-4">Bidang <span class="text-success">Akademik</span></h1>
            <div class="mx-auto mt-2" style="width: 80px; height: 4px; background-color: #ffd700; border-radius: 10px;"></div>
            <p class="lead text-muted mt-3">Kurikulum Merdeka dan Standar Mutu Pendidikan SMA ERHA Jatinagara</p>
        </div>

        <div class="row g-4">
            <!-- Kurikulum -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-blue-light p-3 rounded-3 me-3">
                            <i class="bi bi-book-half fs-3 text-blue"></i>
                        </div>
                        <h3 class="fw-bold mb-0">Kurikulum Merdeka</h3>
                    </div>
                    <p class="text-muted">Kami menerapkan Kurikulum Merdeka yang memberikan keleluasaan kepada pendidik untuk menciptakan pembelajaran berkualitas yang sesuai dengan kebutuhan dan lingkungan belajar peserta didik.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Pembelajaran berbasis proyek (P5)</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Fokus pada materi esensial</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Pengembangan karakter sesuai Profil Pelajar Pancasila</li>
                    </ul>
                </div>
            </div>

            <!-- Program Unggulan -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-success-light p-3 rounded-3 me-3">
                            <i class="bi bi-star-fill fs-3 text-success"></i>
                        </div>
                        <h3 class="fw-bold mb-0">Program Unggulan</h3>
                    </div>
                    <p class="text-muted">Selain kurikulum nasional, kami memiliki program khusus untuk meningkatkan daya saing siswa di kancah nasional maupun internasional.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Bimbingan Intensif Masuk PTN</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> English Day & Arabic Day</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Literasi Digital & Coding Club</li>
                    </ul>
                </div>
            </div>
        </div>

        
    </div>
</section>

<style>
    .text-blue { color: #0e2e72; }
    .bg-blue { background-color: #0e2e72; }
    .bg-blue-light { background-color: rgba(14, 46, 114, 0.1); }
    .bg-success-light { background-color: rgba(25, 135, 84, 0.1); }
</style>
@endsection
