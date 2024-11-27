<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginAdminController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('admin.login'); // View login.blade.php
    }

    // Menampilkan form sign up
    public function showSignUpForm()
    {
        return view('admin.signup'); // View signup.blade.php
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
            return redirect()->route('admin.dashboard'); // Redirect setelah login berhasil
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

        return redirect()->route('admin.login')->with('success', 'Registration successful. Please login.');
    }
}
