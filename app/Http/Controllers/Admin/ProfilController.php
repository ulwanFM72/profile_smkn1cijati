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
            'nama_sekolah'              => ['required', 'string', 'max:255', 'regex:/^[\pL\s\.\-\',0-9]+$/u'],
            'motto'                     => 'nullable|string|max:255',
            'nama_kepala_sekolah'       => ['nullable', 'string', 'max:255', 'regex:/^[\pL\s\.\-\',]+$/u'],
            'sambutan_kepala_sekolah'   => 'nullable|string',
            'visi'                      => 'nullable|string',
            'misi'                      => 'nullable|string',
            'sejarah'                   => 'nullable|string',
            'npsn'                      => 'nullable|digits_between:1,50',
            'status'                    => 'nullable|string|max:50|in:Negeri,Swasta',
            'akreditasi'                => ['nullable', 'string', 'max:10', 'regex:/^(A|B|C|Belum Terakreditasi)$/'],
            'tahun_berdiri'             => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'jumlah_kelas'              => 'nullable|integer|min:0|max:9999',
            'alamat'                    => 'nullable|string|max:255',
            'telepon'                   => 'nullable|digits_between:8,15',
            'email'                     => 'nullable|email|max:255',
            'website'                   => 'nullable|url|max:255',
            'instagram'                 => 'nullable|url|max:255',
            'facebook'                  => 'nullable|url|max:255',
            'youtube'                   => 'nullable|url|max:255',
        ], [
            'nama_sekolah.regex'            => 'Nama sekolah hanya boleh berisi huruf, angka, spasi, titik, koma, dan strip.',
            'nama_kepala_sekolah.regex'     => 'Nama kepala sekolah hanya boleh berisi huruf, spasi, titik, koma, dan strip (untuk gelar).',
            'npsn.digits_between'           => 'NPSN hanya boleh berisi angka.',
            'telepon.digits_between'        => 'Nomor telepon hanya boleh berisi angka (8-15 digit).',
            'tahun_berdiri.digits'          => 'Tahun berdiri harus terdiri dari 4 digit angka.',
            'akreditasi.regex'              => 'Akreditasi harus A, B, C, atau Belum Terakreditasi.',
            'status.in'                     => 'Status harus Negeri atau Swasta.',
        ]);

        $profil->update($validated);

        return redirect()->route('admin.profil.edit')->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}
