<section id="berita" class="berita-section py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4" data-aos="fade-up">
            <div>
                <span class="badge bg-soft-blue text-blue-deep px-3 py-2 rounded-pill mb-2">Update Terbaru</span>
                <h2 class="fw-bold mb-0">Artikel & <span class="text-gradient">Berita</span></h2>
                <p class="text-muted mb-0 mt-2">Informasi terbaru seputar kegiatan dan pengumuman sekolah.</p>
            </div>
            <a href="{{ route('berita.list') }}" class="btn btn-outline-blue rounded-pill px-4 d-none d-md-block">Lihat Semua Berita <i class="bi bi-arrow-right ms-2"></i></a>
        </div>

        <div class="row g-4 mb-4">
            @foreach ($berita->take(3) as $item)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 news-card-premium">
                    <div class="news-image-box">
                        <img src="{{ asset('uploads/berita/' . $item->gambar) }}" class="card-img-top news-img" alt="{{ $item->judul }}">
                        <div class="news-date-badge">
                            <span class="day">{{ $item->created_at->format('d') }}</span>
                            <span class="month">{{ $item->created_at->format('M') }}</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-soft-success text-success-deep rounded-pill px-3">{{ $item->kategori->nama_kategori ?? 'Berita' }}</span>
                            <span class="ms-auto text-muted small"><i class="bi bi-person me-1"></i> Admin</span>
                        </div>
                        <h5 class="fw-bold text-blue-deep mb-3 news-title-limit">{{ $item->judul }}</h5>
                        <p class="text-muted small mb-4 news-desc-limit">
                            {{ Str::limit(strip_tags($item->isi), 100) }}
                        </p>
                        <a href="{{ route('berita.detail', $item->slug) }}" class="btn btn-link text-blue-deep fw-bold p-0 text-decoration-none read-more-link">
                            Baca Selengkapnya <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center d-md-none mt-2">
            <a href="{{ route('berita.list') }}" class="btn btn-blue rounded-pill px-5">Lihat Semua Berita</a>
        </div>
    </div>
</section>

<style>
    .bg-soft-blue { background-color: rgba(14, 46, 114, 0.1); }
    .text-blue-deep { color: #0e2e72; }
    .bg-soft-success { background-color: rgba(25, 135, 84, 0.1); }
    .text-success-deep { color: #146c43; }
    .shadow-blue { box-shadow: 0 10px 25px rgba(14, 46, 114, 0.15); }
    
    .news-card-premium {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(0,0,0,0.05) !important;
    }
    
    .news-card-premium:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12) !important;
    }
    
    .news-image-box {
        position: relative;
        height: 220px;
        overflow: hidden;
    }
    
    .news-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    
    .news-card-premium:hover .news-img {
        transform: scale(1.1);
    }
    
    .news-date-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #fff;
        border-radius: 12px;
        padding: 5px 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        z-index: 2;
    }
    
    .news-date-badge .day {
        font-size: 1.2rem;
        font-weight: 800;
        color: #0e2e72;
        line-height: 1;
    }
    
    .news-date-badge .month {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #666;
    }
    
    .news-title-limit {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 3rem;
        line-height: 1.5rem;
    }
    
    .news-desc-limit {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 4.5rem;
    }
    
    .read-more-link {
        transition: all 0.3s ease;
    }
    
    .read-more-link:hover {
        color: #ffd700 !important;
        padding-left: 5px !important;
    }
    
    @media (max-width: 768px) {
        .news-image-box {
            height: 200px;
        }
        .news-title-limit {
            font-size: 1.1rem;
        }
    }
</style>
