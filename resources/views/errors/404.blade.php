@extends('layouts.app')

@section('containt')
<div class="container d-flex flex-column justify-content-center align-items-center vh-100 text-center">
    <div class="mb-4">
        <h1 class="display-1 fw-bold text-primary">404</h1>
        <h2 class="mb-4">Halaman Tidak Ditemukan</h2>
        <p class="lead text-muted mb-5">Maaf, halaman yang Anda cari tidak dapat ditemukan atau telah dipindahkan.</p>
        <a href="{{ url('/') }}" class="btn btn-primary btn-lg px-4 gap-3">
            <i class="bi bi-house-door-fill me-2"></i>Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
