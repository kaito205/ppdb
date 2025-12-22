@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('containt')
<div class="container-fluid py-4">
    <!-- Breadcrumb -->
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-1">
                    <li class="breadcrumb-item"><a href="{{ route('berita.index') }}" class="text-decoration-none">Kelola Berita</a></li>
                    <li class="breadcrumb-item active">Edit Berita</li>
                </ol>
            </nav>
            <h3 class="fw-bold text-dark">Perbarui Informasi</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden animate__animated animate__fadeInLeft">
                <div class="card-body p-4">
                    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted text-uppercase">Judul Berita</label>
                            <input type="text" name="judul" class="form-control bg-light border-0 py-2 @error('judul') is-invalid @enderror" 
                                placeholder="Edit judul berita..." value="{{ old('judul', $berita->judul) }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted text-uppercase">Konten / Isi Berita</label>
                            <textarea name="isi" rows="12" class="form-control bg-light border-0 py-2 @error('isi') is-invalid @enderror" 
                                placeholder="Perbarui isi berita..." required>{{ old('isi', $berita->isi) }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4 text-center">
                            <label class="form-label d-block text-start fw-bold small text-muted text-uppercase">Gambar Sampul</label>
                            <div class="image-upload-wrapper mb-3">
                                <div id="imagePreview" class="rounded-4 overflow-hidden shadow-sm mx-auto border" style="width: 100%; height: 350px;">
                                    @if($berita->gambar)
                                        <img src="{{ asset('uploads/berita/'.$berita->gambar) }}" class="w-100 h-100" style="object-fit: cover;">
                                    @else
                                        <div class="h-100 d-flex flex-column align-items-center justify-content-center bg-light text-muted">
                                            <i class="bi bi-image display-4 opacity-50 mb-2"></i>
                                            <p class="small mb-0">Belum ada gambar sampul</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <input type="file" name="gambar" id="imageInput" class="form-control bg-light border-0 py-2 @error('gambar') is-invalid @enderror" accept="image/*">
                            <div class="form-text small text-muted mt-2 text-start italic">Kosongkan jika tidak ingin mengganti gambar sampul.</div>
                            @error('gambar')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 pt-3">
                            <button type="submit" class="btn btn-warning px-5 rounded-pill fw-bold shadow-sm">
                                <i class="bi bi-save me-2"></i>Simpan Perubahan
                            </button>
                            <a href="{{ route('berita.index') }}" class="btn btn-light px-4 rounded-pill">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 ps-lg-4 d-none d-lg-block">
            <div class="card border-0 bg-blue-dark text-white rounded-4 p-4 shadow-sm animate__animated animate__fadeInRight mb-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-info-circle me-2"></i>Status Publikasi</h5>
                <p class="small opacity-75">Perubahan yang Anda simpan akan langsung diperbarui pada halaman berita utama sekolah.</p>
                <hr class="border-light opacity-25 my-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-white bg-opacity-10 p-3 rounded-3 text-center" style="width: 60px;">
                        <i class="bi bi-clock-history fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold small">Terakhir Update</h6>
                        <small class="opacity-75 small">{{ $berita->updated_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-4 animate__animated animate__fadeInRight" style="animation-delay: 0.1s;">
                <h6 class="fw-bold text-dark mb-3">Statistik Berita</h6>
                <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                    <span class="small text-muted">Karakter Judul</span>
                    <span class="small fw-bold">{{ strlen($berita->judul) }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="small text-muted">Total Kata Konten</span>
                    <span class="small fw-bold">{{ str_word_count(strip_tags($berita->isi)) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-blue-dark { background-color: #0e2e72; }
    .btn-warning { background-color: #ffc107; color: #000; border: none; }
    .btn-warning:hover { background-color: #e0ac00; color: #000; }
</style>

@push('scripts')
<script>
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const preview = document.getElementById('imagePreview');
                preview.innerHTML = `<img src="${event.target.result}" class="w-100 h-100" style="object-fit: cover;">`;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
