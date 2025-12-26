<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMA ERHA Jatinagara</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}" sizes="32x32" type="image/png">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon & Font -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="{{ Request::is('/') ? 'is-home' : '' }}">


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid px-3 px-md-5">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('img/logo.webp') }}" alt="Logo" width="80" class="me-2">
                <span>SMA ERHA JATINAGARA</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    
                    <!-- Profil Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('profil') ? 'active' : '' }}" href="#" id="navbarProfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm rounded-3" aria-labelledby="navbarProfil">
                            <li><a class="dropdown-item" href="{{ route('profil') }}">Tentang Sekolah</a></li>
                            <li><a class="dropdown-item" href="{{ route('profil') }}#visimisi">Visi Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('fasilitas') }}">Fasilitas</a></li>
                        </ul>
                    </li>

                    <!-- Akademik Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('akademik') ? 'active' : '' }}" href="#" id="navbarAkademik" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Akademik
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm rounded-3" aria-labelledby="navbarAkademik">
                            <li><a class="dropdown-item" href="{{ route('akademik') }}">Kurikulum</a></li>
                            <li><a class="dropdown-item" href="{{ route('akademik') }}">Guru & Staf</a></li>
                        </ul>
                    </li>

                    <!-- Kesiswaan Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('ekskul') || request()->is('prestasi') ? 'active' : '' }}" href="#" id="navbarKesiswaan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kesiswaan
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm rounded-3" aria-labelledby="navbarKesiswaan">
                            <li><a class="dropdown-item" href="{{ route('ekskul') }}">Ekstrakurikuler</a></li>
                            <li><a class="dropdown-item" href="{{ route('prestasi') }}">Prestasi</a></li>
                        </ul>
                    </li>

                    <!-- PPDB Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('informasi-ppdb') ? 'active' : '' }}" href="#" id="navbarPPDB" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            PPDB
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm rounded-3" aria-labelledby="navbarPPDB">
                            <li><a class="dropdown-item" href="{{ route('ppdb.info') }}#alur">Alur Pendaftaran</a></li>
                            <li><a class="dropdown-item" href="{{ route('ppdb.info') }}#biaya">Biaya</a></li>
                            <li><a class="dropdown-item" href="{{ route('ppdb.info') }}#jadwal">Jadwal</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('berita*') ? 'active' : '' }}" href="{{ route('berita.list') }}">Berita</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('galeri') ? 'active' : '' }}" href="{{ route('galeri') }}">Galeri</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ Request::is('/') ? '#kontak' : url('/#kontak') }}">Kontak</a>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-blue px-4 shadow-sm" href="{{ route('register') }}">Daftar Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <main class="container">
        @yield('containt')
    </main>


    <section id="kontak" class="kontak bg-light">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">KONTAK <span class="text-success">KAMI</span></h2>
                <hr class="w-25 mx-auto border-success">
                <p class="text-muted">Hubungi kami untuk informasi lebih lanjut tentang SMA ERHA Jatinagara</p>
            </div>
            <form action="{{ route('contact.store') }}" method="POST" data-aos="fade-up" data-aos-delay="100">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap Anda" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea class="form-control" id="message" name="message" rows="4"
                        placeholder="Tulis pesan Anda di sini" required></textarea>
                </div>
                <button type="submit" class="btn btn-blue">Kirim Pesan</button>
            </form>
            <div class="map-container mt-5" data-aos="zoom-in" data-aos-delay="200">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.605554037798!2d108.41604447475952!3d-7.171512092833288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f4271aa8b0d0f%3A0xd708c8f48784f53e!2sSMA%20ERHA%20Jatinagara!5e0!3m2!1sid!2sid!4v1763284436981!5m2!1sid!2sid"
                    width="100%" height="350" style="border:0; border-radius: 15px;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <!-- Footer -->
    <footer class="footer py-5 mt-5">
        <div class="container">
            <div class="row g-5">
                <!-- Identitas Sekolah -->
                <div class="col-12 col-lg-5 text-start">
                    <div class="footer-logo mb-4">
                        <img src="{{ asset('img/logo.webp') }}" alt="Logo SMA ERHA" height="70" class="mb-3 rounded-circle">
                        <h5 class="fw-bold text-white mb-0">SMA ERHA JATINAGARA</h5>
                        <small class="text-accent">Unggul dalam Prestasi, Santun dalam Budi</small>
                    </div>
                    <p class="text-gray mb-4">
                        Membentuk generasi unggul, berkarakter, dan berdaya saing global melalui pendidikan berkualitas berbasis kurikulum nasional dan nilai-nilai luhur.
                    </p>
                    <div class="social-links d-flex gap-2 justify-content-start">
                        <a href="https://web.facebook.com/smaerhajatinagara" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/smaerhajatinagara/" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="https://wa.me/6281394060612" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.youtube.com/@smaerhajatinagara" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Tautan Cepat (Hidden on Mobile) -->
                <div class="col-lg-3 d-none d-lg-block text-start">
                    <h5 class="fw-bold text-white mb-4">Tautan Cepat</h5>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('profil') }}">Profil Sekolah</a></li>
                        <li><a href="{{ route('akademik') }}">Akademik</a></li>
                        <li><a href="{{ route('ekskul') }}">Ekstrakurikuler</a></li>
                        <li><a href="{{ route('ppdb.info') }}">Informasi PPDB</a></li>
                    </ul>
                </div>

                <!-- Hubungi Kami -->
                <div class="col-12 col-lg-4 text-start">
                    <h5 class="fw-bold text-white mb-4 position-relative pb-2">
                        Hubungi Kami
                        <span class="position-absolute start-0 bottom-0 bg-accent" style="width: 40px; height: 2px;"></span>
                    </h5>
                    <ul class="footer-contact list-unstyled px-0">
                        <li class="d-flex align-items-start gap-3 mb-4">
                            <div class="contact-icon-box shadow-sm red-shadow">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="text-white fw-bold mb-1" style="font-size: 0.9rem;">Alamat</h6>
                                <span class="text-gray small d-block text-start" style="line-height: 1.5;">Dusun Kulon, Desa Jatinagara, Kec. Jatinagara, Kab. Ciamis, Jawa Barat</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3 mb-4">
                            <div class="contact-icon-box shadow-sm">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div class="flex-grow-1 text-start">
                                <h6 class="text-white fw-bold mb-1" style="font-size: 0.9rem;">Telepon</h6>
                                <a href="tel:+62-81394060612" class="text-gray small text-decoration-none transition-all hover-accent d-block text-start">+62-81394060612</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3">
                            <div class="contact-icon-box shadow-sm">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div class="flex-grow-1 text-start">
                                <h6 class="text-white fw-bold mb-1" style="font-size: 0.9rem;">Email</h6>
                                <a href="mailto:erhajatinagarasma@gmail.com" class="text-gray small text-decoration-none transition-all hover-accent d-block text-start">erhajatinagarasma@gmail.com</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="footer-bottom mt-5 pt-4 border-top border-secondary border-opacity-25 text-center">
                <p class="text-gray small mb-0">
                    &copy; {{ date('Y') }} <strong>SMA ERHA JATINAGARA</strong>. 
                </p>
            </div>
        </div>
    </footer>

    <style>
        .footer {
            background-color: #3C3D37;
            color: #b0b0b0;
        }
        .text-accent { color: #ffd700 !important; }
        .bg-accent { background-color: #ffd700 !important; }
        .text-gray { color: #b0b0b0; }
        .footer-links li { margin-bottom: 12px; }
        .footer-links a {
            color: #b0b0b0;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        .footer-links a:hover {
            color: #ffd700;
            padding-left: 8px;
        }

        /* Contact Section Styling */
        .contact-icon-box {
            width: 35px;
            height: 35px;
            background: rgba(255, 215, 0, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffd700;
            flex-shrink: 0;
            font-size: 1.1rem;
        }
        .hover-accent:hover {
            color: #ffd700 !important;
        }
        .transition-all {
            transition: all 0.3s ease;
        }

        .social-icon {
            width: 38px;
            height: 38px;
            background: rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .social-icon:hover {
            background: #ffd700;
            color: #1a1a1a;
            transform: translateY(-3px);
            border-color: #ffd700;
        }
        .footer-logo img {
            width: 70px;
            height: auto;
        }
    </style>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
            offset: 100,
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    </script>




</body>

</html>
