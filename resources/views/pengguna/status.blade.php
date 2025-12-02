@extends('layouts.app')

@section('title', 'Status Pendaftaran')

@section('content')
@if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <i class="bi bi-hourglass-split text-warning" style="font-size: 5rem;"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-3">Pendaftaran Sedang Diproses</h2>
                    <p class="text-muted lead mb-4">
                        Terima kasih telah mendaftar! Data Anda telah kami terima dan sedang dalam tahap verifikasi oleh panitia PPDB.
                    </p>
                    
                    <div class="alert alert-info border-0 d-inline-block text-start">
                        <h5 class="alert-heading"><i class="bi bi-info-circle me-2"></i> Informasi Penting:</h5>
                        <ul class="mb-0">
                            <li>Silahkan cek email Anda secara berkala untuk update status.</li>
                            <li>Kami juga akan menghubungi Anda via WhatsApp jika diperlukan.</li>
                            <li>Tidak ada tes seleksi, cukup tunggu konfirmasi kelulusan.</li>
                        </ul>
                    </div>

                    <div class="mt-5">
                        <a href="{{ route('home') }}" class="btn btn-outline-primary me-2">Kembali ke Beranda</a>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
