<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Motivation;
use Illuminate\Support\Facades\Auth;

class MotivationController extends Controller
{
    public function index()
    {
        // Ambil motivasi publik
        $otherMotivations = Motivation::where('visibility', 'public')->get();

        // Ambil motivasi milik user yang login
        $myMotivations = Motivation::where('user_id', Auth::id())->get();

        return view('admin.dashboard', compact('myMotivations', 'otherMotivations'));
    }

    public function store(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('admin.login')->with('error', 'You must be logged in to add a motivation.');
    }

    $request->validate([
        'content' => 'required|string', // Ganti 'message' menjadi 'content'
        'visibility' => 'required|in:private,public',
    ]);

    Motivation::create([
        'content' => $request->content, // Ganti 'message' menjadi 'content'
        'user_id' => Auth::id(),
        'visibility' => $request->visibility,
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Motivation added successfully!');
}


    public function destroy($id)
    {
        $motivation = Motivation::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $motivation->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Motivasi berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $motivation = Motivation::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $motivation->update([
            'content' => $request->content,
            'visibility' => $request->visibility ?? 'private',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Motivasi berhasil diperbarui.');
    }
}
