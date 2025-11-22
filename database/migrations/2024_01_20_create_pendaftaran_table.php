<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('file_kk')->nullable();
            $table->string('file_akte')->nullable();
            $table->string('file_ijazah')->nullable();
            $table->enum('status_administrasi', ['Menunggu', 'Lolos', 'Ditolak'])->default('Menunggu');
            $table->enum('status_akademik', ['Menunggu', 'Lolos', 'Ditolak'])->default('Menunggu');
            $table->enum('status_akhir', ['Belum', 'Lulus', 'Tidak Lulus'])->default('Belum');
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
