@extends('layouts.admin')

@section('title', 'Pengumuman Kelulusan')

@section('containt')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-info-emphasis">Pengumuman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-dark text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Asal Sekolah</th>
                            <th>Hasil Seleksi</th>
                            <th>Status Akhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pengumuman-body">
                        {{-- Data dari JavaScript --}}
                    </tbody>
                </table>
            </div>

            <!-- Form tambah/edit pengumuman -->
            <div class="mt-4">
                <h6>Tambah/Edit Pengumuman</h6>
                <form id="formPengumuman" onsubmit="return simpanPengumuman()">
                    <input type="hidden" id="indexSiswa" value="">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" id="nama" class="form-control" placeholder="Nama Siswa" required>
                        </div>
                        <div class="col">
                            <input type="text" id="nisn" class="form-control" placeholder="NISN" required>
                        </div>
                        <div class="col">
                            <input type="text" id="asal_sekolah" class="form-control" placeholder="Asal Sekolah" required>
                        </div>
                        <div class="col">
                            <select id="status" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="Lulus">Lulus</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Drop Out">Drop Out</option>
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
    const siswa = [
        { nama: "Iis Siti Maesaroh", nisn: "0007234", asal_sekolah: "SMAN 1 Ciamis", status: "Lulus" },
        { nama: "Asep Maulana", nisn: "0007235", asal_sekolah: "SMAN 2 Tasik", status: "Aktif" },
        { nama: "Rina", nisn: "0007236", asal_sekolah: "SMAN 3 Bandung", status: "Lulus" },
        { nama: "Budi", nisn: "0007237", asal_sekolah: "SMAN 4 Garut", status: "Drop Out" },
        { nama: "Dewi", nisn: "0007238", asal_sekolah: "SMKN 1 Cirebon", status: "Aktif" },
    ];

    function tampilkanPengumuman() {
        const tbody = document.getElementById("pengumuman-body");
        tbody.innerHTML = "";

        siswa.forEach((s, index) => {
            let hasilSeleksi = (s.status === "Lulus") ? "Lulus" : (s.status === "Drop Out" ? "Tidak Lulus" : "Menunggu");

            tbody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${s.nama}</td>
                    <td>${s.nisn}</td>
                    <td>${s.asal_sekolah}</td>
                    <td>
                        <span class="badge badge-${hasilSeleksi === 'Lulus' ? 'success' : hasilSeleksi === 'Menunggu' ? 'secondary' : 'danger'}">
                            ${hasilSeleksi}
                        </span>
                    </td>
                    <td>${s.status}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="editPengumuman(${index})">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="hapusPengumuman(${index})">Hapus</button>
                    </td>
                </tr>
            `;
        });
    }

    function simpanPengumuman() {
        const index = document.getElementById("indexSiswa").value;
        const nama = document.getElementById("nama").value.trim();
        const nisn = document.getElementById("nisn").value.trim();
        const asal_sekolah = document.getElementById("asal_sekolah").value.trim();
        const status = document.getElementById("status").value;

        if (!nama || !nisn || !asal_sekolah || !status) {
            alert("Semua field harus diisi!");
            return false;
        }

        if (index === "") {
            // Tambah data baru
            siswa.push({ nama, nisn, asal_sekolah, status });
        } else {
            // Edit data existing
            siswa[index] = { nama, nisn, asal_sekolah, status };
        }

        tampilkanPengumuman();
        resetForm();
        return false; // supaya form tidak reload halaman
    }

    function editPengumuman(index) {
        const s = siswa[index];
        document.getElementById("indexSiswa").value = index;
        document.getElementById("nama").value = s.nama;
        document.getElementById("nisn").value = s.nisn;
        document.getElementById("asal_sekolah").value = s.asal_sekolah;
        document.getElementById("status").value = s.status;
    }

    function hapusPengumuman(index) {
        if (confirm("Yakin mau hapus data ini?")) {
            siswa.splice(index, 1);
            tampilkanPengumuman();
            resetForm();
        }
    }

    function resetForm() {
        document.getElementById("indexSiswa").value = "";
        document.getElementById("formPengumuman").reset();
    }

    // Tampilkan data awal saat halaman load
    tampilkanPengumuman();
</script>
@endsection
