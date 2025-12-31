@extends('layouts.app')

@section('containt')
<section class="py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <!-- Header -->
        <div class="text-center mb-5">
            <h1 class="fw-bold text-blue display-4">Galeri <span class="text-success">Sekolah</span></h1>
            <div class="mx-auto mt-2" style="width: 80px; height: 4px; background-color: #ffd700; border-radius: 10px;"></div>
            <p class="lead text-muted mt-3">Momen-momen kegiatan dan fasilitas SMA ERHA Jatinagara.</p>
        </div>

        {{-- MASTERPIECE GALLERY SCROLL (Sama seperti Dashboard agar sinkron dan lancar) --}}
        <div class="gallery-scroll mb-5">
            @php
                $images = ['head1.webp', 'head2.webp', 'head3.webp', 'hero.webp', 'hero1.webp', 'hero2.webp'];
                $captions = ['Upacara Bendera', 'Kegiatan Belajar', 'Tahfidz Al-Qur\'an', 'Gedung Sekolah', 'Lingkungan Sekolah', 'Kegiatan Siswa'];
            @endphp

            @foreach ($images as $index => $img)
            <div class="gallery-item">
                <a href="{{ asset('img/' . $img) }}" class="gallery-link" data-caption="{{ $captions[$index] }}">
                    <img src="{{ asset('img/' . $img) }}" alt="{{ $captions[$index] }}">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <i class="bi bi-arrows-angle-expand"></i>
                            <span>{{ $captions[$index] }}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        {{-- Grid Tambahan (Jika Ingin Tampilan Campuran) --}}
        <div class="text-center mb-4 mt-5">
            <h4 class="fw-bold text-blue">Semua Dokumentasi</h4>
            <p class="text-muted small">Klik pada gambar untuk memperbesar tampilan</p>
        </div>

        <div class="gallery-grid row g-3">
            @foreach ($images as $index => $img)
            <div class="col-lg-3 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                <div class="grid-gallery-item rounded-4 overflow-hidden shadow-sm position-relative">
                    <a href="{{ asset('img/' . $img) }}" class="gallery-link" data-caption="{{ $captions[$index] }}">
                        <img src="{{ asset('img/' . $img) }}" class="w-100 object-fit-cover" style="height: 200px;" alt="{{ $captions[$index] }}">
                        <div class="grid-overlay d-flex align-items-center justify-content-center">
                            <i class="bi bi-zoom-in text-white fs-2"></i>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- MODAL FULLSCREEN GAMBAR (Dibutuhkan untuk Fungsi Klik/Klik-Bisa) -->
    <div id="imgModal" class="img-modal">
        <span class="close">&times;</span>
        <img class="img-modal-content" id="imgFull">
        <div id="caption"></div>
    </div>
</section>

<style>
    .text-blue { color: #0e2e72; }
    
    /* Grid Gallery Styles */
    .grid-gallery-item {
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .grid-gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .grid-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(14, 46, 114, 0.5);
        opacity: 0;
        transition: all 0.3s ease;
    }
    .grid-gallery-item:hover .grid-overlay {
        opacity: 1;
    }
    
    /* Ensure the script can find these containers */
    .gallery-grid {
        display: flex;
        flex-wrap: wrap;
    }
</style>

@endsection

