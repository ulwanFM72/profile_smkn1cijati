<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
  /**
   * Tampilkan daftar berita publik (dipaginasi 9 per halaman), terbaru lebih dulu.
   */
  public function index()
  {
    return view('berita.index');
  }

  /**
   * Tampilkan detail satu berita beserta 3 berita lain sebagai rekomendasi.
   */
  public function show(Berita $berita)
  {
    $beritaLain = Berita::where('id', '!=', $berita->id)
      ->orderByDesc('tanggal')
      ->take(3)
      ->get();

    return view('berita.show', compact('berita', 'beritaLain'));
  }
}
