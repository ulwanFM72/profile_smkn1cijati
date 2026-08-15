<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('motto')->nullable();
            $table->text('sambutan_kepala_sekolah')->nullable();
            $table->string('nama_kepala_sekolah')->nullable();
            $table->text('visi')->nullable();
            $table->longText('misi')->nullable();
            $table->longText('sejarah')->nullable();
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('npsn')->nullable();
            $table->string('status')->nullable();
            $table->string('akreditasi')->nullable();
            $table->string('website')->nullable();
            $table->integer('jumlah_siswa')->default(0);
            $table->integer('jumlah_guru')->default(0);
            $table->integer('jumlah_kelas')->default(0);
            $table->integer('tahun_berdiri')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_sekolahs');
    }
};
