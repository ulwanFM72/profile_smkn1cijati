<nav class="navbar navbar-expand-lg navbar-school navbar-transparent fixed-top" id="mainNavbar">
    <img src="{{ asset('images/logo-smkn1cijati.png') }}" alt="Logo Sekolah" class="brand-logo">
            <span class="brand-text">{{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Buka menu navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profil Sekolah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('ekstrakurikuler') ? 'active' : '' }}" href="{{ route('ekstrakurikuler') }}">Ekstrakurikuler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('jurusan') ? 'active' : '' }}" href="{{ route('jurusan') }}">Jurusan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ route('galeri') }}">Galeri</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-nav-cta" href="#kontak">Hubungi Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
