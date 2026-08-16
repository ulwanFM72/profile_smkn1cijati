@extends('admin.layouts.app')

@section('title', 'Ringkasan')

@section('content')

<div class="admin-page-header">
    <h1>Ringkasan</h1>
</div>

<div class="admin-stat-grid">
    <div class="admin-stat-card">
        <div class="admin-stat-icon icon-purple"><i class="bi bi-newspaper"></i></div>
        <div>
            <p class="label">Total Berita</p>
            <p class="value">{{ $totalBerita }}</p>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon icon-green"><i class="bi bi-trophy"></i></div>
        <div>
            <p class="label">Total Ekstrakurikuler</p>
            <p class="value">{{ $totalEkstrakurikuler }}</p>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon icon-amber"><i class="bi bi-mortarboard"></i></div>
        <div>
            <p class="label">Total Jurusan</p>
            <p class="value">{{ $totalJurusan }}</p>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon icon-pink"><i class="bi bi-images"></i></div>
        <div>
            <p class="label">Total Foto Galeri</p>
            <p class="value">{{ $totalGaleri }}</p>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon icon-blue"><i class="bi bi-person-workspace"></i></div>
        <div>
            <p class="label">Total Guru</p>
            <p class="value">{{ $totalGuru }}</p>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon icon-purple"><i class="bi bi-people"></i></div>
        <div>
            <p class="label">Total Siswa</p>
            <p class="value">{{ $totalSiswa }}</p>
        </div>
    </div>
    <a href="{{ route('admin.profil.edit') }}" class="admin-stat-card" style="text-decoration:none;">
        <div class="admin-stat-icon icon-amber"><i class="bi bi-door-open"></i></div>
        <div>
            <p class="label">Jumlah Kelas</p>
            <p class="value">{{ $jumlahKelas }}</p>
        </div>
    </a>
</div>

<div class="admin-panel">
    <div class="admin-panel-header">
        Berita Terbaru
        <a href="{{ route('admin.berita.index') }}" class="btn-admin btn-admin-outline btn-admin-sm">Lihat Semua</a>
    </div>
    @if($beritaTerbaru->count())
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($beritaTerbaru as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->tanggal->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-state">
            <i class="bi bi-newspaper"></i>
            Belum ada data berita.
        </div>
    @endif
</div>

@endsection
