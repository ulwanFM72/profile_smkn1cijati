@extends('layouts.app')

@section('title', 'Berita Sekolah')

@section('content')

<section class="page-header">
    <div class="container text-center" data-aos="fade-up">
        <h1>Berita Kegiatan Sekolah</h1>
        <p>Kumpulan informasi dan dokumentasi kegiatan terbaru di sekolah kami.</p>
    </div>
</section>

<section class="section-block">
    <div class="container">
        <div class="row g-4">
            @forelse($berita as $index => $item)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    <div class="card-berita">
                        <div class="card-berita-img">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" loading="lazy">
                            <span class="card-berita-date">
                                <i class="bi bi-calendar-event"></i> {{ $item->tanggal->translatedFormat('d M Y') }}
                            </span>
                        </div>
                        <div class="card-berita-body">
                            <h5>{{ $item->judul }}</h5>
                            <p>{{ Str::limit($item->ringkasan, 100) }}</p>
                            <a href="{{ route('berita.show', $item->slug) }}" class="card-berita-link">
                                Selengkapnya <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5" data-aos="fade-up">
                    <i class="bi bi-newspaper display-4 text-muted"></i>
                    <p class="mt-3 text-body-muted">Belum ada berita. Tambahkan melalui admin/seeder.</p>
                </div>
            @endforelse
        </div>

        @if(method_exists($berita, 'links'))
            <div class="mt-5 d-flex justify-content-center">
                {{ $berita->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</section>

@endsection