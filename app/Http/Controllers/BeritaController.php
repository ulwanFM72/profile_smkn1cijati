<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
  public function index()
  {
    $berita = Berita::orderByDesc('tanggal')->paginate(9);

    return view('berita.index', compact('berita'));
  }

  public function show(Berita $berita)
  {
    $beritaLain = Berita::where('id', '!=', $berita->id)
      ->orderByDesc('tanggal')
      ->take(3)
      ->get();

    return view('berita.show', compact('berita', 'beritaLain'));
  }
}
