<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');          // contoh: "Rekayasa Perangkat Lunak"
            $table->string('singkatan');     // contoh: "RPL"
            $table->string('slug')->unique(); // untuk URL /jurusan/rpl
            $table->text('deskripsi')->nullable();
            $table->longText('kompetensi')->nullable(); // apa saja yang dipelajari
            $table->string('foto_sampul')->nullable();
            $table->string('icon')->nullable(); // nama icon bootstrap-icons
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};
