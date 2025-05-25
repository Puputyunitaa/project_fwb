<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::with('user')->get();
        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        $users = User::all();
        return view('profiles.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|unique:profiles,user_id',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        Profile::create($request->all());
        return redirect()->route('profiles.index')->with('success', 'Profil berhasil ditambahkan.');
    }

    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        $users = User::all();
        return view('profiles.edit', compact('profile', 'users'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'user_id' => 'required|unique:profiles,user_id,' . $profile->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $profile->update($request->all());
        return redirect()->route('profiles.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Profil berhasil dihapus.');
    }
}
