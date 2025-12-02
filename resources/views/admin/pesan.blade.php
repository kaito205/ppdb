@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('containt')

<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pesan Masuk</h6>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-bold">{{ $message->name }}</td>
                        <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
                        <td>{{ Str::limit($message->message, 50) }}</td>
                        <td>{{ $message->created_at->format('d M Y H:i') }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $message->id }}">
                                <i class="bi bi-eye"></i>
                            </button>
                            <form action="{{ route('admin.pesan.hapus', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Belum ada pesan masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modals Detail -->
@foreach($messages as $message)
<div class="modal fade" id="modalDetail{{ $message->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pesan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="fw-bold">Dari:</label>
                    <p>{{ $message->name }} ({{ $message->email }})</p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Waktu:</label>
                    <p>{{ $message->created_at->format('d F Y, H:i') }}</p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Pesan:</label>
                    <p class="bg-light p-3 rounded">{{ $message->message }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="mailto:{{ $message->email }}" class="btn btn-primary">Balas Email</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
