<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Siswa</title>
    <style>
        body { font-family: sans-serif; }
        @page { size: landscape; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 4px; text-align: left; font-size: 10px; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
        .print-btn { margin-bottom: 20px; }
        @media print {
            .print-btn { display: none; }
        }
    </style>
</head>
<body>
    <div class="print-btn" style="text-align: center;">
        <button onclick="window.print()" style="padding: 10px 20px; cursor: pointer;">Cetak / Simpan PDF</button>
        <button onclick="window.close()" style="padding: 10px 20px; cursor: pointer;">Tutup</button>
    </div>

    <h2>Laporan Data Pendaftar PPDB</h2>
    <p>Tanggal: {{ date('d F Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>JK</th>
                <th>TTL</th>
                <th>Asal Sekolah</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Orang Tua</th>
                <th>Status Formulir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $siswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->nisn }}</td>
                <td>{{ $siswa->jenis_kelamin == 'Laki-laki' ? 'L' : 'P' }}</td>
                <td>{{ $siswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') }}</td>
                <td>{{ $siswa->asal_sekolah }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>{{ $siswa->no_hp }}</td>
                <td>{{ $siswa->email }}</td>
                <td>
                    Ayah: {{ $siswa->nama_ayah }}<br>
                    Ibu: {{ $siswa->nama_ibu }}
                </td>
                <td>
                    @if($siswa->status_seleksi == 'Lulus')
                        Lengkap
                    @elseif($siswa->status_seleksi == 'Tidak Lulus')
                        Tidak Lengkap
                    @else
                        Menunggu
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
