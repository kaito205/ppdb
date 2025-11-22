@extends('layouts.user')

@section('title', 'Profil Siswa')

@section('containt')
<div class="container mt-4 mb-5">
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">
                    <i class="bi bi-person-badge-fill me-2 text-secondary"></i> Profil Siswa
                </h3>
                <a href="#" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-square"></i> Cetak Formulir
                </a>
            </div>

            @if ($data)
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ optional($data)->foto ? asset('storage/' . $data->foto) : asset('img/user.jpeg') }}"
                        alt="Foto Siswa" class="img-thumbnail rounded shadow-sm mb-3" style="max-width: 100%;">
                </div>
                <div class="col-md-8">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <th><i class="bi bi-person-fill me-2 text-secondary"></i> Nama Lengkap</th>
                                <td>{{ $data->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-credit-card-2-front-fill me-2 text-secondary"></i> NISN</th>
                                <td>{{ $data->nisn ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-card-heading me-2 text-secondary"></i> NIK</th>
                                <td>{{ $data->nik ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-building me-2 text-secondary"></i> Asal Sekolah</th>
                                <td>{{ $data->asal_sekolah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-calendar2-check-fill me-2 text-secondary"></i> Tahun Lulus</th>
                                <td>{{ $data->tahun_lulus ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-geo-alt me-2 text-secondary"></i> Tempat, Tanggal Lahir</th>
                                <td>{{ $data->tempat_lahir ?? '-' }}, {{ $data->tanggal_lahir ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-gender-ambiguous me-2 text-secondary"></i> Jenis Kelamin</th>
                                <td>{{ $data->jenis_kelamin ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-moon-stars-fill me-2 text-secondary"></i> Agama</th>
                                <td>{{ $data->agama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-house-door-fill me-2 text-secondary"></i> Alamat</th>
                                <td>{{ $data->alamat ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-envelope-fill me-2 text-secondary"></i> Email</th>
                                <td>{{ $data->email ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-phone-fill me-2 text-secondary"></i> No. Handphone</th>
                                <td>{{ $data->no_hp ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="alert alert-warning text-center">
                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                Data belum diisi. Silakan lengkapi <a href="{{ route('formulir.user') }}">formulir pendaftaran</a>.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
