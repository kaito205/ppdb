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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid px-3 px-md-5">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="80" class="me-2">
                <span>SMA ERHA JATINAGARA</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ Request::is('/') ? '#hero' : url('/#hero') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Profile</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ Request::is('/') ? '#sekolah' : url('/#sekolah') }}">Sekolah</a></li>
                            <li><a class="dropdown-item" href="{{ Request::is('/') ? '#pesantren' : url('/#pesantren') }}">Pesantren</a></li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" href="{{ Request::is('/') ? '#kegiatan' : url('/#kegiatan') }}"> Kegiatan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" href="{{ Request::is('/') ? '#ppdb' : url('/#ppdb') }}"> Informasi
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" href="{{ Request::is('/') ? '#galeri' : url('/#galeri') }}">Galeri
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('kontak') ? 'active' : '' }}" href="{{ Request::is('/') ? '#kontak' : url('/#kontak') }}">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Lainnya</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ Request::is('/') ? '#berita' : url('/#berita') }}">Berita</a></li>
                            <li><a class="dropdown-item" href="#">Kegiatan</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Pengumuman</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-blue" href="{{ route('register') }}">Pendaftaran</a>
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
                <button type="submit" class="btn btn-success">Kirim Pesan</button>
            </form>
            <div class="map-container mt-5" data-aos="zoom-in" data-aos-delay="200">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.605554037798!2d108.41604447475952!3d-7.171512092833288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f4271aa8b0d0f%3A0xd708c8f48784f53e!2sSMA%20ERHA%20Jatinagara!5e0!3m2!1sid!2sid!4v1763284436981!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-5 mb-4">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo SMA ERHA" height="80" class="mb-3">
                    <h5>SMA ERHA JATINAGARA</h5>
                    <ul>
                        <li><i class="bi bi-geo-alt-fill me-2"></i> Kec. Jatinagara, Kab. Ciamis, Jawa Barat</li>
                        <li><i class="bi bi-telephone-fill me-2"></i> (0341) 2345678</li>
                        <li><i class="bi bi-envelope-fill me-2"></i> aryad@gmail.com</li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h5>Sosial Media Kami</h5>
                    <div class="icon-mds mt-3">
                        <a href="https://web.facebook.com/smaerhajatinagara"><img
                                src="{{ asset('img/icons8-facebook.gif') }}" alt="facebook" class="me-2"></a>
                        <a href="https://www.instagram.com/smaerhajatinagara/"><img
                                src="{{ asset('img/icons8-instagram.gif') }}" alt="instagram" class="me-2"></a>
                        <a href="#"><img src="{{ asset('img/icons8-whatsapp.gif') }}" alt="whatsapp" class="me-2"></a>
                        <a href="#"><img src="{{ asset('img/icons8-youtube.gif') }}" alt="youtube" class="me-2"></a>
                    </div>
                </div>
            </div>

            <div class="text-center ">
                <small>&copy; 2025 SMA ERHA JATINAGARA. software development by Eight.</small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true, // Animasi hanya sekali saat scroll
            duration: 800, // Durasi animasi
            offset: 100, // Offset trigger
        });
    </script>

    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
