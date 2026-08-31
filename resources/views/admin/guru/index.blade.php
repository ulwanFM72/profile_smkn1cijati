@extends('admin.layouts.app')

@section('title', 'Guru')

@section('content')

{{-- JUDUL HALAMAN & TOMBOL AKSI --}}
<div class="admin-page-header">
    <h1>Kelola Guru</h1>
    <a href="{{ route('admin.guru.create') }}" class="btn-admin btn-admin-primary">
        <i class="bi bi-plus-lg"></i> Tambah Guru
    </a>
</div>

{{-- TABEL DAFTAR GURU --}}
<div class="admin-panel">
    @if($guru->count())
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($guru as $item)
                    <tr>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="thumb" style="border-radius: 50%;" alt="{{ $item->nama }}">
                            @else
                                <div class="thumb d-flex align-items-center justify-content-center bg-light" style="border-radius: 50%;"><i class="bi bi-person text-muted"></i></div>
                            @endif
                        </td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jabatan ?? '-' }}</td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('admin.guru.edit', $item) }}" class="btn-admin btn-admin-outline btn-admin-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.guru.destroy', $item) }}" onsubmit="return confirm('Hapus data guru ini?');">
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
            <i class="bi bi-person-workspace"></i>
            Belum ada data guru.
        </div>
    @endif
</div>

@endsection