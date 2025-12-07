<section class="pesantren py-5 bg-light position-relative">
    <div class="container">
        <div class="row align-items-center mobile-merge-row">
            <!-- FOTO -->
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="premium-img-wrapper" style="transform: rotate(2deg);">
                    <img src="{{ asset('img/hero1.jpeg') }}" alt="Sekolah Berbasis Pesantren" class="img-fluid shadow-lg">
                </div>
            </div>

            <!-- TEKS -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="section-title-premium">
                    <h2>Sekolah Berbasis <span class="text-success">Pesantren</span></h2>
                    <div class="divider"></div>
                </div>
                
                <div class="premium-text">
                    <p class="mb-4">
                        {{ $profil->nama_sekolah ?? 'SMA ERHA JATINAGARA' }} mengusung konsep pendidikan terpadu antara <strong>ilmu pengetahuan umum</strong> dan <strong>pendidikan pesantren</strong>. Kami membimbing siswa untuk unggul dalam akademik sekaligus memiliki akhlak mulia.
                    </p>

                    <ul class="feature-list">
                        <li class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-book"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 fw-bold">Kitab Kuning</h5>
                                <small class="text-muted">Mengkaji khazanah keilmuan Islam klasik.</small>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-heart"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 fw-bold">Tahfiz Al-Qur’an</h5>
                                <small class="text-muted">Membentuk generasi penghafal Al-Qur'an.</small>
                            </div>
                        </li>
                    </ul>

                    <a href="https://riyadlulhidayah.blogspot.com/2015/09/sejarah-berdirinya-pondok-pesantren.html" class="btn btn-blue rounded-pill px-4 py-2 mt-4">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
