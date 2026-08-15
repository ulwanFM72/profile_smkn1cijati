<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JurusanGaleri extends Model
{
    use HasFactory;

    protected $table = 'jurusan_galeris';

    protected $fillable = [
        'jurusan_id',
        'gambar',
        'keterangan',
    ];

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }
}
