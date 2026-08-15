<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProfilSekolahSeeder::class,
            EkstrakurikulerSeeder::class,
            GaleriSeeder::class,
            BeritaSeeder::class,
            GuruSeeder::class,
            SiswaSeeder::class,
        ]);
    }
}
