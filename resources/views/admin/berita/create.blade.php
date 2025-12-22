@extends('layouts.admin')

@section('title', 'Tulis Berita Baru')

@section('containt')
<div class="container-fluid py-4">
    <!-- Breadcrumb -->
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-1">
                    <li class="breadcrumb-item"><a href="{{ route('berita.index') }}" class="text-decoration-none">Kelola Berita</a></li>
                    <li class="breadcrumb-item active">Tulis Baru</li>
                </ol>
            </nav>
            <h3 class="fw-bold text-dark">Buat Informasi Baru</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden animate__animated animate__fadeInLeft">
                <div class="card-body p-4">
                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted text-uppercase">Judul Berita</label>
                            <input type="text" name="judul" class="form-control bg-light border-0 py-2 @error('judul') is-invalid @enderror" 
                                placeholder="Masukkan judul berita yang menarik..." value="{{ old('judul') }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted text-uppercase">Konten / Isi Berita</label>
                            <textarea name="isi" rows="10" class="form-control bg-light border-0 py-2 @error('isi') is-invalid @enderror" 
                                placeholder="Tuliskan isi berita secara lengkap di sini..." required>{{ old('isi') }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted text-uppercase">Gambar Sampul</label>
                            <div class="image-upload-wrapper mb-3 text-center">
                                <div id="imagePreview" class="rounded-4 overflow-hidden shadow-sm mx-auto border-2 border-dashed d-flex align-items-center justify-content-center bg-light" style="width: 100%; height: 300px; border-color: #dee2e6;">
                                    <div class="text-muted text-center p-4">
                                        <i class="bi bi-cloud-arrow-up display-3 opacity-50 mb-2"></i>
                                        <p class="small mb-0">Klik tombol di bawah untuk memilih gambar sampul</p>
                                    </div>
                                </div>
                            </div>
                            <input type="file" name="gambar" id="imageInput" class="form-control bg-light border-0 py-2 @error('gambar') is-invalid @enderror" accept="image/*">
                            <div class="form-text small text-muted mt-2 italic">Format: JPG, PNG, WEBP. Ukuran rekomendasi 1200x800 pixel (Maks 2MB).</div>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 pt-3">
                            <button type="submit" class="btn btn-blue px-5 rounded-pill shadow-sm">
                                <i class="bi bi-send me-2"></i>Publikasikan Berita
                            </button>
                            <a href="{{ route('berita.index') }}" class="btn btn-light px-4 rounded-pill">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 ps-lg-4 d-none d-lg-block">
            <div class="card border-0 bg-blue-dark text-white rounded-4 p-4 shadow-sm animate__animated animate__fadeInRight mb-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-lightbulb me-2"></i>Tips Menulis</h5>
                <ul class="small opacity-75 ps-3 mb-0">
                    <li class="mb-2">Gunakan judul yang singkat namun menggambarkan isi berita.</li>
                    <li class="mb-2">Berikan paragraf pembuka yang kuat untuk menarik minat baca.</li>
                    <li class="mb-2">Pastikan gambar sampul memiliki kualitas tinggi dan relevan.</li>
                    <li class="mb-0">Periksa kembali typo sebelum mempublikasikan.</li>
                </ul>
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-4 animate__animated animate__fadeInRight" style="animation-delay: 0.1s;">
                <h6 class="fw-bold text-dark mb-3">Status Konten</h6>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="bg-light p-3 rounded-3 text-primary">
                        <i class="bi bi-eye"></i>
                    </div>
                    <div>
                        <div class="small text-muted">Visibility</div>
                        <div class="fw-bold">Public (Publik)</div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-light p-3 rounded-3 text-success">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div>
                        <div class="small text-muted">Author</div>
                        <div class="fw-bold">{{ Auth::user()->name }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-blue-dark { background-color: #0e2e72; }
    .btn-blue { background-color: #0e2e72; color: white; border: none; }
    .btn-blue:hover { background-color: #0c2761; color: white; }
    .border-dashed { border-style: dashed !important; }
</style>

@push('scripts')
<script>
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const preview = document.getElementById('imagePreview');
                preview.classList.remove('bg-light');
                preview.classList.remove('border-dashed');
                preview.innerHTML = `<img src="${event.target.result}" class="w-100 h-100" style="object-fit: cover;">`;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
