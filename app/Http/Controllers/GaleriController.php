<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->get();
        $kategori = Galeri::select('kategori')->whereNotNull('kategori')->distinct()->pluck('kategori');

        return view('galeri', compact('galeri', 'kategori'));
    }
}
