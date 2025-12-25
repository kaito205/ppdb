<section id="fasilitas" class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold display-5">Eksplorasi <span class="text-blue">Fasilitas</span></h2>
            <p class="text-muted">Lingkungan belajar yang representatif untuk mendukung kenyamanan siswa.</p>
            <div class="mx-auto" style="width: 80px; height: 4px; background: #ffd700; border-radius: 10px;"></div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="facility-card rounded-4 overflow-hidden position-relative shadow-sm h-100">
                    <img src="{{ asset('img/hero1.webp') }}" class="w-100 h-100 object-fit-cover" style="min-height: 200px;" alt="Ruang Kelas">
                    <div class="facility-overlay d-flex flex-column justify-content-end p-3 p-md-4">
                        <h5 class="text-white fw-bold mb-1">Ruang Kelas Modern</h5>
                        <p class="text-white-50 extra-small mb-0 d-md-block">Dilengkapi dengan AC dan Smart TV untuk menunjang pembelajaran digital.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="facility-card rounded-4 overflow-hidden position-relative shadow-sm h-100">
                    <img src="{{ asset('img/hero2.webp') }}" class="w-100 h-100 object-fit-cover" style="min-height: 200px;" alt="Laboratorium Komputer">
                    <div class="facility-overlay d-flex flex-column justify-content-end p-3 p-md-4">
                        <h5 class="text-white fw-bold mb-1">Laboratorium Komputer</h5>
                        <p class="text-white-50 extra-small mb-0 d-md-block">Akses teknologi informasi terbaru dengan jaringan internet super cepat.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="facility-card rounded-4 overflow-hidden position-relative shadow-sm h-100">
                    <img src="{{ asset('img/hero.webp') }}" class="w-100 h-100 object-fit-cover" style="min-height: 200px;" alt="Asrama Siswa">
                    <div class="facility-overlay d-flex flex-column justify-content-end p-3 p-md-4">
                        <h5 class="text-white fw-bold mb-1">Asrama Nyaman</h5>
                        <p class="text-white-50 extra-small mb-0 d-md-block">Lingkungan boarding school yang bersih, aman, dan penuh kekeluargaan.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('fasilitas') }}" class="btn btn-outline-blue rounded-pill px-4">Lihat Seluruh Fasilitas <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

<style>
    .facility-card {
        cursor: pointer;
        transition: all 0.4s ease;
    }
    .facility-card:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 30px rgba(14, 46, 114, 0.15) !important;
    }
    .facility-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 60%);
        transition: all 0.3s ease;
    }
    .facility-card:hover .facility-overlay {
        background: linear-gradient(to top, rgba(14, 46, 114, 0.9) 0%, rgba(14, 46, 114, 0.2) 100%);
    }
    .btn-outline-blue {
        color: #0e2e72;
        border: 2px solid #0e2e72;
    }
    .btn-outline-blue:hover {
        background: #0e2e72;
        color: white;
    }
</style>
