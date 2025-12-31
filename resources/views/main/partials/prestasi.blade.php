<section id="prestasi" class="py-5 position-relative overflow-hidden" style="background-color: #f8faff;">
    <!-- Modern Background Pattern -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="z-index: 0; pointer-events: none; opacity: 0.03; background-image: radial-gradient(#0e2e72 0.5px, transparent 0.5px); background-size: 20px 20px;"></div>
    
    <!-- Decorative Floating Icons -->
    <div class="position-absolute top-0 start-0 w-100 h-100 d-none d-lg-block" style="z-index: 0; pointer-events: none;">
        <div class="position-absolute" style="top: 10%; left: 5%; transform: rotate(-15deg); opacity: 0.05;">
            <i class="bi bi-trophy-fill" style="font-size: 180px; color: #0e2e72;"></i>
        </div>
        <div class="position-absolute" style="bottom: 5%; right: 5%; transform: rotate(15deg); opacity: 0.05;">
            <i class="bi bi-star-fill" style="font-size: 140px; color: #ffd700;"></i>
        </div>
    </div>

    <div class="container position-relative" style="z-index: 1;">
        <!-- Header Section -->
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge rounded-pill bg-blue-subtle text-blue px-3 py-2 mb-3 fw-bold text-uppercase tracking-widest" style="font-size: 0.7rem;">Achievement Gallery</span>
            <h2 class="fw-bold display-5 mb-3">Prestasi <span class="text-blue">Terbaik</span> Kami</h2>
            <p class="text-muted mx-auto" style="max-width: 600px; font-size: 1.1rem;">Bukti nyata kualitas pendidikan dan semangat juang tanpa batas para siswa SMA ERHA Jatinagara.</p>
            <div class="mx-auto mt-4" style="width: 80px; height: 5px; background: linear-gradient(90deg, #0e2e72, #ffd700); border-radius: 50px;"></div>
        </div>

        <div class="prestasi-scroll">
            @foreach ($prestasi as $item)
            <div class="prestasi-item" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="card border-0 shadow-lg prestasi-card-premium h-100 rounded-4 overflow-hidden bg-white">
                    
                    <!-- Image Wrapper -->
                    <div class="position-relative prestasi-img-wrapper">
                        <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" alt="{{ $item->judul }}" class="img-fluid w-100"
                            style="height: 240px; object-fit: cover;">
                        
                        <!-- Floating Achievement Badge -->
                        <div class="position-absolute top-0 end-0 m-3">
                            <div class="badge-premium">
                                <i class="bi bi-award-fill"></i>
                                <span>WINNER</span>
                            </div>
                        </div>

                        <!-- Dark Overlay on Hover -->
                        <div class="img-overlay"></div>
                    </div>

                    <div class="card-body p-4 d-flex flex-column">
                        <div class="mb-3">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-calendar3 text-muted small"></i>
                                <span class="small text-muted fw-semibold text-uppercase" style="letter-spacing: 1px;">
                                    {{ $item->created_at ? $item->created_at->format('d M Y') : 'Baru' }}
                                </span>
                            </div>
                            <h5 class="fw-bold text-blue mt-1 mb-0 lh-base">{{ $item->judul }}</h5>
                        </div>
                        
                        <div class="mt-auto pt-4 border-top border-light">
                            <div class="d-flex align-items-center">
                                <div class="winner-avatar shadow-sm">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-muted small mb-0 lh-1">Penerima Penghargaan:</p>
                                    <h6 class="fw-bold text-dark mb-0 mt-1" style="font-size: 0.9rem;">
                                        {{ $item->pemenang ?? 'Generasi SMA ERHA' }}
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
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('prestasi') }}" class="btn-premium-blue">
                <span class="me-2">Eksplorasi Seluruh Prestasi</span>
                <i class="bi bi-arrow-right-circle-fill fs-5"></i>
            </a>
        </div>
    </div>
</section>

<style>
    .bg-blue-subtle {
        background-color: rgba(14, 46, 114, 0.1);
    }

    .tracking-widest {
        letter-spacing: 0.25em;
    }

    .prestasi-card-premium {
        transition: all 0.5s cubic-bezier(0.19, 1, 0.22, 1);
        border: 1px solid rgba(0,0,0,0.03) !important;
    }

    .prestasi-card-premium:hover {
        transform: translateY(-15px);
        box-shadow: 0 30px 60px rgba(14, 46, 114, 0.15) !important;
    }

    .prestasi-img-wrapper {
        overflow: hidden;
    }

    .prestasi-img-wrapper img {
        transition: transform 1s cubic-bezier(0.19, 1, 0.22, 1);
    }

    .prestasi-card-premium:hover .prestasi-img-wrapper img {
        transform: scale(1.15);
    }

    .img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, rgba(14, 46, 114, 0.4), transparent);
        opacity: 0;
        transition: opacity 0.5s ease;
        pointer-events: none;
    }

    .prestasi-card-premium:hover .img-overlay {
        opacity: 1;
    }

    .badge-premium {
        background: linear-gradient(135deg, #ffd700 0%, #ffc107 100%);
        color: #0e2e72;
        padding: 8px 18px;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 8px 15px rgba(255, 215, 0, 0.3);
    }

    .winner-avatar {
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, #f0f4ff 0%, #dbeafe 100%);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0e2e72;
        font-size: 1.3rem;
        transition: all 0.3s ease;
    }

    .prestasi-card-premium:hover .winner-avatar {
        background: #0e2e72;
        color: #fff;
        transform: rotate(10deg);
    }

    .btn-premium-blue {
        display: inline-flex;
        align-items: center;
        background: #0e2e72;
        color: #fff;
        padding: 14px 36px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
        border: 2px solid #0e2e72;
        box-shadow: 0 10px 25px rgba(14, 46, 114, 0.2);
    }

    .btn-premium-blue:hover {
        background: transparent;
        color: #0e2e72;
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 20px 35px rgba(14, 46, 114, 0.3);
    }

    .prestasi-scroll {
        display: flex;
        overflow-x: auto;
        gap: 25px;
        padding: 20px 5px 40px;
        scroll-snap-type: x mandatory;
        scrollbar-width: none; /* Firefox */
    }

    .prestasi-scroll::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Opera */
    }

    .prestasi-item {
        flex: 0 0 350px;
        scroll-snap-align: start;
    }

    @media (max-width: 768px) {
        .prestasi-item {
            flex: 0 0 280px;
        }
        
        .prestasi-img-wrapper img {
            height: 190px !important;
        }

        .prestasi-card-premium .card-body h5 {
            font-size: 1.05rem !important;
        }
        
        .badge-premium {
            padding: 5px 12px;
            font-size: 0.6rem;
        }
    }
</style>
