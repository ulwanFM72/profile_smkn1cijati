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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function galeri(): HasMany
    {
        return $this->hasMany(JurusanGaleri::class);
    }
}
