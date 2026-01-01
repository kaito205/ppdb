@extends('layouts.app')

@section('containt')
<!-- Elegant Hero Section -->
<section class="prestasi-hero py-5 overflow-hidden">
    <div class="container position-relative py-4 py-lg-5">
        <!-- Decorative Elements -->
        <div class="position-absolute top-0 start-0 w-100 h-100 d-none d-lg-block" style="pointer-events: none; opacity: 0.05;">
            <i class="bi bi-trophy position-absolute" style="font-size: 200px; left: -50px; top: 0; transform: rotate(-15deg);"></i>
            <i class="bi bi-award position-absolute" style="font-size: 150px; right: -30px; bottom: 0; transform: rotate(15deg);"></i>
        </div>

        <div class="row justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up">
                <span class="badge bg-soft-blue text-blue px-3 py-2 rounded-pill mb-3 fw-bold text-uppercase tracking-wider">Hall of Fame</span>
                <h1 class="display-4 fw-black text-blue-deep mb-3">Prestasi <span class="text-gradient">Siswa Kami</span></h1>
                <p class="lead text-muted mb-4 mx-auto" style="max-width: 650px;">
                    Setiap juara memiliki cerita. Kami bangga merayakan dedikasi, kerja keras, dan pencapaian gemilang para siswa SMA ERHA Jatinagara.
                </p>
                <div class="divider-elegant mx-auto"></div>
            </div>
        </div>
    </div>
</section>

<!-- Prestasi Grid -->
<section class="py-5 bg-white">
    <div class="container pb-5">
        <div class="row g-4 mb-5">
            @forelse ($prestasi as $item)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="prestasi-premium-card h-100 rounded-4 overflow-hidden border-0 shadow-sm"
                     data-bs-toggle="modal" data-bs-target="#modalPrestasi{{ $item->id }}" style="cursor: pointer;">
                    
                    <!-- Image Wrapper with Hover Effect -->
                    <div class="prestasi-img-wrapper position-relative">
                        <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" class="w-100 h-100 object-fit-cover d-block" alt="{{ $item->judul }}">
                        <div class="prestasi-img-overlay">
                            <span class="btn btn-light btn-sm rounded-pill fw-bold px-3">Detail Prestasi</span>
                        </div>
                        <div class="prestasi-date-badge">
                            {{ $item->tanggal ? date('M Y', strtotime($item->tanggal)) : 'Updated' }}
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="p-4 bg-white">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-star-fill text-warning me-2 small"></i>
                            <span class="text-blue fw-bold extra-small text-uppercase tracking-widest">{{ $item->kategori ?? 'Pencapaian' }}</span>
                        </div>
                        <h5 class="fw-bold text-blue-deep mb-3 title-limit-2">{{ $item->judul }}</h5>
                        
                        <div class="d-flex align-items-center mt-3 pt-3 border-top">
                            <div class="winner-circle me-3">
                                <i class="bi bi-person-check text-blue"></i>
                            </div>
                            <div>
                                <p class="text-muted extra-small mb-0">Peraih Juara:</p>
                                <h6 class="fw-bold text-dark mb-0 small">{{ $item->pemenang ?? 'Generasi SMA ERHA' }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5" data-aos="fade-up">
                <div class="bg-light rounded-5 p-5 d-inline-block shadow-sm">
                    <i class="bi bi-award fs-1 text-muted opacity-25 d-block mb-3"></i>
                    <h5 class="fw-bold text-blue-deep mb-2">Belum Ada Prestasi Terbaru</h5>
                    <p class="text-muted small mb-0">Teruslah berkreasi dan nantikan pencapaian gemilang lainnya!</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Modals with Better Design -->
@foreach ($prestasi as $item)
<div class="modal fade" id="modalPrestasi{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 overflow-hidden shadow-2xl">
            <div class="modal-header border-0 bg-white p-3">
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div class="modal-hero-img">
                            <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" class="w-100 h-100 object-fit-cover" alt="{{ $item->judul }}">
                        </div>
                    </div>
                    <div class="col-lg-6 bg-white d-flex align-items-center">
                        <div class="p-4 p-lg-5">
                            <span class="badge bg-soft-success text-success px-2 py-1 rounded-pill extra-small mb-3">
                                <i class="bi bi-award-fill me-1"></i> {{ $item->kategori ?? 'Prestasi' }}
                            </span>
                            <h3 class="fw-bold text-blue-deep mb-3">{{ $item->judul }}</h3>
                            <div class="mb-4">
                                <p class="text-muted small mb-0 lh-lg modal-scroll-box">
                                    {!! nl2br(e($item->deskripsi)) !!}
                                </p>
                            </div>
                            
                            <div class="p-3 rounded-4 bg-light d-flex align-items-center">
                                <div class="bg-blue text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                    <i class="bi bi-person-check-fill fs-5"></i>
                                </div>
                                <div>
                                    <p class="text-muted extra-small mb-0">Penerima Penghargaan</p>
                                    <h6 class="fw-bold text-blue-deep mb-0">{{ $item->pemenang ?? 'SMA ERHA' }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<style>
    /* Design Tokens */
    .text-blue { color: #0e2e72; }
    .text-blue-deep { color: #091d4a; }
    .bg-blue { background-color: #0e2e72; }
    .bg-soft-blue { background-color: rgba(14, 46, 114, 0.08); }
    .bg-soft-success { background-color: rgba(25, 135, 84, 0.08); }
    .extra-small { font-size: 0.75rem; }
    .tracking-widest { letter-spacing: 0.15em; }
    .fw-black { font-weight: 900; }

    .text-gradient {
        background: linear-gradient(90deg, #0e2e72, #25D366);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .divider-elegant {
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #0e2e72, #ffd700);
        border-radius: 50px;
    }

    /* Hero Styling */
    .prestasi-hero {
        background-color: #f8fbff;
        background-image: radial-gradient(#0e2e7208 2px, transparent 2px);
        background-size: 30px 30px;
        border-bottom: 1px solid rgba(0,0,0,0.03);
    }

    /* Card Styling */
    .prestasi-premium-card {
        background: #fff;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(0,0,0,0.02) !important;
    }

    .prestasi-premium-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(14, 46, 114, 0.12) !important;
    }

    .prestasi-img-wrapper {
        height: 240px;
        overflow: hidden;
    }

    .prestasi-img-wrapper img {
        transition: transform 0.6s ease;
    }

    .prestasi-premium-card:hover .prestasi-img-wrapper img {
        transform: scale(1.1);
    }

    .prestasi-img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(14, 46, 114, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
        backdrop-filter: blur(2px);
    }

    .prestasi-premium-card:hover .prestasi-img-overlay {
        opacity: 1;
    }

    .prestasi-date-badge {
        position: absolute;
        bottom: 15px;
        right: 15px;
        background: rgba(255, 255, 255, 0.9);
        color: #0e2e72;
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 800;
        backdrop-filter: blur(4px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .title-limit-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 2.8rem;
        line-height: 1.4;
    }

    .winner-circle {
        width: 38px;
        height: 38px;
        background: #f0f4ff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
    }

    /* Modal Tweaks */
    .modal-hero-img {
        height: 300px;
    }

    .modal-scroll-box {
        max-height: 250px;
        overflow-y: auto;
        padding-right: 10px;
    }

    .modal-scroll-box::-webkit-scrollbar { width: 4px; }
    .modal-scroll-box::-webkit-scrollbar-thumb { background: #eee; border-radius: 10px; }

    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    @media (min-width: 992px) {
        .modal-hero-img { height: 100%; min-height: 450px; }
    }

    @media (max-width: 768px) {
        .prestasi-img-wrapper { height: 200px; }
        .display-4 { font-size: 2.2rem; }
        .p-4 { padding: 1.5rem !important; }
    }
</style>
@endsection
