<!DOCTYPE html>
<html>
<head>
    <title>Surat Penerimaan Siswa Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header img {
            width: 80px;
            height: auto;
        }
        .header h2 {
            margin: 0;
            text-transform: uppercase;
        }
        .header p {
            margin: 0;
            font-size: 12px;
        }
        .content {
            margin: 0 20px;
        }
        .details {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .details table {
            width: 100%;
        }
        .details td {
            padding: 5px;
            vertical-align: top;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
        }
        .signature {
            margin-top: 60px;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>SMA ERHA JATINAGARA</h2>
        <p>Jl. Raya Jatinagara No. 123, Ciamis, Jawa Barat</p>
        <p>Telp: (0265) 123456 | Email: info@smaerha.sch.id</p>
    </div>

    <div class="content">
        <p>Perihal: <strong>Pemberitahuan Penerimaan Siswa Baru</strong></p>
        
        <p>Kepada Yth,</p>
        <p><strong>{{ $siswa->nama }}</strong></p>
        <p>Di Tempat</p>

        <p>Dengan hormat,</p>
        <p>Berdasarkan hasil verifikasi data pendaftaran Penerimaan Peserta Didik Baru (PPDB) SMA ERHA Jatinagara Tahun Ajaran 2025/2026, kami sampaikan bahwa Anda dinyatakan:</p>

        <h2 style="text-align: center; border: 2px solid #28a745; padding: 10px; color: #28a745;">DITERIMA / LULUS</h2>

        <p>Selanjutnya, harap melakukan daftar ulang dengan membawa berkas persyaratan (KK, Akte, Ijazah Asli) pada:</p>

        <div class="details">
            <table>
                <tr>
                    <td width="150">Hari / Tanggal</td>
                    <td>: {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y') }}</td>
                </tr>
                <tr>
                    <td>Pukul</td>
                    <td>: {{ $jam }} WIB</td>
                </tr>
                <tr>
                    <td>Tempat</td>
                    <td>: {{ $tempat }}</td>
                </tr>
            </table>
        </div>

        <p>Demikian surat pemberitahuan ini kami sampaikan. Atas perhatiannya kami ucapkan terima kasih.</p>

        <div class="footer">
            <p>Jatinagara, {{ date('d F Y') }}</p>
            <p>Kepala Sekolah,</p>
            <div class="signature">Drs. H. Asep Saepudin, M.Pd</div>
            <p>NIP. 19700101 200001 1 001</p>
        </div>
    </div>
</body>
</html>
