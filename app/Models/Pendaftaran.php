<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftarans'; // atau 'pendaftaran' kalau kamu pakai singular

    protected $fillable = [
        'user_id',
        'nama',
        'nisn',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'no_hp',
        'alamat',
        'email',
        'foto',
        'asal_sekolah',
        'jurusan',
        'tahun_lulus',
        'nilai_rata',
        'nama_ayah',
        'nama_ibu',
        'no_kk',
        'file_kk',
        'file_akte',
        'file_ijazah',
        'status_seleksi',
        'verifikasi_dokumen',
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
