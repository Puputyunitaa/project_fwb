<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Tampilkan daftar semua user (hanya bisa oleh admin)
     */
    public function index()
    {
        $role = Auth::user()->role->name;

        if ($role === 'admin') {
            // Admin ke daftar user
            return redirect()->route('users.index');
        } elseif ($role === 'supervisor') {
            // Supervisor ke dashboard supervisor
            return view('tampilan.dashboarSupervisior');
        } elseif ($role === 'staf') {
            // Staf ke dashboard staf
            return view('tampilan.dashbaorStaf');
        } else {
            abort(403, 'Akses tidak diizinkan');
        }
    }

    /**
     * Tampilkan form tambah user
     */
    public function create()
{
    $roles = Role::all();
    return view('tampilan.users.create', compact('roles'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role_id' => 'required|exists:roles,id',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => $request->role_id,
    ]);

    return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
}

public function edit($id)
{
    $user = User::findOrFail($id);
    $roles = Role::all();
    return view('tampilan.users.edit', compact('user', 'roles'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role_id' => 'required|exists:roles,id',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role_id' => $request->role_id,
    ]);

    return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
}
}
