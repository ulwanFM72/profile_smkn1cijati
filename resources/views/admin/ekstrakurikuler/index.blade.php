@extends('admin.layouts.app')

@section('title', 'Ekstrakurikuler')

@section('content')

<div class="admin-page-header">
    <h1>Kelola Ekstrakurikuler</h1>
    <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn-admin btn-admin-primary">
        <i class="bi bi-plus-lg"></i> Tambah Ekstrakurikuler
    </a>
</div>

<div class="admin-panel">
    @if($ekstrakurikuler->count())
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Pembina</th>
                    <th>Jadwal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ekstrakurikuler as $item)
                    <tr>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="thumb" alt="{{ $item->nama }}">
                            @else
                                <div class="thumb d-flex align-items-center justify-content-center bg-light"><i class="bi {{ $item->icon ?? 'bi-stars' }} text-muted"></i></div>
                            @endif
                        </td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->pembina ?? '-' }}</td>
                        <td>{{ $item->jadwal ?? '-' }}</td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('admin.ekstrakurikuler.edit', $item) }}" class="btn-admin btn-admin-outline btn-admin-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.ekstrakurikuler.destroy', $item) }}" onsubmit="return confirm('Hapus ekstrakurikuler ini?');">
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
            <i class="bi bi-trophy"></i>
            Belum ada data ekstrakurikuler.
        </div>
    @endif
</div>

@endsection
