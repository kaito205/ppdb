@extends('layouts.admin')

@section('title', 'Detail Siswa')

@section('containt')
<div class="container-fluid mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-person-lines-fill me-2"></i> Detail Data Siswa</h5>
            <a href="{{ route('datasiswa') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            @if($data)
            <div class="row mb-4">
                <div class="col-md-4 text-center">
                    <img src="{{ $data->foto ? asset('storage/' . $data->foto) : asset('img/default.png') }}"
                        alt="Foto Siswa" class="img-thumbnail shadow" width="150">
                    <p class="mt-2 fw-bold">{{ $data->nama }}</p>
                    <span class="badge {{
                        $data->status_seleksi === 'Diterima' ? 'bg-success' :
                        ($data->status_seleksi === 'Ditolak' ? 'bg-danger' : 'bg-warning text-dark') }}">
                        {{ $data->status_seleksi ?? 'Diproses' }}
                    </span>
                </div>
                <div class="col-md-8">
                    <table class="table table-striped">
                        <tbody>
                            <tr><th>NISN</th><td>{{ $data->nisn ?? '-' }}</td></tr>
                            <tr><th>NIK</th><td>{{ $data->nik ?? '-' }}</td></tr>
                            <tr><th>Tempat, Tanggal Lahir</th><td>{{ $data->tempat_lahir ?? '-' }}, {{ $data->tanggal_lahir ?? '-' }}</td></tr>
                            <tr><th>Jenis Kelamin</th><td>{{ $data->jenis_kelamin ?? '-' }}</td></tr>
                            <tr><th>Agama</th><td>{{ $data->agama ?? '-' }}</td></tr>
                            <tr><th>No. HP</th><td>{{ $data->no_hp ?? '-' }}</td></tr>
                            <tr><th>Email</th><td>{{ $data->email ?? '-' }}</td></tr>
                            <tr><th>Alamat</th><td>{{ $data->alamat ?? '-' }}</td></tr>
                            <tr><th>Asal Sekolah</th><td>{{ $data->asal_sekolah ?? '-' }}</td></tr>
                            <tr><th>Jurusan</th><td>{{ $data->jurusan ?? '-' }}</td></tr>
                            <tr><th>Tahun Lulus</th><td>{{ $data->tahun_lulus ?? '-' }}</td></tr>
                            <tr><th>Nilai Rata-rata</th><td>{{ $data->nilai_rata ?? '-' }}</td></tr>
                            <tr><th>Program Studi</th><td>{{ $data->prodi ?? '-' }}</td></tr>
                            <tr><th>Tahun Pendaftaran</th><td>{{ $data->tahun_pendaftaran ?? '-' }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <h6 class="fw-bold mb-3">Data Keluarga & Dokumen</h6>
            <table class="table table-bordered">
                <tbody>
                    <tr><th>Nama Ayah</th><td>{{ $data->nama_ayah ?? '-' }}</td></tr>
                    <tr><th>Nama Ibu</th><td>{{ $data->nama_ibu ?? '-' }}</td></tr>
                    <tr><th>No. KK</th><td>{{ $data->no_kk ?? '-' }}</td></tr>
                    <tr>
                        <th>File KK</th>
                        <td>
                            @if($data->file_kk)
                                <a href="{{ asset('storage/' . $data->file_kk) }}" target="_blank">Lihat File KK</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>File Akte</th>
                        <td>
                            @if($data->file_akte)
                                <a href="{{ asset('storage/' . $data->file_akte) }}" target="_blank">Lihat File Akte</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>File Ijazah</th>
                        <td>
                            @if($data->file_ijazah)
                                <a href="{{ asset('storage/' . $data->file_ijazah) }}" target="_blank">Lihat File Ijazah</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr><th>Verifikasi Dokumen</th><td>{{ $data->verifikasi_dokumen ?? '-' }}</td></tr>
                </tbody>
            </table>
            @else
            <div class="alert alert-warning">Data siswa tidak ditemukan.</div>
            @endif
        </div>
    </div>
</div>
@endsection
