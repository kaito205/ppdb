<section id="profil-sekolah" class="py-5 bg-white overflow-hidden">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Left Column: Content & Stats -->
            <div class="col-lg-7" data-aos="fade-right">
                <div class="mb-4">
                    <span class="badge bg-blue-light text-blue px-3 py-2 rounded-pill mb-3">Profil Lembaga</span>
                    <h2 class="fw-bold display-5 text-blue mb-4">Membangun Masa Depan <br><span class="text-success">Bersama Kami</span></h2>
                    <p class="text-muted fs-5 mb-4" style="line-height: 1.8; text-align: justify;">
                        {{ $profil->deskripsi ?? 'SMA ERHA JATINAGARA adalah lembaga pendidikan yang berkomitmen mencetak generasi unggul, berakhlak mulia, dan berwawasan global. Kami memadukan kurikulum nasional dengan nilai-nilai karakter untuk membentuk siswa yang tangguh.' }}
                    </p>
                </div>

                <!-- Stats Row -->
                <div class="row g-4 mb-5">
                    <div class="col-6 col-md-4">
                        <div class="stat-item">
                            <h3 class="fw-bold text-blue mb-0 counter" data-target="1000">0</h3>
                            <small class="text-muted text-uppercase ls-1">Siswa Aktif</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="stat-item">
                            <h3 class="fw-bold text-success mb-0">Akreditasi B</h3>
                            <small class="text-muted text-uppercase ls-1">Kualitas Terjamin</small>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="stat-item">
                            <h3 class="fw-bold text-warning mb-0">PPDB Buka</h3>
                            <small class="text-muted text-uppercase ls-1">Status Pendaftaran</small>
                        </div>
                    </div>
                </div>

                <!-- Pesantren Features Mini -->
                <div class="card border-0 bg-light rounded-4 p-4 shadow-sm">
                    <h6 class="fw-bold text-blue mb-3">Keunggulan Berbasis Pesantren</h6>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-patch-check-fill text-success"></i>
                                <span class="small fw-semibold">Tahfidz Al-Qur'an</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-patch-check-fill text-success"></i>
                                <span class="small fw-semibold">Bahasa Arab & Inggris</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-patch-check-fill text-success"></i>
                                <span class="small fw-semibold">Kitab Kuning</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-patch-check-fill text-success"></i>
                                <span class="small fw-semibold">Asrama Modern</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Visual Identity -->
            <div class="col-lg-5" data-aos="fade-left">
                <div class="profil-image-wrapper position-relative">
                    <!-- Main Image Card -->
                    <div class="card border-0 shadow-lg rounded-5 overflow-hidden main-profile-card">
                        <img src="{{ asset('img/sekolah.jpg') }}" class="card-img" alt="Gedung Sekolah" style="height: 500px; object-fit: cover; filter: brightness(0.9);">
                        <div class="card-img-overlay d-flex flex-column justify-content-end p-4 p-lg-5 grad-overlay">
                            <h4 class="text-white fw-bold mb-1">SMA ERHA Jatinagara</h4>
                            <p class="text-white-50 small mb-0"><i class="bi bi-geo-alt-fill me-1"></i> Jatinagara, Ciamis, Jawa Barat</p>
                        </div>
                    </div>

                    <!-- Floating Badge 1 -->
                    <div class="floating-info-badge badge-top shadow-sm" data-aos="zoom-in" data-aos-delay="400">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box bg-blue text-white rounded-circle">
                                <i class="bi bi-award-fill"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">Sekolah Model</h6>
                                <small class="text-muted">Karakter Islami</small>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Badge 2 -->
                    <div class="floating-info-badge badge-bottom shadow-sm" data-aos="zoom-in" data-aos-delay="600">
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar-group d-flex align-items-center">
                                <div class="avatar-mini bg-success text-white">S</div>
                                <div class="avatar-mini bg-blue text-white">M</div>
                                <div class="avatar-mini bg-warning text-white">A</div>
                            </div>
                            <span class="small fw-bold">Teruji & Terpercaya</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .text-blue { color: #0e2e72; }
    .bg-blue { background-color: #0e2e72; }
    .bg-blue-light { background-color: rgba(14, 46, 114, 0.08); }
    .ls-1 { letter-spacing: 1px; }

    .stat-item {
        border-left: 3px solid #dee2e6;
        padding-left: 15px;
        transition: all 0.3s ease;
    }
    .stat-item:hover {
        border-left-color: #0e2e72;
    }

    .main-profile-card {
        transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .main-profile-card:hover {
        transform: scale(1.02);
    }

    .grad-overlay {
        background: linear-gradient(to top, rgba(14, 46, 114, 0.9), transparent);
    }

    .floating-info-badge {
        position: absolute;
        background: white;
        padding: 15px 20px;
        border-radius: 20px;
        z-index: 10;
        min-width: 180px;
    }

    .badge-top {
        top: 15%;
        left: -40px;
    }

    .badge-bottom {
        bottom: 10%;
        right: -30px;
    }

    .icon-box {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .avatar-group .avatar-mini {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 2px solid white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        font-weight: bold;
        margin-left: -10px;
    }
    .avatar-group .avatar-mini:first-child { margin-left: 0; }

    @media (max-width: 991px) {
        .badge-top, .badge-bottom {
            position: relative;
            top: auto;
            left: auto;
            right: auto;
            bottom: auto;
            margin-top: 15px;
            display: flex;
            width: 100%;
            min-width: 0;
            border: 1px solid rgba(0,0,0,0.05);
        }
        .profil-image-wrapper {
            margin-top: 50px;
        }
        .display-5 {
            font-size: 1.8rem;
        }
        .fs-5 {
            font-size: 1rem !important;
        }
    }
</style>
