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
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Status Daftar Ulang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daftar-ulang-body">
                        {{-- Data dari JavaScript --}}
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

<script>
    const daftarUlang = [
        { nama: "Iis Siti Maesaroh", nisn: "0007234", status_daftar_ulang: "Sudah" },
        { nama: "Asep Maulana", nisn: "0007235", status_daftar_ulang: "Belum" },
        { nama: "Rina", nisn: "0007236", status_daftar_ulang: "Sudah" },
        { nama: "Budi", nisn: "0007237", status_daftar_ulang: "Belum" },
        { nama: "Dewi", nisn: "0007238", status_daftar_ulang: "Sudah" },
    ];

    function tampilkanDaftarUlang() {
        const tbody = document.getElementById("daftar-ulang-body");
        tbody.innerHTML = "";

        daftarUlang.forEach((s, index) => {
            tbody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${s.nama}</td>
                    <td>${s.nisn}</td>
                    <td>
                        <span class="badge badge-${s.status_daftar_ulang === 'Sudah' ? 'success' : 'secondary'}">
                            ${s.status_daftar_ulang}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="editDaftarUlang(${index})">Detail</button>
                        <button class="btn btn-sm btn-danger" onclick="hapusDaftarUlang(${index})">Hapus</button>
                    </td>
                </tr>
            `;
        });
    }

    function simpanDaftarUlang() {
        const index = document.getElementById("indexSiswa").value;
        const nama = document.getElementById("nama").value.trim();
        const nisn = document.getElementById("nisn").value.trim();
        const status = document.getElementById("status_daftar_ulang").value;

        if (!nama || !nisn || !status) {
            alert("Semua field harus diisi!");
            return false;
        }

        if (index === "") {
            daftarUlang.push({ nama, nisn, status_daftar_ulang: status });
        } else {
            daftarUlang[index] = { nama, nisn, status_daftar_ulang: status };
        }

        tampilkanDaftarUlang();
        resetForm();
        return false; // agar form tidak reload halaman
    }

    function editDaftarUlang(index) {
        const s = daftarUlang[index];
        document.getElementById("indexSiswa").value = index;
        document.getElementById("nama").value = s.nama;
        document.getElementById("nisn").value = s.nisn;
        document.getElementById("status_daftar_ulang").value = s.status_daftar_ulang;
    }

    function hapusDaftarUlang(index) {
        if (confirm("Yakin ingin menghapus data ini?")) {
            daftarUlang.splice(index, 1);
            tampilkanDaftarUlang();
            resetForm();
        }
    }

    function resetForm() {
        document.getElementById("indexSiswa").value = "";
        document.getElementById("formDaftarUlang").reset();
    }

    // Tampilkan data awal
    tampilkanDaftarUlang();
</script>
@endsection
