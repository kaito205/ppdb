@extends('layouts.app')

@section('containt')
<div class="ppdb-landing">
    <!-- Hero Section -->
    <section id="hero-ppdb" class="hero-minimalist d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="badge bg-soft-success text-success px-3 py-2 rounded-pill mb-3">PPDB 2025/2026 Telah Dibuka</span>
                    <h1 class="display-4 fw-bold mb-4 text-blue">Membangun Generasi <br><span class="text-gradient">Berakhlak & Berkarakter</span></h1>
                    <p class="lead text-muted mb-5">Bergabunglah bersama SMA ERHA Jatinagara. Tempat di mana potensi Anda diasah dengan fasilitas modern dan bimbingan pengajar berpengalaman.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('register') }}" class="btn btn-blue btn-lg px-4 rounded-pill shadow-blue">Daftar Sekarang <i class="bi bi-arrow-right ms-2"></i></a>
                        <a href="#alur" class="btn btn-outline-secondary btn-lg px-4 rounded-pill">Lihat Alur</a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block" data-aos="zoom-in" data-aos-delay="200">
                    <div class="hero-image-stack">
                        <img src="{{ asset('img/ppbd.webp') }}" alt="Siswa SMA ERHA" class="img-fluid rounded-4 shadow-lg main-img">
                        <div class="floating-card card-1 shadow-sm">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-circle bg-success text-white"><i class="bi bi-person-check"></i></div>
                                <div><h6 class="mb-0 fw-bold">500+</h6><small class="text-muted">Pendaftar Baru</small></div>
                            </div>
                        </div>
                        <div class="floating-card card-2 shadow-sm">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-circle bg-blue text-white"><i class="bi bi-award"></i></div>
                                <div><h6 class="mb-0 fw-bold">Akreditasi B</h6><small class="text-muted">Sekolah Terbaik</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alur Pendaftaran Section -->
    <section id="alur" class="py-5">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h6 class="text-success text-uppercase fw-bold ls-2">Pendaftaran</h6>
                <h2 class="fw-bold text-blue">Alur Pendaftaran Sederhana</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">Hanya butuh 3 langkah mudah untuk bergabung menjadi bagian dari keluarga besar SMA ERHA Jatinagara.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-card h-100 p-4 border-0 shadow-sm rounded-4 text-center">
                        <div class="step-number">1</div>
                        <div class="icon-box mb-4">
                            <i class="bi bi-laptop fs-1 text-blue"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Daftar Online</h4>
                        <p class="text-muted">Isi formulir pendaftaran melalui website resmi kami dengan data yang valid.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-card h-100 p-4 border-0 shadow-sm rounded-4 text-center">
                        <div class="step-number">2</div>
                        <div class="icon-box mb-4">
                            <i class="bi bi-file-earmark-check fs-1 text-success"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Verifikasi Berkas</h4>
                        <p class="text-muted">Tim admin akan memverifikasi dokumen yang Anda unggah dalam sistem.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-card h-100 p-4 border-0 shadow-sm rounded-4 text-center">
                        <div class="step-number">3</div>
                        <div class="icon-box mb-4">
                            <i class="bi bi-mortarboard fs-1 text-warning"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Selesai & Daftar Ulang</h4>
                        <p class="text-muted">Dapatkan pengumuman hasil seleksi dan lakukan proses daftar ulang.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Unggulan -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <h6 class="text-success text-uppercase fw-bold ls-2">Mengapa Kami?</h6>
                    <h2 class="fw-bold text-blue mb-4">Keunggulan Belajar di <span class="text-success">SMA ERHA</span></h2>
                    <p class="text-muted mb-4">Kami menyediakan lingkungan belajar yang kondusif dengan kurikulum terbaru yang disesuaikan dengan kebutuhan industri masa kini.</p>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <span>Fasilitas Lab Komputer & Multimedia Lengkap</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <span>Ekstrakurikuler yang Beragam & Berprestasi</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <span>Tenaga Pendidik Profesional & Milenial</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <span>Program Beasiswa Prestasi & Hafidz Quran</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="row g-4">
                        <!-- Card 1: Tahfidz -->
                        <div class="col-sm-6">
                            <div class="feature-box p-4 rounded-4 shadow-sm bg-white mb-4 h-100">
                                <div class="icon-circle bg-blue-light mb-3"><i class="bi bi-book-half fs-3 text-blue"></i></div>
                                <h6 class="fw-bold mb-0">Tahfidz Al-Qur'an</h6>
                                <p class="small text-muted mt-2 mb-0">Program intensif menghafal Al-Qur'an dengan metode efektif.</p>
                            </div>
                        </div>
                        <!-- Card 2: Bahasa Asing -->
                        <div class="col-sm-6 feature-stack-offset">
                            <div class="feature-box p-4 rounded-4 shadow-sm bg-white mb-4 h-100">
                                <div class="icon-circle bg-success-light mb-3"><i class="bi bi-translate fs-3 text-success"></i></div>
                                <h6 class="fw-bold mb-0">Bahasa Asing</h6>
                                <p class="small text-muted mt-2 mb-0">Penerapan Bahasa Arab & Inggris dalam harian.</p>
                            </div>
                        </div>
                        <!-- Card 3: Kitab Kuning -->
                        <div class="col-sm-6">
                            <div class="feature-box p-4 rounded-4 shadow-sm bg-white mb-4 h-100">
                                <div class="icon-circle bg-warning-light mb-3"><i class="bi bi-journal-bookmark-fill fs-3 text-warning"></i></div>
                                <h6 class="fw-bold mb-0">Kitab Kuning</h6>
                                <p class="small text-muted mt-2 mb-0">Melestarikan tradisi keilmuan Islam klasik.</p>
                            </div>
                        </div>
                        <!-- Card 4: Asrama -->
                        <div class="col-sm-6 feature-stack-offset">
                            <div class="feature-box p-4 rounded-4 shadow-sm bg-white mb-4 h-100">
                                <div class="icon-circle bg-blue-light mb-3"><i class="bi bi-houses-fill fs-3 text-blue"></i></div>
                                <h6 class="fw-bold mb-0">Asrama Kondusif</h6>
                                <p class="small text-muted mt-2 mb-0">Fasilitas bersih & diawasi musyrif/ah.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold text-blue">Apa Kata Mereka?</h2>
                <p class="text-muted">Testimoni dari alumni dan orang tua siswa SMA ERHA Jatinagara.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="flip-left" data-aos-delay="100">
                    <div class="testimonial-card p-4 rounded-4 bg-white border h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="{{ asset('img/user.jpeg') }}" alt="User" class="rounded-circle" width="50" height="50" style="object-fit: cover;">
                            <div>
                                <h6 class="mb-0 fw-bold">Budi Santoso</h6>
                                <small class="text-muted">Alumni 2022</small>
                            </div>
                        </div>
                        <p class="text-muted italic">"Belajar di SMA ERHA memberikan saya dasar yang kuat untuk melanjutkan studi di bidang Teknik Informatika. Guru-gurunya sangat suportif!"</p>
                        <div class="stars text-warning"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="flip-left" data-aos-delay="200">
                    <div class="testimonial-card p-4 rounded-4 bg-white border h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="{{ asset('img/user.jpeg') }}" alt="User" class="rounded-circle" width="50" height="50" style="object-fit: cover;">
                            <div>
                                <h6 class="mb-0 fw-bold">Siti Aminah</h6>
                                <small class="text-muted">Orang Tua Siswa</small>
                            </div>
                        </div>
                        <p class="text-muted italic">"Saya sangat puas dengan perkembangan anak saya selama bersekolah di sini. Fasilitasnya sangat menunjang hobi dan minatnya."</p>
                        <div class="stars text-warning"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="flip-left" data-aos-delay="300">
                    <div class="testimonial-card p-4 rounded-4 bg-white border h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="{{ asset('img/user.jpeg') }}" alt="User" class="rounded-circle" width="50" height="50" style="object-fit: cover;">
                            <div>
                                <h6 class="mb-0 fw-bold">Andi Wijaya</h6>
                                <small class="text-muted">Alumni 2023</small>
                            </div>
                        </div>
                        <p class="text-muted italic">"Lingkungan sekolah yang asri dan teman-teman yang aktif membuat masa SMA saya sangat berkesan dan penuh prestasi."</p>
                        <div class="stars text-warning"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="bg-blue py-5 text-white overflow-hidden position-relative">
        <div class="container position-relative z-1">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0" data-aos="fade-right">
                    <h2 class="fw-bold mb-4">Pertanyaan Umum</h2>
                    <p class="opacity-75 mb-5">Kami telah merangkum beberapa pertanyaan yang paling sering diajukan untuk membantu Anda memahami proses PPDB lebih baik.</p>
                    <a href="{{ Request::is('/') ? '#kontak' : url('/#kontak') }}" class="btn btn-outline-light rounded-pill px-4">Ada Pertanyaan Lain?</a>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="accordion accordion-flush custom-accordion" id="faqAccordion">
                        <div class="accordion-item bg-transparent border-bottom border-light border-opacity-25 py-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent text-white fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Berapa biaya pendaftaran di SMA ERHA?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-white">
                                    Pendaftaran online melalui website adalah GRATIS. Orang tua/wali hanya perlu membayar Infaq Pendaftaran sebesar Rp 250.000 saat proses verifikasi berkas dan wawancara.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item bg-transparent border-bottom border-light border-opacity-25 py-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent text-white fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Apa saja berkas yang harus disiapkan?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-white">
                                    Berkas utama: Fotokopi Ijazah/SKL, Akta Kelahiran, Kartu Keluarga, dan Pas Foto terbaru. Semua diunggah dalam format PDF/JPG.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item bg-transparent py-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent text-white fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Apakah ada program beasiswa?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-white">
                                    Ya, kami memiliki program beasiswa Prestasi Akademik, Tahfidz Al-Quran (Minimal 5 Juz), dan bantuan khusus bagi anak yatim.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Decorative Circle -->
        <div class="decorative-circle-1"></div>
        <div class="decorative-circle-2"></div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 text-center">
        <div class="container py-5" data-aos="zoom-in">
            <h2 class="fw-bold text-blue mb-3">Siap Menjadi Bagian dari Kami?</h2>
            <p class="text-muted mb-4">Jangan lewatkan kesempatan untuk mendapatkan pendidikan terbaik.</p>
            <a href="{{ route('register') }}" class="btn btn-blue btn-lg px-5 rounded-pill shadow-blue">Daftar Sekarang</a>
        </div>
    </section>
</div>

<style>
    /* Custom Styles for PPDB Landing */
    .hero-minimalist {
        min-height: 90vh;
        padding: 50px 0;
        background: radial-gradient(circle at top right, rgba(14, 46, 114, 0.05), transparent);
    }
    .bg-soft-success { background-color: rgba(25, 135, 84, 0.1); }
    .text-gradient {
        background: linear-gradient(90deg, #0e2e72, #198754);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .shadow-blue { box-shadow: 0 10px 20px rgba(14, 46, 114, 0.2); }
    
    /* Image Stack */
    .hero-image-stack {
        position: relative;
        padding: 40px;
    }
    .main-img {
        transition: transform 0.3s ease;
    }
    .main-img:hover { transform: scale(1.02); }
    
    .floating-card {
        position: absolute;
        background: white;
        padding: 15px;
        border-radius: 12px;
        z-index: 2;
        animation: float 4s ease-in-out infinite;
    }
    .card-1 { top: 0; right: 0; }
    .card-2 { bottom: 30px; left: -20px; animation-delay: 2s; }
    
    .icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    
    /* Step Cards */
    .step-card {
        position: relative;
        transition: transform 0.3s ease;
        overflow: hidden;
    }
    .step-card:hover { transform: translateY(-10px); }
    .step-number {
        position: absolute;
        top: -10px;
        right: -10px;
        font-size: 80px;
        font-weight: 900;
        color: rgba(0,0,0,0.05);
        z-index: 0;
    }
    
    /* Fitur Unggulan - Improved Visibility */
    .feature-box {
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    .feature-box:hover { 
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.08) !important;
    }
    .bg-blue { background-color: #0e2e72; }
    
    .feature-stack-offset {
        margin-top: 40px;
    }

    @media (max-width: 576px) {
        .feature-stack-offset {
            margin-top: 0;
        }
    }
    
    /* Accordion Custom */
    .custom-accordion .accordion-button:not(.collapsed) {
        color: #ffd700;
        background-color: transparent;
    }
    .custom-accordion .accordion-button::after {
        filter: brightness(0) invert(1);
    }
    
    .decorative-circle-1 {
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
        top: -150px;
        right: -50px;
    }
    .decorative-circle-2 {
        position: absolute;
        width: 200px;
        height: 200px;
        background: rgba(255,255,255,0.03);
        border-radius: 50%;
        bottom: -100px;
        left: -50px;
    }
    
    .ls-2 { letter-spacing: 2px; }
    
    /* Responsive Fixes */
    @media (max-width: 768px) {
        .hero-minimalist { text-align: center; height: auto; padding-top: 100px; }
        .hero-minimalist .d-flex { justify-content: center; }
        .display-4 { font-size: 2.2rem; }
    }
</style>
@endsection
