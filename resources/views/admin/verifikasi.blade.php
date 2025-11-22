@extends('layouts.admin')

@section('title', 'Verifikasi Data Siswa')

@section('containt')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-check2-square me-2"></i> Verifikasi Data Siswa</h5>
            <button class="btn btn-light btn-sm" onclick="window.location.reload()">Refresh</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Jenis Kelamin</th>
                            <th>Asal Sekolah</th>
                            <th>Status Verifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Simulasi baris data siswa --}}
                        @php $siswa = [
                            ['nama' => 'Andi Wijaya', 'nisn' => '1234567890', 'jk' => 'Laki-laki', 'sekolah' => 'SMPN 1 Bandung', 'status' => 'Belum Diverifikasi'],
                            ['nama' => 'Siti Nurhaliza', 'nisn' => '0987654321', 'jk' => 'Perempuan', 'sekolah' => 'SMPN 3 Garut', 'status' => 'Disetujui'],
                            ['nama' => 'Rudi Hartono', 'nisn' => '1122334455', 'jk' => 'Laki-laki', 'sekolah' => 'SMP PGRI Tasikmalaya', 'status' => 'Ditolak'],
                        ]; @endphp

                        @foreach($siswa as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ $item['nisn'] }}</td>
                            <td>{{ $item['jk'] }}</td>
                            <td>{{ $item['sekolah'] }}</td>
                            <td>
                                @if($item['status'] === 'Disetujui')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif($item['status'] === 'Ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-secondary">Belum Diverifikasi</span>
                                @endif
                            </td>
                            <td>
                                @if($item['status'] === 'Belum Diverifikasi')
                                    <button class="btn btn-sm btn-success me-1" onclick="alert('Disetujui!')">
                                        <i class="bi bi-check-lg"></i> Setujui
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="alert('Ditolak!')">
                                        <i class="bi bi-x-lg"></i> Tolak
                                    </button>
                                @else
                                    <button class="btn btn-sm btn-secondary" disabled>
                                        Sudah Diverifikasi
                                    </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
