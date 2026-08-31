<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;

class EkstrakurikulerController extends Controller
{
    /**
     * Tampilkan daftar seluruh ekstrakurikuler untuk halaman publik.
     */
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();

        return view('ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    /**
     * Tampilkan detail satu ekstrakurikuler beserta 3 ekstrakurikuler lain secara acak.
     */
    public function show(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikulerLain = Ekstrakurikuler::where('id', '!=', $ekstrakurikuler->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('ekstrakurikuler.show', compact('ekstrakurikuler', 'ekstrakurikulerLain'));
    }
}
