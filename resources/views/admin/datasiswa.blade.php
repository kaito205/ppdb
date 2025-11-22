@extends('layouts.admin')

@section('title', 'Data Siswa')

@section('containt')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
            <input type="text" class="form-control form-control-sm w-auto" id="searchInput"
                placeholder="Cari nama siswa..." onkeyup="tampilkanSeleksi()">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>NISN</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Status Seleksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        @forelse($data as $siswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ $siswa->foto ? asset('storage/' . $siswa->foto) : asset('img/user.jpeg') }}"
                                    alt="Foto" class="img-thumbnail rounded" style="max-width: 50px;">
                            </td>
                            <td>{{ $siswa->nama ?? '-' }}</td>
                            <td>{{ $siswa->jenis_kelamin ?? '-' }}</td>
                            <td>{{ $siswa->nisn ?? '-' }}</td>
                            <td>{{ $siswa->alamat ?? '-' }}</td>
                            <td>{{ $siswa->no_hp ?? '-' }}</td>
                            <td>
                                @if($siswa->status_seleksi === 'Diterima')
                                <span class="badge bg-success">Diterima</span>
                                @elseif($siswa->status_seleksi === 'Ditolak')
                                <span class="badge bg-danger">Ditolak</span>
                                @else
                                <span class="badge bg-warning text-dark">Diproses</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.siswa.detail', $siswa->id) }}" class="btn btn-primary btn-info">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <form action="" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data siswa.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-3">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
