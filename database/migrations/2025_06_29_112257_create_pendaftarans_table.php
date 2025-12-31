<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('nisn');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('email');
            $table->string('foto')->nullable();

            $table->string('asal_sekolah')->nullable();
            $table->string('tahun_lulus')->nullable();


            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('no_kk');
            $table->string('file_kk');
            $table->string('file_akte');
            $table->string('file_ijazah')->nullable();

            $table->enum('status_seleksi', ['Diproses', 'Lulus', 'Tidak Lulus'])->default('Diproses');
            $table->enum('verifikasi_dokumen', ['Pending', 'Terverifikasi', 'Ditolak'])->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
