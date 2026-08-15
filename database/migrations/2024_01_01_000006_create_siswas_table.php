<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel siswas menyimpan REKAP jumlah per angkatan + jurusan (bukan satu baris per
        // siswa), supaya admin sekolah cukup mengisi beberapa baris saja — satu baris per
        // kombinasi angkatan & jurusan (mis. "X" + "RPL" = 200), bukan ratusan baris data
        // siswa satu per satu.
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('angkatan');   // contoh: "X", "XI", "XII"
            $table->string('jurusan');    // contoh: "RPL", "BD", "TO", "APHP"
            $table->unsignedInteger('jumlah')->default(0); // jumlah siswa di kombinasi tsb
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
