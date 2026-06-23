<?php

namespace App\Http\Controllers;

use App\Models\Clothes;
use App\Models\Outfit;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::where('role', 'user')->count(),
            'totalClothes' => Clothes::count(),
            'totalOutfits' => Outfit::count(),
        ]);
    }
}
