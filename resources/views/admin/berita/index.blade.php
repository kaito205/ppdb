@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('containt')
<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold text-dark mb-1">Kelola Berita & Informasi</h3>
                <p class="text-muted small mb-0">Publikasikan berita terbaru, pengumuman, dan artikel seputar sekolah.</p>
            </div>
            <a href="{{ route('berita.create') }}" class="btn btn-blue px-4 rounded-pill shadow-sm">
                <i class="bi bi-plus-lg me-2"></i>Tulis Berita
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 animate__animated animate__fadeInDown" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                <div>
                    <h6 class="mb-0 fw-bold">Berhasil!</h6>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- News Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden animate__animated animate__fadeInUp">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 border-0 text-uppercase small fw-bold text-muted">No</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted">Informasi Berita</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted text-center">Preview Gambar</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted text-center">Tanggal Publish</th>
                        <th class="pe-4 border-0 text-uppercase small fw-bold text-muted text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($berita as $b)
                    <tr>
                        <td class="ps-4 fw-bold text-muted">{{ $loop->iteration + ($berita->firstItem() - 1) }}</td>
                        <td>
                            <div class="fw-bold text-dark text-truncate" style="max-width: 300px;">{{ $b->judul }}</div>
                            <small class="text-muted">{{ Str::limit(strip_tags($b->isi), 60) }}</small>
                        </td>
                        <td class="text-center">
                            @if($b->gambar)
                                <img src="{{ asset('uploads/berita/'.$b->gambar) }}" class="rounded-3 shadow-sm border" width="100" height="60" style="object-fit: cover;">
                            @else
                                <div class="bg-light rounded-3 d-inline-flex align-items-center justify-content-center border" style="width: 100px; height: 60px;">
                                    <i class="bi bi-image text-muted opacity-50"></i>
                                </div>
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="badge bg-light text-dark rounded-pill px-3 py-2 border">
                                <i class="bi bi-calendar3 me-2 text-primary"></i>{{ $b->created_at->format('d M Y') }}
                            </span>
                        </td>
                        <td class="pe-4 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('berita.edit', $b->id) }}" class="btn btn-sm btn-light-warning rounded-pill px-3">
                                    <i class="bi bi-pencil-square me-1"></i>Edit
                                </a>
                                <button type="button" class="btn btn-sm btn-light-danger rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $b->id }}">
                                    <i class="bi bi-trash me-1"></i>Hapus
                                </button>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $b->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered text-start">
                                    <div class="modal-content border-0 shadow rounded-4">
                                        <div class="modal-header border-0">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center p-4">
                                            <i class="bi bi-exclamation-triangle-fill text-danger display-1 mb-3"></i>
                                            <h4 class="fw-bold text-dark">Hapus Berita?</h4>
                                            <p class="text-muted">Anda yakin ingin menghapus berita <strong>"{{ $b->judul }}"</strong>? Perubahan ini bersifat permanen.</p>
                                        </div>
                                        <div class="modal-footer border-0 p-4 pt-0 justify-content-center">
                                            <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('berita.delete', $b->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">Ya, Hapus Permanen</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="py-4">
                                <i class="bi bi-newspaper fs-1 opacity-25 d-block mb-3"></i>
                                <p class="text-muted mb-0">Belum ada berita yang dipublikasikan.</p>
                                <a href="{{ route('berita.create') }}" class="btn btn-sm btn-blue rounded-pill px-4 mt-3">Mulai Tulis Berita</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($berita->hasPages())
        <div class="card-footer bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Menampilkan {{ $berita->firstItem() }} sampai {{ $berita->lastItem() }} dari {{ $berita->total() }} berita</small>
                {{ $berita->links() }}
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    .btn-blue { background-color: #0e2e72; color: white; border: none; }
    .btn-blue:hover { background-color: #0c2761; color: white; }
    
    .btn-light-warning { background-color: rgba(255, 193, 7, 0.1); color: #856404; border: none; }
    .btn-light-warning:hover { background-color: #ffc107; color: white; }
    
    .btn-light-danger { background-color: rgba(220, 53, 69, 0.1); color: #842029; border: none; }
    .btn-light-danger:hover { background-color: #dc3545; color: white; }
</style>
@endsection
