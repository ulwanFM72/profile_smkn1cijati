@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<section class="page-header">
    <div class="container text-center" data-aos="fade-up">
        <h1>Galeri Kegiatan</h1>
        <p>Kumpulan momen kegiatan, prestasi, dan keseharian di sekolah. Klik foto untuk memperbesar.</p>
    </div>
</section>

<section class="section-block">
    <div class="container">

        @if($kategori->count())
            <div class="galeri-filter" data-aos="fade-up">
                <button type="button" class="filter-btn active" data-filter="semua">Semua</button>
                @foreach($kategori as $kat)
                    <button type="button" class="filter-btn" data-filter="{{ Str::slug($kat) }}">{{ $kat }}</button>
                @endforeach
            </div>
        @endif

        <div class="row g-4" id="galeriGrid">
            @forelse($galeri as $index => $foto)
                <div class="col-6 col-md-4 col-lg-3 galeri-item" data-kategori="{{ Str::slug($foto->kategori ?? '') }}" data-aos="zoom-in" data-aos-delay="{{ ($index % 8) * 60 }}">
                    <button type="button" class="card-galeri card-galeri-lg card-galeri-btn" data-lightbox
                            data-img="{{ asset('storage/' . $foto->gambar) }}"
                            data-caption="{{ $foto->judul }}">
                        <img src="{{ asset('storage/' . $foto->gambar) }}" alt="{{ $foto->judul }}" loading="lazy">
                        <div class="card-galeri-overlay">
                            <span class="badge-kategori">{{ $foto->kategori ?? 'Kegiatan' }}</span>
                            <span>{{ $foto->judul }}</span>
                        </div>
                        <span class="card-galeri-zoom-icon"><i class="bi bi-zoom-in"></i></span>
                    </button>
                </div>
            @empty
                <div class="col-12 text-center py-5" data-aos="fade-up">
                    <i class="bi bi-images display-4 text-muted"></i>
                    <p class="mt-3 text-body-muted">Belum ada foto galeri. Tambahkan melalui admin/seeder.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center py-5 d-none" id="galeriEmptyState">
            <i class="bi bi-emoji-frown display-4 text-muted"></i>
            <p class="mt-3 text-body-muted">Tidak ada foto untuk kategori ini.</p>
        </div>
    </div>
</section>

@endsection
