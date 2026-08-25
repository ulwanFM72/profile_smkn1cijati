<footer class="footer-school" id="kontak">
    <div class="container">
        <div class="row gy-3">
            <div class="col-lg-4">
                <a class="brand-text footer-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-smkn1cijati.webp') }}" alt="Logo Sekolah" class="brand-logo">
                    {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
                </a>
                <p class="footer-desc mt-2">
                    {{ Str::limit($profil->visi ?? 'Mendidik generasi berkarakter, cerdas, dan siap menghadapi masa depan.', 140) }}
                </p>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="footer-title">Kontak</h6>
                <ul class="footer-links">
                    <li><i class="bi bi-geo-alt"></i> {{ $profil->alamat ?? 'Jl. Pendidikan No. 1, Indonesia' }}</li>
                    <li><i class="bi bi-telephone"></i> {{ $profil->telepon ?? '(021) 000-0000' }}</li>
                    <li><i class="bi bi-envelope"></i> {{ $profil->email ?? 'info@sekolah.sch.id' }}</li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="footer-title">Lokasi Sekolah</h6>
                <div class="footer-map-wrap">
                    <iframe
                        class="footer-map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.8291230027494!2d107.02838697499962!3d-7.260279492746492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e686e4008ab702b%3A0xeae4e9c2f849b4f1!2sSMK%20Negeri%201%20Cijati!5e0!3m2!1sid!2sid!4v1787641888388!5m2!1sid!2sid"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen
                        title="Peta Lokasi {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}">
                    </iframe>
                </div>
                <a href="https://maps.app.goo.gl/3LgLauG82EE6eaQk9" target="_blank" rel="noopener" class="footer-map-link">
                    <i class="bi bi-box-arrow-up-right"></i> Buka di Google Maps
                </a>
            </div>

            <div class="col-lg-2">
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