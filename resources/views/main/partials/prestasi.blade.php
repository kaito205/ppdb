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
<section id="prestasi" class="py-3 py-md-5 bg-light">
    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-3 mb-md-5">
            <h2 class="fw-bold text-uppercase fs-4 fs-md-2">
                Prestasi Siswa & <span class="text-success">Sekolah</span>
            </h2>
            <p class="text-muted small">
                Beberapa pencapaian membanggakan dari siswa dan guru {{ $profil->nama_sekolah ?? 'SMA ERHA Jatinagara' }}
            </p>
            <div class="mx-auto" style="width:80px;height:4px;background:#dc3545;border-radius:10px;"></div>
        </div>

        <div class="row g-2 g-md-4">

            @foreach ($prestasi as $item)
            <div class="col-6 col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="card border-0 shadow-sm prestasi-card h-100 card-hover">

                    <div class="overflow-hidden rounded-top">
                        <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" alt="{{ $item->judul }}" class="img-fluid prestasi-img"
                            style="width: 100%; object-fit:cover; transition:.4s;">
                    </div>

                    <div class="card-body text-center p-2 p-md-3">
                        <h5 class="fw-bold text-dark fs-6 fs-md-5">
                            {{ $item->judul }}
                        </h5>
                        <p class="text-muted mb-2 small" style="font-size: 0.85rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $item->deskripsi }}
                        </p>
                        @if($item->pemenang)
                        <div class="mt-2 pt-2 border-top">
                            <small class="text-primary fw-bold d-block text-uppercase" style="font-size: 0.7rem;">Diraih oleh</small>
                            <span class="fw-medium text-dark" style="font-size: 0.85rem;">{{ $item->pemenang }}</span>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
