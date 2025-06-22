<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            return redirect()->route('dashboard');
        }

         // Tetap kembali ke login dengan error dan input email
        return redirect()->route('login')
            ->withErrors(['login' => 'Email atau password salah'])
            ->withInput();
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

       public function register(Request $request)
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // pastikan ada password_confirmation
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), // Enkripsi password
        ]);

        Auth::login($user);

        // Redirect ke dashboard atau halaman tertentu
        return redirect()->route('dashboard');
    }

}
