@extends('layouts.user')
@section('title', 'Dashboard Mahasiswa')

@section('containt')
<section class="mt-5">
    <div class="container">

        {{-- Flash Success --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        {{-- Error Alert --}}
        @if($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada kesalahan input.
            <ul class="mt-2 mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Welcome --}}
        <div class="mb-4 d-flex align-items-center mt-5">
            <img src="{{ $data && $data->foto ? asset('storage/' . $data->foto) : asset('img/user.jpeg') }}"
                alt="Foto Profil" class="rounded-circle me-5" style="width: 60px; height: 60px; object-fit: cover;">
            <div>
                <h4 class="mb-0 ml-3">  Selamat Datang, {{ Auth::user()->name }}</h4>
                <small class="text-muted ml-3">Dashboard Mahasiswa</small>
            </div>
        </div>

        {{-- Ringkasan Status --}}
        <div class="row g-3 mb-4 mt-5">
            <div class="col-md-4">
                <div class="card border-start border-success border-4 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="text-muted"><i class="bi bi-patch-check-fill me-1 text-success"></i> Status Seleksi</h6>
                        <p class="fw-bold mb-0">{{ $data->status_seleksi ?? 'Belum Diproses' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-start border-primary border-4 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="text-muted"><i class="bi bi-folder-check me-1 text-primary"></i> Verifikasi Dokumen</h6>
                        <p class="fw-bold mb-0">{{ $data->verifikasi_dokumen ?? 'Belum diverifikasi' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-start border-info border-4 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="text-muted"><i class="bi bi-journal-text me-1 text-info"></i> Lengkapi Data</h6>
                        <p class="mb-0">
                            <a href="{{ route('formulir.user') }}" class="btn btn-outline-info btn-sm mt-1">
                                Isi Formulir
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pengumuman --}}
        <div class="card mt-4">
            <div class="card-header bg-blue text-white">
                <i class="bi bi-megaphone-fill"></i> Pengumuman
            </div>
            <div class="card-body">
                @if($data && $data->status_seleksi === 'Lulus')
                <h5 class="text-success"><i class="bi bi-award-fill me-1"></i> Selamat! Kamu dinyatakan <strong>LULUS SELEKSI</strong>.</h5>
                <p>Silakan lanjutkan proses daftar ulang sesuai jadwal yang dikirim melalui email.</p>
                <a href="{{ route('daftar.user') }}" class="btn btn-success btn-sm">Daftar Ulang</a>
                @elseif($data && $data->status_seleksi === 'Tidak Lulus')
                <h5 class="text-danger"><i class="bi bi-x-octagon-fill me-1"></i> Maaf, kamu dinyatakan <strong>TIDAK LULUS</strong>.</h5>
                <p>Jangan menyerah, tetap semangat! Silahkan coba pendaftaran di gelombang berikutnya.</p>
                @else
                <p><i class="bi bi-info-circle"></i> Hasil seleksi Anda sedang dalam proses verifikasi. Silahkan cek secara berkala.</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
