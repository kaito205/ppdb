@extends('layouts.user')

@section('containt')
<section class="mt-5">
    <div class="container">
        <h2 class="mb-4">Dashboard Siswa</h2>

        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-person-lines-fill"></i> Profil Siswa</h5>
                        <p class="card-text">Lihat dan perbarui data pribadi kamu.</p>
                        <a href="{{ route('profile.user') }}" class="btn btn-primary">Lihat Profil</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-journal-check"></i> Formulir Pendaftaran</h5>
                        <p class="card-text">Lengkapi atau periksa kembali formulir pendaftaranmu.</p>
                        <a href="{{ route('formulir.user') }}" class="btn btn-success">Isi Formulir</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-clipboard-data"></i> Hasil Seleksi</h5>
                        <p class="card-text">Lihat hasil seleksi penerimaan siswa baru.</p>
                        <a href="{{ route('seleksi.user') }}" class="btn btn-info">Lihat Hasil</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-cash-coin"></i> Daftar Ulang</h5>
                        <p class="card-text">Lakukan proses daftar ulang jika kamu diterima.</p>
                        <a href="{{ route('daftar.user') }}" class="btn btn-warning">Daftar Ulang</a>
                    </div>
                </div>
            </div>
           
        </div>

    </div>
</section>
@endsection
