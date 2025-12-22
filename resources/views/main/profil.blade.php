@extends('layouts.app')

@section('containt')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up">
                <!-- Header -->
                <div class="text-center">
                    <h1 class="fw-bold text-blue display-4">Profil <span class="text-success">Sekolah</span></h1>
                    <div class="mx-auto mt-2" style="width: 80px; height: 4px; background-color: #ffd700; border-radius: 10px;"></div>
                    <p class="lead text-muted mt-3">Mengenal lebih dekat {{ $profil->nama_sekolah ?? 'SMA ERHA Jatinagara' }}</p>
                </div>

                <!-- Gambar Utama -->
                <div class="rounded-4 overflow-hidden mb-5 shadow-sm" data-aos="zoom-in">
                    <img src="{{ asset('uploads/profil/' . ($profil->foto ?? 'default.jpg')) }}" class="w-100" style="max-height: 500px; object-fit: cover;" alt="Gedung Sekolah">
                </div>

                <div class="row g-4">
                    <!-- Deskripsi & Sejarah -->
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm rounded-4 mb-4" id="tentang">
                            <div class="card-body p-4 p-lg-5">
                                <h2 class="fw-bold mb-4 text-blue">Tentang Sekolah</h2>
                                <div class="text-muted" style="line-height: 1.8; text-align: justify;">
                                    <p>{{ $profil->deskripsi ?? 'SMA ERHA JATINAGARA adalah lembaga pendidikan yang berkomitmen mencetak generasi unggul, berakhlak mulia, dan berwawasan global. Kami memadukan kurikulum nasional dengan nilai-nilai karakter untuk membentuk siswa yang tangguh dan kompeten di bidangnya.' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Pendidikan Berbasis Pesantren (Merged Content) -->
                        <div class="card border-0 shadow-sm rounded-4 mb-4 bg-white">
                            <div class="card-body p-4 p-lg-5">
                                <h2 class="fw-bold mb-4 text-blue">Pendidikan Berbasis Pesantren</h2>
                                <p class="text-muted mb-4" style="text-align: justify;">
                                    Mengkombinasikan keunggulan akademik dengan kedalaman ilmu agama dalam lingkungan <i>boarding school</i> yang nyaman dan modern.
                                </p>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-start mb-3">
                                            <div class="bg-blue-light p-2 rounded-3 me-3">
                                                <i class="bi bi-book text-blue"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-1 text-blue">Tahfidz Al-Qur'an</h6>
                                                <small class="text-muted">Program intensif menghafal Al-Qur'an dengan metode efektif.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-start mb-3">
                                            <div class="bg-success-light p-2 rounded-3 me-3">
                                                <i class="bi bi-translate text-success"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-1 text-blue">Bahasa Asing</h6>
                                                <small class="text-muted">Penerapan Bahasa Arab & Inggris dalam harian.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-start mb-3">
                                            <div class="bg-warning-light p-2 rounded-3 me-3">
                                                <i class="bi bi-journal-text text-warning"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-1 text-blue">Kitab Kuning</h6>
                                                <small class="text-muted">Melestarikan tradisi keilmuan Islam klasik.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-start mb-3">
                                            <div class="bg-info-light p-2 rounded-3 me-3">
                                                <i class="bi bi-house-door text-info"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-1 text-blue">Asrama Kondusif</h6>
                                                <small class="text-muted">Fasilitas bersih & diawasi musyrif/ah.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Visi & Misi -->
                        <div class="card border-0 shadow-sm rounded-4 mb-4" id="visimisi">
                            <div class="card-body p-4 p-lg-5">
                                <h2 class="fw-bold mb-4 text-success">Visi & Misi</h2>
                                
                                <h5 class="fw-bold text-blue">Visi:</h5>
                                <p class="text-muted mb-4">{{ $profil->visi ?? 'Terwujudnya generasi yang unggul dalam prestasi, santun dalam budi, dan bertakwa kepada Tuhan Yang Maha Esa.' }}</p>

                                <h5 class="fw-bold text-blue">Misi:</h5>
                                <ul class="text-muted">
                                    @php
                                        $misiItems = explode("\n", $profil->misi ?? "Meningkatkan kualitas pembelajaran.\nMengembangkan bakat dan minat siswa.\nMenanamkan nilai-nilai karakter bangsa.");
                                    @endphp
                                    @foreach($misiItems as $item)
                                        @if(trim($item))
                                            <li class="mb-2">{{ trim($item) }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Fasilitas (Anchor Target) -->
                        <div id="fasilitas"></div>
                    </div>

                    <!-- Sidebar info -->
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 mb-4 bg-blue text-white">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3">Kontak Sekolah</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="bi bi-geo-alt-fill me-2 mt-1 text-accent"></i>
                                        <span>Dusun Kulon, Desa Jatinagara, Kec. Jatinagara, Kab. Ciamis, Jawa Barat</span>
                                    </li>
                                    <li class="mb-3 d-flex align-items-center">
                                        <i class="bi bi-telephone-fill me-2 text-accent"></i>
                                        <span>08123456789</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-envelope-fill me-2 text-accent"></i>
                                        <span>erha.jatina</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3 text-blue">Media Sosial</h5>
                                <div class="d-flex gap-3">
                                    <a href="#" class="social-btn"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="social-btn"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="social-btn"><i class="bi bi-youtube"></i></a>
                                    <a href="#" class="social-btn"><i class="bi bi-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Card Kenapa Mondok merged to sidebar/under -->
                        <div class="card border-0 shadow-sm rounded-4 bg-success text-white">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3">Kenapa Harus Mondok?</h5>
                                <ul class="list-unstyled small mb-0">
                                    <li class="mb-2"><i class="bi bi-check2-circle me-2"></i> Pembinaan ibadah 24 jam</li>
                                    <li class="mb-2"><i class="bi bi-check2-circle me-2"></i> Lingkungan terjaga</li>
                                    <li class="mb-2"><i class="bi bi-check2-circle me-2"></i> Program kemandirian</li>
                                    <li><i class="bi bi-check2-circle me-2"></i> Fokus belajar optimal</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .text-blue { color: #0e2e72; }
    .bg-blue { background-color: #0e2e72; }
    .bg-blue-light { background-color: rgba(14, 46, 114, 0.1); }
    .bg-success-light { background-color: rgba(25, 135, 84, 0.1); }
    .bg-warning-light { background-color: rgba(255, 193, 7, 0.1); }
    .bg-info-light { background-color: rgba(13, 202, 240, 0.1); }
    .text-accent { color: #ffd700; }
    .social-btn {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        color: #0e2e72;
        border-radius: 50%;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .social-btn:hover {
        background: #0e2e72;
        color: white;
        transform: translateY(-3px);
    }
    .blockquote-custom {
        border-left: 5px solid #ffd700;
        transition: transform 0.3s ease;
    }
    .blockquote-custom:hover {
        transform: translateY(-5px);
    }
    .italic-text {
        font-style: italic;
        font-family: 'Georgia', serif;
    }
    .text-uppercase { text-transform: uppercase; }
</style>
@endsection
