@extends('layouts.app')

@section('containt')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up">
                
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil Pesantren</li>
                    </ol>
                </nav>

                <!-- Header -->
                <div class="text-center mb-5">
                    <h1 class="fw-bold text-gradient display-4">Profil Pesantren Riyadlul Hidayah</h1>
                    <p class="lead text-muted">Membangun Generasi Berakhlakul Karimah dan Berilmu</p>
                </div>

                <!-- Sejarah -->
                <div class="card border-0 shadow-sm rounded-4 mb-5" data-aos="fade-up">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="fw-bold mb-4 text-primary"><i class="bi bi-clock-history me-2"></i>Sejarah Berdirinya</h2>
                        <div class="text-secondary" style="line-height: 1.8; text-align: justify;">
                            <p>Pondok Pesantren Riyadlul Hidayah tidak terlepas dari keberadaan lembaga induknya, yaitu Yayasan Riyadlul Hidayah Al-Munawwarah. Pesantren Riyadlul Hidayah berada di Dusun Kulon, Desa Jatinagara, Kecamatan Jatinagara, Kabupaten Ciamis sekitar 30 km dari kota Ciamis. berada pada jalur Rancah-Rajadesa-Jatinagara-Ciamis. Yayasan ini mewadahi beberapa lembaga selain pesantren yaitu Diniyah Takmiliyah Awaliyah (DTA), Pendidikan Anak Usia Dini (PAUD), Raudlatul Athfal (RA), dan MTs Terpadu Riyadlul Hidayah Al-Munawwarah.</p>
                            <p>Pondok Pesantren Riyadlul Hidayah secara resmi didirikan pada tahun 1989 M. oleh KH. Eman Sulaeman, dan terdaftar di Departemen Agama pada tahun 2004. Pembentukan Pondok Pesantren Riyadlul Hidayah dilatarbelakangi oleh kondisi di wilayah tersebut yang pada waktu itu akidah masyarakatnya sudah ruksak dan jauh sekali dari ajaran-ajaran syariat Islam.</p>
                            <p>Pesantren ini didirikan dengan tujuan ingin meluruskan akidah yang pada saat itu sudah ruksak, karena dulu secara letak geografis masyarakat jauh dari pemahaman agama Islam, masyarakatnya didominasi oleh pemahaman seni yang tidak baik seperti ronggeng, bahkan pada saat itu sedang didirikan gereja yang sampai saat ini bangunan gerejanyapun masih ada. Namun alhamdulillah dengan perjuangan dan izin Allah swt. masjid lebih awal didirikan, maka selanjutnya semakin hari semakin berkembang hingga dibangunlah pesantren Riyadlul Hidayah yang sampai sekarang ini masih eksis berkembang dilanjutkan oleh putera-puterinya.</p>
                            <p>Sekarang yang menjadi pimpinan umum pesantren yaitu KH. Afif Ismail Sulaeman bin KH. Eman Sulaeman yang merupakan putera bungsu dari pendiri pesantran Riyadlul Hidayah.</p>
                        </div>
                    </div>
                </div>

                <!-- Identitas Lembaga -->
                <div class="card border-0 shadow-sm rounded-4 mb-5" data-aos="fade-up">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="fw-bold mb-4 text-success"><i class="bi bi-card-checklist me-2"></i>Identitas Lembaga</h2>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th width="30%">Nama Lembaga</th>
                                        <td>: Pondok Pesantren Riyadlul Hidayah Jatinagara</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Piagam</th>
                                        <td>: Kd.10.07/2/VI/PPS/050/2004</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Statistik</th>
                                        <td>: 512320927319</td>
                                    </tr>
                                    <tr>
                                        <th>Notaris Yayasan</th>
                                        <td>: Heri Hendriana, SH. MH. Tanggal 24/11/2011</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor</th>
                                        <td>: 161</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>: RT. 01/01, Desa Jatinagara, Kec. Jatinagara, Kab. Ciamis, Jawa Barat 46273</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Fasilitas -->
                <div class="card border-0 shadow-sm rounded-4 mb-5" data-aos="fade-up">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="fw-bold mb-4 text-info"><i class="bi bi-building me-2"></i>Fasilitas</h2>
                        <p class="text-secondary">Status kepemilikan sarana dan prasarana Pondok Pesantren Riyadlul Hidayah adalah milik pribadi. Fasilitas yang tersedia meliputi:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Masjid</li>
                            <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Asrama Putera dan Puteri</li>
                            <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Kamar Mandi</li>
                            <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Kantor Pesantren</li>
                            <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Tempat Pembelajaran Berlantai Dua</li>
                            <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Perpustakaan</li>
                            <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Sarana Olahraga</li>
                        </ul>
                    </div>
                </div>

                <!-- Struktur Organisasi -->
                <div class="card border-0 shadow-sm rounded-4 mb-5" data-aos="fade-up">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="fw-bold mb-4 text-warning"><i class="bi bi-people me-2"></i>Struktur Organisasi</h2>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="p-3 border rounded-3 bg-light h-100">
                                    <h6 class="fw-bold text-muted mb-2">Mustasyar</h6>
                                    <p class="mb-0 fw-bold">Hj. Munawwaroh</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 border rounded-3 bg-light h-100">
                                    <h6 class="fw-bold text-muted mb-2">Ketua Yayasan</h6>
                                    <p class="mb-0 fw-bold">KH. DR. Mohamad A. Maftuh, S.Ag., M.Pd</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 border rounded-3 bg-light h-100">
                                    <h6 class="fw-bold text-muted mb-2">Pimpinan Pondok</h6>
                                    <p class="mb-0 fw-bold">KH. Afif Ismail Sulaeman, S.IP.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 border rounded-3 bg-light h-100">
                                    <h6 class="fw-bold text-muted mb-2">Sekretaris</h6>
                                    <p class="mb-0 fw-bold">K. Edo Rosyada, A.Ma.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 border rounded-3 bg-light h-100">
                                    <h6 class="fw-bold text-muted mb-2">Bendahara</h6>
                                    <p class="mb-0 fw-bold">Hj. Heti Roheti</p>
                                </div>
                            </div>
                        </div>
                        
                        <h5 class="fw-bold mt-4 mb-3">Dewan Kyai</h5>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-person-fill me-2"></i>K. Mugni Muhit, S.Ag., M.Ag.</li>
                            <li><i class="bi bi-person-fill me-2"></i>KH. Afif Ismail Sulaeman, S.IP.</li>
                            <li><i class="bi bi-person-fill me-2"></i>Ustadzah Ai Nuraeni, S.Pd. RA.</li>
                            <li><i class="bi bi-person-fill me-2"></i>K. Edo Rosyada, A.Ma.</li>
                        </ul>
                    </div>
                </div>

                <!-- Kegiatan & Jadwal -->
                <div class="card border-0 shadow-sm rounded-4 mb-5" data-aos="fade-up">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="fw-bold mb-4 text-danger"><i class="bi bi-calendar-week me-2"></i>Kegiatan & Jadwal</h2>
                        <p class="text-secondary">Kegiatan harian terdiri dari shalat wajib berjamaah, shalat sunat, hafalan, dan kegiatan pembelajaran pagi, siang, dan malam.</p>
                        
                        <h5 class="fw-bold mt-4 mb-3">Jadwal Ta’lim Wat Tadris</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Hari</th>
                                        <th>Waktu</th>
                                        <th>Kajian/Mapel</th>
                                        <th>Ustadz/Kyai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Senin -->
                                    <tr>
                                        <td rowspan="4" class="align-middle fw-bold">Senin</td>
                                        <td>Ba’da Asar</td>
                                        <td>Bandungan Qur’an dan Safinah</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Magrib</td>
                                        <td>Majelis Taqorrub</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Isa</td>
                                        <td>Mukhtarul Ahadits</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Subuh</td>
                                        <td>Jauhar Tauhid</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <!-- Selasa -->
                                    <tr>
                                        <td rowspan="4" class="align-middle fw-bold">Selasa</td>
                                        <td>Ba’da Asar</td>
                                        <td>Bandungan Qur’an dan Safinah</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Magrib</td>
                                        <td>Tajwid Al-Qur’an</td>
                                        <td>Ustadzah Ai Nuraeni</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Isa</td>
                                        <td>Ushul Fiqih 1</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Subuh</td>
                                        <td>Jauhar Tauhid</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <!-- Rabu -->
                                    <tr>
                                        <td rowspan="4" class="align-middle fw-bold">Rabu</td>
                                        <td>Ba’da Asar</td>
                                        <td>Tahfidz</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Magrib</td>
                                        <td>Latihan Maulidud Diba</td>
                                        <td>Ustadzah Ai Nuraeni</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Isa</td>
                                        <td>Tauhid</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Subuh</td>
                                        <td>Tafsir Jalalain</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <!-- Kamis -->
                                    <tr>
                                        <td rowspan="4" class="align-middle fw-bold">Kamis</td>
                                        <td>Ba’da Asar</td>
                                        <td>Tahfidz</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Magrib</td>
                                        <td>Yasin</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Isa</td>
                                        <td>Maulidud Diba</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Subuh</td>
                                        <td>Sulamut Taufiq</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <!-- Jumat -->
                                    <tr>
                                        <td rowspan="4" class="align-middle fw-bold">Jum'at</td>
                                        <td>Ba’da Asar</td>
                                        <td>Belajar Sendiri</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Magrib</td>
                                        <td>Akhlakul Banain</td>
                                        <td>K. Mugni M. S.Ag., M.Ag.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Isa</td>
                                        <td>Ilmu Shorof</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Subuh</td>
                                        <td>Pengajian bapak-bapak</td>
                                        <td>-</td>
                                    </tr>
                                     <!-- Sabtu -->
                                     <tr>
                                        <td rowspan="4" class="align-middle fw-bold">Sabtu</td>
                                        <td>Ba’da Asar</td>
                                        <td>Al-Adzkar</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Magrib</td>
                                        <td>Qosidah Shalawat</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Isa</td>
                                        <td>Latihan Khitobah</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Subuh</td>
                                        <td>Attagib wattarhib</td>
                                        <td>K. Mugni M. S.Ag., M.Ag.</td>
                                    </tr>
                                     <!-- Ahad -->
                                     <tr>
                                        <td rowspan="4" class="align-middle fw-bold">Ahad</td>
                                        <td>Ba’da Asar</td>
                                        <td>Bandungan Qur’an dan Safinah</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Magrib</td>
                                        <td>Evaluasi Tahfidz</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Isa</td>
                                        <td>Attagib wattarhib</td>
                                        <td>K. Mugni M. S.Ag., M.Ag.</td>
                                    </tr>
                                    <tr>
                                        <td>Ba’da Subuh</td>
                                        <td>Ilmu Nahwu dan Jurumiyah</td>
                                        <td>KH. Afif Ismail S.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Metode Pembelajaran -->
                <div class="card border-0 shadow-sm rounded-4 mb-5" data-aos="fade-up">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="fw-bold mb-4 text-primary"><i class="bi bi-book-half me-2"></i>Metode Pembelajaran</h2>
                        <div class="accordion" id="accordionMetode">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        1. Sorogan
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionMetode">
                                    <div class="accordion-body">
                                        Metode sorogan ini masih sangat efektif dalam mendidik para santri, sebab dalam metode ini seorang kyai bisa mengetahui sampai dimana kefahaman seorang santri terhadap materi yang telah disampaikan. Santri menghadap kepada kyai satu persatu dengan membaca kitab yang telah ditentukan sesuai jadwal.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        2. Wetonan
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionMetode">
                                    <div class="accordion-body">
                                        Metode wetonan ini merupakan metode kuliah, dimana para santri mengikuti pelajaran dengan duduk di sekeliling kyai yang menerangkan pelajaran yang sedang dikaji, santri menyimak kitab masing-masing dan membuat catatan-catatan yang perlu.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        3. Bandungan
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionMetode">
                                    <div class="accordion-body">
                                        Sistem bandungan ini sering di sebut dengan “halaqah”, metode ini sama dengan wetonan di mana dalam pengajian kitab yang di baca oleh kyai hanya satu sedangkan para santrinya membawa kitab yang sama lalu santri mendengarkan dan menyimak.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        4. Hiwar atau Musyawarah
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionMetode">
                                    <div class="accordion-body">
                                        Metode Hiwar atau musyawarah, hampir sama dengan metode diskusi. Metode ini dilaksanakan dalam rangka pendalaman atau pengayaan materi-materi yang sudah diberikan terhadap santri.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        5. Hafalan atau Tahfidz
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionMetode">
                                    <div class="accordion-body">
                                        Metode hafalan dipakai untuk menghafal kitab-kitab tertentu, misalnya Jurumiyah, Imriti, Alfiyah Ibn Malik atau juga sering dipakai untuk menghapal hadits dan al-Qur`an.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
