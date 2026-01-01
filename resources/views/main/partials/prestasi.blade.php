<section id="prestasi" class="py-5 position-relative overflow-hidden" style="background-color: #f8fbff;">
    <!-- Modern Background Pattern -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="z-index: 0; pointer-events: none; opacity: 0.04; background-image: radial-gradient(#0e2e72 0.8px, transparent 0.8px); background-size: 30px 30px;"></div>
    
    <!-- Decorative Floating Icons -->
    <div class="position-absolute top-0 start-0 w-100 h-100 d-none d-lg-block" style="z-index: 0; pointer-events: none;">
        <div class="position-absolute" style="top: 10%; left: -2%; transform: rotate(-15deg); opacity: 0.04;">
            <i class="bi bi-trophy-fill" style="font-size: 200px; color: #0e2e72;"></i>
        </div>
        <div class="position-absolute" style="bottom: -5%; right: -2%; transform: rotate(15deg); opacity: 0.04;">
            <i class="bi bi-star-fill" style="font-size: 160px; color: #ffd700;"></i>
        </div>
    </div>

    <div class="container position-relative" style="z-index: 1;">
        <!-- Header Section -->
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge rounded-pill bg-soft-blue text-blue px-3 py-2 mb-3 fw-bold text-uppercase tracking-wider" style="font-size: 0.75rem;">Gallery of Excellence</span>
            <h2 class="fw-bold display-5 mb-3 text-blue-deep">Prestasi <span class="text-gradient">Terbaik</span> Kami</h2>
            <p class="text-muted mx-auto lead-sm" style="max-width: 600px;">Merayakan semangat juara dan dedikasi luar biasa para siswa SMA ERHA Jatinagara.</p>
            <div class="divider-elegant mx-auto mt-4"></div>
        </div>

        <!-- Horizontal Scroll Section -->
        <div class="prestasi-scroll pb-4">
            @foreach ($prestasi as $item)
            <div class="prestasi-item" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="card border-0 shadow-sm prestasi-card-premium h-100 rounded-4 overflow-hidden bg-white">
                    
                    <!-- Image Wrapper -->
                    <div class="position-relative prestasi-img-wrapper" style="height: 250px;">
                        <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-100 h-100 object-fit-cover d-block">
                        
                        <!-- Floating Achievement Badge -->
                        <div class="position-absolute top-0 end-0 m-3">
                            <div class="badge-premium-gold">
                                <i class="bi bi-award-fill"></i>
                                <span>WINNER</span>
                            </div>
                        </div>

                        <!-- Dark Overlay on Hover -->
                        <div class="img-overlay-elegant">
                            <a href="{{ route('prestasi') }}" class="btn btn-light btn-sm rounded-pill fw-bold px-3 shadow-sm">Lihat Detail</a>
                        </div>
                    </div>

                    <div class="card-body p-4 d-flex flex-column">
                        <div class="mb-3">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="text-blue fw-bold extra-small text-uppercase tracking-widest">{{ $item->kategori ?? 'Achievement' }}</span>
                            </div>
                            <h5 class="fw-bold text-blue-deep mt-1 mb-0 lh-base title-limit-2">{{ $item->judul }}</h5>
                        </div>
                        
                        <div class="mt-auto pt-3 border-top border-light">
                            <div class="d-flex align-items-center">
                                <div class="winner-avatar-new shadow-sm">
                                    <i class="bi bi-person-check-fill"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-muted extra-small mb-0">Peraih Penghargaan:</p>
                                    <h6 class="fw-bold text-dark mb-0 mt-1" style="font-size: 0.9rem;">
                                        {{ Str::limit($item->pemenang ?? 'Generasi SMA ERHA', 25) }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Button Section -->
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="{{ route('prestasi') }}" class="btn-premium-blue-elegant">
                <span>Eksplorasi Seluruh Prestasi</span>
                <i class="bi bi-arrow-right ms-2 fs-5"></i>
            </a>
        </div>
    </div>
</section>

<style>
    .text-blue-deep { color: #091d4a; }
    .bg-soft-blue { background-color: rgba(14, 46, 114, 0.08); }
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

    .prestasi-card-premium {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .prestasi-card-premium:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 50px rgba(14, 46, 114, 0.12) !important;
    }

    .img-overlay-elegant {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(14, 46, 114, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
        backdrop-filter: blur(2px);
    }

    .prestasi-card-premium:hover .img-overlay-elegant {
        opacity: 1;
    }

    .badge-premium-gold {
        background: linear-gradient(135deg, #ffd700 0%, #ffc107 100%);
        color: #0e2e72;
        padding: 6px 15px;
        border-radius: 50px;
        font-size: 0.65rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
    }

    .winner-avatar-new {
        width: 40px;
        height: 40px;
        background: #f0f4ff;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0e2e72;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .prestasi-card-premium:hover .winner-avatar-new {
        background: #0e2e72;
        color: #fff;
    }

    .btn-premium-blue-elegant {
        display: inline-flex;
        align-items: center;
        background: #0e2e72;
        color: #fff;
        padding: 12px 32px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px rgba(14, 46, 114, 0.15);
    }

    .btn-premium-blue-elegant:hover {
        background: #091d4a;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(14, 46, 114, 0.25);
    }

    .prestasi-scroll {
        display: flex;
        overflow-x: auto;
        gap: 25px;
        padding: 10px 5px 25px;
        scroll-snap-type: x mandatory;
        scrollbar-width: none;
    }

    .prestasi-scroll::-webkit-scrollbar { display: none; }

    .prestasi-item {
        flex: 0 0 350px;
        scroll-snap-align: start;
    }

    .extra-small { font-size: 0.7rem; }
    .tracking-widest { letter-spacing: 0.15em; }
    
    .title-limit-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 2.8rem;
    }

    @media (max-width: 768px) {
        .prestasi-item { flex: 0 0 280px; }
        .prestasi-img-wrapper { height: 180px !important; }
        .display-5 { font-size: 1.8rem; }
    }
</style>
