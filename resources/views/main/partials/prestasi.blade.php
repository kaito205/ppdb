<style>
    .prestasi-img {
        height: 120px;
    }
    @media (min-width: 768px) {
        .prestasi-img {
            height: 230px;
        }
    }
</style>
<section id="prestasi" class="py-5 bg-light">
    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold display-5">Prestasi <span class="text-success">Siswa</span></h2>
            <p class="text-muted">Kebanggaan kami atas dedikasi dan kerja keras para siswa di berbagai bidang.</p>
            <div class="mx-auto" style="width: 80px; height: 4px; background: #28a745; border-radius: 10px;"></div>
        </div>

        <div class="prestasi-scroll">

            @foreach ($prestasi as $item)
            <div class="prestasi-item" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="card border-0 shadow-sm prestasi-card h-100 rounded-4 overflow-hidden">
                    
                    <div class="position-relative">
                        <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" alt="{{ $item->judul }}" class="img-fluid"
                            style="width: 100%; height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill shadow-sm">
                                <i class="bi bi-trophy-fill me-1"></i> JUARA
                            </span>
                        </div>
                    </div>

                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="fw-bold text-blue mb-3">{{ $item->judul }}</h5>
                        
                        @if($item->pemenang)
                        <div class="mt-auto pt-3 border-top">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm bg-blue bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="bi bi-person text-blue"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Pemenang:</small>
                                    <span class="fw-bold text-dark small text-uppercase">{{ $item->pemenang }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
            @endforeach

        </div>

        <div class="text-center mt-5">
            <a href="{{ route('prestasi') }}" class="btn btn-blue rounded-pill px-4">Lihat Semua Prestasi</a>
        </div>

    </div>
</section>

<style>
    .prestasi-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .prestasi-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
</style>
