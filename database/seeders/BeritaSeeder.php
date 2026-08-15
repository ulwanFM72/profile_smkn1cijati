<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Siswa Raih Juara 1 Olimpiade Sains Tingkat Provinsi',
                'ringkasan' => 'Tim olimpiade sains sekolah berhasil membawa pulang medali emas dalam kompetisi tingkat provinsi yang diselenggarakan bulan ini.',
                'isi' => 'Tim olimpiade sains sekolah kembali menorehkan prestasi membanggakan dengan meraih juara 1 dalam Olimpiade Sains Nasional tingkat provinsi. Persiapan intensif selama tiga bulan membuahkan hasil yang manis bagi para siswa dan pembina.',
                'gambar' => 'berita/olimpiade-sains.jpg',
                'tanggal' => now()->subDays(3),
            ],
            [
                'judul' => 'Pelaksanaan Ujian Tengah Semester Ganjil Berjalan Lancar',
                'ringkasan' => 'Seluruh siswa mengikuti rangkaian ujian tengah semester dengan tertib dan disiplin sesuai jadwal yang telah ditentukan.',
                'isi' => 'Ujian Tengah Semester Ganjil telah dilaksanakan serentak di seluruh kelas. Pihak sekolah menyampaikan apresiasi atas kedisiplinan siswa dalam mengikuti setiap sesi ujian.',
                'gambar' => 'berita/uts.jpg',
                'tanggal' => now()->subDays(10),
            ],
            [
                'judul' => 'Kegiatan Bakti Sosial Peringati Hari Pendidikan Nasional',
                'ringkasan' => 'Siswa dan guru bergotong royong mengadakan kegiatan bakti sosial di lingkungan sekitar sekolah dalam rangka Hardiknas.',
                'isi' => 'Dalam rangka memperingati Hari Pendidikan Nasional, seluruh warga sekolah mengadakan kegiatan bakti sosial berupa pembagian sembako dan alat tulis kepada masyarakat sekitar.',
                'gambar' => 'berita/baksos.jpg',
                'tanggal' => now()->subDays(18),
            ],
            [
                'judul' => 'Workshop Literasi Digital untuk Guru dan Siswa',
                'ringkasan' => 'Sekolah mengadakan workshop literasi digital guna meningkatkan kemampuan guru dan siswa dalam memanfaatkan teknologi secara bijak.',
                'isi' => 'Workshop literasi digital menghadirkan narasumber dari praktisi teknologi pendidikan, membahas pemanfaatan teknologi secara aman dan produktif dalam proses belajar mengajar.',
                'gambar' => 'berita/literasi-digital.jpg',
                'tanggal' => now()->subDays(25),
            ],
        ];

        foreach ($data as $item) {
            $item['slug'] = Str::slug($item['judul']);
            Berita::create($item);
        }
    }
}
