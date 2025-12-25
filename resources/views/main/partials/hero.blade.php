<section id="hero" class="py-0 position-relative overflow-hidden">
    <div id="heroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner h-100">
            <!-- Slide 1 -->
            <div class="carousel-item active h-100">
                <img src="{{ asset('img/hero2.webp') }}" class="d-block w-100 h-100 hero-img" alt="Hero 1">
                <div class="hero-overlay"></div>
                <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
                    <div class="hero-content" data-aos="fade-up" data-aos-duration="1200">
                        <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill fw-bold animate__animated animate__fadeInDown">PENERIMAAN SISWA BARU DIBUKA</span>
                        <h1 class="hero-title display-3 fw-bold text-white">Mempersiapkan Pemimpin <br>Masa Depan Berakhlak Mulia</h1>
                        <p class="hero-subtitle fs-5 mx-auto text-white-50 d-none d-md-block" style="max-width: 700px;">Membentuk generasi cerdas, inovatif, dan berkarakter islami untuk menghadapi tantangan peradaban global.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item h-100">
                <img src="{{ asset('img/hero1.webp') }}" class="d-block w-100 h-100 hero-img" alt="Hero 2">
                <div class="hero-overlay"></div>
                <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
                    <div class="hero-content" data-aos="fade-up" data-aos-duration="1200">
                        <span class="badge bg-success text-white mb-3 px-3 py-2 rounded-pill fw-bold">BOARDING SCHOOL</span>
                        <h1 class="hero-title display-3 fw-bold text-white">Pendidikan Berbasis <br><span class="text-success">Pesantren Modern</span></h1>
                        <p class="hero-subtitle fs-5 mx-auto text-white-50" style="max-width: 700px;">Kombinasi sempurna antara kurikulum nasional dan nilai-nilai keislaman dalam lingkungan asrama yang kondusif.</p>
                    </div>
                </div>
            </div>
            
            <!-- Slide 3 -->
            <div class="carousel-item h-100">
                <img src="{{ asset('img/hero.webp') }}" class="d-block w-100 h-100 hero-img" alt="Hero 3">
                <div class="hero-overlay"></div>
                <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
                    <div class="hero-content" data-aos="fade-up" data-aos-duration="1200">
                        <span class="badge bg-blue text-white mb-3 px-3 py-2 rounded-pill fw-bold">FASILITAS UNGGULAN</span>
                        <h1 class="hero-title display-3 fw-bold text-white">Sarana Belajar <br><span class="text-info">Lengkap & Modern</span></h1>
                        <p class="hero-subtitle fs-5 mx-auto text-white-50" style="max-width: 700px;">Gedung representatif, laboratorium canggih, dan fasilitas olahraga untuk menunjang kreativitas tanpa batas.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev w-auto px-4" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next w-auto px-4" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<style>
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.7));
        z-index: 1;
    }

    .carousel-caption {
        bottom: 0 !important;
        left: 0 !important;
        right: 0 !important;
        top: 0 !important;
        padding-bottom: 0 !important;
    }

    @media (max-width: 768px) {
        .carousel-caption {
            padding-bottom: 40px;
        }
    }
</style>
