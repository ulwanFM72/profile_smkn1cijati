<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'slug',
        'ringkasan',
        'isi',
        'gambar',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
