<section id="hero" class="py-0">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-inner">

            <!-- Slide 1: Welcome -->
            <div class="carousel-item active">
                <img src="{{ asset('img/hero2.webp') }}" class="d-block w-100 hero-img">
                <div class="hero-overlay"></div>
                <div class="carousel-caption">
                    <div class="hero-content" data-aos="fade-up" data-aos-duration="1200">
                        <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill fw-bold animate__animated animate__fadeInDown">PENERIMAAN SISWA BARU DIBUKA</span>
                        <h1 class="hero-title display-3 fw-bold">Mempersiapkan Pemimpin <br>Masa Depan Berakhlak Mulia</h1>
                        <p class="hero-subtitle fs-5 mx-auto opacity-75" style="max-width: 700px;">Membentuk generasi cerdas, inovatif, dan berkarakter islami untuk menghadapi tantangan peradaban global.</p>
                        <div class="mt-4">
                            <a href="{{ route('register') }}" class="btn btn-warning btn-lg px-5 py-3 rounded-pill fw-bold shadow-lg me-3 transition-all">Daftar Sekarang</a>
                            <a href="{{ route('profil') }}" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill fw-bold transition-all">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Pesantren Modern -->
            <div class="carousel-item">
                <img src="{{ asset('img/hero1.webp') }}" class="d-block w-100 hero-img">
                <div class="hero-overlay"></div>
                <div class="carousel-caption">
                    <div class="hero-content" data-aos="fade-up" data-aos-duration="1200">
                        <span class="badge bg-success text-white mb-3 px-3 py-2 rounded-pill fw-bold">BOARDING SCHOOL</span>
                        <h1 class="hero-title display-3 fw-bold">Pendidikan Berbasis <br><span class="text-success">Pesantren Modern</span></h1>
                        <p class="hero-subtitle fs-5 mx-auto opacity-75" style="max-width: 700px;">Kombinasi sempurna antara kurikulum nasional dan nilai-nilai keislaman dalam lingkungan asrama yang kondusif.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Fasilitas -->
            <div class="carousel-item">
                <img src="{{ asset('img/head1.webp') }}" class="d-block w-100 hero-img">
                <div class="hero-overlay" style="background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));"></div>
                <div class="carousel-caption">
                    <div class="hero-content" data-aos="fade-up" data-aos-duration="1200">
                        <span class="badge bg-blue text-white mb-3 px-3 py-2 rounded-pill fw-bold">FASILITAS UNGGULAN</span>
                        <h1 class="hero-title display-3 fw-bold">Sarana Belajar <br><span class="text-info">Lengkap & Modern</span></h1>
                        <p class="hero-subtitle fs-5 mx-auto opacity-75" style="max-width: 700px;">Gedung representatif, laboratorium canggih, dan fasilitas olahraga untuk menunjang kreativitas tanpa batas.</p>
                        <div class="mt-4">
                            <a href="{{ route('fasilitas') }}" class="btn btn-info text-white btn-lg px-5 py-3 rounded-pill fw-bold shadow-lg transition-all">Lihat Fasilitas</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 4: Ekstrakurikuler -->
            <div class="carousel-item">
                <img src="{{ asset('img/head2.webp') }}" class="d-block w-100 hero-img">
                <div class="hero-overlay"></div>
                <div class="carousel-caption">
                    <div class="hero-content" data-aos="fade-up" data-aos-duration="1200">
                        <span class="badge bg-danger text-white mb-3 px-3 py-2 rounded-pill fw-bold">EKSTRAKURIKULER</span>
                        <h1 class="hero-title display-3 fw-bold">Wadah Kreativitas <br><span class="text-danger">& Bakat Siswa</span></h1>
                        <p class="hero-subtitle fs-5 mx-auto opacity-75" style="max-width: 700px;">Temukan dan asah potensi dirimu melalui berbagai kegiatan pengembangan diri yang variatif dan berprestasi.</p>
                        <div class="mt-4">
                            <a href="{{ route('ekskul') }}" class="btn btn-danger btn-lg px-5 py-3 rounded-pill fw-bold shadow-lg transition-all">Eksplorasi Program</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 5: Prestasi -->
            <div class="carousel-item">
                <img src="{{ asset('img/head3.webp') }}" class="d-block w-100 hero-img">
                <div class="hero-overlay"></div>
                <div class="carousel-caption">
                    <div class="hero-content" data-aos="fade-up" data-aos-duration="1200">
                        <span class="badge bg-primary text-white mb-3 px-3 py-2 rounded-pill fw-bold">PRESTASI GEMILANG</span>
                        <h1 class="hero-title display-3 fw-bold">Mencetak Generasi <br><span class="text-primary">Juara & Kompetitif</span></h1>
                        <p class="hero-subtitle fs-5 mx-auto opacity-75" style="max-width: 700px;">Bangga menjadi saksi lahirnya juara-juara baru di berbagai bidang akademik maupun olahraga.</p>
                    </div>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev w-auto px-4" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next w-auto px-4" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

        <!-- Wave Divider -->
        <div class="hero-wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.43,151.11,101.62,210,95.8,241.4,92.74,281.33,63.9,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>

    <!-- Floating Cards Section -->
    <div class="container position-relative hero-cards-wrapper" style="margin-top: -100px; z-index: 100;">
        <div class="row g-3 justify-content-center">
            
            <!-- Item 1: PPDB -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 info-mini-card shadow-sm rounded-4 h-100">
                    <div class="card-body d-flex align-items-center p-2 p-md-3">
                        <div class="mini-icon-box bg-warning-light text-warning me-2 me-md-3">
                            <i class="bi bi-megaphone"></i>
                        </div>
                        <div>
                            <small class="text-muted d-none d-md-block" style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase;">Status PPDB</small>
                            <h6 class="fw-bold mb-0" style="font-size: 0.9rem;">PPDB Dibuka</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 2: Siswa -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 info-mini-card shadow-sm rounded-4 h-100">
                    <div class="card-body d-flex align-items-center p-2 p-md-3">
                        <div class="mini-icon-box bg-blue-light text-blue me-2 me-md-3">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <small class="text-muted d-none d-md-block" style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase;">Total Siswa</small>
                            <h6 class="fw-bold mb-0" style="font-size: 0.9rem;">1000+ Siswa</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 3: Akreditasi -->
            <div class="col-lg-3 col-md-4 col-12" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 info-mini-card shadow-sm rounded-4 h-100">
                    <div class="card-body d-flex align-items-center p-2 p-md-3">
                        <div class="mini-icon-box bg-success-light text-success me-2 me-md-3">
                            <i class="bi bi-patch-check"></i>
                        </div>
                        <div>
                            <small class="text-muted d-none d-md-block" style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase;">Akreditasi</small>
                            <h6 class="fw-bold mb-0" style="font-size: 0.9rem;">Akreditasi B</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .hero-wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: rotate(180deg);
        z-index: 5;
    }

    .hero-wave svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 60px;
    }

    .hero-wave .shape-fill {
        fill: #f8f9fa; /* Matches bg-light of next section */
    }

    .info-mini-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.8);
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .info-mini-card:hover {
        transform: translateY(-8px);
        background: #fff;
        box-shadow: 0 15px 35px rgba(0,0,0,0.15) !important;
    }
    .mini-icon-box {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
        box-shadow: inset 0 0 0 1px rgba(0,0,0,0.05);
    }
    .bg-warning-light { background-color: rgba(255, 193, 7, 0.2); }
    .bg-blue-light { background-color: rgba(14, 46, 114, 0.15); }
    .bg-success-light { background-color: rgba(40, 167, 69, 0.15); }
    
    .text-blue { color: #0e2e72; }

    /* Scroll Indicator Styles */
    .scroll-indicator {
        position: absolute;
        bottom: 180px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        display: flex;
        flex-direction: column;
        align-items: center;
    }


    .mouse {
        width: 25px;
        height: 40px;
        border: 2px solid white;
        border-radius: 20px;
        position: relative;
        opacity: 0.7;
    }

    .wheel {
        width: 4px;
        height: 8px;
        background: white;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 6px;
        border-radius: 2px;
        animation: scroll 2s infinite;
    }

    @keyframes scroll {
        0% { opacity: 0; top: 6px; }
        20% { opacity: 1; }
        100% { opacity: 0; top: 20px; }
    }

    .arrows {
        margin-top: 10px;
    }

    .arrow {
        display: block;
        width: 10px;
        height: 10px;
        border-right: 2px solid white;
        border-bottom: 2px solid white;
        transform: rotate(45deg);
        margin: -4px;
        animation: arrow 2s infinite;
    }

    .p2 { animation-delay: 0.2s; }

    @keyframes arrow {
        0% { opacity: 0; transform: rotate(45deg) translate(-5px, -5px); }
        50% { opacity: 1; }
        100% { opacity: 0; transform: rotate(45deg) translate(5px, 5px); }
    }

    @media (max-width: 768px) {
        .hero-cards-wrapper {
            margin-top: -30px !important;
            padding-bottom: 50px;
        }
        .scroll-indicator, .hero-wave {
            display: none;
        }
    }
</style>
