<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Alihkan pengunjung yang mengakses halaman login ke beranda,
     * dengan pesan bahwa mereka harus login lebih dulu untuk masuk admin.
     */
    public function showLogin()
    {
        return redirect()->route('home')
            ->with('login_required', 'Silakan login terlebih dahulu untuk mengakses halaman admin.');
    }

    /**
     * Proses percobaan login admin: validasi kredensial, autentikasi,
     * lalu arahkan ke dashboard jika berhasil atau kembali dengan pesan error jika gagal.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()
            ->withErrors(['login' => 'Username atau password salah.'])
            ->onlyInput('username');
    }

    /**
     * Proses logout admin: hapus sesi login dan alihkan kembali ke beranda.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
