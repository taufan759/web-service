<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\User;

class LoginAdminController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('admin.login'); // Menampilkan view login.blade.php
    }

    // Menampilkan form sign up
    public function showSignUpForm()
    {
        return view('admin.signup'); // Menampilkan view signup.blade.php
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Proses login menggunakan Auth
        if (Auth::attempt($request->only('email', 'password'), $request->has('remember-me'))) {
            // Setelah berhasil login, redirect ke dashboard
            return redirect()->route('admin.dashboard'); // Pastikan route admin.dashboard ada
        }

        // Login gagal
        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }

    // Proses sign up
    public function signUp(Request $request)
{
    // Validasi input registrasi
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    // Buat pengguna baru
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    // Redirect ke halaman login setelah berhasil registrasi
    return redirect()->route('admin.login')->with('success', 'Registration successful. Please login.');
}
}
