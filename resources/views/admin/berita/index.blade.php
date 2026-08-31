@extends('admin.layouts.app')

@section('title', 'Berita')

@section('content')

{{-- JUDUL HALAMAN & TOMBOL AKSI --}}
<div class="admin-page-header">
    <h1>Kelola Berita</h1>
    <a href="{{ route('admin.berita.create') }}" class="btn-admin btn-admin-primary">
        <i class="bi bi-plus-lg"></i> Tambah Berita
    </a>
</div>

{{-- TABEL DAFTAR BERITA --}}
<div class="admin-panel">
    @if($berita->count())
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($berita as $item)
                    <tr>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="thumb" alt="{{ $item->judul }}">
                            @else
                                <div class="thumb d-flex align-items-center justify-content-center bg-light"><i class="bi bi-image text-muted"></i></div>
                            @endif
                        </td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->tanggal->format('Y-m-d') }}</td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('admin.berita.edit', $item) }}" class="btn-admin btn-admin-outline btn-admin-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.berita.destroy', $item) }}" id="delete-form-{{ $item->id }}" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn-admin btn-admin-danger btn-admin-sm" onclick="confirmDelete('{{ $item->id }}', '{{ $item->judul }}')">
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
            <i class="bi bi-newspaper"></i>
            Belum ada data berita. Klik "Tambah Berita" untuk mulai menambahkan.
        </div>
    @endif
</div>

@endsection
