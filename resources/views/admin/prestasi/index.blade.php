@extends('layouts.admin')

@section('title', 'Kelola Prestasi')

@section('containt')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Prestasi Sekolah</h6>
            <a href="{{ route('admin.prestasi.tambah') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Tambah Prestasi</a>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($item->foto)
                                <img src="{{ asset('uploads/prestasi/' . $item->foto) }}" alt="Foto" class="img-thumbnail" style="max-width: 100px;">
                                @else
                                <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ Str::limit($item->deskripsi, 100) }}</td>
                            <td>
                                <a href="{{ route('admin.prestasi.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('admin.prestasi.hapus', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus prestasi ini?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data prestasi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
