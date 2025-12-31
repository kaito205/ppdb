@extends('layouts.admin')

@section('title', 'Dashboard Overview')
@section('containt')

<!-- Welcome Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm bg-blue-dark text-white rounded-4 overflow-hidden welcome-card">
            <div class="card-body p-4 p-md-5 position-relative">
                <div class="row align-items-center text-center text-md-start">
                    <div class="col-md-8">
                        <h4 class="fw-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h4>
                        <p class="mb-0 opacity-75 d-none d-sm-block">Sistem PPDB & Website Profil SMA ERHA berjalan dengan baik. Pantau statistik terbaru di bawah ini.</p>
                        <p class="mb-0 opacity-75 d-block d-sm-none small">Pantau statistik terbaru PPDB SMA ERHA di bawah ini.</p>
                    </div>
                    <div class="col-md-4 text-end d-none d-md-block">
                        <i class="bi bi-speedometer2 display-1 opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-3 g-md-4 mb-4">
    <div class="col-6 col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100 rounded-4 stat-card">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                    <div class="stat-icon bg-primary-soft text-primary">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <span class="badge bg-primary-soft text-primary d-none d-md-inline-block">{{ $totalPendaftar }} Total</span>
                </div>
                <h6 class="text-muted small text-uppercase fw-bold mb-1" style="font-size: 0.65rem;">Pendaftar</h6>
                <h3 class="fw-bold mb-0 text-dark counter">{{ $totalPendaftar }}</h3>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100 rounded-4 stat-card">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                    <div class="stat-icon bg-warning-soft text-warning">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                    <span class="badge bg-warning-soft text-warning d-none d-md-inline-block">{{ $menungguValidasi }} Pending</span>
                </div>
                <h6 class="text-muted small text-uppercase fw-bold mb-1" style="font-size: 0.65rem;">Pending</h6>
                <h3 class="fw-bold mb-0 text-dark counter">{{ $menungguValidasi }}</h3>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100 rounded-4 stat-card">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                    <div class="stat-icon bg-success-soft text-success">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <span class="badge bg-success-soft text-success d-none d-md-inline-block">{{ $diterima }} Lulus</span>
                </div>
                <h6 class="text-muted small text-uppercase fw-bold mb-1" style="font-size: 0.65rem;">Diterima</h6>
                <h3 class="fw-bold mb-0 text-dark counter">{{ $diterima }}</h3>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100 rounded-4 stat-card">
            <div class="card-body p-3 p-md-4">
                <div class="d-flex justify-content-between align-items-start mb-2 mb-md-3">
                    <div class="stat-icon bg-danger-soft text-danger">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                    <span class="badge bg-danger-soft text-danger d-none d-md-inline-block">{{ $ditolak }} Ditolak</span>
                </div>
                <h6 class="text-muted small text-uppercase fw-bold mb-1" style="font-size: 0.65rem;">Ditolak</h6>
                <h3 class="fw-bold mb-0 text-dark counter">{{ $ditolak }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="row mb-5">
    <!-- Chart Section -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                <h6 class="fw-bold text-blue mb-0">Statistik Pendaftaran</h6>
                <div class="dropdown">
                    <button class="btn btn-sm btn-light rounded-pill px-3 border-0" type="button" data-bs-toggle="dropdown">
                        Tahun Terakhir <i class="bi bi-chevron-down ms-1"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container" style="position: relative; height: 350px;">
                    <canvas id="ppdbChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white border-0 py-3">
                <h6 class="fw-bold text-blue mb-0">Menu Cepat Aktivitas</h6>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush rounded-bottom-4">
                    <a href="{{ route('datasiswa') }}" class="list-group-item list-group-item-action py-3 px-4 border-0 border-bottom">
                        <div class="d-flex align-items-center">
                            <div class="icon-box-sm bg-primary-soft text-primary me-3">
                                <i class="bi bi-person-plus"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold small text-dark">Validasi Pendaftar</h6>
                                <small class="text-muted small">Cek berkas calon siswa baru</small>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('berita.index') }}" class="list-group-item list-group-item-action py-3 px-4 border-0 border-bottom">
                        <div class="d-flex align-items-center">
                            <div class="icon-box-sm bg-info-soft text-info me-3">
                                <i class="bi bi-newspaper"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold small text-dark">Update Berita</h6>
                                <small class="text-muted small">Publikasi informasi terbaru</small>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('admin.pesan') }}" class="list-group-item list-group-item-action py-3 px-4 border-0 border-bottom">
                        <div class="d-flex align-items-center">
                            <div class="icon-box-sm bg-warning-soft text-warning me-3">
                                <i class="bi bi-chat-dots"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-bold small text-dark">Pesan Masuk</h6>
                                <small class="text-muted small">{{ $unreadMessagesCount }} Pesan belum dibaca</small>
                            </div>
                            <i class="bi bi-chevron-right text-muted small"></i>
                        </div>
                    </a>
                    <a href="{{ route('admin.profil') }}" class="list-group-item list-group-item-action py-3 px-4 border-0">
                        <div class="d-flex align-items-center">
                            <div class="icon-box-sm bg-success-soft text-success me-3">
                                <i class="bi bi-gear"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold small text-dark">Pengaturan Website</h6>
                                <small class="text-muted small">Edit visi, misi & data sekolah</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-blue-dark { background-color: #0e2e72; }
    .stat-card { 
        transition: all 0.3s ease; 
        border: 1px solid rgba(0,0,0,0.05) !important;
    }
    .stat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important; }
    
    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    
    .icon-box-sm {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
    }
    
    .primary-soft, .bg-primary-soft { background-color: rgba(13, 110, 253, 0.1); }
    .bg-success-soft { background-color: rgba(25, 135, 84, 0.1); }
    .bg-info-soft { background-color: rgba(13, 202, 240, 0.1); }
    .bg-warning-soft { background-color: rgba(255, 193, 7, 0.1); }
    .bg-danger-soft { background-color: rgba(220, 53, 69, 0.1); }
    
    .text-blue { color: #0e2e72; }

    @media (max-width: 576px) {
        .stat-icon {
            width: 35px;
            height: 35px;
            font-size: 1rem;
            border-radius: 8px;
        }
        .stat-card h3 {
            font-size: 1.2rem;
        }
        .welcome-card h4 {
            font-size: 1rem;
        }
        .chart-container {
            height: 250px !important;
        }
        .container-fluid {
            padding-left: 10px !important;
            padding-right: 10px !important;
        }
    }
</style>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('ppdbChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Pendaftar', 'Menunggu Validasi', 'Diterima', 'Ditolak'],
                datasets: [{
                    label: 'Jumlah Calon Siswa',
                    data: [{{ $totalPendaftar }}, {{ $menungguValidasi }}, {{ $diterima }}, {{ $ditolak }}],
                    backgroundColor: [
                        'rgba(13, 110, 253, 0.7)',
                        'rgba(255, 193, 7, 0.7)',
                        'rgba(25, 135, 84, 0.7)',
                        'rgba(220, 53, 69, 0.7)'
                    ],
                    borderColor: [
                        '#0d6efd',
                        '#ffc107',
                        '#198754',
                        '#dc3545'
                    ],
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>
@endpush

@endsection
