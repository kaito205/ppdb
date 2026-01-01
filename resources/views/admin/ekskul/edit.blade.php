@extends('layouts.admin')

@section('title', 'Edit Ekstrakurikuler')

@section('containt')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-1">
                    <li class="breadcrumb-item"><a href="{{ route('admin.ekskul') }}" class="text-decoration-none">Kelola Ekskul</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
            <h3 class="fw-bold text-dark">Edit Ekstrakurikuler</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden animate__animated animate__fadeInLeft">
                <div class="card-body p-4">
                    <form action="{{ route('admin.ekskul.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger border-0 rounded-4 mb-4">
                                <ul class="mb-0 small">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted text-uppercase">Nama Ekstrakurikuler</label>
                            <input type="text" class="form-control bg-light border-0 py-2 @error('nama') is-invalid @enderror" name="nama" 
                                value="{{ old('nama', $data->nama) }}" placeholder="Contoh: Basket, Pramuka..." required>
                            @error('nama')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4 text-center">
                            <label class="form-label d-block text-start fw-bold small text-muted text-uppercase">Foto Ekskul</label>
                            <div class="image-upload-wrapper mb-3">
                                <div id="imagePreview" class="rounded-4 overflow-hidden shadow-sm mx-auto" style="width: 100%; height: 200px; background: #f8f9fa;">
                                    @if($data->foto)
                                        <img src="{{ asset('uploads/ekskul/' . $data->foto) }}" class="w-100 h-100" style="object-fit: cover;">
                                    @else
                                        <div class="h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                            <i class="bi bi-image display-4 opacity-50 mb-2"></i>
                                            <p class="small mb-0">Belum ada foto</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <input type="file" class="form-control bg-light border-0 py-2 @error('foto') is-invalid @enderror" name="foto" id="fotoInput" accept="image/*">
                            @error('foto')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                            <div class="form-text mt-2 small text-muted italic text-start">Kosongkan jika tidak ingin mengganti foto.</div>
                        </div>

                        <div class="d-flex gap-2 pt-2">
                            <button type="submit" class="btn btn-warning px-4 rounded-pill fw-bold">
                                <i class="bi bi-save me-2"></i>Update Data
                            </button>
                            <a href="{{ route('admin.ekskul') }}" class="btn btn-light px-4 rounded-pill">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-5 ps-lg-4 d-none d-lg-block">
            <div class="card border-0 bg-blue-dark text-white rounded-4 p-4 shadow-sm animate__animated animate__fadeInRight">
                <h5 class="fw-bold mb-3"><i class="bi bi-info-circle me-2"></i>Status Data</h5>
                <p class="small opacity-75">Anda sedang mengedit data ekskul <strong>{{ $data->nama }}</strong>. Perubahan yang Anda simpan akan langsung diperbarui di halaman publik profil sekolah.</p>
                <hr class="border-light opacity-25 my-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-white bg-opacity-10 p-3 rounded-3">
                        <i class="bi bi-calendar-check fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold small">Terakhir Diperbarui</h6>
                        <small class="opacity-75 small">{{ $data->updated_at ? $data->updated_at->diffForHumans() : 'Baru saja' }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-blue-dark { background-color: #0e2e72; }
</style>

@push('scripts')
<script>
    document.getElementById('fotoInput').addEventListener('change', function(e) {
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
