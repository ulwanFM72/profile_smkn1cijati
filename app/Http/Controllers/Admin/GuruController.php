<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Aturan validasi yang dipakai bersama oleh store() dan update()
     */
    private function rules(): array
    {
        return [
            'nama'    => ['required', 'string', 'max:255', 'regex:/^[\pL\s\.\-\',]+$/u'],
            'jabatan' => ['nullable', 'string', 'max:255', 'regex:/^[\pL\s\.\-\',\/&]+$/u'],
            'foto'    => ['nullable', 'image', 'max:2048'],
        ];
    }

    /**
     * Pesan error kustom (Bahasa Indonesia) untuk aturan validasi di rules() di atas.
     */
    private function messages(): array
    {
        return [
            'nama.regex'    => 'Nama guru hanya boleh berisi huruf, spasi, titik, koma, dan strip (untuk gelar).',
            'jabatan.regex' => 'Jabatan hanya boleh berisi huruf, spasi, titik, koma, strip, garis miring, dan tanda &.',
        ];
    }

    /**
     * Tampilkan daftar seluruh guru di panel admin, terurut berdasarkan nama.
     */
    public function index()
    {
        $guru = Guru::orderBy('nama')->get();

        return view('admin.guru.index', compact('guru'));
    }

    /**
     * Tampilkan form tambah data guru baru.
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    /**
     * Simpan data guru baru: validasi input, unggah foto (jika ada), lalu simpan ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules(), $this->messages());

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($validated);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit untuk satu data guru.
     */
    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    /**
     * Perbarui data guru: validasi input, ganti foto lama dengan yang baru jika diunggah, lalu simpan.
     */
    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate($this->rules(), $this->messages());

        if ($request->hasFile('foto')) {
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }
            $validated['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($validated);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    /**
     * Hapus satu data guru beserta file fotonya (jika ada) dari penyimpanan.
     */
    public function destroy(Guru $guru)
    {
        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
