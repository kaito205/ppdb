@extends('layouts.admin')

@section('title', 'Data Siswa')

@section('containt')

<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Calon Siswa</h6>
        <div class="d-flex align-items-center">
            <form action="{{ route('datasiswa') }}" method="GET" class="d-flex me-3">
                <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari Nama / NISN..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-search"></i></button>
            </form>
            <a href="{{ route('admin.export.excel') }}" class="btn btn-success btn-sm shadow-sm">
                <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export Excel
            </a>
            <a href="{{ route('admin.export.pdf') }}" class="btn btn-danger btn-sm shadow-sm ms-2">
                <i class="bi bi-file-earmark-pdf me-1"></i> Export PDF
            </a>
        </div>
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
                        <th>NISN</th>
                        <th>JK</th>
                        <th>Asal Sekolah</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th class="text-center">Status Formulir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-bold">{{ $siswa->nama }}</td>
                        <td>{{ $siswa->nisn }}</td>
                        <td>{{ $siswa->jenis_kelamin == 'Laki-laki' ? 'L' : 'P' }}</td>
                        <td>{{ $siswa->asal_sekolah }}</td>
                        <td>{{ $siswa->alamat }}</td>
                        <td>{{ $siswa->no_hp }}</td>
                        <td>{{ $siswa->email }}</td>
                        <td class="text-center">
                            @if($siswa->status_seleksi == 'Lulus')
                                <span class="badge bg-success rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2">
                                    <i class="fas fa-check-circle"></i> Lengkap
                                </span>
                            @elseif($siswa->status_seleksi == 'Tidak Lulus')
                                <span class="badge bg-danger rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2">
                                    <i class="fas fa-times-circle"></i> Tidak Lengkap
                                </span>
                            @else
                                <span class="badge bg-warning text-dark rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2">
                                    <i class="fas fa-hourglass-half"></i> Menunggu
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalTerima{{ $siswa->id }}">
                                    Terima
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalTolak{{ $siswa->id }}">
                                    Tolak
                                </button>
                                <a href="{{ route('admin.siswa.detail', $siswa->id) }}" class="btn btn-sm btn-info text-white">
                                    Detail
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-3">
            {{ $data->links() }}
        </div>
    </div>
</div>

<!-- Modals Loop -->
@foreach($data as $siswa)
<!-- Modal Terima -->
<div class="modal fade" id="modalTerima{{ $siswa->id }}" tabindex="-1" aria-labelledby="modalTerimaLabel{{ $siswa->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTerimaLabel{{ $siswa->id }}">Terima Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.siswa.terima', $siswa->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menerima siswa <strong>{{ $siswa->nama }}</strong>?</p>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Daftar Ulang</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="jam" class="form-label">Jam</label>
                        <input type="time" class="form-control" name="jam" required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat" class="form-label">Tempat</label>
                        <input type="text" class="form-control" name="tempat" value="Kampus SMA ERHA" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Konfirmasi & Kirim Email</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tolak -->
<div class="modal fade" id="modalTolak{{ $siswa->id }}" tabindex="-1" aria-labelledby="modalTolakLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalTolakLabel">Tolak Siswa: {{ $siswa->nama }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.siswa.tolak', $siswa->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p class="text-muted mb-3">Apakah Anda yakin ingin menolak siswa ini?</p>
                    <div class="mb-3">
                        <label for="alasan" class="form-label fw-bold">Alasan Penolakan</label>
                        <textarea class="form-control" name="alasan" rows="3" required placeholder="Contoh: Berkas tidak lengkap..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger px-4">Tolak Siswa</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection
