<section id="sekolah" class="py-5 bg-white overflow-hidden">
    <div class="container">
        <div class="row align-items-center mobile-merge-row">
            <!-- TEKS -->
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="section-title-premium">
                    <h2>Profil Sekolah</h2>
                    <div class="divider"></div>
                </div>
                <div class="premium-text text-muted">
                    <p class="mb-4">
                        {{ $profil->deskripsi ?? 'SMA ERHA JATINAGARA adalah lembaga pendidikan yang berkomitmen mencetak generasi unggul, berakhlak mulia, dan berwawasan global. Kami memadukan kurikulum nasional dengan nilai-nilai pesantren untuk membentuk karakter siswa yang kuat.' }}
                    </p>
                    <a href="#kontak" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">Hubungi Kami</a>
                </div>
            </div>

            <!-- FOTO -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="premium-img-wrapper">
                    <img src="{{ asset('uploads/profil/' . $profil->foto) }}" alt="Profil Sekolah" class="img-fluid shadow-lg">
                </div>
            </div>
        </div>
    </div>
</section>
