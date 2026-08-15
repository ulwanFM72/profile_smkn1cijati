<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        // Rekap per angkatan + jurusan — satu baris per kombinasi, bukan per siswa.
        // Total tiap angkatan: X = 300, XI = 280, XII = 270 (total keseluruhan = 850).
        $data = [
            // Angkatan X
            ['angkatan' => 'X', 'jurusan' => 'RPL', 'jumlah' => 200],
            ['angkatan' => 'X', 'jurusan' => 'BD', 'jumlah' => 60],
            ['angkatan' => 'X', 'jurusan' => 'TO', 'jumlah' => 25],
            ['angkatan' => 'X', 'jurusan' => 'APHP', 'jumlah' => 15],

            // Angkatan XI
            ['angkatan' => 'XI', 'jurusan' => 'RPL', 'jumlah' => 180],
            ['angkatan' => 'XI', 'jurusan' => 'BD', 'jumlah' => 55],
            ['angkatan' => 'XI', 'jurusan' => 'TO', 'jumlah' => 25],
            ['angkatan' => 'XI', 'jurusan' => 'APHP', 'jumlah' => 20],

            // Angkatan XII
            ['angkatan' => 'XII', 'jurusan' => 'RPL', 'jumlah' => 170],
            ['angkatan' => 'XII', 'jurusan' => 'BD', 'jumlah' => 50],
            ['angkatan' => 'XII', 'jurusan' => 'TO', 'jumlah' => 30],
            ['angkatan' => 'XII', 'jurusan' => 'APHP', 'jumlah' => 20],
        ];

        foreach ($data as $item) {
            Siswa::create($item);
        }
    }
}
