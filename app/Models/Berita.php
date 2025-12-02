<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'slug', 'isi', 'gambar'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            $slug = Str::slug($berita->judul);
            $count = Berita::where('slug', $slug)->count();

            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }

            $berita->slug = $slug;
        });
    }
}
