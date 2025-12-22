@extends('layouts.admin')

@section('title', 'Profil Saya')

@section('containt')
<div class="container-fluid py-4">
    <!-- Breadcrumb -->
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-1">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profil Saya</li>
                </ol>
            </nav>
            <h3 class="fw-bold text-dark mb-0">Pengaturan Profil</h3>
        </div>
    </div>

    <div class="row g-4 h-100">
        <!-- Profile Card -->
        <div class="col-lg-4 animate__animated animate__fadeInLeft">
            <div class="card border-0 shadow-sm rounded-4 text-center p-4 h-100">
                <div class="card-body">
                    <div class="position-relative d-inline-block mb-4">
                        <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('img/user.jpeg') }}" 
                             class="rounded-circle shadow-sm border border-4 border-white object-fit-cover" 
                             alt="Profile Picture" 
                             style="width: 150px; height: 150px; background-color: #f8f9fa;">
                        <span class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-2 border-white d-block" style="width: 20px; height: 20px;"></span>
                    </div>
                    
                    <h4 class="fw-bold text-dark mb-1">{{ $user->name }}</h4>
                    <p class="text-muted small mb-4 text-uppercase fw-bold letter-spacing-1">Administrator</p>
                    
                    <div class="d-grid gap-2 mb-4">
                        <button class="btn btn-outline-blue rounded-pill py-2" onclick="document.getElementById('foto_profil').click()">
                            <i class="bi bi-camera me-2"></i>Ganti Foto
                        </button>
                    </div>

                    <hr class="opacity-10 my-4">

                    <div class="text-start">
                        <label class="text-muted small text-uppercase mb-3 d-block fw-bold">Informasi Akun</label>
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light p-2 rounded-3 me-3">
                                <i class="bi bi-envelope text-blue"></i>
                            </div>
                            <div class="small text-truncate">
                                <div class="text-muted opacity-75">Email</div>
                                <div class="fw-bold text-dark">{{ $user->email }}</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="bg-light p-2 rounded-3 me-3">
                                <i class="bi bi-calendar-check text-blue"></i>
                            </div>
                            <div class="small">
                                <div class="text-muted opacity-75">Terdaftar Sejak</div>
                                <div class="fw-bold text-dark">{{ $user->created_at->format('d M Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="col-lg-8 animate__animated animate__fadeInRight">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-header bg-white border-0 py-3 px-4">
                    <h5 class="fw-bold text-blue mb-0"><i class="bi bi-person-gear me-2"></i>Ubah Detail Profil</h5>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success border-0 rounded-4 mb-4 py-3 animate__animated animate__slideInDown">
                            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Hidden File Input linked to button in sidebar -->
                        <input type="file" id="foto_profil" name="foto" class="d-none" onchange="this.form.submit()">

                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-bold small text-muted text-uppercase">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control bg-light border-0 py-2 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold small text-muted text-uppercase">Alamat Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control bg-light border-0 py-2 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 p-4 bg-light rounded-4">
                            <h6 class="fw-bold text-dark mb-3"><i class="bi bi-shield-lock me-2 text-blue"></i>Ubah Kata Sandi</h6>
                            <p class="small text-muted mb-4 text-start">Biarkan kosong jika Anda tidak ingin mengubah kata sandi Anda saat ini.</p>
                            
                            <div class="row g-3">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label fw-bold small text-muted text-uppercase">Password Baru</label>
                                    <input type="password" class="form-control border-0 py-2 shadow-sm @error('password') is-invalid @enderror" id="password" name="password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label fw-bold small text-muted text-uppercase">Konfirmasi Password</label>
                                    <input type="password" class="form-control border-0 py-2 shadow-sm" id="password_confirmation" name="password_confirmation">
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-end">
                            <button type="submit" class="btn btn-blue rounded-pill px-5 py-2 shadow-sm fw-bold">
                                <i class="bi bi-save me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-blue { background-color: #0e2e72 !important; }
    .text-blue { color: #0e2e72 !important; }
    .btn-blue { background-color: #0e2e72; color: white; border: none; }
    .btn-blue:hover { background-color: #0c2761; color: white; }
    .btn-outline-blue { border: 2px solid #0e2e72; color: #0e2e72; font-weight: bold; }
    .btn-outline-blue:hover { background-color: #0e2e72; color: white; }
    .letter-spacing-1 { letter-spacing: 1px; }
    .object-fit-cover { object-fit: cover; }
    
    .card { border: none; transition: transform 0.3s ease; }
    .stat-icon { width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; }
</style>
@endsection
