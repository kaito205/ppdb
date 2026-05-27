<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Pendaftar PPDB - {{ date('Y') }}</title>
    <style>
        @page {
            size: a4 landscape;
            margin: 1cm;
        }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            font-size: 10px;
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
            vertical-align: middle;
        }
        .logo {
            width: 70px;
        }
        .school-info {
            text-align: center;
        }
        .school-name {
            font-size: 20px;
            font-weight: bold;
            color: #0e2e72;
            text-transform: uppercase;
            margin: 0;
        }
        .school-address {
            font-size: 10px;
            color: #555;
            margin-top: 5px;
        }

        /* Title */
        .report-title {
            text-align: center;
            margin-bottom: 15px;
        }
        .report-title h2 {
            margin: 0;
            color: #333;
            text-transform: uppercase;
            font-size: 16px;
        }
        .report-title p {
            margin: 5px 0;
            font-size: 11px;
            color: #666;
        }

        /* Table Style */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-table th {
            background-color: #0e2e72;
            color: white;
            text-transform: uppercase;
            padding: 8px 4px;
            border: 1px solid #0c2761;
            font-size: 9px;
        }
        .data-table td {
            border: 1px solid #dee2e6;
            padding: 6px 4px;
            vertical-align: top;
            word-wrap: break-word;
        }
        .text-center { text-align: center; }
        
        /* Footer */
        .footer-table {
            width: 100%;
            margin-top: 30px;
        }
        .footer-table td {
            border: none;
            text-align: center;
            width: 33%;
            font-size: 11px;
        }
        .signature-space {
            height: 50px;
        }
    </style>
</head>
<body>
    <table class="header-table">
        <tr>
            <td width="80">
                @php
                    $logoPath = public_path('img/logo.webp');
                    if (!file_exists($logoPath)) {
                        $logoPath = public_path('img/logo.png'); // Fallback
                    }
                @endphp
                @if(file_exists($logoPath))
                    <img src="data:image/webp;base64,{{ base64_encode(file_get_contents($logoPath)) }}" class="logo">
                @endif
            </td>
            <td class="school-info">
                <div class="school-name">SMA ERHA JATINAGARA</div>
                <div class="school-address">
                    Dusun Kulon, Desa Jatinagara, Kec. Jatinagara, Kab. Ciamis, Jawa Barat<br>
                    Telp: 0821 1925 0323 | Email: erhajatinagarasma@gmail.com | Website: www.smaerha.sch.id
                </div>
            </td>
            <td width="80"></td>
        </tr>
    </table>

    <div class="report-title">
        <h2>LAPORAN DATA PENDAFTAR SISWA BARU (PPDB)</h2>
        <p>Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }} | Status: {{ request('status') ?? 'Semua' }}</p>
        <p style="font-size: 9px;">Dicetak pada: {{ date('d F Y H:i:s') }}</p>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th width="20">No</th>
                <th>Nama Lengkap</th>
                <th width="70">NIK</th>
                <th width="70">NISN</th>
                <th width="50">L/P</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Asal Sekolah</th>
                <th width="120">Alamat</th>
                <th width="80">No. HP</th>
                <th width="60">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $siswa)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td style="font-weight: bold;">{{ $siswa->nama }}</td>
                <td class="text-center">{{ $siswa->nik ?? '-' }}</td>
                <td class="text-center">{{ $siswa->nisn }}</td>
                <td class="text-center">{{ $siswa->jenis_kelamin == 'Laki-laki' ? 'L' : 'P' }}</td>
                <td>{{ $siswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                <td>{{ $siswa->asal_sekolah }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td class="text-center text-nowrap">{{ $siswa->no_hp }}</td>
                <td class="text-center">{{ $siswa->status_seleksi }}</td>
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
                <strong>( Ai Nuraeni, S.Pd )</strong><br>
                NIP. -
            </td>
        </tr>
    </table>
</body>
</html>
