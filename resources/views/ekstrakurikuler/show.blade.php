@extends('layouts.app')

@section('title', $ekstrakurikuler->nama)

@section('content')

{{-- HEADER JUDUL HALAMAN --}}
<section class="page-header">
    <div class="container text-center" data-aos="fade-up">
        <h1>{{ $ekstrakurikuler->nama }}</h1>
    </div>
</section>

{{-- DETAIL EKSTRAKURIKULER: FOTO, DESKRIPSI, PEMBINA & JADWAL --}}
<section class="section-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                @if($ekstrakurikuler->gambar)
                    <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}" alt="{{ $ekstrakurikuler->nama }}"
                         class="w-100 mb-4" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-soft); aspect-ratio: 16/9; object-fit: cover;">
                @endif

                <p class="text-body-muted fs-5">{{ $ekstrakurikuler->deskripsi }}</p>

                <ul class="ekskul-meta mt-4" style="font-size: 15px;">
                    @if($ekstrakurikuler->pembina)
                        <li><i class="bi bi-person-badge"></i> Pembina: {{ $ekstrakurikuler->pembina }}</li>
                    @endif
                    @if($ekstrakurikuler->jadwal)
                        <li><i class="bi bi-clock"></i> Jadwal Latihan: {{ $ekstrakurikuler->jadwal }}</li>
                    @endif
                </ul>

                <a href="{{ route('ekstrakurikuler') }}" class="btn btn-outline-school mt-4">
                    <i class="bi bi-arrow-left"></i> Kembali ke Semua Ekstrakurikuler
                </a>
            </div>
        </div>

        {{-- REKOMENDASI EKSTRAKURIKULER LAIN --}}
        @if($ekstrakurikulerLain->count())
            <div class="section-heading mt-5 pt-5" data-aos="fade-up">
                <span class="eyebrow">Lainnya</span>
                <h2>Ekstrakurikuler Lain</h2>
            </div>
            <div class="row g-4">
                @foreach($ekstrakurikulerLain as $index => $ekskul)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="card-ekskul">
                            <div class="card-ekskul-icon">
                                <i class="bi {{ $ekskul->icon ?? 'bi-stars' }}"></i>
                            </div>
                            <h5>{{ $ekskul->nama }}</h5>
                            <p>{{ Str::limit($ekskul->deskripsi, 90) }}</p>
                            <a href="{{ route('ekstrakurikuler.show', $ekskul->id) }}" class="card-ekskul-link mt-2 d-inline-flex">
                                Selengkapnya <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@endsection
