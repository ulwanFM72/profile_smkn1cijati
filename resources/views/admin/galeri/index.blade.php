@extends('admin.layouts.app')

@section('title', 'Galeri')

@section('content')

{{-- JUDUL HALAMAN & TOMBOL AKSI --}}
<div class="admin-page-header">
    <h1>Kelola Galeri</h1>
    <a href="{{ route('admin.galeri.create') }}" class="btn-admin btn-admin-primary">
        <i class="bi bi-plus-lg"></i> Tambah Foto
    </a>
</div>

{{-- TABEL DAFTAR FOTO GALERI --}}
<div class="admin-panel">
    @if($galeri->count())
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($galeri as $item)
                    <tr>
                        <td><img src="{{ asset('storage/' . $item->gambar) }}" class="thumb" alt="{{ $item->judul }}"></td>
                        <td>{{ $item->judul }}</td>
                        <td><span class="badge-status bg-light text-dark">{{ $item->kategori }}</span></td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('admin.galeri.edit', $item) }}" class="btn-admin btn-admin-outline btn-admin-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.galeri.destroy', $item) }}" onsubmit="return confirm('Hapus foto ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-admin btn-admin-danger btn-admin-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-state">
            <i class="bi bi-images"></i>
            Belum ada foto galeri.
        </div>
    @endif
</div>

@endsection
