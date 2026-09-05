@extends('layouts.app')

@section('title', 'Jurusan')

@section('content')

{{-- HEADER JUDUL HALAMAN --}}
<section class="page-header">
    <div class="page-header-spotlight" id="pageHeaderSpotlight"></div>
    <div class="container text-center" data-aos="fade-up">
        <h1>Jurusan</h1>
        <p>{{ $jurusan->count() }} program keahlian yang tersedia untuk mempersiapkan siswa siap kerja, melanjutkan, atau berwirausaha.</p>
    </div>
</section>

<section class="section-block">
    <div class="container">
        {{-- CAROUSEL COVERFLOW DAFTAR JURUSAN (LOGIKA GESER/KLIK DIATUR OLEH script.js) --}}
        @if($jurusan->count())
            <div class="coverflow-jurusan" data-aos="fade-up">
                <div class="coverflow-stage">
                    <div class="coverflow-track" id="coverflowTrack">
                        @foreach($jurusan as $index => $item)
                            <div class="coverflow-item" data-index="{{ $index }}">
                                <div class="coverflow-card">
                                    <div class="coverflow-card-img">
                                        @if($item->foto_sampul)
                                            <img src="{{ asset('storage/' . $item->foto_sampul) }}" alt="{{ $item->nama }}" loading="lazy" draggable="false">
                                        @else
                                            <div class="coverflow-card-img-placeholder">
                                                <i class="bi {{ $item->icon ?? 'bi-mortarboard' }}"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="coverflow-card-body">
                                        <h5>{{ $item->singkatan }}</h5>
                                        <p class="fw-semibold text-body-muted" style="font-size: 13px;">{{ $item->nama }}</p>
                                        <p>{{ Str::limit($item->deskripsi, 85) }}</p>
                                        <a href="{{ route('jurusan.show', $item->slug) }}" class="card-ekskul-link">
                                            Lihat Profil Jurusan <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- TITIK INDIKATOR (DOTS) UNTUK BERPINDAH ANTAR KARTU JURUSAN --}}
                <div class="coverflow-dots" id="coverflowDots">
                    @foreach($jurusan as $index => $item)
                        <button type="button" class="coverflow-dot" data-index="{{ $index }}" aria-label="Ke {{ $item->singkatan }}"></button>
                    @endforeach
                </div>
            </div>
        @else
            <div class="text-center py-5" data-aos="fade-up">
                <i class="bi bi-mortarboard display-4 text-muted"></i>
                <p class="mt-3 text-body-muted">Data jurusan belum tersedia.</p>
            </div>
        @endif
    </div>
</section>

@endsection