# Website Profil Sekolah — Laravel + Bootstrap 5

Source code ini berisi implementasi **Tahap 1 (Persiapan Project)** dan **Tahap 2 (Desain UI)**
dari spesifikasi yang diberikan: landing page modern & responsif, navbar dengan hover animation,
smooth scrolling, animasi fade/slide (AOS), card dengan efek shadow & transform, serta struktur
MVC lengkap (Model, Controller, Migration, Blade View) untuk halaman **Beranda, Profil Sekolah,
Ekstrakurikuler, dan Galeri**.

> **Catatan penting:** File-file ini adalah source code Laravel yang sudah lengkap, tetapi
> belum berupa project Laravel utuh (belum ada `composer.json`, folder `vendor/`, `bootstrap/`,
> dsb.) karena dibuat di lingkungan tanpa PHP/Composer. Ikuti langkah di bawah untuk
> menggabungkannya ke dalam project Laravel baru di Laragon Anda — hanya butuh beberapa menit.

## Struktur file yang disertakan

```
routes/web.php
app/Http/Controllers/HomeController.php
app/Http/Controllers/ProfilController.php
app/Http/Controllers/EkstrakurikulerController.php
app/Http/Controllers/GaleriController.php
app/Http/Controllers/BeritaController.php
app/Models/ProfilSekolah.php
app/Models/Ekstrakurikuler.php
app/Models/Galeri.php
app/Models/Berita.php
app/Models/Guru.php
app/Models/Siswa.php
database/migrations/2024_01_01_000001_create_profil_sekolahs_table.php
database/migrations/2024_01_01_000002_create_ekstrakurikulers_table.php
database/migrations/2024_01_01_000003_create_galeris_table.php
database/migrations/2024_01_01_000004_create_beritas_table.php
database/migrations/2024_01_01_000005_create_gurus_table.php
database/migrations/2024_01_01_000006_create_siswas_table.php
database/seeders/DatabaseSeeder.php
database/seeders/ProfilSekolahSeeder.php
database/seeders/EkstrakurikulerSeeder.php
database/seeders/GaleriSeeder.php
database/seeders/BeritaSeeder.php
database/seeders/GuruSeeder.php
database/seeders/SiswaSeeder.php
resources/views/layouts/app.blade.php
resources/views/partials/navbar.blade.php
resources/views/partials/footer.blade.php
resources/views/home.blade.php
resources/views/profil.blade.php
resources/views/ekstrakurikuler/index.blade.php
resources/views/ekstrakurikuler/show.blade.php
resources/views/galeri.blade.php
resources/views/berita/index.blade.php
resources/views/berita/show.blade.php
public/css/style.css
public/js/script.js
.env.example
```

## Langkah Instalasi di Laragon

### 1. Buat project Laravel baru

Buka **Terminal Laragon** (klik tombol Terminal di aplikasi Laragon), lalu jalankan di folder `www`:

```bash
cd C:/laragon/www
composer create-project laravel/laravel profil-sekolah
```

### 2. Salin file dari paket ini ke project

Salin **isi** setiap folder pada paket ini ke folder project Laravel yang baru dibuat
(`C:/laragon/www/profil-sekolah`), **timpa file yang sudah ada** (misalnya `routes/web.php`):

- `routes/web.php` → timpa file yang ada
- `app/Http/Controllers/*.php` → salin ke `app/Http/Controllers/`
- `app/Models/*.php` → salin ke `app/Models/`
- `database/migrations/*.php` → salin ke `database/migrations/`
- `database/seeders/*.php` → timpa `DatabaseSeeder.php` + tambahkan seeder lain
- `resources/views/*` → salin seluruh folder `layouts`, `partials`, dan file blade ke `resources/views/`
- `public/css/style.css` dan `public/js/script.js` → salin ke `public/css/` dan `public/js/`

### 3. Konfigurasi Database

Buat database baru bernama `profil_sekolah` melalui **HeidiSQL/phpMyAdmin** bawaan Laragon.

Salin isi `.env.example` dari paket ini ke file `.env` project Laravel Anda (khususnya bagian
`DB_*`), lalu generate app key:

```bash
php artisan key:generate
```

### 4. Jalankan Migration & Seeder

```bash
php artisan migrate
php artisan db:seed
```

Perintah ini akan membuat tabel `profil_sekolahs`, `ekstrakurikulers`, `galeris`, dan mengisi
data contoh (sambutan kepala sekolah, visi-misi, 6 ekstrakurikuler, 6 entri galeri).

### 5. Siapkan Storage untuk Galeri (opsional, untuk gambar)

```bash
php artisan storage:link
```

Lalu unggah foto ke `storage/app/public/galeri/` dengan nama file sesuai seeder
(`upacara.jpg`, `lab-komputer.jpg`, dst.) — atau sesuaikan nama file pada
`database/seeders/GaleriSeeder.php` dengan foto Anda sendiri.

### 6. Jalankan Project

Karena menggunakan Laragon, aktifkan **Auto Virtual Host** lalu akses:

```
http://profil-sekolah.test
```

Atau jalankan manual:

```bash
php artisan serve
```

lalu buka `http://127.0.0.1:8000`.

## Yang sudah diimplementasikan (sesuai spesifikasi)

**Tahap 1 — Persiapan Project**
- Struktur MVC: Model (`ProfilSekolah`, `Ekstrakurikuler`, `Galeri`), Controller, Blade View
- Routing Laravel untuk 4 halaman utama (`web.php`)
- Template layout terpisah: `layouts/app.blade.php` + partial `navbar` & `footer`
- Asset Bootstrap 5 tersusun via CDN, siap diganti ke npm/Vite bila diperlukan
- Konfigurasi koneksi database melalui `.env`
- Eloquent ORM pada seluruh model

**Tahap 2 — Desain UI**
- Landing page modern & responsif dengan hero section, statistik, preview ekstrakurikuler & galeri
- Navbar responsif (Beranda, Profil Sekolah, Ekstrakurikuler, Galeri) dengan **hover underline animation**
- **Smooth scrolling** untuk anchor link (`script.js`)
- **Animasi fade/slide saat halaman dibuka** via AOS (`data-aos="fade-up"`, `fade-right`, `fade-left`, `zoom-in`)
- Tombol dengan efek hover (`translateY` + shadow)
- Card dengan efek **shadow & transform saat hover** (card ekstrakurikuler & galeri)
- Palet warna khas: navy `#14213D` sebagai warna utama, gold `#E8A33D` sebagai aksen, teal
  `#2E7D6B` sebagai warna pendukung, dengan tipografi **Fraunces** (judul) + **Plus Jakarta Sans** (body)
- Mendukung `prefers-reduced-motion` untuk aksesibilitas

**Tahap 3 — Halaman Beranda**
- **Hero Section**: nama sekolah, motto (`$profil->motto`), tombol "Lihat Profil", background gradasi + elemen dekoratif
- **Berita Kegiatan Sekolah**: card berisi gambar, judul, tanggal, ringkasan, dan tombol "Selengkapnya" menuju halaman detail berita (`app/Models/Berita.php`, `BeritaController`, route `/berita` & `/berita/{slug}`)
- **Statistik Sekolah**: 4 card (Guru, Siswa, Kelas, Ekstrakurikuler) dengan **animasi counter** — angka bertambah dari 0 ke nilai asli saat section masuk viewport, menggunakan `IntersectionObserver` (lihat `public/js/script.js`, class `.counter`)
- **Galeri Singkat**: grid foto dengan **hover zoom** (`.card-galeri img` transform scale) dan **lightbox** saat foto diklik — modal fullscreen kustom tanpa dependency tambahan (`#lightboxOverlay` di `home.blade.php`, logic di `script.js`)

Catatan: kolom `motto` dan `jumlah_kelas` ditambahkan ke tabel `profil_sekolahs`, jadi jika Anda
**sudah pernah** menjalankan `php artisan migrate` sebelumnya, jalankan ulang dari awal dengan:
```bash
php artisan migrate:fresh --seed
```
(perintah ini akan menghapus seluruh data lama dan membuat ulang dari migration + seeder terbaru).

**Tahap 4 — Halaman Profil Sekolah**
- Section Sejarah Sekolah, Visi, Misi, dan Sambutan Kepala Sekolah (sudah ada sejak Tahap 2, tetap dipertahankan)
- **Tabel Informasi Profil Sekolah** menggunakan Bootstrap Table (`table table-hover table-profil`) yang responsif (`table-responsive`), menampilkan: Nama Sekolah, NPSN, Status, Akreditasi, Tahun Berdiri, Alamat, Email, Nomor Telepon, dan Website
- Kolom baru `npsn`, `status`, `akreditasi`, `website` ditambahkan ke tabel `profil_sekolahs`

Catatan: karena ada penambahan kolom lagi di migration `profil_sekolahs`, jalankan ulang:
```bash
php artisan migrate:fresh --seed
```

**Tahap 5 — Halaman Ekstrakurikuler**
- Setiap card menampilkan **foto**, nama, deskripsi, dan **jadwal latihan**
- **Hover animation**: card terangkat (`translateY`) + border gold saat disentuh pointer, foto zoom-in halus
- **Card shadow**: `box-shadow` lembut yang membesar saat hover
- Tombol **"Selengkapnya"** pada setiap card menuju halaman detail (`/ekstrakurikuler/{id}`) yang menampilkan foto besar, deskripsi lengkap, pembina, jadwal, dan rekomendasi ekstrakurikuler lain
- View dipindahkan ke `resources/views/ekstrakurikuler/index.blade.php` & `show.blade.php` (struktur folder, bukan file tunggal)

Catatan: kolom `gambar` pada tabel `ekstrakurikulers` kini diisi contoh path
(`ekstrakurikuler/basket-futsal.jpg`, dst). Unggah foto sesuai nama tersebut ke
`storage/app/public/ekstrakurikuler/` setelah `php artisan storage:link`, atau
sesuaikan nama file pada `database/seeders/EkstrakurikulerSeeder.php`.

**Tahap 6 — Halaman Galeri**
- **Grid Gallery Bootstrap**: `row-cols` responsif (2 kolom di mobile, 3 di tablet, 4 di desktop)
- **Lightbox**: klik foto membuka modal fullscreen (custom, sudah dipindah ke `layouts/app.blade.php` agar berlaku di semua halaman termasuk preview galeri di Beranda)
- **Hover Zoom**: efek `transform: scale()` pada foto saat pointer hover
- **Filter kategori**: tombol filter dinamis (diambil dari kolom `kategori` yang unik di database) — klik tombol untuk menampilkan hanya foto pada kategori tersebut, tanpa reload halaman (client-side JS)
- Kategori contoh yang sudah diisi di seeder: **Upacara, Perlombaan, Kegiatan Belajar, Ekstrakurikuler**

**Tahap 7 — Database (MySQL via Laragon)**

Seluruh tabel dibuat lewat migration dan diakses lewat Eloquent Model. Berikut skema final:

| Tabel | Kolom |
|---|---|
| `beritas` | id, judul, slug*, ringkasan*, isi, gambar, tanggal, created_at, updated_at |
| `galeris` | id, judul, gambar, kategori, created_at, updated_at |
| `gurus` | id, nama, jabatan, foto, created_at, updated_at |
| `siswas` | id, nama, kelas, created_at, updated_at |
| `ekstrakurikulers` | id, nama, gambar, deskripsi, jadwal, pembina*, icon*, created_at, updated_at |
| `profil_sekolahs` | data profil sekolah (lihat migration untuk daftar lengkap) |

`*` = kolom tambahan di luar spesifikasi Tahap 7, sengaja dipertahankan karena dipakai fitur
yang sudah dibangun di tahap sebelumnya:
- `slug` (Berita) → URL detail berita yang rapi (`/berita/nama-artikel`), dibuat di Tahap 3
- `ringkasan` (Berita) → ditampilkan di card berita Beranda, diminta di Tahap 3
- `pembina` & `icon` (Ekstrakurikuler) → ditampilkan di card & halaman detail, ada sejak Tahap 1 & 5

Tabel `gurus` dan `siswas` baru dibuat murni sesuai Tahap 7 ini (model + migration + seeder),
belum ada controller/halaman tampilan karena belum diminta di spesifikasi manapun sejauh ini.

## Langkah lanjutan yang bisa dikembangkan

- Halaman admin (CRUD) untuk mengelola profil, ekstrakurikuler, dan galeri
- Autentikasi admin (Laravel Breeze/Fortify)
- Upload gambar melalui form (bukan hanya seeder)
- Halaman berita/pengumuman sekolah
- Form kontak dengan validasi & pengiriman email
# profile_smkn1cijati
