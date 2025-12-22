@extends('layouts.admin')

@section('title', 'Kelola Profil Sekolah')

@section('containt')
<div class="container-fluid py-4">
    <!-- Header Page -->
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mb-1">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profil Sekolah</li>
                    </ol>
                </nav>
                <h3 class="fw-bold text-dark">Pengaturan Profil Sekolah</h3>
                <p class="text-muted small mb-0">Kelola informasi publik, visi, misi, dan identitas visual sekolah.</p>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 animate__animated animate__fadeInDown" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                <div>
                    <h6 class="mb-0 fw-bold">Berhasil!</h6>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-4">
            <!-- Left Side: Basic Info & Content -->
            <div class="col-lg-8 animate__animated animate__fadeInLeft">
                <!-- General Info Card -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h6 class="fw-bold text-blue mb-0"><i class="bi bi-info-circle me-2"></i>Informasi Umum</h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted text-uppercase">Nama Sekolah</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-building"></i></span>
                                <input type="text" name="nama_sekolah" class="form-control bg-light border-0 py-2" 
                                    placeholder="Masukkan Nama Sekolah" value="{{ $profil->nama_sekolah ?? '' }}" required>
                            </div>
                        </div>

                        <div class="mb-0">
                            <label class="form-label fw-bold small text-muted text-uppercase">Deskripsi Singkat Sekolah</label>
                            <textarea name="deskripsi" class="form-control bg-light border-0" rows="6" 
                                placeholder="Jelaskan sejarah atau profil singkat sekolah..." required>{{ $profil->deskripsi ?? '' }}</textarea>
                            <div class="form-text mt-2 small text-muted italic">Informasi ini akan muncul di halaman 'Tentang Kami'.</div>
                        </div>
                    </div>
                </div>

                <!-- Vision & Mission Card -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h6 class="fw-bold text-blue mb-0"><i class="bi bi-bullseye me-2"></i>Visi & Misi</h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted text-uppercase">Visi Sekolah</label>
                            <textarea name="visi" class="form-control bg-light border-0" rows="3" 
                                placeholder="Masukkan visi sekolah..." required>{{ $profil->visi ?? '' }}</textarea>
                        </div>
                        <div class="mb-0">
                            <label class="form-label fw-bold small text-muted text-uppercase">Misi Sekolah</label>
                            <textarea name="misi" class="form-control bg-light border-0" rows="6" 
                                placeholder="Masukkan poin-poin misi sekolah..." required>{{ $profil->misi ?? '' }}</textarea>
                            <div class="form-text mt-2 small text-muted italic">Tips: Gunakan penomoran atau bullet points jika diperlukan.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Media & Actions -->
            <div class="col-lg-4 animate__animated animate__fadeInRight">
                <!-- Visual Identity Card -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h6 class="fw-bold text-blue mb-0"><i class="bi bi-image me-2"></i>Identitas Visual</h6>
                    </div>
                    <div class="card-body p-4 text-center">
                        <div class="profile-image-preview mb-4 position-relative d-inline-block">
                            <div id="imagePreview" class="rounded-4 overflow-hidden shadow-sm" style="width: 100%; height: 220px; background: #f8f9fa;">
                                @if (!empty($profil->foto))
                                    <img src="{{ asset('uploads/profil/' . $profil->foto) }}" class="w-100 h-100 object-fit-cover">
                                @else
                                    <div class="h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                        <i class="bi bi-images display-1 opacity-25 mb-2"></i>
                                        <p class="small mb-0">Belum ada foto</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold small text-muted text-uppercase">Ganti Foto Profil/Sampul</label>
                            <input type="file" name="foto" id="fotoInput" class="form-control bg-light border-0 py-2" accept="image/*">
                            <div class="form-text mt-1 small text-muted">Format: JPG, PNG, WEBP. Maks 2MB.</div>
                        </div>
                    </div>
                </div>

                <!-- Save Action Card -->
                <div class="card border-0 shadow-sm rounded-4 bg-blue-dark text-white">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3">Simpan Perubahan?</h6>
                        <p class="small opacity-75 mb-4">Pastikan semua data yang diinput sudah benar sebelum menekan tombol simpan.</p>
                        <button type="submit" class="btn btn-warning w-100 py-3 rounded-pill fw-bold shadow-sm">
                            <i class="bi bi-save me-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </div>

                <!-- Guidance Info -->
                <div class="mt-4 p-3 bg-info-soft rounded-4 border-0">
                    <div class="d-flex gap-3">
                        <i class="bi bi-lightbulb text-info fs-4"></i>
                        <div>
                            <h6 class="fw-bold text-info small mb-1">Tips Kelola Profil</h6>
                            <p class="text-muted small mb-0 mt-2">Gunakan foto asli kegiatan sekolah dengan resolusi tinggi agar website terlihat lebih profesional dan terpercaya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .bg-blue-dark { background-color: #0e2e72; }
    .bg-info-soft { background-color: rgba(13, 202, 240, 0.1); }
    .text-blue { color: #0e2e72; }
    .object-fit-cover { object-fit: cover; }
    
    .form-control:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(14, 46, 114, 0.1);
        border-color: #0e2e72;
    }
    
    .breadcrumb-item + .breadcrumb-item::before {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E");
    }

    #imagePreview {
        transition: all 0.3s ease;
    }
</style>

@push('scripts')
<script>
    document.getElementById('fotoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const preview = document.getElementById('imagePreview');
                preview.innerHTML = `<img src="${event.target.result}" class="w-100 h-100 object-fit-cover">`;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
