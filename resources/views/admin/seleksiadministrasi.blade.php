@extends('layouts.admin')

@section('title', 'Seleksi Administrasi & Akademik')

@section('containt')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-info-emphasis">Seleksi Administrasi & Akademik</h6>
            <div class="d-flex align-items-center gap-3">
                <input type="text" class="form-control form-control-sm w-auto" id="searchInput" placeholder="Cari nama siswa..." onkeyup="tampilkanSeleksi()">
                <select class="form-select form-select-sm rounded-pill border-primary text-dark w-auto"
                        id="filterStatus" onchange="tampilkanSeleksi()">
                    <option value="">Semua</option>
                    <option value="Lolos">Lolos</option>
                    <option value="Menunggu">Menunggu</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>
        </div>
        <div class="card-body text-white">
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-white text-dark" width="100%" cellspacing="0">
                    <thead class="table-dark text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Asal Sekolah</th>
                            <th>Status Administrasi</th>
                            <th>Status Akademik</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="seleksi-body">
                        {{-- Data siswa dimasukkan oleh JavaScript --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    const siswa = [
        {
            nama: "Iis Siti Maesaroh",
            asal_sekolah: "SMAN 1 Ciamis",
            statusAdministrasi: "Lolos",
            statusAkademik: "Lolos"
        },
        {
            nama: "Asep Maulana",
            asal_sekolah: "SMAN 2 Tasik",
            statusAdministrasi: "Menunggu",
            statusAkademik: "Menunggu"
        },
        {
            nama: "Rina",
            asal_sekolah: "SMAN 3 Bandung",
            statusAdministrasi: "Lolos",
            statusAkademik: "Ditolak"
        },
        {
            nama: "Budi",
            asal_sekolah: "SMAN 4 Garut",
            statusAdministrasi: "Ditolak",
            statusAkademik: "Menunggu"
        },
        {
            nama: "Dewi",
            asal_sekolah: "SMKN 1 Cirebon",
            statusAdministrasi: "Lolos",
            statusAkademik: "Menunggu"
        }
    ];

    function tampilkanSeleksi() {
        const tbody = document.getElementById("seleksi-body");
        const filter = document.getElementById("filterStatus").value.toLowerCase();
        const search = document.getElementById("searchInput").value.toLowerCase();

        tbody.innerHTML = "";

        siswa.forEach((s, index) => {
            const adm = s.statusAdministrasi;
            const akd = s.statusAkademik;
            const cocokFilter = !filter || adm.toLowerCase() === filter || akd.toLowerCase() === filter;
            const cocokSearch = s.nama.toLowerCase().includes(search);

            if (cocokFilter && cocokSearch) {
                tbody.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${s.nama}</td>
                        <td>${s.asal_sekolah}</td>
                        <td>
                            <span class="badge bg-${adm === 'Lolos' ? 'success' : adm === 'Menunggu' ? 'secondary' : 'danger'}">${adm}</span>
                        </td>
                        <td>
                            <span class="badge bg-${akd === 'Lolos' ? 'success' : akd === 'Menunggu' ? 'secondary' : 'danger'}">${akd}</span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-success" onclick="verifikasiAdministrasi(${index})">
                                    <i class="bi bi-folder-check"></i> Administrasi
                                </button>
                                <button class="btn btn-sm btn-outline-info" onclick="verifikasiAkademik(${index})">
                                    <i class="bi bi-journal-check"></i> Akademik
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
            }
        });
    }

    function verifikasiAdministrasi(index) {
        const siswaTerpilih = siswa[index];
        const konfirmasi = confirm(`Verifikasi administrasi untuk ${siswaTerpilih.nama}?`);
        if (konfirmasi) {
            siswaTerpilih.statusAdministrasi = "Lolos";
            alert(`Administrasi ${siswaTerpilih.nama} telah diverifikasi.`);
            tampilkanSeleksi();
        }
    }

    function verifikasiAkademik(index) {
        const siswaTerpilih = siswa[index];
        const konfirmasi = confirm(`Verifikasi akademik untuk ${siswaTerpilih.nama}?`);
        if (konfirmasi) {
            siswaTerpilih.statusAkademik = "Lolos";
            alert(`Akademik ${siswaTerpilih.nama} telah diverifikasi.`);
            tampilkanSeleksi();
        }
    }

    tampilkanSeleksi();
</script>
@endsection
