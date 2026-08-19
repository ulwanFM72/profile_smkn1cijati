<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\JurusanController;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\EkstrakurikulerController as AdminEkstrakurikulerController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\JurusanController as AdminJurusanController;
use App\Http\Controllers\Admin\GuruController as AdminGuruController;

// HALAMAN PUBLIK / USER
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('ekstrakurikuler');
Route::get('/ekstrakurikuler/{ekstrakurikuler}', [EkstrakurikulerController::class, 'show'])->name('ekstrakurikuler.show');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
Route::get('/jurusan/{jurusan}', [JurusanController::class, 'show'])->name('jurusan.show');

// LOGIN / AUTHENTIKASI
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// ROUTE ADMIN
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
  // DASHBOARD ADMIN
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

  // PROFIL SEKOLAH
  Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
  Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');

  // MANAJEMEN BERITA
  Route::get('/berita', [AdminBeritaController::class, 'index'])->name('berita.index');
  Route::get('/berita/create', [AdminBeritaController::class, 'create'])->name('berita.create');
  Route::post('/berita', [AdminBeritaController::class, 'store'])->name('berita.store');
  Route::get('/berita/{berita}/edit', [AdminBeritaController::class, 'edit'])->name('berita.edit');
  Route::put('/berita/{berita}', [AdminBeritaController::class, 'update'])->name('berita.update');
  Route::delete('/berita/{berita}', [AdminBeritaController::class, 'destroy'])->name('berita.destroy');

  // MANAJEMEN EKSTRAKURIKULER
  Route::get('/ekstrakurikuler', [AdminEkstrakurikulerController::class, 'index'])->name('ekstrakurikuler.index');
  Route::get('/ekstrakurikuler/create', [AdminEkstrakurikulerController::class, 'create'])->name('ekstrakurikuler.create');
  Route::post('/ekstrakurikuler', [AdminEkstrakurikulerController::class, 'store'])->name('ekstrakurikuler.store');
  Route::get('/ekstrakurikuler/{ekstrakurikuler}/edit', [AdminEkstrakurikulerController::class, 'edit'])->name('ekstrakurikuler.edit');
  Route::put('/ekstrakurikuler/{ekstrakurikuler}', [AdminEkstrakurikulerController::class, 'update'])->name('ekstrakurikuler.update');
  Route::delete('/ekstrakurikuler/{ekstrakurikuler}', [AdminEkstrakurikulerController::class, 'destroy'])->name('ekstrakurikuler.destroy');

  // MANAJEMEN GALERI
  Route::get('/galeri', [AdminGaleriController::class, 'index'])->name('galeri.index');
  Route::get('/galeri/create', [AdminGaleriController::class, 'create'])->name('galeri.create');
  Route::post('/galeri', [AdminGaleriController::class, 'store'])->name('galeri.store');
  Route::get('/galeri/{galeri}/edit', [AdminGaleriController::class, 'edit'])->name('galeri.edit');
  Route::put('/galeri/{galeri}', [AdminGaleriController::class, 'update'])->name('galeri.update');
  Route::delete('/galeri/{galeri}', [AdminGaleriController::class, 'destroy'])->name('galeri.destroy');

  // MANAJEMEN JURUSAN
  Route::get('/jurusan', [AdminJurusanController::class, 'index'])->name('jurusan.index');
  Route::get('/jurusan/create', [AdminJurusanController::class, 'create'])->name('jurusan.create');
  Route::post('/jurusan', [AdminJurusanController::class, 'store'])->name('jurusan.store');
  Route::get('/jurusan/{jurusan}/edit', [AdminJurusanController::class, 'edit'])->name('jurusan.edit');
  Route::put('/jurusan/{jurusan}', [AdminJurusanController::class, 'update'])->name('jurusan.update');
  Route::delete('/jurusan/{jurusan}', [AdminJurusanController::class, 'destroy'])->name('jurusan.destroy');

  // GALERI KHUSUS JURUSAN
  Route::post('/jurusan/{jurusan}/galeri', [AdminJurusanController::class, 'storeGaleri'])->name('jurusan.galeri.store');
  Route::delete('/jurusan/{jurusan}/galeri/{galeri}', [AdminJurusanController::class, 'destroyGaleri'])->name('jurusan.galeri.destroy');

  // MANAJEMEN DATA GURU
  Route::get('/guru', [AdminGuruController::class, 'index'])->name('guru.index');
  Route::get('/guru/create', [AdminGuruController::class, 'create'])->name('guru.create');
  Route::post('/guru', [AdminGuruController::class, 'store'])->name('guru.store');
  Route::get('/guru/{guru}/edit', [AdminGuruController::class, 'edit'])->name('guru.edit');
  Route::put('/guru/{guru}', [AdminGuruController::class, 'update'])->name('guru.update');
  Route::delete('/guru/{guru}', [AdminGuruController::class, 'destroy'])->name('guru.destroy');
});
