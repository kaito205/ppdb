<section id="berita" class="berita-section py-3 py-md-5">
    <div class="container">

        <h1 class="text-center fw-bold mb-3">
            Artikel & <span class="text-success">Berita</span>
        </h1>
        <p class="text-center mb-3 mb-md-4 text-muted">
            Informasi terbaru seputar kegiatan, prestasi, dan pengumuman sekolah.
        </p>

        <div class="berita-wrapper">
            @foreach ($berita as $item)
            <div class="berita-card card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">

                <div class="berita-image-wrapper">
                    <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->judul }}"
                        class="berita-image">
                </div>

                <div class="berita-content">
                    <h5 class="berita-title">{{ $item->judul }}</h5>
                    <p class="berita-desc">
                        {{ Str::limit($item->isi, 80) }}
                    </p>

                    <a href="{{ route('berita.detail', $item->slug) }}" class="btn btn-blue btn-premium">
                        Baca Selengkapnya →
                    </a>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>
