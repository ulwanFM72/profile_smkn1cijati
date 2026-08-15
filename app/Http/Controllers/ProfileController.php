<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use App\Models\Guru;
use App\Models\Siswa;

class ProfileController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();
        $guru = Guru::all();
        $totalGuru = Guru::count();

        $urutanAngkatan = ['X', 'XI', 'XII'];
        $urutanJurusan = ['RPL', 'BD', 'TO', 'APHP'];

        $rows = Siswa::all();

        $matrixSiswa = [];
        foreach ($rows as $row) {
            $matrixSiswa[$row->angkatan][$row->jurusan] = $row->jumlah;
        }

        $totalPerAngkatan = [];
        foreach ($urutanAngkatan as $angkatan) {
            $totalPerAngkatan[$angkatan] = array_sum($matrixSiswa[$angkatan] ?? []);
        }

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
