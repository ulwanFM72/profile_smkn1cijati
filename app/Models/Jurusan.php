<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusans';

    protected $fillable = [
        'nama',
        'singkatan',
        'slug',
        'deskripsi',
        'kompetensi',
        'kepala_program',
        'foto_kepala_program',
        'foto_sampul',
        'icon',
    ];

    /**
     * Gunakan kolom slug (bukan id) sebagai kunci untuk route model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Relasi: satu jurusan memiliki banyak foto galeri (JurusanGaleri).
     */
    public function galeri(): HasMany
    {
        return $this->hasMany(JurusanGaleri::class);
    }
}
