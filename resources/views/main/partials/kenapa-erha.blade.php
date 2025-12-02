<section id="kenapa-erha" class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <h2 class="fw-bold"><span class="text-success">Kenapa di</span> {{ $profil->nama_sekolah ?? 'SMA ERHA JATINAGARA' }} </h2>
        </div>

        <div class="row">
            <div class="col-md-6" data-aos="fade-up">
                <div class="fasilitas">
                    <div class="description">
                        <h5 class="mt-4">Fasilitas Lengkap</h5>
                        <p>{{ $profil->nama_sekolah ?? 'SMA ERHA JATINAGARA' }} memiliki sarana dan prasarana lengkap yang mendukung kegiatan belajar
                            mengajar, termasuk laboratorium komputer, ruang multimedia, dan asrama santri yang nyaman.
                        </p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/school.png') }}" alt="fasilitas" class="img-fluid d-block mx-auto"
                            style="max-height: 300px;">
                    </div>
                </div>
            </div>

            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="fasilitas">
                    <div class="description icon-left">
                        <h5 class="mt-4">Guru Profesional</h5>
                        <p>Tenaga pengajar terdiri dari guru profesional dan ustadz yang berpengalaman dalam bidang
                            akademik maupun keagamaan.</p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/people.png') }}" alt="guru" class="img-fluid d-block mx-auto"
                            style="max-height: 300px;">
                    </div>
                </div>
            </div>

            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="fasilitas">
                    <div class="description">
                        <h5 class="mt-4">Pembelajaran Efektif</h5>
                        <p>Penerapan metode belajar modern berbasis teknologi dan pendekatan personal untuk setiap
                            siswa,
                            agar potensi mereka berkembang maksimal.</p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/blackboard.png') }}" alt="belajar" class="img-fluid d-block mx-auto"
                            style="max-height: 300px;">
                    </div>
                </div>
            </div>

            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="fasilitas">
                    <div class="description icon-left">
                        <h5 class="mt-4">Lingkungan Religius</h5>
                        <p>Kegiatan keagamaan menjadi rutinitas harian untuk membentuk karakter dan kedisiplinan siswa,
                            sehingga berakhlakul karimah.</p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/secure-shield.png') }}" alt="religi" class="img-fluid d-block mx-auto"
                            style="max-height: 300px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
