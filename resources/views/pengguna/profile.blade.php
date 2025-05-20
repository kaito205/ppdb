@extends('layouts.user')

@section('title', 'Profil Siswa')

@section('containt')
<div class="container mt-4 mb-5">
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0"><i class="bi bi-person-badge-fill me-2 text-secondary"></i> Profil Siswa</h3>
                <a href="" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-square"></i> Edit Profil
                </a>
            </div>

            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('img/anita.jpg') }}" alt="Foto Siswa" class="img-thumbnail rounded shadow-sm mb-3" style="max-width: 100%;">
                </div>
                <div class="col-md-8">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr><th><i class="bi bi-person-fill me-2 text-secondary"></i> Nama Lengkap</th><td>Anita Siti Nurohmah</td></tr>
                            <tr><th><i class="bi bi-credit-card-2-front-fill me-2 text-secondary"></i> NISN</th><td>0053897375</td></tr>
                            <tr><th><i class="bi bi-card-heading me-2 text-secondary"></i> NIK</th><td>3207122511050001</td></tr>
                            <tr><th><i class="bi bi-building me-2 text-secondary"></i> Asal Sekolah</th><td>SMA ERHA JATINAGARA</td></tr>
                            <tr><th><i class="bi bi-calendar2-check-fill me-2 text-secondary"></i> Tahun Lulus</th><td>2023</td></tr>
                            <tr><th><i class="bi bi-geo-alt me-2 text-secondary"></i> Tempat, Tanggal Lahir</th><td>Ciamis, 25-11-2005</td></tr>
                            <tr><th><i class="bi bi-gender-ambiguous me-2 text-secondary"></i> Jenis Kelamin</th><td>Laki-laki</td></tr>
                            <tr><th><i class="bi bi-moon-stars-fill me-2 text-secondary"></i> Agama</th><td>Islam</td></tr>
                            <tr><th><i class="bi bi-house-door-fill me-2 text-secondary"></i> Alamat</th><td>Dusun Lebakayu RT.007/ RW.003 Desa Sukanagara Kec. Jatinagara</td></tr>
                            <tr><th><i class="bi bi-globe me-2 text-secondary"></i> Provinsi</th><td>Jawa Barat</td></tr>
                            <tr><th><i class="bi bi-buildings-fill me-2 text-secondary"></i> Kabupaten/Kota</th><td>Kab. Ciamis</td></tr>
                            <tr><th><i class="bi bi-signpost-split-fill me-2 text-secondary"></i> Kode Pos</th><td>46273</td></tr>
                            <tr><th><i class="bi bi-envelope-fill me-2 text-secondary"></i> Email</th><td>zainulkarimsyafiq@gmail.com</td></tr>
                            <tr><th><i class="bi bi-telephone-fill me-2 text-secondary"></i> No. Telepon</th><td>—</td></tr>
                            <tr><th><i class="bi bi-phone-fill me-2 text-secondary"></i> No. Handphone</th><td>085861930794</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
