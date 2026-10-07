@extends('layouts.app')

@section('title', $berita->judul)

@section('content')

<section class="page-header">
    <div class="container" data-aos="fade-up">
        <div class="text-center">
            <span class="eyebrow"><i class="bi bi-calendar-event"></i> {{ $berita->tanggal->translatedFormat('d F Y') }}</span>
            <h1 class="mt-2" style="max-width: 800px; margin: 0 auto;">{{ $berita->judul }}</h1>
        </div>
    </div>
</section>

<section class="section-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                     class="w-100 mb-4" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-soft);">

                <p class="text-body-muted fs-5 mb-4">{{ $berita->ringkasan }}</p>
                <div style="white-space: pre-line;" class="text-body-muted">{{ $berita->isi }}</div>

                <a href="{{ route('berita.index') }}" class="btn btn-outline-school mt-5">
                    <i class="bi bi-arrow-left"></i> Kembali ke Semua Berita
                </a>
            </div>
        </div>

        @if($beritaLain->count())
            <div class="section-heading mt-5 pt-5" data-aos="fade-up">
                <span class="eyebrow">Baca Juga</span>
                <h2>Berita Lainnya</h2>
            </div>
            <div class="row g-4">
                @foreach($beritaLain as $index => $item)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="card-berita">
                            <div class="card-berita-img">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" loading="lazy">
                                <span class="card-berita-date"><i class="bi bi-calendar-event"></i> {{ $item->tanggal->translatedFormat('d M Y') }}</span>
                            </div>
                            <div class="card-berita-body">
                                <h5>{{ $item->judul }}</h5>
                                <p>{{ Str::limit($item->ringkasan, 90) }}</p>
                                <a href="{{ route('berita.show', $item->slug) }}" class="card-berita-link">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@endsection
