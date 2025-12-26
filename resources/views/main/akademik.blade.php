@extends('layouts.app')

@section('containt')
<section class="akademik py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <!-- Header -->
        <div class="text-center mb-5">
            <h1 class="fw-bold text-blue display-4">Bidang <span class="text-success">Akademik</span></h1>
            <div class="mx-auto mt-2" style="width: 80px; height: 4px; background-color: #ffd700; border-radius: 10px;"></div>
            <p class="lead text-muted mt-3">Kurikulum Merdeka dan Standar Mutu Pendidikan SMA ERHA Jatinagara</p>
        </div>

        <div class="row g-4">
            <!-- Kurikulum -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-blue-light p-3 rounded-3 me-3">
                            <i class="bi bi-book-half fs-3 text-blue"></i>
                        </div>
                        <h3 class="fw-bold mb-0">Kurikulum Merdeka</h3>
                    </div>
                    <p class="text-muted">Kami menerapkan Kurikulum Merdeka yang memberikan keleluasaan kepada pendidik untuk menciptakan pembelajaran berkualitas yang sesuai dengan kebutuhan dan lingkungan belajar peserta didik.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Pembelajaran berbasis proyek (P5)</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Fokus pada materi esensial</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Pengembangan karakter sesuai Profil Pelajar Pancasila</li>
                    </ul>
                </div>
            </div>

            <!-- Program Unggulan -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-success-light p-3 rounded-3 me-3">
                            <i class="bi bi-star-fill fs-3 text-success"></i>
                        </div>
                        <h3 class="fw-bold mb-0">Program Unggulan</h3>
                    </div>
                    <p class="text-muted">Selain kurikulum nasional, kami memiliki program khusus untuk meningkatkan daya saing siswa di kancah nasional maupun internasional.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Bimbingan Intensif Masuk PTN</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> English Day & Arabic Day</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Literasi Digital & Coding Club</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Teachers & Staff Section -->
        <div class="mt-5 pt-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold text-blue h1">Tenaga <span class="text-success">Pendidik & Kependidikan</span></h2>
                <div class="mx-auto mt-2" style="width: 60px; height: 3px; background-color: #0e2e72; border-radius: 10px;"></div>
                <p class="text-muted mt-3">Dibimbing oleh tenaga pengajar profesional dan berdedikasi tinggi.</p>
            </div>

            <div class="row g-4">
                @php
                    $staff = [
                        [
                            'nama' => 'Dr. Mohamad Aip Maptuh',
                            'jabatan' => 'Ketua Yayasan',
                            'spesialis' => 'Pembina Yayasan',
                            'foto' => 'user.jpeg'
                        ],
                        [
                            'nama' => 'Ai Nuraeni, S.Pd',
                            'jabatan' => 'Kepala Sekolah',
                            'spesialis' => 'Manajemen Sekolah',
                            'foto' => 'user.jpeg'
                        ],
                        [
                            'nama' => 'Afif Ismail S',
                            'jabatan' => 'Ketua Komite',
                            'spesialis' => 'Hubungan Masyarakat',
                            'foto' => 'user.jpeg'
                        ],
                        [
                            'nama' => 'Edo Rosyada, S.Ag.',
                            'jabatan' => 'Bendahara',
                            'spesialis' => 'Keuangan & Administrasi',
                            'foto' => 'user.jpeg'
                        ],
                        [
                            'nama' => 'Wuri Hartini, S.Pd.I',
                            'jabatan' => 'Wakil Kepala Sekolah',
                            'spesialis' => 'Bimbingan Konseling',
                            'foto' => 'user.jpeg'
                        ],
                        [
                            'nama' => 'Della Puspita',
                            'jabatan' => 'Pembina Ekskul',
                            'spesialis' => 'Kesiswaan',
                            'foto' => 'user.jpeg'
                        ],
                        [
                            'nama' => 'Erjembari',
                            'jabatan' => 'Pembina OSIS',
                            'spesialis' => 'Organisasi Siswa',
                            'foto' => 'user.jpeg'
                        ],
                        [
                            'nama' => 'Iim Abdul Karim',
                            'jabatan' => 'Laboran Komputer',
                            'spesialis' => 'Teknologi Informasi',
                            'foto' => 'user.jpeg'
                        ],
                        [
                            'nama' => 'Reza Mulya Nugraha, S.Pd',
                            'jabatan' => 'Wali Kelas X',
                            'spesialis' => 'Guru Kelas',
                            'foto' => 'user.jpeg'
                        ],
                        [
                            'nama' => 'Nuraeni Hamidah, S.Pd',
                            'jabatan' => 'Wali Kelas XI',
                            'spesialis' => 'Guru Kelas',
                            'foto' => 'user.jpeg'
                        ],
                        [
                            'nama' => 'Irma Komala, S.Pd',
                            'jabatan' => 'Wali Kelas XII',
                            'spesialis' => 'Guru Kelas',
                            'foto' => 'user.jpeg'
                        ]
                    ];
                @endphp

                @foreach($staff as $s)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 staff-card">
                        <div class="d-flex align-items-center p-4">
                            <div class="staff-img-box me-3">
                                <img src="{{ asset('img/' . $s['foto']) }}" class="rounded-circle shadow-sm" alt="{{ $s['nama'] }}">
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-blue">{{ $s['nama'] }}</h6>
                                <p class="text-success small fw-bold mb-1">{{ $s['jabatan'] }}</p>
                                <span class="badge bg-light text-muted border fw-normal" style="font-size: 0.75rem;">{{ $s['spesialis'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    .text-blue { color: #0e2e72; }
    .bg-blue { background-color: #0e2e72; }
    .bg-blue-light { background-color: rgba(14, 46, 114, 0.1); }
    .bg-success-light { background-color: rgba(25, 135, 84, 0.1); }

    .staff-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.02) !important;
    }
    .staff-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(14, 46, 114, 0.1) !important;
        border-color: rgba(14, 46, 114, 0.1) !important;
    }
    .staff-img-box img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border: 3px solid #f8f9fa;
    }
</style>
@endsection
