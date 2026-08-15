<footer class="footer-school" id="kontak">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4">
                <a class="brand-text footer-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-smkn1cijati.png') }}" alt="Logo Sekolah" class="brand-logo">
                    {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
                </a>
                <p class="footer-desc mt-3">
                    {{ Str::limit($profil->visi ?? 'Mendidik generasi berkarakter, cerdas, dan siap menghadapi masa depan.', 140) }}
                </p>
            </div>

            <div class="col-lg-2 col-6">
                <h6 class="footer-title">Navigasi</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('profile') }}">Profil Sekolah</a></li>
                    <li><a href="{{ route('ekstrakurikuler') }}">Ekstrakurikuler</a></li>
                    <li><a href="{{ route('galeri') }}">Galeri</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-6">
                <h6 class="footer-title">Kontak</h6>
                <ul class="footer-links">
                    <li><i class="bi bi-geo-alt"></i> {{ $profil->alamat ?? 'Jl. Pendidikan No. 1, Indonesia' }}</li>
                    <li><i class="bi bi-telephone"></i> {{ $profil->telepon ?? '(021) 000-0000' }}</li>
                    <li><i class="bi bi-envelope"></i> {{ $profil->email ?? 'info@sekolah.sch.id' }}</li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h6 class="footer-title">Ikuti Kami</h6>
                <div class="footer-social">
                    @if($profil->instagram ?? null)
                        <a href="{{ $profil->instagram }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    @endif
                    @if($profil->facebook ?? null)
                        <a href="{{ $profil->facebook }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    @endif
                    @if($profil->youtube ?? null)
                        <a href="{{ $profil->youtube }}" target="_blank" rel="noopener" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    @endif
                </div>
            </div>
        </div>

        <hr class="footer-divider">

        <div class="text-center footer-copy">
            &copy; {{ date('Y') }} {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}. Seluruh hak cipta dilindungi.
        </div>
    </div>
</footer>
