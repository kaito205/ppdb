{{-- ====== KEGIATAN ====== --}}
<section id="kegiatan" class="ekstrakurikuler py-3 py-md-5 bg-light">
    <div class="container">
        <div class="text-center mb-3 mb-md-5">
            <h2 class="fw-bold">KEGIATAN <span class="text-success">EKSTRAKURIKULER</span></h2>
            <hr class="w-25 mx-auto border-success">
            <p class="text-muted">Beragam kegiatan untuk mengembangkan minat, bakat, dan karakter siswa.</p>
        </div>

        <div class="row g-3 g-md-4">
            @foreach ($ekskul as $item)
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="ekskul-card shadow-sm">
                    <img src="/uploads/ekskul/{{ $item->foto }}" alt="{{ $item->nama }}">
                    <div class="overlay"><span>{{ $item->nama }}</span></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
