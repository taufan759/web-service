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
        $otherMotivations = Motivation::where('visibility', 'public')->orderBy('created_at', 'desc')->get();

        $myMotivations = Motivation::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

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

public function edit($id)
{
    $motivation = Motivation::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    return view('admin.edit', compact('motivation'));
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
            'visibility' => 'required|in:private,public'
        ]);

        $motivation = Motivation::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $motivation->update($request->only(['content', 'visibility']));
    
        return redirect()->route('admin.dashboard')->with('success', 'Motivasi berhasil diperbarui.');
    }
}
