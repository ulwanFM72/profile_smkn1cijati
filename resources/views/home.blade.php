@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

{{-- HERO --}}
<section class="hero" id="top">
    <div class="hero-overlay"></div>
    <div class="hero-spotlight" id="heroSpotlight"></div>
    <div class="container hero-inner">
        <div class="row">
            <div class="col-lg-7 col-xl-6" data-aos="fade-up" data-aos-duration="700">
                <h1 class="hero-title">
                    {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
                </h1>
                <p class="hero-motto">
                    <i class="bi bi-quote"></i>
                    {{ $profil->motto ?? 'Cageur, Bageur, Bener, Pinter, Singer' }}
                </p>
                <p class="hero-desc">
                    {{ $profil->sambutan_kepala_sekolah ?? 'Selamat datang di ' . ($profil->nama_sekolah ?? 'SMK Negeri 1 Cijati') . ' — tempat setiap siswa dibimbing untuk berpikir kritis, berkarya, dan tumbuh menjadi pribadi yang berintegritas.' }}
                </p>
                <div class="hero-cta">
                    <a href="{{ route('profile') }}" class="animated-button animated-button-outline">
                        <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                        </svg>
                            <span class="text">Lihat Profil</span>
                                <span class="circle"></span>
                            <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path></svg>
                    </a>
                    <a href="{{ route('galeri') }}" class="animated-button animated-button-outline">
                        <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                        </svg>
                        <span class="text">Lihat Galeri</span>
                            <span class="circle"></span>
                            <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- STRIP STATISTIK MENGAMBANG DI BATAS BAWAH HERO --}}
    <div class="container hero-stats-wrap" data-aos="fade-up" data-aos-delay="200">
        <div class="hero-stats-bar">
            <div class="hero-stat-item">
                <i class="bi bi-door-open"></i>
                <div>
                    <strong><span class="counter" data-target="{{ $profil->jumlah_kelas ?? 0 }}">0</span></strong>
                    <span>Jumlah Kelas</span>
                </div>
            </div> 
            <div class="hero-stat-item">
                <i class="bi bi-people"></i>
                <div>
                    <strong><span class="counter" data-target="{{ $jumlahSiswa }}">0</span>+</strong>
                    <span>Siswa Aktif</span>
                </div>
            </div>
            <div class="hero-stat-item">
                <i class="bi bi-person-workspace"></i>
                <div>
                    <strong><span class="counter" data-target="{{ $jumlahGuru }}">0</span>+</strong>
                    <span>Tenaga Pendidik</span>
                </div>
            </div>
            <div class="hero-stat-item">
                <i class="bi bi-trophy"></i>
                <div>
                    <strong><span class="counter" data-target="{{ $jumlahEkstrakurikuler }}">0</span>+</strong>
                    <span>Ekstrakurikuler</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BERITA KEGIATAN SEKOLAH --}}
<section class="section-block">
    <div class="container">
        <div class="section-heading" data-aos="fade-up">
            <h2>Berita Kegiatan Sekolah</h2>
            <p>Ikuti perkembangan dan momen penting di lingkungan sekolah kami.</p>
        </div>

        <div class="row g-4">
            @forelse($berita as $index => $item)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
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
                @foreach([
                    ['judul' => 'Siswa Raih Juara 1 Olimpiade Sains', 'ringkasan' => 'Tim olimpiade sains sekolah berhasil membawa pulang medali emas dalam kompetisi tingkat provinsi.', 'tanggal' => now()],
                    ['judul' => 'Pelaksanaan UTS Ganjil Berjalan Lancar', 'ringkasan' => 'Seluruh siswa mengikuti rangkaian ujian tengah semester dengan tertib sesuai jadwal.', 'tanggal' => now()->subDays(7)],
                    ['judul' => 'Kegiatan Bakti Sosial Peringati Hardiknas', 'ringkasan' => 'Siswa dan guru bergotong royong mengadakan kegiatan bakti sosial di lingkungan sekitar.', 'tanggal' => now()->subDays(14)],
                ] as $index => $item)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="card-berita">
                            <div class="card-berita-img card-berita-img-placeholder">
                                <i class="bi bi-newspaper"></i>
                                <span class="card-berita-date"><i class="bi bi-calendar-event"></i> {{ $item['tanggal']->translatedFormat('d M Y') }}</span>
                            </div>
                            <div class="card-berita-body">
                                <h5>{{ $item['judul'] }}</h5>
                                <p>{{ $item['ringkasan'] }}</p>
                                <span class="card-berita-link text-muted">Selengkapnya <i class="bi bi-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('berita.index') }}" class="btn btn-outline-school">Lihat Semua Berita</a>
        </div>
    </div>
</section>

{{-- EKSTRAKURIKULER PREVIEW --}}
<section class="section-block">
    <div class="container">
        <div class="section-heading" data-aos="fade-up">
            <h2>Ekstrakurikuler Pilihan</h2>
            <p>Ruang bagi siswa mengasah minat di luar kelas, dari seni, olahraga, hingga sains.</p>
        </div>

        <div class="row g-4">
            @forelse($ekstrakurikuler as $index => $ekskul)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="card-ekskul">
                        <div class="card-ekskul-icon">
                            <i class="bi {{ $ekskul->icon ?? 'bi-stars' }}"></i>
                        </div>
                        <h5>{{ $ekskul->nama }}</h5>
                        <p>{{ Str::limit($ekskul->deskripsi, 90) }}</p>
                    </div>
                </div>
            @empty
                @foreach([
                    ['icon' => 'bi-trophy', 'nama' => 'Basket & Futsal', 'deskripsi' => 'Melatih sportivitas, kerja sama tim, dan fisik yang tangguh.'],
                    ['icon' => 'bi-easel2', 'nama' => 'Seni & Teater', 'deskripsi' => 'Wadah ekspresi kreatif siswa dalam seni peran dan visual.'],
                    ['icon' => 'bi-cpu', 'nama' => 'Robotika & Sains', 'deskripsi' => 'Eksplorasi teknologi dan pemecahan masalah berbasis proyek.'],
                ] as $index => $ekskul)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="card-ekskul">
                            <div class="card-ekskul-icon"><i class="bi {{ $ekskul['icon'] }}"></i></div>
                            <h5>{{ $ekskul['nama'] }}</h5>
                            <p>{{ $ekskul['deskripsi'] }}</p>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('ekstrakurikuler') }}" class="btn btn-outline-school">Lihat Semua Ekstrakurikuler</a>
        </div>
    </div>
</section>

{{-- GALERI SINGKAT (hover zoom + lightbox) --}}
<section class="section-block bg-soft">
    <div class="container">
        <div class="section-heading" data-aos="fade-up">
            <h2>Galeri Kegiatan</h2>
            <p>Cuplikan aktivitas, prestasi, dan keseharian di lingkungan sekolah. Klik foto untuk memperbesar.</p>
        </div>

        <div class="row g-4">
            @forelse($galeri as $index => $foto)
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="{{ $index * 80 }}">
                    <button type="button" class="card-galeri card-galeri-btn" data-lightbox
                            data-img="{{ asset('storage/' . $foto->gambar) }}"
                            data-caption="{{ $foto->judul }}">
                        <img src="{{ asset('storage/' . $foto->gambar) }}" alt="{{ $foto->judul }}" loading="lazy">
                        <div class="card-galeri-overlay">
                            <span>{{ $foto->judul }}</span>
                        </div>
                        <span class="card-galeri-zoom-icon"><i class="bi bi-zoom-in"></i></span>
                    </button>
                </div>
            @empty
                @foreach(range(1, 6) as $i)
                    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="{{ $i * 80 }}">
                        <div class="card-galeri card-galeri-placeholder">
                            <i class="bi bi-image"></i>
                            <span>Foto kegiatan #{{ $i }}</span>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('galeri') }}" class="animated-button" style="width: 320px; justify-content: center; margin: 0 auto; --circle-fill-size: 450px;">
    <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
        <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
    </svg>
    <span class="text">Jelajahi Galeri Lengkap</span>
    <span class="circle"></span>
    <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
        <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
    </svg>
</a>
        </div>
    </div>
</section>

{{-- CTA PENUTUP --}}
<section class="cta-section">
    <div class="container text-center" data-aos="fade-up">
        <h2>Tertarik Bergabung dengan Kami?</h2>
        <p>Daftarkan putra-putri Anda dan jadilah bagian dari komunitas belajar yang menyenangkan.</p>
        <a href="#kontak" class="btn btn-light-school">Hubungi Kami Sekarang</a>
    </div>
</section>

@endsection
