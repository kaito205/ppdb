@extends('layouts.app')

@section('containt')
<section class="ekskul-hero-section overflow-hidden">
    <div class="container py-lg-5 py-4">
        <div class="row align-items-center g-5">
            <!-- Left Side: Text Content -->
            <div class="col-lg-5 text-blue-deep" data-aos="fade-right">
                <span class="badge bg-soft-blue text-blue px-3 py-2 rounded-pill mb-4">Kegiatan Siswa</span>
                <h1 class="display-3 fw-black mb-4">Ekstrakurikuler <br><span class="text-blue opacity-75">SMA ERHA</span></h1>
                <p class="lead text-muted mb-0" style="font-size: 1.1rem; line-height: 1.8;">
                    Sarana untuk menyalurkan bakat dan minat siswa baik dalam bidang akademik maupun non akademik.
                </p>
            </div>

            <!-- Right Side: Asymmetrical Grid (Static Images for Premium Look) -->
            <div class="col-lg-7" data-aos="zoom-in" data-aos-delay="200">
                <div class="ekskul-grid-container px-lg-4">
                    <div class="row g-3">
                        <div class="col-4 d-flex flex-column gap-3">
                            <div class="grid-item item-1 shadow-lg rounded-3 overflow-hidden mt-5">
                                <img src="{{ asset('img/paskibra.png') }}" class="w-100 h-100 object-fit-cover shadow" alt="Futsal">
                            </div>
                            <div class="grid-item item-2 shadow-lg rounded-3 overflow-hidden">
                                <img src="{{ asset('img/olahraga.jpg') }}" class="w-100 h-100 object-fit-cover shadow" alt="Basketball">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="grid-item item-main shadow-lg rounded-3 overflow-hidden h-100">
                                <img src="{{ asset('img/voly.jpg') }}" class="w-100 h-100 object-fit-cover shadow" alt="Students">
                            </div>
                        </div>
                        <div class="col-4 d-flex flex-column gap-3">
                            <div class="grid-item item-3 shadow-lg rounded-3 overflow-hidden">
                                <img src="{{ asset('img/pramuka.jpg') }}" class="w-100 h-100 object-fit-cover shadow" alt="Music/Band">
                            </div>
                            <div class="grid-item item-4 shadow-lg rounded-3 overflow-hidden mb-5">
                                <img src="{{ asset('img/pagarnusa.jpg') }}" class="w-100 h-100 object-fit-cover shadow" alt="Art/Painting">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Other Extracurriculars List -->
<section class="py-5 bg-light">
    <div class="container py-lg-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold text-dark mb-2">Daftar Ekstrakurikuler</h2>
            <div class="divider-modern mx-auto mb-3"></div>
            <p class="text-muted">Pilih kegiatan yang sesuai dengan minat Anda.</p>
        </div>

        <div class="row g-4 mb-5">
            @forelse ($ekskul as $item)
            <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
                <div class="ekskul-mini-card rounded-4 overflow-hidden position-relative shadow border-0">
                    <div class="ekskul-mini-img-wrapper" style="height: 250px;">
                        <img src="{{ asset('uploads/ekskul/' . $item->foto) }}" class="w-100 h-100 object-fit-cover d-block" alt="{{ $item->nama }}">
                        <!-- Overlay on Hover -->
                        <div class="ekskul-overlay-simple">
                            <div class="overlay-content text-center px-2">
                                <h6 class="text-white fw-bold mb-0 text-uppercase small">{{ $item->nama }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-clipboard-x fs-1 text-muted opacity-25"></i>
                <h6 class="text-muted mt-3">Belum ada data ekstrakurikuler yang ditampilkan.</h6>
            </div>
            @endforelse
        </div>
    </div>
</section>

<style>
    .ekskul-hero-section {
        background: #f8fbff; /* Light background */
        background-image: radial-gradient(#0e2e7208 2px, transparent 2px);
        background-size: 30px 30px;
        padding-top: 80px;
        padding-bottom: 80px;
        min-height: 85vh;
        display: flex;
        align-items: center;
    }

    .text-blue-deep { color: #091d4a; }
    .text-blue { color: #0e2e72; }
    .bg-soft-blue { background-color: rgba(14, 46, 114, 0.08); }

    .fw-black { font-weight: 900; }

    /* Grid Layout */
    .ekskul-grid-container {
        height: 500px;
    }

    .grid-item {
        background: #333;
        transition: transform 0.4s ease;
    }

    .grid-item:hover {
        transform: scale(1.03);
        z-index: 10;
    }

    .grid-item img {
        filter: brightness(0.9);
    }

    .item-main { height: 100%; }
    .item-1, .item-4 { height: 160px; }
    .item-2, .item-3 { height: 260px; }

    .divider-modern {
        width: 50px;
        height: 3px;
        background: #25D366;
        border-radius: 10px;
    }

    /* Simple Photo Cards */
    .ekskul-mini-card {
        transition: all 0.3s ease;
    }

    .ekskul-mini-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }

    .ekskul-overlay-simple {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .ekskul-mini-card:hover .ekskul-overlay-simple {
        opacity: 1;
    }

    @media (max-width: 991px) {
        .ekskul-hero-section { text-align: center; padding-top: 50px; }
        .ekskul-grid-container { height: auto; margin-top: 2rem; }
        .grid-item { height: 150px !important; margin: 0 !important; }
        .display-3 { font-size: 2.5rem; }
    }

    @media (max-width: 576px) {
        .ekskul-mini-img-wrapper { height: 160px !important; }
        .grid-item { height: 100px !important; }
    }
</style>
@endsection
