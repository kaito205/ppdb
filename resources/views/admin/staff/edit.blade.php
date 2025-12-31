@extends('layouts.admin')

@section('title', 'Edit Staff')

@section('containt')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-1">
                    <li class="breadcrumb-item"><a href="{{ route('admin.staff') }}" class="text-decoration-none">Kelola Staff</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
            <h3 class="fw-bold text-dark">Edit Data Staff</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden animate__animated animate__fadeInLeft">
                <div class="card-body p-4">
                    <form action="{{ route('admin.staff.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST') {{-- Optional if update route is slightly different or usually POST is fine in Laravel routes --}}

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold small text-muted text-uppercase">Nama Lengkap</label>
                                <input type="text" class="form-control bg-light border-0 py-2" name="nama" 
                                    value="{{ $data->nama }}" placeholder="Contoh: Dr. Budi Santoso, M.Pd" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold small text-muted text-uppercase">Jabatan</label>
                                <input type="text" class="form-control bg-light border-0 py-2" name="jabatan" 
                                    value="{{ $data->jabatan }}" placeholder="Contoh: Kepala Sekolah" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class="form-label fw-bold small text-muted text-uppercase">Spesialis</label>
                                <input type="text" class="form-control bg-light border-0 py-2" name="spesialis" 
                                    value="{{ $data->spesialis }}" placeholder="Contoh: Kurikulum Merdeka, Matematika">
                            </div>
                        </div>

                        <div class="mb-4 text-center">
                            <label class="form-label d-block text-start fw-bold small text-muted text-uppercase">Foto Profil</label>
                            <div class="image-upload-wrapper mb-3">
                                <div id="imagePreview" class="rounded-circle overflow-hidden shadow-sm mx-auto" style="width: 150px; height: 150px; background: #f8f9fa;">
                                    @if($data->foto)
                                        <img src="{{ asset('uploads/staff/' . $data->foto) }}" class="w-100 h-100" style="object-fit: cover;">
                                    @else
                                        <div class="h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                            <i class="bi bi-person display-4 opacity-50 mb-2"></i>
                                            <p class="small mb-0">No Photo</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <input type="file" class="form-control bg-light border-0 py-2 mx-auto" style="max-width: 300px;" name="foto" id="fotoInput" accept="image/*">
                            <div class="form-text mt-2 small text-muted italic">Kosongkan jika tidak ingin mengganti foto.</div>
                        </div>

                        <div class="d-flex gap-2 pt-2 justify-content-end">
                            <a href="{{ route('admin.staff') }}" class="btn btn-light px-4 rounded-pill">Batal</a>
                            <button type="submit" class="btn btn-warning px-4 rounded-pill fw-bold">
                                <i class="bi bi-save me-2"></i>Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 ps-lg-4 d-none d-lg-block">
            <div class="card border-0 bg-blue-dark text-white rounded-4 p-4 shadow-sm animate__animated animate__fadeInRight">
                <h5 class="fw-bold mb-3"><i class="bi bi-info-circle me-2"></i>Status Data</h5>
                <p class="small opacity-75">Anda sedang mengedit data staff <strong>{{ $data->nama }}</strong>.</p>
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
