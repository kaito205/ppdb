<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    use HasFactory;

    protected $table = 'profil_sekolahs';
    protected $fillable = [
        'nama_sekolah', 'deskripsi', 'visi', 'misi', 'foto'
    ];
}
