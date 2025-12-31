@extends('layouts.app')

@section('containt')
<div class="container py-3 py-md-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header Section -->
            <div class="card border-0 shadow-sm rounded-4 bg-success text-white mb-4 overflow-hidden">
                <div class="card-body p-3 p-md-5">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="fw-bold mb-2">Formulir Pendaftaran Siswa</h2>
                            <p class="mb-0 opacity-75">Silakan lengkapi data Anda dengan benar. Data ini akan digunakan untuk proses verifikasi administrasi.</p>
                        </div>
                        <div class="col-md-4 text-end d-none d-md-block">
                            <i class="bi bi-pencil-square display-1 opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Syarat & Langkah (Accordion for Mobile) -->
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100 info-card-green">
                        <div class="card-body p-3">
                            <h5 class="fw-bold text-success mb-3">
                                <i class="bi bi-file-earmark-check me-2"></i> Persyaratan
                            </h5>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="bi bi-check2-circle me-2 text-success"></i> Fotokopi KK (PDF)</li>
                                <li class="mb-2"><i class="bi bi-check2-circle me-2 text-success"></i> Fotokopi Akte (PDF)</li>
                                <li class="mb-2"><i class="bi bi-check2-circle me-2 text-success"></i> Ijazah (PDF)</li>
                                <li class="mb-0"><i class="bi bi-check2-circle me-2 text-success"></i> Foto 3x4 (JPG/PNG)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100 info-card-blue">
                        <div class="card-body p-3">
                            <h5 class="fw-bold text-primary mb-3">
                                <i class="bi bi-info-circle me-2"></i> Petunjuk
                            </h5>
                            <p class="small text-muted mb-0">Isi data sesuai dokumen asli. Dokumen yang diupload harus jelas terbaca. Hubungi admin via WA jika ada kendala.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Form -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-3 p-md-5">
                    <form action="{{ route('formulir.simpan') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if($errors->any())
                            <div class="alert alert-danger rounded-4 border-0 mb-4">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger rounded-4 border-0 mb-4">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Personal Data -->
                        <div class="form-section mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="section-icon bg-primary-subtle text-primary me-3">
                                    <i class="bi bi-person"></i>
                                </div>
                                <h5 class="fw-bold mb-0">Data Diri Calon Siswa</h5>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control form-control-lg" value="{{ old('nama', $data->nama ?? '') }}" placeholder="Sesuai Ijazah" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">NISN</label>
                                    <input type="text" name="nisn" class="form-control form-control-lg" value="{{ old('nisn', $data->nisn ?? '') }}" 
                                        placeholder="10 Digit NISN" required maxlength="10" minlength="10" 
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" inputmode="numeric">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">NIK</label>
                                    <input type="text" name="nik" class="form-control form-control-lg" value="{{ old('nik', $data->nik ?? '') }}" 
                                        placeholder="16 Digit NIK" required maxlength="16" minlength="16"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" inputmode="numeric">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control form-control-lg" value="{{ old('tempat_lahir', $data->tempat_lahir ?? '') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control form-control-lg" value="{{ old('tanggal_lahir', $data->tanggal_lahir ?? '') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select form-select-lg" required>
                                        <option value="">Pilih</option>
                                        <option value="Laki-laki" {{ (old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ (old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Agama</label>
                                    <select name="agama" class="form-select form-select-lg" required>
                                        <option value="">Pilih</option>
                                        @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] as $agm)
                                            <option value="{{ $agm }}" {{ (old('agama', $data->agama ?? '') == $agm) ? 'selected' : '' }}>{{ $agm }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Nomor HP / WhatsApp</label>
                                    <input type="text" name="no_hp" class="form-control form-control-lg" value="{{ old('no_hp', $data->no_hp ?? '') }}" 
                                        placeholder="08XXX" required maxlength="14" minlength="10"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" inputmode="numeric">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small">Alamat Lengkap</label>
                                    <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $data->alamat ?? '') }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Email Aktif</label>
                                    <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email', $data->email ?? '') }}" placeholder="contoh@email.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Pas Foto (JPG/PNG)</label>
                                    <input type="file" name="foto" class="form-control form-control-lg">
                                    @if(isset($data->foto))
                                        <small class="text-success mt-1 d-block"><i class="bi bi-check-circle"></i> Foto sudah terupload</small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Education History -->
                        <div class="form-section mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="section-icon bg-success-subtle text-success me-3">
                                    <i class="bi bi-mortarboard"></i>
                                </div>
                                <h5 class="fw-bold mb-0">Riwayat Pendidikan</h5>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label class="form-label fw-bold small">Asal Sekolah (SMP/MTs)</label>
                                    <input type="text" name="asal_sekolah" class="form-control form-control-lg" value="{{ old('asal_sekolah', $data->asal_sekolah ?? '') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold small">Tahun Lulus</label>
                                    <input type="text" name="tahun_lulus" class="form-control form-control-lg" value="{{ old('tahun_lulus', $data->tahun_lulus ?? '') }}" 
                                        placeholder="Contoh: 2024" required maxlength="4" minlength="4"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" inputmode="numeric">
                                </div>
                            </div>
                        </div>

                        <!-- Parent Data -->
                        <div class="form-section mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="section-icon bg-info-subtle text-info me-3">
                                    <i class="bi bi-people"></i>
                                </div>
                                <h5 class="fw-bold mb-0">Data Orang Tua / Wali</h5>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Nama Ayah</label>
                                    <input type="text" name="nama_ayah" class="form-control form-control-lg" value="{{ old('nama_ayah', $data->nama_ayah ?? '') }}" placeholder="Nama Lengkap Ayah" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Nama Ibu</label>
                                    <input type="text" name="nama_ibu" class="form-control form-control-lg" value="{{ old('nama_ibu', $data->nama_ibu ?? '') }}" placeholder="Nama Lengkap Ibu" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Nomor Kartu Keluarga (KK)</label>
                                    <input type="text" name="no_kk" class="form-control form-control-lg" value="{{ old('no_kk', $data->no_kk ?? '') }}" 
                                        placeholder="16 Digit No. KK" required maxlength="16" minlength="16"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" inputmode="numeric">
                                </div>
                            </div>
                        </div>

                        <!-- Documents -->
                        <div class="form-section mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="section-icon bg-warning-subtle text-warning me-3">
                                    <i class="bi bi-file-earmark-arrow-up"></i>
                                </div>
                                <h5 class="fw-bold mb-0">Berkas Dokumen (PDF)</h5>
                            </div>
                            <div class="row g-3 text-center text-md-start">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold small">Kartu Keluarga @if(!isset($data)) <span class="text-danger">*</span> @endif</label>
                                    <div class="doc-upload border p-3 rounded-3 shadow-sm bg-light">
                                        <i class="bi bi-file-pdf display-6 text-danger mb-2"></i>
                                        <input type="file" name="file_kk" class="form-control form-control-sm" accept=".pdf" {{ isset($data) ? '' : 'required' }}>
                                        @if(isset($data->file_kk))
                                            <small class="text-success d-block mt-2"><i class="bi bi-check-circle"></i> Terupload</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold small">Akte Kelahiran @if(!isset($data)) <span class="text-danger">*</span> @endif</label>
                                    <div class="doc-upload border p-3 rounded-3 shadow-sm bg-light">
                                        <i class="bi bi-file-pdf display-6 text-danger mb-2"></i>
                                        <input type="file" name="file_akte" class="form-control form-control-sm" accept=".pdf" {{ isset($data) ? '' : 'required' }}>
                                        @if(isset($data->file_akte))
                                            <small class="text-success d-block mt-2"><i class="bi bi-check-circle"></i> Terupload</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold small">Ijazah / SKL</label>
                                    <div class="doc-upload border p-3 rounded-3 shadow-sm bg-light">
                                        <i class="bi bi-file-pdf display-6 text-danger mb-2"></i>
                                        <input type="file" name="file_ijazah" class="form-control form-control-sm" accept=".pdf">
                                        @if(isset($data->file_ijazah))
                                            <small class="text-success d-block mt-2"><i class="bi bi-check-circle"></i> Terupload</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5 opacity-25">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('home') }}" class="btn btn-light rounded-pill px-3">Batal</a>
                            <button type="submit" class="btn btn-success rounded-pill px-4 shadow-sm">
                                <i class="bi bi-send me-2"></i> {{ isset($data) ? 'Simpan Perubahan' : 'Kirim Formulir' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .section-icon {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }
    .bg-primary-subtle { background-color: rgba(13, 110, 253, 0.1); }
    .bg-success-subtle { background-color: rgba(25, 135, 84, 0.1); }
    .bg-warning-subtle { background-color: rgba(255, 193, 7, 0.1); }
    
    .info-card-green { border-left: 4px solid #198754; }
    .info-card-blue { border-left: 4px solid #0d6efd; }
    
    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid #dee2e6;
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
    }
    .form-control:focus, .form-select:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.1);
    }
    
    .doc-upload input {
        font-size: 0.7rem;
    }
</style>
@endsection

