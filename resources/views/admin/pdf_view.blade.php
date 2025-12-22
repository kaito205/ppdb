<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Pendaftar PPDB - {{ date('Y') }}</title>
    <style>
        @page {
            size: landscape;
            margin: 1cm;
        }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }
        /* Kop Surat */
        .header-table {
            width: 100%;
            border-bottom: 3px double #0e2e72;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .header-table td {
            border: none;
            padding: 0;
        }
        .logo {
            width: 80px;
        }
        .school-name {
            font-size: 22px;
            font-weight: bold;
            color: #0e2e72;
            text-transform: uppercase;
            margin: 0;
        }
        .school-address {
            font-size: 11px;
            color: #555;
            margin: 5px 0 0 0;
        }

        /* Title */
        .report-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .report-title h2 {
            margin: 0;
            color: #333;
            text-transform: uppercase;
            font-size: 18px;
        }
        .report-title p {
            margin: 5px 0;
            font-size: 12px;
            color: #666;
        }

        /* Table Style */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }
        th {
            background-color: #0e2e72;
            color: white;
            text-transform: uppercase;
            padding: 10px 5px;
            border: 1px solid #0c2761;
        }
        td {
            border: 1px solid #dee2e6;
            padding: 8px 5px;
            vertical-align: top;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        /* Badge Style */
        .badge {
            padding: 3px 8px;
            border-radius: 10px;
            font-weight: bold;
            text-align: center;
            display: inline-block;
            font-size: 9px;
        }
        .bg-success { background-color: #d1e7dd; color: #0f5132; }
        .bg-danger { background-color: #f8d7da; color: #842029; }
        .bg-warning { background-color: #fff3cd; color: #664d03; }

        /* Footer */
        .footer-table {
            width: 100%;
            margin-top: 30px;
            font-size: 11px;
        }
        .footer-table td {
            border: none;
            text-align: center;
            width: 33%;
        }
        .signature-space {
            height: 60px;
        }

        /* Print Controls */
        .controls {
            background: #f1f1f1;
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        .btn {
            padding: 8px 20px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin: 0 5px;
            font-size: 13px;
        }
        .btn-print { background: #0e2e72; color: white; }
        .btn-close { background: #6c757d; color: white; }

        @media print {
            .controls { display: none; }
            body { margin: 0; }
            @page { margin: 0.5cm; }
        }
    </style>
</head>
<body>
    <div class="controls">
        <button onclick="window.print()" class="btn btn-print">Cetak Sekarang</button>
        <button onclick="window.close()" class="btn btn-close">Tutup Halaman</button>
        <p style="font-size: 11px; color: #666; margin-top: 10px;">* Gunakan mode Landscape untuk hasil optimal</p>
    </div>

    <table class="header-table">
        <tr>
            <td width="100">
                <img src="{{ asset('img/logo.png') }}" class="logo" onerror="this.src='https://via.placeholder.com/80?text=LOGO'">
            </td>
            <td align="center">
                <div class="school-name">SMA ERHA JATINAGARA</div>
                <div class="school-address">
                    Jl. Raya Jatinagara No. 123, Ciamis, Jawa Barat<br>
                    Telp: (0265) 123456 | Email: info@smaerha.sch.id | Website: www.smaerha.sch.id
                </div>
            </td>
            <td width="100"></td>
        </tr>
    </table>

    <div class="report-title">
        <h2>LAPORAN DATA PENDAFTAR SISWA BARU (PPDB)</h2>
        <p>Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }} | Per Tanggal: {{ date('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="25">Nomor</th>
                <th>Nama Lengkap</th>
                <th width="80">NIK</th>
                <th width="80">NISN</th>
                <th width="80">Nomor KK</th>
                <th width="80">Jenis Kelamin</th>
                <th>Tempat, Tanggal Lahir</th>
                <th width="150">Alamat Lengkap</th>
                <th width="90">Telepon / WhatsApp</th>
                <th width="110">Orang Tua</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $siswa)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td style="font-weight: bold;">{{ $siswa->nama }}</td>
                <td align="center">{{ $siswa->nik ?? '-' }}</td>
                <td align="center">{{ $siswa->nisn }}</td>
                <td align="center">{{ $siswa->no_kk ?? '-' }}</td>
                <td align="center">{{ $siswa->jenis_kelamin }}</td>
                <td>{{ $siswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d F Y') }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td align="center">{{ $siswa->no_hp }}</td>
                <td>
                    Ayah: {{ $siswa->nama_ayah }}<br>
                    Ibu: {{ $siswa->nama_ibu }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="footer-table">
        <tr>
            <td></td>
            <td></td>
            <td>
                Ciamis, {{ date('d F Y') }}<br>
                Kepala Sekolah SMA ERHA,<br>
                <div class="signature-space"></div>
                <strong>( ......................................... )</strong><br>
                NIP. .....................................
            </td>
        </tr>
    </table>
</body>
</html>
