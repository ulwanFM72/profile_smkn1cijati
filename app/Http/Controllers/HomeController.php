<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\Siswa;

class HomeController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();
        $ekstrakurikuler = Ekstrakurikuler::latest()->take(3)->get();
        $galeri = Galeri::latest()->take(6)->get();
        $berita = Berita::orderByDesc('tanggal')->take(3)->get();

        $jumlahEkstrakurikuler = Ekstrakurikuler::count();
        $jumlahGuru = Guru::count();
        $jumlahSiswa = Siswa::sum('jumlah');

        return view('home', compact(
            'profil',
            'ekstrakurikuler',
            'galeri',
            'berita',
            'jumlahEkstrakurikuler',
            'jumlahGuru',
            'jumlahSiswa'
        ));
    }
}
