@extends('layouts.user')

@section('title', 'Hasil Seleksi')

@section('containt')
<div class="container mt-5 mb-5 ">
    <div class="card shadow-lg border-0">
        <div class="card-body text-center">
            <h3 class="mb-4 text-success">
                <i class="bi bi-check-circle-fill me-2"></i> Hasil Seleksi Penerimaan
            </h3>

            {{-- Informasi Siswa --}}
            <div class="mb-4">
                <h5 class="text-muted">Informasi Siswa</h5>
                <table class="table table-bordered w-50 mx-auto">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>NISN</th>
                            <th>Asal Sekolah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Muhammad Jaja Maulana</td>
                            <td>0053897375</td>
                            <td>SMA ERHA JATINAGARA</td>
                        </tr>
                    </tbody>
                </table>

            </div>

            {{-- Status Seleksi --}}
            <div class="alert alert-success fs-5" role="alert">
                <i class="bi bi-award-fill me-2"></i>
                <strong>Selamat!</strong> Anda dinyatakan <span class="fw-bold text-uppercase">Lulus</span> seleksi
                penerimaan siswa baru.
            </div>

            <p class="text-muted">
                Silakan lanjut ke proses daftar ulang. Informasi selengkapnya akan dikirim melalui email Anda atau dapat
                dilihat di menu <strong>Pengumuman</strong>.
            </p>


        </div>
    </div>
</div>
@endsection

