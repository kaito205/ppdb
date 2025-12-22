@extends('layouts.admin')

@section('title', 'Tambah Prestasi')

@section('containt')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-1">
                    <li class="breadcrumb-item"><a href="{{ route('admin.prestasi') }}" class="text-decoration-none">Kelola Prestasi</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </nav>
            <h3 class="fw-bold text-dark">Lembaga Prestasi Baru</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden animate__animated animate__fadeInLeft">
                <div class="card-body p-4">
                    <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fw-bold small text-muted text-uppercase">Judul Prestasi</label>
                                    <input type="text" class="form-control bg-light border-0 py-2 @error('judul') is-invalid @enderror" 
                                        name="judul" value="{{ old('judul') }}" placeholder="Contoh: Juara 1 Lomba Matematika Nasional" required>
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fw-bold small text-muted text-uppercase">Nama Pemenang (Opsional)</label>
                                    <input type="text" class="form-control bg-light border-0 py-2 @error('pemenang') is-invalid @enderror" 
                                        name="pemenang" value="{{ old('pemenang') }}" placeholder="Contoh: Ahmad Fauzi / Tim Basket Putra">
                                    @error('pemenang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fw-bold small text-muted text-uppercase">Deskripsi Prestasi</label>
                                    <textarea class="form-control bg-light border-0 py-2 @error('deskripsi') is-invalid @enderror" 
                                        name="deskripsi" rows="4" placeholder="Jelaskan detail prestasi yang diraih..." required>{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-4 text-center">
                                    <label class="form-label d-block text-start fw-bold small text-muted text-uppercase">Foto Dokumentasi</label>
                                    <div class="image-upload-wrapper mb-3 text-center">
                                        <div id="imagePreview" class="rounded-4 overflow-hidden shadow-sm mx-auto" style="width: 100%; height: 250px; background: #f8f9fa; border: 2px dashed #dee2e6;">
                                            <div class="h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                                <i class="bi bi-trophy display-4 opacity-50 mb-2"></i>
                                                <p class="small mb-0">Klik 'Pilih File' untuk mengunggah foto</p>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" class="form-control bg-light border-0 py-2 @error('foto') is-invalid @enderror" 
                                        name="foto" id="fotoInput" accept="image/*">
                                    @error('foto')
                                        <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 pt-2">
                            <button type="submit" class="btn btn-blue px-4 rounded-pill shadow-sm">
                                <i class="bi bi-save me-2"></i>Simpan Prestasi
                            </button>
                            <a href="{{ route('admin.prestasi') }}" class="btn btn-light px-4 rounded-pill">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 ps-lg-4 d-none d-lg-block">
            <div class="card border-0 bg-blue-dark text-white rounded-4 p-4 shadow-sm animate__animated animate__fadeInRight">
                <h5 class="fw-bold mb-3"><i class="bi bi-lightbulb me-2"></i>Informasi Prestasi</h5>
                <p class="small opacity-75">Prestasi yang Anda tambahkan akan langsung muncul di halaman publik untuk meningkatkan reputasi sekolah.</p>
                <hr class="border-light opacity-25 my-4">
                <div class="small">
                    <p class="mb-2 fw-bold text-warning">Kriteria Foto:</p>
                    <ul class="ps-3 opacity-75">
                        <li class="mb-2">Gunakan foto saat prosesi pemberian penghargaan atau tim pemenang.</li>
                        <li class="mb-2">Rasio 16:9 sangat disarankan.</li>
                        <li class="mb-0">Format JPG/PNG/WEBP (Maks 2MB).</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-blue-dark { background-color: #0e2e72; }
    .btn-blue { background-color: #0e2e72; color: white; border: none; }
    .btn-blue:hover { background-color: #0c2761; color: white; }
</style>

@push('scripts')
<script>
    document.getElementById('fotoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const preview = document.getElementById('imagePreview');
                preview.style.border = "none";
                preview.innerHTML = `<img src="${event.target.result}" class="w-100 h-100" style="object-fit: cover;">`;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
