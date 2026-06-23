<?php

namespace App\Http\Controllers;

use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $user = auth()->user();

        return view('dashboard', [
            'totalCategories' => Category::count(),
            'totalClothes' => $user->clothes()->count(),
            'totalOutfits' => $user->outfits()->count(),
            'recentClothes' => $user->clothes()
                ->with('category')
                ->latest()
                ->take(4)
                ->get(),
            'recentOutfits' => $user->outfits()
                ->with('clothes')
                ->latest()
                ->take(3)
                ->get(),
        ]);
    }
}
