@extends('layouts.admin')

@section('title', 'Data siswa')

@section('containt')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info-emphasis">Data siswa</h6>
            <div class="d-flex align-items-center gap-3">
                <input type="text" class="form-control form-control-sm w-auto" id="searchInput"
                    placeholder="Cari nama siswa..." onkeyup="tampilkanSeleksi()">

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>NISN</th>
                            <th>Alamat</th>
                            <th>No.tlp</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        {{-- Isi dari JavaScript --}}
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination justify-content-center" id="pagination">
                        {{-- Pagination dari JavaScript --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<script>
    const siswa = [
        { nama: "Iis siti maesaroh", jk: "Perempuan", nisn: "0007234", alamat: "Ciamis", telp: "081223264682", status: "Lulus" },
        { nama: "Asep Maulana", jk: "Laki-laki", nisn: "0007235", alamat: "Tasik", telp: "081223212345", status: "Aktif" },
        { nama: "Rina", jk: "Perempuan", nisn: "0007236", alamat: "Bandung", telp: "081212345678", status: "Lulus" },
        { nama: "Budi", jk: "Laki-laki", nisn: "0007237", alamat: "Garut", telp: "082123456789", status: "Drop Out" },
        { nama: "Dewi", jk: "Perempuan", nisn: "0007238", alamat: "Cirebon", telp: "081234567890", status: "Aktif" },
        { nama: "Aulia", jk: "Perempuan", nisn: "0007239", alamat: "Bekasi", telp: "081233344455", status: "Lulus" },
        { nama: "Zaki", jk: "Laki-laki", nisn: "0007240", alamat: "Depok", telp: "081200000001", status: "Aktif" },
        { nama: "Mira", jk: "Perempuan", nisn: "0007241", alamat: "Jakarta", telp: "081223334455", status: "Lulus" },
        // Tambah data lainnya sesuai kebutuhan
    ];

    const perPage = 5;
    let currentPage = 1;

    function tampilkanData() {
        const start = (currentPage - 1) * perPage;
        const end = start + perPage;
        const tampil = siswa.slice(start, end);

        const tbody = document.getElementById("table-body");
        tbody.innerHTML = "";

        tampil.forEach((s, index) => {
            tbody.innerHTML += `
                <tr>
                    <th>${start + index + 1}</th>
                    <td><img src="{{ asset('img/user.jpeg') }}" alt="gambar error" class="img-thumbnail" style="max-width: 90px"></td>
                    <td>${s.nama}</td>
                    <td>${s.jk}</td>
                    <td>${s.nisn}</td>
                    <td>${s.alamat}</td>
                    <td>${s.telp}</td>
                    <td>${s.status}</td>
                    <td>
                        <a href="#" class="btn btn-primary text-white">Detail</a>
                        <a href="#" class="btn btn-primary text-white">Edit</a>
                        <a href="#" onclick="return confirm('Yakin hapus?')" class="btn btn-danger text-white">Hapus</a>
                    </td>
                </tr>
            `;
        });
    }

    function buatPagination() {
        const totalPages = Math.ceil(siswa.length / perPage);
        const paginasi = document.getElementById("pagination");
        paginasi.innerHTML = "";

        for (let i = 1; i <= totalPages; i++) {
            paginasi.innerHTML += `
                <li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a class="page-link" href="#">${i}</a>
                </li>
            `;
        }

        document.querySelectorAll("#pagination .page-link").forEach((link, index) => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                currentPage = index + 1;
                tampilkanData();
                buatPagination();
            });
        });
    }

    // Inisialisasi
    tampilkanData();
    buatPagination();
</script>
@endsection
