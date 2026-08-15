<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    use HasFactory;

    protected $table = 'profil_sekolahs';

    protected $fillable = [
        'nama_sekolah',
        'motto',
        'sambutan_kepala_sekolah',
        'nama_kepala_sekolah',
        'visi',
        'misi',
        'sejarah',
        'alamat',
        'telepon',
        'email',
        'npsn',
        'status',
        'akreditasi',
        'website',
        'instagram',
        'facebook',
        'youtube',
        'jumlah_siswa',
        'jumlah_guru',
        'jumlah_kelas',
        'tahun_berdiri',
    ];
}
