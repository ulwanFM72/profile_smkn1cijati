@extends('layouts.app')

@section('title', 'Ekstrakurikuler')

@section('content')

<section class="page-header">
    <div class="container text-center" data-aos="fade-up">
        <h1>Ekstrakurikuler</h1>
        <p>Beragam kegiatan untuk mengasah minat dan bakat siswa di luar jam pelajaran.</p>
    </div>
</section>

<section class="section-block">
    <button class="btn-daftar-eskul" onclick="window.open('https://reg-eskul.smkn1cijati.sch.id/', '_blank')">Daftar Ekstrakurikuler Disini</button>
    <div class="container">
        <div class="row g-4">
            @forelse($ekstrakurikuler as $index => $ekskul)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    <div class="card-ekskul-full">
                        <div class="card-ekskul-full-img">
                            @if($ekskul->gambar)
                                <img src="{{ asset('storage/' . $ekskul->gambar) }}" alt="{{ $ekskul->nama }}" loading="lazy">
                            @else
                                <div class="card-ekskul-full-img-placeholder">
                                    <i class="bi {{ $ekskul->icon ?? 'bi-stars' }}"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-ekskul-full-body">
                            <h5>{{ $ekskul->nama }}</h5>
                            <p>{{ Str::limit($ekskul->deskripsi, 100) }}</p>
                            @if($ekskul->jadwal)
                                <div class="ekskul-jadwal">
                                    <i class="bi bi-clock"></i> {{ $ekskul->jadwal }}
                                </div>
                            @endif
                            <a href="{{ route('ekstrakurikuler.show', $ekskul->id) }}" class="card-ekskul-link">
                                Selengkapnya <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5" data-aos="fade-up">
                    <i class="bi bi-inbox display-4 text-muted"></i>
                    <p class="mt-3 text-body-muted">Data ekstrakurikuler belum tersedia. Silakan tambahkan melalui admin/seeder.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
