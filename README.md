# PPDB - Sistem Penerimaan Peserta Didik Baru

Proyek ini adalah aplikasi web untuk mengelola proses Penerimaan Peserta Didik Baru (PPDB) secara online. Dibangun menggunakan framework Laravel, aplikasi ini dirancang untuk memudahkan pendaftaran siswa baru, pengelolaan data, dan administrasi sekolah.

## Fitur

- Pendaftaran siswa baru secara online
- Manajemen data calon siswa
- Verifikasi dan validasi data pendaftaran
- Dashboard admin untuk monitoring proses PPDB
- Notifikasi melalui email untuk status pendaftaran
- Export data pendaftar dalam format Excel atau PDF

## Teknologi yang Digunakan

- [Laravel](https://laravel.com/) - Framework PHP untuk pengembangan aplikasi web
- [MySQL](https://www.mysql.com/) - Sistem manajemen basis data relasional
- [Bootstrap](https://getbootstrap.com/) - Framework CSS untuk desain responsif
- [Vite](https://vitejs.dev/) - Alat build frontend modern

## Instalasi

1. Klon repositori ini:
   ```bash
   git clone https://github.com/kaito205/ppdb.git
   cd ppdb
2. Install dependensi PHP dan JavaScript:
   ```bash
   composer install
   npm install
3. Salin file .env.example menjadi .env dan sesuaikan konfigurasi database:
   ```bash
   cp .env.example .env
4. Generate application key:
   ```bash
   php artisan key:generate
5. Jalankan migrasi database:
   ```bash
   php artisan key:generate
6. Jalankan server pengembangan:
   ```bash
   php artisan serve
   
