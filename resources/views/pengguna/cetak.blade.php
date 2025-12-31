<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - SMA ERHA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.3;
        }
        .container {
            width: 100%;
            padding: 0 10px;
        }
        /* Header style same as Surat Diterima for consistency */
        .header {
            border-bottom: 3px double #000;
            padding-bottom: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        .header table { width: 100%; }
        .header img { width: 80px; height: auto; }
        .header-text h3 { margin: 0; font-size: 16px; font-weight: bold; text-transform: uppercase; }
        .header-text h2 { margin: 2px 0; font-size: 20px; font-weight: bold; text-transform: uppercase; color: #0E2E72; }
        .header-text p { margin: 0; font-size: 11px; }

        .title-doc {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        /* Data Section */
        .section-title {
            background-color: #f0f0f0;
            padding: 5px 10px;
            font-weight: bold;
            border: 1px solid #ccc;
            margin-top: 15px;
            margin-bottom: 10px;
            font-size: 13px;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-table td {
            vertical-align: top;
            padding: 4px;
        }
        .label { width: 180px; font-weight: bold; color: #333; }
        .sep { width: 10px; text-align: center; }
        .value { color: #000; }

        /* Photo & Signatures */
        .footer-section {
            margin-top: 30px;
            width: 100%;
            page-break-inside: avoid;
        }
        .photo-box {
            width: 3cm;
            height: 4cm;
            border: 1px solid #000;
            text-align: center;
            line-height: 4cm;
            font-size: 10px;
            color: #999;
            margin: 0 auto;
        }
        .photo-img {
            width: 3cm;
            height: 4cm;
            object-fit: cover;
        }
        
        .signature-table { width: 100%; text-align: center; margin-top: 20px; }
        .sig-space { height: 70px; }
        .sig-name { font-weight: bold; text-decoration: underline; }
        .sig-role { font-size: 11px; }

        @media print {
            .no-print { display: none !important; }
        }
        
        /* Box info registrasi */
        .reg-info {
            border: 1px dashed #000;
            padding: 5px 10px;
            background: #fff;
            float: right;
            width: 250px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    @if(!isset($is_pdf))
    <div class="no-print" style="text-align: center; padding: 20px; background: #eee; margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; font-size: 16px; cursor: pointer;">Cetak Formulir</button>
        <a href="{{ route('home') }}" style="margin-left: 10px; text-decoration: none; color: blue;">Kembali</a>
    </div>
    @endif

    <div class="container">
        <!-- Header -->
        <div class="header">
            <table>
                <tr>
                    <td width="80" align="center">
                        <img src="{{ public_path('img/logo.webp') }}" alt="Logo">
                    </td>
                    <td class="header-text" align="center">
                        <h3>PANITIA PENERIMAAN PESERTA DIDIK BARU</h3>
                        <h2>SMA ERHA JATINAGARA</h2>
                        <p>Jl. Raya Jatinagara No. 123, Dusun Kulon, Desa Jatinagara, Kec. Jatinagara</p>
                        <p>Kabupaten Ciamis, Jawa Barat - 46273 | Email: ppdb@smaerhajatinagara.sch.id</p>
                    </td>
                    <td width="80">
                        <div style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;">
                            FORMULIR<br>PPDB
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="title-doc">FORMULIR PENDAFTARAN SISWA BARU</div>
        
        <table width="100%" style="margin-bottom: 0;">
            <tr>
                <td width="60%"></td>
                <td width="40%">
                    <div class="reg-info">
                        <table width="100%" style="font-size: 11px;">
                            <tr>
                                <td>No. Registrasi</td>
                                <td>: <strong>REG-{{ str_pad($data->id, 5, '0', STR_PAD_LEFT) }}</strong></td>
                            </tr>
                            <tr>
                                <td>Tanggal Daftar</td>
                                <td>: {{ $data->created_at->format('d/m/Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
        <div style="clear: both;"></div>

        <!-- Section A -->
        <div class="section-title">A. KETERANGAN PRIBADI CALON SISWA</div>
        <table class="data-table">
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="sep">:</td>
                <td class="value"><strong>{{ strtoupper($data->nama) }}</strong></td>
            </tr>
            <tr>
                <td class="label">NISN</td>
                <td class="sep">:</td>
                <td class="value">{{ $data->nisn }}</td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td class="sep">:</td>
                <td class="value">{{ $data->nik }}</td>
            </tr>
            <tr>
                <td class="label">Tempat, Tanggal Lahir</td>
                <td class="sep">:</td>
                <td class="value">{{ $data->tempat_lahir }}, {{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="sep">:</td>
                <td class="value">{{ $data->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td class="label">Agama</td>
                <td class="sep">:</td>
                <td class="value">{{ $data->agama }}</td>
            </tr>
            <tr>
                <td class="label">Alamat Rumah</td>
                <td class="sep">:</td>
                <td class="value">{{ $data->alamat }}</td>
            </tr>
            <tr>
                <td class="label">No. Telepon / WA</td>
                <td class="sep">:</td>
                <td class="value">{{ $data->no_hp }}</td>
            </tr>
            <tr>
                <td class="label">Email</td>
                <td class="sep">:</td>
                <td class="value">{{ $data->email }}</td>
            </tr>
            <tr>
                <td class="label">Anak ke- / dari</td>
                <td class="sep">:</td>
                <td class="value">........ / ........ Bersaudara</td>
            </tr>
            <tr>
                <td class="label">Hobi / Cita-cita</td>
                <td class="sep">:</td>
                <td class="value">................................ / ................................</td>
            </tr>
            <tr>
                <td class="label">Transportasi ke Sekolah</td>
                <td class="sep">:</td>
                <td class="value">...........................................................................................</td>
            </tr>
            <tr>
                <td class="label">Jarak ke Sekolah</td>
                <td class="sep">:</td>
                <td class="value">...................... KM</td>
            </tr>
        </table>

        <!-- Section B -->
        <div class="section-title">B. LATAR BELAKANG PENDIDIKAN</div>
        <table class="data-table">
            <tr>
                <td class="label">Sekolah Asal</td>
                <td class="sep">:</td>
                <td class="value">{{ $data->asal_sekolah }}</td>
            </tr>
            <tr>
                <td class="label">Tahun Kelulusan</td>
                <td class="sep">:</td>
                <td class="value">{{ $data->tahun_lulus }}</td>
            </tr>
        </table>

        <!-- Section C -->
        <div class="section-title">C. DATA ORANG TUA / WALI</div>
        <table class="data-table">
            <tr>
                <td class="label">Nama Ayah (Kandung)</td>
                <td class="sep">:</td>
                <td class="value">{{ $data->nama_ayah }}</td>
            </tr>
            <tr>
                <td class="label">Nama Ibu (Kandung)</td>
                <td class="sep">:</td>
                <td class="value">{{ $data->nama_ibu }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan Ayah</td>
                <td class="sep">:</td>
                <td class="value">...........................................................................................</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan Ibu</td>
                <td class="sep">:</td>
                <td class="value">...........................................................................................</td>
            </tr>
            <tr>
                <td class="label">No. Kartu Keluarga (KK)</td>
                <td class="sep">:</td>
                <td class="value">{{ $data->no_kk ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat Orang Tua</td>
                <td class="sep">:</td>
                <td class="value">...........................................................................................<br>...........................................................................................</td>
            </tr>
            <tr>
                <td class="label">No. Telp Orang Tua</td>
                <td class="sep">:</td>
                <td class="value">...........................................................................................</td>
            </tr>
        </table>

        <!-- Section D -->
        <div class="section-title">D. DATA WALI (JIKA ADA)</div>
        <table class="data-table">
            <tr>
                <td class="label">Nama Wali</td>
                <td class="sep">:</td>
                <td class="value">...........................................................................................</td>
            </tr>
            <tr>
                <td class="label">Hubungan dengan Siswa</td>
                <td class="sep">:</td>
                <td class="value">...........................................................................................</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan Wali</td>
                <td class="sep">:</td>
                <td class="value">...........................................................................................</td>
            </tr>
            <tr>
                <td class="label">No. Telp Wali</td>
                <td class="sep">:</td>
                <td class="value">...........................................................................................</td>
            </tr>
        </table>

        <!-- Signatures and Photo -->
        <div class="footer-section">
            <div style="font-size: 11px; margin-bottom: 20px; font-style: italic;">
                *Data di atas diisi dengan sebenar-benarnya dan dapat dipertanggungjawabkan.
            </div>

            <table class="signature-table">
                <tr>
                    <td width="30%">
                        <div style="margin-bottom: 10px;">FOTO 3x3</div>
                        <div class="photo-box" style="width: 3cm; height: 3cm; line-height: 3cm;">FOTO</div>
                    </td>
                    <td width="35%">
                        Mengetahui,<br>
                        Orang Tua / Wali
                        <div class="sig-space"></div>
                        <div class="sig-name">( ................................... )</div>
                        <div class="sig-role">Tanda Tangan & Nama Terang</div>
                    </td>
                    <td width="35%">
                        Jatinagara, {{ date('d F Y') }}<br>
                        Calon Siswa
                        <div class="sig-space"></div>
                        <div class="sig-name">{{ strtoupper($data->nama) }}</div>
                        <div class="sig-role">Tanda Tangan & Nama Terang</div>
                    </td>
                </tr>
            </table>

            <div style="margin-top: 30px; border-top: 1px dashed #000; padding-top: 10px;">
                <table width="100%">
                    <tr>
                        <td width="70%" style="font-size: 11px;">
                            <strong>VERIFIKASI PANITIA PPDB:</strong><br>
                            &#9633; Formulir Pendaftaran<br>
                            &#9633; Fotokopi Ijazah / SKL<br>
                            &#9633; Fotokopi Kartu Keluarga<br>
                            &#9633; Fotokopi Akte Kelahiran
                        </td>
                        <td width="30%" align="center">
                            <div style="font-size: 11px;">Petugas Verifikasi</div>
                            <div style="height: 40px;"></div>
                            <div style="border-bottom: 1px solid #000; width: 80%; margin: 0 auto;"></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
