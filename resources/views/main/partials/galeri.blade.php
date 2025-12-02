{{-- ====== GALERI SEKOLAH ====== --}}
<section id="galeri" class="galeri py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">GALERI <span class="text-success">SEKOLAH</span></h2>
            <hr class="w-25 mx-auto border-success">
            <p class="text-muted">Momen-momen kegiatan di {{ $profil->nama_sekolah ?? 'SMA ERHA JATINAGARA' }}</p>
        </div>

        <!-- WRAPPER AUTO SCROLL -->
        <div class="galeri-wrapper" data-aos="fade-up">
            <div class="galeri-scroll">

                <div class="galeri-item position-relative overflow-hidden rounded shadow-sm">
                    <a href="{{ asset('img/head1.jpg') }}" class="galeri-link" data-caption="Upacara Bendera">
                        <img src="{{ asset('img/head1.jpg') }}" class="img-fluid" alt="Kegiatan 1">
                    </a>
                </div>

                <div class="galeri-item position-relative overflow-hidden rounded shadow-sm">
                    <a href="{{ asset('img/head2.jpg') }}" class="galeri-link" data-caption="Belajar di Kelas">
                        <img src="{{ asset('img/head2.jpg') }}" class="img-fluid" alt="Kegiatan 2">
                    </a>
                </div>

                <div class="galeri-item position-relative overflow-hidden rounded shadow-sm">
                    <a href="{{ asset('img/head3.jpg') }}" class="galeri-link" data-caption="Kegiatan Tahfidz">
                        <img src="{{ asset('img/head3.jpg') }}" class="img-fluid" alt="Kegiatan 3">
                    </a>
                </div>

                <div class="galeri-item position-relative overflow-hidden rounded shadow-sm">
                    <a href="{{ asset('img/head3.jpg') }}" class="galeri-link" data-caption="Ekstrakurikuler Pramuka">
                        <img src="{{ asset('img/head3.jpg') }}" class="img-fluid" alt="Kegiatan 4">
                    </a>
                </div>

                <div class="galeri-item position-relative overflow-hidden rounded shadow-sm">
                    <a href="{{ asset('img/head2.jpg') }}" class="galeri-link" data-caption="Kegiatan Olahraga">
                        <img src="{{ asset('img/head2.jpg') }}" class="img-fluid" alt="Kegiatan 5">
                    </a>
                </div>

                <div class="galeri-item position-relative overflow-hidden rounded shadow-sm">
                    <a href="{{ asset('img/head1.jpg') }}" class="galeri-link" data-caption="Pelatihan Kepemimpinan">
                        <img src="{{ asset('img/head1.jpg') }}" class="img-fluid" alt="Kegiatan 6">
                    </a>
                </div>

            </div>
        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- MODAL FULLSCREEN GAMBAR -->
    <div id="imgModal" class="img-modal">
        <span class="close">&times;</span>
        <img class="img-modal-content" id="imgFull">
        <div id="caption"></div>
    </div>
</section>
