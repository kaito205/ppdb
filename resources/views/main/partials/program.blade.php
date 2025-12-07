<style>
    .program-icon {
        font-size: 2rem !important; /* Mobile size */
    }
    @media (min-width: 768px) {
        .program-icon {
            font-size: 3rem !important; /* Desktop size (approx 48px) */
        }
    }
</style>
<section id="program-unggulan" class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="text-center mb-3 mb-md-5">
            <h2 class="fw-bold fs-4 fs-md-2">Program <span class="text-success">Unggulan</span></h2>
            <p class="text-muted small">Program terbaik yang menjadi ciri khas {{ $profil->nama_sekolah ?? 'SMA ERHA Jatinagara' }}</p>
            <div style="width:80px;height:4px;background:#0d6efd;margin:0 auto;border-radius:10px;"></div>
        </div>

        <div class="row g-2 g-md-4 justify-content-center">
            <div class="col-6 col-md-4 mb-2" data-aos="fade-up" data-aos-delay="100">
                <div class="p-2 p-md-4 bg-white shadow rounded-4 h-100 text-center card-hover">
                    <div class="icon mb-2 mb-md-3">
                        <i class="bi bi-book-half program-icon" style="color:#198754;"></i>
                    </div>
                    <h5 class="fw-bold fs-6 fs-md-5">Program Tahfidz</h5>
                    <p class="text-muted mb-0 small" style="font-size: 0.75rem;">Pembinaan tahfidz Al-Qur’an terstruktur.</p>
                </div>
            </div>

            <div class="col-6 col-md-4 mb-2" data-aos="fade-up" data-aos-delay="200">
                <div class="p-2 p-md-4 bg-white shadow rounded-4 h-100 text-center card-hover">
                    <div class="icon mb-2 mb-md-3">
                        <i class="bi bi-translate program-icon" style="color:#0d6efd;"></i>
                    </div>
                    <h5 class="fw-bold fs-6 fs-md-5">English & Arabic Day</h5>
                    <p class="text-muted mb-0 small" style="font-size: 0.75rem;">Pembiasaan berbahasa Inggris dan Arab.</p>
                </div>
            </div>

            <div class="col-6 col-md-4 mb-2" data-aos="fade-up" data-aos-delay="300">
                <div class="p-2 p-md-4 bg-white shadow rounded-4 h-100 text-center card-hover">
                    <div class="icon mb-2 mb-md-3">
                        <i class="bi bi-trophy-fill program-icon" style="color:#ffc107;"></i>
                    </div>
                    <h5 class="fw-bold fs-6 fs-md-5">Pembinaan Prestasi</h5>
                    <p class="text-muted mb-0 small" style="font-size: 0.75rem;">Program khusus pembinaan lomba akademik & non-akademik.</p>
                </div>
            </div>
        </div>
    </div>
</section>
