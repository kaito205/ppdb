<section id="hero" class="py-0">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('img/hero2.jpeg') }}" class="d-block w-100 hero-img">
                <div class="hero-overlay"></div>
                <div class="carousel-caption">
                    <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="hero-title">Selamat Datang di <br><span class="text-success">{{ $profil->nama_sekolah ?? 'SMA ERHA' }}</span></h3>
                        <p class="hero-subtitle">Membentuk generasi berprestasi, berkarakter, dan berakhlakul karimah.</p>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('img/hero1.jpeg') }}" class="d-block w-100 hero-img">
                <div class="hero-overlay"></div>
                <div class="carousel-caption">
                    <div class="hero-content" data-aos="fade-up">
                        <h3 class="hero-title">Pendidikan Unggul & <br><span class="text-warning">Berkarakter</span></h3>
                        <p class="hero-subtitle">Membentuk generasi cerdas dan berakhlak mulia untuk masa depan gemilang.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('img/hero.jpeg') }}" class="d-block w-100 hero-img">
                <div class="hero-overlay"></div>
                <div class="carousel-caption">
                    <div class="hero-content" data-aos="fade-up">
                        <h3 class="hero-title">Raih <span class="text-info">Prestasi</span></h3>
                        <p class="hero-subtitle">Lingkungan Belajar Nyaman.</p>
                    </div>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
</section>
