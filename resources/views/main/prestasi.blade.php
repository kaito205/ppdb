@extends('layouts.app')

@section('containt')
<section class="py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <!-- Header -->
        <div class="text-center mb-5">
            <h1 class="fw-bold text-blue display-4">Prestasi <span class="text-success">Siswa</span></h1>
            <div class="mx-auto mt-2" style="width: 80px; height: 4px; background-color: #ffd700; border-radius: 10px;"></div>
            <p class="lead text-muted mt-3">Kebanggaan dan pencapaian siswa-siswi SMA ERHA Jatinagara di berbagai bidang.</p>
        </div>

        <div class="row g-4">
            @foreach ($prestasi as $item)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 card-hover">
                    <div style="height: 250px; overflow: hidden; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalPrestasi{{ $item->id }}">
                        <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" class="w-100 h-100 object-fit-cover" alt="{{ $item->judul }}">
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-2 d-flex justify-content-between align-items-center">
                            <span class="badge bg-success-light text-success px-3 py-2 rounded-pill small">
                                <i class="bi bi-trophy-fill me-1"></i> {{ $item->kategori ?? 'Prestasi' }}
                            </span>
                            <small class="text-muted">{{ $item->tanggal ? date('d M Y', strtotime($item->tanggal)) : '' }}</small>
                        </div>
                        <h5 class="fw-bold text-blue mb-2">{{ $item->judul }}</h5>
                        <p class="text-muted small mb-3">{{ Str::limit($item->deskripsi, 120) }}</p>
                        <button class="btn btn-outline-blue btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalPrestasi{{ $item->id }}">
                            Baca Selengkapnya
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Modals Section (Di luar element ber-AOS agar tombol close berfungsi normal) -->
@foreach ($prestasi as $item)
<div class="modal fade" id="modalPrestasi{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg">
            <div class="modal-header border-0 bg-blue text-white p-4">
                <h5 class="modal-title fw-bold" id="modalLabel{{ $item->id }}">{{ $item->judul }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" class="w-100 h-100 object-fit-cover" style="min-height: 350px;" alt="{{ $item->judul }}">
                    </div>
                    <div class="col-lg-7 p-4 p-md-5 bg-white">
                        <div class="mb-3">
                            <span class="badge bg-success-light text-success px-3 py-2 rounded-pill small mb-2">
                                <i class="bi bi-trophy-fill me-1"></i> {{ $item->kategori ?? 'Prestasi' }}
                            </span>
                            @if($item->tanggal)
                            <p class="text-muted small mb-0"><i class="bi bi-calendar-event me-2"></i>{{ date('d F Y', strtotime($item->tanggal)) }}</p>
                            @endif
                        </div>
                        <h4 class="fw-bold text-blue mb-4">{{ $item->judul }}</h4>
                        <div class="text-muted" style="line-height: 1.8; text-align: justify;">
                            {!! nl2br(e($item->deskripsi)) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 p-3 bg-light">
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<style>
    .text-blue { color: #0e2e72; }
    .bg-blue { background-color: #0e2e72; }
    .bg-success-light { background-color: rgba(25, 135, 84, 0.1); }
    .btn-outline-blue {
        border: 1px solid #0e2e72;
        color: #0e2e72;
    }
    .btn-outline-blue:hover {
        background-color: #0e2e72;
        color: white;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }
    /* Fix untuk modal agar tombol close tidak tertutup backdrop */
    .modal {
        background: rgba(0, 0, 0, 0.5);
    }
</style>
@endsection
