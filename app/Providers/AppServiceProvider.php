<?php

namespace App\Providers;

use App\Models\ProfilSekolah;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Pastikan footer selalu punya data profil sekolah (alamat, kontak,
        // link sosial media) di halaman manapun, tanpa perlu tiap controller
        // mengirim variabel $profil secara manual.
        View::composer('partials.footer', function ($view) {
            if (! $view->offsetExists('profil') || ! $view->offsetGet('profil')) {
                $view->with('profil', ProfilSekolah::first());
            }
        });
    }
}
