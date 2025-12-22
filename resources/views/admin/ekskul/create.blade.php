@extends('layouts.admin')

@section('title', 'Tambah Ekstrakurikuler')

@section('containt')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-1">
                    <li class="breadcrumb-item"><a href="{{ route('admin.ekskul') }}" class="text-decoration-none">Kelola Ekskul</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </nav>
            <h3 class="fw-bold text-dark">Tambah Ekstrakurikuler Baru</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden animate__animated animate__fadeInLeft">
                <div class="card-body p-4">
                    <form action="{{ route('admin.ekskul.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted text-uppercase">Nama Ekstrakurikuler</label>
                            <input type="text" class="form-control bg-light border-0 py-2" name="nama" 
                                placeholder="Contoh: Basket, Pramuka, Paskibra..." required>
                        </div>

                        <div class="mb-4 text-center">
                            <label class="form-label d-block text-start fw-bold small text-muted text-uppercase">Foto / Ikon Ekskul</label>
                            <div class="image-upload-wrapper mb-3">
                                <div id="imagePreview" class="rounded-4 overflow-hidden shadow-sm mx-auto" style="width: 100%; height: 200px; background: #f8f9fa; border: 2px dashed #dee2e6;">
                                    <div class="h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                        <i class="bi bi-cloud-arrow-up display-4 opacity-50 mb-2"></i>
                                        <p class="small mb-0">Klik 'Pilih File' untuk mengunggah</p>
                                    </div>
                                </div>
                            </div>
                            <input type="file" class="form-control bg-light border-0 py-2" name="foto" id="fotoInput" accept="image/*">
                        </div>

                        <div class="d-flex gap-2 pt-2">
                            <button type="submit" class="btn btn-blue px-4 rounded-pill">
                                <i class="bi bi-save me-2"></i>Simpan Data
                            </button>
                            <a href="{{ route('admin.ekskul') }}" class="btn btn-light px-4 rounded-pill">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-5 ps-lg-4 d-none d-lg-block">
            <div class="card border-0 bg-blue-dark text-white rounded-4 p-4 shadow-sm animate__animated animate__fadeInRight">
                <h5 class="fw-bold mb-3"><i class="bi bi-info-circle me-2"></i>Panduan Input</h5>
                <ul class="list-unstyled opacity-75 small mb-0">
                    <li class="mb-3 d-flex gap-2">
                        <i class="bi bi-check2-circle text-warning"></i>
                        <span>Masukkan nama kegiatan yang jelas dan formal.</span>
                    </li>
                    <li class="mb-3 d-flex gap-2">
                        <i class="bi bi-check2-circle text-warning"></i>
                        <span>Pilih foto kegiatan asli dengan orientasi landscape (mendatar).</span>
                    </li>
                    <li class="mb-0 d-flex gap-2">
                        <i class="bi bi-check2-circle text-warning"></i>
                        <span>Pastikan ukuran foto tidak melebihi 2MB untuk menjaga performa website.</span>
                    </li>
                </ul>
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
