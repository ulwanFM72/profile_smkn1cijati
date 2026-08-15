<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\JurusanGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::withCount('galeri')->orderBy('nama')->get();

        return view('admin.jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'singkatan' => 'required|string|max:20',
            'deskripsi' => 'nullable|string',
            'kompetensi' => 'nullable|string',
            'kepala_program' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:100',
            'foto_sampul' => 'nullable|image|max:2048',
            'foto_kepala_program' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['singkatan']);

        if ($request->hasFile('foto_sampul')) {
            $validated['foto_sampul'] = $request->file('foto_sampul')->store('jurusan', 'public');
        }
        if ($request->hasFile('foto_kepala_program')) {
            $validated['foto_kepala_program'] = $request->file('foto_kepala_program')->store('jurusan', 'public');
        }

        Jurusan::create($validated);

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Jurusan $jurusan)
    {
        $jurusan->load('galeri');

        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'singkatan' => 'required|string|max:20',
            'deskripsi' => 'nullable|string',
            'kompetensi' => 'nullable|string',
            'kepala_program' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:100',
            'foto_sampul' => 'nullable|image|max:2048',
            'foto_kepala_program' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto_sampul')) {
            if ($jurusan->foto_sampul) {
                Storage::disk('public')->delete($jurusan->foto_sampul);
            }
            $validated['foto_sampul'] = $request->file('foto_sampul')->store('jurusan', 'public');
        }

        if ($request->hasFile('foto_kepala_program')) {
            if ($jurusan->foto_kepala_program) {
                Storage::disk('public')->delete($jurusan->foto_kepala_program);
            }
            $validated['foto_kepala_program'] = $request->file('foto_kepala_program')->store('jurusan', 'public');
        }

        $jurusan->update($validated);

        return redirect()->route('admin.jurusan.edit', $jurusan)->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        foreach ($jurusan->galeri as $foto) {
            Storage::disk('public')->delete($foto->gambar);
        }
        if ($jurusan->foto_sampul) {
            Storage::disk('public')->delete($jurusan->foto_sampul);
        }
        if ($jurusan->foto_kepala_program) {
            Storage::disk('public')->delete($jurusan->foto_kepala_program);
        }

        $jurusan->delete();

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil dihapus.');
    }

    // --- Kelola galeri foto per jurusan ---

    public function storeGaleri(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'gambar' => 'required|image|max:2048',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $path = $request->file('gambar')->store('jurusan', 'public');

        $jurusan->galeri()->create([
            'gambar' => $path,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.jurusan.edit', $jurusan)->with('success', 'Foto galeri jurusan berhasil ditambahkan.');
    }

    public function destroyGaleri(Jurusan $jurusan, JurusanGaleri $galeri)
    {
        Storage::disk('public')->delete($galeri->gambar);
        $galeri->delete();

        return redirect()->route('admin.jurusan.edit', $jurusan)->with('success', 'Foto galeri jurusan berhasil dihapus.');
    }
}
