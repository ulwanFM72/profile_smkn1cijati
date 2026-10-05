@extends('admin.layouts.app')

@section('title', 'Edit Jurusan')

@section('content')

<div class="admin-page-header">
    <h1>Edit Jurusan — {{ $jurusan->singkatan }}</h1>
    <a href="{{ route('admin.jurusan.index') }}" class="btn-admin btn-admin-outline"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

{{-- FORM EDIT DATA UTAMA JURUSAN --}}
<div class="admin-panel">
    <div class="admin-panel-header">Data Jurusan</div>
    <div class="admin-panel-body">
        <form method="POST" action="{{ route('admin.jurusan.update', $jurusan) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.jurusan._form')
            <button type="submit" class="btn-admin btn-admin-primary"><i class="bi bi-check-lg"></i> Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- PENGELOLAAN GALERI FOTO KHUSUS JURUSAN INI --}}
<div class="admin-panel">
    <div class="admin-panel-header">
        Galeri Foto {{ $jurusan->singkatan }}
        <span class="badge-status bg-light text-dark">{{ $jurusan->galeri->count() }} foto</span>
    </div>
    <div class="admin-panel-body">

        {{-- FORM TAMBAH FOTO --}}
        <form method="POST" action="{{ route('admin.jurusan.galeri.store', $jurusan) }}" enctype="multipart/form-data" class="row g-3 align-items-end mb-4">
            @csrf
            <div class="col-md-5">
                <label class="admin-form-label">Foto</label>
                <input type="file" name="gambar" class="admin-form-control" accept="image/*" required>
            </div>
            <div class="col-md-5">
                <label class="admin-form-label">Keterangan</label>
                <input type="text" name="keterangan" class="admin-form-control" placeholder="Contoh: Praktik pemrograman web">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn-admin btn-admin-primary w-100"><i class="bi bi-plus-lg"></i> Tambah</button>
            </div>
        </form>

        {{-- DAFTAR FOTO --}}
        @if($jurusan->galeri->count())
            <div class="row g-3">
                @foreach($jurusan->galeri as $foto)
                    <div class="col-md-3 col-6">
                        <div class="border rounded-3 overflow-hidden">
                            <img src="{{ asset('storage/' . $foto->gambar) }}" class="w-100" style="aspect-ratio: 4/3; object-fit: cover;" alt="{{ $foto->keterangan }}">
                            <div class="p-2">
                                <p class="mb-2" style="font-size: 13px;">{{ $foto->keterangan ?: '-' }}</p>
                                <form method="POST" action="{{ route('admin.jurusan.galeri.destroy', [$jurusan, $foto]) }}" onsubmit="return confirm('Hapus foto ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-admin btn-admin-danger btn-admin-sm w-100">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state py-4">
                <i class="bi bi-images"></i>
                Belum ada foto galeri untuk jurusan ini.
            </div>
        @endif
    </div>
</div>

@endsection
