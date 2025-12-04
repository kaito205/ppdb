<section id="prestasi" class="py-5 bg-light">
    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase">
                Prestasi Siswa & <span class="text-success">Sekolah</span>
            </h2>
            <p class="text-muted">
                Beberapa pencapaian membanggakan dari siswa dan guru {{ $profil->nama_sekolah ?? 'SMA ERHA Jatinagara' }}
            </p>
            <div class="mx-auto" style="width:80px;height:4px;background:#dc3545;border-radius:10px;"></div>
        </div>

        <div class="row g-4">

            @foreach ($prestasi as $item)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="card border-0 shadow-sm prestasi-card h-100 card-hover">

                    <div class="overflow-hidden rounded-top">
                        <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" alt="{{ $item->judul }}" class="img-fluid"
                            style="height:230px; object-fit:cover; transition:.4s;">
                    </div>

                    <div class="card-body text-center p-3">
                        <h5 class="fw-bold text-dark">
                            {{ $item->judul }}
                        </h5>
                        <p class="text-muted mb-0">
                            {{ Str::limit($item->deskripsi, 100) }}
                        </p>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
