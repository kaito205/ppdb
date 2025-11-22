@extends('layouts.user')

@section('title', 'Status Seleksi')

@section('containt')
<div class="container mt-5 mb-5">
    <h4 class="mb-4">Status Pendaftaran - Semester {{ $semester ?? 'Ganjil 2025' }}</h4>

    <div class="timeline">

        {{-- PROSES SELEKSI SUDAH DIKONFIRMASI --}}
        @if($data && $data->status_seleksi === 'Diterima')
        <div class="timeline-item">
            <div class="timeline-icon bg-success"><i class="bi bi-check2-circle"></i></div>
            <div class="timeline-content">
                <h5 class="mb-1">DITERIMA</h5>
                <small>{{ $data->updated_at->format('d M Y H:i') }} WIB</small>
                <p class="mt-2 text-success">
                    Selamat! Kamu telah diterima. Silakan lakukan daftar ulang.
                </p>
                <a href="{{ route('daftar.user') }}" class="btn btn-sm btn-success">Daftar Ulang</a>
            </div>
        </div>
        @elseif($data && $data->status_seleksi === 'Ditolak')
        <div class="timeline-item">
            <div class="timeline-icon bg-danger"><i class="bi bi-x-circle-fill"></i></div>
            <div class="timeline-content">
                <h5 class="mb-1">DITOLAK</h5>
                <small>{{ $data->updated_at->format('d M Y H:i') }} WIB</small>
                <p class="mt-2 text-danger">
                    Mohon maaf, kamu tidak lolos seleksi. Semoga sukses di kesempatan berikutnya!
                </p>
            </div>
        </div>
        @endif

        {{-- PROSES SELEKSI SEDANG DIPROSES --}}
        <div class="timeline-item">
            <div class="timeline-icon bg-warning"><i class="bi bi-hourglass-split"></i></div>
            <div class="timeline-content">
                <h5 class="mb-1">DOKUMEN DIVERIFIKASI</h5>
                <small>{{ $data->created_at->format('d M Y H:i') ?? '-' }} WIB</small>
                <p class="mt-2">
                    Dokumen pendaftaran kamu sedang diverifikasi oleh tim panitia.
                </p>
            </div>
        </div>

        {{-- FORMULIR DISUBMIT --}}
        <div class="timeline-item">
            <div class="timeline-icon bg-primary"><i class="bi bi-send-fill"></i></div>
            <div class="timeline-content">
                <h5 class="mb-1">FORMULIR DIKIRIM</h5>
                <small>{{ $data->created_at->format('d M Y H:i') ?? '-' }} WIB</small>
                <p class="mt-2">Formulir pendaftaran kamu telah berhasil dikirim.</p>
            </div>
        </div>

        {{-- BELUM ADA DATA --}}
        @if(!$data)
        <div class="timeline-item">
            <div class="timeline-icon bg-secondary"><i class="bi bi-info-circle"></i></div>
            <div class="timeline-content">
                <h5 class="mb-1">BELUM MENGISI FORMULIR</h5>
                <p class="mt-2">Silakan isi formulir terlebih dahulu untuk melihat status seleksi.</p>
                <a href="{{ route('formulir.user') }}" class="btn btn-sm btn-primary">Isi Formulir</a>
            </div>
        </div>
        @endif
    </div>

    {{-- Legenda --}}
    <div class="mt-5">
        <h6>Legenda:</h6>
        <div class="d-flex align-items-center mb-2"><span class="legend-box bg-primary me-2"></span> Formulir Dikirim</div>
        <div class="d-flex align-items-center mb-2"><span class="legend-box bg-warning me-2"></span> Verifikasi Berlangsung</div>
        <div class="d-flex align-items-center mb-2"><span class="legend-box bg-success me-2"></span> Diterima</div>
        <div class="d-flex align-items-center mb-2"><span class="legend-box bg-danger me-2"></span> Ditolak</div>
    </div>
</div>

{{-- Custom CSS --}}
<style>
    .timeline {
        position: relative;
        padding-left: 40px;
        margin-top: 30px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        top: 0;
        left: 15px;
        height: 100%;
        width: 4px;
        background: #dee2e6;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 30px;
    }

    .timeline-icon {
        position: absolute;
        left: -2px;
        top: 0;
        width: 30px;
        height: 30px;
        background: #6c757d;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .timeline-content {
        margin-left: 40px;
        background: #f8f9fa;
        border-radius: 5px;
        padding: 15px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .legend-box {
        width: 20px;
        height: 20px;
        border-radius: 4px;
        display: inline-block;
    }
</style>
@endsection
