<section id="ekskul" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold display-5">Ekstra<span class="text-primary">kurikuler</span></h2>
            <p class="text-muted">Mengembangkan bakat dan minat siswa melalui berbagai kegiatan positif.</p>
            <div class="mx-auto" style="width: 80px; height: 4px; background: #007bff; border-radius: 10px;"></div>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach ($ekskul as $item)
            <div class="col-lg-3 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 50 }}">
                <div class="ekskul-icon-card p-4 rounded-4 shadow-sm text-center border h-100 transition-all">
                    <div class="icon-wrapper mb-3 mx-auto d-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10" style="width: 80px; height: 80px;">
                        @php
                            $icon = 'bi-star-fill';
                            $name = strtolower($item->nama);
                            if(str_contains($name, 'basket')) $icon = 'bi-basketball';
                            elseif(str_contains($name, 'futsal') || str_contains($name, 'bola')) $icon = 'bi-dribbble';
                            elseif(str_contains($name, 'komputer') || str_contains($name, 'it')) $icon = 'bi-laptop';
                            elseif(str_contains($name, 'musik') || str_contains($name, 'seni')) $icon = 'bi-music-note-beamed';
                            elseif(str_contains($name, 'pramuka')) $icon = 'bi-shield-shaded';
                            elseif(str_contains($name, 'paskibra')) $icon = 'bi-flag-fill';
                            elseif(str_contains($name, 'pencak silat') || str_contains($name, 'bela diri')) $icon = 'bi-person-arms-up';
                            elseif(str_contains($name, 'jurnalistik')) $icon = 'bi-newspaper';
                        @endphp
                        <i class="bi {{ $icon }} fs-1 text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-0">{{ $item->nama }}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .ekskul-icon-card {
        background: #fff;
        cursor: pointer;
    }
    .ekskul-icon-card:hover {
        background: #007bff;
        border-color: #007bff !important;
        transform: translateY(-10px);
    }
    .ekskul-icon-card:hover h5, 
    .ekskul-icon-card:hover .icon-wrapper i {
        color: #fff !important;
    }
    .ekskul-icon-card:hover .icon-wrapper {
        background: rgba(255, 255, 255, 0.2) !important;
    }
</style>
