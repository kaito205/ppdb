<section id="profil-sekolah" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold display-5">Profil <span class="text-blue">Sekolah</span></h2>
            <p class="text-muted">Mengenal lebih dekat visi, misi, dan identitas perjalanan pendidikan kami.</p>
            <div class="mx-auto" style="width: 80px; height: 4px; background: #0e2e72; border-radius: 10px;"></div>
        </div>

       

        <div class="row g-4 mt-2">
            <!-- Card 1: Sejarah -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('profil') }}#tentang" class="text-decoration-none h-100">
                    <div class="card border-0 profil-mini-card shadow-sm rounded-4 h-100 p-4 text-center">
                        <div class="profil-icon-circle bg-blue-light mb-4 mx-auto">
                            <i class="bi bi-clock-history text-blue fs-3"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Tentang Sekolah</h4>
                        <p class="text-muted small mb-3">Perjalanan panjang kami dalam membangun generasi bangsa yang berkarakter sejak berdiri hingga saat ini.</p>
                        <span class="text-blue fw-bold small">Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i></span>
                    </div>
                </a>
            </div>

            <!-- Card 2: Visi -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('profil') }}#visimisi" class="text-decoration-none h-100">
                    <div class="card border-0 profil-mini-card shadow-sm rounded-4 h-100 p-4 text-center">
                        <div class="profil-icon-circle bg-success-light mb-4 mx-auto">
                            <i class="bi bi-eye text-success fs-3"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Visi</h4>
                        <p class="text-muted small mb-3">Menjadi lembaga pendidikan terdepan dalam membentuk generasi cerdas, mandiri, dan berakhlakul karimah.</p>
                        <span class="text-success fw-bold small">Lihat Detail <i class="bi bi-arrow-right ms-1"></i></span>
                    </div>
                </a>
            </div>

            <!-- Card 3: Misi -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('profil') }}#visimisi" class="text-decoration-none h-100">
                    <div class="card border-0 profil-mini-card shadow-sm rounded-4 h-100 p-4 text-center">
                        <div class="profil-icon-circle bg-warning-light mb-4 mx-auto">
                            <i class="bi bi-bullseye text-warning fs-3"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Misi</h4>
                        <p class="text-muted small mb-3">Langkah nyata kami melalui pendidikan berkualitas, pembiasaan karaker Islami, dan pengembangan bakat.</p>
                        <span class="text-warning fw-bold small">Pelajari Misi <i class="bi bi-arrow-right ms-1"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    .info-mini-card {
        background: #fff;
        border: 1px solid rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }
    .info-mini-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    }
    .mini-icon-box {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }
    @media (max-width: 768px) {
        .mini-icon-box {
            width: 32px;
            height: 32px;
            font-size: 0.9rem;
            border-radius: 8px;
        }
        .info-mini-card {
            border-radius: 15px !important;
        }
    }

    .profil-mini-card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(0,0,0,0.05);
    }
    .profil-mini-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(14, 46, 114, 0.1) !important;
        border-color: rgba(14, 46, 114, 0.2);
    }
    .profil-icon-circle {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    .profil-mini-card:hover .profil-icon-circle {
        transform: rotateY(180deg);
    }
    .bg-blue-light { background-color: rgba(14, 46, 114, 0.08); }
    .bg-success-light { background-color: rgba(25, 135, 84, 0.08); }
    .bg-warning-light { background-color: rgba(255, 193, 7, 0.08); }
</style>

