<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\User;

class ProfileController extends Controller
{

    public function settings()
{
    $user = Auth::user(); // Mengambil pengguna yang sedang login
    return view('profile.settings', compact('user'));
}

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:user,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('profile.settings')->with('success', 'Profil berhasil diperbarui.');
    }
}


