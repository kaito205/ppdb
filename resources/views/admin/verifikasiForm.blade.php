@extends('layouts.admin')

@section('title', 'Verifikasi Dokumen')

@section('containt')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Verifikasi Dokumen Pendaftar</h6>
            <a href="{{ route('datasiswa') }}" class="btn btn-sm btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="mb-4">
                <h5><strong>Nama:</strong> {{ $data->nama ?? '-' }}</h5>
                <p><strong>NISN:</strong> {{ $data->nisn ?? '-' }}</p>
                <p><strong>Email:</strong> {{ $data->email ?? '-' }}</p>
            </div>

            <form action="{{ route('admin.verifikasi.simpan', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="verifikasi_dokumen" class="form-label fw-bold">Status Verifikasi Dokumen</label>
                    <select name="verifikasi_dokumen" id="verifikasi_dokumen" class="form-select" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Disetujui" {{ $data->verifikasi_dokumen == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="Ditolak" {{ $data->verifikasi_dokumen == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success"><i class="bi bi-check2-circle"></i> Simpan Verifikasi</button>
            </form>

            <hr>

            <h5 class="mt-4">Dokumen Pendaftar</h5>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Kartu Keluarga:</strong>
                    @if($data->file_kk)
                        <a href="{{ asset('storage/' . $data->file_kk) }}" target="_blank" class="btn btn-sm btn-primary ms-2">Lihat KK</a>
                    @else
                        <span class="text-muted ms-2">Belum diunggah</span>
                    @endif
                </li>
                <li class="list-group-item">
                    <strong>Akta Kelahiran:</strong>
                    @if($data->file_akte)
                        <a href="{{ asset('storage/' . $data->file_akte) }}" target="_blank" class="btn btn-sm btn-primary ms-2">Lihat Akta</a>
                    @else
                        <span class="text-muted ms-2">Belum diunggah</span>
                    @endif
                </li>
                <li class="list-group-item">
                    <strong>Ijazah:</strong>
                    @if($data->file_ijazah)
                        <a href="{{ asset('storage/' . $data->file_ijazah) }}" target="_blank" class="btn btn-sm btn-primary ms-2">Lihat Ijazah</a>
                    @else
                        <span class="text-muted ms-2">Belum diunggah</span>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
