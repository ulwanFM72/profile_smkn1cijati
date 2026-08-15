<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Dra. Siti Rahayu, M.Pd.', 'jabatan' => 'Kepala Sekolah', 'foto' => 'guru/siti-rahayu.jpg'],
            ['nama' => 'Andi Wijaya, S.Pd.', 'jabatan' => 'Wakil Kepala Sekolah Bidang Kesiswaan', 'foto' => 'guru/andi-wijaya.jpg'],
            ['nama' => 'Dewi Lestari, S.Sn.', 'jabatan' => 'Guru Seni Budaya', 'foto' => 'guru/dewi-lestari.jpg'],
            ['nama' => 'Fajar Ramadhan, S.Kom.', 'jabatan' => 'Guru Informatika', 'foto' => 'guru/fajar-ramadhan.jpg'],
            ['nama' => 'Rina Kartika, S.Pd.', 'jabatan' => 'Guru Bimbingan Konseling', 'foto' => 'guru/rina-kartika.jpg'],
            ['nama' => 'Kevin Pratama, S.Pd.', 'jabatan' => 'Guru Bahasa Inggris', 'foto' => 'guru/kevin-pratama.jpg'],
        ];

        foreach ($data as $item) {
            Guru::create($item);
        }
    }
}
