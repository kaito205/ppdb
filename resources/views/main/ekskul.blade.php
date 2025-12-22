@extends('layouts.app')

@section('containt')
<section class="py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <!-- Header -->
        <div class="text-center mb-5">
            <h1 class="fw-bold text-blue display-4">Kegiatan <span class="text-success">Ekstrakurikuler</span></h1>
            <div class="mx-auto mt-2" style="width: 80px; height: 4px; background-color: #ffd700; border-radius: 10px;"></div>
            <p class="lead text-muted mt-3">Mengembangkan minat, bakat, dan karakter siswa melalui berbagai kegiatan positif.</p>
        </div>

        <div class="row g-4">
            @foreach ($ekskul as $item)
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 card-hover">
                    <div style="height: 200px; overflow: hidden;">
                        <img src="/uploads/ekskul/{{ $item->foto }}" class="w-100 h-100 object-fit-cover" alt="{{ $item->nama }}">
                    </div>
                    <div class="card-body text-center p-3">
                        <h5 class="fw-bold mb-0 text-blue">{{ $item->nama }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .text-blue { color: #0e2e72; }
    .card-hover:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }
</style>
@endsection
