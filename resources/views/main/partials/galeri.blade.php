{{-- ====== GALERI SEKOLAH ====== --}}
<section id="galeri" class="galeri py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">GALERI <span class="text-success">SEKOLAH</span></h2>
            <hr class="w-25 mx-auto border-success">
            <p class="text-muted">Momen-momen kegiatan di {{ $profil->nama_sekolah ?? 'SMA ERHA JATINAGARA' }}</p>
        </div>

        <!-- MASTERPIECE GALLERY SCROLL -->
        <div class="gallery-scroll">

            <!-- Item 1 -->
            <div class="gallery-item">
                <a href="{{ asset('img/head1.webp') }}" class="gallery-link" data-caption="Upacara Bendera">
                    <img src="{{ asset('img/head1.webp') }}" alt="Upacara Bendera">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <i class="bi bi-arrows-angle-expand"></i>
                            <span>Upacara Bendera</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Item 2 -->
            <div class="gallery-item">
                <a href="{{ asset('img/head2.webp') }}" class="gallery-link" data-caption="Belajar di Kelas">
                    <img src="{{ asset('img/head2.webp') }}" alt="Belajar di Kelas">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <i class="bi bi-arrows-angle-expand"></i>
                            <span>Belajar di Kelas</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Item 3 -->
            <div class="gallery-item">
                <a href="{{ asset('img/head3.webp') }}" class="gallery-link" data-caption="Kegiatan Tahfidz">
                    <img src="{{ asset('img/head3.webp') }}" alt="Kegiatan Tahfidz">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <i class="bi bi-arrows-angle-expand"></i>
                            <span>Kegiatan Tahfidz</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Item 4 -->
            <div class="gallery-item">
                <a href="{{ asset('img/head3.webp') }}" class="gallery-link" data-caption="Ekstrakurikuler Pramuka">
                    <img src="{{ asset('img/head3.webp') }}" alt="Ekstrakurikuler Pramuka">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <i class="bi bi-arrows-angle-expand"></i>
                            <span>Ekstrakurikuler Pramuka</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Item 5 -->
            <div class="gallery-item">
                <a href="{{ asset('img/head2.webp') }}" class="gallery-link" data-caption="Kegiatan Olahraga">
                    <img src="{{ asset('img/head2.webp') }}" alt="Kegiatan Olahraga">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <i class="bi bi-arrows-angle-expand"></i>
                            <span>Kegiatan Olahraga</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Item 6 -->
            <div class="gallery-item">
                <a href="{{ asset('img/head1.webp') }}" class="gallery-link" data-caption="Pelatihan Kepemimpinan">
                    <img src="{{ asset('img/head1.webp') }}" alt="Pelatihan Kepemimpinan">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <i class="bi bi-arrows-angle-expand"></i>
                            <span>Pelatihan Kepemimpinan</span>
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <!-- END GALLERY GRID -->

    </div>
    <!-- MODAL FULLSCREEN GAMBAR -->
    <div id="imgModal" class="img-modal">
        <span class="close">&times;</span>
        <img class="img-modal-content" id="imgFull">
        <div id="caption"></div>
    </div>
</section>
