<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function edit()
    {
        $profil = ProfilSekolah::firstOrCreate([], ['nama_sekolah' => 'Nama Sekolah']);

        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = ProfilSekolah::firstOrCreate([], ['nama_sekolah' => 'Nama Sekolah']);

        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'motto' => 'nullable|string|max:255',
            'nama_kepala_sekolah' => 'nullable|string|max:255',
            'sambutan_kepala_sekolah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'npsn' => 'nullable|string|max:50',
            'status' => 'nullable|string|max:50',
            'akreditasi' => 'nullable|string|max:10',
            'tahun_berdiri' => 'nullable|integer|min:1900|max:' . date('Y'),
            'jumlah_kelas' => 'nullable|integer|min:0|max:9999',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'instagram' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
        ]);

        $profil->update($validated);

        return redirect()->route('admin.profil.edit')->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}
