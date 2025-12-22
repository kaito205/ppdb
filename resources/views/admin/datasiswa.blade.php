@extends('layouts.admin')

@section('title', 'Kelola Data Pendaftar')

@section('containt')
<div class="container-fluid py-4">
    <!-- Header Page -->
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mb-1">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Pendaftar</li>
                    </ol>
                </nav>
                <h3 class="fw-bold text-dark">Manajemen Calon Siswa</h3>
                <p class="text-muted small mb-0">Validasi berkas, kelola status kelulusan, dan unduh data pendaftar.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.export.excel') }}" class="btn btn-success rounded-pill px-4 shadow-sm">
                    <i class="bi bi-file-earmark-spreadsheet me-2"></i>Export Excel
                </a>
                <a href="{{ route('admin.export.pdf') }}" class="btn btn-danger rounded-pill px-4 shadow-sm">
                    <i class="bi bi-file-earmark-pdf me-2"></i>Export PDF
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Summary Section -->
    <div class="row g-3 mb-4 animate__animated animate__fadeInUp">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 border-start border-primary border-4">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-3 me-3">
                        <i class="bi bi-people fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted small text-uppercase fw-bold mb-1">Total Pendaftar</h6>
                        <h4 class="fw-bold mb-0 text-dark">{{ $stats['total'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 border-start border-warning border-4">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-3 me-3">
                        <i class="bi bi-hourglass-split fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted small text-uppercase fw-bold mb-1">Pending</h6>
                        <h4 class="fw-bold mb-0 text-dark">{{ $stats['pending'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 border-start border-success border-4">
                <div class="d-flex align-items-center">
                    <div class="bg-success bg-opacity-10 text-success p-3 rounded-3 me-3">
                        <i class="bi bi-check-circle fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted small text-uppercase fw-bold mb-1">Diterima</h6>
                        <h4 class="fw-bold mb-0 text-dark">{{ $stats['lulus'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 border-start border-danger border-4">
                <div class="d-flex align-items-center">
                    <div class="bg-danger bg-opacity-10 text-danger p-3 rounded-3 me-3">
                        <i class="bi bi-x-circle fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted small text-uppercase fw-bold mb-1">Ditolak</h6>
                        <h4 class="fw-bold mb-0 text-dark">{{ $stats['ditolak'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Table -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden animate__animated animate__fadeInUp">
        <div class="card-header bg-white py-4 px-4 border-0">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <h5 class="fw-bold text-blue mb-0"><i class="bi bi-table me-2"></i>Daftar Calon Siswa</h5>
                </div>
                <div class="col-md-8">
                    <form action="{{ route('datasiswa') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control bg-light border-0 py-2 ps-4" 
                                placeholder="Cari Nama, NISN, atau Asal Sekolah..." value="{{ request('search') }}">
                            <button class="btn btn-blue px-4" type="submit">
                                <i class="bi bi-search me-2"></i>Cari Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            @if(session('success'))
                <div class="alert alert-success border-0 rounded-0 mb-0 py-3 animate__animated animate__fadeIn">
                    <div class="container-fluid d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-3 fs-5"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 border-0 text-uppercase small fw-bold text-muted py-3">No</th>
                            <th class="border-0 text-uppercase small fw-bold text-muted py-3">Data Siswa</th>
                            <th class="border-0 text-uppercase small fw-bold text-muted py-3">Informasi Kontak</th>
                            <th class="border-0 text-uppercase small fw-bold text-muted py-3">Asal Sekolah</th>
                            <th class="border-0 text-uppercase small fw-bold text-muted py-3 text-center">Status Selsksi</th>
                            <th class="pe-4 border-0 text-uppercase small fw-bold text-muted py-3 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $siswa)
                        <tr>
                            <td class="ps-4 fw-bold text-muted">{{ $loop->iteration + ($data->firstItem() - 1) }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm rounded-circle bg-blue text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        {{ strtoupper(substr($siswa->nama, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $siswa->nama }}</div>
                                        <small class="text-muted">NISN: {{ $siswa->nisn }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="small fw-bold">{{ $siswa->email }}</div>
                                <div class="small text-muted">{{ $siswa->no_hp }}</div>
                            </td>
                            <td>
                                <div class="small fw-bold">{{ $siswa->asal_sekolah }}</div>
                                <div class="small text-muted text-truncate" style="max-width: 150px;">{{ $siswa->alamat }}</div>
                            </td>
                            <td class="text-center">
                                @if($siswa->status_seleksi == 'Lulus')
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 fw-bold">
                                        <i class="bi bi-check-circle-fill me-1"></i> Terkonfirmasi
                                    </span>
                                @elseif($siswa->status_seleksi == 'Tidak Lulus')
                                    <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2 fw-bold">
                                        <i class="bi bi-x-circle-fill me-1"></i> Ditolak
                                    </span>
                                @else
                                    <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-2 fw-bold">
                                        <i class="bi bi-hourglass-split me-1"></i> Pending
                                    </span>
                                @endif
                            </td>
                            <td class="pe-4 text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    <button type="button" class="btn btn-sm btn-light-success rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTerima{{ $siswa->id }}">
                                        Terima
                                    </button>
                                    <button type="button" class="btn btn-sm btn-light-danger rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTolak{{ $siswa->id }}">
                                        Tolak
                                    </button>
                                    <a href="{{ route('admin.siswa.detail', $siswa->id) }}" class="btn btn-sm btn-light-info rounded-pill px-3">
                                        Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="bi bi-people fs-1 opacity-25 d-block mb-3"></i>
                                <p class="text-muted mb-0">Tidak ada data calon siswa ditemukan.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white py-3 border-0">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Menampilkan {{ $data->firstItem() }} - {{ $data->lastItem() }} dari {{ $data->total() }} pendaftar</small>
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modals Loop -->
@foreach($data as $siswa)
<!-- Modal Terima -->
<div class="modal fade" id="modalTerima{{ $siswa->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-success text-white border-0 py-3">
                <h5 class="modal-title fw-bold" id="modalTerimaLabel{{ $siswa->id }}"><i class="bi bi-check-circle me-2"></i>Konfirmasi Penerimaan Siswa</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.siswa.terima', $siswa->id) }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <div class="avatar-lg bg-success bg-opacity-10 text-success d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-check2 fs-1"></i>
                        </div>
                        <h4 class="fw-bold mb-1">Menerima Siswa</h4>
                        <p class="text-muted">Anda akan mengirimkan notifikasi kelulusan kepada <strong>{{ $siswa->nama }}</strong>.</p>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted text-uppercase">Tanggal Daftar Ulang</label>
                            <input type="date" class="form-control bg-light border-0 py-2" name="tanggal" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted text-uppercase">Jam Kedatangan</label>
                            <input type="time" class="form-control bg-light border-0 py-2" name="jam" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-bold small text-muted text-uppercase">Tempat Pelaksanaan</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-geo-alt"></i></span>
                                <input type="text" class="form-control bg-light border-0 py-2" name="tempat" value="Kampus SMA ERHA" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success rounded-pill px-4 shadow-sm w-100 mt-2">
                        <i class="bi bi-send me-2"></i>Konfirmasi & Kirim Email
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tolak -->
<div class="modal fade" id="modalTolak{{ $siswa->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-danger text-white border-0 py-3">
                <h5 class="modal-title fw-bold" id="modalTolakLabel{{ $siswa->id }}"><i class="bi bi-x-circle me-2"></i>Konfirmasi Penolakan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.siswa.tolak', $siswa->id) }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <div class="avatar-lg bg-danger bg-opacity-10 text-danger d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-exclamation-octagon fs-1"></i>
                        </div>
                        <h4 class="fw-bold mb-1">Tolak Pendaftaran</h4>
                        <p class="text-muted">Apakah Anda yakin ingin menolak berkas dari <strong>{{ $siswa->nama }}</strong>?</p>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-bold small text-muted text-uppercase text-start d-block">Alasan Penolakan</label>
                        <textarea class="form-control bg-light border-0" name="alasan" rows="4" required 
                            placeholder="Tuliskan alasan penolakan (misal: Berkas tidak valid, NISN tidak ditemukan, dll)..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm w-100 mt-2">
                        <i class="bi bi-trash me-2"></i>Ya, Tolak Siswa Ini
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<style>
    .bg-blue { background-color: #0e2e72 !important; }
    .text-blue { color: #0e2e72 !important; }
    .btn-blue { background-color: #0e2e72; color: white; border: none; }
    .btn-blue:hover { background-color: #0c2761; color: white; }
    
    .bg-primary-soft { background-color: rgba(14, 46, 114, 0.1); }
    
    .btn-light-success { background-color: rgba(25, 135, 84, 0.1); color: #198754; border: none; }
    .btn-light-success:hover { background-color: #198754; color: white; }
    
    .btn-light-danger { background-color: rgba(220, 53, 69, 0.1); color: #dc3545; border: none; }
    .btn-light-danger:hover { background-color: #dc3545; color: white; }

    .btn-light-info { background-color: rgba(13, 202, 240, 0.1); color: #0dcaf0; border: none; }
    .btn-light-info:hover { background-color: #0dcaf0; color: white; }
    
    .object-fit-cover { object-fit: cover; }
    
    .pagination { justify-content: end; margin-bottom: 0; }
    .page-link { border: none; color: #0e2e72; border-radius: 8px !important; margin: 0 3px; }
    .page-item.active .page-link { background-color: #0e2e72 !important; color: white; }

    .avatar-sm { font-size: 14px; font-weight: bold; }
</style>
@endsection
