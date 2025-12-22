{{-- ====== AKADEMIK ====== --}}
<section id="akademik" class="akademik py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <!-- Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">Bidang <span class="text-success">Akademik</span></h2>
            <div class="mx-auto mt-2" style="width: 80px; height: 4px; background-color: #ffd700; border-radius: 10px;"></div>
            <p class="lead text-muted mt-3">Kurikulum Merdeka dan Standar Mutu Pendidikan {{ $profil->nama_sekolah ?? 'SMA ERHA Jatinagara' }}</p>
        </div>

        <div class="row g-4">
            <!-- Kurikulum -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 card-hover">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-blue-light p-3 rounded-3 me-3">
                            <i class="bi bi-book-half fs-3 text-blue"></i>
                        </div>
                        <h4 class="fw-bold mb-0">Kurikulum Merdeka</h4>
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
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4 card-hover">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-success-light p-3 rounded-3 me-3">
                            <i class="bi bi-star-fill fs-3 text-success"></i>
                        </div>
                        <h4 class="fw-bold mb-0">Target Lulusan</h4>
                    </div>
                    <p class="text-muted">Lulusan kami dibekali dengan kompetensi yang mumpuni untuk melanjutkan ke jenjang pendidikan tinggi maupun dunia kerja.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Bimbingan Intensif Masuk PTN</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Sertifikasi Kemampuan Bahasa</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Karakter Islami yang Kokoh</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    .bg-blue-light { background-color: rgba(14, 46, 114, 0.1); }
    .bg-success-light { background-color: rgba(255, 215, 0, 0.15); }
</style>
