<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['judul' => 'Upacara Bendera Senin Pagi', 'kategori' => 'Upacara', 'gambar' => 'galeri/upacara-1.jpg'],
            ['judul' => 'Upacara Hari Kemerdekaan', 'kategori' => 'Upacara', 'gambar' => 'galeri/upacara-2.jpg'],
            ['judul' => 'Juara 1 Olimpiade Sains', 'kategori' => 'Perlombaan', 'gambar' => 'galeri/lomba-1.jpg'],
            ['judul' => 'Turnamen Basket Antarkelas', 'kategori' => 'Perlombaan', 'gambar' => 'galeri/lomba-2.jpg'],
            ['judul' => 'Praktikum Laboratorium IPA', 'kategori' => 'Kegiatan Belajar', 'gambar' => 'galeri/belajar-1.jpg'],
            ['judul' => 'Diskusi Kelompok di Perpustakaan', 'kategori' => 'Kegiatan Belajar', 'gambar' => 'galeri/belajar-2.jpg'],
            ['judul' => 'Latihan Rutin Pramuka', 'kategori' => 'Ekstrakurikuler', 'gambar' => 'galeri/ekskul-1.jpg'],
            ['judul' => 'Latihan Paduan Suara', 'kategori' => 'Ekstrakurikuler', 'gambar' => 'galeri/ekskul-2.jpg'],
            ['judul' => 'Pentas Seni Tahunan', 'kategori' => 'Ekstrakurikuler', 'gambar' => 'galeri/ekskul-3.jpg'],
        ];

        foreach ($data as $item) {
            Galeri::create($item);
        }
    }
}
