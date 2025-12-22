<section id="testimoni" class="py-5 bg-white overflow-hidden">
    <div class="container mb-5">
        <div class="text-center" data-aos="fade-up">
            <h2 class="fw-bold display-5">Jejak <span class="text-blue">Alumni</span></h2>
            <p class="text-muted">Kisah sukses dan inspirasi dari mereka yang pernah menimba ilmu di {{ $profil->nama_sekolah ?? 'SMA ERHA Jatinagara' }}.</p>
            <div class="mx-auto" style="width: 80px; height: 4px; background: #0e2e72; border-radius: 10px;"></div>
        </div>
    </div>

    <!-- Infinite Scroll Wrapper -->
    <div class="alumni-marquee-container">
        <div class="alumni-marquee">
            @php
                $alumni = [
                    [
                        'nama' => 'Muhammad Jaja Maulana',
                        'role' => 'Mahasiswa UIN Bandung',
                        'sub' => 'Ketua OSIS 2018',
                        'quote' => 'Senang rasanya bisa tumbuh dan berproses di sini. Pengalaman organisasi menjadi bekal utama saya di dunia perkuliahan.',
                        'foto' => 'user.jpeg'
                    ],
                    [
                        'nama' => 'Anita Rahmawati',
                        'role' => 'Staff Administrasi',
                        'sub' => 'PT. Telkom',
                        'quote' => 'Pondok ini mengajarkan saya kemandirian dan kedisiplinan yang sangat berguna di dunia kerja. Terima kasih para guru.',
                        'foto' => 'user.jpeg'
                    ],
                    [
                        'nama' => 'Ahmad Fauzan',
                        'role' => 'Entrepreneur',
                        'sub' => 'Owner Kopi Senja',
                        'quote' => 'Ilmu agama yang kuat menjadi pondasi saya dalam menjalani bisnis. Berkah selalu untuk sekolah ini.',
                        'foto' => 'user.jpeg'
                    ],
                    [
                        'nama' => 'Siti Aminah',
                        'role' => 'Mahasiswi LIPIA',
                        'sub' => 'Hafidzah 30 Juz',
                        'quote' => 'Lingkungan yang sangat kondusif untuk menghafal Al-Qur\'an. Sangat merekomendasikan sekolah ini untuk masa depan.',
                        'foto' => 'user.jpeg'
                    ]
                ];
                // Duplicate items for seamless loop
                $alumni_loop = array_merge($alumni, $alumni);
            @endphp

            @foreach($alumni_loop as $a)
            <div class="alumni-card-premium">
                <div class="card-inner p-4">
                    <div class="quote-icon mb-3">
                        <i class="bi bi-quote fs-1 text-blue opacity-25"></i>
                    </div>
                    <p class="quote-text mb-4">"{{ $a['quote'] }}"</p>
                    <div class="d-flex align-items-center mt-auto">
                        <div class="avatar-box me-3">
                            <img src="{{ asset('img/' . $a['foto']) }}" class="rounded-circle" alt="{{ $a['nama'] }}">
                        </div>
                        <div class="info-box">
                            <h6 class="fw-bold mb-0 text-blue">{{ $a['nama'] }}</h6>
                            <div class="role-text">
                                <span>{{ $a['role'] }}</span>
                                <span class="divider">•</span>
                                <span class="text-muted">{{ $a['sub'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .alumni-marquee-container {
        width: 100%;
        overflow: hidden;
        padding: 40px 0;
        background: radial-gradient(circle at center, rgba(14, 46, 114, 0.03) 0%, transparent 70%);
    }

    .alumni-marquee {
        display: flex;
        width: max-content;
        gap: 30px;
        animation: scroll-marquee 40s linear infinite;
    }

    .alumni-marquee:hover {
        animation-play-state: paused;
    }

    @keyframes scroll-marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(calc(-50% - 15px)); }
    }

    .alumni-card-premium {
        width: 400px;
        background: #fff;
        border-radius: 24px;
        border: 1px solid rgba(14, 46, 114, 0.08);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        transition: all 0.4s ease;
    }

    .alumni-card-premium:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 50px rgba(14, 46, 114, 0.1);
        border-color: rgba(14, 46, 114, 0.2);
    }

    .card-inner {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .quote-text {
        font-style: italic;
        color: #555;
        line-height: 1.7;
        font-size: 1.05rem;
    }

    .avatar-box img {
        width: 55px;
        height: 55px;
        object-fit: cover;
        border: 2px solid #fff;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .role-text {
        font-size: 0.85rem;
    }

    .role-text .divider {
        margin: 0 5px;
        color: #ddd;
    }

    @media (max-width: 768px) {
        .alumni-card-premium {
            width: 320px;
        }
        .alumni-marquee {
            animation-duration: 25s;
        }
    }
</style>

