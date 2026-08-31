<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use App\Models\Guru;
use App\Models\Siswa;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil sekolah: data profil, daftar guru, serta
     * matriks jumlah siswa per angkatan & jurusan lengkap dengan totalnya.
     */
    public function index()
    {
        $profil = ProfilSekolah::first();
        $guru = Guru::all();
        $totalGuru = Guru::count();

        $urutanAngkatan = ['X', 'XI', 'XII'];
        $urutanJurusan = ['RPL', 'BD', 'TO', 'APHP'];

        $rows = Siswa::all();

        // Susun data jumlah siswa mentah menjadi matriks [angkatan][jurusan] => jumlah
        $matrixSiswa = [];
        foreach ($rows as $row) {
            $matrixSiswa[$row->angkatan][$row->jurusan] = $row->jumlah;
        }

        // Hitung total siswa per angkatan (baris) dari matriks di atas
        $totalPerAngkatan = [];
        foreach ($urutanAngkatan as $angkatan) {
            $totalPerAngkatan[$angkatan] = array_sum($matrixSiswa[$angkatan] ?? []);
        }

        // Hitung total siswa per jurusan (kolom) dari matriks di atas
        $totalPerJurusan = [];
        foreach ($urutanJurusan as $jurusan) {
            $totalPerJurusan[$jurusan] = 0;
            foreach ($urutanAngkatan as $angkatan) {
                $totalPerJurusan[$jurusan] += $matrixSiswa[$angkatan][$jurusan] ?? 0;
            }
        }

        $totalSiswa = Siswa::sum('jumlah');

        return view('profil', compact(
            'profil',
            'guru',
            'totalGuru',
            'matrixSiswa',
            'urutanAngkatan',
            'urutanJurusan',
            'totalPerAngkatan',
            'totalPerJurusan',
            'totalSiswa'
        ));
    }
}
