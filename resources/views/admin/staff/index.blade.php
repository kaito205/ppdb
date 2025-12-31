@extends('layouts.admin')

@section('title', 'Kelola Staff & Guru')

@section('containt')
<div class="container-fluid py-4">
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold text-dark mb-1">Data Staff & Guru</h3>
                <p class="text-muted small mb-0">Kelola daftar tenaga pendidik dan kependidikan sekolah.</p>
            </div>
            <a href="{{ route('admin.staff.tambah') }}" class="btn btn-blue px-4 rounded-pill shadow-sm">
                <i class="bi bi-plus-lg me-2"></i>Tambah Staff
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

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden animate__animated animate__fadeInUp">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 border-0 text-uppercase small fw-bold text-muted">No</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted">Nama</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted">Jabatan</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted">Spesialis</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted text-center">Preview Foto</th>
                        <th class="pe-4 border-0 text-uppercase small fw-bold text-muted text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td class="ps-4 fw-bold text-muted">{{ $loop->iteration }}</td>
                        <td><span class="fw-bold text-dark">{{ $item->nama }}</span></td>
                        <td>{{ $item->jabatan }}</td>
                        <td><span class="badge bg-light text-muted border fw-normal">{{ $item->spesialis ?? '-' }}</span></td>
                        <td class="text-center">
                            @if($item->foto)
                                <img src="{{ asset('uploads/staff/' . $item->foto) }}" class="rounded-circle shadow-sm" width="50" height="50" style="object-fit: cover;">
                            @else
                                <span class="badge bg-light text-muted fw-normal">No Photo</span>
                            @endif
                        </td>
                        <td class="pe-4 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.staff.edit', $item->id) }}" class="btn btn-sm btn-light-warning rounded-pill px-3">
                                    <i class="bi bi-pencil-square me-1"></i>Edit
                                </a>
                                <button type="button" class="btn btn-sm btn-light-danger rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                    <i class="bi bi-trash me-1"></i>Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-people fs-1 opacity-25 d-block mb-3"></i>
                            <p class="text-muted">Belum ada data staff.</p>
                            <a href="{{ route('admin.staff.tambah') }}" class="btn btn-sm btn-blue rounded-pill px-4 mt-2">Tambah Baru</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modals Outside Table -->
@foreach ($data as $item)
<div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-4">
                <i class="bi bi-exclamation-triangle-fill text-danger display-1 mb-3"></i>
                <h4 class="fw-bold">Hapus Data?</h4>
                <p class="text-muted">Anda akan menghapus data staff <strong>{{ $item->nama }}</strong>. Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer border-0 p-4 pt-0 justify-content-center">
                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('admin.staff.hapus', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<style>
    .btn-blue { background-color: #0e2e72; color: white; border: none; }
    .btn-blue:hover { background-color: #0c2761; color: white; }
    
    .btn-light-warning { background-color: rgba(255, 193, 7, 0.1); color: #856404; border: none; }
    .btn-light-warning:hover { background-color: #ffc107; color: white; }
    
    .btn-light-danger { background-color: rgba(220, 53, 69, 0.1); color: #842029; border: none; }
    .btn-light-danger:hover { background-color: #dc3545; color: white; }
</style>
@endsection
