<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    /**
     * Aturan validasi yang dipakai bersama oleh store() dan update()
     */
    private function rules(): array
    {
        return [
            'nama'       => ['required', 'string', 'max:255', 'regex:/^[\pL\s\.\-\',\(\)&0-9]+$/u'],
            'deskripsi'  => ['nullable', 'string'],
            'pembina'    => ['nullable', 'string', 'max:255', 'regex:/^[\pL\s\.\-\',:0-9]+$/u'],
            'jadwal'     => ['nullable', 'string', 'max:255', 'regex:/^[\pL\s\.\-\',:0-9]+$/u'],
            'icon'       => ['nullable', 'string', 'max:100', 'regex:/^[a-z0-9\-_\s]+$/i'],
            'gambar'     => ['nullable', 'image', 'max:2048'],
        ];
    }

    private function messages(): array
    {
        return [
            'nama.regex'       => 'Nama ekstrakurikuler hanya boleh berisi huruf, angka, spasi, dan tanda baca umum (. , - & ()).',
            'pembina.regex'    => 'Nama pembina hanya boleh berisi huruf, spasi, titik, koma, dan strip (untuk gelar).',
            'jadwal.regex'     => 'Jadwal hanya boleh berisi huruf, angka, spasi, titik, koma, strip, dan titik dua (contoh: Senin, 15:00 - 17:00).',
            'icon.regex'       => 'Icon hanya boleh berisi huruf, angka, strip, dan underscore (contoh: bi-trophy, fa-futbol).',
        ];
    }

    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::orderBy('nama')->get();

        return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules(), $this->messages());

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create($validated);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $validated = $request->validate($this->rules(), $this->messages());

        if ($request->hasFile('gambar')) {
            if ($ekstrakurikuler->gambar) {
                Storage::disk('public')->delete($ekstrakurikuler->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->update($validated);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        if ($ekstrakurikuler->gambar) {
            Storage::disk('public')->delete($ekstrakurikuler->gambar);
        }

        $ekstrakurikuler->delete();

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}
