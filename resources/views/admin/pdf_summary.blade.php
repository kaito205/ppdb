<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ringkasan Statistik PPDB - {{ date('Y') }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            font-size: 12px;
        }
        .header {
            text-align: center;
            border-bottom: 3px double #0e2e72;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo {
            width: 80px;
            margin-bottom: 10px;
        }
        .school-name {
            font-size: 24px;
            font-weight: bold;
            color: #0e2e72;
            text-transform: uppercase;
            margin: 0;
        }
        .report-title {
            text-align: center;
            margin-bottom: 40px;
        }
        .report-title h2 {
            text-decoration: underline;
            margin-bottom: 5px;
        }
        .stats-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }
        .stats-table td, .stats-table th {
            padding: 12px;
            border: 1px solid #ddd;
        }
        .stats-table th {
            background-color: #f8f9fa;
            text-align: left;
            width: 70%;
        }
        .stats-table td {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
        }
        .footer {
            margin-top: 50px;
        }
        .footer-table {
            width: 100%;
        }
        .footer-table td {
            width: 50%;
            vertical-align: top;
        }
        .sig-space {
            height: 80px;
        }
    </style>
</head>
<body>
    <div class="header">
        @php
            $logoPath = public_path('img/logo.webp');
            if (!file_exists($logoPath)) {
                $logoPath = public_path('img/logo.png');
            }
        @endphp
        @if(file_exists($logoPath))
            <img src="data:image/webp;base64,{{ base64_encode(file_get_contents($logoPath)) }}" class="logo">
        @endif
        <div class="school-name">SMA ERHA JATINAGARA</div>
        <div style="font-size: 12px;">Dusun Kulon, Desa Jatinagara, Kec. Jatinagara, Kab. Ciamis, Jawa Barat</div>
        <div style="font-size: 12px;">Website: www.smaerha.sch.id | Email: erhajatinagarasma@gmail.com</div>
    </div>

    <div class="report-title">
        <h2>RINGKASAN STATISTIK PPDB</h2>
        <p>Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }}</p>
        <p>Per Tanggal: {{ date('d F Y H:i') }}</p>
    </div>

    <table class="stats-table">
        <tr>
            <th>Total Calon Siswa Terdaftar</th>
            <td>{{ $stats['total'] }}</td>
        </tr>
        <tr>
            <th>Status: Menunggu Validasi (Pending)</th>
            <td>{{ $stats['pending'] }}</td>
        </tr>
        <tr>
            <th>Status: Diterima (Lulus Seleksi)</th>
            <td>{{ $stats['lulus'] }}</td>
        </tr>
        <tr>
            <th>Status: Ditolak (Tidak Lulus)</th>
            <td>{{ $stats['ditolak'] }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin: Laki-laki</th>
            <td>{{ $stats['laki'] }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin: Perempuan</th>
            <td>{{ $stats['perempuan'] }}</td>
        </tr>
    </table>

    <div style="background-color: #fff3cd; padding: 15px; border-left: 5px solid #ffc107; font-style: italic;">
        <strong>Catatan:</strong> Data ini merupakan ringkasan sistem secara real-time. Untuk rincian nama pendaftar, silakan unduh Laporan Detail Pendaftaran.
    </div>

    <div class="footer">
        <table class="footer-table">
            <tr>
                <td></td>
                <td align="center">
                    Ciamis, {{ date('d F Y') }}<br>
                    Mengetahui,<br>
                    Kepala Sekolah SMA ERHA
                    <div class="sig-space"></div>
                    <strong>( Ai Nuraeni, S.Pd )</strong><br>
                    NIP. -
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
