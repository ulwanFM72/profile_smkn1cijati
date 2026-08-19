<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Beranda') - {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}</title>

    <meta name="description" content="Website Profil Sekolah">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    @yield('styles')
</head>

<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <div class="lightbox-overlay" id="lightboxOverlay">
        <button type="button" class="lightbox-close" id="lightboxClose">
            <i class="bi bi-x-lg"></i>
        </button>
        <img src="" id="lightboxImage">
        <p id="lightboxCaption"></p>
    </div>
    <a href="#top" class="back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content login-modal">
                <div class="modal-header login-header">
                    <h5 class="modal-title">
                    Login Administrator
                    </h5>
                    <button
                    type="button"
                    class="modal-close-btn"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <div class="modal-body login-body">
                    <div class="text-center mb-4">
                        <img
                            src="{{ asset('images/logo-smkn1cijati.png') }}"
                            width="75"
                            class="mb-3">
                        <h4 class="fw-bold">
                            Selamat Datang
                        </h4>
                        <p class="text-muted">
                            Silakan login untuk masuk ke Dashboard Administrator
                        </p>
                    </div>
                    <form method="POST" action="{{ route('login.authenticate') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">
                                Username
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    placeholder="Masukkan username"
                                    required>
                            </div>
                        </div>
                            <div class="mb-4">
                                <label class="form-label">
                                Password
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                    <i class="bi bi-lock-fill"></i>
                                    </span>
                                    <input
                                    type="password"
                                    id="passwordInput"
                                    name="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required>

                                    <button
                                    type="button"
                                    class="input-group-text toggle-password"
                                    id="togglePassword">
                                    <i class="bi bi-eye-fill" id="toggleIcon"></i>
                                    </button>

                                </div>
                            </div>
                        <button
                            type="submit"
                            class="btn btn-login w-100">
                            Login
                        </button>

                        @error('login')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="{{ asset('js/script.js') }}"></script>

    @yield('scripts')


    @if($errors->has('login') || session('login_required'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new bootstrap.Modal(document.getElementById('loginModal')).show();
    });
</script>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    VanillaTilt.init(document.querySelectorAll(".card-guru"), {
        max: 30,
        speed: 400,
        glare: true,
        perspective: 700,
        "max-glare": 0.5,
        scale: 1.1
        easing: "cubic-bezier(.03,.98,.52,.99)",
    });
});
</script>
@endpush
</body>
</html>