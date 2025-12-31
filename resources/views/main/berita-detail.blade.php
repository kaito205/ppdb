@extends('layouts.app')

@section('containt')
<div class="news-detail-wrapper overflow-hidden">
    <section class="py-4 py-md-5">
        <div class="container">
            <div class="row g-4 g-lg-5">
    
                <!-- KONTEN UTAMA -->
                <div class="col-lg-8" data-aos="fade-up">
                    
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="mb-3 mb-md-4">
                        <ol class="breadcrumb extra-small">
                            <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('berita.list') }}" class="text-decoration-none text-muted">Berita</a></li>
                            <li class="breadcrumb-item active text-truncate" style="max-width: 150px;" aria-current="page">Detail</li>
                        </ol>
                    </nav>
    
                    <!-- Judul & Meta -->
                    <h1 class="fw-bold mb-3 text-blue news-detail-title">
                        {{ $berita->judul }}
                    </h1>
                    <div class="d-flex align-items-center text-muted extra-small mb-4">
                        <i class="bi bi-calendar-event me-2"></i>
                        <span>{{ $berita->created_at->format('d F Y') }}</span>
                        <span class="mx-2 mx-md-3">•</span>
                        <i class="bi bi-person me-2"></i>
                        <span>Admin Sekolah</span>
                    </div>
    
                    <!-- Gambar Utama -->
                    @if($berita->gambar)
                    <div class="overflow-hidden rounded-4 shadow-sm mb-4">
                        <img src="{{ asset('uploads/berita/'.$berita->gambar) }}" 
                             class="img-fluid w-100 object-fit-cover" 
                             alt="{{ $berita->judul }}"
                             style="max-height: 450px;">
                    </div>
                    @endif
    
                    <!-- Isi Berita -->
                    <div class="content-body text-secondary" style="line-height: 1.8; text-align: justify;">
                        {!! nl2br(e($berita->isi)) !!}
                    </div>
    
                    <!-- Share Button -->
                    <div class="mt-5 pt-4 border-top">
                        <h6 class="fw-bold mb-3 small">Bagikan Berita Ini:</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                               target="_blank" 
                               class="btn btn-facebook btn-sm rounded-pill px-3">
                                <i class="bi bi-facebook me-1"></i> Facebook
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' ' . request()->fullUrl()) }}" 
                               target="_blank" 
                               class="btn btn-whatsapp btn-sm rounded-pill px-3">
                                <i class="bi bi-whatsapp me-1"></i> WhatsApp
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(request()->fullUrl()) }}" 
                               target="_blank" 
                               class="btn btn-twitter btn-sm rounded-pill px-3">
                                <i class="bi bi-twitter-x me-1"></i> Twitter
                            </a>
                        </div>
                    </div>
    
                </div>
    
                <!-- SIDEBAR -->
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="sticky-top-sidebar">
                        
                        <!-- Search Widget -->
                        <div class="card border-0 shadow-sm rounded-4 mb-4" data-aos="fade-left">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-3">Cari Berita</h6>
                                <form action="{{ route('berita.list') }}" method="GET">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="q" class="form-control rounded-start-pill border-end-0 shadow-none" placeholder="Kata kunci...">
                                        <button class="btn btn-blue rounded-end-pill px-3" type="submit"><i class="bi bi-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
    
                        <!-- Berita Lainnya -->
                        <div class="card border-0 shadow-sm rounded-4" data-aos="fade-left" data-aos-delay="100">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-4">Berita Lainnya</h6>
                                
                                @forelse($beritaLain as $item)
                                <div class="d-flex align-items-center mb-3 pb-3 border-bottom last-no-border position-relative hvr-right">
                                    <img src="{{ asset('uploads/berita/'.$item->gambar) }}" 
                                         class="rounded-3 object-fit-cover" 
                                         width="65" height="65" 
                                         alt="{{ $item->judul }}">
                                    <div class="ms-3">
                                        <h6 class="mb-1 extra-small">
                                            <a href="{{ route('berita.detail', $item->slug) }}" class="text-decoration-none text-dark fw-bold stretched-link">
                                                {{ Str::limit($item->judul, 45) }}
                                            </a>
                                        </h6>
                                        <small class="text-muted" style="font-size: 10px;">
                                            <i class="bi bi-calendar me-1"></i> {{ $item->created_at->format('d M') }}
                                        </small>
                                    </div>
                                </div>
                                @empty
                                <p class="text-muted extra-small text-center mt-2">Belum ada berita lainnya.</p>
                                @endforelse
    
                            </div>
                        </div>
    
                    </div>
                </div>
    
            </div>
        </div>
    </section>
</div>

<style>
    .news-detail-title {
        font-size: 2.2rem;
        line-height: 1.3;
        color: #0e2e72;
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

    /* Social Media Buttons */
    .btn-facebook {
        background-color: #1877F2;
        border-color: #1877F2;
        color: white;
        transition: all 0.3s ease;
    }
    .btn-facebook:hover {
        background-color: #145dbf;
        border-color: #145dbf;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(24, 119, 242, 0.3);
    }

    .btn-whatsapp {
        background-color: #25D366;
        border-color: #25D366;
        color: white;
        transition: all 0.3s ease;
    }
    .btn-whatsapp:hover {
        background-color: #1ea852;
        border-color: #1ea852;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
    }

    .btn-twitter {
        background-color: #000000;
        border-color: #000000;
        color: white;
        transition: all 0.3s ease;
    }
    .btn-twitter:hover {
        background-color: #333333;
        border-color: #333333;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .extra-small { font-size: 0.8rem; }
    .sticky-top-sidebar { top: 100px; position: sticky; }
    
    .last-no-border:last-child {
        border-bottom: none !important;
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }
    
    .content-body p {
        margin-bottom: 1.5rem;
    }

    @media (max-width: 991px) {
        .sticky-top-sidebar { position: relative; top: 0; }
        .news-detail-title { font-size: 1.6rem; }
        .row.g-5 { --bs-gutter-x: 1.5rem; }
    }
</style>
@endsection
