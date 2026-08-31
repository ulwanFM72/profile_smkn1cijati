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
    /**
     * Aturan validasi yang dipakai bersama oleh store() dan update()
     */
    private function rules(): array
    {
        return [
            'nama'                 => ['required', 'string', 'max:255', 'regex:/^[\pL\s\.\-\'&]+$/u'],
            'singkatan'            => ['required', 'string', 'max:20', 'regex:/^[\pL]+$/u'],
            'deskripsi'            => ['nullable', 'string'],
            'kompetensi'           => ['nullable', 'string'],
            'kepala_program'       => ['nullable', 'string', 'max:255', 'regex:/^[\pL\s\.\-\',]+$/u'],
            'icon'                 => ['nullable', 'string', 'max:100', 'regex:/^[a-z0-9\-_\s]+$/i'],
            'foto_sampul'          => ['nullable', 'image', 'max:2048'],
            'foto_kepala_program'  => ['nullable', 'image', 'max:2048'],
        ];
    }

    /**
     * Pesan error kustom (Bahasa Indonesia) untuk aturan validasi di rules() di atas.
     */
    private function messages(): array
    {
        return [
            'nama.regex'              => 'Nama jurusan hanya boleh berisi huruf dan spasi.',
            'singkatan.regex'         => 'Singkatan hanya boleh berisi huruf, tanpa spasi, angka, atau simbol.',
            'kepala_program.regex'    => 'Nama kepala program hanya boleh berisi huruf, spasi, titik, koma, dan strip (untuk gelar).',
            'icon.regex'              => 'Icon hanya boleh berisi huruf, angka, strip, dan underscore (contoh: bi-cpu, fa-laptop-code).',
        ];
    }

    /**
     * Tampilkan daftar seluruh jurusan di panel admin, lengkap dengan jumlah foto galerinya.
     */
    public function index()
    {
        $jurusan = Jurusan::withCount('galeri')->orderBy('nama')->get();

        return view('admin.jurusan.index', compact('jurusan'));
    }

    /**
     * Tampilkan form tambah jurusan baru.
     */
    public function create()
    {
        return view('admin.jurusan.create');
    }

    /**
     * Simpan jurusan baru: validasi input, buat slug dari singkatan, unggah foto sampul
     * & foto kepala program (jika ada), lalu simpan ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules(), $this->messages());

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

    /**
     * Tampilkan form edit untuk satu jurusan beserta daftar foto galerinya.
     */
    public function edit(Jurusan $jurusan)
    {
        $jurusan->load('galeri');

        return view('admin.jurusan.edit', compact('jurusan'));
    }

    /**
     * Perbarui data jurusan: validasi input, ganti foto sampul & foto kepala program
     * lama dengan yang baru jika diunggah ulang, lalu simpan.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $validated = $request->validate($this->rules(), $this->messages());

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

    /**
     * Hapus satu jurusan beserta seluruh foto galerinya, foto sampul, dan foto kepala program
     * dari penyimpanan sebelum data jurusan dihapus dari database.
     */
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

    // ===== KELOLA GALERI FOTO KHUSUS PER JURUSAN =====

    /**
     * Tambahkan satu foto ke galeri milik sebuah jurusan.
     */
    public function storeGaleri(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'gambar'     => ['required', 'image', 'max:2048'],
            'keterangan' => ['nullable', 'string', 'max:255'],
        ]);

        $path = $request->file('gambar')->store('jurusan', 'public');

        $jurusan->galeri()->create([
            'gambar' => $path,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.jurusan.edit', $jurusan)->with('success', 'Foto galeri jurusan berhasil ditambahkan.');
    }

    /**
     * Hapus satu foto dari galeri milik sebuah jurusan, beserta file gambarnya.
     */
    public function destroyGaleri(Jurusan $jurusan, JurusanGaleri $galeri)
    {
        Storage::disk('public')->delete($galeri->gambar);
        $galeri->delete();

        return redirect()->route('admin.jurusan.edit', $jurusan)->with('success', 'Foto galeri jurusan berhasil dihapus.');
    }
}
