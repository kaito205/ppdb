@extends('layouts.app')

@section('containt')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center" data-aos="zoom-in">
            <div class="card border-0 shadow-sm rounded-4 p-5 animate__animated animate__fadeIn">
                <div class="mb-4">
                    <div class="success-icon mx-auto bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2.5rem;">
                        <i class="bi bi-check-lg"></i>
                    </div>
                </div>
                
                <h2 class="fw-bold text-dark mb-3">Pendaftaran Berhasil!</h2>
                <p class="text-muted lead mb-4">
                    Halo <strong>{{ $data->nama }}</strong>, data pendaftaran Anda telah kami terima dengan ID: <span class="text-primary fw-bold">#PPDB-{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}</span>.
                </p>
                
                <div class="alert alert-info border-0 rounded-4 p-4 mb-4 text-start">
                    <h6 class="fw-bold mb-2"><i class="bi bi-info-circle me-2"></i> Langkah Selanjutnya:</h6>
                    <ol class="small mb-0 pe-3">
                        <li class="mb-2"><strong>Unduh & Cetak</strong> Kartu Pendaftaran di bawah ini sebagai bukti fisik.</li>
                        <li class="mb-2"><strong>Cek Email</strong> Anda secara berkala untuk update status verifikasi dokumen.</li>
                        <li><strong>Siapkan Dokumen Asli</strong> untuk dibawa saat verifikasi tatap muka nanti.</li>
                    </ol>
                </div>

                <div class="d-grid gap-3 d-sm-flex justify-content-center">
                    <a href="{{ route('pendaftaran.cetak', $data->id) }}" class="btn btn-primary btn-lg rounded-pill px-5 shadow animate__animated animate__pulse animate__infinite">
                        <i class="bi bi-printer me-2"></i> Cetak Kartu Pendaftaran
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4">
                        Kembali ke Beranda
                    </a>
                </div>
                
                <div class="mt-5 pt-4 border-top opacity-50">
                    <p class="small text-muted mb-0">Ada kendala? Hubungi Admin PPDB via <a href="https://wa.me/6285861930794" target="_blank" class="text-success text-decoration-none fw-bold">WhatsApp <i class="bi bi-whatsapp"></i></a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .success-icon {
        box-shadow: 0 10px 20px rgba(25, 135, 84, 0.2);
    }
</style>
@endsection
