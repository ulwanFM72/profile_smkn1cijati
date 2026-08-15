<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfilSekolah;

class ProfilSekolahSeeder extends Seeder
{
    public function run(): void
    {
        ProfilSekolah::create([
            'nama_sekolah' => 'SMA Nusantara Bakti',
            'motto' => 'Berkarakter, Berprestasi, Berbudaya',
            'nama_kepala_sekolah' => 'Dra. Siti Rahayu, M.Pd.',
            'sambutan_kepala_sekolah' => 'Selamat datang di SMA Nusantara Bakti. Kami berkomitmen membentuk generasi yang cerdas, berkarakter, dan siap menghadapi tantangan masa depan melalui pembelajaran yang bermakna dan menyenangkan.',
            'visi' => 'Menjadi lembaga pendidikan unggul yang melahirkan generasi cerdas, berkarakter, dan berdaya saing global.',
            'misi' => "Menyelenggarakan pembelajaran yang aktif, kreatif, dan menyenangkan.\nMembina karakter siswa berlandaskan nilai kejujuran dan disiplin.\nMengembangkan potensi siswa melalui kegiatan akademik dan non-akademik.\nMenjalin kerja sama dengan orang tua dan masyarakat.",
            'sejarah' => 'SMA Nusantara Bakti didirikan pada tahun 1999 dengan tujuan menyediakan pendidikan menengah atas yang berkualitas bagi masyarakat sekitar. Selama lebih dari dua dekade, sekolah ini terus berkembang, memperbarui kurikulum, dan meningkatkan fasilitas demi mendukung proses belajar mengajar yang optimal.',
            'alamat' => 'Jl. Pendidikan Raya No. 45, Jakarta',
            'telepon' => '(021) 555-0123',
            'email' => 'info@nusantarabakti.sch.id',
            'npsn' => '20106789',
            'status' => 'Swasta',
            'akreditasi' => 'A',
            'website' => 'www.nusantarabakti.sch.id',
            'instagram' => 'https://instagram.com/nusantarabakti',
            'facebook' => 'https://facebook.com/nusantarabakti',
            'youtube' => 'https://youtube.com/@nusantarabakti',
            'jumlah_siswa' => 850,
            'jumlah_guru' => 62,
            'jumlah_kelas' => 24,
            'tahun_berdiri' => 1999,
        ]);
    }
}
