<!DOCTYPE html>
<html lang="id">
<head>
    @php($profil = \App\Models\ProfilSekolah::first())
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Admin {{ $profil->nama_sekolah ?? 'Sekolah' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @yield('styles')
</head>
<body>

    <div class="admin-wrapper">
        {{-- SIDEBAR --}}
        <aside class="admin-sidebar">
            <div class="admin-sidebar-brand">
                <div>
                    <strong>Dashboard Admin</strong>
                    <span>{{ $profil->nama_sekolah ?? 'Sistem Sekolah' }}</span>
                </div>
            </div>

            {{-- DAFTAR MENU NAVIGASI SIDEBAR ADMIN --}}
            <p class="admin-sidebar-label">Menu</p>
            <nav class="admin-sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Ringkasan
                </a>
                <a href="{{ route('admin.profil.edit') }}" class="{{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
                    <i class="bi bi-building"></i> Profil Sekolah
                </a>
                <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> Berita
                </a>
                <a href="{{ route('admin.ekstrakurikuler.index') }}" class="{{ request()->routeIs('admin.ekstrakurikuler.*') ? 'active' : '' }}">
                    <i class="bi bi-trophy"></i> Ekstrakurikuler
                </a>
                <a href="{{ route('admin.jurusan.index') }}" class="{{ request()->routeIs('admin.jurusan.*') ? 'active' : '' }}">
                    <i class="bi bi-mortarboard"></i> Jurusan
                </a>
                <a href="{{ route('admin.guru.index') }}" class="{{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">
                    <i class="bi bi-person-workspace"></i> Guru
                </a>
                <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                    <i class="bi bi-images"></i> Galeri
                </a>
            </nav>

            {{-- TOMBOL LOGOUT ADMIN --}}
            <form method="POST" action="{{ route('admin.logout') }}" class="admin-sidebar-logout">
                @csrf
                <button type="submit"><i class="bi bi-box-arrow-right"></i> Keluar</button>
            </form>
        </aside>

        {{-- KONTEN --}}
        <div class="admin-content">
            {{-- TOPBAR (TOMBOL BUKA SIDEBAR DI MOBILE & NAMA ADMIN YANG LOGIN) --}}
            <header class="admin-topbar">
                <button class="admin-sidebar-toggle" id="sidebarToggle" aria-label="Buka menu">
                    <i class="bi bi-list"></i>
                </button>
                <div class="admin-topbar-user">
                    <i class="bi bi-person-circle"></i> {{ auth()->user()->name ?? 'Admin' }}
                </div>
            </header>

            {{-- AREA KONTEN UTAMA: NOTIFIKASI SUKSES/ERROR LALU KONTEN TIAP HALAMAN ADMIN --}}
            <main class="admin-main">
                @if(session('success'))
                <script>
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: @json(session('success')),
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true
                    });
                </script>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- TOMBOL BUKA/TUTUP SIDEBAR DI LAYAR MOBILE --}}
    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function () {
            document.querySelector('.admin-wrapper').classList.toggle('sidebar-open');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
</body>
</html>
