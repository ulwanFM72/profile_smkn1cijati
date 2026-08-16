<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Ekstrakurikuler;
use App\Models\Jurusan;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\ProfilSekolah;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();
        $totalEkstrakurikuler = Ekstrakurikuler::count();
        $totalJurusan = Jurusan::count();
        $totalGuru = Guru::count();
        $totalSiswa = Siswa::sum('jumlah');
        $jumlahKelas = ProfilSekolah::first()?->jumlah_kelas ?? 0;

        $beritaTerbaru = Berita::orderByDesc('tanggal')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalBerita',
            'totalGaleri',
            'totalEkstrakurikuler',
            'totalJurusan',
            'totalGuru',
            'totalSiswa',
            'jumlahKelas',
            'beritaTerbaru'
        ));
    }
}
