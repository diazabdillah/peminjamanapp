<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ==========================================================
    // LOGIC REGISTER
    // ==========================================================

    /**
     * Menampilkan formulir pendaftaran.
     */
    public function registerForm()
    {
        return view('auth.register');
    }

    /**
     * Memproses pendaftaran user baru.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        // Langsung login setelah register
        Auth::login($user);

        return redirect('/')->with('success', 'Pendaftaran berhasil! Selamat datang.');
    }

    // ==========================================================
    // LOGIC LOGIN
    // ==========================================================

    /**
     * Menampilkan formulir login.
     */
    public function loginForm()
    {
        return view('auth.login');
    }

    /**
     * Memproses otentikasi (login) user.
     */
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials, $request->remember)) {
        $request->session()->regenerate();

        // PERBAIKAN DI SINI: Menggunakan '/' sebagai fallback URL
        return redirect()->intended('/')->with('success', 'Login berhasil!'); 
    }

    return back()->withErrors([
        'email' => 'Email atau password yang Anda masukkan salah.',
    ])->onlyInput('email');
}
    
    // ==========================================================
    // LOGIC LOGOUT
    // ==========================================================

    /**
     * Menghapus sesi otentikasi (logout).
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
}
