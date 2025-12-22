{{-- ====== VISI & MISI ====== --}}
<section id="visimisi" class="visi-misi py-5 bg-white">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5">
            <h2 class="fw-bold">
                <span class="text-blue">VISI &</span> <span class="text-success">MISI</span>
            </h2>
            <div class="mx-auto mt-2" style="width: 60px; height: 4px; background-color: #ffd700; border-radius: 10px;"></div>
        </div>

        <div class="row justify-content-center g-4">
            <!-- Visi Card -->
            <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                <div class="h-100 text-center p-4 p-md-5 rounded-4 border shadow-sm transition-hover bg-light bg-opacity-10">
                    <div class="d-inline-flex align-items-center justify-content-center bg-blue-light rounded-circle mb-4" style="width: 80px; height: 80px;">
                        <i class="bi bi-eye-fill fs-2 text-blue"></i>
                    </div>
                    <h4 class="fw-bold text-blue mb-4">VISI</h4>
                    <p class="fs-5 text-dark lh-base fst-italic">
                        "{{ $profil->visi }}"
                    </p>
                </div>
            </div>

            <!-- Misi Card -->
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
                <div class="h-100 p-4 p-md-5 rounded-4 border shadow-sm transition-hover">
                    <div class="d-flex align-items-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-success-light rounded-3 me-3" style="width: 50px; height: 50px;">
                            <i class="bi bi-list-check fs-3 text-success"></i>
                        </div>
                        <h4 class="fw-bold text-blue mb-0">MISI</h4>
                    </div>
                    <div class="misi-list">
                        @foreach (explode("\n", $profil->misi) as $m)
                            @if(trim($m))
                            <div class="d-flex mb-3">
                                <div class="me-3">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                </div>
                                <div class="fs-5 text-dark">{{ trim($m) }}</div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .bg-blue-light { background-color: rgba(14, 46, 114, 0.1); }
    .bg-success-light { background-color: rgba(255, 215, 0, 0.15); }
    .bg-blue { background-color: #0e2e72; }
    .text-blue { color: #0e2e72; }
    .transition-hover {
        transition: all 0.3s ease;
    }
    .transition-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        border-color: #ffd700 !important;
    }
</style>

