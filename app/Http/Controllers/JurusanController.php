<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;

class JurusanController extends Controller
{
    /**
     * Tampilkan daftar seluruh jurusan untuk halaman publik.
     */
    public function index()
    {
        $jurusan = Jurusan::all();

        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Tampilkan detail satu jurusan beserta galeri fotonya.
     */
    public function show(Jurusan $jurusan)
    {
        $jurusan->load('galeri');

        return view('jurusan.show', compact('jurusan'));
    }
}
