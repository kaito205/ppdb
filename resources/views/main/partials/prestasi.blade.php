<section id="prestasi" class="py-5 bg-light">
    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase">
                Prestasi Siswa & <span class="text-success">Sekolah</span>
            </h2>
            <p class="text-muted">
                Beberapa pencapaian membanggakan dari siswa dan guru {{ $profil->nama_sekolah ?? 'SMA ERHA Jatinagara' }}
            </p>
            <div class="mx-auto" style="width:80px;height:4px;background:#dc3545;border-radius:10px;"></div>
        </div>

        <div class="row g-4">

            <!-- Prestasi 1 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="card border-0 shadow-sm prestasi-card h-100 card-hover">

                    <div class="overflow-hidden rounded-top">
                        <img src="{{ asset('img/prestasi.jpg') }}" alt="Prestasi MTQ" class="img-fluid"
                            style="height:230px; object-fit:cover; transition:.4s;">
                    </div>

                    <div class="card-body text-center p-3">
                        <h5 class="fw-bold text-dark">
                            Juara 1 Olimpiade Sains Siswa SIGMA Tingkat Provinsi
                        </h5>
                        <p class="text-muted mb-0">Diraih oleh:<br>
                            <strong class="text-success">Nahwa Zahira Nafisa I</strong>
                        </p>
                    </div>

                </div>
            </div>

            <!-- Prestasi 2 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="card border-0 shadow-sm prestasi-card h-100 card-hover">

                    <div class="overflow-hidden rounded-top">
                        <img src="{{ asset('img/prestasi3.jpg') }}" alt="Olimpiade Bahasa Arab" class="img-fluid"
                            style="height:230px; object-fit:cover; transition:.4s;">
                    </div>

                    <div class="card-body text-center p-3">
                        <h5 class="fw-bold text-dark">
                            Peraih Medali Emas Quarta Islamic Olimpiade Bahasa Arab Tingkat Nasional
                        </h5>
                        <p class="text-muted mb-0">Diraih oleh:<br>
                            <strong class="text-success">Sahal Aziz Amin</strong>
                        </p>
                    </div>

                </div>
            </div>

            <!-- Prestasi 3 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="card border-0 shadow-sm prestasi-card h-100 card-hover">

                    <div class="overflow-hidden rounded-top">
                        <img src="{{ asset('img/prestasi2.jpg') }}" alt="Prestasi Literasi" class="img-fluid"
                            style="height:230px; object-fit:cover; transition:.4s;">
                    </div>

                    <div class="card-body text-center p-3">
                        <h5 class="fw-bold text-dark">
                            Penulis Terpilih Cipta Puisi (LCPN28) Tingkat Nasional
                        </h5>
                        <p class="text-muted mb-0">Diraih oleh:<br>
                            <strong class="text-success">Raihanum Azizah J.P</strong>
                        </p>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
