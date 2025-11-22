@extends('layouts.app')

@section('containt')
<section id="hero" class="py-0">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3500">

        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('img/hero2.jpeg') }}" class="d-block w-100 hero-img">
                <div class="hero-overlay"></div>
                <div class="carousel-caption hero-content">
                    <h3 class="fw-bold">Selamat Datang di <span class="text-success">SMA ERHA JATINAGARA</span></h3>
                    <p>Sekolah yang berkomitmen membentuk generasi berprestasi, berkarakter, dan berakhlakul karimah.
                    </p>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('img/hero1.jpeg') }}" class="d-block w-100 hero-img">
                <div class="hero-overlay"></div>
                <div class="carousel-caption hero-content">
                    <h3 class="fw-bold">Pendidikan Unggul & Berkarakter</h3>
                    <p>Membentuk generasi cerdas dan berakhlak mulia.</p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('img/hero.jpeg') }}" class="d-block w-100 hero-img">
                <div class="hero-overlay"></div>
                <div class="carousel-caption hero-content">
                    <h3 class="fw-bold">Bersama Raih Prestasi</h3>
                    <p>Tempat belajar, berkembang, dan berprestasi.</p>
                </div>
            </div>

        </div>

    </div>
</section>

<section id="sekolah" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Profil Sekolah</h2>
                <p class="text-muted">SMA ERHA Jatinagara.</p>
                <div class="divider mx-auto"
                    style="width: 80px; height: 4px; background-color: #ffc107; border-radius: 5px;"></div>
            </div>
            <!-- TEKS KIRI -->
            <div class="col-md-6 mb-4">
                <p>
                    SMA ERHA Jatinagara adalah lembaga pendidikan yang berkomitmen
                    untuk mencetak generasi berakhlak, berprestasi, serta memiliki
                    keterampilan abad 21. Dengan lingkungan belajar yang nyaman serta
                    tenaga pendidik profesional, kami terus berkembang untuk menjadi
                    sekolah unggulan di wilayah Jatinagara.
                </p>
                <p>
                    Kami menyediakan fasilitas yang lengkap dan program unggulan
                    yang mendukung perkembangan potensi siswa baik akademik maupun non-akademik.
                </p>
            </div>

            <!-- FOTO KANAN -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('img/hero1.jpeg') }}" alt="Profil Sekolah" class="img-fluid rounded shadow">
            </div>

        </div>
    </div>
</section>

<section class="pesantren py-5 bg-light mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('img/hero2.jpeg') }}" alt="Sekolah Berbasis Pesantren"
                    class="img-fluid rounded shadow-sm d-block mx-auto">
            </div>
            <div class="col-md-6">
                <h3 class="font-weight-bold mb-3 mt-4">SEKOLAH BERBASIS <span class="text-success">PESANTREN</span></h3>
                <p class="lead">
                    SMA ERHA JATINAGARA mengusung konsep pendidikan terpadu antara <strong>ilmu pengetahuan
                        umum</strong>
                    dan <strong>pendidikan pesantren</strong>. Setiap siswa tidak hanya dibimbing untuk unggul dalam
                    akademik,
                    tetapi juga diarahkan agar memiliki akhlak mulia, disiplin, serta kemampuan spiritual yang kuat.
                </p>
                <p>
                    Melalui program <strong>Kitab Kuning</strong> dan <strong>Tahfiz Al-Qur’an</strong>, sekolah ini
                    membentuk generasi yang cerdas, berakhlak, dan berkarakter. Kegiatan harian santri disusun agar
                    seimbang antara belajar formal, mengaji, dan kegiatan pengembangan diri.
                </p>
                <a href="/tentang" class="btn btn-blue mt-3">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </div>
</section>

{{-- ====== VISI & MISI ====== --}}
<section id="visimisi" class="visi-misi py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">VISI & <span class="text-success">MISI</span></h2>
            <hr class="w-25 mx-auto border-success">
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4 class="fw-bold text-success">VISI :</h4>
                <p class="fs-5 fst-italic">
                    “Mewujudkan Lulusan Yang Unggul, Berprestasi di bidang Keagamaan dan Berakhlakul
                    Karimah”
                </p>

                <h4 class="fw-bold text-success mt-4">MISI :</h4>
                <ul class="fs-5">
                    <li>Meningkatkan kemampuan tenaga pendidik dan kependidikan melalui TIK yang berkesinambungan dan
                        pelatihan membaca Al-Quran.</li>
                    <li>Pembiasaan kegiatan keagamaan untuk membangun karakter dan disiplin.</li>
                    <li>Mengintegrasikan pembiasaan dan pengembangan intelektual, kreativitas dan akhlak (IQ, EQ, SQ).
                    </li>
                    <li>Mengembangkan kecakapan hidup (life skill) yang disesuaikan dengan kebutuhan.</li>
                    <li>Melaksanakan kegiatan belajar mengajar secara efektif dan efisien.</li>
                    <li>Menciptakan suasana pembelajaran yang kondusif, menunjukkan sikap profesionalisme dan
                        keteladanan.</li>
                    <li>Menyelenggarakan program ekstrakurikuler bagi seluruh warga sekolah sesuai minat dan bakat.</li>
                    <li>Menjalin hubungan yang harmonis dengan seluruh stakeholder.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="kenapa-erha" class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <h2 class="fw-bold"><span class="text-success">Kenapa di</span> SMA ERHA JATINAGARA </h2>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="fasilitas">
                    <div class="description">
                        <h5 class="mt-4">Fasilitas Lengkap</h5>
                        <p>SMA ERHA JATINAGARA memiliki sarana dan prasarana lengkap yang mendukung kegiatan belajar
                            mengajar, termasuk laboratorium komputer, ruang multimedia, dan asrama santri yang nyaman.
                        </p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/school.png') }}" alt="fasilitas" class="img-fluid d-block mx-auto"
                            style="max-height: 300px;">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="fasilitas">
                    <div class="description icon-left">
                        <h5 class="mt-4">Guru Profesional</h5>
                        <p>Tenaga pengajar terdiri dari guru profesional dan ustadz yang berpengalaman dalam bidang
                            akademik maupun keagamaan.</p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/people.png') }}" alt="guru" class="img-fluid d-block mx-auto"
                            style="max-height: 300px;">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="fasilitas">
                    <div class="description">
                        <h5 class="mt-4">Pembelajaran Efektif</h5>
                        <p>Penerapan metode belajar modern berbasis teknologi dan pendekatan personal untuk setiap
                            siswa,
                            agar potensi mereka berkembang maksimal.</p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/blackboard.png') }}" alt="belajar" class="img-fluid d-block mx-auto"
                            style="max-height: 300px;">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="fasilitas">
                    <div class="description icon-left">
                        <h5 class="mt-4">Lingkungan Religius</h5>
                        <p>Kegiatan keagamaan menjadi rutinitas harian untuk membentuk karakter dan kedisiplinan siswa,
                            sehingga berakhlakul karimah.</p>
                    </div>
                    <div class="icon-des">
                        <img src="{{ asset('img/secure-shield.png') }}" alt="religi" class="img-fluid d-block mx-auto"
                            style="max-height: 300px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="program-unggulan" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Program <span class="text-success">Unggulan</span></h2>
            <p class="text-muted">Program terbaik yang menjadi ciri khas SMA ERHA Jatinagara</p>
            <div style="width:80px;height:4px;background:#0d6efd;margin:0 auto;border-radius:10px;"></div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 bg-white shadow rounded-4 h-100 text-center">
                    <div class="icon mb-3">
                        <i class="bi bi-book-half" style="font-size:48px;color:#198754;"></i>
                    </div>
                    <h5 class="fw-bold">Program Tahfidz</h5>
                    <p class="text-muted">Pembinaan tahfidz Al-Qur’an terstruktur untuk membentuk generasi Qur’ani.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white shadow rounded-4 h-100 text-center">
                    <div class="icon mb-3">
                        <i class="bi bi-translate" style="font-size:48px;color:#0d6efd;"></i>
                    </div>
                    <h5 class="fw-bold">English & Arabic Day</h5>
                    <p class="text-muted">Pembiasaan berbahasa Inggris dan Arab untuk meningkatkan kemampuan komunikasi.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white shadow rounded-4 h-100 text-center">
                    <div class="icon mb-3">
                        <i class="bi bi-trophy-fill" style="font-size:48px;color:#ffc107;"></i>
                    </div>
                    <h5 class="fw-bold">Pembinaan Prestasi</h5>
                    <p class="text-muted">Program khusus pembinaan lomba akademik maupun non-akademik tingkat daerah
                        hingga nasional.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="prestasi" class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Prestasi Siswa & <span class="text-success">Sekolah</span></h2>
            <p class="text-muted">Beberapa pencapaian membanggakan dari siswa dan guru SMA ERHA Jatinagara</p>
            <div style="width:80px;height:4px;background:#dc3545;margin:0 auto;border-radius:10px;"></div>
        </div>

        <div class="row g-4">

            <!-- Prestasi 1 -->
            <div class="col-md-4">
                <div class="prestasi-card shadow">
                    <img src="{{ asset('img/prestasi.jpg') }}" alt="Prestasi MTQ">
                    <div class="overlay">
                        <div>
                            <h5 class="fw-bold prestasi-text">Juara 1 OLIMPIADE SAINS SISWA SIGMA TINGKAT PROVINSI</h5>
                            <p class="prestasi-text">Diraih oleh:<br><strong>Azzahra Putri</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prestasi 2 -->
            <div class="col-md-4">
                <div class="prestasi-card shadow">
                    <img src="{{ asset('img/prestasi3.jpg') }}" alt="Olimpiade Matematika">
                    <div class="overlay">
                        <div>
                            <h5 class="fw-bold prestasi-text">PERAIH MENDALI EMAS QUARTA ISLAMIC OLIMPIADE BAHASA ARAB
                                TINGKAT NASIONAL</h5>
                            <p class="prestasi-text">Diraih oleh:<br><strong>Rizky Ramdani</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prestasi 3 -->
            <div class="col-md-4">
                <div class="prestasi-card shadow">
                    <img src="{{ asset('img/prestasi2.jpg') }}" alt="Prestasi Literasi">
                    <div class="overlay">
                        <div>
                            <h5 class="fw-bold prestasi-text">PENULIS TERPILIH CIPTA PUISI (LCPN28) TINGKAT NASIONAL</h5>
                            <p class="prestasi-text">Diraih oleh:<br><strong>Rizky Ramdani</strong></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ====== KEGIATAN ====== --}}
<section id="kegiatan" class="ekstrakurikuler py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">KEGIATAN <span class="text-success">EKSTRAKURIKULER</span></h2>
            <hr class="w-25 mx-auto border-success">
            <p class="text-muted">Beragam kegiatan untuk mengembangkan minat, bakat, dan karakter siswa.</p>
        </div>

        <div class="row g-4">
            @foreach ($ekskul as $item)
            <div class="col-md-3 col-sm-6">
                <div class="ekskul-card shadow-sm">
                    <img src="/uploads/ekskul/{{ $item->foto }}" alt="{{ $item->nama }}">
                    <div class="overlay"><span>{{ $item->nama }}</span></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<section id="ppdb" class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Informasi PPDB</h2>
            <p class="text-muted">Penerimaan Peserta Didik Baru Tahun 2025/2026</p>
            <div style="width:80px;height:4px;background:#198754;margin:0 auto;border-radius:10px;"></div>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="p-4 bg-white shadow rounded-4 h-100">
                    <h5 class="fw-bold">Syarat Pendaftaran</h5>
                    <ul class="text-muted">
                        <li>Fotokopi Ijazah / SKL</li>
                        <li>Fotokopi KK & Akta Kelahiran</li>
                        <li>Pas Foto 3×4 (2 lembar)</li>
                        <li>Mengisi formulir pendaftaran</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white shadow rounded-4 h-100">
                    <h5 class="fw-bold">Alur Pendaftaran</h5>
                    <ol class="text-muted">
                        <li>Isi formulir online / datang ke sekolah</li>
                        <li>Verifikasi berkas</li>
                        <li>Wawancara calon siswa & orang tua</li>
                        <li>Pengumuman kelulusan</li>
                    </ol>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white shadow rounded-4 h-100">
                    <h5 class="fw-bold">Jadwal Pendaftaran</h5>
                    <p class="text-muted mb-1">Gelombang 1: Jan – Maret 2025</p>
                    <p class="text-muted mb-1">Gelombang 2: April – Juni 2025</p>
                    <p class="text-muted">Pendaftaran dibuka setiap hari kerja.</p>
                    <a href="#" class="btn btn-success w-100 mt-2 rounded-pill">Daftar Sekarang</a>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="bg-blue-statistik py-5">
    <div class="container">
        <h3 class="text-white text-center mb-4 fw-bold">STATISTIK PENDAFTARAN</h3>
        <p class="text-center text-light mb-5">
            Data pendaftaran siswa baru tahun ajaran <strong>2024/2025</strong>.
        </p>
        <div class="row justify-content-center">
            <div class="col-md-3 text-center mb-4">
                <i class="bi bi-people-fill fs-1 text-white mb-3"></i>
                <h3 class="text-white fw-bold display-6 counter" data-target="293">0</h3>
                <p class="text-light">TOTAL PENDAFTAR</p>
            </div>
            <div class="col-md-3 text-center mb-4">
                <i class="bi bi-people-fill fs-1 text-white mb-3"></i>
                <h3 class="text-white fw-bold display-6 counter" data-target="193">0</h3>
                <p class="text-light">LAKI-LAKI</p>
            </div>
            <div class="col-md-3 text-center mb-4">
                <i class="bi bi-people-fill fs-1 text-white mb-3"></i>
                <h3 class="text-white fw-bold display-6 counter" data-target="100">0</h3>
                <p class="text-light">PEREMPUAN</p>
            </div>
        </div>
    </div>
</section>

{{-- ====== GALERI SEKOLAH ====== --}}
<section id="galeri" class="galeri py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">GALERI <span class="text-success">SEKOLAH</span></h2>
            <hr class="w-25 mx-auto border-success">
            <p class="text-muted">Momen-momen kegiatan di SMA ERHA JATINAGARA</p>
        </div>

        <!-- WRAPPER AUTO SCROLL -->
        <div class="galeri-wrapper">
            <div class="galeri-scroll">

                <div class="galeri-item position-relative overflow-hidden rounded shadow-sm">
                    <img src="{{ asset('img/head1.jpg') }}" class="img-fluid" alt="Kegiatan 1">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <span class="text-white fw-bold">Upacara Bendera</span>
                    </div>
                </div>

                <div class="galeri-item position-relative overflow-hidden rounded shadow-sm">
                    <img src="{{ asset('img/head2.jpg') }}" class="img-fluid" alt="Kegiatan 2">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <span class="text-white fw-bold">Belajar di Kelas</span>
                    </div>
                </div>

                <div class="galeri-item position-relative overflow-hidden rounded shadow-sm">
                    <img src="{{ asset('img/head3.jpg') }}" class="img-fluid" alt="Kegiatan 3">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <span class="text-white fw-bold">Kegiatan Tahfidz</span>
                    </div>
                </div>

                <div class="galeri-item position-relative overflow-hidden rounded shadow-sm">
                    <img src="{{ asset('img/head3.jpg') }}" class="img-fluid" alt="Kegiatan 4">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <span class="text-white fw-bold">Ekstrakurikuler Pramuka</span>
                    </div>
                </div>

                <div class="galeri-item position-relative overflow-hidden rounded shadow-sm">
                    <img src="{{ asset('img/head2.jpg') }}" class="img-fluid" alt="Kegiatan 5">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <span class="text-white fw-bold">Kegiatan Olahraga</span>
                    </div>
                </div>

                <div class="galeri-item position-relative overflow-hidden rounded shadow-sm">
                    <img src="{{ asset('img/head1.jpg') }}" class="img-fluid" alt="Kegiatan 6">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <span class="text-white fw-bold">Pelatihan Kepemimpinan</span>
                    </div>
                </div>

            </div>
        </div>
        <!-- END WRAPPER -->
    </div>
</section>


<section class="berita py-5">
    <div class="container">
        <h1 class="text-center font-weight-bold mb-3 fw-bold">Artikel & <span class='text-success'>Berita</span> </h1>
        <p class="text-center mt-3">
            Kami menyediakan berbagai artikel dan berita yang dapat memberikan informasi terkini tentang Ponpes Riyadlul
            Hidayah Al-Munawarah.
        </p>

        <!-- START: Horizontal Scroll -->
        <div class="berita-scroll mt-5">

            <div class="berita-item">
                <div class="card shadow-sm berita-card h-100">
                    <img src="{{ asset('img/head1.jpg') }}" class="card-img-top berita-img" alt="Berita 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Berita</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-blue">Lihat Berita</a>
                    </div>
                </div>
            </div>
            <div class="berita-item">
                <div class="card shadow-sm berita-card h-100">
                    <img src="{{ asset('img/head1.jpg') }}" class="card-img-top berita-img" alt="Berita 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Berita</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-blue">Lihat Berita</a>
                    </div>
                </div>
            </div>
            <div class="berita-item">
                <div class="card shadow-sm berita-card h-100">
                    <img src="{{ asset('img/head1.jpg') }}" class="card-img-top berita-img" alt="Berita 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Berita</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-blue">Lihat Berita</a>
                    </div>
                </div>
            </div>

            <div class="berita-item">
                <div class="card shadow-sm berita-card h-100">
                    <img src="{{ asset('img/head2.jpg') }}" class="card-img-top berita-img" alt="Berita 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Berita</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-blue">Lihat Berita</a>
                    </div>
                </div>
            </div>

            <div class="berita-item">
                <div class="card shadow-sm berita-card h-100">
                    <img src="{{ asset('img/head2.jpg') }}" class="card-img-top berita-img" alt="Berita 3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Berita</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-blue">Lihat Berita</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- END: Horizontal Scroll -->
    </div>
</section>

<section class="alumni">
    <div class="container">
        <h3 class="text-center font-weight-bold mb-3">
            Apa kata alumni?
        </h3>
        <p class="text-center mb-4">
            Beberapa testimoni dari para alumni yangtelah merasakan manfaat dengan mondok di pesantren Riyadlul Hidayah
            Al-munawarah
        </p>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <img src="{{ asset('img/pp.jpg') }}" alt="cobaa"
                            class="img-fluid rounded-circle mx-auto d-block mb-3" style="width: 120px; height: 120px;">

                        <p class="text-center">
                            "Senang rasanya bisa tumbuh dan berproses di SMA ERHA JATINAGARA. Pengalaman akademik dan
                            kehidupan berorganisasi saya dapat cikal balnya disana."
                        </p>

                        <p class="font-weight-bold text-center mb-0">Muhammad Jaja Maulana</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <img src="{{ asset('img/user.jpeg') }}" alt="cobaa"
                            class="img-fluid rounded-circle mx-auto d-block mb-3" style="width: 120px; height: 120px;">

                        <p class="text-center">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic soluta, voluptates esse
                            repellendus numquam rerum, tempora vitae, nesciunt laborum sapiente quaerat iusto. Veritatis
                            enim placeat quae cumque, qui quidem esse.
                        </p>

                        <p class="font-weight-bold text-center mb-0">Kaito</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <img src="{{ asset('img/dida.jpg') }}" alt="cobaa"
                            class="img-fluid rounded-circle mx-auto d-block mb-3" style="width: 120px; height: 120px;">

                        <p class="text-center">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic soluta, voluptates esse
                            repellendus numquam rerum, tempora vitae, nesciunt laborum sapiente quaerat iusto. Veritatis
                            enim placeat quae cumque, qui quidem esse.
                        </p>

                        <p class="font-weight-bold text-center mb-0">Dida Nurwahidah Zakiyah</p>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
