@extends('layouts.app')

@section('title', 'Jurusan')

@section('content')

<section class="page-header">
    <div class="container text-center" data-aos="fade-up">
        <h1>Jurusan</h1>
        <p>4 program keahlian yang tersedia untuk mempersiapkan siswa siap kerja, melanjutkan, atau berwirausaha.</p>
    </div>
</section>

<section class="section-block">
    <div class="container">
        <div class="row g-4">
            @forelse($jurusan as $index => $item)
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="card-ekskul-full">
                        <div class="card-ekskul-full-img">
                            @if($item->foto_sampul)
                                <img src="{{ asset('storage/' . $item->foto_sampul) }}" alt="{{ $item->nama }}" loading="lazy">
                            @else
                                <div class="card-ekskul-full-img-placeholder">
                                    <i class="bi {{ $item->icon ?? 'bi-mortarboard' }}"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-ekskul-full-body">
                            <h5>{{ $item->singkatan }}</h5>
                            <p class="fw-semibold text-body-muted" style="font-size: 13px;">{{ $item->nama }}</p>
                            <p>{{ Str::limit($item->deskripsi, 85) }}</p>
                            <a href="{{ route('jurusan.show', $item->slug) }}" class="card-ekskul-link">
                                Lihat Profil Jurusan <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5" data-aos="fade-up">
                    <i class="bi bi-mortarboard display-4 text-muted"></i>
                    <p class="mt-3 text-body-muted">Data jurusan belum tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
