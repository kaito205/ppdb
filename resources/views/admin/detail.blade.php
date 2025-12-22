@extends('layouts.admin')

@section('title', 'Detail Calon Siswa')

@section('containt')
<div class="container-fluid py-4">
    <!-- Breadcrumb & Header -->
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mb-1">
                        <li class="breadcrumb-item"><a href="{{ route('datasiswa') }}" class="text-decoration-none text-blue">Data Pendaftar</a></li>
                        <li class="breadcrumb-item active">Detail Profil</li>
                    </ol>
                </nav>
                <h3 class="fw-bold text-dark mb-0">Profil Lengkap Calon Siswa</h3>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('datasiswa') }}" class="btn btn-light rounded-pill px-4 shadow-sm border">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    @if($data)
    <div class="row g-4">
        <!-- Sidebar Profile Info -->
        <div class="col-lg-4 animate__animated animate__fadeInLeft">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                <div class="card-header bg-blue border-0 py-5"></div>
                <div class="card-body text-center pt-0" style="margin-top: -50px;">
                    <div class="position-relative d-inline-block mb-3">
                        <img src="{{ $data->foto ? asset('storage/' . $data->foto) : asset('img/user.jpeg') }}"
                            alt="Foto Siswa" class="rounded-circle border border-4 border-white shadow shadow-sm object-fit-cover" 
                            style="width: 120px; height: 120px; background-color: white;">
                        
                        <div class="position-absolute bottom-0 end-0 mb-1 me-1">
                            @if($data->status_seleksi == 'Lulus')
                                <span class="bg-success rounded-circle border border-2 border-white d-block" style="width: 20px; height: 20px;"></span>
                            @elseif($data->status_seleksi == 'Tidak Lulus')
                                <span class="bg-danger rounded-circle border border-2 border-white d-block" style="width: 20px; height: 20px;"></span>
                            @else
                                <span class="bg-warning rounded-circle border border-2 border-white d-block" style="width: 20px; height: 20px;"></span>
                            @endif
                        </div>
                    </div>
                    
                    <h5 class="fw-bold text-dark mb-1">{{ $data->nama }}</h5>
                    <p class="text-muted small mb-3">NISN: {{ $data->nisn ?? '-' }}</p>
                    
                    <div class="d-flex justify-content-center gap-2 mb-4">
                        @if($data->status_seleksi == 'Lulus')
                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 fw-bold">
                                <i class="bi bi-check-circle-fill me-1"></i> Terkonfirmasi
                            </span>
                        @elseif($data->status_seleksi == 'Tidak Lulus')
                            <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2 fw-bold">
                                <i class="bi bi-x-circle-fill me-1"></i> Ditolak
                            </span>
                        @else
                            <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-2 fw-bold">
                                <i class="bi bi-hourglass-split me-1"></i> Pending
                            </span>
                        @endif
                    </div>

                    <hr class="my-4 opacity-25">

                    <div class="text-start mb-4">
                        <h6 class="fw-bold small text-muted text-uppercase mb-3">Kontak Cepat</h6>
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light p-2 rounded-3 me-3">
                                <i class="bi bi-envelope text-blue"></i>
                            </div>
                            <div class="small text-truncate">
                                <div class="text-muted opacity-75">Email</div>
                                <div class="fw-bold text-dark">{{ $data->email ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="bg-light p-2 rounded-3 me-3">
                                <i class="bi bi-telephone text-blue"></i>
                            </div>
                            <div class="small">
                                <div class="text-muted opacity-75">No. WhatsApp</div>
                                <div class="fw-bold text-dark">{{ $data->no_hp ?? '-' }}</div>
                            </div>
                        </div>
                    </div>

                    @if($data->status_seleksi == 'Diproses')
                    <div class="d-grid gap-2">
                        <button class="btn btn-success rounded-pill fw-bold" data-bs-toggle="modal" data-bs-target="#modalTerima{{ $data->id }}">
                            <i class="bi bi-check-lg me-2"></i>Terima Siswa
                        </button>
                        <button class="btn btn-outline-danger rounded-pill fw-bold" data-bs-toggle="modal" data-bs-target="#modalTolak{{ $data->id }}">
                            <i class="bi bi-x-lg me-2"></i>Tolak Berkas
                        </button>
                    </div>
                    @endif
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-light border-start border-blue border-5">
                <h6 class="fw-bold text-blue mb-2"><i class="bi bi-info-circle-fill me-2"></i>Tips Validasi</h6>
                <p class="small text-muted mb-0">Pastikan NIK dan NISN sesuai dengan dokumen fisik yang diunggah sebelum mengubah status kelulusan.</p>
            </div>
        </div>

        <!-- Main Detail Content -->
        <div class="col-lg-8 animate__animated animate__fadeInRight">
            <!-- Biodata Siswa -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 py-3 px-4">
                    <h5 class="fw-bold text-dark mb-0"><i class="bi bi-person-vcard text-blue me-2"></i>Biodata Calon Siswa</h5>
                </div>
                <div class="card-body px-4 pb-4 pt-0">
                    <div class="row g-4">
                        <div class="col-md-6 border-bottom pb-3">
                            <small class="text-muted d-block mb-1">Nama Lengkap</small>
                            <span class="fw-bold text-dark fs-6">{{ $data->nama ?? '-' }}</span>
                        </div>
                        <div class="col-md-6 border-bottom pb-3">
                            <small class="text-muted d-block mb-1">NIK (Nomor Induk Kependudukan)</small>
                            <span class="fw-bold text-dark fs-6">{{ $data->nik ?? '-' }}</span>
                        </div>
                        <div class="col-md-6 border-bottom pb-3">
                            <small class="text-muted d-block mb-1">Tempat, Tanggal Lahir</small>
                            <span class="fw-bold text-dark fs-6">{{ $data->tempat_lahir ?? '-' }}, {{ $data->tanggal_lahir ?? '-' }}</span>
                        </div>
                        <div class="col-md-6 border-bottom pb-3">
                            <small class="text-muted d-block mb-1">Jenis Kelamin</small>
                            <span class="fw-bold text-dark fs-6">{{ $data->jenis_kelamin ?? '-' }}</span>
                        </div>
                        <div class="col-md-6 border-bottom pb-3">
                            <small class="text-muted d-block mb-1">Agama</small>
                            <span class="fw-bold text-dark fs-6">{{ $data->agama ?? '-' }}</span>
                        </div>
                        <div class="col-md-6 border-bottom pb-3">
                            <small class="text-muted d-block mb-1">Asal Sekolah</small>
                            <span class="fw-bold text-dark fs-6">{{ $data->asal_sekolah ?? '-' }} (Lulus: {{ $data->tahun_lulus ?? '-' }})</span>
                        </div>
                        <div class="col-12">
                            <small class="text-muted d-block mb-1">Alamat Tinggal Lengkap</small>
                            <span class="fw-bold text-dark fs-6">{{ $data->alamat ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Keluarga -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 py-3 px-4">
                    <h5 class="fw-bold text-dark mb-0"><i class="bi bi-people text-blue me-2"></i>Informasi Keluarga</h5>
                </div>
                <div class="card-body px-4 pb-4 pt-0">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-4">
                                <small class="text-muted d-block mb-1">Nama Ayah</small>
                                <span class="fw-bold text-dark">{{ $data->nama_ayah ?? '-' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-4">
                                <small class="text-muted d-block mb-1">Nama Ibu</small>
                                <span class="fw-bold text-dark">{{ $data->nama_ibu ?? '-' }}</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="p-3 bg-light rounded-4">
                                <small class="text-muted d-block mb-1">Nomor Kartu Keluarga (KK)</small>
                                <span class="fw-bold text-dark">{{ $data->no_kk ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Berkas Dokumen -->
            <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                <div class="card-header bg-white border-0 py-3 px-4">
                    <h5 class="fw-bold text-dark mb-0"><i class="bi bi-file-earmark-check text-blue me-2"></i>Dokumen Digital</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush border-top">
                        <div class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 text-primary p-2 rounded-3 me-3">
                                    <i class="bi bi-person-bounding-box fs-5"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark small">Scan Kartu Keluarga</div>
                                    <small class="text-muted">Wajib dilampirkan untuk verifikasi zonasi/alamat</small>
                                </div>
                            </div>
                            @if($data->file_kk)
                                <a href="{{ asset('storage/' . $data->file_kk) }}" target="_blank" class="btn btn-sm btn-blue rounded-pill px-3">Lihat Berkas</a>
                            @else
                                <span class="badge bg-light text-muted rounded-pill px-3 py-2 fw-normal italic">Belum diunggah</span>
                            @endif
                        </div>
                        
                        <div class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 text-primary p-2 rounded-3 me-3">
                                    <i class="bi bi-journal-text fs-5"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark small">Akte Kelahiran</div>
                                    <small class="text-muted">Penting untuk verifikasi usia calon pendaftar</small>
                                </div>
                            </div>
                            @if($data->file_akte)
                                <a href="{{ asset('storage/' . $data->file_akte) }}" target="_blank" class="btn btn-sm btn-blue rounded-pill px-3">Lihat Berkas</a>
                            @else
                                <span class="badge bg-light text-muted rounded-pill px-3 py-2 fw-normal italic">Belum diunggah</span>
                            @endif
                        </div>

                        <div class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center border-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 text-primary p-2 rounded-3 me-3">
                                    <i class="bi bi-mortarboard fs-5"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark small">Scan Ijazah Terakhir</div>
                                    <small class="text-muted">Bukti kelulusan dari jenjang sekolah sebelumnya</small>
                                </div>
                            </div>
                            @if($data->file_ijazah)
                                <a href="{{ asset('storage/' . $data->file_ijazah) }}" target="_blank" class="btn btn-sm btn-blue rounded-pill px-3">Lihat Berkas</a>
                            @else
                                <span class="badge bg-light text-muted rounded-pill px-3 py-2 fw-normal italic">Belum diunggah</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row animate__animated animate__headShake">
        <div class="col-md-6 mx-auto text-center py-5">
            <i class="bi bi-search display-1 opacity-25 d-block mb-3"></i>
            <h4 class="fw-bold">Data tidak ditemukan!</h4>
            <p class="text-muted">Maaf, data calon siswa yang Anda cari tidak tersedia dalam database kami.</p>
            <a href="{{ route('datasiswa') }}" class="btn btn-blue rounded-pill px-4 mt-3">Kembali ke Daftar</a>
        </div>
    </div>
    @endif
</div>

<!-- Re-using Modals from index if data exists -->
@if($data)
<!-- Modal Terima -->
<div class="modal fade" id="modalTerima{{ $data->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-success text-white border-0 py-3">
                <h5 class="modal-title fw-bold"><i class="bi bi-check-circle me-2"></i>Konfirmasi Penerimaan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.siswa.terima', $data->id) }}" method="POST">
                @csrf
                <div class="modal-body p-4 text-start">
                    <p class="text-muted">Konfirmasi penerimaan untuk <strong>{{ $data->nama }}</strong>. Siswa akan menerima email pemberitahuan.</p>
                    <div class="row g-3">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small text-muted text-uppercase">Tanggal Daftar Ulang</label>
                            <input type="date" class="form-control bg-light border-0 py-2" name="tanggal" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small text-muted text-uppercase">Jam</label>
                            <input type="time" class="form-control bg-light border-0 py-2" name="jam" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold small text-muted text-uppercase">Tempat</label>
                            <input type="text" class="form-control bg-light border-0 py-2" name="tempat" value="Kampus SMA ERHA" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success rounded-pill px-4 shadow-sm">Ya, Terima Siswa</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tolak -->
<div class="modal fade" id="modalTolak{{ $data->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-danger text-white border-0 py-3">
                <h5 class="modal-title fw-bold"><i class="bi bi-x-circle me-2"></i>Konfirmasi Penolakan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.siswa.tolak', $data->id) }}" method="POST">
                @csrf
                <div class="modal-body p-4 text-start">
                    <p class="text-muted">Apakah Anda yakin menolak pendaftaran <strong>{{ $data->nama }}</strong>?</p>
                    <div class="mb-0">
                        <label class="form-label fw-bold small text-muted text-uppercase">Alasan Penolakan</label>
                        <textarea class="form-control bg-light border-0" name="alasan" rows="3" required placeholder="Sebutkan alasan penolakan..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">Ya, Tolak Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<style>
    .bg-blue { background-color: #0e2e72 !important; }
    .text-blue { color: #0e2e72 !important; }
    .btn-blue { background-color: #0e2e72; color: white; border: none; }
    .btn-blue:hover { background-color: #0c2761; color: white; }
    .object-fit-cover { object-fit: cover; }
    .italic { font-style: italic; }
</style>
@endsection
