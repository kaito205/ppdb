@extends('layouts.app')

@section('containt')
<section class="py-4 bg-light">
    <div class="container" data-aos="fade-up">
        <!-- Header -->
        <div class="text-center mb-4">
            <h1 class="fw-bold text-blue fs-3">Prestasi <span class="text-success">Siswa</span></h1>
            <div class="mx-auto mt-2" style="width: 50px; height: 3px; background-color: #ffd700; border-radius: 50px;"></div>
            <p class="text-muted small mt-2 px-3">Pencapaian terbaik generasi SMA ERHA Jatinagara.</p>
        </div>

        <div class="row g-3 mb-4">
            @foreach ($prestasi as $item)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 achievement-card">
                    <div class="position-relative card-img-container" 
                         style="height: 180px; cursor: pointer;" 
                         data-bs-toggle="modal" 
                         data-bs-target="#modalPrestasi{{ $item->id }}">
                        <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" class="w-100 h-100 object-fit-cover transition-img" alt="{{ $item->judul }}">
                        <div class="img-badge-small">
                            <i class="bi bi-award-fill"></i>
                        </div>
                    </div>
                    <div class="card-body p-3 d-flex flex-column">
                        <small class="text-muted extra-small mb-1">
                            {{ $item->tanggal ? date('d M Y', strtotime($item->tanggal)) : 'Update Terbaru' }}
                        </small>
                        <h6 class="fw-bold text-blue mb-2 lh-base title-limit">{{ $item->judul }}</h6>
                        <button class="btn btn-blue-outline-sm w-100 rounded-pill fw-bold py-2" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalPrestasi{{ $item->id }}">
                            Baca Selengkapnya
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Modals Section -->
@foreach ($prestasi as $item)
<div class="modal fade" id="modalPrestasi{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg mx-2 mx-md-auto">
        <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg">
            <div class="modal-header border-0 p-2 position-absolute end-0 top-0" style="z-index: 1021;">
                <button type="button" class="btn-close bg-white shadow-sm p-2 rounded-circle" data-bs-dismiss="modal" aria-label="Close" style="font-size: 0.7rem;"></button>
            </div>
            <div class="modal-body p-0">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div class="modal-img-wrapper-sm">
                            <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" class="w-100 h-100 object-fit-cover" alt="{{ $item->judul }}">
                        </div>
                    </div>
                    <div class="col-lg-6 bg-white">
                        <div class="p-3 p-md-4">
                            <div class="mb-2">
                                <span class="badge bg-success-soft text-success px-2 py-1 rounded-pill extra-small">
                                    <i class="bi bi-trophy-fill me-1"></i> {{ $item->kategori ?? 'Prestasi' }}
                                </span>
                            </div>
                            <h5 class="fw-bold text-blue mb-3">{{ $item->judul }}</h5>
                            <div class="text-muted small scroll-desc-sm" style="line-height: 1.6; max-height: 200px; overflow-y: auto;">
                                {!! nl2br(e($item->deskripsi)) !!}
                            </div>
                            <div class="mt-3 pt-3 border-top d-flex align-items-center">
                                <div class="avatar-circle-sm me-2 bg-blue-light text-blue text-center">
                                    <i class="bi bi-person fs-6"></i>
                                </div>
                                <div>
                                    <p class="extra-small text-muted mb-0">Penerima:</p>
                                    <h6 class="fw-bold mb-0 small">{{ $item->pemenang ?? 'Siswa SMA ERHA' }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer p-2 bg-light border-0 d-md-none">
                <button type="button" class="btn btn-secondary btn-sm w-100 rounded-pill" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<style>
    .text-blue { color: #0e2e72; }
    .bg-blue-light { background-color: rgba(14, 46, 114, 0.05); }
    .bg-success-soft { background-color: rgba(25, 135, 84, 0.1); }
    .extra-small { font-size: 0.7rem; }
    
    .achievement-card { transition: all 0.3s ease; }
    .achievement-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important; }
    
    .title-limit {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 2.8rem;
    }

    .img-badge-small {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #ffd700;
        color: #0e2e72;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        z-index: 2;
    }
    
    .btn-blue-outline-sm {
        border: 1.5px solid #0e2e72;
        color: #0e2e72;
        font-size: 0.85rem;
        transition: 0.3s;
    }
    
    .btn-blue-outline-sm:hover {
        background: #0e2e72;
        color: white;
    }
    
    .modal-img-wrapper-sm {
        height: 200px;
    }
    
    @media (min-width: 992px) {
        .modal-img-wrapper-sm {
            height: 100%;
            min-height: 400px;
        }
    }
    
    .avatar-circle-sm {
        width: 32px;
        height: 32px;
        line-height: 32px;
        border-radius: 50%;
    }
    
    .scroll-desc-sm::-webkit-scrollbar { width: 3px; }
    .scroll-desc-sm::-webkit-scrollbar-thumb { background: #ddd; border-radius: 10px; }

    @media (max-width: 576px) {
        .container { padding-left: 10px; padding-right: 10px; }
        .achievement-card .card-body { padding: 12px !important; }
        .modal-dialog { margin: 10px; }
    }
</style>
@endsection
