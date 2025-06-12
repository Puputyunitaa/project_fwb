<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\User;

class Dashboard extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == 1) {
            return view('tampilan.users.dashboard', [
                'productCount' => Product::count(),
                'categoryCount' => Category::count(),
                'supplierCount' => Supplier::count(),
                'userCount' => User::count(),
            ]);
        } elseif ($user->role_id == 2) {
            return view('tampilan.dashbaorStaf');
        } elseif ($user->role_id == 3) {
            return view('tampilan.dashboarSupervisior');
        }

        // Jika role tidak dikenali
        Auth::logout();
        return redirect()->route('login')->withErrors(['email' => 'Akses tidak diizinkan.']);
    }
}
