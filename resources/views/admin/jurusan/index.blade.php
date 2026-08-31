@extends('admin.layouts.app')

@section('title', 'Jurusan')

@section('content')

{{-- JUDUL HALAMAN & TOMBOL AKSI --}}
<div class="admin-page-header">
    <h1>Kelola Jurusan</h1>
    <a href="{{ route('admin.jurusan.create') }}" class="btn-admin btn-admin-primary">
        <i class="bi bi-plus-lg"></i> Tambah Jurusan
    </a>
</div>

{{-- TABEL DAFTAR JURUSAN --}}
<div class="admin-panel">
    @if($jurusan->count())
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Singkatan</th>
                    <th>Nama Jurusan</th>
                    <th>Kepala Program</th>
                    <th>Jml. Foto Galeri</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jurusan as $item)
                    <tr>
                        <td>
                            @if($item->foto_sampul)
                                <img src="{{ asset('storage/' . $item->foto_sampul) }}" class="thumb" alt="{{ $item->nama }}">
                            @else
                                <div class="thumb d-flex align-items-center justify-content-center bg-light"><i class="bi {{ $item->icon ?? 'bi-mortarboard' }} text-muted"></i></div>
                            @endif
                        </td>
                        <td><strong>{{ $item->singkatan }}</strong></td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kepala_program ?? '-' }}</td>
                        <td>{{ $item->galeri_count }} foto</td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('admin.jurusan.edit', $item) }}" class="btn-admin btn-admin-outline btn-admin-sm">
                                    <i class="bi bi-pencil"></i> Kelola
                                </a>
                                <form method="POST" action="{{ route('admin.jurusan.destroy', $item) }}" onsubmit="return confirm('Hapus jurusan ini beserta seluruh galerinya?');">
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
            <i class="bi bi-mortarboard"></i>
            Belum ada data jurusan.
        </div>
    @endif
</div>

@endsection
