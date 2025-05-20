@extends('layouts.user')

@section('title', 'Formulir Daftar Ulang')

@section('containt')
<div class="container mt-5 mb-5">
    <div class="card shadow border-0">
        <div class="card-header bg-warning text-dark">
            <h4><i class="bi bi-cash-coin me-2"></i> Formulir Daftar Ulang</h4>
            <p class="mb-0 small">Data Anda telah terdaftar. Silakan unggah bukti pembayaran untuk menyelesaikan proses daftar ulang.</p>
        </div>

        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- === DATA SISWA (READONLY) === --}}
                <h5 class="mb-3"><i class="bi bi-person-lines-fill me-1"></i> Data Siswa</h5>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="Muhammad Jaja Maulana" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">NISN</label>
                        <input type="text" class="form-control" value="0053897375" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" value="Ciamis" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" value="2005-11-25" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" value="Laki-laki" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Agama</label>
                        <input type="text" class="form-control" value="Islam" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" rows="3" readonly>Dusun Lebakayu RT.007/RW.003 Desa Sukanagara, Kec. Jatinagara</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="zainulkarimsyafiq@gmail.com" readonly>
                </div>

                {{-- === UPLOAD BUKTI PEMBAYARAN === --}}
                <h5 class="mb-3"><i class="bi bi-upload me-1"></i> Upload Bukti Pembayaran</h5>
                <div class="mb-4">
                    <label for="bukti_pembayaran" class="form-label">File Bukti Pembayaran (PDF/JPG/PNG)</label>
                    <input type="file" name="bukti_pembayaran" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-check-circle me-1"></i> Konfirmasi Daftar Ulang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
