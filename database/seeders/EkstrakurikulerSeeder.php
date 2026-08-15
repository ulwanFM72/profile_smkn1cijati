<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekstrakurikuler;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Basket & Futsal',
                'gambar' => 'ekstrakurikuler/basket-futsal.jpg',
                'deskripsi' => 'Melatih sportivitas, kerja sama tim, dan fisik yang tangguh melalui latihan rutin dan kompetisi antarsekolah.',
                'pembina' => 'Bpk. Andi Wijaya, S.Pd.',
                'jadwal' => 'Selasa & Kamis, 15.30 - 17.00',
                'icon' => 'bi-trophy',
            ],
            [
                'nama' => 'Seni & Teater',
                'gambar' => 'ekstrakurikuler/seni-teater.jpg',
                'deskripsi' => 'Wadah ekspresi kreatif siswa dalam seni peran, musik, dan visual, dengan pementasan rutin setiap semester.',
                'pembina' => 'Ibu Dewi Lestari, S.Sn.',
                'jadwal' => 'Rabu, 15.30 - 17.00',
                'icon' => 'bi-easel2',
            ],
            [
                'nama' => 'Robotika & Sains',
                'gambar' => 'ekstrakurikuler/robotika-sains.jpg',
                'deskripsi' => 'Eksplorasi teknologi dan pemecahan masalah berbasis proyek, mempersiapkan siswa untuk kompetisi robotika nasional.',
                'pembina' => 'Bpk. Fajar Ramadhan, S.Kom.',
                'jadwal' => 'Jumat, 14.00 - 16.00',
                'icon' => 'bi-cpu',
            ],
            [
                'nama' => 'Pramuka',
                'gambar' => 'ekstrakurikuler/pramuka.jpg',
                'deskripsi' => 'Membentuk jiwa kepemimpinan, kemandirian, dan kepedulian sosial melalui kegiatan alam terbuka.',
                'pembina' => 'Ibu Rina Kartika, S.Pd.',
                'jadwal' => 'Sabtu, 08.00 - 11.00',
                'icon' => 'bi-tree',
            ],
            [
                'nama' => 'Paduan Suara',
                'gambar' => 'ekstrakurikuler/paduan-suara.jpg',
                'deskripsi' => 'Mengasah kemampuan vokal dan harmoni bermusik, tampil dalam berbagai acara resmi sekolah.',
                'pembina' => 'Ibu Maria Angelina, S.Sn.',
                'jadwal' => 'Senin, 15.30 - 17.00',
                'icon' => 'bi-mic',
            ],
            [
                'nama' => 'English Club',
                'gambar' => 'ekstrakurikuler/english-club.jpg',
                'deskripsi' => 'Meningkatkan kepercayaan diri berbahasa Inggris melalui debat, drama, dan diskusi tematik.',
                'pembina' => 'Bpk. Kevin Pratama, S.Pd.',
                'jadwal' => 'Kamis, 15.30 - 17.00',
                'icon' => 'bi-translate',
            ],
        ];

        foreach ($data as $item) {
            Ekstrakurikuler::create($item);
        }
    }
}
