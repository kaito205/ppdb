@extends('layouts.app')

@section('containt')
<section class="py-5 bg-light">
    <div class="container">
        <!-- Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="fw-bold text-blue display-4">Seluruh <span class="text-success">Fasilitas</span></h1>
            <div class="mx-auto mt-2" style="width: 80px; height: 4px; background-color: #ffd700; border-radius: 10px;"></div>
            <p class="lead text-muted mt-3">Menyediakan fasilitas terbaik untuk kenyamanan belajar dan perkembangan karakter siswa.</p>
        </div>

        <!-- Grid Fasilitas -->
        <div class="row g-3 g-md-4">
            @php
                $all_fasilitas = [
                    [
                        'nama' => 'Gedung Sekolah Utama',
                        'deskripsi' => 'Gedung tiga lantai dengan arsitektur modern dan lingkungan yang asri.',
                        'img' => 'hero1.webp'
                    ],
                    [
                        'nama' => 'Ruang Kelas Digital',
                        'deskripsi' => 'Setiap kelas dilengkapi dengan AC, Proyektor, dan Smart TV untuk menunjang pembelajaran interaktif.',
                        'img' => 'hero2.webp'
                    ],
                    [
                        'nama' => 'Laboratorium Komputer',
                        'deskripsi' => 'Fasilitas komputer terbaru dengan koneksi internet serat optik berkecepatan tinggi.',
                        'img' => 'hero.webp'
                    ],
                    [
                        'nama' => 'Asrama Putra & Putri',
                        'deskripsi' => 'Boarding school dengan fasilitas kamar yang bersih, ventilasi baik, dan penjagaan 24 jam.',
                        'img' => 'hero1.webp'
                    ],
                    [
                        'nama' => 'Perpustakaan & Lounge',
                        'deskripsi' => 'Koleksi buku lengkap mulai dari buku akademik hingga literatur umum.',
                        'img' => 'hero2.webp'
                    ],
                    [
                        'nama' => 'Gedung Serbaguna',
                        'deskripsi' => 'Pusat kegiatan spiritual dan pembinaan karakter islami siswa.',
                        'img' => 'hero.webp'
                    ]
                ];
            @endphp

            @foreach($all_fasilitas as $f)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 facility-full-card">
                    <div class="position-relative overflow-hidden card-img-wrapper">
                        <img src="{{ asset('img/' . $f['img']) }}" class="w-100 object-fit-cover" style="height: 200px;" alt="{{ $f['nama'] }}">
                        <div class="facility-tag bg-blue text-white px-3 py-1 rounded-pill extra-small position-absolute top-0 end-0 m-3 shadow-sm">
                            Unggulan
                        </div>
                    </div>
                    <div class="card-body p-3 p-md-4">
                        <h6 class="fw-bold text-blue mb-2 lh-base">{{ $f['nama'] }}</h6>
                        <p class="text-muted extra-small mb-0">{{ $f['deskripsi'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- CTA Section -->
        <div class="text-center mt-4 mt-md-5 pt-3 pt-md-5" data-aos="zoom-in">
            <div class="p-4 p-md-5 rounded-4 bg-blue text-white shadow-lg mx-1">
                <h4 class="fw-bold mb-3">Mari Kunjungi Langsung!</h4>
                <p class="mb-4 opacity-75 small">Ingin melihat lebih dekat fasilitas kami? Hubungi kami untuk jadwal tour sekolah.</p>
                <a href="{{ Request::is('/') ? '#kontak' : url('/#kontak') }}" class="btn btn-warning btn-md px-4 py-3 rounded-pill fw-bold shadow-sm w-mobile-100">Hubungi Kami <i class="bi bi-chat-dots-fill ms-2"></i></a>
            </div>
        </div>
    </div>
</section>

<style>
    .text-blue { color: #0e2e72; }
    .bg-blue { background-color: #0e2e72; }
    .facility-full-card {
        transition: all 0.4s ease;
    }
    .facility-full-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(14, 46, 114, 0.1) !important;
    }
    .facility-full-card img {
        transition: transform 0.6s ease;
    }
    .facility-full-card:hover img {
        transform: scale(1.1);
    }
    .facility-tag {
        font-weight: 500;
        z-index: 2;
    }
</style>
@endsection
