<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Rekayasa Perangkat Lunak',
                'singkatan' => 'RPL',
                'slug' => 'rpl',
                'deskripsi' => 'Jurusan yang mempelajari perancangan, pembuatan, dan pengembangan perangkat lunak (software), mulai dari aplikasi web, aplikasi mobile, hingga sistem informasi.',
                'kompetensi' => "Pemrograman web (HTML, CSS, JavaScript, PHP)\nPemrograman aplikasi mobile\nBasis data (database)\nStruktur data & algoritma\nPengujian & debugging perangkat lunak",
                'foto_sampul' => 'jurusan/rpl-sampul.jpg',
                'icon' => 'bi-code-slash',
                'galeri' => [
                    ['gambar' => 'jurusan/rpl-1.jpg', 'keterangan' => 'Praktik pemrograman web'],
                    ['gambar' => 'jurusan/rpl-2.jpg', 'keterangan' => 'Presentasi proyek aplikasi siswa'],
                    ['gambar' => 'jurusan/rpl-3.jpg', 'keterangan' => 'Lab komputer RPL'],
                ],
            ],
            [
                'nama' => 'Agribisnis Pengolahan Hasil Pertanian',
                'singkatan' => 'APHP',
                'slug' => 'aphp',
                'deskripsi' => 'Jurusan yang mempelajari cara mengolah hasil pertanian, perkebunan, dan peternakan menjadi produk pangan yang bernilai jual dan siap dipasarkan.',
                'kompetensi' => "Teknik pengolahan hasil pertanian\nPengemasan & pelabelan produk\nPengendalian mutu pangan\nKewirausahaan produk olahan\nSanitasi & keamanan pangan",
                'foto_sampul' => 'jurusan/aphp-sampul.jpg',
                'icon' => 'bi-basket',
                'galeri' => [
                    ['gambar' => 'jurusan/aphp-1.jpg', 'keterangan' => 'Praktik pengolahan hasil pertanian'],
                    ['gambar' => 'jurusan/aphp-2.jpg', 'keterangan' => 'Produk olahan hasil karya siswa'],
                    ['gambar' => 'jurusan/aphp-3.jpg', 'keterangan' => 'Laboratorium pengolahan pangan'],
                ],
            ],
            [
                'nama' => 'Teknik Otomotif',
                'singkatan' => 'TO',
                'slug' => 'to',
                'deskripsi' => 'Jurusan yang mempelajari perawatan, perbaikan, dan pemeliharaan kendaraan bermotor, mulai dari sistem mesin, kelistrikan, hingga sasis kendaraan.',
                'kompetensi' => "Perawatan & perbaikan mesin kendaraan\nSistem kelistrikan otomotif\nSistem pemindah tenaga\nChassis & pemindah daya\nK3 (Keselamatan & Kesehatan Kerja) bengkel",
                'foto_sampul' => 'jurusan/to-sampul.jpg',
                'icon' => 'bi-wrench-adjustable',
                'galeri' => [
                    ['gambar' => 'jurusan/to-1.jpg', 'keterangan' => 'Praktik perbaikan mesin'],
                    ['gambar' => 'jurusan/to-2.jpg', 'keterangan' => 'Bengkel praktik Teknik Otomotif'],
                    ['gambar' => 'jurusan/to-3.jpg', 'keterangan' => 'Uji kompetensi siswa'],
                ],
            ],
            [
                'nama' => 'Bisnis Daring dan Pemasaran',
                'singkatan' => 'BDP',
                'slug' => 'bdp',
                'deskripsi' => 'Jurusan yang mempelajari strategi pemasaran, penjualan, dan bisnis digital — mempersiapkan siswa untuk berwirausaha maupun bekerja di bidang pemasaran modern.',
                'kompetensi' => "Pemasaran digital (digital marketing)\nAdministrasi transaksi\nPengelolaan bisnis online\nKomunikasi bisnis\nKewirausahaan",
                'foto_sampul' => 'jurusan/bdp-sampul.jpg',
                'icon' => 'bi-graph-up-arrow',
                'galeri' => [
                    ['gambar' => 'jurusan/bdp-1.jpg', 'keterangan' => 'Praktik pemasaran digital'],
                    ['gambar' => 'jurusan/bdp-2.jpg', 'keterangan' => 'Simulasi bisnis siswa'],
                    ['gambar' => 'jurusan/bdp-3.jpg', 'keterangan' => 'Presentasi rencana bisnis'],
                ],
            ],
        ];

        foreach ($data as $item) {
            $galeri = $item['galeri'];
            unset($item['galeri']);

            $jurusan = Jurusan::create($item);
            $jurusan->galeri()->createMany($galeri);
        }
    }
}
