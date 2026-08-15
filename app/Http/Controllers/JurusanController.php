<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::all();

        return view('jurusan.index', compact('jurusan'));
    }

    public function show(Jurusan $jurusan)
    {
        $jurusan->load('galeri');

        return view('jurusan.show', compact('jurusan'));
    }
}
