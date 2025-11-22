@extends('layouts.admin')

@section('title', 'Daftar Ulang Siswa')

@section('containt')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-info-emphasis">Daftar Ulang Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>NISN</th>
                            <th>Status Daftar Ulang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daftar-ulang-body">

                        <tr>
                            <td>1</td>
                            <td>{{ $data->nama ?? '-' }}</td>
                            <td>{{ $data->nisn ?? '-' }}</td>
                            <td>{{ $data->status_daftar_ulang ?? '-' }}</td>
                            
                            <td>Belum</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="editDaftarUlang(0)">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="hapusDaftarUlang(0)">Hapus</button>
                            </td>
                    </tbody>
                </table>
            </div>

            <!-- Form tambah/edit daftar ulang -->
            <div class="mt-4">
                <h6>Tambah/Edit Daftar Ulang</h6>
                <form id="formDaftarUlang" onsubmit="return simpanDaftarUlang()">
                    <input type="hidden" id="indexSiswa" value="">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" id="nama" class="form-control" placeholder="Nama Siswa" required>
                        </div>
                        <div class="col">
                            <input type="text" id="nisn" class="form-control" placeholder="NISN" required>
                        </div>
                        <div class="col">
                            <select id="status_daftar_ulang" class="form-control" required>
                                <option value="">-- Pilih Status Daftar Ulang --</option>
                                <option value="Belum">Belum</option>
                                <option value="Sudah">Sudah</option>
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" onclick="resetForm()">Batal</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>



@endsection
