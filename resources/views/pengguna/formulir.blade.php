<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
            animation: fadeIn 0.7s ease-in-out;
            text-align: san-serif;
        }

        .info-card {
            border-left: 5px solid #198754;
            transition: .3s ease;
        }

        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .step-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 18px;
            border: 1px solid #e9ecef;
            transition: .3s ease;
        }

        .step-box:hover {
            background: #e8f0ff;
            border-color: #198754;
            transform: translateX(4px);
        }
    </style>
</head>
<body class="bg-light">

<!-- =========================== -->
<!--   HEADER FORMULIR           -->
<!-- =========================== -->
<div class="container mt-5 mb-4">
    <div class="card shadow border-0 mb-4">
        <div class="card-header bg-success text-white">
            <h4><i class="bi bi-pencil-square me-2"></i> Formulir Pendaftaran Mahasiswa Baru</h4>
            <p class="mb-0 small">Lengkapi semua data dengan benar dan lengkap ya bro.</p>
        </div>
    </div>

    <!-- =========================== -->
    <!--   SYARAT & LANGKAH DAFTAR   -->
    <!-- =========================== -->
    <div class="row g-4 mb-5">

        <!-- SYARAT -->
        <div class="col-md-6">
            <div class="p-4 bg-white shadow-sm rounded info-card h-100">
                <h4 class="text-success fw-bold mb-3"><i class="bi bi-file-earmark-check me-2"></i> Persyaratan Pendaftaran</h4>
                <ul class="mb-0">
                    <li>Fotokopi KK (PDF)</li>
                    <li>Fotokopi Akte Kelahiran (PDF)</li>
                    <li>Ijazah Terakhir (jika sudah ada)</li>
                    <li>Foto Diri ukuran 3x4 (jpg/png)</li>
                    <li>Mengisi formulir dengan data benar</li>
                    <li>Nomor HP & Email aktif</li>
                </ul>
            </div>
        </div>

        <!-- LANGKAH -->
        <div class="col-md-6">
            <div class="p-4 bg-white shadow-sm rounded info-card h-100">
                <h4 class="text-success fw-bold mb-3"><i class="bi bi-list-ol me-2"></i> Langkah-langkah Pendaftaran</h4>

                <div class="step-box mb-2"><b>1.</b> Isi seluruh formulir dengan lengkap.</div>
                <div class="step-box mb-2"><b>2.</b> Upload semua dokumen yang diperlukan.</div>
                <div class="step-box mb-2"><b>3.</b> Pastikan data sudah valid.</div>
                <div class="step-box mb-2"><b>4.</b> Klik tombol <b>Kirim Formulir</b>.</div>
                <div class="step-box mb-2"><b>5.</b> Tunggu verifikasi via WhatsApp/Email.</div>
                <div class="step-box"><b>6.</b> Jika diterima, lakukan daftar ulang.</div>

            </div>
        </div>

    </div>
</div>


<!-- =========================== -->
<!-- FORMULIR PENDAFTARAN        -->
<!-- =========================== -->
<div class="container mb-5">
    <div class="card shadow border-0">
        <div class="card-body">

            <form action="{{ route('formulir.simpan') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- === DATA DIRI === -->
                <h5 class="text-blue mb-3"><i class="bi bi-person-lines-fill me-1"></i> Data Diri</h5>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">NISN</label>
                        <input type="text" name="nisn" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Agama</label>
                        <select name="agama" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option>Katolik</option>
                            <option>Hindu</option>
                            <option>Buddha</option>
                            <option>Konghucu</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Aktif</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Upload Foto Diri</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>

                <!-- === RIWAYAT PENDIDIKAN === -->
                <h5 class="text-blue mb-3"><i class="bi bi-journal-text me-1"></i> Riwayat Pendidikan</h5>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Asal Sekolah</label>
                        <input type="text" name="asal_sekolah" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Tahun Lulus</label>
                        <input type="text" name="tahun_lulus" class="form-control" required>
                    </div>
                </div>


                <!-- === DATA KELUARGA === -->
                <h5 class="text-blue mb-3"><i class="bi bi-people-fill me-1"></i> Data Keluarga</h5>

                <div class="mb-3">
                    <label class="form-label">Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor KK</label>
                    <input type="text" name="no_kk" class="form-control" required>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Upload KK (PDF)</label>
                        <input type="file" name="file_kk" class="form-control" accept=".pdf" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Upload Akte (PDF)</label>
                        <input type="file" name="file_akte" class="form-control" accept=".pdf" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Upload Ijazah (PDF)</label>
                        <input type="file" name="file_ijazah" class="form-control" accept=".pdf">
                    </div>
                </div>

                <div class="form-check mb-4">
                    <input type="checkbox" class="form-check-input" id="setuju" required>
                    <label for="setuju" class="form-check-label">Saya menyetujui semua syarat & ketentuan.</label>
                </div>

                <div class="text-end">
                    <button class="btn btn-success">
                        <i class="bi bi-check-circle me-1"></i> Kirim Formulir
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>
