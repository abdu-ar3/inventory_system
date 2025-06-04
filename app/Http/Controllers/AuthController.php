<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // pastikan Anda membuat view login.blade.php di folder resources/views/auth
    }

    // Meng-handle login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Melakukan login
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->remember)) {
            // Redirect ke halaman home setelah login berhasil
            return redirect()->route('home');
        }

        // Jika login gagal, kembalikan ke form login dengan pesan error
        return redirect()->route('login')->withErrors(['login' => 'Invalid credentials']);
    }

    public function home()
    {
        return view('home'); 
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
