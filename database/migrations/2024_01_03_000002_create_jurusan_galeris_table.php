<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jurusan_galeris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jurusan_id')->constrained('jurusans')->cascadeOnDelete();
            $table->string('gambar');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurusan_galeris');
    }
};
