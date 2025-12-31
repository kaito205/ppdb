<!DOCTYPE html>
<html>
<head>
    <title>Surat Keterangan Diterima - SMA ERHA</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 13px;
            line-height: 1.4;
            color: #000;
        }
        .container {
            width: 100%;
            padding: 0 30px;
        }
        
        /* Kop Surat Compact */
        .header {
            border-bottom: 3px double #000;
            padding-bottom: 5px;
            margin-bottom: 20px;
            position: relative;
        }
        .header table { width: 100%; }
        .header img { width: 75px; height: auto; }
        .header-text { text-align: center; }
        .header-text h3 { margin: 0; font-size: 16px; font-weight: bold; text-transform: uppercase; }
        .header-text h2 { margin: 2px 0; font-size: 20px; font-weight: bold; text-transform: uppercase; color: #0E2E72; }
        .header-text p { margin: 0; font-size: 12px; }

        /* Isi Surat */
        .content { margin-top: 15px; text-align: justify; }
        .content p { margin-bottom: 8px; }
        
        .box-info {
            border: 2px solid #000;
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
            margin: 15px 50px;
            font-weight: bold;
            font-size: 15px;
            border-radius: 5px;
        }

        .table-info { width: 100%; margin: 10px 0; margin-left: 20px; }
        .table-info td { padding: 3px; vertical-align: top; }

        /* Tanda Tangan */
        .footer { margin-top: 40px; width: 100%; }
        .footer table { width: 100%; }
        .signature-box { text-align: center; float: right; width: 220px; }
        .signature-name { font-weight: bold; text-decoration: underline; margin-top: 60px; }
        .signature-nip { font-size: 12px; }

        @page { margin: 1cm 2cm; }
    </style>
</head>
<body>
    <div class="header">
        <table>
            <tr>
                <td width="80" align="center" style="vertical-align: middle;">
                    <img src="{{ public_path('img/logo.webp') }}" alt="Logo">
                </td>
                <td class="header-text" align="center" style="vertical-align: middle;">
                    <h3>PANITIA PENERIMAAN PESERTA DIDIK BARU</h3>
                    <h2>SMA ERHA JATINAGARA</h2>
                    <p>Jl. Raya Jatinagara No. 123, Dusun Kulon, Desa Jatinagara, Kec. Jatinagara</p>
                    <p>Kabupaten Ciamis, Jawa Barat - 46273 | Email: ppdb@smaerhajatinagara.sch.id</p>
                </td>
                <td width="80"></td>
            </tr>
        </table>
    </div>

    <div class="container">
        <div style="text-align: right; margin-bottom: 15px;">
            Jatinagara, {{ date('d F Y') }}
        </div>

        <table>
            <tr>
                <td width="80">Nomor</td>
                <td>: 421.3/{{ str_pad($siswa->id, 3, '0', STR_PAD_LEFT) }}/PPDB/{{ date('Y') }}</td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>: -</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>: <strong>PENERIMAAN CALON SISWA BARU</strong></td>
            </tr>
        </table>

        <div style="margin-top: 25px;">
            Kepada Yth,<br>
            Bapak/Ibu Orang Tua/Wali dari <strong>{{ strtoupper($siswa->nama) }}</strong><br>
            No. Peserta: REG-{{ str_pad($siswa->id, 5, '0', STR_PAD_LEFT) }}<br>
            di<br>
            Tempat
        </div>

        <div class="content">
            <p><i>Assalamu’alaikum Warahmatullahi Wabarakatuh,</i></p>

            <p>Berdasarkan hasil verifikasi kelengkapan berkas administrasi Penerimaan Peserta Didik Baru (PPDB) SMA ERHA Jatinagara Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }}, dengan ini kami sampaikan bahwa calon peserta didik:</p>

            <table style="margin-left: 20px; width: 100%;">
                <tr>
                    <td width="150">Nama Lengkap</td>
                    <td>: <strong>{{ strtoupper($siswa->nama) }}</strong></td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>: {{ $siswa->nisn }}</td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>: {{ $siswa->asal_sekolah }}</td>
                </tr>
            </table>

            <p>Dengan demikian, calon peserta didik tersebut berhak untuk melanjutkan ke tahap <strong>DAFTAR ULANG</strong> sebagai siswa baru di SMA ERHA Jatinagara pada:</p>

            <table class="table-info">
                <tr>
                    <td width="150">Hari, Tanggal</td>
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
                <tr>
                    <td>Acara</td>
                    <td>: Penyerahan Berkas Fisik & Penyelesaian Administrasi</td>
                </tr>
            </table>

            <p>Mohon membawa hasil cetak surat ini dan dokumen asli (Ijazah/SKL, Kartu Keluarga, Akte Kelahiran) untuk verifikasi akhir.</p>

            <p>Demikian surat pemberitahuan ini kami sampaikan. Atas perhatiannya kami ucapkan terima kasih.</p>

            <p><i>Wassalamu’alaikum Warahmatullahi Wabarakatuh.</i></p>
        </div>

        <div class="footer">
            <div class="signature-box">
                <p>Kepala Sekolah,</p>
                <div class="signature-name">Ai Nuraeni, S.Pd.</div>
                <div class="signature-nip">NIP. -</div>
            </div>
        </div>
    </div>
</body>
</html>
