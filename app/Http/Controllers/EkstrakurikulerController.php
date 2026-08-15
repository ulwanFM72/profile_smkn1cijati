<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();

        return view('ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    public function show(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikulerLain = Ekstrakurikuler::where('id', '!=', $ekstrakurikuler->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('ekstrakurikuler.show', compact('ekstrakurikuler', 'ekstrakurikulerLain'));
    }
}
