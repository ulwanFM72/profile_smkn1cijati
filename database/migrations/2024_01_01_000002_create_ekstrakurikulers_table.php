<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ekstrakurikulers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->string('pembina')->nullable();
            $table->string('jadwal')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikulers');
    }
};
