<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Pendaftaran - {{ $data->nama }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; margin: 0; padding: 0; }
        .card { width: 100%; border: 2px solid #0d6efd; padding: 20px; box-sizing: border-box; }
        .header { text-align: center; border-bottom: 2px solid #0d6efd; padding-bottom: 10px; margin-bottom: 20px; }
        .header h1 { font-size: 24px; color: #0d6efd; margin: 0 0 5px 0; }
        .header p { font-size: 14px; margin: 0; }
        
        .content { display: table; width: 100%; }
        .photo-box { display: table-cell; width: 30%; vertical-align: top; }
        .photo { width: 120px; height: 160px; border: 1px solid #ddd; background: #f8f9fa; text-align: center; line-height: 160px; color: #ccc; }
        .photo img { width: 100%; height: 100%; object-fit: cover; }
        
        .info-box { display: table-cell; width: 70%; vertical-align: top; padding-left: 20px; }
        .row { margin-bottom: 10px; }
        .label { font-weight: bold; width: 130px; display: inline-block; font-size: 13px; }
        .value { display: inline-block; font-size: 13px; }
        
        .footer { margin-top: 30px; display: table; width: 100%; }
        .footer-left { display: table-cell; width: 60%; font-size: 11px; font-style: italic; }
        .footer-right { display: table-cell; width: 40%; text-align: center; font-size: 13px; }
        .signature { margin-top: 60px; border-top: 1px solid #333; display: inline-block; width: 150px; }
        
        .id-badge { background: #0d6efd; color: white; padding: 5px 15px; border-radius: 5px; font-weight: bold; position: absolute; top: 20px; right: 20px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <h1>KARTU BUKTI PENDAFTARAN</h1>
            <p>PENERIMAAN PESERTA DIDIK BARU (PPDB) SMA ERHA JATINAGARA</p>
            <p>Tahun Pelajaran 2024/2025</p>
        </div>

        <div class="id-badge">
            #PPDB-{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}
        </div>

        <div class="content">
            <div class="photo-box">
                <div class="photo">
                    @if($data->foto && file_exists(public_path('storage/' . $data->foto)))
                        <img src="{{ public_path('storage/' . $data->foto) }}" alt="Foto Profile">
                    @else
                        <img src="{{ public_path('img/user.jpeg') }}" alt="Default Foto">
                    @endif
                </div>
            </div>
            
            <div class="info-box">
                <div class="row"><span class="label">Nama Lengkap</span>: <span class="value">{{ $data->nama }}</span></div>
                <div class="row"><span class="label">NISN</span>: <span class="value">{{ $data->nisn }}</span></div>
                <div class="row"><span class="label">NIK</span>: <span class="value">{{ $data->nik }}</span></div>
                <div class="row"><span class="label">TTL</span>: <span class="value">{{ $data->tempat_lahir }}, {{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</span></div>
                <div class="row"><span class="label">Jenis Kelamin</span>: <span class="value">{{ $data->jenis_kelamin }}</span></div>
                <div class="row"><span class="label">Asal Sekolah</span>: <span class="value">{{ $data->asal_sekolah }}</span></div>
                <div class="row"><span class="label">No. HP/WA</span>: <span class="value">{{ $data->no_hp }}</span></div>
                <div class="row"><span class="label">Alamat</span>: <span class="value">{{ $data->alamat }}</span></div>
            </div>
        </div>

        <div class="footer">
            <div class="footer-left">
                * Simpan kartu ini sebagai bukti fisik pendaftaran.<br>
                * Bawa kartu ini saat verifikasi dokumen ke sekolah.
            </div>
            <div class="footer-right">
                Dicetak pada: {{ date('d/m/Y H:i') }}<br><br>
                Calon Peserta Didik,
                <div class="signature"></div>
                <strong>{{ $data->nama }}</strong>
            </div>
        </div>
    </div>
</body>
</html>
