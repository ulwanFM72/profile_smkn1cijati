@extends('layouts.app')

@section('title', $jurusan->nama)

@section('content')

<section class="page-header">
    <div class="container text-center" data-aos="fade-up">
        <h1>{{ $jurusan->nama }}</h1>
    </div>
</section>

<section class="section-block">
    <div class="container">
        <div class="row gy-5 align-items-start">
            <div class="col-lg-6" data-aos="fade-right">
                @if($jurusan->foto_sampul)
    <div class="jurusan-foto-wrap">
        <img src="{{ asset('storage/' . $jurusan->foto_sampul) }}" alt="{{ $jurusan->nama }}">
    </div>
@endif

                <h2 class="mb-3">Tentang Jurusan</h2>
                <p class="text-body-muted">{{ $jurusan->deskripsi }}</p>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="vm-card">
                    <div class="vm-icon"><i class="bi {{ $jurusan->icon ?? 'bi-mortarboard' }}"></i></div>
                    <h5>Yang Dipelajari</h5>
                    @if($jurusan->kompetensi)
                        <ul class="ekskul-meta" style="font-size: 15px;">
                            @foreach(explode("\n", $jurusan->kompetensi) as $poin)
                                @if(trim($poin) !== '')
                                    <li><i class="bi bi-check-circle"></i> {{ trim($poin) }}</li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <p>Informasi kompetensi belum tersedia.</p>
                    @endif
                </div>

                <a href="{{ route('jurusan') }}" class="btn btn-outline-school mt-4">
                    <i class="bi bi-arrow-left"></i> Kembali ke Semua Jurusan
                </a>
            </div>
        </div>

        @if($jurusan->kepala_program)
        <div class="row justify-content-center mt-5" data-aos="fade-up">
            <div class="col-md-5">
                <div class="card-guru" style="padding: 30px;">
                    <div class="card-guru-photo" style="width: 100px; height: 100px;">
                        @if($jurusan->foto_kepala_program)
                            <img src="{{ asset('storage/' . $jurusan->foto_kepala_program) }}" alt="{{ $jurusan->kepala_program }}" loading="lazy">
                        @else
                            <div class="card-guru-photo-placeholder"><i class="bi bi-person"></i></div>
                        @endif
                    </div>
                    <p class="eyebrow mb-1" style="font-size: 11px;">Kepala Program Keahlian</p>
                    <h6 style="font-size: 17px;">{{ $jurusan->kepala_program }}</h6>
                    <p>{{ $jurusan->singkatan }} &middot; {{ $jurusan->nama }}</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@if($jurusan->galeri->count())
<section class="section-block bg-soft">
    <div class="container">
        <div class="section-heading" data-aos="fade-up">
            <h2>Galeri {{ $jurusan->singkatan }}</h2>
            <p>Cuplikan kegiatan & praktik siswa jurusan {{ $jurusan->nama }}. Klik foto untuk memperbesar.</p>
        </div>

        <div class="row g-4">
            @foreach($jurusan->galeri as $index => $foto)
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="{{ ($index % 6) * 80 }}">
                    <button type="button" class="card-galeri card-galeri-btn" data-lightbox
                            data-img="{{ asset('storage/' . $foto->gambar) }}"
                            data-caption="{{ $foto->keterangan }}">
                        <img src="{{ asset('storage/' . $foto->gambar) }}" alt="{{ $foto->keterangan }}" loading="lazy">
                        <div class="card-galeri-overlay">
                            <span>{{ $foto->keterangan }}</span>
                        </div>
                        <span class="card-galeri-zoom-icon"><i class="bi bi-zoom-in"></i></span>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
