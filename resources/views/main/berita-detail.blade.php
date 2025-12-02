@extends('layouts.app')

@section('containt')
<section class="py-5">
    <div class="container">
        <div class="row g-5">

            <!-- KONTEN UTAMA -->
            <div class="col-lg-8" data-aos="fade-up">
                
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
                    </ol>
                </nav>

                <!-- Judul & Meta -->
                <h1 class="fw-bold mb-3 text-gradient" style="font-size: 2.5rem; line-height: 1.3;">
                    {{ $berita->judul }}
                </h1>
                <div class="d-flex align-items-center text-muted mb-4">
                    <i class="bi bi-calendar-event me-2"></i>
                    <span>{{ $berita->created_at->format('d F Y') }}</span>
                    <span class="mx-3">•</span>
                    <i class="bi bi-person me-2"></i>
                    <span>Admin Sekolah</span>
                </div>

                <!-- Gambar Utama -->
                @if($berita->gambar)
                <div class="overflow-hidden rounded-4 shadow-sm mb-4">
                    <img src="{{ asset('uploads/berita/'.$berita->gambar) }}" 
                         class="img-fluid w-100" 
                         alt="{{ $berita->judul }}"
                         style="object-fit: cover; max-height: 500px;">
                </div>
                @endif

                <!-- Isi Berita -->
                <div class="content-body fs-5 text-secondary" style="line-height: 1.8; text-align: justify;">
                    {!! nl2br(e($berita->isi)) !!}
                </div>

                <!-- Share Button (Opsional) -->
                <div class="mt-5 pt-4 border-top">
                    <h6 class="fw-bold mb-3">Bagikan Berita Ini:</h6>
                    <a href="#" class="btn btn-outline-primary btn-sm rounded-pill me-2"><i class="bi bi-facebook"></i> Facebook</a>
                    <a href="#" class="btn btn-outline-success btn-sm rounded-pill me-2"><i class="bi bi-whatsapp"></i> WhatsApp</a>
                    <a href="#" class="btn btn-outline-info btn-sm rounded-pill"><i class="bi bi-twitter"></i> Twitter</a>
                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    
                    <!-- Search Widget -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4" data-aos="fade-left" data-aos-delay="100">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Cari Berita</h5>
                            <form action="#" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control rounded-start-pill" placeholder="Kata kunci...">
                                    <button class="btn btn-primary rounded-end-pill" type="submit"><i class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Berita Lainnya -->
                    <div class="card border-0 shadow-sm rounded-4" data-aos="fade-left" data-aos-delay="200">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4 section-divider ms-0">Berita Lainnya</h5>
                            
                            @forelse($beritaLain as $item)
                            <div class="d-flex align-items-center mb-3 pb-3 border-bottom last-no-border">
                                <img src="{{ asset('uploads/berita/'.$item->gambar) }}" 
                                     class="rounded-3 object-fit-cover" 
                                     width="80" height="80" 
                                     alt="{{ $item->judul }}">
                                <div class="ms-3">
                                    <h6 class="mb-1">
                                        <a href="{{ route('berita.detail', $item->slug) }}" class="text-decoration-none text-dark fw-bold stretched-link">
                                            {{ Str::limit($item->judul, 40) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted" style="font-size: 12px;">
                                        <i class="bi bi-calendar me-1"></i> {{ $item->created_at->format('d M Y') }}
                                    </small>
                                </div>
                            </div>
                            @empty
                            <p class="text-muted text-center">Belum ada berita lainnya.</p>
                            @endforelse

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .last-no-border:last-child {
        border-bottom: none !important;
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }
    .content-body p {
        margin-bottom: 1.5rem;
    }
</style>
@endsection
