<section id="ekskul" class="py-5 bg-white overflow-hidden">
    <div class="container">
        <!-- Section Header -->
        <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-up">
            <div>
                <span class="badge bg-soft-blue text-blue px-3 py-2 rounded-pill mb-2">Program Unggulan</span>
                <h2 class="fw-bold mb-0">Ekstra<span class="text-gradient">kurikuler</span></h2>
                <p class="text-muted mb-0 mt-2">Wadahi kreativitas dan bangun karakter juara.</p>
            </div>
            <a href="{{ route('ekskul') }}" class="btn btn-outline-blue rounded-pill px-4 d-none d-md-block">Lihat Semua <i class="bi bi-arrow-right ms-2"></i></a>
        </div>

        <!-- Horizontal Scroll or Grid for Desktop -->
        <div class="row g-4 justify-content-center">
            @foreach ($ekskul->take(4) as $item)
            <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="ekskul-mini-card rounded-4 overflow-hidden position-relative shadow border-0">
                    <div class="ekskul-mini-img">
                        <img src="{{ asset('uploads/ekskul/' . $item->foto) }}" class="w-100 h-100 object-fit-cover d-block" alt="{{ $item->nama }}">
                        <div class="img-overlay-elegant"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Mobile Button -->
        <div class="text-center mt-5 d-md-none">
            <a href="{{ route('ekskul') }}" class="btn btn-blue rounded-pill px-5">Lihat Semua Ekskul</a>
        </div>
    </div>
</section>

<style>
    .bg-soft-blue { background-color: rgba(14, 46, 114, 0.08); }
    .text-blue { color: #0e2e72; }
    .text-blue-deep { color: #091d4a; }
    .btn-outline-blue {
        color: #0e2e72;
        border-color: #0e2e72;
        transition: all 0.3s ease;
    }
    .btn-outline-blue:hover {
        background-color: #0e2e72;
        color: white;
    }
    .btn-blue {
        background-color: #0e2e72;
        color: white;
    }

    .text-gradient {
        background: linear-gradient(90deg, #0e2e72, #25D366);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .ekskul-mini-card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        background: #fff;
    }
    .ekskul-mini-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }

    .ekskul-mini-img {
        height: 180px;
        position: relative;
    }

    .img-overlay-elegant {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, transparent 60%, rgba(14, 46, 114, 0.1));
    }

    @media (max-width: 768px) {
        .ekskul-mini-img { height: 140px; }
    }
</style>
