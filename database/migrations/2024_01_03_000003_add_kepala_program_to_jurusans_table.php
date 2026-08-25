<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jurusans', function (Blueprint $table) {
            $table->string('kepala_program')->nullable()->after('kompetensi');
            $table->string('foto_kepala_program')->nullable()->after('kepala_program');
        });
    }

    public function down(): void
    {
        Schema::table('jurusans', function (Blueprint $table) {
            $table->dropColumn(['kepala_program', 'foto_kepala_program']);
        });
    }
};
