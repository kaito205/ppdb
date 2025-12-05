@extends('layouts.app')

@section('containt')
<section class="py-5">
    <div class="container">
        
        <!-- Header Section -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="fw-bold display-5 text-gradient">Berita & Artikel</h1>
            <p class="text-muted lead">Informasi terbaru seputar kegiatan dan prestasi sekolah</p>
        </div>

        <div class="row g-5">

            <!-- KONTEN UTAMA -->
            <div class="col-lg-8">
                
                @if(isset($query) && $query)
                    <div class="alert alert-info mb-4" role="alert">
                        Menampilkan hasil pencarian untuk: <strong>"{{ $query }}"</strong>
                    </div>
                @endif

                <div class="row g-4">
                    @forelse($berita as $item)
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-card">
                            <div class="position-relative">
                                <img src="{{ asset('uploads/berita/'.$item->gambar) }}" 
                                     class="card-img-top object-fit-cover" 
                                     alt="{{ $item->judul }}"
                                     style="height: 200px;">
                                <div class="position-absolute top-0 start-0 bg-primary text-white px-3 py-1 m-3 rounded-pill small shadow">
                                    {{ $item->created_at->format('d M Y') }}
                                </div>
                            </div>
                            <div class="card-body p-4 d-flex flex-column">
                                <h5 class="card-title fw-bold mb-3">
                                    <a href="{{ route('berita.detail', $item->slug) }}" class="text-decoration-none text-dark stretched-link">
                                        {{ Str::limit($item->judul, 50) }}
                                    </a>
                                </h5>
                                <p class="card-text text-muted mb-4 flex-grow-1">
                                    {{ Str::limit(strip_tags($item->isi), 100) }}
                                </p>
                                <div class="d-flex align-items-center text-primary fw-bold small">
                                    Baca Selengkapnya <i class="bi bi-arrow-right ms-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <img src="https://cdni.iconscout.com/illustration/premium/thumb/no-data-found-8867280-7265556.png" alt="No Data" style="max-width: 200px;" class="mb-3">
                        <h5 class="text-muted">Tidak ada berita ditemukan.</h5>
                        @if(isset($query))
                            <p class="text-muted">Coba kata kunci lain.</p>
                            <a href="{{ route('berita.list') }}" class="btn btn-outline-primary rounded-pill mt-2">Lihat Semua Berita</a>
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
                <div class="sticky-top" style="top: 100px;">
                    
                    <!-- Search Widget -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4" data-aos="fade-left" data-aos-delay="100">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Cari Berita</h5>
                            <form action="{{ route('berita.list') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control rounded-start-pill" placeholder="Kata kunci..." value="{{ request('q') }}">
                                    <button class="btn btn-primary rounded-end-pill" type="submit"><i class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Berita Terpopuler / Lainnya -->
                    <div class="card border-0 shadow-sm rounded-4" data-aos="fade-left" data-aos-delay="200">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4 section-divider ms-0">Berita Terbaru</h5>
                            
                            @foreach($beritaLain as $item)
                            <div class="d-flex align-items-center mb-3 pb-3 border-bottom last-no-border">
                                <img src="{{ asset('uploads/berita/'.$item->gambar) }}" 
                                     class="rounded-3 object-fit-cover" 
                                     width="80" height="80" 
                                     alt="{{ $item->judul }}"
                                     title="{{ $item->judul }}">
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
                            @endforeach

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
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .text-gradient {
        background: linear-gradient(45deg, #2b5876, #4e4376);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
@endsection
