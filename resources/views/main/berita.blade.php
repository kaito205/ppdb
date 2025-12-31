@extends('layouts.app')

@section('containt')
<div class="news-main-list overflow-hidden">
    <section class="py-4 py-md-5">
        <div class="container">
            
            <!-- Header Section -->
            <div class="text-center mb-4 mb-md-5" data-aos="fade-up">
                <h1 class="fw-bold fs-2 fs-md-1 text-gradient">Berita & Artikel</h1>
                <p class="text-muted small px-3">Informasi terbaru seputar kegiatan dan prestasi sekolah</p>
                <div class="mx-auto mt-2" style="width: 50px; height: 3px; background: #ffd700; border-radius: 50px;"></div>
            </div>

            <div class="row g-4 g-lg-5">

                <!-- KONTEN UTAMA -->
                <div class="col-lg-8">
                    
                    @if(isset($query) && $query)
                        <div class="alert alert-info py-2 px-3 mb-4 rounded-4 small" role="alert">
                            <i class="bi bi-search me-2"></i> Hasil: <strong>"{{ $query }}"</strong>
                        </div>
                    @endif

                    <div class="row g-3 g-md-4">
                        @forelse($berita as $item)
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-card">
                                <div class="position-relative">
                                    <img src="{{ asset('uploads/berita/'.$item->gambar) }}" 
                                         class="card-img-top object-fit-cover" 
                                         alt="{{ $item->judul }}"
                                         style="height: 180px;">
                                    <div class="position-absolute top-0 start-0 bg-blue text-white px-3 py-1 m-3 rounded-pill extra-small shadow-sm">
                                        {{ $item->created_at->format('d M Y') }}
                                    </div>
                                </div>
                                <div class="card-body p-3 p-md-4 d-flex flex-column">
                                    <h6 class="card-title fw-bold mb-2">
                                        <a href="{{ route('berita.detail', $item->slug) }}" class="text-decoration-none text-dark stretched-link lh-base">
                                            {{ Str::limit($item->judul, 60) }}
                                        </a>
                                    </h6>
                                    <p class="card-text text-muted extra-small mb-3 flex-grow-1" style="height: 3rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                        {{ Str::limit(strip_tags($item->isi), 100) }}
                                    </p>
                                    <div class="d-flex align-items-center text-blue fw-bold extra-small">
                                        Selengkapnya <i class="bi bi-arrow-right ms-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-inbox fs-1 text-muted opacity-25"></i>
                            <h6 class="text-muted mt-3">Tidak ada berita ditemukan.</h6>
                            @if(isset($query))
                                <a href="{{ route('berita.list') }}" class="btn btn-blue btn-sm rounded-pill mt-3">Kembali ke Berita</a>
                            @endif
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-5 d-flex justify-content-center">
                        {{ $berita->withQueryString()->links('pagination::bootstrap-5') }}
                    </div>

                </div>

                <!-- SIDEBAR -->
                <div class="col-lg-4">
                    <div class="sticky-top-sidebar">
                        
                        <!-- Search Widget -->
                        <div class="card border-0 shadow-sm rounded-4 mb-4" data-aos="fade-left">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-3">Cari Berita</h6>
                                <form action="{{ route('berita.list') }}" method="GET">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="q" class="form-control rounded-start-pill border-end-0 shadow-none ps-3" placeholder="Kata kunci..." value="{{ request('q') }}">
                                        <button class="btn btn-blue rounded-end-pill px-3" type="submit"><i class="bi bi-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Berita Terpopuler / Lainnya -->
                        <div class="card border-0 shadow-sm rounded-4" data-aos="fade-left" data-aos-delay="100">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-3">Berita Terbaru</h6>
                                
                                @foreach($beritaLain as $item)
                                <div class="d-flex align-items-center mb-3 pb-3 border-bottom last-no-border position-relative hvr-right">
                                    <img src="{{ asset('uploads/berita/'.$item->gambar) }}" 
                                         class="rounded-3 object-fit-cover" 
                                         width="60" height="60" 
                                         alt="{{ $item->judul }}">
                                    <div class="ms-3">
                                        <h6 class="mb-1 small">
                                            <a href="{{ route('berita.detail', $item->slug) }}" class="text-decoration-none text-dark fw-bold stretched-link">
                                                {{ Str::limit($item->judul, 40) }}
                                            </a>
                                        </h6>
                                        <small class="text-muted extra-small">
                                            <i class="bi bi-calendar me-1"></i> {{ $item->created_at->format('d M') }}
                                        </small>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<style>
    .extra-small { font-size: 0.75rem; }
    .sticky-top-sidebar { top: 100px; position: sticky; }
    
    .last-no-border:last-child {
        border-bottom: none !important;
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }
    .hover-card {
        transition: all 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    .text-gradient {
        background: linear-gradient(45deg, #0e2e72, #2563eb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Custom Theme Colors */
    .bg-blue { background-color: #0E2E72 !important; }
    .text-blue { color: #0E2E72 !important; }
    
    .btn-blue {
        background-color: #0E2E72;
        color: white;
        border: 1px solid #0E2E72;
        transition: all 0.3s ease;
    }
    .btn-blue:hover {
        background-color: #091d4a;
        border-color: #091d4a;
        color: white;
    }

    .btn-outline-blue {
        color: #0E2E72;
        border-color: #0E2E72;
    }
    .btn-outline-blue:hover {
        background-color: #0E2E72;
        color: white;
    }

    @media (max-width: 991px) {
        .sticky-top-sidebar { position: relative; top: 0; }
        .py-4 { padding-top: 1.5rem !important; padding-bottom: 1.5rem !important; }
        .fs-2 { font-size: 1.5rem !important; }
        .row.g-4 { --bs-gutter-x: 1rem; --bs-gutter-y: 1.5rem; }
        .row.g-3 { --bs-gutter-x: 0.75rem; --bs-gutter-y: 1rem; }
    }
</style>
@endsection
