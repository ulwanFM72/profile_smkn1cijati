@extends('admin.layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

<div class="admin-page-header">
    <h1>Kelola Profil Sekolah</h1>
</div>

<form method="POST" action="{{ route('admin.profil.update') }}">
    @csrf
    @method('PUT')

    <div class="admin-panel">
        <div class="admin-panel-header">Identitas Sekolah</div>
        <div class="admin-panel-body">
            <div class="row">
                <div class="col-md-8 admin-form-group">
                    <label class="admin-form-label">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="admin-form-control" value="{{ old('nama_sekolah', $profil->nama_sekolah) }}" required>
                </div>
                <div class="col-md-4 admin-form-group">
                    <label class="admin-form-label">Tahun Berdiri</label>
                    <input type="number" name="tahun_berdiri" class="admin-form-control" value="{{ old('tahun_berdiri', $profil->tahun_berdiri) }}">
                </div>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Motto</label>
                <input type="text" name="motto" class="admin-form-control" value="{{ old('motto', $profil->motto) }}">
            </div>
            <div class="row">
                <div class="col-md-4 admin-form-group">
                    <label class="admin-form-label">NPSN</label>
                    <input type="text" name="npsn" class="admin-form-control" value="{{ old('npsn', $profil->npsn) }}">
                </div>
                <div class="col-md-4 admin-form-group">
                    <label class="admin-form-label">Status</label>
                    <input type="text" name="status" class="admin-form-control" value="{{ old('status', $profil->status) }}" placeholder="Negeri / Swasta">
                </div>
                <div class="col-md-4 admin-form-group">
                    <label class="admin-form-label">Akreditasi</label>
                    <input type="text" name="akreditasi" class="admin-form-control" value="{{ old('akreditasi', $profil->akreditasi) }}" placeholder="A / B / C">
                </div>
            </div>
        </div>
    </div>

    <div class="admin-panel">
        <div class="admin-panel-header">Kepala Sekolah</div>
        <div class="admin-panel-body">
            <div class="admin-form-group">
                <label class="admin-form-label">Nama Kepala Sekolah</label>
                <input type="text" name="nama_kepala_sekolah" class="admin-form-control" value="{{ old('nama_kepala_sekolah', $profil->nama_kepala_sekolah) }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Sambutan Kepala Sekolah</label>
                <textarea name="sambutan_kepala_sekolah" rows="4" class="admin-form-control">{{ old('sambutan_kepala_sekolah', $profil->sambutan_kepala_sekolah) }}</textarea>
            </div>
        </div>
    </div>

    <div class="admin-panel">
        <div class="admin-panel-header">Sejarah, Visi & Misi</div>
        <div class="admin-panel-body">
            <div class="admin-form-group">
                <label class="admin-form-label">Sejarah Sekolah</label>
                <textarea name="sejarah" rows="4" class="admin-form-control">{{ old('sejarah', $profil->sejarah) }}</textarea>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Visi</label>
                <textarea name="visi" rows="2" class="admin-form-control">{{ old('visi', $profil->visi) }}</textarea>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Misi</label>
                <textarea name="misi" rows="4" class="admin-form-control">{{ old('misi', $profil->misi) }}</textarea>
                <p class="admin-form-hint">Satu poin per baris.</p>
            </div>
        </div>
    </div>

    <div class="admin-panel">
        <div class="admin-panel-header">Kontak</div>
        <div class="admin-panel-body">
            <div class="admin-form-group">
                <label class="admin-form-label">Alamat</label>
                <input type="text" name="alamat" class="admin-form-control" value="{{ old('alamat', $profil->alamat) }}">
            </div>
            <div class="row">
                <div class="col-md-6 admin-form-group">
                    <label class="admin-form-label">Nomor Telepon</label>
                    <input type="text" name="telepon" class="admin-form-control" value="{{ old('telepon', $profil->telepon) }}">
                </div>
                <div class="col-md-6 admin-form-group">
                    <label class="admin-form-label">Email</label>
                    <input type="email" name="email" class="admin-form-control" value="{{ old('email', $profil->email) }}">
                </div>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Website</label>
                <input type="text" name="website" class="admin-form-control" value="{{ old('website', $profil->website) }}">
            </div>
        </div>
    </div>

    <div class="admin-panel">
        <div class="admin-panel-header">Sosial Media</div>
        <div class="admin-panel-body">
            <div class="admin-form-group">
                <label class="admin-form-label"><i class="bi bi-instagram"></i> Instagram</label>
                <input type="url" name="instagram" class="admin-form-control" value="{{ old('instagram', $profil->instagram) }}" placeholder="https://instagram.com/namaakun">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label"><i class="bi bi-facebook"></i> Facebook</label>
                <input type="url" name="facebook" class="admin-form-control" value="{{ old('facebook', $profil->facebook) }}" placeholder="https://facebook.com/namaakun">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label"><i class="bi bi-youtube"></i> YouTube</label>
                <input type="url" name="youtube" class="admin-form-control" value="{{ old('youtube', $profil->youtube) }}" placeholder="https://youtube.com/@namaakun">
            </div>
        </div>
    </div>

    <button type="submit" class="btn-admin btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan Semua Perubahan</button>
</form>

@endsection
